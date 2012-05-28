<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'show_authors_and_labels.php';
include 'system/libs/social_media.class.php';

$_label = DB::clean($_GET['label']);

$sql = "SELECT `post_id` FROM `" . $database . "`.`blog-tags` WHERE `tag_id` = '{$_label}'";
$pull = DB::search($sql);
$posts = array();

  foreach ($pull as $i) {
    $sql = "SELECT `id`,`author`,`timestamp`,`title`,`content` FROM `" . $database . "`.`blog-posts` WHERE `id` = '{$i['post_id']}' LIMIT 1;";
    $posts[] = DB::single($sql);
  }

// Create an array of authors, organized by their user id.
$authors = array();
foreach ($posts as $post) {
  if (@empty($authors[$post['author']]) && @$authors[$post['author']] != '0') {
    $result = DB::single("SELECT `first_name`,`last_name` FROM `" . $database . "`.`users` WHERE `id` = '" . DB::clean($post['author']) . "' LIMIT 1");
    $authors[$post['author']] = $result['first_name'] . ' ' . $result['last_name'];
  }
}

// Get the last post and send a link to the next set.
// This is the ?older_than=TIMESTAMP url pram
$oldest_post = $posts[count($posts) - 1]['timestamp'];
