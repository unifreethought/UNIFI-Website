<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

function get_facebook_cookie($app_id, $application_secret) {
  $args = array();
  parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
  ksort($args);
  $payload = '';
  foreach ($args as $key => $value) {
    if ($key != 'sig') {
      $payload .= $key . '=' . $value;
    }
  }
  if (md5($payload . $application_secret) != $args['sig']) {
    return null;
  }
  return $args;
}

function print_fb_button() {
	echo "<fb:login-button autologoutlink='true'></fb:login-button>";
}

function print_fb_script() {
    echo '
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({appId: ' . FACEBOOK_APP_ID . ', status: true, cookie: true,
                 xfbml: true});
      };
      (function() {
        var e = document.createElement(\'script\');
        e.type = \'text/javascript\';
        e.src = document.location.protocol +
          \'\/\/connect.facebook.net/en_GB/all.js\';
        e.async = true;
        document.getElementById(\'fb-root\').appendChild(e);
      }());
    </script>';
}

function get_more_fb_data($fb_id) {
	$url = 'https://graph.facebook.com/' . $fb_id;
	//$url .= '?metadata=1';
	$ch = curl_init();
		curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_ENCODING, 'utf-8');
		curl_setopt($ch, CURLOPT_REFERER, BASE_URL);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, SITE_TITLE);
		
	return json_decode(curl_exec($ch), true);
}

// Both of the following constants are found in:
// application/config/config.php
$fb_cookie_response = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);
if ($fb_cookie_response) {
	$fb_id = $fb_cookie_response['uid'];
}
