<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// Load some libraries
require 'system/libs/mysql.class.php';

// Load the config
require 'application/config/config.php';
require 'application/i18n/' . $config['i18n'];
if ($config['web'] !== 'enabled') {
	exit(WEB_ACCESS_DISABLED);
}

// Include the errors handler
require 'system/errors/errors.php';

// Check any cookies
require 'application/helpers/cookie.php';
$user_id = check_cookies();

// Check the url
require 'application/helpers/url.php';
// $url = check_url();

include 'application/helpers/header.php';
include 'templates/' . $config['template'] . '/html/header.html';

// Find what page to load
if ($url['post'] == true) {

	switch ($url['page']) {
		case 'new-user':
		
		break;
	}

	exit();
} else {
	
	switch ($url['page']) {
		
		case 'about':
			// ... //
		break;
		
		default:
			include 'application/helpers/main.php';
			include 'templates/' . $config['template'] . '/html/main.html';
	}
	
}

include 'templates/' . $config['template'] . '/html/footer.html';
