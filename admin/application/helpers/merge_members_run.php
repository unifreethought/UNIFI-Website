<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function arr_join($arr) {
	$tmp = '';
	foreach ($arr as $item) {
		$tmp .= $item . ',';
	}
	return substr($tmp, 0, -1);
}

// 1) Grab the information to make the new user. (From the radio buttons)
$first_id = MySQL::clean($_POST['first_id']);
$second_id = MySQL::clean($_POST['second_id']);
$new_id = 0;

$first_name = MySQL::clean($_POST['first_name']);
$last_name = MySQL::clean($_POST['last_name']);
$year = MySQL::clean($_POST['year']);
$major = MySQL::clean($_POST['major']);
$hometown = MySQL::clean($_POST['hometown']);
$dorm = MySQL::clean($_POST['dorm']);
$recruit_date = 0;
$recruit_place = MySQL::clean($_POST['recruit_place']);
$phone = MySQL::clean($_POST['phone']);
$email = MySQL::clean($_POST['email']);
$texting = MySQL::clean($_POST['texting']);
$positions = MySQL::clean(arr_join($_POST['positions']));
$tags = MySQL::clean(arr_join($_POST['tags']));
$notes = MySQL::clean($_POST['notes']);

// 2) Collect that all into an sql query.
$sql = "INSERT INTO `{$database}`.`member_database` (`id`,`first_name`,`last_name`,`year`,`major`,`hometown`,`dorm`,`recruit_date`";
$sql .=	',`recruit_place`,`phone`,`email`,`texting`,`positions`,`tags`,`notes`) VALUES ';
$sql .= "('0','{$first_name}','{$last_name}','{$year}','{$major}','{$hometown}','{$dorm}','{$recruit_date}','{$recruit_place}',";
$sql .= "'{$phone}','{$email}','{$texting}','{$positions}','{$tags}','{$notes}');";

// 3) Create a new member with the details from #2 and then pull the new id
MySQL::query($sql);
$tmp = MySQL::single("SELECT `id` FROM `{$database}`.`member_database` WHERE `last_name` = '{$last_name}' AND `email` = '{$email}';");
$new_id = $tmp['id'];


// 4) Pull the events attended for $first_id and $second_id
$first_events = MySQL::search("SELECT `event_id` FROM `{$database}`.`event_attendance` WHERE `member_id` = '{$first_id}';");
$second_events = MySQL::search("SELECT `event_id` FROM `{$database}`.`event_attendance` WHERE `member_id` = '{$second_id}';");

// 5) Mark all of those events from #4 attended by the new member id.
$new_events = array();
foreach ($first_events as $event) {
	$new_events[] = $event['event_id'];
}
foreach ($second_events as $event) {
	$new_events[] = $event['event_id'];
}
foreach ($new_events as $event) {
	$sqla = "INSERT INTO `{$database}`.`event_attendance` (`event_id`,`member_id`) VALUES ('{$event}', '{$new_id}');";
	MySQL::query($sqla);
}

// 6) Delete the members at $first_id and $second_id
$sql = "DELETE FROM `{$database}`.`member_database` WHERE `member_database`.`id` = '{$first_id}'";
MySQL::query($sql);
$sql = "DELETE FROM `{$database}`.`member_database` WHERE `member_database`.`id` = '{$second_id}'";
MySQL::query($sql);

// 7) Delete the attendence for both $first_id and $second_id
$sql = "DELETE FROM `{$database}`.`event_attendance` WHERE `event_attendance`.`member_id` = '{$first_id}'";
$sql .= " OR `event_attendance`.`member_id` = '{$second_id}';";
MySQL::query($sql);

Log::create($user_id, "merge_members", "Members Merged: {$first_id} and {$second_id}");

header("Location: index.php");
exit();
