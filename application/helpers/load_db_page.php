<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

include 'system/libs/social_media.class.php';
include 'show_authors_and_labels.php';

// Load the contents for a page from the db, then display
// it in a general template (all data loaded should be global).
$db_page_data = MySQL::single("SELECT `id`,`url_stub`,`page_title`,`content`  FROM `" . MySQL::$database . "`.`pages` WHERE `url_stub` = '" . MySQL::clean($url['page']) . "' LIMIT 1");
