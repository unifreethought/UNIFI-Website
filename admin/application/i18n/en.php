<?php
/**
 * UNIFI Website
 * Adam Shannon
 * 2010-11-21
 */

define('ADMIN_NOT_AUTHORIZED', '<div id="wrapper">Sorry, but you are not allowed to see this.</div>');
define('ADMIN_TITLE', 'UNIFI -- Admin');
define('ADMIN_ACCESS_DISABLED', 'We\'re sorry, but admin access to the site is down for a bit. It will be back up shortly');
define('ADMIN_HEADER', 'UNIFI - ADMIN');
define('MAIN_PAGE_ADMIN_TO_REGULAR_HOME', 'Back to home');
define('ADMIN_DASHBOARD_TITLE', 'Dashboard');
define('ADMIN_DASHBOARD_SUBMIT', 'Submit');
define('ADMIN_DASHBOARD_UPDATE', 'Update');

define('ADMIN_DASHBOARD_LIST_NAME', 'Items');

define('ADMIN_DASHBOARD_POST_BLOG', 'Post a Blog Post');
define('ADMIN_DASHBOARD_LIST_BLOG_POSTS', 'List Blog Posts');
	define('ADMIN_DASHBOARD_LIST_BLOG_POSTS_DESC', ' (list all of the posts)');
define('ADMIN_DASHBOARD_EDIT_BLOG_POST', 'Edit Blog Post');
	define('ADMIN_DASHBOARD_EDIT_BLOG_POST_DESC', ' (content changes, draft/live changing, deleting, etc..)');

define('ADMIN_DASHBOARD_LIST_MEMBERS', 'List Members');
define('ADMIN_DASHBOARD_EDIT_MEMBER', 'Edit Member');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_DESC', '(Feature requires a user to edit)');

define('ADMIN_DASHBOARD_SEARCH_USERS', 'Search Users');

define('ADMIN_DASHBOARD_CREATE_EVENT', 'Create Event');
	define('PAGE_CREATE_EVENT_TITLE', 'Title');
	define('PAGE_CREATE_EVENT_START_TIME', 'Start Time');
	define('PAGE_CREATE_EVENT_END_TIME', 'End Time');
	define('PAGE_CREATE_EVENT_LOCATION', 'Location');
	define('PAGE_CREATE_EVENT_DESCRIPTION', 'Description');
	define('PAGE_CREATE_EVENT_SUBMIT', 'Submit');

define('ADMIN_DASHBOARD_LIST_EVENTS', 'List Events');
define('ADMIN_DASHBOARD_EDIT_EVENT', 'Edit Event');
	define('ADMIN_DASHBOARD_EDIT_EVENT_DESC', '(Feature requires an event to edit)');
define('ADMIN_DASHBOARD_EDIT_EVENT_ATTENDANCE', 'Edit Event Attendance');
	define('ADMIN_DASHBOARD_EDIT_EVENT_ATTENDANCE_DESC', '(Feature requires an event to edit)');

define('ADMIN_DASHBOARD_EDIT_MEMBER_RIGHTS', 'Edit member admin rights');
define('ADMIN_DASHBOARD_BACKUP_DB', 'Backup the database.');
define('ADMIN_DASHBOARD_CREATE_USER', 'Create User');
define('ADMIN_DASHBOARD_DELETE_USER', 'Delete User');
	define('ADMIN_DASHBOARD_DELETE_USER_CONFORM_DESC', 'Select ONLY the accounts that you wish to delete!!');
define('ADMIN_DASHBOARD_CENTRAL_LOG', 'Central Log');
define('ADMIN_DASHBOARD_MAIL_USERS', 'Mail Users');

define('ADMIN_DASHBOARD_DELETE_CUSTOM_PAGE', 'Delete Custom Page');
define('ADMIN_DASHBOARD_CREATE_CUSTOM_PAGE', 'Create Custom Page');
	define('ADMIN_DASHBOARD_CREATE_CUSTOM_PAGE_POSITION', 'Position');
	define('ADMIN_DASHBOARD_CREATE_CUSTOM_PAGE_URL_STUB', 'URL Stub');
	define('ADMIN_DASHBOARD_CREATE_CUSTOM_PAGE_NAME', 'Name');
	//define('ADMIN_DASHBOARD_CREATE_CUSTOM_PAGE_HREF', 'Href');
	define('ADMIN_DASHBOARD_CREATE_CUSTOM_PAGE_STYLE', 'CSS Style');
	define('ADMIN_DASHBOARD_CREATE_CUSTOM_PAGE_SUBMIT', 'Create Custom Page');

define('ADMIN_DASHBOARD_LIST_CUSTOM_PAGES', 'List Custom Pages');
	define('ADMIN_DASHBOARD_LIST_CUSTOM_PAGES_ID', 'Id');
	define('ADMIN_DASHBOARD_LIST_CUSTOM_PAGES_URL_STUB', 'Url Stub');
	define('ADMIN_DASHBOARD_LIST_CUSTOM_PAGES_PAGE_TITLE', 'Page Titl');
	define('ADMIN_DASHBOARD_LIST_CUSTOM_PAGES_CONTENT', 'Content');
define('ADMIN_DASHBOARD_EDIT_CUSTOM_PAGES', 'Edit Custom Page');
	define('ADMIN_DASHBOARD_EDIT_CUSTOM_PAGE_ID', 'Id: ');
	define('ADMIN_DASHBOARD_EDIT_CUSTOM_PAGE_URL_STUB', 'Url Stub: ');
	define('ADMIN_DASHBOARD_EDIT_CUSTOM_PAGE_PAGE_TITLE', 'Page Title: ');
	define('ADMIN_DASHBOARD_EDIT_CUSTOM_PAGE_CONTENT', 'Content: ');
	define('ADMIN_DASHBOARD_EDIT_CUSTOM_PAGE_SUBMIT', 'Submit');

define('ADMIN_DASHBOARD_VIEW_LOG_TITLE', 'View the central log');
	define('ADMIN_DASHBOARD_VIEW_LOG_ID', 'id');
	define('ADMIN_DASHBOARD_VIEW_LOG_USER', 'User');
	define('ADMIN_DASHBOARD_VIEW_LOG_TIME', 'Time');
	define('ADMIN_DASHBOARD_VIEW_LOG_MESSAGE', 'Message');
	define('ADMIN_DASHBOARD_VIEW_LOG_UNIQUE', 'Unique');

// Also covers volunteer events
define('ADMIN_DASHBOARD_VIEW_EVENTS', 'View Events');
	define('ADMIN_DASHBOARD_VIEW_EVENTS_TITLE', 'Title');
	define('ADMIN_DASHBOARD_VIEW_EVENTS_START_TIME', 'Start Time');
	define('ADMIN_DASHBOARD_VIEW_EVENTS_END_TIME', 'End Time');
	define('ADMIN_DASHBOARD_VIEW_EVENTS_TOTAL_ATTENDED', 'Attended');
	define('ADMIN_DASHBOARD_VIEW_EVENTS_LOCATION', 'Location');
	define('ADMIN_DASHBOARD_VIEW_EVENTS_DESCRIPTION', 'Description');

define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS', 'Edit Member Permissions');
define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_GET_USER_FORM', 'Enter the user id: ');
define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_GET_USER', 'Enter the user to edit.');
define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_GET_USER_DESC', 'Editing permissions for: ');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_GET_USER_SUBMIT', 'Edit User');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_POST_TO_BLOG', 'Post to blog');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_ACCESS_ADMIN_DASHBOARD', 'Access Admin Dashboard');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_VIEW_MEMBERS', 'View Members');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_EDIT_MEMBERS', 'Edit Members');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_ADD_EVENTS', 'Add Events');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_LIST_EVENTS', 'List Events');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_EDIT_EVENTS', 'Edit Events');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_EDIT_EVENT_ATTENDANCE', 'Edit Event Attendance');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_EDIT_CUSTOM_PAGES', 'Edit Custom Pages');
	define('ADMIN_DASHBOARD_EDIT_MEMBER_PERMISSIONS_VIEW_LOG', 'View Log');

define('ADMIN_DASHBOARD_DELETE_USER_SUBMIT', 'Delete User(s)');
define('ADMIN_DASHBOARD_DELETE_USER_GO_HOME', 'Cancel Deletion');

// Copy a user to the member db.
define('ADMIN_DASHBOARD_COPY_USER_TO_MEMBER_DB', 'Copy Website User to Member Database');
define('ADMIN_DASHBOARD_COPY_USER_TO_MEMBER_DB_USER_ID', 'User ID #:');

// Create a member report
define('ADMIN_DASHBOARD_CREATE_MEMBER_REPORT', 'Create a report of members');
define('ADMIN_DASHBOARD_CREATE_MEMBER_REPORT_GRADES', 'Select Grade(s):');
define('ADMIN_DASHBOARD_CREATE_MEMBER_REPORT_DORMS', 'Dorm(s):');
define('ADMIN_DASHBOARD_CREATE_MEMBER_REPORT_POSITIONS', 'Position(s):');
define('ADMIN_DASHBOARD_CREATE_MEMBER_REPORT_TAGS', 'Tags(s):');
define('ADMIN_DASHBOARD_CREATE_MEMBER_REPORT_EVENTS', 'Attended Events:');

// Create a newsletter
define('ADMIN_DASHBOARD_NEWSLETTER', 'Create a Newsletter');
define('ADMIN_DASHBOARD_NEWSLETTER_SUBJECT', 'Subject');
define('ADMIN_DASHBOARD_NEWSLETTER_SEND', 'Send Newsletter');

// The response from a member report request
define('ADMIN_DASHBOARD_REPORT_FIRST', 'First');
define('ADMIN_DASHBOARD_REPORT_LAST', 'Last');

// [Un]Subscribe someone to the newsletter
define('ADMIN_DASHBOARD_SUBSCRIBE', 'Subscribe an Email to the newsletter');
define('ADMIN_DASHBOARD_UNSUBSCRIBE', 'Unsubscribe an Email to the newsletter');
define('ADMIN_DASHBOARD_VIEW_ALL_SUBSCRIBED', 'View all newsletter emails');
define('ADMIN_DASHBOARD_THEIR_EMAIL', 'Their Email');

// Merge two members
define('ADMIN_DASHBOARD_MERGE_MEMBERS', 'Enter the member_id for the two members you wish to merge.');
define('ADMIN_DASHBOARD_MERGE_MEMBERS_ONE', 'First ID: ');
define('ADMIN_DASHBOARD_MERGE_MEMBERS_TWO', 'Second ID: ');

// Common Errors
define('NO_USER_ID', 'Whoops, you need to specify a user.');
define('NO_FB_ID_HELP', 'Login with Facebook: ');

// Facebook dialogs
define('FB_LOGIN_OUT_ALERT', 'Press OK to reload the page and finish loggin in/out.');

// Footer links
define('FOOTER_LEGAL', 'Legal & Privacy');
define('FOOTER_CONTACT', 'Contact');
define('FOOTER_TOP', 'Top');

// Profile Nav Link
define('MAIN_PAGE_PROFILE_NAV_LINK', 'Profile');
define('PROFILE_HEADER_SUFFIX', '\'s Profile');
define('PROFILE_DOES_NOT_EXIST', 'We\'re sorry, but this profile doesn\'t seem to exist.');

// Legal
define('LEGAL_HEADER', 'UNIFI Website Usage and Privacy Policy');

// Events Nav Link
define('MAIN_PAGE_EVENTS_NAV_LINK', 'Events');
define('EVENTS_HEADER', 'Your Upcoming Events');
define('EVENTS_TABLE_TITLE_TITLE', 'Title');
define('EVENTS_TABLE_TITLE_START_TIME', 'Start Time');
define('EVENTS_TABLE_TITLE_END_TIME', 'End Time');
define('EVENTS_TABLE_TITLE_LOCATION', 'Location');
define('EVENTS_TABLE_TITLE_DESCRIPTION', 'Description');
define('EVENTS_TABLE_TITLE_RSVP', 'RSVP');
define('EVENTS_BUTTON_ATTEND', 'Attend');

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
define('BLOG_POST_NOT_THERE', 'We\'re sorry, but it looks like this post doesn\'t exist.');
define('BLOG_AUTHOR_PREFIX', 'By ');
define('BLOG_OLDER_POSTS', 'Older posts');
define('BLOG_COMMENT_REPLY', 'Leave a reply');
define('BLOG_COMMENT_SUBMIT', 'Submit');
define('BLOG_COMMENT_FAIL', 'Sorry, but you must be logged in to comment.');
define('BLOG_POST_COMMENTS', 'Comments');

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
define('EDIT_EVENT_INVITE_MEMBERS', 'Invite Members');

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
define('LIST_MEMBERS_Address', 'Address');
define('LIST_MEMBERS_SUBMIT', 'Search Members');

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
define('PAGE_POST_TO_BLOG_ALLOWED_TAGS', 'Allowed Tags: ');
define('PAGE_POST_TO_BLOG_ADD_TAGS', 'Update Tags');
define('PAGE_POST_TO_BLOG_CREATE_TAG', 'Create Tag');
define('PAGE_LIST_EVENTS_TITLE', 'List Events');
define('PAGE_LIST_BLOG_POSTS', 'Our Blog Posts');
define('PAGE_EDIT_EVENT_HEADER', 'Edit an Event');
define('PAGE_LIST_COMMENTS', 'View All Comments');
define('PAGE_LIST_GUEST_SUBMISSIONS', 'View Guest Submissions');
define('PAGE_MEMBER_DATABASE', 'Member Database');
