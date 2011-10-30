<?php
/** 
 * UNIFI Member Database
 * Adam Shannon
 */
$first = "`first_name` LIKE '%" . MySQL::clean($_GET['first']) . "%'";
$last = "`last_name` LIKE '%" . MySQL::clean($_GET['last']) . "%'";
$onlyOneCondition = false;

if ($first == "`first_name` = ''") {
	$first = '';
	$onlyOneCondition = true;
}

if ($last = "`last_name` = ''") {
	$last = '';
	$onlyOneCondition = true;
}

if ($onlyOneCondition) {
	$or = '';
} else {
	$or = ' OR ';
}

$results = MySQL::search("SELECT `id`,`first_name`,`last_name` FROM `{$database}`.`member_database` WHERE {$first} {$or} {$last};");
echo json_encode($results);
