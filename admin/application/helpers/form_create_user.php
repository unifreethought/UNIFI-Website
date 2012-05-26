<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function arr_join($arr) {
  $tmp = '';
  foreach ($arr as $item) {
    $tmp .= $item . ',';
  }
  return substr($tmp, 0, -1);
}

// users
$id = '0';
$first_name = MySQL::clean($_POST['first_name']);
$last_name = MySQL::clean($_POST['last_name']);
$facebook = MySQL::clean($_POST['facebook']);
$cookie = MySQL::clean('0');

// user-data
$dorm = MySQL::clean($_POST['dorm']);
$year = MySQL::clean($_POST['year']);
$major = MySQL::clean($_POST['major']);
$hometown = MySQL::clean($_POST['hometown']);
$dorm = MySQL::clean($_POST['dorm']);
$recruit_date = MySQL::clean(@time());
$recruit_place = MySQL::clean($_POST['recruit_place']);
$phone = MySQL::clean($_POST['phone']);
$email = MySQL::clean($_POST['email']);
$texting = MySQL::clean($_POST['texting']);
$positions = MySQL::clean(arr_join($_POST['positions']));
$tags = MySQL::clean(arr_join($_POST['tags']));
$notes = MySQL::clean($_POST['notes']);

//echo $positions . '<br />' . $tags;

// user-permissions is all '0's

$sql = "INSERT INTO `{$database}`.`users` (`id`,`first_name`,`last_name`,`facebook`,`cookie`) VALUES ";
$sql .= "('{$id}','{$first_name}','{$last_name}','{$facebook}','{$cookie}');";
//echo $sql . '<br /><br />';
MySQL::query($sql);

$tmp_user_id = MySQL::single("SELECT `id` FROM `{$database}`.`users` WHERE `first_name` = '{$first_name}' AND `last_name` = '{$last_name}'  LIMIT 1");
//var_dump($tmp_user_id);

$sql = "INSERT INTO `{$database}`.`user-data` (`id`,`year`,`major`,`hometown`,`dorm`,`recruit_date`,`recruit_place`,`phone`,`email`,`texting`,";
$sql .= "`positions`,`tags`,`notes`) ";
$sql .= "VALUES ('{$tmp_user_id['id']}','{$year}','{$major}','{$hometown}','{$dorm}','{$recruit_date}','{$recruit_place}','{$phone}','{$email}',";
$sql .= "'{$texting}','{$positions}','{$tags}','{$notes}');";
//echo $sql . '<br /><br />';
MySQL::query($sql);

$sql = "INSERT INTO `{$database}`.`user-permissions` (`user_id`,`post_to_blog`,`access_admin_dashboard`,`view_members`,`edit_members`,`add_events`,";
$sql .= "`list_events`,`edit_events`,`edit_event_attendance`,`edit_custom_pages`) VALUES ('{$tmp_user_id['id']}','0','0','0','0','0','0','0','0','0');";
//echo $sql . '<br /><br />';
MySQL::query($sql);

Log::create($user_id, 'create_user', "name:{$first_name} {$last_name}");

header('Location: index.php');
