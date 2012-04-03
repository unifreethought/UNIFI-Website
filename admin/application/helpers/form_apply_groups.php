<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$user_id = MySQL::clean($_POST['user_id']);
$group_desc = MySQL::clean($_POST['group_desc']);

$base_sql = "UPDATE  `unifi_website_new`.`user-permissions` SET ";
$end_sql = "WHERE  `user-permissions`.`user_id` = '{$user_id}';";
$sqls = array(
  'president' => " `post_to_blog` =  '1', `access_admin_dashbord` =  '1', `view_members` =  '1', `edit_members` =  '1', `add_events` =  '1', `list_events` =  '1', `edit_events` =  '1', `edit_event_attendance` =  '1', `edit_custom_pages` =  '1', `view_log` =  '1' ",
  'officer' => " `post_to_blog` =  '1', `access_admin_dashbord` =  '1', `view_members` =  '1', `edit_members` =  '1', `add_events` =  '1', `list_events` =  '1', `edit_events` =  '1', `edit_event_attendance` =  '1', `edit_custom_pages` =  '1', `view_log` =  '0' ",
  'member' => " `post_to_blog` =  '0', `access_admin_dashbord` =  '0', `view_members` =  '0', `edit_members` =  '0', `add_events` =  '0', `list_events` =  '0', `edit_events` =  '0', `edit_event_attendance` =  '0', `edit_custom_pages` =  '0', `view_log` =  '0' "
);

if (!in_array($group_desc, $sqls)) {
  $sql = $base_sql . $sqls[$group_desc] . $end_sql;
} else {
  $sql = $base_sql . $sqls['member'] . $end_sql;
}

MySQL::query($sql);

header("Location: index.php");
exit();