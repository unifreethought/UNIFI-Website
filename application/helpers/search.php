<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-03-06
 */
 
include 'show_authors_and_labels.php';
$keywords = explode(' ', htmlentities($_GET['query']));
$search = '';

foreach ($keywords as $word) {
	$search .= '%' . $word . '% OR ';
}
$search = substr($search, 0, -4);

$sql = "SELECT * FROM `" . MySQL::$database . "`.`blog-posts` WHERE `content` LIKE '{$search}' LIMIT 50";
$posts = MySQL::search($sql);

// Populate the authors
$authors = array();
foreach ($posts as $post) {
	if (@empty($authors[$post['author']]) && @$authors[$post['author']] != '0') {
		$result = MySQL::single("SELECT `first_name`,`last_name` FROM `" . MySQL::$database . "`.`users` WHERE `id` = '" . MySQL::clean($post['author']) . "' LIMIT 1");
		$authors[$post['author']] = $result['first_name'] . ' ' . $result['last_name'];
	}
}
