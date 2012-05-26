<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'show_authors_and_labels.php';
require 'admin/system/libs/user_encode.php';
User_Encode::set($database);

$years = MySQL::search("SELECT `id`,`desc` FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = MySQL::search("SELECT `id`,`desc` FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = MySQL::search("SELECT `id`,`desc` FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$texting = array( 0 => array('0', 'No'), 1 => array('1', 'Yes'));
$positions = MySQL::search("SELECT `id`,`desc` FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = MySQL::search("SELECT `id`,`desc` FROM `{$database}`.`tags` ORDER BY `id` ASC");
