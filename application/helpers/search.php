<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'show_authors_and_labels.php';
$keywords = explode(' ', htmlentities($_GET['query']));
$search = '';

foreach ($keywords as $word) {
  $search .= '%' . $word . '% OR ';
}
$search = substr($search, 0, -4);

$sql = "SELECT `id`,`author`,`timestamp`,`title`,`content` FROM `" . $database . "`.`blog-posts` WHERE `content` LIKE '{$search}' LIMIT 50";
$posts = DB::search($sql);

// Populate the authors
$authors = array();
foreach ($posts as $post) {
  if (@empty($authors[$post['author']]) && @$authors[$post['author']] != '0') {
    $result = DB::single("SELECT `first_name`,`last_name` FROM `" . $database . "`.`users` WHERE `id` = '" . DB::clean($post['author']) . "' LIMIT 1");
    $authors[$post['author']] = $result['first_name'] . ' ' . $result['last_name'];
  }
}
