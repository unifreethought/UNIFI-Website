<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$postId = (empty($_GET['blog_post'])) ? "-1" : $_GET['blog_post'];

// Pull the data for a post.
$data = DB::single("SELECT `title`,`content` FROM `{$database}`.`blog-posts` WHERE `id` = " . DB::clean($postId));
$data['id'] = DB::clean($_GET['blog_post']);

$tags = DB::search("SELECT `id`,`tag` FROM `{$database}`.`blog-tag-names`");
$selected = DB::search("SELECT `tag_id` FROM `{$database}`.`blog-tags` WHERE `post_id` = '{$data['id']}'");
