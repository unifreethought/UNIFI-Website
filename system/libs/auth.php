<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2011-03-08
 */

class Auth {
	
	static $user_id;
	static $database;
	
	/**
	 * Set the user_id variable on self.
	 */
	static function set($id, $db) {
		self::$user_id = $id;
		self::$database = $db;
	}
	
	/**
	 * Check to see if the user can edit members
	 */
	static function edit_members() {
		$tmp = MySQL::single("SELECT `edit_members` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($tmp['edit_members'] == '1') {
			return true;
		} else {
			return false;
		}
	}
	
	
	/**
	 * Check to see if the user can post to the blog.
	 */
	static function post_to_blog() {
		$tmp = MySQL::single("SELECT `post_to_blog` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($tmp['post_to_blog'] == '1') {
			return true;
		} else {
			return false;
		}
	}
}
