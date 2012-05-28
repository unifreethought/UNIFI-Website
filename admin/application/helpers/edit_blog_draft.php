<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

// Pull the data for a post.
$data = DB::single("SELECT `title`,`content` FROM `{$database}`.`blog-drafts` WHERE `id` = " . DB::clean($_GET['blog_draft']));
$data['id'] = DB::clean($_GET['blog_draft']);

$tags = DB::search("SELECT `id`,`tag` FROM `{$database}`.`blog-tag-names`");
$selected = DB::search("SELECT `tag_id` FROM `{$database}`.`blog-tags` WHERE `post_id` = '{$data['id']}'");
