<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
function print_events_link($user_id, $database) {
	
	$user_id = MySQL::clean($user_id);
	$now = MySQL::clean(@time());
	$event_count = MySQL::single("SELECT COUNT(*) FROM `{$database}`.`event_notifications` WHERE `user_id` = '{$user_id}' AND `timestamp` > '{$now}'");
	echo "<a class='nav_item' href='index.php?view_events'>" . MAIN_PAGE_EVENTS_NAV_LINK . ' (' . $event_count['COUNT(*)'] . ")</a>";
	
}
