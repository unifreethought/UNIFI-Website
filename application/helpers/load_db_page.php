<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// Load the contents for a page from the db, then display 
// it in a general template (all data loaded should be global).
$db_page_data = MySQL::single("SELECT * FROM `" . MySQL::$database . "`.`pages` WHERE `url_stub` = '" . MySQL::clean($url['page']) . "' LIMIT 1");
