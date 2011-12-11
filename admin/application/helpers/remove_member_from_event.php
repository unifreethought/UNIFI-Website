<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$event_id = MySQL::clean($_GET['event']);
$member_name = explode(',', MySQL::clean($_GET['member']));

// Pull the member id
$sql = "SELECT `id` FROM `{$database}`.`member_database` WHERE `first_name` LIKE '{$member_name[0]}' AND `last_name` LIKE '{$member_name[1]}';";
$member_id = MySQL::single($sql);

// Remove the member from the DB
$sql = "DELETE FROM `{$database}`.`event_attendance` WHERE `event_attendance`.`event_id` = {$event_id} AND `event_attendance`.`member_id` = {$member_id['id']} LIMIT 1;";
MySQL::query($sql);

