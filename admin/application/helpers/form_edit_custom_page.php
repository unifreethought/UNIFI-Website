<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-02-18
 */

$id = MySQL::clean($_POST['id']);
$url_stub = MySQL::clean($_POST['url_stub']);
$page_title = MySQL::clean($_POST['page_title']);
$content = MySQL::clean($_POST['content']);

$sql = "UPDATE `{$database}`.`pages` SET `url_stub` = '{$url_stub}', `page_title` = '{$page_title}', `content` = '{$content}' WHERE `pages`.`id` = '{$id}';";
MySQL::query($sql);

header("Location: index.php");
exit();
