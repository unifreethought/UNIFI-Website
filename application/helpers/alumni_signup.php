<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$majors = DB::search("SELECT `id`,`desc` FROM `{$database}`.`major` ORDER BY `desc` ASC");
