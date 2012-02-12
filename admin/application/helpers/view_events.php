<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

// Past six weeks
$time = @time() - (60 * 60 * 24 * 7 * 6);
$events = MySQL::search("SELECT * FROM `{$database}`.`events` WHERE `start_time` > {$time};");

