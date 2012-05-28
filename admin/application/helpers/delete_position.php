<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$position = DB::clean($_GET['deletePosition']);

$sql = "DELETE FROM `{$database}`.`positions` WHERE `positions`.`id` = '{$position}' LIMIT 1;";
DB::query($sql);

