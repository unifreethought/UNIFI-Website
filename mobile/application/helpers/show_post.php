<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$post_id = MySQL::clean($url['id']);

$post = MySQL::single("SELECT * FROM `{$database}`.`blog-posts` WHERE `id` = '{$post_id}' LIMIT 1;");

// Check to see if the post actually exists
if (empty($post['title'])) {
	include 'templates/' . $config['template'] . '/html/show_no_post.html';
	exit();
}

$comments = MySQL::search("SELECT * FROM `{$database}`.`blog-comments` WHERE `blog_post` = '{$post_id}';");

$authors = array();

// Load the author's real name.
$post_author = MySQL::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '" . MySQL::clean($post['author']) . "' LIMIT 1");
$authors[$post['author']] = $post_author['first_name'] . ' ' . $post_author['last_name'];

// Load the commenters real names.
foreach ($comments as $comment) {
	if (empty($authors[$comment['author']]) && $authors[$comment['author']] != '0') {
		$result = MySQL::single("SELECT `first_name`,`last_name` FROM `" . MySQL::$database . "`.`users` WHERE `id` = '" . MySQL::clean($comment['author']) . "' LIMIT 1");
		$authors[$comment['author']] = $result['first_name'] . ' ' . $result['last_name'];
	}
}
