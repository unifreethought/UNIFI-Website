<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// Pull the data for the event
$event_id = MySQL::clean($_GET['event_id']);
$event = MySQL::single("SELECT * FROM `{$database}`.`events` WHERE `id` = '{$event_id}' LIMIT 1");
	
// Pull the people who went to the event.
$attendance = MySQL::search("SELECT `user_id` FROM `{$database}`.`event_attendance` WHERE `event_id` = '{$event_id}';");

// Pull the first and last names for the people who attendended.
$members = array();
foreach ($attendance as $item) {
	// We need to grab the first and last names for the specific user.
	$tmp = MySQL::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '{$item['user_id']}' LIMIT 1");
	$members[] = array(
		'user_id' => $item['user_id'],
		'name' => $tmp['first_name'] . ' ' . $tmp['last_name']
	);
}
