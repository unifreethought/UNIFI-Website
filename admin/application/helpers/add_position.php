<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$position = MySQL::clean($_GET['addPosition']);

$sql = "INSERT INTO `{$database}`.`positions` (`id`,`desc`) VALUES ('0', '{$position}');";
MySQL::query($sql);

$sql = "SELECT `id` FROM `{$database}`.`positions` WHERE `desc` = '{$position}' ORDER BY `id` DESC LIMIT 1;";
$result = MySQL::single($sql);
echo $result['id'];
