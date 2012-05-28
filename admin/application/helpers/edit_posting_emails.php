<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$emails = DB::single("SELECT `emails` from `{$database}`.`email_lists` WHERE `desc` = 'posting_emails' LIMIT 1");
