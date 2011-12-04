<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
 
// Set the mail headers
$headers  = "From: UNI Freethinkers and Inquirers <contact@unifreethought.com>\r\n";  
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Grab the details
// WARNING: We're not going to escape these, because we want to keep the html code
$subject = $_POST['subject'];
$message = $_POST['message'];

// Grab the list of emails
$sql = "SELECT `email` FROM `{$database}`.`newsletter_emails`";
$emails = MySQL::search($sql);

// Send them
foreach ($emails as $email) {
	mail($email['email'], $subject, stripslashes($message), $headers);
}

header("Location: index.php");
exit();
