<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$name = DB::clean($_GET['name']);
$email = DB::clean($_GET['email']);
$comments = DB::clean($_GET['comments']);

$headers  = "From: UNI Freethinkers and Inquirers <contact@unifreethought.com>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// Mail it out.
$emails = array("webmaster@unifreethought.com", "contact@unifreethought.com");
foreach ($emails as $to) {
  mail($to, "A new Feedback Response.", "From: {$name}\nEmail: {$email}\n\n{$comments}", $headers);
}

header("Location: index.php?feedback");
exit();
