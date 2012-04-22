<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

// Past six weeks
$time = @time() - (60 * 60 * 24 * 7 * 6);
$events = MySQL::search("SELECT * FROM `{$database}`.`events` WHERE `start_time` > {$time};");

$attendance = array();
foreach ($events as $event) {
  $sql = "SELECT COUNT(*) FROM `{$database}`.`event_attendance` WHERE `event_id` = '{$event['id']}';";
  $result = MySQL::single($sql);
  $attendance[$event['id']] = $result['COUNT(*)'];
}

