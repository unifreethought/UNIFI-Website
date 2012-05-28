<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$year = DB::clean($_GET['year']);
if (empty($year)) {
  $year = @date('Y');
}
$year_timestamp = @date(mktime(0, 0, 0, 0, 0, $year));
$year_plus_one = @date(mktime(0, 0, 0, 0, 0, $year+1));

$events = DB::search("SELECT * FROM `{$database}`.`events` WHERE `start_time` > '{$year_timestamp}' AND `start_time` < '{$year_plus_one}'");

$attendance = array();
foreach ($events as $event) {
  $sql = "SELECT COUNT(*) FROM `{$database}`.`event_attendance` WHERE `event_id` = '{$event['id']}';";
  $result = DB::single($sql);
  $attendance[$event['id']] = $result['COUNT(*)'];
}

