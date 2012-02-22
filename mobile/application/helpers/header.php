<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$nav_items = MySQL::search("SELECT `name`,`href`,`style` FROM `" . MySQL::$database . "`.`nav-items` ORDER BY `position` ASC");
