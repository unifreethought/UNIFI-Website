<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$id = MySQL::clean(htmlentities((int) $_POST['blog_id']));
$title = MySQL::clean(htmlentities($_POST['title']));
$content = MySQL::clean(strip_tags($_POST['content'], $config['allowable_blog_tags']));

if (empty($id)) {
  $time = MySQL::clean(@time());
  $title = MySQL::clean($_POST['title']);

  $sql = "INSERT INTO `{$database}`.`blog-posts` (`id`,`author`, `timestamp`, `title`, `content`) VALUES ";
  $sql .= "('0', '{$user_id}', '{$time}', '{$title}', '{$content}');";
  MySQL::query($sql);

  // Log the new post.
  Log::create($user_id, 'new_blog_post', 'date:' . Date::parse($time) . '<br>title:' . $title);

} else {
  $sql = "UPDATE `{$database}`.`blog-posts` SET `title` = '{$title}', `content` =  '{$content}' WHERE  `blog-posts`.`id` = '{$id}';";
  MySQL::query($sql);
}

header('Location: index.php?page=list_blog_posts');
