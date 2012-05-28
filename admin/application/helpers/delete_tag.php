<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$tag = DB::clean($_GET['deleteTag']);

$sql = "DELETE FROM `{$database}`.`tags` WHERE `tags`.`id` = '{$tag}' LIMIT 1;";
DB::query($sql);

