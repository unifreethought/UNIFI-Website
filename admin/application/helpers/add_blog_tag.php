<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$tag = MySQL::clean($_GET['addBlogTag']);
$post = MySQL::clean($_GET['blog_post']);
$checked = MySQL::clean($_GET['checked']);

$exists = MySQL::single("SELECT `tag_id` FROM `{$database}`.`blog-tags` WHERE `post_id` = '{$post}' AND `tag_id` = '{$tag}' LIMIT 1");

// We have four possible cases:
//  1) Checked and Exists
//  2) Checked and Doesn't Exist
//  3) Not Checked and Exists
//  4) Not Checked and Doesn't Exist.
// 
//  1) Leave it.
//  2) Add it
//  3) Delete it
//  4) Leave it.
if ($checked['checked'] == 'y' && empty($exists['tag_id'])) {
	MySQL::query("INSERT INTO `{$database}`.`blog-tags` (`post_id`,`tag_id`) VALUES ('{$post}','{$tag}');");
}

if ($checked['checked'] == 'n' && !empty($exists['tag_id'])) {
	MySQL::query("DELETE FROM `{$database}`.`blog-tags` WHERE `blog-tags`.`post_id` = '{$post}' AND `blog-tags`.`tag_id` = '{$tag}' LIMIT 1");
}
