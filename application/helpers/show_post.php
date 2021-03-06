<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'show_authors_and_labels.php';
include 'system/libs/social_media.class.php';

$post_id = DB::clean($url['id']);

$post = DB::single("SELECT `id`,`author`,`timestamp`,`title`,`content` FROM `{$database}`.`blog-posts` WHERE `id` = '{$post_id}' LIMIT 1;");

// Check to see if the post actually exists
if (empty($post['title'])) {
  include 'templates/' . $config['template'] . '/html/show_no_post.html';
  exit();
}

$comments = DB::search("SELECT * FROM `{$database}`.`blog-comments` WHERE `blog_post` = '{$post_id}';");

$authors = array();

// Load the author's real name.
$post_author = DB::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '" . DB::clean($post['author']) . "' LIMIT 1");
$authors[$post['author']] = $post_author['first_name'] . ' ' . $post_author['last_name'];

// Load the commenters real names.
foreach ($comments as $comment) {
  if (empty($authors[$comment['author']]) && $authors[$comment['author']] != '0') {
    $result = DB::single("SELECT `first_name`,`last_name` FROM `" . $database . "`.`users` WHERE `id` = '" . DB::clean($comment['author']) . "' LIMIT 1");
    $authors[$comment['author']] = $result['first_name'] . ' ' . $result['last_name'];
  }
}
