<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-02-18
 */
 
$pages = MySQL::search("SELECT * FROM `{$database}`.`pages` ORDER BY `id`");
