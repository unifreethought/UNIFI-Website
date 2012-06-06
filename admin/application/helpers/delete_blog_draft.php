<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$draft_id = DB::clean($_GET['id']);
$sql = "DELETE FROM `{$database}`.`blog-drafts` WHERE `blog-drafts`.`id` = '{$draft_id}';";
DB::query($sql);

header("Location: index.php");
exit();
