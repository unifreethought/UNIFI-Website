<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// Pull the nav links, the site's header, stylesheet, etc...
$nav_items = MySQL::search("SELECT `name`,`href`,`style` FROM `" . MySQL::$database . "`.`nav-items` ORDER BY `position` ASC");
$css_file = 'templates/' . $config['template'] . '/css/style.css';

include 'print_profile_button.php';
include 'print_admin_link.php';

