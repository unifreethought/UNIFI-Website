<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/user.php';
include 'system/libs/show_date.php';
User_Parse::set($database);

$member_id = DB::clean($_GET['member']);
$sql = "SELECT * FROM `{$database}`.`member_database` WHERE `id` = '{$member_id}' LIMIT 1";
$member = DB::single($sql);

$sql = "SELECT `event_id` FROM `{$database}`.`event_attendance` WHERE `member_id` = '{$member_id}'";
$event_ids = DB::search($sql);
$events = array();

foreach ($event_ids as $id) {
	$events[] = DB::single("SELECT `title`,`start_time` FROM `{$database}`.`events` WHERE `id` = '{$id['event_id']}';");
}

$years = DB::search("SELECT * FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = DB::search("SELECT * FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = DB::search("SELECT * FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$texting = DB::single("SELECT `texting` FROM `{$database}`.`member_database` WHERE `id` = '{$member_id}';");
$positions = DB::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = DB::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");

