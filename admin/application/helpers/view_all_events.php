<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$year = MySQL::clean($_GET['year']);
if (empty($year)) {
  $year = @date('Y');
}
$year_timestamp = @date(mktime(0, 0, 0, 0, 0, $year));

$events = MySQL::search("SELECT * FROM `{$database}`.`events` WHERE `start_time` > {$year_timestamp}");

