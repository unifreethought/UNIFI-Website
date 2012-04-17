<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-03-06
 */

$event_id = MySQL::clean($_GET['event_id']);
$user_ids = MySQL::search("SELECT `id` FROM `{$database}`.`users`");
$timestamp = MySQL::single("SELECT `end_time` FROM `{$database}`.`events` WHERE `id` = '{$event_id}' LIMIT 1");

foreach ($user_ids as $id) {
  $sql = "INSERT INTO `{$database}`.`event_notifications` (`id`,`user_id`,`event_id`,`timestamp`,`rsvp`) VALUES ";
  $sql .= "('0', '{$id['id']}', '{$event_id}', '{$timestamp['end_time']}', '0')";
  MySQL::query($sql);
}

header('Location: index.php');
