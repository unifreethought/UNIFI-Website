<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$event = DB::clean($_GET['event']);
$member = DB::clean($_GET['member']);

$sql = "INSERT INTO  `{$database}`.`volunteer_event_attendance` (`event_id` ,`member_id`) VALUES ('{$event}',  '{$member}');";
DB::query($sql);

$sql = "SELECT `first_name`, `last_name` FROM `{$database}`.`member_database` WHERE `id` = '{$member}';";
$name = DB::single($sql);
echo $name['first_name'] . ' ' . $name['last_name'];
