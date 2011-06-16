<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
include 'show_authors_and_labels.php';
$_label = MySQL::clean($_GET['label']);

$sql = "SELECT `post_id` FROM `" . MySQL::$database . "`.`blog-tags` WHERE `tag_id` = '{$_label}'";
$pull = MySQL::search($sql);
$posts = array();

	foreach ($pull as $i) {
		$sql = "SELECT * FROM `" . MySQL::$database . "`.`blog-posts` WHERE `id` = '{$i['post_id']}' LIMIT 1;";
		$posts[] = MySQL::single($sql);
	}

// Create an array of authors, organized by their user id.
$authors = array();
foreach ($posts as $post) {
	if (@empty($authors[$post['author']]) && @$authors[$post['author']] != '0') {
		$result = MySQL::single("SELECT `first_name`,`last_name` FROM `" . MySQL::$database . "`.`users` WHERE `id` = '" . MySQL::clean($post['author']) . "' LIMIT 1");
		$authors[$post['author']] = $result['first_name'] . ' ' . $result['last_name'];
	}
}

// Get the last post and send a link to the next set.
// This is the ?older_than=TIMESTAMP url pram
$oldest_post = $posts[count($posts) - 1]['timestamp'];
