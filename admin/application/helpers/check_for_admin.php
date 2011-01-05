<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// Check to see if the $user_id can view the admin dashbord. 
$user_id = MySQL::clean($user_id);
$can_view_dashbord = MySQL::single("SELECT `access_admin_dashbord` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");

if ($can_view_dashbord['access_admin_dashbord'] != '1') {
	
	$can_post = MySQL::single("SELECT `post_to_blog` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
	
	if ($can_post['post_to_blog'] == 1) {
		echo "<script>window.location='index.php?page=post';</script>";
		exit(ADMIN_REDIRECT_TO_BLOG_POSTING);
	} else {
		exit(ADMIN_NOT_AUTHORIZED);
	}
	
}

// The template contains the layout for the admin dashbord.
