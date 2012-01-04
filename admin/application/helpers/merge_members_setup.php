<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
 
include 'system/libs/user.php';
User_Parse::set($database);
 
$first = MySQL::clean($_POST['first_id']);
$second = MySQL::clean($_POST['second_id']);

// Grab the information for both members
$first_sql = MySQL::single("SELECT * FROM `{$database}`.`member_database` WHERE `id` = '{$first}' LIMIT 1;");
$second_sql = MySQL::single("SELECT * FROM `{$database}`.`member_database` WHERE `id` = '{$second}' LIMIT 1;");

$positions = MySQL::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = MySQL::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");

