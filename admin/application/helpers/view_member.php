<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-11-19
 */
 
include 'system/libs/user.php';
include 'system/libs/show_date.php';
User_Parse::set($database);
 
$member_id = MySQL::clean($_GET['member']);
$sql = "SELECT * FROM `{$database}`.`member_database` WHERE `id` = '{$member_id}' LIMIT 1";
$member = MySQL::single($sql);

$sql = "SELECT `event_id` FROM `{$database}`.`event_attendance` WHERE `member_id` = '{$member_id}'";
$event_ids = MySQL::search($sql);
$events = array();

foreach ($event_ids as $id) {
	$events[] = MySQL::single("SELECT `title`,`start_time` FROM `{$database}`.`events` WHERE `id` = '{$id['event_id']}';");
}

$years = MySQL::search("SELECT * FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = MySQL::search("SELECT * FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = MySQL::search("SELECT * FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$recruit_places = MySQL::search("SELECT * FROM `{$database}`.`recruit_place` ORDER BY `id` ASC");
$texting = MySQL::single("SELECT `texting` FROM `{$database}`.`member_database` WHERE `id` = '{$member_id}';");
$positions = MySQL::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = MySQL::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");

