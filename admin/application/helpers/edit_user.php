<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
require 'system/libs/user.php';
require 'system/libs/user_encode.php';
User_Encode::set($database);
User_Parse::set($database);

// Load all of the possible user data and show it in a form.
$user = MySQL::clean($_GET['user']);

$tmp = MySQL::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '{$user}' LIMIT 1");

$user_info = array(
	'id' => $user,
	'first_name' => $tmp['first_name'],
	'last_name' => $tmp['last_name']
);

// Get the rest of the data about the user.
$tmp = MySQL::single("SELECT * FROM `{$database}`.`user-data` WHERE `id` = '{$user}' LIMIT 1");

// The db parsing requests
$user_info['year'] = User_Parse::parse_year($tmp['year']);
$user_info['major'] = User_Parse::parse_major($tmp['major']);
$user_info['dorm'] = User_Parse::parse_dorm($tmp['dorm']);
$user_info['recruit_place'] = $tmp['recruit_place'];
$user_info['texting'] = User_Parse::parse_texting($tmp['texting']);
$user_info['positions'] = User_Parse::parse_positions($tmp['positions']);
$user_info['tags'] = User_Parse::parse_tags($tmp['tags']);

// The numeric values for each value
$user_info['numeric'] = array();
$user_info['numeric']['year'] = $tmp['year'];
$user_info['numeric']['major'] = $tmp['major'];
$user_info['numeric']['dorm'] = $tmp['dorm'];
$user_info['numeric']['texting'] = $tmp['texting'];
$user_info['numeric']['positions'] = $tmp['positions'];
$user_info['numeric']['tags'] = $tmp['tags'];

// Direct Copying of data
$user_info['hometown'] = $tmp['hometown'];
$user_info['phone'] = $tmp['phone'];
$user_info['email'] = $tmp['email'];
$user_info['notes'] = $tmp['notes'];

// Date parsing
$user_info['recruit_date'] = Date::parse($tmp['recruit_date']);

//print_r($user_info);

// ====================================
// Now, get all of the possible values for each 
$years = MySQL::search("SELECT * FROM `{$database}`.`year` ORDER BY `id` ASC");
$majors = MySQL::search("SELECT * FROM `{$database}`.`major` ORDER BY `id` ASC");
$dorms = MySQL::search("SELECT * FROM `{$database}`.`dorm` ORDER BY `id` ASC");
$texting = array( 0 => array('0', 'No'), 1 => array('1', 'Yes'));
$positions = MySQL::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = MySQL::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");
