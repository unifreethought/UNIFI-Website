<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$event_id = DB::clean($_GET['event_id']);
$user_ids = DB::search("SELECT `id` FROM `{$database}`.`users`");
$timestamp = DB::single("SELECT `end_time` FROM `{$database}`.`events` WHERE `id` = '{$event_id}' LIMIT 1");

foreach ($user_ids as $id) {
  $sql = "INSERT INTO `{$database}`.`event_notifications` (`id`,`user_id`,`event_id`,`timestamp`,`rsvp`) VALUES ";
  $sql .= "('0', '{$id['id']}', '{$event_id}', '{$timestamp['end_time']}', '0')";
  DB::query($sql);
}

header('Location: index.php');
