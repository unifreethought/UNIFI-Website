<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$user_id = MySQL::clean($_POST['user_id']);

if (empty($user_id)) {
  exit(NO_USER_ID);
}

$post_to_blog       = (!empty($_POST['post_to_blog'])       && $_POST['post_to_blog'] == 'yes')        ? '1' : '0';
$access_admin_dashboard = (!empty($_POST['access_admin_dashboard']) && $_POST['access_admin_dashboard'] == 'yes')  ? '1' : '0';
$view_members       = (!empty($_POST['view_members'])       && $_POST['view_members'] == 'yes')        ? '1' : '0';
$edit_members       = (!empty($_POST['edit_members'])       && $_POST['edit_members'] == 'yes')        ? '1' : '0';
$add_events       = (!empty($_POST['add_events'])       && $_POST['add_events'] == 'yes')        ? '1' : '0';
$list_events       = (!empty($_POST['list_events'])       && $_POST['list_events'] == 'yes')        ? '1' : '0';
$edit_events       = (!empty($_POST['edit_events'])       && $_POST['edit_events'] == 'yes')        ? '1' : '0';
$edit_event_attendance   = (!empty($_POST['edit_event_attendance'])   && $_POST['edit_event_attendance'] == 'yes')  ? '1' : '0';
$edit_custom_pages     = (!empty($_POST['edit_custom_pages'])     && $_POST['edit_custom_pages'] == 'yes')    ? '1' : '0';
$view_log         = (!empty($_POST['view_log'])         && $_POST['view_log'] == 'yes')          ? '1' : '0';

$values = "`post_to_blog` = '{$post_to_blog}', `access_admin_dashboard` = '{$access_admin_dashboard}', `view_members` = '{$view_members}', ";
$values .= "`edit_members` = '{$edit_members}', `add_events` = '{$add_events}', `list_events` = '{$list_events}', `edit_events` = '{$edit_events}'";
$values .= ", `edit_event_attendance` = '{$edit_event_attendance}', `edit_custom_pages` = '{$edit_custom_pages}', `view_log` = '{$view_log}'";

$sql = "UPDATE `{$database}`.`user-permissions` SET {$values} WHERE `user-permissions`.`user_id` = '{$user_id}';";
MySQL::query($sql);

header('Location: index.php?page=edit_member_rights&user=' . $user_id);
