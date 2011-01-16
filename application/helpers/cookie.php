<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

function check_cookies() {
	
	if (!empty($_COOKIE['user'])) {
		$user_str = $_COOKIE['user'];
		$result = MySQL::search("SELECT `id` FROM `" . MySQL::$database . "`.`users` WHERE `cookie` = '" . MySQL::clean($user_str) . "'");
		return $result[0]['id'];
		
	} else {
		return null;
	}
	
}
