<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$position = DB::clean($_POST['position']);
$url_stub = DB::clean($_POST['url_stub']);
$name = DB::clean($_POST['name']);
$href = DB::clean('index.php?page=' . $url_stub);
$style = DB::clean($_POST['style']);

$sql = "INSERT INTO `{$database}`.`nav-items` (`position`,`url_stub`,`name`,`href`,`style`) VALUES ";
$sql .= "('{$position}','{$url_stub}','{$name}','{$href}','{$style}');";
DB::query($sql);

$sql = "INSERT INTO `{$database}`.`pages` (`id`,`url_stub`,`page_title`,`content`) VALUES ";
$sql .= "('0','{$url_stub}','{$name}','Edit Me!!');";
DB::query($sql);

Log::create($user_id, 'create_custom_page', "name:{$name}<br>url:{$url_stub}");

header('Location: index.php');
