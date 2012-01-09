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
$first_name = MySQL::clean($_GET['first_name']);
$last_name = MySQL::clean($_GET['last_name']);
$dorm = MySQL::clean($_GET['dorm']);
$year = MySQL::clean($_GET['year']);
$major = MySQL::clean($_GET['major']);
$hometown = MySQL::clean($_GET['hometown']);
$address = MySQL::clean($_GET['address']);
$dorm = MySQL::clean($_GET['dorm']);
$recruit_date = MySQL::clean(@time());
$recruit_place = MySQL::clean($_GET['recruit_place']);
$phone = MySQL::clean($_GET['phone']);
$email = MySQL::clean($_GET['email']);
$texting = MySQL::clean($_GET['texting']);
$positions = MySQL::clean(arr_join($_GET['positions']));
$tags = MySQL::clean(arr_join($_GET['tags']));

// Strip any non-numeric characters from the phone number
$phone = preg_replace("/[^0-9]/i", '', $phone);

$sql = "INSERT INTO `{$database}`.`member_database` (`id`,`first_name`,`last_name`,`year`,`major`,`hometown`, `address`,`dorm`,`recruit_date`,`recruit_place`,`phone`,`email`,`texting`,";
$sql .= "`positions`,`tags`) ";
$sql .= "VALUES ('0', '{$first_name}', '{$last_name}','{$year}','{$major}','{$hometown}', '{$address},'{$dorm}','{$recruit_date}','{$recruit_place}','{$phone}','{$email}',";
$sql .= "'{$texting}','{$positions}','{$tags}');";
//echo $sql;
MySQL::query($sql);
