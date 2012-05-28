<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$post_id = DB::clean($_GET['id']);
$sql = "DELETE FROM `{$database}`.`blog-posts` WHERE `blog-posts`.`id` = '{$post_id}';";
DB::query($sql);

Log::create($user_id, "delete_blog_post", "Post Deleted: {$post_id}");

header("Location: index.php");
exit();
