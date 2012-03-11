<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$cmd = "mysqldump -u {$username} -p{$password} {$database}";
$data = shell_exec($cmd);
