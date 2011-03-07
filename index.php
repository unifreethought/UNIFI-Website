<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
// Load some libraries
require 'system/libs/mysql.class.php';
require 'system/libs/date.class.php';
require 'system/libs/sanitize.class.php';

// Load the config
require 'application/config/config.php';
require 'application/i18n/' . $config['i18n'];
if ($config['web'] !== 'enabled') {
	exit(WEB_ACCESS_DISABLED);
}

// Load the logging library
include 'admin/system/libs/log-actions.php';
Log::set($database);

// Include the errors handler
require 'system/errors/errors.php';

// Load the user stuff. (Facebook)
require 'application/helpers/user.php';
//echo $fb_id . '<br />';
//echo $user_id . '<br />';

// Check any cookies
//require 'application/helpers/cookie.php';
//$user_id = check_cookies();

// Check the url
require 'application/helpers/url.php';
$url = check_url();

if ($url['post'] == true) {
	if ($_POST['page'] == 'new-user') {
		require 'application/helpers/form_register.php';
	}
	
	if ($_POST['page'] == 'comment-reply') {
		require 'application/helpers/comment_reply.php';
	}

	exit();
}

include 'application/helpers/header.php';
include 'templates/' . $config['template'] . '/html/header.html';

// Find what page to load
if ($url['get'] == true) {

	// Special conditional catches
	if ($show_register_form == true) {
		require 'application/helpers/register.php';
		require 'templates/' . $config['template'] . '/html/register.html';
		$jump_to_footer = true;
	} else {
		$jump_to_footer = false;
	}
	
	if ($_GET['page'] == 'attend_event') {
		require 'application/helpers/attend_event.php';
		require 'templates/' . $config['template'] . '/html/attend_event.html';
		$jump_to_footer = true;
	} else {
		$jump_to_footer = false;
	}
	
	// Load specific pages.
	if (!$jump_to_footer) {
		if (empty($url['page'])) {
			$url['page'] = 'main';
		}
	
		switch ($url['page']) {
			
			case 'view_events':
				include 'application/helpers/show_events.php';
				include 'templates/' . $config['template'] . '/html/show_events.html';
			break;
			
			case 'profile':
				include 'application/helpers/show_profile.php';
				include 'templates/' . $config['template'] . '/html/show_profile.html';
			break;
			
			case 'post':
				include 'application/helpers/show_post.php';
				include 'templates/' . $config['template'] . '/html/show_post.html';
			break;
			
			default:
				include 'application/helpers/detect_page.php';
				$url_stubs = get_possible_url_stubs();
				
				if (in_array($url['page'], $url_stubs)) {
					// Load that specifc page from the db and display it.
					include 'application/helpers/load_db_page.php';
					include 'templates/' . $config['template'] . '/html/load_db_page.html';
				} else {
					include 'application/helpers/main.php';
					include 'templates/' . $config['template'] . '/html/main.html';
				}
			break;
		}	
	}
	
}

include 'templates/' . $config['template'] . '/html/footer.html';
