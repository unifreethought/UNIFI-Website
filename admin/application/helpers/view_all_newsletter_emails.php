<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
 
$sql = "SELECT `email` FROM `{$database}`.`newsletter_emails`;";
$emails = MySQL::search($sql);
