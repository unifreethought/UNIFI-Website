<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

$position = MySQL::clean($_POST['position']);
$url_stub = MySQL::clean($_POST['url_stub']);
$name = MySQL::clean($_POST['name']);
$href = MySQL::clean('index.php?page=' . $url_stub);
$style = MySQL::clean($_POST['style']);

$sql = "INSERT INTO `{$database}`.`nav-items` (`position`,`url_stub`,`name`,`href`,`style`) VALUES ";
$sql .= "('{$position}','{$url_stub}','{$name}','{$href}','{$style}');";
MySQL::query($sql);

$sql = "INSERT INTO `{$database}`.`pages` (`id`,`url_stub`,`page_title`,`content`) VALUES ";
$sql .= "('0','{$url_stub}','{$name}','Edit Me!!');";
MySQL::query($sql);

Log::create($user_id, 'create_custom_page', "name:{$name}<br>url:{$url_stub}");

header('Location: index.php');
