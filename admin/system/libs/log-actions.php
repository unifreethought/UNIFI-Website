<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

class Log {
	
	static $sql = "";
	static $db;
	
	static function set($database) {
		self::$db = $database;
	}
	
	static function get_message($keyword) {
		$kword = MySQL::clean($keyword);
		$tmp = MySQL::single("SELECT `id` FROM `" . self::$db . "`.`log-messages` WHERE `keyword` = '{$kword}' LIMIT 1");
		return $tmp['id'];
	}
	
	static function create($user, $keyword, $unique) {
		$time = @time();
		$user = MySQL::clean($user);
		$keyword = MySQL::clean($keyword);
		$unique = MySQL::clean($unique);
		
		$message = self::get_message($keyword);
		
		$sql = "INSERT INTO `" . self::$db . "`.`log` (`id`,`user_id`,`timestamp`,`message_id`,`unique_data`) VALUES ";
		$sql .= "('0','{$user}','{$time}','{$message}','{$unique}');";
		
		echo $sql;
		
		MySQL::query($sql);
	}
}
