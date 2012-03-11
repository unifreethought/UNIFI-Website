<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
require 'system/libs/user.php';
User_Parse::set($database);
 
$raw_user_data = MySQL::search("SELECT `id`,`first_name`,`last_name` FROM `{$database}`.`users` ORDER BY `first_name` ASC");
$users = array();

foreach ($raw_user_data as $user) {
	$user['id'] = MySQL::clean($user['id']);
	$tmp = MySQL::single("SELECT * FROM `{$database}`.`user-data` WHERE `id` = '{$user['id']}' LIMIT 1");
	
	$users[$user['id']] = array(
		'first_name' => $user['first_name'],
		'last_name' => $user['last_name']
	);
	
	$users[$user['id']]['id'] = $user['id'];
	
	$users[$user['id']]['year'] = User_Parse::parse_year($tmp['year']);
	$users[$user['id']]['major'] = User_Parse::parse_major($tmp['major']);
	$users[$user['id']]['dorm'] = User_Parse::parse_dorm($tmp['dorm']);
	$users[$user['id']]['recruit_place'] = $tmp['recruit_place'];
	$users[$user['id']]['texting'] = User_Parse::parse_texting($tmp['texting']);
	$users[$user['id']]['positions'] = User_Parse::parse_positions($tmp['positions']);
	$users[$user['id']]['tags'] = User_Parse::parse_tags($tmp['tags']);
	
	$users[$user['id']]['first_name'] = $user['first_name'];
	$users[$user['id']]['last_name'] = $user['last_name'];
	$users[$user['id']]['hometown'] = $tmp['hometown'];
	$users[$user['id']]['phone'] = $tmp['phone'];
	$users[$user['id']]['email'] = $tmp['email'];
	$users[$user['id']]['notes'] = $tmp['notes'];
	
	$users[$user['id']]['recruit_date'] = Date::parse($tmp['recruit_date']);
}
