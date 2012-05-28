<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

if (empty($_GET['olderThan'])) {
  $olderThan = DB::clean(@time());
} else {
  $olderThan = DB::clean($_GET['olderThan']);
}

$posts = DB::search("SELECT * FROM `{$database}`.`blog-posts` WHERE `timestamp` < " . $olderThan . " ORDER BY `timestamp` DESC LIMIT 50;");

$authors = array();
foreach ($posts as $post) {
  if (empty($authors[$post['author']])) {
    $tmp = DB::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$post['author']}' LIMIT 1");
    $authors[$post['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
  }
}
