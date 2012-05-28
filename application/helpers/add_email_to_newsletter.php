<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

include 'system/libs/rand_string.class.php';
RandString::set_extra_characters(array('0','1','2','3','4','5','6','7','8','9'));

$email = DB::clean($_POST['email']);
$unsub_code = RandString::generate(32);
$sql = "INSERT INTO `{$database}`.`newsletter_emails` (`email`,`unsubscribe_code`) VALUES ('{$email}','{$unsub_code}');";
DB::query($sql);
header("Location: index.php");
exit();
