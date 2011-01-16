<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
require 'admin/system/libs/user_encode.php';
User_Encode::set($database);

$years = MySQL::search("SELECT * FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = MySQL::search("SELECT * FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = MySQL::search("SELECT * FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$recruit_places = MySQL::search("SELECT * FROM `{$database}`.`recruit_place` ORDER BY `id` ASC");
$texting = array( 0 => array('0', 'No'), 1 => array('1', 'Yes'));
$positions = MySQL::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = MySQL::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");
