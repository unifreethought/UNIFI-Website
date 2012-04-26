<?php
/**
 * UNIFI Website
 * Adam Shanon
 */

$sql = "SELECT * FROM `{$database}`.`positions`;";
$positions = MySQL::search($sql);
