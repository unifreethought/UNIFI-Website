<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$position = MySQL::clean($_GET['deletePosition']);

$sql = "DELETE FROM `{$database}`.`positions` WHERE `positions`.`id` = '{$position}' LIMIT 1;";
MySQL::query($sql);

