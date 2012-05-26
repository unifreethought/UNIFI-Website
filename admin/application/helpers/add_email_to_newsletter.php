<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include '../system/libs/rand_string.class.php';
RandString::set_extra_characters(array('0','1','2','3','4','5','6','7','8','9'));

$email = MySQL::clean($_POST['email']);
$unsub_code = RandString::generate(32);
$sql = "INSERT INTO `{$database}`.`newsletter_emails` (`email`,`unsubscribe_code`) VALUES ('{$email}','{$unsub_code}');";
MySQL::query($sql);
header("Location: index.php");
exit();
