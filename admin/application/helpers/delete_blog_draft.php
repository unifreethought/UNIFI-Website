<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$draft_id = MySQL::clean($_GET['id']);
$sql = "DELETE FROM `{$database}`.`blog-drafts` WHERE `blog-drafts`.`id` = '{$post_id}';";
MySQL::query($sql);

header("Location: index.php");
exit();
