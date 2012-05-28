<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$sql = "SELECT * FROM `{$database}`.`tags`;";
$tags = DB::search($sql);
