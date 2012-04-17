<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
include 'system/libs/user.php';
User_Parse::set($database);

$id = MySQL::clean($_GET['id']);
$sql = "SELECT * FROM `{$database}`.`alumni_database` WHERE `id` = '{$id}' LIMIT 1;";
$alumni = MySQL::single($sql);

// Prep some of the data
$start_date = explode(' ', User_Parse::parse_alumni_date($alumni['unifi_start_date']));
$end_date = explode(' ', User_Parse::parse_alumni_date($alumni['unifi_end_date']));
$positions = explode(',', $alumni['positions']);
$all_positions = MySQL::search("SELECT * FROM `{$database}`.`positions`;");
$majors = MySQL::search("SELECT * FROM `{$database}`.`major`;");
