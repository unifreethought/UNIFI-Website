<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// Load some libraries
require '../system/libs/mysql.class.php';
require '../system/libs/date.class.php';
require '../system/libs/sanitize.class.php';

// Load the config
require '../application/config/config.php';
require '../application/i18n/' . $config['i18n'];
if ($config['admin']!== 'enabled') {
	exit(WEB_ACCESS_DISABLED);
}

// Include the errors handler
require '../system/errors/errors.php';

// Load the user stuff. (Facebook)
require '../application/helpers/user.php';
//echo $fb_id . ' ' . $user_id . '<br />';

// Check the url
require '../application/helpers/url.php';
$url = check_url();
//print_r($url);

if ($url['post']) {
	echo 'HTTP POST REQUEST';
} else {
	// echo 'HTTP GET REQUEST';
	include 'templates/' . $config['template'] . '/html/header.html';
	
	switch ($url['page']) {
		
		default:
			include 'application/helpers/list_users.php';
			include 'templates/' . $config['template'] . '/html/list_users.html';
		break;
		
	}
	
	include 'templates/' . $config['template'] . '/html/footer.html';
}
