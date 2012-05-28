<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$email = DB::clean($_POST['email']);
$sql = "DELETE FROM `{$database}`.`newsletter_emails` WHERE `email` = '{$email}' LIMIT 1;";
DB::query($sql);
header("Location: index.php");
exit();
