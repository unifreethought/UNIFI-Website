<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$events = MySQL::search("SELECT * FROM `{$database}`.`events` ORDER BY `start_time` DESC LIMIT 50");
