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

// Load the logging library
include 'system/libs/log-actions.php';
Log::set($database);

// Include the errors handler
require '../system/errors/errors.php';

// Load the user stuff. (Facebook)
require '../application/helpers/user.php';
//echo $fb_id . ' ' . $user_id . '<br />';

// Load up the auth library
include '../system/libs/auth.php';
Auth::set($user_id, $database);

// Check the url
require '../application/helpers/url.php';
$url = check_url();
//print_r($url);

if ($url['post']) {
	// Load the helper to change a user's details.
	if (!empty($_POST['type_of_user_change']) && $_POST['type_of_user_change'] == 'edit_user') {
		
		// First authenticate the user against the db.
		// Then, make sure that the user can edit members.
		if (!Auth::edit_members()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_edit_user.php';
		}
	}
	
	if (!empty($_POST['create_user']) && $_POST['create_user'] == 'yes') {
		
		if (!Auth::edit_members()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_create_user.php';	
		}
		
	}
	
	if (!empty($_POST['delete_user']) && $_POST['delete_user'] == 'yes') {
		
		if (!Auth::edit_members()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_delete_user.php';
		}
		
	}
	
	if (!empty($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'yes') {
	
		if (!Auth::edit_members()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_confirm_delete_user.php';
		}
		
	}
	
	if (!empty($_POST['admin_post_to_blog']) && $_POST['admin_post_to_blog'] == 'post-new') {
		
		// Auth the user and check for the ability to post to the blog.
		if (!Auth::post_to_blog()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_blog_post.php';
		}
	}
	
	if (!empty($_POST['edit_blog_post']) && $_POST['edit_blog_post'] == 'yes') {
	
		// Auth the user and check for the ability to post to the blog.
		if (!Auth::post_to_blog()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_blog_post_edit.php';
		}
	
	}
	
	if (!empty($_POST['create_event']) && $_POST['create_event'] == 'yes') {
	
		// Auth the user and check for the ability to post to the blog.
		if (!Auth::edit_events()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_create_event.php';
		}
		
	}
	
	if (!empty($_POST['edit_event']) && $_POST['edit_event'] == 'yes') {
	
		// Auth the user and check for the ability to post to the blog.
		if (!Auth::edit_events()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_edit_event.php';
		}
	
	}

	if (!empty($_POST['create_custom_page']) && $_POST['create_custom_page'] == 'yes') {
		
		// Auth the user and check for the ability to edit custom pages.
		if (!Auth::edit_custom_pages()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_create_custom_page.php';
		}
		
	}
	
	if (!empty($_POST['edit_custom_page']) && $_POST['edit_custom_page'] == 'yes') {
		
		// Auth the user and check for the ability to edit custom pages.
		if (!Auth::edit_custom_pages()) {
			exit(ADMIN_NOT_AUTHORIZED);
		} else {
			include 'application/helpers/form_edit_custom_page.php';
		}
		
	}
	
	exit('');
	
} else {
	
	// Sometimes we need to check for a FB ID request
	// This is due to the lack of true cross site request compatability.
	if (!empty($_GET['getFBID'])) {
		$ch = curl_init();
		//echo "http://graph.facebook.com/" . $_GET['getFBID'] . '<br />';
		//echo 'a';
			curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
			curl_setopt($ch, CURLOPT_TIMEOUT, 10);
			curl_setopt($ch, CURLOPT_ENCODING, '');
			curl_setopt($ch, CURLOPT_REFERER, 'http://unifreethought.com/');
			curl_setopt($ch, CURLOPT_URL, "http://graph.facebook.com/" . $_GET['getFBID']);
			curl_setopt($ch, CURLOPT_USERAGENT, 'UNI Freethinkers and Inquirers Page Fetcher');
		echo curl_exec($ch);
		exit();
	}
	
	if (!empty($_GET['page']) && $_GET['page'] == 'invite_members') {
		include 'application/helpers/invite_all_members_to_event.php';
		exit();
	}
	
	if (!empty($_GET['addBlogTag'])) {
		include 'application/helpers/add_blog_tag.php';
		exit();
	}

	include 'templates/' . $config['template'] . '/html/header.html';
	
	// Clean the $user_id for each action. 
	$user_id = MySQL::clean($user_id);
	
	// Do a general check on viewing the dashbord.
	$view_dashbord = Auth::view_dashboard();
	
	switch ($url['page']) {
	
		case 'post':
			
			if (Auth::can_post_blog()) {
				include 'application/helpers/post_to_blog.php';
				include 'templates/' . $config['template'] . '/html/post_to_blog.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'list_blog_posts':
		
			if (Auth::can_post_blog()) {
				include 'application/helpers/list_blog_posts.php';
				include 'templates/' . $config['template'] . '/html/list_blog_posts.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'edit_blog_post':
			
			if (Auth::can_post_blog()) {
				include 'application/helpers/edit_blog_post.php';
				include 'templates/' . $config['template'] . '/html/edit_blog_post.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'create_user':
			
			if (Auth::edit_users()) {
				include 'application/helpers/create_user.php';
				include 'templates/' . $config['template'] . '/html/create_user.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'delete_user':
		
			if (Auth::edit_users()) {
				include 'application/helpers/delete_user.php';
				include 'templates/' . $config['template'] . '/html/delete_user.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'list_members':
		
			if (Auth::edit_users()) {
				include 'application/helpers/list_users.php';
				include 'templates/' . $config['template'] . '/html/list_users.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'edit_user':
		
			if (Auth::edit_users()) {
				include 'application/helpers/edit_user.php';
				include 'templates/' . $config['template'] . '/html/edit_user.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
		break;
		
		case 'search_users':
			
			if (Auth::edit_users()) {
				include 'application/helpers/search_users.php';
				include 'templates/' . $config['template'] . '/html/search_users.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'perform_search':
			
			if (Auth::edit_users()) {
				include 'application/helpers/perform_search.php';
				include 'templates/' . $config['template'] . '/html/perform_search.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'create_event':
		
			if (Auth::edit_events()) {
				include 'application/helpers/create_event.php';
				include 'templates/' . $config['template'] . '/html/create_event.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
		
		break;
		
		case 'list_events':
		
			if (Auth::edit_events()) {
				include 'application/helpers/list_events.php';
				include 'templates/' . $config['template'] . '/html/list_events.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
		case 'edit_event':
		
			if (Auth::edit_events()) {
				include 'application/helpers/edit_event.php';
				include 'templates/' . $config['template'] . '/html/edit_event.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;

		case 'create_custom_page':
		
			$can_edit_custom_pages = MySQL::single("SELECT `edit_custom_pages` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
			if ($view_dashbord == '1' && $can_edit_custom_pages['edit_custom_pages'] == 1) {
			
				// Feature still needed!!
				include 'application/helpers/create_custom_page.php';
				include 'templates/' . $config['template'] . '/html/create_custom_page.html';
			
			} else {
			
				exit(ADMIN_NOT_AUTHORIZED);
			
			}
			
		break;
		
		case 'list_custom_pages':
		
			$can_edit_custom_pages = MySQL::single("SELECT `edit_custom_pages` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
			if ($view_dashbord == '1' && $can_edit_custom_pages['edit_custom_pages'] == 1) {
			
				// Feature still needed!!
				include 'application/helpers/list_custom_pages.php';
				include 'templates/' . $config['template'] . '/html/list_custom_pages.html';
			
			} else {
			
				exit(ADMIN_NOT_AUTHORIZED);
			
			}
			
		break;
		
		
		case 'edit_custom_page':
		
			$can_edit_custom_pages = MySQL::single("SELECT `edit_custom_pages` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
			if ($view_dashbord == '1' && $can_edit_custom_pages['edit_custom_pages'] == 1) {
			
				// Feature still needed!!
				include 'application/helpers/edit_custom_page.php';
				include 'templates/' . $config['template'] . '/html/edit_custom_page.html';
			
			} else {
			
				exit(ADMIN_NOT_AUTHORIZED);
			
			}
			
		break;
		
		case 'view_log':
		
			$can_view_log = MySQL::single("SELECT `view_log` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
			if ($view_dashbord == '1' && $can_view_log['view_log'] == 1) {
			
				// Feature still needed!!
				include 'application/helpers/view_log.php';
				include 'templates/' . $config['template'] . '/html/view_log.html';
			
			} else {
			
				exit(ADMIN_NOT_AUTHORIZED);
			
			}
			
		break;
		
		
		default:
			
			if ($view_dashbord) {
				include 'templates/' . $config['template'] . '/html/dashbord.html';
			} else {
				exit(ADMIN_NOT_AUTHORIZED);
			}
			
		break;
		
	}
	
	include 'templates/' . $config['template'] . '/html/footer.html';
}
