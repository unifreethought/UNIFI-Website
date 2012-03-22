<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$member_id = MySQL::clean($_POST['member_id']);

$sql = "DELETE FROM `{$database}`.`member_database` WHERE `id` = '{$member_id}' LIMIT 1;";
MySQL::query($sql);

header("Location: index.php");
exit();
