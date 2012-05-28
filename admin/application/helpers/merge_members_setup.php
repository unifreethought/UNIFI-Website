<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/user.php';
User_Parse::set($database);

$first = DB::clean($_POST['first_id']);
$second = DB::clean($_POST['second_id']);

$first_sql = DB::single("SELECT * FROM `{$database}`.`member_database` WHERE `id` = '{$first}' LIMIT 1;");
$second_sql = DB::single("SELECT * FROM `{$database}`.`member_database` WHERE `id` = '{$second}' LIMIT 1;");

$positions = DB::search("SELECT * FROM `{$database}`.`positions` ORDER BY `id` ASC");
$tags = DB::search("SELECT * FROM `{$database}`.`tags` ORDER BY `id` ASC");

