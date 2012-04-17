<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

$id = MySQL::clean(htmlentities((int) $_POST['blog_id']));
$title = MySQL::clean(htmlentities($_POST['title']));
$content = MySQL::clean($_POST['content']);
$action = MySQL::clean($_POST['publish-post']);
if (empty($action)) {
  $table = 'blog-drafts';
} else {
  $table = 'blog-posts';
}

if (empty($id)) {
  $time = MySQL::clean(@time());
  $title = MySQL::clean($_POST['title']);

  $sql = "INSERT INTO `{$database}`.`{$table}` (`id`,`author`, `timestamp`, `title`, `content`) VALUES ";
  $sql .= "('0', '{$user_id}', '{$time}', '{$title}', '{$content}');";
  MySQL::query($sql);

  if ($table == "blog-posts") {
    Log::create($user_id, 'new_blog_post', 'date:' . Date::parse($time) . '<br>title:' . $title);

    // Set the headers for the email
    $headers  = "From: UNI Freethinkers and Inquirers <contact@unifreethought.com>\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Email all of the people setup for it.
    $emails_raw = MySQL::single("SELECT `emails` from `{$database}`.`email_lists` WHERE `desc` = 'posting_emails' LIMIT 1");
    $emails = explode(',', $emails_raw['emails']);
    foreach ($emails as $email) {
      mail($email, "A new blog post: " . $title, $content, "From: {$config['admin_email']}", $headers);
    }
  }

} else {
  $sql = "UPDATE `{$database}`.`{$table}` SET `title` = '{$title}', `content` =  '{$content}' WHERE  `{$table}`.`id` = '{$id}';";
  MySQL::query($sql);
}

header('Location: index.php?page=list_blog_posts');
