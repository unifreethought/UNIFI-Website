<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$url_stub = MySQL::clean($_GET['url_stub']);
$data = MySQL::single("SELECT * FROM `{$database}`.`pages` WHERE `url_stub` = '{$url_stub}' LIMIT 1");
