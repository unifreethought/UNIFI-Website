<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/user.php';
User_Parse::set($database);

$first_name 	= ($_GET['first_name'] == '') ? '' : " `first_name` LIKE '%" . DB::clean($_GET['first_name']) . "%' AND ";
$last_name 		= ($_GET['last_name'] == '') ? '' : " `last_name` LIKE '%" . DB::clean($_GET['last_name']) . "%' AND ";

$year 			= ($_GET['year'] == '') ? '' : " `year` = '" . DB::clean($_GET['year']) . "' AND ";
$major 			= ($_GET['major'] == '') ? '' : " `major` = '" . DB::clean($_GET['major']) . "' AND ";
$dorm 			= ($_GET['dorm'] == '') ? '' : " `dorm` = '" . DB::clean($_GET['dorm']) . "' AND ";
$recruit_place 	= ($_GET['recruit_place'] == '') ? '' : " `recruit_place` = '" . DB::clean($_GET['recruit_place']) . "' AND ";
$phone 			= ($_GET['phone'] == '') ? '' : " `phone` LIKE '%" . DB::clean($_GET['phone']) . "%' AND ";
$texting 		= ($_GET['texting'] == '') ? '' : " `texting` = '" . DB::clean($_GET['texting']) . "' AND ";
$hometown 		= ($_GET['hometown'] == '') ? '' : " `hometown` LIKE '%" . DB::clean($_GET['hometown']) . "%' AND ";
$address 		= ($_GET['address'] == '') ? '' : " `address` LIKE '%" . DB::clean($_GET['address']) . "%' AND ";
$email 			= ($_GET['email'] == '') ? '' : " `email` LIKE '%" . DB::clean($_GET['email']) . "%' AND ";

$positions_bad 	= explode(',', $_GET['positions']);
$tags_bad		= explode(',', $_GET['tags']);
$tags = $positions = '';

if (!empty($tags_bad)) {
	foreach ($tags_bad as $item) {
		if ($item != '')
			$tags .= "LIKE '%" . DB::clean($item) . "%' AND ";
	}
} else {
	$tags = '';
}

if (!empty($positions_bad)) {
	foreach ($positions_bad as $item) {
		if ($item != '')
			$positions .= "LIKE '%" . DB::clean($item) . "%' AND ";
	}
} else {
	$positions = '';
}

$sql = "SELECT * FROM `{$database}`.`member_database` WHERE {$first_name}{$last_name}{$year}{$major}{$dorm}{$recruit_place}";
$sql .= "{$phone}{$texting}{$hometown}{$address}{$email}{$tags}{$positions}";

$sql = substr($sql, 0, -5);
$members = DB::search($sql);

