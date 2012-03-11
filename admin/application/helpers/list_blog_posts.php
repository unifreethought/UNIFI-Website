<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$posts = MySQL::search("SELECT * FROM `{$database}`.`blog-posts` ORDER BY `timestamp` DESC LIMIT 1000");

$authors = array();
foreach ($posts as $post) {
	if (empty($authors[$post['author']])) {
		$tmp = MySQL::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$post['author']}' LIMIT 1");
		$authors[$post['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
	}
}
