<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
include 'system/libs/user.php';
User_Parse::set($database);

$id = DB::clean($_GET['id']);
$sql = "SELECT * FROM `{$database}`.`alumni_database` WHERE `id` = '{$id}' LIMIT 1;";
$alumni = DB::single($sql);

// Prep some of the data
$start_date = explode(' ', User_Parse::parse_alumni_date($alumni['unifi_start_date']));
$end_date = explode(' ', User_Parse::parse_alumni_date($alumni['unifi_end_date']));
$positions = explode(',', $alumni['positions']);
$all_positions = DB::search("SELECT * FROM `{$database}`.`positions`;");
$majors = DB::search("SELECT * FROM `{$database}`.`major`;");
