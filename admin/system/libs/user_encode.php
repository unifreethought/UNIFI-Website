<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
/**
 * This class is designed to take user input from forms
 * and convert it to the proper DB values. 
 * (E.g. 'Campbell' => 3; or, Oct 31 2009 => 1234567890)
 */
class User_Encode {

	// Rember to set the database
	static $database = '';
	static function set($db) {
		self::$database = $db;
	}
	
	// A crude cache system
	static $years = array();
	static $majors = array();
	static $dorms = array();
	static $recruit_places = array();
	static $texting = array( 0 => 'No', 1 => 'Yes' );
	static $positions = array();
	static $tags = array();
	
	static function encode_year($year) {
		if (!empty($years[$year])) {
			return $years[$year];
		} else {
			$year = MySQL::clean($year);
			$tmp = MySQL::single("SELECT `id` FROM `" . self::$database . "`.`year` WHERE `desc` = '{$year}' LIMIT 1");
		
			// Add to the cache
			self::$years[$year] = $tmp['id'];
			return $tmp['id'];
		}
	}
	
	static function encode_major($major) {
		if (!empty($majors[$major])) {
			return $majors[$major];
		} else {
			$major = MySQL::clean($major);
			$tmp = MySQL::single("SELECT `id` FROM `" . self::$database . "`.`major` WHERE `desc` = '{$major}' LIMIT 1");
		
			// Add to the cache
			self::$majors[$major] = $tmp['id'];
			return $tmp['id'];
		}
	}
	
	static function encode_dorm($dorm) {
		if (!empty($dorms[$dorm])) {
			return $dorms[$dorm];
		} else {
			$dorm = MySQL::clean($dorm);
			$tmp = MySQL::single("SELECT `id` FROM `" . self::$database . "`.`dorm` WHERE `desc` = '{$dorm}' LIMIT 1");
		
			// Add to the cache
			self::$dorms[$dorm] = $tmp['id'];
			return $tmp['id'];
		}
	}
	
	static function encode_recruit_place($recruit_place) {
		if (!empty($recruit_places[$recruit_place])) {
			return $recruit_places[$recruit_place];
		} else {
			$recruit_place = MySQL::clean($recruit_place);
			$tmp = MySQL::single("SELECT `id` FROM `" . self::$database . "`.`recruit_place` WHERE `desc` = '{$recruit_place}' LIMIT 1");
		
			// Add to the cache
			self::$recruit_places[$recruit_place] = $tmp['id'];
			return $tmp['id'];
		}
	}
	
	static function encode_texting($texting) {
		if ($texting == 'Yes') {
			return '1';
		} else {
			return '0';
		}
	}
	
	static function encode_positions($positions) {
		$positions = explode(',', $positions);
		$msg = '';
		
		foreach ($positions as $item) {
			$item = trim($item);
			$item = MySQL::clean($item);
		
			if (!empty(self::$positions[$item])) {
				$msg .= self::$positions[$item] . ', ';
			} else {
				$tmp = MySQL::single("SELECT `id` FROM `" . self::$database . "`.`position` WHERE `desc` = '{$item}' LIMIT 1");
				self::$positions[$item] = $tmp['id'];
				$msg .= $tmp['id'] . ', ';
			}
			
		}
		
		return substr($msg, 0, -2);
	}
	
	static function encode_tags($tags) {
		$tags = explode(',', $tags);
		$msg = '';
		
		foreach ($tags as $item) {
			$item = trim($item);
			$item = MySQL::clean($item);
		
			if (!empty(self::$tags[$item])) {
				$msg .= self::$tags[$item] . ', ';
			} else {
				$tmp = MySQL::single("SELECT `id` FROM `" . self::$database . "`.`tags` WHERE `desc` = '{$item}' LIMIT 1");
				self::$tags[$item] = $tmp['id'];
				$msg .= $tmp['id'] . ', ';
			}
			
		}
		
		return substr($msg, 0, -2);
	}

}
