<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$id = MySQL::clean(htmlentities((int) $_POST['blog_id']));
$title = MySQL::clean(htmlentities($_POST['title']));
$content = MySQL::clean(htmlentities($_POST['content']));

$sql = "UPDATE `{$database}`.`blog-posts` SET `title` = '{$title}', `content` =  '{$content}' WHERE  `blog-posts`.`id` = '{$id}';";
MySQL::query($sql);

header('Location: index.php?page=list_blog_posts');
