<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$nav_items = DB::search("SELECT `name`,`href`,`style` FROM `" . DB::$database . "`.`nav-items` ORDER BY `position` ASC");
