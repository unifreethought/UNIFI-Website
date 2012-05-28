<?php
/**
 * DB Layer
 * Adam Shannon
 */

require 'mysql.php';

class DB {

  static public function init($host, $user, $pass, $db) {
    MySQL::set_vars($host, $user, $pass, $db);
  }

  static public function clean($str) {
    return mysql_real_escape_string($str);
  }

  static public function close() {
    MySQL::close();
  }

  static public function query_count() {
    return MySQL::$query_count;
  }

  static public function query($sql) {
    return MySQL::query($sql);
  }

  static public function search($sql) {
    return MySQL::search($sql);
  }

  static public function single($sql) {
    return MySQL::single($sql);
  }

}
