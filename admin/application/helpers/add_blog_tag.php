<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$tag = DB::clean($_GET['addBlogTag']);
$post = DB::clean($_GET['blog_post']);
$checked = DB::clean($_GET['checked']);

$exists = DB::single("SELECT `tag_id` FROM `{$database}`.`blog-tags` WHERE `post_id` = '{$post}' AND `tag_id` = '{$tag}' LIMIT 1");

if ($checked['checked'] == 'y' && empty($exists['tag_id'])) {
  DB::query("INSERT INTO `{$database}`.`blog-tags` (`post_id`,`tag_id`) VALUES ('{$post}','{$tag}');");
}

if ($checked['checked'] == 'n' && !empty($exists['tag_id'])) {
  DB::query("DELETE FROM `{$database}`.`blog-tags` WHERE `blog-tags`.`post_id` = '{$post}' AND `blog-tags`.`tag_id` = '{$tag}' LIMIT 1");
}
