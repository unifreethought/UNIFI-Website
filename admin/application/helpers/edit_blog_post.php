<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

$postId = (empty($_GET['blog_post'])) ? "-1" : $_GET['blog_post'];

// Pull the data for a post.
$data = MySQL::single("SELECT `title`,`content` FROM `{$database}`.`blog-posts` WHERE `id` = " . MySQL::clean($postId));
$data['id'] = MySQL::clean($_GET['blog_post']);

$tags = MySQL::search("SELECT `id`,`tag` FROM `{$database}`.`blog-tag-names`");
$selected = MySQL::search("SELECT `tag_id` FROM `{$database}`.`blog-tags` WHERE `post_id` = '{$data['id']}'");
