<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

// Move the user to a different db table.
$user_ids = $_POST['users_to_delete'];

foreach ($user_ids as $id) {
  $id = DB::clean($id);

  $data = DB::single("SELECT * FROM `{$database}`.`users` WHERE `id` = '{$id}' LIMIT 1");

  $sql = "DELETE FROM `{$database}`.`users` WHERE `users`.`id` = '{$id}'";
  DB::query($sql);

  $sql = "INSERT INTO `{$database}`.`users-deleted` (`id`,`first_name`,`last_name`,`facebook`,`cookie`) VALUES ";
  $sql .= "('{$data['id']}','{$data['first_name']}','{$data['last_name']}','{$data['facebook']}','{$data['cookie']}');";
  DB::query($sql);

  Log::create($user_id, 'delete_user', "user:{$data['first_name']} {$data['last_name']}");
}

header('Location: index.php');
