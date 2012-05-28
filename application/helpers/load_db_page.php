<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/social_media.class.php';
include 'show_authors_and_labels.php';

// Load the contents for a page from the db, then display
// it in a general template (all data loaded should be global).
$db_page_data = DB::single("SELECT `id`,`url_stub`,`page_title`,`content`  FROM `" . $database . "`.`pages` WHERE `url_stub` = '" . DB::clean($url['page']) . "' LIMIT 1");
