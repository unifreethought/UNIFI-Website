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
	
	/**
	 * Check to see if the user can edit events.
	 */
	static function edit_events() {
		$tmp = MySQL::single("SELECT `add_events`,`list_events` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($tmp['add_events'] == '1' && $tmp['list_events'] == '1') {
			return true;
		} else {
			return false;		
		}
	}
	
	/**
	 * Check to see if the user can edit custom pages.
	 */
	static function edit_custom_pages() {
		$tmp = MySQL::single("SELECT `edit_custom_pages` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($tmp['edit_custom_pages'] == '1') {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Auth the user to see if they can view the admin dashboard.
	 */
	static function view_dashboard() {
		$can_view_dashbord = MySQL::single("SELECT `access_admin_dashbord` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($can_view_dashbord['access_admin_dashbord'] == '1') {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Auth the user to see if they can post to the blog.
	 */
	static function can_post_blog() {
		$can_post = MySQL::single("SELECT `post_to_blog` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($can_post['post_to_blog'] == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Auth the user to see if they can edit users.
	 */
	static function edit_users() {
		$can_edit = MySQL::single("SELECT `edit_members` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($can_edit['edit_members'] == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * Auth the user to see if they can view the log.
	 */
	static function view_log() {
		$can_view_log = MySQL::single("SELECT `view_log` FROM `" . self::$database . "`.`user-permissions` WHERE `user_id` = '" . self::$user_id . "' LIMIT 1");
		if ($can_view_log['view_log'] == '1') {
			return true;
		} else {
			return false;
		}
	}
}
