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

