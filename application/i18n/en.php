<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

define('LANGUAGE_ID', 'English');
define('BASE_URL', 'http://unifreethought.com');
define('SITE_TITLE', 'UNI Freethinkers and Inquirers');
define('ADMIN_TITLE', 'UNIFI -- Admin');

define('ADMIN_ACCESS_DISABLED', 'We\'re sorry, but admin access to the site is down.');
define('WEB_ACCESS_DISABLED', 'We\'re sorry, but this website is down.');

// Admin Auth Errors
define('ADMIN_NOT_AUTHORIZED', 'Sorry, but you\'re not authorized to view this page.');

define('ADMIN_HEADER', 'UNIFI Admin Dashbord');

// Facebook dialogs
define('FB_LOGIN_OUT_ALERT', 'Press OK to reload the page and finish loggin in/out.');

// Profile Nav Link
define('MAIN_PAGE_PROFILE_NAV_LINK', 'Profile');

// Registration
define('REGISTER_HEADER', 'Please Register');
define('REGISTER_SUBMIT', 'Register');
define('REGISTER_MESSAGE', 'It seems like you\'re not registred here.  All it takes is to fill out this form, and then you will just sign in with Facebook from now on.');
define('REGISTER_FB_ID', 'Facebook ID: ');
define('REGISTER_FIRST_NAME', 'First Name: ');
define('REGISTER_LAST_NAME', 'Last Name: ');
define('REGISTER_GENDER', 'Gender: ');
define('REGISTER_FEMALE', 'Female');
define('REGISTER_MALE', 'Male');
define('REGISTER_TRANSGENDER', 'Transgender');

// Blog
define('BLOG_AUTHOR_PREFIX', 'By ');
define('BLOG_OLDER_POSTS', 'Older posts');
define('BLOG_COMMENT_REPLY', 'Leave a reply');
define('BLOG_COMMENT_SUBMIT', 'Submit');
define('BLOG_COMMENT_FAIL', 'Sorry, but you must be logged in to comment.');

// Listing blog posts
define('LIST_BLOG_ID', 'ID #1');
define('LIST_BLOG_AUTHOR', 'Author');
define('LIST_BLOG_TIMESTAMP', 'Date');
define('LIST_BLOG_TITLE', 'Title');
define('LIST_BLOG_CONTENT', 'Content');

// Edit blog posts
define('EDIT_BLOG_POST_HEADER', 'Edit a blog post.');
define('EDIT_BLOG_POST_TITLE', 'Title: ');
define('EDIT_BLOG_POST_SUBMIT', 'Edit Post');

// List Events
define('LIST_EVENT_ID', 'ID #');
define('LIST_EVENT_TITLE', 'Title');
define('LIST_EVENT_START_TIME', 'Start Time');
define('LIST_EVENT_END_TIME', 'End Time');
define('LIST_EVENT_LOCATION', 'Location');
define('LIST_EVENT_DESCRIPTION', 'Description');

// Editing events
define('EDIT_EVENT_TITLE', 'Title: ');
define('EDIT_EVENT_LOCATION', 'Location: ');
define('EDIT_EVENT_START', 'Start: ');
define('EDIT_EVENT_END', 'End: ');
define('EDIT_EVENT_ATTENDING', 'Members Attending');
define('EDIT_EVENT_SUBMIT', 'Edit Event');

// Listing of Members
define('LIST_MEMBERS_HEADER', 'User Listing');
define('LIST_MEMBERS_id', 'id');
define('LIST_MEMBERS_First', 'First');
define('LIST_MEMBERS_Last', 'Last');
define('LIST_MEMBERS_Year', 'Year');
define('LIST_MEMBERS_Major', 'Major');
define('LIST_MEMBERS_Dorm', 'Dorm');
define('LIST_MEMBERS_Phone', 'Phone');
define('LIST_MEMBERS_Email', 'Email');
define('LIST_MEMBERS_Texting', 'Texting');
define('LIST_MEMBERS_Positions', 'Position(s)');
define('LIST_MEMBERS_Tags', 'Tag(s)');
define('LIST_MEMBERS_Notes', 'Notes');
define('LIST_MEMBERS_Recruit_Place', 'Recruit Place');
define('LIST_MEMBERS_Hometown', 'Hometown');

// Creating Members
define('CREATE_MEMBER_FACEBOOK', 'Facebook');
define('CREATE_MEMBER_FACEBOOK_ID', 'Get Facebook ID');
define('CREATE_MEMBER_FACEBOOK_ID_BUTTON', 'Loading...');

// Searching members
define('FORM_NO_VALUE', 'None');
define('MEMBER_SEARCH', 'Member Search');
define('MEMBER_SEARCH_DESC', '<strong>Searching members</strong>: Enter the value(s) that you want to use to limit the search.');

// Page Titles
define('PAGE_CREATE_USER_HEADER', 'Create User');
define('PAGE_CREATE_USER_DESC', '(Desc)');
define('PAGE_EDIT_USER_HEADER', 'Edit User');
define('PAGE_EDIT_USER_DESC', 'Below are the values for a user, feel free to edit them as needed and the site will handle the data. Thanks :)');
define('PAGE_CREATE_EVENT_HEADER', 'Create Event');
define('PAGE_POST_TO_BLOG', 'Create a blog post');
define('PAGE_POST_TO_BLOG_TITLE_FIELD', 'Title: ');
define('PAGE_LIST_EVENTS_TITLE', 'List Events');
define('PAGE_LIST_BLOG_POSTS', 'Our Blog Posts');
define('PAGE_EDIT_EVENT_HEADER', 'Edit an Event');

// Dashbord Titles
define('ADMIN_DASHBORD_TITLE', 'Admin Dashbord');
define('ADMIN_DASHBORD_LIST_NAME', 'Items');

define('ADMIN_DASHBORD_POST_BLOG', 'Post a Blog Post');
define('ADMIN_DASHBORD_LIST_BLOG_POSTS', 'List Blog Posts');
	define('ADMIN_DASHBORD_LIST_BLOG_POSTS_DESC', ' (list all of the posts)');
define('ADMIN_DASHBORD_EDIT_BLOG_POST', 'Edit Blog Post');
	define('ADMIN_DASHBORD_EDIT_BLOG_POST_DESC', ' (content changes, draft/live changing, deleting, etc..)');
	
define('ADMIN_DASHBORD_LIST_MEMBERS', 'List Members');
define('ADMIN_DASHBORD_EDIT_MEMBER', 'Edit Member');
	define('ADMIN_DASHBORD_EDIT_MEMBER_DESC', '(Feature requires a user to edit)');

define('ADMIN_DASHBORD_SEARCH_USERS', 'Search Users');

define('ADMIN_DASHBORD_CREATE_EVENT', 'Create Event');
define('ADMIN_DASHBORD_LIST_EVENTS', 'List Events');
define('ADMIN_DASHBORD_EDIT_EVENT', 'Edit Event');
	define('ADMIN_DASHBORD_EDIT_EVENT_DESC', '(Feature requires an event to edit)');
define('ADMIN_DASHBORD_EDIT_EVENT_ATTENDANCE', 'Edit Event Attendance');
	define('ADMIN_DASHBORD_EDIT_EVENT_ATTENDANCE_DESC', '(Feature requires an event to edit)');

define('ADMIN_DASHBORD_EDIT_MEMBER_RIGHTS', 'Edit member admin rights');
define('ADMIN_DASHBORD_BACKUP_DB', 'Backup the database.');
define('ADMIN_DASHBORD_CREATE_USER', 'Create User');
define('ADMIN_DASHBORD_DELETE_USER', 'Delete User');
	define('ADMIN_DASHBORD_DELETE_USER_SUBMIT', 'Delete User');
	define('ADMIN_DASHBORD_DELETE_USER_CONFORM_DESC', 'Select ONLY the accounts that you wish to delete!!');
	define('ADMIN_DASHBORD_DELETE_USER_GO_HOME', 'Go Home (do not delete anyone)');
define('ADMIN_DASHBORD_CENTRAL_LOG', 'Central Log');
define('ADMIN_DASHBORD_MAIL_USERS', 'Mail Users');

define('ADMIN_DASHBORD_LIST_CUSTOM_PAGES', 'List Custom Pages');
	define('ADMIN_DASHBORD_LIST_CUSTOM_PAGES_ID', 'Id');
	define('ADMIN_DASHBORD_LIST_CUSTOM_PAGES_URL_STUB', 'Url Stub');
	define('ADMIN_DASHBORD_LIST_CUSTOM_PAGES_PAGE_TITLE', 'Page Titl');
	define('ADMIN_DASHBORD_LIST_CUSTOM_PAGES_CONTENT', 'Content');
define('ADMIN_DASHBORD_EDIT_CUSTOM_PAGES', 'Edit Custom Page');
	define('ADMIN_DASHBORD_EDIT_CUSTOM_PAGE_ID', 'Id: ');
	define('ADMIN_DASHBORD_EDIT_CUSTOM_PAGE_URL_STUB', 'Url Stub: ');
	define('ADMIN_DASHBORD_EDIT_CUSTOM_PAGE_PAGE_TITLE', 'Page Title: ');
	define('ADMIN_DASHBORD_EDIT_CUSTOM_PAGE_CONTENT', 'Content: ');
	define('ADMIN_DASHBORD_EDIT_CUSTOM_PAGE_SUBMIT', 'Submit');
