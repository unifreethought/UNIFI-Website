<?php
/**
 * RandString Class
 * Adam Shannon
 */

class RandString {

	// Set the allowed characters.
	// These are the ASCII values for 'a' and 'z'.
	static $ascii_min = 97;
	static $ascii_max = 122;
	static $allowed_characters = array('!', '@', '#', '\$', '%', '^', '&', '*', '(', ')', '-', '//', '\/', '\\');

	/**
	 * @name: set_extra_characters
	 * We can change the set of characters allowed.
	 *
	 * @parm: $chars
	 * @return: void
	 */
	static function set_extra_characters($chars) {
		self::$allowed_characters = $chars;
	}

	/**
	 * @name: generate
	 * This will generate a random string of length $length.
	 *
	 * @parm: $length <- [Optional] The strings length.
	 * @return: str
	 */
	static function generate($length = 8) {

		// Set some constants.
		$count = count(self::$allowed_characters) - 1;
		$string = '';

		// Generate the string.
		for ($n = 0; $n < $length; $n++) {

			// Decide what to use.
			if (rand(0, 7) % 2 == 0) {

				// Use an ASCII character
				$string .= chr(rand(self::$ascii_min, self::$ascii_max));

			} else {

				// Otherwise add a character.
				if (self::$allowed_characters != array())
					$string .= self::$allowed_characters[rand(0, $count)];
				else
					$string .= chr(rand(self::$ascii_min, self::$ascii_max));

			}

		}

	return $string;
	}

}
