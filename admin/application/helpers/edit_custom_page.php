<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$url_stub = DB::clean($_GET['url_stub']);
$data = DB::single("SELECT * FROM `{$database}`.`pages` WHERE `url_stub` = '{$url_stub}' LIMIT 1");
