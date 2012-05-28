<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function check_cookies() {

  if (!empty($_COOKIE['user'])) {
    $user_str = $_COOKIE['user'];
    $result = DB::search("SELECT `id` FROM `" . $database . "`.`users` WHERE `cookie` = '" . DB::clean($user_str) . "'");
    return $result[0]['id'];

  } else {
    return null;
  }

}
