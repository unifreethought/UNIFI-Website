<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/user.php';
User_Parse::set($database);

// Pull the info for all alumni
$sql = "SELECT * FROM `{$database}`.`alumni_database`;";
$alumnis = MySQL::search($sql);
