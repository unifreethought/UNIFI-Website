<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
$tags = MySQL::search("SELECT `id`,`tag` FROM `{$database}`.`blog-tag-names`");
