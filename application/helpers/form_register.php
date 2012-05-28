<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$first_name = DB::clean($_POST['first_name']);
$last_name = DB::clean($_POST['last_name']);
$gender = DB::clean($_POST['gender']);
$year = DB::clean($_POST['year']);
$major = DB::clean($_POST['major']);
$dorm = DB::clean($_POST['dorm']);
$texting = DB::clean($_POST['texting']);
$hometown = DB::clean($_POST['hometown']);
$phone = DB::clean($_POST['phone']);
$email = DB::clean($_POST['email']);

// Strip any non-numeric characters from the phone number
$phone = preg_replace("/[^0-9]/i", '', $phone);

$id = '0';
$facebook = DB::clean($fb_id);
$cookie = '';

$sql = "INSERT INTO `{$database}`.`users` (`id`, `first_name`, `last_name`, `facebook`, `cookie`) VALUES ";
$sql .= "('{$id}', '{$first_name}', '{$last_name}', '{$facebook}', '{$cookie}');";
DB::query($sql);

// `user-data`
$tmp_user_id = DB::single("SELECT `id` FROM `{$database}`.`users` WHERE `facebook` = '{$facebook}'  LIMIT 1");
$recruit_date = '0';
$recruit_place = '';
$positions = '';
$tags = '';
$notes = '';

$sql = "INSERT INTO `{$database}`.`user-data` (`id`, `year`, `major`, `hometown`, `dorm`, `recruit_date`, `recruit_place`, `phone`, `email`, `texting`,";
$sql .= "`positions`, `tags`, `notes`) VALUES ('{$tmp_user_id['id']}', '{$year}', '{$major}', '{$hometown}', '{$dorm}', '{$recruit_date}', '{$recruit_place}',";
$sql .= "'{$phone}', '{$email}', '{$texting}', '{$positions}', '{$tags}', '{$notes}');";
DB::query($sql);

// Add the user to the member_database table.
// We should first make sure they don't exist already.
$sql = "SELECT `id` FROM `{$database}`.`member_database` WHERE `first_name` = '{$first_name}' AND `last_name` = '{$last_name}';";
$result = DB::single($sql);
if (empty($result['id'])) {
  $sql = "INSERT INTO `{$database}`.`member_database` (`id`, `first_name`, `last_name`, `year`, `major`, `hometown`, `dorm`, `recruit_date`, `recruit_place`, `phone`, `email`, `texting`, `positions`, `tags`, `notes`)";
  $sql .= " VALUES ('0', '{$first_name}', '{$last_name}', '{$year}', '{$major}', '{$hometown}', '{$dorm}', '{$recruit_date}', '{$recruit_place}', '{$phone}', '{$email}', '{$texting}', '{$positions}', '{$tags}', '');";
  DB::query($sql);
}

// `user-permissions`
$post_to_blog = '0';
$access_admin_dashboard = '0';
$view_members = '0';
$edit_members = '0';
$add_events = '0';
$list_events = '0';
$edit_events = '0';
$edit_event_attendance = '0';
$edit_custom_pages = '0';
$view_log = 0;

$sql = "INSERT INTO `{$database}`.`user-permissions` (`user_id`, `post_to_blog`, `access_admin_dashboard`, `view_members`, `edit_members`,";
$sql .= " `add_events`, `list_events`, `edit_events`, `edit_event_attendance`, `edit_custom_pages`, `view_log`) VALUES ('{$tmp_user_id['id']}', '{$post_to_blog}', '{$access_admin_dashboard}',";
$sql .= " '{$view_members}', '{$edit_members}', '{$add_events}', '{$list_events}', '{$edit_events}', '{$edit_event_attendance}', '{$edit_custom_pages}', '{$view_log}');";
DB::query($sql);

// Log the creation
Log::create($user_id, 'register', "name:{$first_name} {$last_name}");

// Send an email out about the registration.
$subject = 'A new user registration';
$message = "A new user ({$first_name} {$last_name}) has registered on the website!";
$headers = 'From: contact@unifreethought.com\n\r';
mail('membership@unifreethought.com', $subject, $message, $headers);
mail('webmaster@unifreethought.com', $subject, $message, $headers);

header("Location: index.php");
exit();
