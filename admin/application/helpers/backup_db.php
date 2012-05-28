<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$cmd = "DBdump -u {$username} -p'{$password}' {$database}";
$data = shell_exec($cmd);

Log::create($user_id, "backup_db", "The database backup was viewed.");
