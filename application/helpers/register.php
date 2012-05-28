<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'show_authors_and_labels.php';
require 'admin/system/libs/user_encode.php';
User_Encode::set($database);

$years = DB::search("SELECT `id`,`desc` FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = DB::search("SELECT `id`,`desc` FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = DB::search("SELECT `id`,`desc` FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$texting = array( 0 => array('0', 'No'), 1 => array('1', 'Yes'));
$positions = DB::search("SELECT `id`,`desc` FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = DB::search("SELECT `id`,`desc` FROM `{$database}`.`tags` ORDER BY `id` ASC");
