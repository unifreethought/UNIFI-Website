<?php
/** 
 * UNIFI Website
 * Adam Shannon
 */
 
include 'system/libs/user.php';
User_Parse::set($database);

$first_name 	= ($_GET['first_name'] == '') ? '' : " `first_name` = '" . MySQL::clean($_GET['first_name']) . "' AND ";
$last_name 		= ($_GET['last_name'] == '') ? '' : " `last_name` = '" . MySQL::clean($_GET['last_name']) . "' AND ";

$year 			= ($_GET['year'] == '') ? '' : " `year` = '" . MySQL::clean($_GET['year']) . "' AND ";
$major 			= ($_GET['major'] == '') ? '' : " `major` = '" . MySQL::clean($_GET['major']) . "' AND ";
$dorm 			= ($_GET['dorm'] == '') ? '' : " `dorm` = '" . MySQL::clean($_GET['dorm']) . "' AND ";
$recruit_place 	= ($_GET['recruit_place'] == '') ? '' : " `recruit_place` = '" . MySQL::clean($_GET['recruit_place']) . "' AND ";
$phone 			= ($_GET['phone'] == '') ? '' : " `phone` = '" . MySQL::clean($_GET['phone']) . "' AND ";
$texting 		= ($_GET['texting'] == '') ? '' : " `texting` = '" . MySQL::clean($_GET['texting']) . "' AND ";
$hometown 		= ($_GET['hometown'] == '') ? '' : " `hometown` = '" . MySQL::clean($_GET['hometown']) . "' AND ";
$address 		= ($_GET['address'] == '') ? '' : " `address` = '" . MySQL::clean($_GET['address']) . "' AND ";
$email 			= ($_GET['email'] == '') ? '' : " `email` = '" . MySQL::clean($_GET['email']) . "' AND ";

$positions_bad 	= explode(',', $_GET['positions']);
$tags_bad		= explode(',', $_GET['tags']);
$tags = $positions = '';

if (!empty($tags_bad)) {
	// Clean up positions and tags
	foreach ($tags_bad as $item) {
		if ($item != '')
			$tags .= "LIKE '%" . MySQL::clean($item) . "%' AND ";
	}
} else {
	$tags = '';
}

if (!empty($positions_bad)) {
	foreach ($positions_bad as $item) {
		if ($item != '')
			$positions .= "LIKE '%" . MySQL::clean($item) . "%' AND ";
	}
} else {
	$positions = '';
}

// Build the query
$sql = "SELECT * FROM `{$database}`.`member_database` WHERE {$first_name}{$last_name}{$year}{$major}{$dorm}{$recruit_place}";
$sql .= "{$phone}{$texting}{$hometown}{$address}{$email}{$tags}{$positions}";

$sql = substr($sql, 0, -5);
$members = MySQL::search($sql);
