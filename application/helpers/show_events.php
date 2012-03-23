<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-03-06
 */
 
include 'show_authors_and_labels.php';

$now = @time() - 100;
$sql = "SELECT `event_id` FROM `{$database}`.`event_notifications` WHERE `user_id` = '{$user_id}' AND `timestamp` > '{$now}' ";
$sql .= "ORDER BY `timestamp` DESC LIMIT 100";

$notices = MySQL::search($sql);
$attending = array();
$not_attending = array();

foreach ($notices as $notice) {
  $event = MySQL::single("SELECT * FROM `{$database}`.`events` WHERE `id` = '{$notice['event_id']}' LIMIT 1");
  
  $rsvp_sql = "SELECT `rsvp` FROM `{$database}`.`event_notifications` WHERE `event_id` = '{$notice['event_id']}'";
  $rsvp_sql .= " AND `user_id` = '{$user_id}' LIMIT 1";
  $rsvp = MySQL::single($rsvp_sql);
  
  if ($event['end_time'] > $now) {
    if ($rsvp['rsvp'] == '1') {
      $attending[] = $event;
    }
    if ($rsvp['rsvp'] == '0') {
      $not_attending[] = $event;
    }
  }
}

function print_rsvp_links($event_id) {
  echo "<button onclick='window.location=\"index.php?page=attend_event&event_id={$event_id}\";'>" . EVENTS_BUTTON_ATTEND . "</button>";
}

