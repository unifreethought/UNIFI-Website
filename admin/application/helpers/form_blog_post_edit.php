<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$id = MySQL::clean(htmlentities((int) $_POST['blog_id']));
$title = MySQL::clean(htmlentities($_POST['title']));
// $content = MySQL::clean(htmlentities($_POST['content']));
$content = MySQL::clean(strip_tags($_POST['content'], $config['allowable_blog_tags']));

$sql = "UPDATE `{$database}`.`blog-posts` SET `title` = '{$title}', `content` =  '{$content}' WHERE  `blog-posts`.`id` = '{$id}';";
MySQL::query($sql);

header('Location: index.php?page=list_blog_posts');
