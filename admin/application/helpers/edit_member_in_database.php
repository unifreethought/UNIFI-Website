<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$member_id = MySQL::clean($_GET['member']);
$first_name = MySQL::clean($_GET['first_name']);
$last_name = MySQL::clean($_GET['last_name']);
$dorm = MySQL::clean($_GET['dorm']);
$year = MySQL::clean($_GET['year']);
$major = MySQL::clean($_GET['major']);
$hometown = MySQL::clean($_GET['hometown']);
$address = MySQL::clean($_GET['address']);
$recruit_place = MySQL::clean($_GET['recruit_place']);
$phone = MySQL::clean($_GET['phone']);
$email = MySQL::clean($_GET['email']);
$texting = MySQL::clean($_GET['texting']);
$notes = MySQL::clean($_GET['notes']);

$sql = "UPDATE  `{$database}`.`member_database`";
	$sql .= " SET  `first_name` =  '{$first_name}'";
	$sql .= ", `last_name` =  '{$last_name}'";
	$sql .= ", `dorm` =  '{$dorm}'";
	$sql .= ", `year` =  '{$year}'";
	$sql .= ", `major` =  '{$major}'";
	
	$sql .= ", `hometown` =  '{$hometown}'";
	$sql .= ", `address` = '{$address}'";
	$sql .= ", `recruit_place` =  '{$recruit_place}'";
	$sql .= ", `phone` =  '{$phone}'";
	$sql .= ", `email` =  '{$email}'";
	$sql .= ", `texting` =  '{$texting}'";
	$sql .= ", `notes` = '{$notes}'";
$sql .= " WHERE  `member_database`.`id` = '{$member_id}';";

MySQL::query($sql);
header("Location: index.php?page=member_database");
