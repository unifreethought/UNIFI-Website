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

if (substr($sql, -2) != "W;") {
  $people = MySQL::search($sql);
} else {
  $people = array();
}

$events = clean_each($_GET['event']);
$events_str = "";

$sql = "SELECT * FROM `{$database}`.`event_attendance` WHERE ";
foreach ($events as $e) {
	$sql .= '`event_id` = "' . $e . '" OR ';
}

$sql = substr($sql, 0, -4) . ';';
if (substr($sql, -4) != " WH;") {
  $events = MySQL::search($sql);
} else {
  $events = array();
}

$results = array();

foreach ($people as $person) {
  $results[] = $person;
}

// Filter out people not already in the array
function checkEventAttendance($person) {
  $needToAdd = true;
  foreach ($results as $alreadyIn) {
    if ($alreadyIn['user_id'] == $person['id'])
      $needToAdd = false;
  }
  return $needToAdd;
}

$pplToAdd = array_filter($events, "checkEventAttendance");
$pplAlreadyAdded = array();

foreach ($pplToAdd as $person) {
  $needToGrabData = true;
  foreach ($results as $alreadyIn) {
    if ($alreadyIn['id'] == $person['user_id']) {
      $needToGrabData = false;
    }
  }

  if ($needToGrabData) {
    $sql = "SELECT `first_name`,`last_name` FROM `{$database}`.`member_database` WHERE `id` = '{$person['user_id']}' LIMIT 1;";
    if (!in_array($sql, $pplAlreadyAdded)) {
      $results[] = MySQL::single($sql);
    }
    $pplAlreadyAdded[] = $sql;
  }
  $needToGrabData = true;
}

