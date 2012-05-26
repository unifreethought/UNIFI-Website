<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$sql = "SELECT * FROM `{$database}`.`positions`;";
$positions = MySQL::search($sql);
