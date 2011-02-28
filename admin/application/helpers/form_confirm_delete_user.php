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
	
	// Delete the row!!
	$sql = "DELETE FROM `{$database}`.`users` WHERE `users`.`id` = '{$id}'";
	MySQL::query($sql);
	
	// Add the user to the other table
	$sql = "INSERT INTO `{$database}`.`users-deleted` (`id`,`first_name`,`last_name`,`facebook`,`cookie`) VALUES ";
	$sql .= "('{$data['id']}','{$data['first_name']}','{$data['last_name']}','{$data['facebook']}','{$data['cookie']}');";
	MySQL::query($sql);
}

header('Location: index.php');
