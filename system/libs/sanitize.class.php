<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-03-21
 */
class Clean {
  // static public $allowed_tags = '<a><b><canvas>';
  static public $allowed_tags = '';

  /**
   * tags(str String)
   * This function will strip all tags (barring self::$allowed_tags)
   * from a string.
   *
   * @parm: String - The string to clean
   * @return: String - The cleaned string
   */
  static function tags($string) {

    return strip_tags($string, self::$allowed_tags);

  }

  /**
   * alphanumeric(str String)
   * This function will strip all non alphanumeric characters from a string.
   *
   * @parm: String - The string to parse
   * @return: String - The alphanumeric string
   */
  static function alphanumeric($string) {

    return preg_replace('/([^a-z0-9]+)/i', '', $string);

  }

  /**
   * length(int Min, int Max, str String)
   * This is a workaround to php's trim() function
   *
   * @parm: Min - The min length for the string
   * @parm: Max - The max length for the string
   * @parm: String - The string to process
   * @return: String - The string of [Min < length < Max]
   */
  static function length($min, $max, $string) {

    $length = strlen($string);

    if ($length < $min) {

      return $string . str_repeat(substr($string, -1), $min - $length);

    } else {

      return substr($string, 0, $max);

    }

  }

  /**
   * output(str String)
   * Output a string in a clean way (from the db).
   *
   * @parm: String
   * @return: None
   */
  static function output($string) {
    return stripslashes($string);
  }

}

