<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'show_authors_and_labels.php';

include 'admin/system/libs/user.php';
User_Parse::set($database);

$id = DB::clean($_GET['profile']);

$generic_data = DB::single("SELECT `first_name`,`last_name`,`facebook` FROM `{$database}`.`users` WHERE `id` = '{$id}' LIMIT 1");

// Check to see if the user actually exists
if (empty($generic_data['first_name']) || empty($user_id)) {
  include 'templates/' . $config['template'] . '/html/show_no_profile.html';
  exit();
}

$full_data = DB::single("SELECT * FROM `{$database}`.`user-data` WHERE `id` = '{$id}' LIMIT 1");

$full_data['phone'] = '(' . substr($full_data['phone'], 0, 3) . ') ' . substr($full_data['phone'], 3, 3) . '-' . substr($full_data['phone'], 5, 4);

