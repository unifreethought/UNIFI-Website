<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

require 'system/libs/user.php';
require 'system/libs/user_encode.php';
User_Encode::set($database);
User_Parse::set($database);

// Now, get all of the possible values for each
$years = DB::search("SELECT * FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = DB::search("SELECT * FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = DB::search("SELECT * FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$texting = array( 0 => array('0', 'No'), 1 => array('1', 'Yes'));
$positions = DB::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = DB::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");
