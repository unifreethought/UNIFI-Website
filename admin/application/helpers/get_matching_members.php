<?php
/**
 * UNIFI Member Database
 * Adam Shannon
 */
function build_query_part($stubs, $middle) {
  return $stubs[0] . $middle . $stubs[1];
}

$first_clean = MySQL::clean($_GET['first']);
$last_clean = MySQL::clean($_GET['last']);

$first_stub = array("`first_name` LIKE '%", "%'");
$last_stub  = array("`last_name`  LIKE '%", "%'");

$first = build_query_part($first_stub, $first_clean);
$last  = build_query_part($last_stub, $last_clean);
$or = ' OR ';

if ($first_clean == "" || $first_clean == "undefined") {
  $first = build_query_part($first_stub, $last_clean);
}

if ($last_clean == "" || $last_clean == "undefined") {
  $last = build_query_part($last_stub, $first_clean);
}

$sql = "SELECT `id`,`first_name`,`last_name` FROM `{$database}`.`member_database` WHERE {$first} {$or} {$last} LIMIT 10;";
$results = MySQL::search($sql);
echo json_encode($results);

