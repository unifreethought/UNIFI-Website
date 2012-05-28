<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/user.php';
User_Parse::set($database);

$sql = "SELECT * FROM `{$database}`.`alumni_database`;";
$alumnis = DB::search($sql);
