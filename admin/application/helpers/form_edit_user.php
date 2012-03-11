<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

$id = MySQL::clean($_POST['id']);
$first_name = MySQL::clean($_POST['first_name']);
$last_name = MySQL::clean($_POST['last_name']);
$sql = "UPDATE  `{$database}`.`users` SET  `first_name` =  '{$first_name}', `last_name` = '{$last_name}' WHERE  `users`.`id` = '{$id}';";
MySQL::query($sql);

// `user-data`
$year = MySQL::clean($_POST['year']);
$major = MySQL::clean($_POST['major']);
$dorm = MySQL::clean($_POST['dorm']);
$recruit_place = MySQL::clean($_POST['recruit_place']);
$texting = MySQL::clean($_POST['texting']);
$hometown = MySQL::clean($_POST['hometown']);
$phone = MySQL::clean($_POST['phone']);
$email = MySQL::clean($_POST['email']);
$notes = MySQL::clean($_POST['notes']);
$positions = '';
$tags = '';

if (!empty($_POST['positions'])) {
	foreach ($_POST['positions'] as $p) {
		$positions .= $p . ', ';
	}
	$positions = substr($positions, 0, -2);
} else {
	$positions = '';
}

if (!empty($_POST['tags'])) {
	foreach ($_POST['tags'] as $t) {
		$tags .= $t . ', ';
	}
	$tags = substr($tags, 0, -2);
} else {
	$tags = '';
}

$sql = "UPDATE `{$database}`.`user-data` SET `year` = '{$year}', `major` = '{$major}', `dorm` = '{$dorm}', `recruit_place` = '{$recruit_place}'";
$sql .= ", `texting` = '{$texting}', `hometown` = '{$hometown}', `phone` = '{$phone}', `email` = '{$email}', `notes` = '{$notes}'";
$sql .= ", `positions` = '{$positions}', `tags` = '{$tags}' WHERE `user-data`.`id` = '{$id}'";
MySQL::query($sql);

Log::create($user_id, 'edit_user', "name:{$first_name} {$last_name}");

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
