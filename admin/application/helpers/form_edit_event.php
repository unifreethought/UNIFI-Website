<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
include 'system/libs/show_date.php';
 
$id = MySQL::clean($_POST['event_id']);
$title = MySQL::clean(htmlentities($_POST['title']));
$location = MySQL::clean(htmlentities($_POST['location']));
$description = MySQL::clean(htmlentities($_POST['description']));

// Break apart the starting hour/minute.
$_POST['start_hour'] = explode(':', $_POST['start_hour']);
$start_hour = $_POST['start_hour'][0];
$start_min = $_POST['start_hour'][1];

// Break apart the ending hour/minute.
$_POST['end_hour'] = explode(':', $_POST['end_hour']);
$end_hour = $_POST['end_hour'][0];
$end_min = $_POST['end_hour'][1];

$start = Show_Date::timestamp($start_hour, $start_min, $_POST['start_day'], $_POST['start_month'], $_POST['start_year']);
$end = Show_Date::timestamp($end_hour, $end_min, $_POST['end_day'], $_POST['end_month'], $_POST['end_year']);

//exit("start:{$start}, end:{$end}");

$sql = "UPDATE  `{$database}`.`events` SET `title` = '{$title}',`start_time` = '{$start}',`end_time` = '{$end}',";
$sql .= "`location` = '{$location}',`description` = '{$description}' WHERE `events`.`id` = {$id};";

MySQL::query($sql);

header("Location: index.php?page=edit_event&event=" . $id);
exit();

