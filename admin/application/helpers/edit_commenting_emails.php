<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$emails = DB::single("SELECT `emails` from `{$database}`.`email_lists` WHERE `desc` = 'commenting_emails' LIMIT 1");
