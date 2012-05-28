<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// Load some libraries
require 'system/libs/db.php';
require 'system/libs/date.class.php';
require 'system/libs/sanitize.class.php';

// Load the config
require 'application/config/config.php';
require 'application/i18n/' . $config['i18n'];
if ($config['web'] !== 'enabled') {
  exit(WEB_ACCESS_DISABLED);
}

// Is it a mobile browser?
require_once ('system/libs/TeraWurflRemoteClient.php');
  $wurflObj = new TeraWurflRemoteClient('http://wurfl.thesedays.com/webservice.php');
  $capabilities = array("product_info");
  $data_format = TeraWurflRemoteClient::$FORMAT_JSON;
  $wurflObj->getCapabilitiesFromAgent(null, $capabilities, $data_format);

if (!empty($wurflObj->capabilities['mobile_browser']) && !array_key_exists("fullsite",$arr)) {
  header("Location: mobile/" . $_SERVER['REQUEST_URI']);
  exit();
}

// Load the logging library
include 'admin/system/libs/log-actions.php';
Log::set($database);

// Load the user stuff. (Facebook)
require_once "system/libs/facebook/facebook.php";
require 'application/helpers/user.php';

// Check the url
require 'application/helpers/url.php';
$url = check_url();

// Load up the auth library
include 'system/libs/auth.php';
Auth::set($user_id, $database);

if ($url['post'] == true) {
  if ($_POST['page'] == 'new-user') {
    require 'application/helpers/form_register.php';
  }

  if ($_POST['page'] == 'comment-reply') {
    require 'application/helpers/comment_reply.php';
  }

  if ($_POST['page'] == 'guest-submission') {
    require 'application/helpers/guest_submission.php';
  }

  if ($_POST['add_email_to_newsletter'] == 'yes') {
    include 'application/helpers/add_email_to_newsletter.php';
  }

  if ($_POST['alumni_signup'] == 'yes') {
    include 'application/helpers/process_alumni_signup.php';
  }

  if ($_POST['feedback_form'] == 'yes') {
    include 'application/helpers/feedback_form.php';
  }

  exit();
}

include 'application/eggs/headers.php';

// Sometimes we don't want to include any html content.`
switch($url['page']) {
    case 'post_rss':
      include 'application/helpers/post_rss.php';
      exit();
    break;
}

include 'application/helpers/header.php';
include 'templates/' . $config['template'] . '/html/header.html';

// Find what page to load
if ($url['get'] == true) {

  // Special conditional catches
  if ($show_register_form == true && $url['page'] == 'main') {
    $url['page'] = 'register';
  }

  if (empty($_GET['page'])) {
    $_GET['page'] = 'main';
  }

  if ($_GET['page'] == 'attend_event') {
    $url['page'] = 'attend_event';
  }

  // Load specific pages.
  if (empty($url['page'])) {
    $url['page'] = 'main';
  }

  switch ($url['page']) {

    case 'profile':
      include 'application/helpers/show_profile.php';
      include 'templates/' . $config['template'] . '/html/show_profile.html';
    break;

    case 'post':
      include 'application/helpers/show_post.php';
      include 'templates/' . $config['template'] . '/html/show_post.html';
    break;

    case 'author':
      include 'application/helpers/show_author.php';
      include 'templates/' . $config['template'] . '/html/main.html';
    break;

    case 'label':
      include 'application/helpers/show_label.php';
      include 'templates/' . $config['template'] . '/html/main.html';
    break;

    case 'legal':
      include 'application/helpers/show_authors_and_labels.php';
      include 'templates/' . $config['template'] . '/html/legal.html';
    break;

    case 'feedback':
      include 'application/helpers/show_authors_and_labels.php';
      include 'templates/' . $config['template'] . '/html/feedback.html';
    break;

    case 'search':
      include 'application/helpers/search.php';
      include 'templates/' . $config['template'] . '/html/search.html';
    break;

    case 'attend_event':
      require 'application/helpers/attend_event.php';
      require 'templates/' . $config['template'] . '/html/attend_event.html';
    break;

    case 'guest_submission':
      require 'application/helpers/show_authors_and_labels.php';
      require 'templates/' . $config['template'] . '/html/guest_submission_form.html';
    break;

    case 'register':
      require 'application/helpers/register.php';
      require 'templates/' . $config['template'] . '/html/register.html';
    break;

    case 'subscribe_to_newsletter':
        include 'application/helpers/show_authors_and_labels.php';
      require 'templates/' . $config['template'] . '/html/subscribe_to_newsletter.html';
    break;

    case 'alumni_signup':
      include 'application/helpers/alumni_signup.php';
      include 'application/helpers/show_authors_and_labels.php';
      include 'templates/' . $config['template'] . '/html/alumni_signup.html';
    break;

    default:
      include 'application/helpers/detect_page.php';
      $url_stubs = get_possible_url_stubs($database);

      if (in_array($url['page'], $url_stubs)) {
        // Load that specifc page from the db and display it.
        include 'application/helpers/load_db_page.php';
        include 'templates/' . $config['template'] . '/html/load_db_page.html';
      } else {
        if ($url['page'] != 'register') {
          include 'application/helpers/main.php';
          include 'templates/' . $config['template'] . '/html/main.html';
        }
      }
    break;
  }

}

include 'templates/' . $config['template'] . '/html/footer.html';
DB::close();
