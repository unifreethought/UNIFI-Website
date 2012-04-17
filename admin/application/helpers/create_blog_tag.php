<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

$tag = MySQL::clean($_GET['createBlogTag']);

$sql = "INSERT INTO `{$database}`.`blog-tag-names` (`id`,`tag`) VALUES ('0','{$tag}');";
MySQL::query($sql);

$id = MySQL::single("SELECT `id` FROM `{$database}`.`blog-tag-names` WHERE `tag` = '{$tag}' LIMIT 1;");

print "<li><label><input type='checkbox' class='tags' name='{$id['id']}'  />{$tag}</label></li>";

