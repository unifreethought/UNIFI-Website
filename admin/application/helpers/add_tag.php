
<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$tag = MySQL::clean($_GET['addTag']);

$sql = "INSERT INTO `{$database}`.`tags` (`id`,`desc`) VALUES ('0', '{$tag}');";
MySQL::query($sql);

$sql = "SELECT `id` FROM `{$database}`.`tags` WHERE `desc` = '{$tag}' ORDER BY `id` DESC LIMIT 1;";
$result = MySQL::single($sql);
echo $result['id'];
