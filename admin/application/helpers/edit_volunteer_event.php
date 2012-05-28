<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/show_date.php';

$event_id = DB::clean($_GET['event']);
$event = DB::single("SELECT * FROM `{$database}`.`volunteer_events` WHERE `id` = '{$event_id}' LIMIT 1");
$event['start'] = Show_Date::parse($event['start_time']);
$event['end'] = Show_Date::parse($event['end_time']);

$membersAttending = DB::search("SELECT `member_id` FROM `{$database}`.`volunteer_event_attendance` WHERE `event_id` = '{$event_id}';");
