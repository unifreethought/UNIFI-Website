<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$event_id = DB::clean($_GET['event']);
$member_name = explode(',', DB::clean($_GET['member']));

$sql = "SELECT `id` FROM `{$database}`.`member_database` WHERE `first_name` LIKE '{$member_name[0]}' AND `last_name` LIKE '{$member_name[1]}';";
$member_id = DB::single($sql);

$sql = "DELETE FROM `{$database}`.`event_attendance` WHERE `event_attendance`.`event_id` = {$event_id} AND `event_attendance`.`member_id` = {$member_id['id']} LIMIT 1;";
DB::query($sql);

