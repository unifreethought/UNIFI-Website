<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$email = MySQL::clean($_POST['email']);
$sql = "DELETE FROM `{$database}`.`newsletter_emails` WHERE `email` = '{$email}' LIMIT 1;";
MySQL::query($sql);
header("Location: index.php");
exit();
