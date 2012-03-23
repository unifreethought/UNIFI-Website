<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

function get_possible_url_stubs() {
  
  // Pull the pages from the db.
  $pages = MySQL::search("SELECT `url_stub` FROM `" . MySQL::$database . "`.`pages`");
  
  $url_stubs = array();
  
  foreach ($pages as $page) {
    array_push($url_stubs, $page['url_stub']);
  }
  
  return $url_stubs;
}
