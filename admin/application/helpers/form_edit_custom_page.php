<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$id = DB::clean($_POST['id']);
$url_stub = DB::clean($_POST['url_stub']);
$page_title = DB::clean($_POST['page_title']);
$content = DB::clean($_POST['content']);

$sql = "UPDATE `{$database}`.`pages` SET `url_stub` = '{$url_stub}', `page_title` = '{$page_title}', `content` = '{$content}' WHERE `pages`.`id` = '{$id}';";
DB::query($sql);

header("Location: index.php?page=list_custom_pages");
exit();
