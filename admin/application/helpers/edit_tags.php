
<?php
/**
 * UNIFI Website
 * Adam Shanon
 */

$sql = "SELECT * FROM `{$database}`.`tags`;";
$tags = MySQL::search($sql);
