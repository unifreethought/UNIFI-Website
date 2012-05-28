<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/user.php';
User_Parse::set($database);

$members = DB::search("SELECT * FROM `{$database}`.`member_database` ORDER BY `first_name` ASC");

$years = DB::search("SELECT * FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = DB::search("SELECT * FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = DB::search("SELECT * FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$texting = array( 0 => array('0', 'No'), 1 => array('1', 'Yes'));
$positions = DB::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = DB::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");
