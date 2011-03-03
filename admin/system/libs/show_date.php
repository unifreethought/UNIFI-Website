<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
class Show_Date {

	// Show a <select> for the time/date list
	static function hour_minute($name = 'time', $now) {
		$html = "<select name='{$name}'>";
		
		for ($i = 0; $i < 24; $i++) {
			if ($i == $now) {
				$selected = ' selected';
			} else {
				$selected = '';
			}
		
			if ($i < 10) {
				$html .= "<option value='0{$i}:00'{$selected}>0{$i}:00</option>";
			} else {
				$html .= "<option value='{$i}:00'{$selected}>{$i}:00</option>";
			}
			
			if ($i < 10) {
				$html .= "<option value='0{$i}:30'{$selected}>0{$i}:30</option>";
			} else {
				$html .= "<option value='{$i}:30'{$selected}>{$i}:30</option>";
			}
		}
		
		return $html . '</select>';
	}
	
	// Show a dropdown element for the day with respect for the month.
	static function day($name = 'day', $now) {
		$today = empty($now) ? date('d') : $now;
		$days_in_month = @date('t');
		$html = "<select name='{$name}'>";
		
		for ($i = 1; $i <= $days_in_month; $i++) {
			$html .= "<option value='{$i}'";
			if ($today == $i) {
				$html .= ' selected';
			}
			$html .= ">{$i}</option>";
		}
		
		return $html . '</select>';
	}
	
	// Show a <select> element for the months
	static function month($name = 'month', $now) {
		$month = empty($now) ? date('n') : $now;
		$html = "<select name='{$name}'>";

		for ($i = 1; $i <= 12; $i++) {
			$html .= "<option value='{$i}'";
			if ($i == $month) {
				$html .= ' selected';
			}
			$html .= ">{$i}</option>";
		}
		
		return $html . '</select>';
	}
	
	// Show a <select> element for the years.
	static function year($name = 'year', $min = 2, $max = 5, $now) {
		$year = empty($now) ? date('Y') : $now;
		$html = "<select name='{$name}'>";
		
		// Show a few years before and a few after...
		// To allow past events and far future events.
		for ($i = $year - $min; $i <= ($year + $max); $i++) {
			$html .= "<option value='{$i}'";
			if ($i == $year) {
				$html .= ' selected';
			}
			$html .= ">{$i}</option>";
		}
		
		return $html . '</select>';
	}
	
	// Parse a date into a UNIX timestamp
	// It's thrown in here for convience.
	static function timestamp($hour, $minute, $day, $month, $year) {
		return mktime($hour, $minute, 00, $month, $day, $year);
	}
	
	// Parse a timestamp into: hour, minute, day, month, and year.
	static function parse($timestamp) {
		$tmp = explode(',', @date('H,m,d,m,Y', $timestamp));
		return array(
			'hour' => $tmp[0],
			'minute' => $tmp[1],
			'day' => $tmp[2],
			'month' => $tmp[3],
			'year' => $tmp[4]
		);
	}
	
}
