<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-03-06
 */

$notices = MySQL::search("SELECT `event_id` FROM `{$database}`.`event_notifications` WHERE `user_id` = '{$user_id}' ORDER BY `timestamp` DESC LIMIT 100");
$attending = array();
$not_attending = array();

foreach ($notices as $notice) {
	$event = MySQL::single("SELECT * FROM `{$database}`.`events` WHERE `id` = '{$notice['event_id']}' LIMIT 1");
	$rsvp = MySQL::single("SELECT `rsvp` FROM `{$database}`.`event_notifications` WHERE `event_id` = '{$notice['event_id']}' LIMIT 1");
	
	if ($rsvp['rsvp'] == '1') {
		$attending[] = $event;
	} else {
		$not_attending[] = $event;
	}
}


function print_rsvp_links($event_id) {
	echo "<button onclick='window.location=\"index.php?page=attend_event&event_id={$event_id}\";'>" . EVENTS_BUTTON_ATTEND . "</button>";
}

