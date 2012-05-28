<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/user_encode.php';
User_Encode::set($database);

$id = DB::clean($_POST['id']);
$user_id = DB::clean($_POST['user_id']);
$member_id = DB::clean($_POST['member_id']);
$first_name = DB::clean($_POST['first_name']);
$last_name = DB::clean($_POST['last_name']);
$start_date_term = DB::clean($_POST['start_date_term']);
$start_date_year = DB::clean($_POST['start_date_year']);
$end_date_term = DB::clean($_POST['end_date_term']);
$end_date_year = DB::clean($_POST['end_date_year']);
$major = DB::clean($_POST['major']);
$grad_school = DB::clean($_POST['grad_school']);
$current_location = DB::clean($_POST['current_location']);
$current_location_coords = DB::clean($_POST['current_location_coords']);
$email = DB::clean($_POST['email']);
$current_job = DB::clean($_POST['current_job']);
$phone = DB::clean($_POST['phone']);
$notes = DB::clean($_POST['notes']);

$start_date = User_Encode::encode_alumni_date($start_date_term, $start_date_year);
$end_date = User_Encode::encode_alumni_date($end_date_term, $end_date_year);

$raw_positions = $_POST['positions'];
$positions = '';
foreach ($raw_positions as $p) {
	$positions .= DB::clean($p) . ',';
}
$positions = substr($positions, 0, -1);

$sql = "UPDATE `{$database}`.`alumni_database` SET `id` = '{$id}', `member_id` = '{$member_id}', `user_id` = '{$user_id}', ";
$sql .= "`first_name` = '{$first_name}', `last_name` = '{$last_name}', `unifi_start_date` = '{$start_date}', ";
$sql .= "`unifi_end_date` = '{$end_date}', `positions` = '{$positions}', `major` = '{$major}', `grad_school` = '{$grad_school}',";
$sql .= " `current_location` = '{$current_location}', `current_location_coords` = '{$current_location_coords}', `email` = '{$email}'";
$sql .= ", `current_job` = '{$current_job}', `phone` = '{$phone}', `notes` = '{$notes}' ";
$sql .= "WHERE `alumni_database`.`id` = '{$id}';";
DB::query($sql);

header('Location: index.php?page=manage_alumni_members');
exit();
