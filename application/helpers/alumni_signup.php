<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

$majors = MySQL::search("SELECT * FROM `{$database}`.`major` ORDER BY `desc` ASC");
