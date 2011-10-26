<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/show_date.php';
 
// Pull all comments from the db
$comments = MySQL::search("SELECT `blog_post`,`author`,`timestamp`,`content` FROM `{$database}`.`blog-comments` ORDER BY `timestamp` DESC");
$authors = array();
$post_titles = array();

foreach ($comments as $comment) {
	
	if (empty($authors[$comment['author']])) {
		$tmp = MySQL::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$comment['author']}' LIMIT 1");
		$authors[$comment['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
	}	
	
	if (empty($post_titles[$comment['blog_post']])) {
		$tmp = MySQL::single("SELECT `title` FROM `{$database}`.`blog-posts` WHERE `id` = '{$comment['blog_post']}' LIMIT 1");
		$post_titles[$comment['blog_post']] = $tmp['title'];
	}
}

