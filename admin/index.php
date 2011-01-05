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
	
	// Check to see if the $user_id can view the admin dashbord. 
	$user_id = MySQL::clean($user_id);
	$can_view_dashbord = MySQL::single("SELECT `access_admin_dashbord` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
	if ($can_view_dashbord['access_admin_dashbord'] != '1') {
		exit(ADMIN_NOT_AUTHORIZED);
	}
	
	switch ($url['page']) {
	
		case 'post':
			
			// Check the user's auth for posting access
			echo 'Post to the blog';
			
			$can_post = MySQL::single("SELECT `post_to_blog` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
	
			if ($can_post['post_to_blog'] == 1) {
				// Load posting scripts/pages
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'list':
			include 'application/helpers/list_users.php';
			include 'templates/' . $config['template'] . '/html/list_users.html';
		break;
		
		default:
			include 'templates/' . $config['template'] . '/html/dashbord.html';
		break;
		
	}
	
	include 'templates/' . $config['template'] . '/html/footer.html';
}
