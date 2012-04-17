<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function clean_each($arr) {
	if (empty($arr))
		return;

	$ret = array();
	foreach ($arr as $a) {
		$ret[] = MySQL::clean($a);
	}
	return $ret;
}

function build_sql_part($arr, $field) {
	if (empty($arr))
		return "";

	$ret = "";
	foreach ($arr as $a) {
		$ret .= "`{$field}` = '{$a}' OR ";
	}
	return substr($ret, 0, -3);
}

function print_sql_part($str) {
	if (strlen($str) > 3)
		return $str . ' AND ';
}

$years = clean_each($_GET['year']);
$dorms = clean_each($_GET['dorm']);
$positions = clean_each($_GET['position']);
$tags = clean_each($_GET['tag']);

$sql = "SELECT `id`,`first_name`,`last_name` FROM `{$database}`.`member_database` WHERE ";

$years_str = build_sql_part($years, 'year');
$dorms_str = build_sql_part($dorms, 'dorm');
$positions_str = build_sql_part($positions, 'positions');
$tags_str = build_sql_part($tags, 'tags');

$sql .= print_sql_part($years_str) . print_sql_part($dorms_str) .
	print_sql_part($positions_str) . print_sql_part($tags_str);
$sql = substr($sql, 0, -5) . ';';

$people = MySQL::search($sql);

$events = clean_each($_GET['event']);
$events_str = "";

$sql = "SELECT * FROM `{$database}`.`event_attendance` WHERE ";
foreach ($events as $e) {
	$sql .= '`event_id` = "' . $e . '" OR ';
}

$sql = substr($sql, 0, -4) . ';';

$events = MySQL::search($sql);

$results = array();

if (empty($people) || empty($events)) {
	$results = $people;
} else {
	foreach ($people as $p) {
		foreach ($events as $e) {
			if ($p['id'] == $e['member_id'])
				$results[] = $p;
		}
	}
}

