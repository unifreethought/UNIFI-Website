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

$drafts = DB::search("SELECT * FROM `{$database}`.`blog-drafts` WHERE `timestamp` < " . $olderThan . " ORDER BY `timestamp` DESC LIMIT 50;");

$authors = array();
foreach ($drafts as $draft) {
  if (empty($authors[$draft['author']])) {
    $tmp = DB::single("SELECT `first_name`, `last_name` FROM `{$database}`.`users` WHERE `id` = '{$draft['author']}' LIMIT 1");
    $authors[$draft['author']] = $tmp['first_name'] . ' ' . $tmp['last_name'];
  }
}
