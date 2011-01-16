<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-03-21
 */

class Date {
	
	static public $format = 'H:i:s \o\n Y-m-d';
	
	
	/**
	 * parse(int timestamp)
	 * This function will parse a unix timestamp and return the 
	 * value in self::$format's format.
	 *
	 * @parm: int timestamp - The UNIX timestamp
	 * @return mixed - The date in self::$format's format.
	 */
	static function parse($timestamp) {
		
		return @date(self::$format, $timestamp);
		
	}
}
