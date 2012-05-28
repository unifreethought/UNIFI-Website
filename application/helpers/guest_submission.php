<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$author = DB::clean(htmlentities($_POST['author']));
$title = DB::clean(htmlentities($_POST['title']));
$content = DB::clean(htmlentities($_POST['content']));
$timestamp = @time();

if (empty($author) && !empty($user_id)) {
  $author = $user_id;
} else {
  $author = 0;
}

$sql = "INSERT INTO `{$database}`.`blog-guest-submissions` (`id`,`author`,`timestamp`,`title`,`content`) VALUES ";
$sql .= "('0', '{$author}', '{$timestamp}', '{$title}', '{$content}');";
DB::query($sql);

$headers = "From: contact@unifreethought.com";
mail("webmaster@unifreethought.com", "A new guest submission.", "From: {$author}\n\nContent:\n{$content}", $headers);

header('Location: index.php');
exit();
