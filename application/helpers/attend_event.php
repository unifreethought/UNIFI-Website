<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-03-06
 */
 
$event_id = MySQL::clean($_GET['event_id']);
$user_id = MySQL::clean($user_id);

$sql = "UPDATE `{$database}`.`event_notifications` SET `rsvp` = '1' WHERE `event_notifications`.`id` = '{$event_id}' AND ";
$sql .= "`event_notifications`.`user_id` = '{$user_id}';";

MySQL::query($sql);

header('Location: index.php?page=view_events');
