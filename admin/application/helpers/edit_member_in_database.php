<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$member_id = DB::clean($_GET['member']);
$first_name = DB::clean($_GET['first_name']);
$last_name = DB::clean($_GET['last_name']);
$dorm = DB::clean($_GET['dorm']);
$year = DB::clean($_GET['year']);
$major = DB::clean($_GET['major']);
$hometown = DB::clean($_GET['hometown']);
$address = DB::clean($_GET['address']);
$recruit_place = DB::clean($_GET['recruit_place']);
$phone = DB::clean($_GET['phone']);
$email = DB::clean($_GET['email']);
$texting = DB::clean($_GET['texting']);
$notes = DB::clean($_GET['notes']);

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

DB::query($sql);
header("Location: index.php?page=member_database");
