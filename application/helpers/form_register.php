<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-01-10
 */

//print_r($_POST);
$first_name = MySQL::clean($_POST['first_name']);
$last_name = MySQL::clean($_POST['last_name']);
$gender = MySQL::clean($_POST['gender']);
$year = MySQL::clean($_POST['year']);
$major = MySQL::clean($_POST['major']);
$dorm = MySQL::clean($_POST['dorm']);
$texting = MySQL::clean($_POST['texting']);
$hometown = MySQL::clean($_POST['hometown']);
$phone = MySQL::clean($_POST['phone']);
$email = MySQL::clean($_POST['email']);

// `users`
$id = '0';
// $first_name
// $last_name
$facebook = MySQL::clean($fb_id);
$cookie = '';

$sql = "INSERT INTO `{$database}`.`users` (`id`, `first_name`, `last_name`, `facebook`, `cookie`) VALUES ";
$sql .= "('{$id}', '{$first_name}', '{$last_name}', '{$facebook}', '{$cookie}');";
//echo $sql . '<br /><br />';
MySQL::query($sql);

// `user-data`
$tmp_user_id = MySQL::single("SELECT `id` FROM `{$database}`.`users` WHERE `facebook` = '{$facebook}'  LIMIT 1");
//echo "SELECT `id` FROM `{$database}`.`users` WHERE `facebook` = '{$facebook}'  LIMIT 1<br />";
//print_r($tmp_user_id);
// $year
// $major
// $hometown
// $dorm
$recruit_date = '0';
$recruit_place = '0';
// $phone
// $email
// $texting
$positions = '';
$tags = '';
$notes = '';

$sql = "INSERT INTO `{$database}`.`user-data` (`id`, `year`, `major`, `hometown`, `dorm`, `recruit_date`, `recruit_place`, `phone`, `email`, `texting`,";
$sql .= "`positions`, `tags`, `notes`) VALUES ('{$tmp_user_id['id']}', '{$year}', '{$major}', '{$hometown}', '{$dorm}', '{$recruit_date}', '{$recruit_place}',";
$sql .= "'{$phone}', '{$email}', '{$texting}', '{$positions}', '{$tags}', '{$notes}');";
//echo $sql . '<br /><br />';
MySQL::query($sql);

// `user-permissions`
// $user_id
$post_to_blog = '0';
$access_admin_dashbord = '0';
$view_members = '0';
$edit_members = '0';
$add_events = '0';
$list_events = '0';
$edit_events = '0';
$edit_event_attendance = '0';
$edit_custom_pages = '0';
$view_log = 0;

$sql = "INSERT INTO `{$database}`.`user-permissions` (`user_id`, `post_to_blog`, `access_admin_dashbord`, `view_members`, `edit_members`,";
$sql .= " `add_events`, `list_events`, `edit_events`, `edit_event_attendance`, `edit_custom_pages`, `view_log`) VALUES ('{$tmp_user_id['id']}', '{$post_to_blog}', '{$access_admin_dashbord}',";
$sql .= " '{$view_members}', '{$edit_members}', '{$add_events}', '{$list_events}', '{$edit_events}', '{$edit_event_attendance}', '{$edit_custom_pages}', '{$view_log}');";
//echo $sql . '<br /><br />';
MySQL::query($sql);

header("Location: index.php");
exit();
