<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function arr_join($arr) {
  $tmp = '';
  $arr = explode(',', $arr);
  foreach ($arr as $item) {
    $tmp .= $item . ',';
  }
  return substr($tmp, 0, -1);
}


$id = '0';
$first_name = DB::clean($_GET['first_name']);
$last_name = DB::clean($_GET['last_name']);
$dorm = DB::clean($_GET['dorm']);
$year = DB::clean($_GET['year']);
$major = DB::clean($_GET['major']);
$hometown = DB::clean($_GET['hometown']);
$address = DB::clean($_GET['address']);
$dorm = DB::clean($_GET['dorm']);
$recruit_date = DB::clean(@time());
$recruit_place = DB::clean($_GET['recruit_place']);
$phone = DB::clean($_GET['phone']);
$email = DB::clean($_GET['email']);
$texting = DB::clean($_GET['texting']);
$positions = DB::clean(arr_join($_GET['positions']));
$tags = DB::clean(arr_join($_GET['tags']));

// Strip any non-numeric characters from the phone number
$phone = preg_replace("/[^0-9]/i", '', $phone);

$sql = "INSERT INTO `{$database}`.`member_database` (`id`,`first_name`,`last_name`,`year`,`major`,`hometown`, `address`,`dorm`,`recruit_date`,`recruit_place`,`phone`,`email`,`texting`,";
$sql .= "`positions`,`tags`) ";
$sql .= "VALUES ('0', '{$first_name}', '{$last_name}','{$year}','{$major}','{$hometown}', '{$address}','{$dorm}','{$recruit_date}','{$recruit_place}','{$phone}','{$email}',";
$sql .= "'{$texting}','{$positions}','{$tags}');";
DB::query($sql);
