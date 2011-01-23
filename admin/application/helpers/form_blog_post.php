<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$time = MySQL::clean(@time());
$title = MySQL::clean($_POST['title']);
$text = MySQL::clean(htmlentities($_POST['text']));

$sql = "INSERT INTO `{$database}`.`blog-posts` (`id`,`author`, `timestamp`, `title`, `content`) VALUES ";
$sql .= "('0', '{$user_id}', '{$time}', '{$title}', '{$text}');";
MySQL::query($sql);

header('Location: index.php');
