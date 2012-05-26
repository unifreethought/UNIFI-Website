<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$pages = MySQL::search("SELECT * FROM `{$database}`.`pages` ORDER BY `id`");
