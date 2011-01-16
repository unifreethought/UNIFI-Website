<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
/**
 * This class requires the following libraries to be loaded:
 *  system/libs/date.class.php
 *  system/libs/mysql.class.php
 */
class User_Parse {

	// Rember to set the database
	static $database = '';
	static function set($db) {
		self::$database = $db;
	}
	
	// A simple cache system.
	static $years = array();
	static $majors = array();
	static $dorms = array();
	static $recruit_places = array();
	static $texting = array( 0 => 'No', 1 => 'Yes' );
	static $positions = array();
	static $tags = array();
	
	// The functions themselves
	static function parse_year($year) {
		if (!empty(self::$years[$year])) {
			return self::$years[$year];
		}
		
		$year = MySQL::clean($year);
		$tmp = MySQL::single("SELECT `desc` FROM `" . self::$database . "`.`year` WHERE `id` = '{$year}' LIMIT 1");
		
		// Add to the cache
		self::$years[$year] = $tmp['desc'];
		return $tmp['desc'];
	}
	
	// Parse the major from the cache and db
	static function parse_major($major) {
		if (!empty(self::$majors[$major])) {
			return self::$majors[$major];
		}
		
		$major = MySQL::clean($major);
		$tmp = MySQL::single("SELECT `desc` FROM `" . self::$database . "`.`major` WHERE `id` = '{$major}' LIMIT 1");
		
		// Add to the cache
		self::$majors[$major] = $tmp['desc'];
		return $tmp['desc'];
	}
	
	// Parse the dorm from the cache and db
	static function parse_dorm($dorm) {
		if (!empty(self::$dorms[$dorm])) {
			return self::$dorms[$dorm];
		}
		
		$dorm = MySQL::clean($dorm);
		$tmp = MySQL::single("SELECT `desc` FROM `" . self::$database . "`.`dorm` WHERE `id` = '{$dorm}' LIMIT 1");
		
		// Add to the cache
		self::$dorms[$dorm] = $tmp['desc'];
		return $tmp['desc'];
	}
	
	// Parse the recruit_place from the cache and db
	static function parse_recruit_place($place) {
		if (!empty(self::$recruit_places[$place])) {
			return self::$recruit_places[$place];
		}
		
		$place = MySQL::clean($place);
		$tmp = MySQL::single("SELECT `desc` FROM `" . self::$database . "`.`recruit_place` WHERE `id` = '{$place}' LIMIT 1");
		
		// Add to the cache
		self::$recruit_places[$place] = $tmp['desc'];
		return $tmp['desc'];
	}
	
	// Parse the texting from the cache and db
	static function parse_texting($texting) {
		return (self::$texting[$texting] == '0') ? 'No' : 'Yes';
	}
	
	// Parse the [member] position(s) from the cache and db
	static function parse_positions($positions) {
		$positions = explode(',', $positions);
		$msg = '';
		
		foreach ($positions as $item) {
		
			if (!empty(self::$positions[$item])) {
				$msg .= self::$positions[$item] . ', ';
			} else {
				$tmp = MySQL::single("SELECT `desc` FROM `" . self::$database . "`.`positions` WHERE `id` = '{$item}' LIMIT 1");
				self::$positions[$item] = $tmp['desc'];
				$msg .= $tmp['desc'] . ', ';
			}
			
		}
		
		return substr($msg, 0, -2);
	}
	
	// Parse the [member] tag(s) from the cache and db
	static function parse_tags($tags) {
		$tags = explode(',', $tags);
		$msg = '';
		
		foreach ($tags as $item) {
		
			if (!empty(self::$tags[$item])) {
				$msg .= self::$tags[$item] . ', ';
			} else {
				$tmp = MySQL::single("SELECT `desc` FROM `" . self::$database . "`.`tags` WHERE `id` = '{$item}' LIMIT 1");
				self::$tags[$item] = $tmp['desc'];
				$msg .= $tmp['desc'] . ', ';
			}
			
		}
		
		return substr($msg, 0, -2);
	}
	
}
