<?php
/**
 * UNIFI WebSite
 * Adam Shannon
 * 2011-02-27
 */

// Move the user to a different db table.
$user_ids = $_POST['users_to_delete'];

foreach ($user_ids as $id) {
  $id = MySQL::clean($id);

  $data = MySQL::single("SELECT * FROM `{$database}`.`users` WHERE `id` = '{$id}' LIMIT 1");

  $sql = "DELETE FROM `{$database}`.`users` WHERE `users`.`id` = '{$id}'";
  MySQL::query($sql);

  $sql = "INSERT INTO `{$database}`.`users-deleted` (`id`,`first_name`,`last_name`,`facebook`,`cookie`) VALUES ";
  $sql .= "('{$data['id']}','{$data['first_name']}','{$data['last_name']}','{$data['facebook']}','{$data['cookie']}');";
  MySQL::query($sql);

  Log::create($user_id, 'delete_user', "user:{$data['first_name']} {$data['last_name']}");
}

header('Location: index.php');
