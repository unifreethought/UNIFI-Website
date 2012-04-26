
<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$tag = MySQL::clean($_GET['deleteTag']);

$sql = "DELETE FROM `{$database}`.`tags` WHERE `tags`.`id` = '{$tag}' LIMIT 1;";
MySQL::query($sql);

