<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$id = MySQL::clean($_POST['event_id']);
$title = MySQL::clean(htmlentities($_POST['title']));
$location = MySQL::clean(htmlentities($_POST['location']));
$start_time = MySQL::clean($_POST['start_time']);
$end_time = MySQL::clean($_POST['end_time']);
$description = MySQL::clean(htmlentities($_POST['description']));

$sql = "UPDATE  `{$database}`.`events` SET `title` = '{$title}',`start_time` = '{$start_time}',`end_time` = '{$end_time}',";
$sql .= "`location` = '{$location}',`description` = '{$description}' WHERE `events`.`id` = {$id};";

MySQL::query($sql);

header("Location: index.php?page=edit_event&event_id=" . $id);
exit();

