<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$emails = DB::clean($_POST['emails']);
$sql = "UPDATE  `{$database}`.`email_lists` SET  `emails` =  '{$emails}' WHERE  `email_lists`.`desc` = 'commenting_emails';";
DB::query($sql);

Log::create($user_id, "edit_commentnig_emails", "Email Added: {$emails}");

header("Location: index.php");
exit();
