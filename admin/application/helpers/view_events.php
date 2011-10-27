<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$time = @time() - (60 * 60 * 24 * 7 * 2);
$events = MySQL::search("SELECT * FROM `{$database}`.`events` WHERE `start_time` > {$time};");

