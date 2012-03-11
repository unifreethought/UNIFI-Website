<?php
/**
 * UNIFI Admin Member Database
 * Adam Shannon
 * 2011-01-20
 */
require 'system/libs/user.php';
User_Parse::set($database);

// We should be grabbing results for each item and comparing them
// to get the "most relevant" results. That way we can filter them in
// relevance.
$first_name 	= ($_GET['first_name'] == '') ? '' : " `first_name` = '" . MySQL::clean($_GET['first_name']) . "' AND ";
$last_name 		= ($_GET['last_name'] == '') ? '' : " `last_name` = '" . MySQL::clean($_GET['last_name']) . "' AND ";

$year 			= ($_GET['year'] == '0') ? '' : " `year` = '" . MySQL::clean($_GET['year']) . "' AND ";
$major 			= ($_GET['major'] == '0') ? '' : " `major` = '" . MySQL::clean($_GET['major']) . "' AND ";
$dorm 			= ($_GET['dorm'] == '0') ? '' : " `dorm` = '" . MySQL::clean($_GET['dorm']) . "' AND ";
$recruit_place 	= ($_GET['recruit_place'] == '0') ? '' : " `recruit_place` = '" . MySQL::clean($_GET['recruit_place']) . "' AND ";
$texting 		= ($_GET['texting'] == '-1') ? '' : " `texting` = '" . MySQL::clean($_GET['texting']) . "' AND ";
$hometown 		= ($_GET['hometown'] == '') ? '' : " `hometown` = '" . MySQL::clean($_GET['hometown']) . "' AND ";
$address 		= ($_GET['address'] == '') ? '' : " `address` = '" . MySQL::clean($_GET['address']) . "' AND ";
$phone 			= ($_GET['phone'] == '') ? '' : " `phone` = '" . MySQL::clean($_GET['phone']) . "' AND ";
$email 			= ($_GET['email'] == '') ? '' : " `email` = '" . MySQL::clean($_GET['email']) . "' AND ";

$tags_bad = (empty($_GET['tags'])) ? array() : $_GET['tags'];
$positions_bad = (empty($_GET['positions'])) ? array() : $_GET['positions'];

$tags_table = ' `tags` ';
$positions_table = ' `positions` ';

$tags = '';
$positions = ' AND ';
foreach ($tags_bad as $item) {
	$tags .= $tags_table . "LIKE '%" . MySQL::clean($item) . "%' AND ";
}

foreach ($positions_bad as $item) {
	$positions .= $positions_table . "LIKE '%" . MySQL::clean($item) . "%' AND ";
}

$tags = substr($tags, 0, -5);
$positions = substr($positions, 0, -5);

if (empty($tags)) {
	$positions = substr($positions, 5);
}

if ($first_name !== '' || $last_name !== '') {
	// Generate results to search within
	$possible_results = MySQL::search("SELECT `id` FROM `{$database}`.`users` WHERE " . substr($first_name . $last_name, 0, -5));
} else {
	// Alright, so I'm not completely sure how I want to go about this.
	// I'm thinking that I should pull each result down and inter-compare,
	// but that's a lot of work.
	// Why not do the same that I used to do and pull them with AND's?
	$sql2 = "SELECT `id` FROM `{$database}`.`user-data` WHERE ";
	$sql2 .= substr($year . $major . $dorm . $recruit_place . $texting . $hometown . $phone . $email, 0, -5);
	$sql2 .= $tags . $positions;
	$possible_results = MySQL::search($sql2);
}

$users = array();
foreach ($possible_results as $user) {
	$user['id'] = MySQL::clean($user['id']);
	$tmp = MySQL::single("SELECT * FROM `{$database}`.`user-data` WHERE `id` = '{$user['id']}' LIMIT 1");
	
	$tmp_data = MySQL::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '{$user['id']}' LIMIT 1");
	$users[$user['id']] = array(
		'first_name' => $tmp_data['first_name'],
		'last_name' => $tmp_data['last_name']
	);
	
	$users[$user['id']]['id'] = $user['id'];
	
	$users[$user['id']]['year'] = User_Parse::parse_year($tmp['year']);
	$users[$user['id']]['major'] = User_Parse::parse_major($tmp['major']);
	$users[$user['id']]['dorm'] = User_Parse::parse_dorm($tmp['dorm']);
	$users[$user['id']]['recruit_place'] = User_Parse::parse_recruit_place($tmp['recruit_place']);
	$users[$user['id']]['texting'] = User_Parse::parse_texting($tmp['texting']);
	$users[$user['id']]['positions'] = User_Parse::parse_positions($tmp['positions']);
	$users[$user['id']]['tags'] = User_Parse::parse_tags($tmp['tags']);
	
	$users[$user['id']]['hometown'] = $tmp['hometown'];
	$users[$user['id']]['address'] = $tmp['address'];
	$users[$user['id']]['phone'] = $tmp['phone'];
	$users[$user['id']]['email'] = $tmp['email'];
	$users[$user['id']]['notes'] = $tmp['notes'];
	
	$users[$user['id']]['recruit_date'] = Date::parse($tmp['recruit_date']);
}

