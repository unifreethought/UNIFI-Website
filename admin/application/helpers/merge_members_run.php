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
$first_id = DB::clean($_POST['first_id']);
$second_id = DB::clean($_POST['second_id']);
$new_id = 0;

$first_name = DB::clean($_POST['first_name']);
$last_name = DB::clean($_POST['last_name']);
$year = DB::clean($_POST['year']);
$major = DB::clean($_POST['major']);
$hometown = DB::clean($_POST['hometown']);
$dorm = DB::clean($_POST['dorm']);
$recruit_date = 0;
$recruit_place = DB::clean($_POST['recruit_place']);
$phone = DB::clean($_POST['phone']);
$email = DB::clean($_POST['email']);
$texting = DB::clean($_POST['texting']);
$positions = DB::clean(arr_join($_POST['positions']));
$tags = DB::clean(arr_join($_POST['tags']));
$notes = DB::clean($_POST['notes']);

// 2) Collect that all into an sql query.
$sql = "INSERT INTO `{$database}`.`member_database` (`id`,`first_name`,`last_name`,`year`,`major`,`hometown`,`dorm`,`recruit_date`";
$sql .=	',`recruit_place`,`phone`,`email`,`texting`,`positions`,`tags`,`notes`) VALUES ';
$sql .= "('0','{$first_name}','{$last_name}','{$year}','{$major}','{$hometown}','{$dorm}','{$recruit_date}','{$recruit_place}',";
$sql .= "'{$phone}','{$email}','{$texting}','{$positions}','{$tags}','{$notes}');";

// 3) Create a new member with the details from #2 and then pull the new id
DB::query($sql);
$tmp = DB::single("SELECT `id` FROM `{$database}`.`member_database` WHERE `last_name` = '{$last_name}' AND `email` = '{$email}';");
$new_id = $tmp['id'];


// 4) Pull the events attended for $first_id and $second_id
$first_events = DB::search("SELECT `event_id` FROM `{$database}`.`event_attendance` WHERE `member_id` = '{$first_id}';");
$second_events = DB::search("SELECT `event_id` FROM `{$database}`.`event_attendance` WHERE `member_id` = '{$second_id}';");

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
	DB::query($sqla);
}

// 6) Delete the members at $first_id and $second_id
$sql = "DELETE FROM `{$database}`.`member_database` WHERE `member_database`.`id` = '{$first_id}'";
DB::query($sql);
$sql = "DELETE FROM `{$database}`.`member_database` WHERE `member_database`.`id` = '{$second_id}'";
DB::query($sql);

// 7) Delete the attendence for both $first_id and $second_id
$sql = "DELETE FROM `{$database}`.`event_attendance` WHERE `event_attendance`.`member_id` = '{$first_id}'";
$sql .= " OR `event_attendance`.`member_id` = '{$second_id}';";
DB::query($sql);

Log::create($user_id, "merge_members", "Members Merged: {$first_id} and {$second_id}");

header("Location: index.php");
exit();
