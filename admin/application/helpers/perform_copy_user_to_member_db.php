<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$user_id = DB::clean($_GET['user_id']);

$names = DB::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '{$user_id}';");

$data = DB::single("SELECT * FROM `{$database}`.`user-data` WHERE `id` = '{$user_id}';");

$sql = "DELETE FROM `{$database}`.`member_database` WHERE `member_database`.`first_name` = '{$names['first_name']}' AND `member_database`.`last_name` = '{$names['last_name']}';";

DB::query($sql);

$sql = "INSERT INTO `{$database}`.`member_database` (`id`, `first_name`,  `last_name`, `year`, `major`, `hometown`, `address`, `dorm`, `recruit_date`, `recruit_place`, `phone`, `email`, `texting`, `positions`, `tags`, `notes`) VALUES (0, '{$names['first_name']}', '{$names['last_name']}', '{$data['year']}', '{$data['major']}', '{$data['hometown']}', '{$data['address']}', '{$data['dorm']}', '0', '{$data['recruit_place']}', '{$data['phone']}', '{$data['email']}', '{$data['texting']}', '{$data['positions']}', '{$data['tags']}', '{$date['notes']}');";

DB::query($sql);
header("Location: index.php");

