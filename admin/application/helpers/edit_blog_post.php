<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// Pull the data for a post.
$data = MySQL::single("SELECT `title`,`content` FROM `{$database}`.`blog-posts` WHERE `id` = " . MySQL::clean($_GET['blog_post']));
$data['id'] = $_GET['blog_post'];

$tags = MySQL::search("SELECT `id`,`tag` FROM `{$database}`.`blog-tag-names`");
