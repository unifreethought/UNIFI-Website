<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$headers  = "From: UNI Freethinkers and Inquirers <contact@unifreethought.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "SELECT `email` FROM `{$database}`.`newsletter_emails`";
$emails = DB::search($sql);

foreach ($emails as $email) {
	mail($email['email'], $subject, stripslashes($message), $headers);
}

Log::create($user_id, "sent_newsletter", "Subject: " . $subject);

header("Location: index.php");
exit();
