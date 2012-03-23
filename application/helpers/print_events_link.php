<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
function print_events_link($user_id, $database) {

  if (isset($user_id)) {
    $user_id = MySQL::clean($user_id);
    $now = MySQL::clean(@time());
  
    $sql = "SELECT COUNT(*) FROM `{$database}`.`event_notifications` WHERE `user_id` = '{$user_id}' AND `timestamp` > '{$now}' AND `rsvp` = '0'";
  
    $event_count = MySQL::single($sql);
    echo "<a class='events-link' href='index.php?page=view_events'>" . MAIN_PAGE_EVENTS_NAV_LINK . ' (' . $event_count['COUNT(*)'] . ")</a>";
  }
}
