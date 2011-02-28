<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

include 'admin/system/libs/user.php';
User_Parse::set($database);

// Pull the relevant profile data about a user.
// Eventually, we'll only pull the data that you want to give access to,
// which will be based on the auth of the user requesting the page.
// But, for now show all of the data!!
$id = MySQL::clean($_GET['profile']);

$generic_data = MySQL::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '{$id}' LIMIT 1");
//print_r($generic_data);

$full_data = MySQL::single("SELECT * FROM `{$database}`.`user-data` WHERE `id` = '{$id}' LIMIT 1");
//print_r($full_data);

