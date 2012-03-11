<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$emails = MySQL::clean($_POST['emails']);
$sql = "UPDATE  `{$database}`.`email_lists` SET  `emails` =  '{$emails}' WHERE  `email_lists`.`desc` = 'commenting_emails';";
MySQL::query($sql);

header("Location: index.php");
exit();
