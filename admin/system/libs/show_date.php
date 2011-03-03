<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */
 
class Show_Date {

	// Show a <select> for the time/date list
	static function hour_minute($name = 'time') {
		$html = "<select name='{$name}'>";
		
		for ($i = 0; $i < 24; $i++) {
			if ($i < 10) {
				$html .= "<option value='0{$i}:00'>0{$i}:00</option>";
			} else {
				$html .= "<option value='{$i}:00'>{$i}:00</option>";
			}
			
			if ($i < 10) {
				$html .= "<option value='0{$i}:30'>0{$i}:30</option>";
			} else {
				$html .= "<option value='{$i}:30'>{$i}:30</option>";
			}
		}
		
		return $html . '</select>';
	}
	
	// Show a dropdown element for the day with respect for the month.
	static function day($name = 'day') {
		$today = @date('d');
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
	static function month($name = 'month') {
		$month = @date('n');
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
	static function year($name = 'year', $min = 2, $max = 5) {
		$year = @date('Y');
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
	
}
