<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$id = DB::clean($_POST['id']);
$first_name = DB::clean($_POST['first_name']);
$last_name = DB::clean($_POST['last_name']);
$sql = "UPDATE  `{$database}`.`users` SET  `first_name` =  '{$first_name}', `last_name` = '{$last_name}' WHERE  `users`.`id` = '{$id}';";
DB::query($sql);

// `user-data`
$year = DB::clean($_POST['year']);
$major = DB::clean($_POST['major']);
$dorm = DB::clean($_POST['dorm']);
$recruit_place = DB::clean($_POST['recruit_place']);
$texting = DB::clean($_POST['texting']);
$hometown = DB::clean($_POST['hometown']);
$phone = DB::clean($_POST['phone']);
$email = DB::clean($_POST['email']);
$notes = DB::clean($_POST['notes']);
$positions = '';
$tags = '';

if (!empty($_POST['positions'])) {
  foreach ($_POST['positions'] as $p) {
    $positions .= $p . ', ';
  }
  $positions = substr($positions, 0, -2);
} else {
  $positions = '';
}

if (!empty($_POST['tags'])) {
  foreach ($_POST['tags'] as $t) {
    $tags .= $t . ', ';
  }
  $tags = substr($tags, 0, -2);
} else {
  $tags = '';
}

$sql = "UPDATE `{$database}`.`user-data` SET `year` = '{$year}', `major` = '{$major}', `dorm` = '{$dorm}', `recruit_place` = '{$recruit_place}'";
$sql .= ", `texting` = '{$texting}', `hometown` = '{$hometown}', `phone` = '{$phone}', `email` = '{$email}', `notes` = '{$notes}'";
$sql .= ", `positions` = '{$positions}', `tags` = '{$tags}' WHERE `user-data`.`id` = '{$id}'";
DB::query($sql);

Log::create($user_id, 'edit_user', "name:{$first_name} {$last_name}");

header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
