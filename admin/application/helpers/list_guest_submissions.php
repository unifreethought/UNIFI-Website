<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// Pull the posts from the db and let the template file handle showing them
$posts = MySQL::search("SELECT * FROM `{$database}`.`blog-guest-submissions` ORDER BY `timestamp` DESC LIMIT 1000");

// Populate the $authors array to hold easy access to full names.
$authors = array();
foreach ($posts as $post) {
	if (empty($authors[$post['author']])) {
		$tmp = MySQL::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$post['author']}' LIMIT 1");
		$authors[$post['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
	}
}
