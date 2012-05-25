<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$majors = MySQL::search("SELECT `id`,`desc` FROM `{$database}`.`major` ORDER BY `desc` ASC");
