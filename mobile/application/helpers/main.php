<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

if (empty($url['older_than'])) {
  $url['older_than'] = @time();
}

// For now we want the blog posts pulled and displayed.
$posts = DB::search("SELECT * FROM `" . $database . "`.`blog-posts` WHERE `timestamp` < " . DB::clean($url['older_than']) . " ORDER BY `timestamp` DESC      LIMIT 10");

// Create an array of authors, organized by their user id.
$authors = array();
foreach ($posts as $post) {
   if (@empty($authors[$post['author']]) && @$authors[$post['author']] != '0') {
    $result = DB::single("SELECT `first_name`,`last_name` FROM `" . $database . "`.`users` WHERE `id` = '" . DB::clean($post['author']) . "'     LIMIT 1");
    $authors[$post['author']] = $result['first_name'] . ' ' . $result['last_name'];
  }
}

  // Get the last post and send a link to the next set.
  // This is the ?older_than=TIMESTAMP url pram
  $oldest_post = $posts[count($posts) - 1]['timestamp'];
