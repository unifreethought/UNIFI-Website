<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$tag = DB::clean($_GET['createBlogTag']);

$sql = "INSERT INTO `{$database}`.`blog-tag-names` (`id`,`tag`) VALUES ('0','{$tag}');";
DB::query($sql);

$id = DB::single("SELECT `id` FROM `{$database}`.`blog-tag-names` WHERE `tag` = '{$tag}' LIMIT 1;");

print "<li><label><input type='checkbox' class='tags' name='{$id['id']}'  />{$tag}</label></li>";

