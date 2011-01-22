<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
function check_url() {
	
	$post = $_POST;
	$get = $_GET;
	$url = array();
	
	// Set the ['post'] or ['get'] flag
	if (!empty($post) && empty($get)) {
		$url['get'] = (bool) false;
		$url['post'] = (bool) true;
	} else {
		$url['get'] = (bool) true;
		$url['post'] = (bool) false;
	}
	
	// Set the ['page'] entry
	// Here we can check for array_key_exists.
	if (!empty($get['page'])) {
		$url['page'] = $get['page'];
		
		// Now, set the relevant fields per the ['page'].
		foreach ($get as $key => $value) {
			if (empty($url[$key])) {
				$url[$key] = $value;
			}
		}
	} else {
		$url['page'] = 'main';
	}
	
	
	return $url;
}
