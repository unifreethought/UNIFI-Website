<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$post = DB::clean($_POST['post_id']);
$author = DB::clean($user_id);
$timestamp = DB::clean(@time());
$content = DB::clean(htmlentities($_POST['content']));

// Make sure that $user_id is set!!
if (!empty($user_id) && $fb_id != "0") {
  // Insert the comment from the $user_id global variable.
  $sql = "INSERT INTO `{$database}`.`blog-comments` (`id`,`blog_post`,`author`,`timestamp`,`content`) VALUES ";
  $sql .= "('0','{$post}','{$author}','{$timestamp}','{$content}');";
  DB::query($sql);

  // Set the headers for the email
  $headers  = "From: UNI Freethinkers and Inquirers <contact@unifreethought.com>\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  // Send out the emails
  $emails_raw = DB::single("SELECT `emails` from `{$database}`.`email_lists` WHERE `desc` = 'commenting_emails' LIMIT 1");
  $post_title = DB::single("SELECT `title` FROM `{$database}`.`blog-posts` WHERE `id` = '{$post}'");
  $full_author_name = DB::single("SELECT `first_name`,`last_name`  FROM `{$database}`.`users` WHERE `id` = '{$author}' LIMIT 1");
  $content = "By " . $full_author_name['first_name'] . ' ' . $full_author_name['last_name'] . "\n\n" . $content;
  $content .= "\n\n<a href='http://unifreethought.com/?page=post&id=" . $post . "#comments'>View the comment</a>";

  $emails = explode(',', $emails_raw['emails']);
  foreach ($emails as $email) {
    mail($email, "A new comment on\"" . $post_title['title'] . "\"", $content, $headers);
  }

} else {
  $post = $post . '&commentFail';
}

header('Location: index.php?page=post&id=' . $post);
exit();
