<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'show_authors_and_labels.php';
include 'system/libs/social_media.class.php';

if (empty($_GET['older_than'])) {
  $olderThan = MySQL::clean(@time());
} else {
  $olderThan = MySQL::clean($_GET['older_than']);
}

// For now we want the blog posts pulled and displayed.
$posts = MySQL::search("SELECT `id`,`author`,`timestamp`,`title`,`content` FROM `" . MySQL::$database . "`.`blog-posts` WHERE `timestamp` < " . $olderThan . " ORDER BY `timestamp` DESC LIMIT 10");

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
