<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// Pull the data for a post.
$data = MySQL::single("SELECT `title`,`content` FROM `{$database}`.`blog-drafts` WHERE `id` = " . MySQL::clean($_GET['blog_draft']));
$data['id'] = MySQL::clean($_GET['blog_draft']);

$tags = MySQL::search("SELECT `id`,`tag` FROM `{$database}`.`blog-tag-names`");
$selected = MySQL::search("SELECT `tag_id` FROM `{$database}`.`blog-tags` WHERE `post_id` = '{$data['id']}'");
