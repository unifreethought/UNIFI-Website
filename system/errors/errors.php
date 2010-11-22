<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
class Error {
	
	static function show($number) {
		include 'system/errors/' . $number . '.html';
		exit();
	}	
	
}
