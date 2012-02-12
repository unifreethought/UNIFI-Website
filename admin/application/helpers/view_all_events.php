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
$year_plus_one = @date(mktime(0, 0, 0, 0, 0, $year+1));

$events = MySQL::search("SELECT * FROM `{$database}`.`events` WHERE `start_time` > '{$year_timestamp}' AND `start_time` < '{$year_plus_one}'");

