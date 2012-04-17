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

$drafts = MySQL::search("SELECT * FROM `{$database}`.`blog-drafts` WHERE `timestamp` < " . $olderThan . " ORDER BY `timestamp` DESC LIMIT 50;");

$authors = array();
foreach ($drafts as $draft) {
  if (empty($authors[$draft['author']])) {
    $tmp = MySQL::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$draft['author']}' LIMIT 1");
    $authors[$draft['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
  }
}
