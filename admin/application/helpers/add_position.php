<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$position = DB::clean($_GET['addPosition']);

$sql = "INSERT INTO `{$database}`.`positions` (`id`,`desc`) VALUES ('0', '{$position}');";
DB::query($sql);

$sql = "SELECT `id` FROM `{$database}`.`positions` WHERE `desc` = '{$position}' ORDER BY `id` DESC LIMIT 1;";
$result = DB::single($sql);
echo $result['id'];
