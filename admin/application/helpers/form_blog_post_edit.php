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

  Log::create($user_id, 'new_blog_post', 'date:' . Date::parse($time) . '<br>title:' . $title);
  
  // Email all of the people setup for it.
  $emails_raw = MySQL::single("SELECT `emails` from `{$database}`.`email_lists` WHERE `desc` = 'posting_emails' LIMIT 1");
  $emails = explode(',', $emails_raw['emails']);
  foreach ($emails as $email) {
    mail($email, "A new blog post: " . $title, $content, "From: {$config['admin_email']}");
  }

} else {
  $sql = "UPDATE `{$database}`.`blog-posts` SET `title` = '{$title}', `content` =  '{$content}' WHERE  `blog-posts`.`id` = '{$id}';";
  MySQL::query($sql);
}

header('Location: index.php?page=list_blog_posts');
