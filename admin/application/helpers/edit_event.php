<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
include 'system/libs/show_date.php';
 
// Pull the data for the event
$event_id = MySQL::clean($_GET['event']);
$event = MySQL::single("SELECT * FROM `{$database}`.`events` WHERE `id` = '{$event_id}' LIMIT 1");

// Load them into vars
$event['start'] = Show_Date::parse($event['start_time']);
$event['end'] = Show_Date::parse($event['end_time']);

// Pull what members are attending
$membersAttending = MySQL::search("SELECT `member_id` FROM `{$database}`.`event_attendance` WHERE `event_id` = '{$event_id}';");
