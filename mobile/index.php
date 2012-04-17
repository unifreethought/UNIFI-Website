<?php
/**
 * UNIFI Mobile Site
 * Adam Shannon
 */

// Load some libraries
require '../system/libs/mysql.class.php';
require '../system/libs/date.class.php';
require '../system/libs/sanitize.class.php';

// Load the config
require '../application/config/config.php';
require 'application/i18n/' . $config['i18n'];
if ($config['web'] !== 'enabled') {
	exit(WEB_ACCESS_DISABLED);
}

// Load the logging library
include '../admin/system/libs/log-actions.php';
Log::set($database);

// Include the errors handler
require '../system/errors/errors.php';

// Load the user stuff. (Facebook)
require_once "../system/libs/facebook/facebook.php";
require '../application/helpers/user.php';

// Check any cookies
//require 'application/helpers/cookie.php';
//$user_id = check_cookies();

// Check the url
require '../application/helpers/url.php';
$url = check_url();

// Load up the auth library
include '../system/libs/auth.php';
Auth::set($user_id, $database);

if ($url['post'] == true) {

	exit();
}

// Start with mobile specific details
include 'application/helpers/header.php';
include 'templates/' . $config['template'] . '/html/header.html';

// Find what page to load
if ($url['get'] == true) {

  switch ($url['page']) {
    case 'post':
      include 'application/helpers/show_post.php';
      include 'templates/' . $config['template'] . '/html/show_post.html';
    break;

    default:
      include '../application/helpers/detect_page.php';
      $url_stubs = get_possible_url_stubs();

      if (in_array($url['page'], $url_stubs)) {
          // Load that specifc page from the db and display it.
          include 'application/helpers/load_db_page.php';
          include 'templates/' . $config['template'] . '/html/load_db_page.html';
      } else {
          if ($url['page'] != 'register') {
            include 'application/helpers/main.php';
            include 'templates/' . $config['template'] . '/html/main.html';
          }
      }
    break;
  }
}

include 'templates/' . $config['template'] . '/html/footer.html';
