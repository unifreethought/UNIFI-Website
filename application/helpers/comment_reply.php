<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$post = MySQL::clean($_POST['post_id']);
$author = MySQL::clean($user_id);
$timestamp = MySQL::clean(@time());
$content = MySQL::clean(htmlentities($_POST['content']));

// Make sure that $user_id is set!!
if (!empty($user_id)) {
  // Insert the comment from the $user_id global variable.
  $sql = "INSERT INTO `{$database}`.`blog-comments` (`id`,`blog_post`,`author`,`timestamp`,`content`) VALUES ";
  $sql .= "('0','{$post}','{$author}','{$timestamp}','{$content}');";
  MySQL::query($sql);

        // Set the headers for the email
        $headers  = "From: UNI Freethinkers and Inquirers <contact@unifreethought.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        // Send out the emails
        $emails_raw = MySQL::single("SELECT `emails` from `{$database}`.`email_lists` WHERE `desc` = 'commenting_emails' LIMIT 1");
        $post_title = MySQL::single("SELECT `title` FROM `{$database}`.`blog-posts` WHERE `id` = '{$post}'");
        $emails = explode(',', $emails_raw['emails']);
        foreach ($emails as $email) {
          mail($email, "A new comment!: " . $post_title['title'], $content, $headers);
        }

} else {
  $post = $post . '&commentFail';
}

header('Location: index.php?page=post&id=' . $post);
exit();
