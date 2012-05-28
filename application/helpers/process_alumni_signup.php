<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

// Submitted Values
$first_name = DB::clean($_POST['first_name']);
$last_name = DB::clean($_POST['last_name']);
$major = DB::clean($_POST['major']);
$grad_school = DB::clean($_POST['grad_school']);
$current_location = DB::clean($_POST['current_location']);
$email = DB::clean($_POST['email']);
$current_job = DB::clean($_POST['current_job']);
$phone = DB::clean($_POST['phone']);

// Strip any non-numeric characters from the phone number
$phone = preg_replace("/[^0-9]/i", '', $phone);

// Generated Values
$id = "0";
$member_id = "0";
// $user_id // Already exists
$unifi_start_date = "0";
$unifi_end_date = "1";
$positions = "";
$current_location_coords = "";
$notes = "";

// Build the query
$sql  = "INSERT INTO `{$database}`.`alumni_database` (`id`,`member_id`,`user_id`,`first_name`,`last_name`,`unifi_start_date`,`unifi_end_date`,";
$sql .= "`positions`,`major`,`grad_school`,`current_location`,`current_location_coords`,`email`,`current_job`,`phone`,`notes`) VALUES ";
$sql .= "('{$id}','{$member_id}','{$user_id}','{$first_name}','{$last_name}','{$unifi_start_date}','{$unifi_end_date}','{$positions}',";
$sql .= "'{$major}','{$grad_school}','{$current_location}','{$current_location_coords}','{$email}','{$current_job}','{$phone}','{$notes}');";

DB::query($sql);

// Send an email
mail("alumni@unifreethought.com", "A new alumni signup!",
  "{$first_name} {$last_name} has just signed up to become an alumni!", "From: webmaster@unifreethought.com\r\n");

Log::create($user_id, "alumni_signup", "New Alumni: {$first_name} {$last_name}");

header("Location: index.php?thanks_alumni");
exit();

