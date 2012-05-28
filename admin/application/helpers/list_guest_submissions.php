<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$posts = DB::search("SELECT * FROM `{$database}`.`blog-guest-submissions` ORDER BY `timestamp` DESC LIMIT 1000");

$authors = array();
foreach ($posts as $post) {
  if (empty($authors[$post['author']])) {
    $tmp = DB::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$post['author']}' LIMIT 1");
    $authors[$post['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
  }
}
