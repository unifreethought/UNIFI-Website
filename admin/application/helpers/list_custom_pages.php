<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$pages = DB::search("SELECT * FROM `{$database}`.`pages` ORDER BY `id`");
