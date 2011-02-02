<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// Pull the 20 latest events
$events = MySQL::search("SELECT * FROM `{$database}`.`events` LIMIT 20");
