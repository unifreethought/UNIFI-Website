<?php
/**
 * UNIFI Admin Member Database
 * Adam Shannon
 * 2011-01-20
 */

// I'm neglecting positions AND tags right now..
// Also, we should be grabbing results for each item and comparing them
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
$phone 			= ($_GET['phone'] == '') ? '' : " `phone` = '" . MySQL::clean($_GET['phone']) . "' AND ";
$email 			= ($_GET['email'] == '') ? '' : " `email` = '" . MySQL::clean($_GET['email']) . "' AND ";

//print "\"{$first_name}{$last_name}\"<br />";
//print "\"{$year}{$major}{$dorm}{$recruit_place}{$texting}{$hometown}{$phone}{$email}\"<br/ >";

if ($first_name !== '' || $last_name !== '') {
	// Generate results to search within
	//echo "SELECT `id` FROM `{$database}`.`users` WHERE " . substr($first_name . $last_name, 0, -5) . '<br />';
	$possible_results = MySQL::search("SELECT `id` FROM `{$database}`.`users` WHERE " . substr($first_name . $last_name, 0, -5));
	echo 'First or Last Name:';
	print_r($possible_results);
	echo '<br /><br />';
} else {
	// Alright, so I'm not completely sure how I want to go about this.
	// I'm thinking that I should pull each result down and inter-compare,
	// but that's a lot of work.
	// Why not do the same that I used to do and pull them with AND's?
	$sql2 = substr($year . $major . $dorm . $recruit_place . $texting . $hometown . $phone . $email, 0, -5);
	$possible_results = MySQL::search("SELECT `id` FROM `{$database}`.`user-data` WHERE " . $sql2);
	echo 'Other:';
	print_r($possible_results);
	echo '<br /><br />';
}

