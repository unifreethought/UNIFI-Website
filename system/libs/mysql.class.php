<?php
/**
* MySQL Library
* Adam Shannon
*/

class MySQL {
  static private $hostname;
  static private $username;
  static private $password;
  static public $database;
  static private $connection;
  static public $query_count = 0;

  static public function set_vars($hostname, $username, $password, $database) {
    self::$hostname = $hostname;
    self::$username = $username;
    self::$password = $password;
    self::$database = $database;

    self::$connection = self::connect(self::$hostname, self::$username, self::$password);
  }


  static public function clean($string) {
    return mysql_real_escape_string($string);
  }


  static public function connect() {
    if (self::$hostname == '' || self::$username == '' || self::$password == '') {
      return mysql_error();
    } else {
      $tmp = mysql_connect(self::$hostname, self::$username, self::$password);

      if (!$tmp) {
        unset($tmp);
        return "Error: Your MySQL connection failed.";
      } else {
        return $tmp;
      }
    }
  }

  static public function close() {
    if (mysql_close(self::$connection)) {
      return true;
    } else {
      return false;
    }
  }

  static public function assoc($query) {
    $data = array();
    $n = 0;

    while ($row = mysql_fetch_assoc($query)) {
      $data[$n++] = $row;
    }

    mysql_free_result($query);
    return $data;
  }

  static public function query($sql) {
    self::$query_count += 1;

    $result = mysql_query($sql, self::$connection);
    if (!$result) {
    $phpVars = "\n\n$_SERVER\n\n";
    foreach ($_SERVER as $key => $value) {
      $phpVars .= $key . ' ' . $value . "\n\n";
    }
    mail("errors@unifreethought.com", "Error: SQL Query Failure", $sql . '\n\n' . mysql_error($result) . $phpVars,
      "From: contact@unifreethought.com\r\n");
    }
    return $result;
  }

  static public function search($sql) {
    $tmp_query = self::query($sql);
    return self::assoc($tmp_query);
  }

  static public function single($sql) {
    $tmp_query = self::query($sql);
    return mysql_fetch_assoc($tmp_query);
  }

}
