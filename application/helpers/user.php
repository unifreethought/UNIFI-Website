<?php
/**
 * UNIFI Website
 * Adam Shannon
 */

function print_fb_button() {
  echo "<fb:login-button id='fb_button' autologoutlink='true'></fb:login-button>";
}

function print_fb_script() {
    echo '
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
           FB.init({appId: ' . FACEBOOK_APP_ID . ', status: true, cookie: true, xfbml: true});
      FB.Event.subscribe(\'auth.authResponseChange\', function(response) {
        if (document.querySelector(\'#admin-box\') !== undefined) {
          var html = "<h3>Admin</h3><div><div class=\'no-border\'><span><a href=\'admin/index.php\'>Dashboard</a></span></div></div>";
          var adminBox = document.createElement(\'div\');
            adminBox.innerHTML = html;
            adminBox.id = \'admin-box\';
          document.querySelector(\'#connect-with-us\').insertBefore(adminBox);
        }
      });
      };
      (function() {
        var e = document.createElement(\'script\');
        e.type = \'text/javascript\';
        e.src = document.location.protocol +
          \'\/\/connect.facebook.net/en_GB/all.js\';
        e.async = true;
        document.getElementById(\'fb-root\').appendChild(e);
      }());

      /**
      document.getElementById(\'fb_button\').onclick = function () {
         setTimeout(function () {
           if (window.confirm(\'' . FB_LOGIN_OUT_ALERT . '\')) {
             window.location.reload();
           }
         }, 500);
      };
      **/
    </script>';
}

function get_more_fb_data($fb_id, $access_token) {

  $url = 'https://graph.facebook.com/me?access_token=' . $access_token . '&fields=id,first_name,last_name,gender,hometown,email';
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

function get_user_id_on_exist($fb_id, $database) {
  $result = DB::search("SELECT `id` FROM `" . $database . "`.`users` WHERE `facebook` = '" . DB::clean($fb_id) . "' LIMIT 1");
  if (!empty($result[0]['id'])) {
    return $result[0]['id'];
  } else {
    return false;
  }
}

$facebook = new Facebook(
  array(
    'appId' => FACEBOOK_APP_ID,
    'secret' =>  FACEBOOK_SECRET,
    'fileUpload' => false
  )
);

$fb_id = $facebook->getUser();
$user_id = get_user_id_on_exist($fb_id, $database);
$access_token = $facebook->getAccessToken();

  if (!$user_id && $fb_id > 0) {
    $show_register_form = true;
    $fb_data = get_more_fb_data($fb_id, $access_token);
  } else {
    $show_register_form = false;
  }

