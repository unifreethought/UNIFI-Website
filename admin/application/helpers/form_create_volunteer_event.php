<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/show_date.php';

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

$id = 0;
$title = MySQL::clean($_POST['title']);
$location = MySQL::clean($_POST['location']);
$desc = MySQL::clean($_POST['description']);

$sql = "INSERT INTO `{$database}`.`volunteer_events` (`id`,`title`,`start_time`,`end_time`,`location`,`description`) VALUES ";
$sql .= "('{$id}','{$title}','{$start}','{$end}','{$location}','{$desc}');";
MySQL::query($sql);

Log::create($user_id, 'create_volunteer_event', "title:{$title}");

header('Location: index.php');

