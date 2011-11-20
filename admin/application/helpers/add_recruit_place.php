<?php
/**
 * UNIFI Website
 * Adam Shannon
 */
 
$place = MySQL::clean($_GET['place']);
$sql = "INSERT INTO `{$database}`.`recruit_place` (`id`,`desc`) VALUES ('0', '{$place}');";
MySQL::query($sql);

header("Location: index.php?page=new_recruit_place");
