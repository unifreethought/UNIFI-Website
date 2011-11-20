<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
 
$places = MySQL::search("SELECT `desc` FROM `{$database}`.`recruit_place`");

