<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$id = DB::clean(htmlentities((int) $_POST['blog_id']));
$title = DB::clean(htmlentities($_POST['title']));
$content = DB::clean(htmlentities($_POST['content']));
$action = DB::clean($_POST['publish-post']);
if (empty($action)) {
  $table = 'blog-drafts';
} else {
  $table = 'blog-posts';
}

function send_email($database) {
  Log::create($user_id, 'new_blog_post', 'date:' . Date::parse($time) . '<br>title:' . $title);

  // Set the headers for the email
  $headers  = "From: UNI Freethinkers and Inquirers <contact@unifreethought.com>\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  // Email all of the people setup for it.
  $emails_raw = DB::single("SELECT `emails` FROM `{$database}`.`email_lists` WHERE `desc` = 'posting_emails' LIMIT 1");
  $emails = explode(',', $emails_raw['emails']);
  foreach ($emails as $email) {
    mail($email, "A new blog post: " . $title, html_entities_decode($content), $headers);
  }
}

$headers (empty($id)) {
  $time = DB::clean(@time());
  $title = DB::clean($_POST['title']);

  $sql = "INSERT INTO `{$database}`.`{$table}` (`id`,`author`, `timestamp`, `title`, `content`) VALUES ";
  $sql .= "('0', '{$user_id}', '{$time}', '{$title}', '{$content}');";
  DB::query($sql);

  if ($table == "blog-posts") {

    // Move all of the tags over for the draft.
    $sql = "SELECT `id` FROM `{$database}`.`{$table}` WHERE `timestamp` = '{$time}' ORDER BY `id` DESC LIMIT 1;";
    $new_post_id = DB::single($sql);
    $sql = "SELECT `tag_id` FROM `{$database}`.`blog-tags` WHERE `post_id` = '{$new_post_id['id']}';";
    $new_tag_ids = DB::search($sql);

    $sql = "INSERT INTO `{$database}`.`blog-tags` (`post_id`,`tag_id`) VALUES ";
    foreach ($new_tag_ids as $tag) {
      $sql .= "('{$new_post_id}', '{$tag}'),";
    }
    DB::query(substr($sql, 0, -1));

    // Create a new uuid for the blog post
    $sql = "INSERT INTO `{$database}`.`blog-guids` (`post_id`, `guid`) VALUES ('{$new_post_id['id']}', UUID());";
    DB::query($sql);

    send_email($database);
  }

} else {
  $action = DB::clean($_POST['publish-post']);

  if ($action == 'Submit') {
    $sql = "INSERT INTO `{$database}`.`blog-posts` (`id`,`author`, `timestamp`, `title`, `content`) VALUES ";
    $sql .= "('0', '{$user_id}', " .time() . ", '{$title}', '{$content}');";
    send_email($database);
  } else {
    $sql = "UPDATE `{$database}`.`{$table}` SET `title` = '{$title}', `content` =  '{$content}' WHERE  `{$table}`.`id` = '{$id}';";
  }
  DB::query($sql);
}

header('Location: index.php?page=list_blog_' . substr($table, 5));
