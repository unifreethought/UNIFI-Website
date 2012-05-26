<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

if (empty($_GET['olderThan'])) {
  $olderThan = MySQL::clean(@time());
} else {
  $olderThan = MySQL::clean($_GET['olderThan']);
}

$posts = MySQL::search("SELECT * FROM `{$database}`.`blog-posts` WHERE `timestamp` < " . $olderThan . " ORDER BY `timestamp` DESC LIMIT 50;");

$authors = array();
foreach ($posts as $post) {
  if (empty($authors[$post['author']])) {
    $tmp = MySQL::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$post['author']}' LIMIT 1");
    $authors[$post['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
  }
}
