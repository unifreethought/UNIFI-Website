<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// How do you want to handle errors?
error_reporting(E_ALL);

// Database Info
$hostname = '';
$username = '';
$password = '';
$database = '';

// The Facebook App info
define('FACEBOOK_APP_ID', '');
define('FACEBOOK_SECRET', '');

$base_href = "http://www.unifreethought.com";

// Connect
MySQL::set_vars($hostname, $username, $password, $database);

// Set some settings
$config = array(
	'admin' => 'enabled',
	'web' => 'enabled',
	'i18n' => 'en.php',
	'i18n-admin' => 'en.php',
        'allowable_blog_tags' => '<strong><b><em><i><img><a><iframe><p>',
        'allowable_mobile_tags' => '<p><div><br>',
        'template' => 'epoch', // Don't include the trailing slash
        'mobile_template' => 'epoch',
	'admin_email' => ''
);
