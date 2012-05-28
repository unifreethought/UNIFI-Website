<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

if (empty($_GET['older_than'])) {
	$_GET['older_than'] = @time();
}

$data = DB::search("SELECT * FROM `{$database}`.`log` WHERE `timestamp` < " . DB::clean($_GET['older_than']) . " ORDER BY `timestamp` DESC LIMIT 100");
$results = array();

foreach ($data as $item) {
	$id = $item['id'];
	$user = DB::single("SELECT `first_name`,`last_name` FROM `{$database}`.`users` WHERE `id` = '{$item['user_id']}' LIMIT 1");
	$time = Date::parse($item['timestamp']);
	$message = DB::single("SELECT `message` FROM `{$database}`.`log-messages` WHERE `id` = '{$item['message_id']}' LIMIT 1");
	$unique = $item['unique_data'];

	$results[] = array(
		'id' => $id,
		'user' => $user['first_name'] . ' ' . $user['last_name'],
		'time' => $time,
		'message' => $message['message'],
		'unique' => $unique
	);
}
