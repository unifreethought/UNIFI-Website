<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$tag = DB::clean($_GET['addTag']);

$sql = "INSERT INTO `{$database}`.`tags` (`id`,`desc`) VALUES ('0', '{$tag}');";
DB::query($sql);

$sql = "SELECT `id` FROM `{$database}`.`tags` WHERE `desc` = '{$tag}' ORDER BY `id` DESC LIMIT 1;";
$result = DB::single($sql);
echo $result['id'];
