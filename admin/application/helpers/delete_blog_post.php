<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$post_id = MySQL::clean($_GET['post_id']);
$sql = "DELETE FROM `{$database}`.`blog-posts` WHERE `blog-posts`.`id` = '{$post_id}';";
MySQL::query($sql);
header("Location: index.php");
exit();
