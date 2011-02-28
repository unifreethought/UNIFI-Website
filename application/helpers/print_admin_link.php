<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
function print_admin_link($user_id, $database) {
	
	$tmp = MySQL::single("SELECT `access_admin_dashbord` FROM `{$database}`.`user-permissions` WHERE `user_id` = '{$user_id}' LIMIT 1");
	
	if ($tmp['access_admin_dashbord'] == '1') {
		echo "<a class='nav_item' href='admin/index.php'>" . MAIN_PAGE_ADMIN_NAV_LINK . "</a>";
	}
	
}
