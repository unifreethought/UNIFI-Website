<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

// Load some libraries
require '../system/libs/mysql.class.php';
require '../system/libs/date.class.php';
require '../system/libs/sanitize.class.php';

// Load the config
require '../application/config/config.php';
require 'application/i18n/' . $config['i18n-admin'];
if ($config['admin']!== 'enabled') {
  exit(ADMIN_ACCESS_DISABLED);
}

// Load the logging library
include 'system/libs/log-actions.php';
Log::set($database);

// Include the errors handler
require '../system/errors/errors.php';

// Load the user stuff. (Facebook)
require '../system/libs/facebook/facebook.php';
require '../application/helpers/user.php';

// Load up the auth library
include '../system/libs/auth.php';
Auth::set($user_id, $database);

// Check the url
require '../application/helpers/url.php';
$url = check_url();

if ($url['post']) {
  // Load the helper to change a user's details.
  if (!empty($_POST['type_of_user_change']) && $_POST['type_of_user_change'] == 'edit_user') {

    // First authenticate the user against the db.
    // Then, make sure that the user can edit members.
    if (!Auth::edit_members()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_edit_user.php';
    }
  }

  if (!empty($_POST['create_user']) && $_POST['create_user'] == 'yes') {

    if (!Auth::edit_members()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_create_user.php';
    }

  }

  if (!empty($_POST['delete_user']) && $_POST['delete_user'] == 'yes') {

    if (!Auth::edit_members()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_delete_user.php';
    }

  }

  if (!empty($_POST['confirm_delete']) && $_POST['confirm_delete'] == 'yes') {

    if (!Auth::edit_members()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_confirm_delete_user.php';
    }

  }

  if (!empty($_POST['admin_post_to_blog']) && $_POST['admin_post_to_blog'] == 'post-new') {

    // Auth the user and check for the ability to post to the blog.
    if (!Auth::post_to_blog()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_blog_post.php';
    }
  }

  if (!empty($_POST['edit_blog_post']) && $_POST['edit_blog_post'] == 'yes') {

    // Auth the user and check for the ability to post to the blog.
    if (!Auth::post_to_blog()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_blog_post_edit.php';
    }

  }

  if (!empty($_POST['create_event']) && $_POST['create_event'] == 'yes') {

    // Auth the user and check for the ability to post to the blog.
    if (!Auth::edit_events()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_create_event.php';
    }

  }

  if (!empty($_POST['create_volunteer_event']) && $_POST['create_volunteer_event'] == 'yes') {

    // Auth the user and check for the ability to post to the blog.
    if (!Auth::edit_events()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_create_volunteer_event.php';
    }

  }

  if (!empty($_POST['form_edit_event']) && $_POST['form_edit_event'] == 'yes') {

    // Auth the user and check for the ability to post to the blog.
    if (!Auth::edit_events()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_edit_event.php';
    }

  }

  if (!empty($_POST['form_edit_volunteer_event']) && $_POST['form_edit_volunteer_event'] == 'yes') {

    // Auth the user and check for the ability to post to the blog.
    if (!Auth::edit_events()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_edit_volunteer_event.php';
    }

  }

  if (!empty($_POST['create_custom_page']) && $_POST['create_custom_page'] == 'yes') {

    // Auth the user and check for the ability to edit custom pages.
    if (!Auth::edit_custom_pages()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_create_custom_page.php';
    }

  }

  if (!empty($_POST['edit_custom_page']) && $_POST['edit_custom_page'] == 'yes') {

    // Auth the user and check for the ability to edit custom pages.
    if (!Auth::edit_custom_pages()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_edit_custom_page.php';
    }

  }

  if (!empty($_POST['form_edit_user_permissions']) && $_POST['form_edit_user_permissions'] == 'yes') {

    // Auth the user.
    if (!Auth::edit_user_permissions()) {
      exit(ADMIN_NOT_AUTHORIZED);
    } else {
      include 'application/helpers/form_edit_user_permissions.php';
    }

  }

  if (!empty($_POST['add_email_to_newsletter'])) {
    if (Auth::edit_users())
      include 'application/helpers/add_email_to_newsletter.php';
    else
      exit(ADMIN_NOT_AUTHORIZED);
  }

  if (!empty($_POST['delete_email_from_newsletter'])) {
    if (Auth::edit_users())
      include 'application/helpers/delete_email_from_newsletter.php';
    else
      exit(ADMIN_NOT_AUTHORIZED);
  }

  if (!empty($_POST['send_newsletter'])) {
    if (Auth::edit_users())
      include 'application/helpers/send_the_newsletter.php';
    else
      exit(ADMIN_NOT_AUTHORIZED);
  }

  if (!empty($_POST['merge_members_setup'])) {
    if (Auth::edit_users()) {
      include 'application/helpers/merge_members_setup.php';
      include 'templates/' . $config['admin_template'] . '/html/merge_members_setup.html';
    } else {
      exit(ADMIN_NOT_AUTHORIZED);
    }
  }

  if (!empty($_POST['merge_members_run'])) {
    if (Auth::edit_users())
      include 'application/helpers/merge_members_run.php';
    else
      exit(ADMIN_NOT_AUTHORIZED);
  }

  if (!empty($_POST['delete_member'])) {
    if (Auth::edit_users())
      include 'application/helpers/delete_member.php';
    else
      exit(ADMIN_NOT_AUTHORIZED);
  }

  if (!empty($_POST['edit_alumni_member'])) {
    if (Auth::edit_users()) {
      include 'application/helpers/process_edit_alumni_member.php';
    } else {
      exit(ADMIN_NOT_AUTHORIZED);
    }
  }

  if (!empty($_POST['edit_posting_emails'])) {
    if (Auth::post_to_blog()) {
      include 'application/helpers/form_edit_posting_emails.php';
    } else {
      exit(ADMIN_NOT_AUTHORIZED);
    }
  }

  if (!empty($_POST['edit_commenting_emails'])) {
    if (Auth::post_to_blog()) {
      include 'application/helpers/form_edit_commenting_emails.php';
    } else {
      exit(ADMIN_NOT_AUTHORIZED);
    }
  }

  if (!empty($_POST['form_apply_group'])) {
    if (Auth::view_log())
      include 'application/helpers/form_apply_groups.php';
    else
      exit(ADMIN_NOT_AUTHORIZED);
  }

  exit('');

} else {

  // Do a general check on viewing the DASHBOARD.
  if (!Auth::view_DASHBOARD()) {
          exit(ADMIN_NOT_AUTHORIZED);
  }

  // Sometimes we need to check for a FB ID request
  // This is due to the lack of true cross site request compatability.
  if (!empty($_GET['getFBID'])) {
    $ch = curl_init();
      curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
      curl_setopt($ch, CURLOPT_ENCODING, '');
      curl_setopt($ch, CURLOPT_REFERER, 'http://unifreethought.com/');
      curl_setopt($ch, CURLOPT_URL, "http://graph.facebook.com/" . $_GET['getFBID']);
      curl_setopt($ch, CURLOPT_USERAGENT, 'UNI Freethinkers and Inquirers Page Fetcher');
    echo curl_exec($ch);
    exit();
  }

  if (!empty($_GET['page']) && $_GET['page'] == 'invite_members') {
    include 'application/helpers/invite_all_members_to_event.php';
    exit();
  }

  if (!empty($_GET['addBlogTag'])) {
    include 'application/helpers/add_blog_tag.php';
    exit();
  }

  if (!empty($_GET['createBlogTag'])) {
    include 'application/helpers/create_blog_tag.php';
    exit();
  }

  if (!empty($_GET['addPosition'])) {
    include 'application/helpers/add_position.php';
    exit();
  }

  if (!empty($_GET['addTag'])) {
    include 'application/helpers/add_tag.php';
    exit();
  }

  if (!empty($_GET['deletePosition'])) {
    include 'application/helpers/delete_position.php';
    exit();
  }

  if (!empty($_GET['deleteTag'])) {
    include 'application/helpers/delete_tag.php';
    exit();
  }

  if ($_GET['page'] == 'add_to_member_database') {
    include 'application/helpers/add_to_member_database.php';
    exit();
  }

  if ($_GET['page'] == 'get_matching_members') {
      if (Auth::edit_users()) {
        include 'application/helpers/get_matching_members.php';
      }
    exit();
   }

  if ($_GET['page'] == 'add_member_to_event') {
    if (Auth::edit_users()) {
      include 'application/helpers/add_member_to_event.php';
    }
    exit();
  }

  if ($_GET['page'] == 'remove_member_from_event') {
    if (Auth::edit_users())
      include 'application/helpers/remove_member_from_event.php';
    exit();
  }

  if ($_GET['page'] == 'add_member_to_volunteer_event') {
    if (Auth::edit_users()) {
      include 'application/helpers/add_member_to_volunteer_event.php';
    }
    exit();
  }

  if ($_GET['page'] == 'edit_member_in_database') {
    if (Auth::edit_users())
      include 'application/helpers/edit_member_in_database.php';
    exit();
  }

  if ($_GET['page'] == 'perform_copy_user_to_member_db') {
    if (Auth::edit_users())
      include 'application/helpers/perform_copy_user_to_member_db.php';
    exit();
  }

  include 'templates/' . $config['admin_template'] . '/html/header.html';

  $user_id = MySQL::clean($user_id);

  switch ($url['page']) {

    case 'view_all_options':
      include 'templates/' . $config['admin_template'] . '/html/view_all_options.html';
    break;

    case 'post':

      if (Auth::can_post_blog()) {
        include 'application/helpers/edit_blog_post.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_blog_post.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'list_blog_posts':

      if (Auth::can_post_blog()) {
        include 'application/helpers/list_blog_posts.php';
        include 'templates/' . $config['admin_template'] . '/html/list_blog_posts.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'edit_blog_post':

      if (Auth::can_post_blog()) {
        include 'application/helpers/edit_blog_post.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_blog_post.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'edit_blog_draft':
      if (Auth::can_post_blog()) {
        include 'application/helpers/edit_blog_draft.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_blog_post.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'list_blog_drafts':
      if (Auth::can_post_blog()) {
        include 'application/helpers/list_blog_drafts.php';
        include 'templates/' . $config['admin_template'] . '/html/list_blog_drafts.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'delete_blog_post':
      if (Auth::can_post_blog()) {
        include 'application/helpers/delete_blog_post.php';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'create_user':

      if (Auth::edit_users()) {
        include 'application/helpers/create_user.php';
        include 'templates/' . $config['admin_template'] . '/html/create_user.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'delete_user':

      if (Auth::edit_users()) {
        include 'application/helpers/delete_user.php';
        include 'templates/' . $config['admin_template'] . '/html/delete_user.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'list_members':

      if (Auth::edit_users()) {
        include 'application/helpers/list_users.php';
        include 'templates/' . $config['admin_template'] . '/html/list_users.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'edit_user':

      if (Auth::edit_users()) {
        include 'application/helpers/edit_user.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_user.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'edit_tags':

      if (Auth::edit_users()) {
        include 'application/helpers/edit_tags.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_tags.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'edit_positions':

      if (Auth::edit_users()) {
        include 'application/helpers/edit_positions.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_positions.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'search_users':

      if (Auth::edit_users()) {
        include 'application/helpers/search_users.php';
        include 'templates/' . $config['admin_template'] . '/html/search_users.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'perform_search':

      if (Auth::edit_users()) {
        include 'application/helpers/perform_search.php';
        include 'templates/' . $config['admin_template'] . '/html/perform_search.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'create_event':

      if (Auth::edit_events()) {
        include 'application/helpers/create_event.php';
        include 'templates/' . $config['admin_template'] . '/html/create_event.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'create_volunteer_event':

      if (Auth::edit_events()) {
        include 'application/helpers/create_volunteer_event.php';
        include 'templates/' . $config['admin_template'] . '/html/create_volunteer_event.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'list_events':

      if (Auth::edit_events()) {
        include 'application/helpers/view_events.php';
        include 'templates/' . $config['admin_template'] . '/html/view_events.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'edit_event':

      if (Auth::edit_events()) {
        include 'application/helpers/edit_event.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_event.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'edit_volunteer_event':

      if (Auth::edit_events()) {
        include 'application/helpers/edit_volunteer_event.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_volunteer_event.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'create_custom_page':

      if (Auth::edit_custom_pages()) {
        include 'application/helpers/create_custom_page.php';
        include 'templates/' . $config['admin_template'] . '/html/create_custom_page.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'list_custom_pages':

      if (Auth::edit_custom_pages()) {
        include 'application/helpers/list_custom_pages.php';
        include 'templates/' . $config['admin_template'] . '/html/list_custom_pages.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;


    case 'edit_custom_page':

      if (Auth::edit_custom_pages()) {
        include 'application/helpers/edit_custom_page.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_custom_page.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'list_comments':

      // No need to auth this, if they can see the dashboard then they're fine for viewing comments.
      include 'application/helpers/list_comments.php';
      include 'templates/' . $config['admin_template'] . '/html/list_comments.html';

    break;

    case 'newsletter':
      if (Auth::edit_users()) {
        include 'application/helpers/newsletter.php';
        include 'templates/' . $config['admin_template'] . '/html/newsletter.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'subscribe_email_to_newsletter':
      if (Auth::edit_users())
        include 'templates/' . $config['admin_template'] . '/html/subscribe_email_to_newsletter.html';
      else
        exit(ADMIN_NOT_AUTHORIZED);
    break;

    case 'unsubscribe_email_from_newsletter':
      if (Auth::edit_users())
        include 'templates/' . $config['admin_template'] . '/html/unsubscribe_email_from_newsletter.html';
      else
        exit(ADMIN_NOT_AUTHORIZED);
    break;

    case 'view_all_newsletter_emails':
      if (Auth::edit_users()) {
        include 'application/helpers/view_all_newsletter_emails.php';
        include 'templates/' . $config['admin_template'] . '/html/view_all_newsletter_emails.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'list_guest_submissions':
      include 'application/helpers/list_guest_submissions.php';
      include 'templates/' . $config['admin_template'] . '/html/list_guest_submissions.html';
    break;

    case 'member_database':
      if (Auth::edit_users()) {
        include 'application/helpers/member_database.php';
        include 'templates/' . $config['admin_template'] . '/html/member_database.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'merge_members':
      if (Auth::edit_users()) {
        //include 'application/helpers/merge_members.php';
        include 'templates/' . $config['admin_template'] . '/html/merge_members.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'search_member_database':
      if (Auth::edit_users()) {
        include 'application/helpers/search_member_database.php';
        include 'templates/' . $config['admin_template'] . '/html/search_member_database.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

                case 'delete_member':
      if (Auth::edit_users()) {
        include 'templates/' . $config['template'] . '/html/delete_member.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;


    case 'create_report':
      if (Auth::edit_users()) {
        include 'application/helpers/create_report.php';
        include 'templates/' . $config['admin_template'] . '/html/create_report.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'report_response':
      if (Auth::edit_users()) {
        include 'application/helpers/report_response.php';
        include 'templates/' . $config['admin_template'] . '/html/report_response.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'copy_user_to_member_db':
      if (Auth::edit_users()) {
        include 'application/helpers/copy_user_to_member_db.php';
        include 'templates/' . $config['admin_template'] . '/html/copy_user_to_member_db.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'view_member':

      if (Auth::edit_users()) {
        include 'application/helpers/view_member.php';
        include 'templates/' . $config['admin_template'] . '/html/view_member.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'view_log':

      if (Auth::view_log()) {
        include 'application/helpers/view_log.php';
        include 'templates/' . $config['admin_template'] . '/html/view_log.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'apply_groups':

      if (Auth::view_log()) {
        include 'templates/' . $config['admin_template'] . '/html/apply_groups.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'view_events':

      if (Auth::edit_events()) {
        include 'application/helpers/view_events.php';
        include 'templates/' . $config['admin_template'] . '/html/view_events.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'view_all_events':

      if (Auth::edit_events()) {
        include 'application/helpers/view_all_events.php';
        include 'templates/' . $config['admin_template'] . '/html/view_all_events.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'view_volunteer_events':

      if (Auth::edit_events()) {
        include 'application/helpers/view_volunteer_events.php';
        include 'templates/' . $config['admin_template'] . '/html/view_volunteer_events.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'edit_member_rights':

      if (Auth::edit_user_permissions()) {
        // Remember, this helper loads the template page that it needs.
        include 'application/helpers/edit_member_permissions.php';
      } else {
        Log::create($user_id, 'failed_user_edit_permissions', 'N/A');
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

    case 'manage_alumni_members':
      if (Auth::edit_members()) {
        include 'application/helpers/manage_alumni_members.php';
        include 'templates/' . $config['admin_template'] . '/html/manage_alumni_members.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'edit_alumni_member':
      if (Auth::edit_members()) {
        include 'application/helpers/edit_alumni_member.php';
        include 'templates/' . $config['admin_template'] . '/html/edit_alumni_member.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'edit_posting_emails':
      if (Auth::post_to_blog()) {
        include 'application/helpers/edit_posting_emails.php';
        include 'templates/'. $config['admin_template'] . '/html/edit_posting_emails.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'edit_comment_emails':
      if (Auth::post_to_blog()) {
        include 'application/helpers/edit_commenting_emails.php';
        include 'templates/'. $config['admin_template'] . '/html/edit_commenting_emails.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    case 'backup_db':
      if (Auth::view_log()) {
        include 'application/helpers/backup_db.php';
        include 'templates/' . $config['admin_template'] . '/html/backup_db.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }
    break;

    default:

      if (Auth::view_DASHBOARD()) {
        include 'templates/' . $config['admin_template'] . '/html/dashboard.html';
      } else {
        exit(ADMIN_NOT_AUTHORIZED);
      }

    break;

  }

  include 'templates/' . $config['admin_template'] . '/html/footer.html';
}
MySQL::close();
