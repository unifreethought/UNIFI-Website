<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// For now we want the blog posts pulled and displayed.
$posts = MySQL::search("SELECT * FROM `" . MySQL::$database . "`.`blog-posts` ORDER BY `timestamp` DESC LIMIT 10");

// Create an array of authors, organized by their user id.
$authors = array();
foreach ($posts as $post) {
	if (empty($authors[$post['author']]) && $authors[$post['author']] != '0') {
		$result = MySQL::search("SELECT `first_name`,`last_name` FROM `" . MySQL::$database . "`.`users` WHERE `id` = '" . MySQL::clean($post['author']) . "' LIMIT 1");
		$authors[$post['author']] = $result[0]['first_name'] . ' ' . $result[0]['last_name'];
	}
}

// Get the last post and send a link to the next set.
// This is the ?older_than=TIMESTAMP url pram
$oldest_post = $posts[count($posts) - 1]['timestamp'];
