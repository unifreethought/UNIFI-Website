-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- This file is all you should need to setup the mysql db
-- for the website. It contains some pre-filled in information,
-- like dorms and grade levels.

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `unifi-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni_database`
--

CREATE TABLE IF NOT EXISTS `alumni_database` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `member_id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `unifi_start_date` varchar(20) NOT NULL,
  `unifi_end_date` varchar(20) NOT NULL,
  `positions` varchar(1000) NOT NULL,
  `major` int(32) NOT NULL,
  `grad_school` varchar(500) NOT NULL,
  `current_location` varchar(100) NOT NULL,
  `current_location_coords` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `current_job` varchar(150) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog-comments`
--

CREATE TABLE IF NOT EXISTS `blog-comments` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `blog_post` int(32) NOT NULL,
  `author` int(32) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `content` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Table structure for table `blog-posts`
--

CREATE TABLE IF NOT EXISTS `blog-posts` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `author` int(32) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


--
-- Table structure for table `dorm`
--

CREATE TABLE IF NOT EXISTS `dorm` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `desc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13;

--
-- Dumping data for table `dorm`
--

INSERT INTO `dorm` (`id`, `desc`) VALUES
(1, 'Hagemann'),
(2, 'Dancer'),
(3, 'Campbell'),
(4, 'Bender'),
(5, 'Bartlett'),
(6, 'Lawther'),
(7, 'Noehren'),
(8, 'ROTH'),
(9, 'Rider'),
(10, 'Shull'),
(11, 'Off Campus')
(12, 'Unknown');

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `start_time` int(20) NOT NULL,
  `end_time` int(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Table structure for table `event_attendance`
--

CREATE TABLE IF NOT EXISTS `event_attendance` (
  `event_id` int(32) NOT NULL,
  `user_id` int(32) NOT NULL,
  KEY `event_id` (`event_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `user_id` int(32) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `message_id` int(20) NOT NULL,
  `unique_data` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Table structure for table `log-messages`
--

CREATE TABLE IF NOT EXISTS `log-messages` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11;

--
-- Dumping data for table `log-messages`
--

INSERT INTO `log-messages` (`id`, `keyword`, `message`) VALUES
(1, 'register', 'A new user has registered.'),
(2, 'create_user', 'A user has been created'),
(3, 'delete_user', 'A user has been deleted.'),
(4, 'new_blog_post', 'A new blog post has been created.'),
(5, 'create_event', 'A new event has been created.'),
(6, 'create_custom_page', 'A new custom page has been created!'),
(7, 'view_log', 'Someone has viewed the log.'),
(8, 'edit_user', 'A user''s data has been modified.'),
(9, 'failed_user_edit_permissions', 'An unauthorized attempt to access user permission editing.'),
(10, 'create_volunteer_event', 'Created a volunteer event!');

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `desc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=166;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `desc`) VALUES
(1, 'Accounting'),
(2, 'Air Quality'),
(3, 'American Ethnic Stud'),
(4, 'American History'),
(5, 'American Studies'),
(6, 'Anthropology'),
(7, 'Applied Physics'),
(8, 'Applied Physics/Engi'),
(9, 'Art'),
(10, 'Art (K-6)'),
(11, 'Art Education'),
(12, 'Art: Art History'),
(13, 'Art: Studio'),
(14, 'Asian Studies'),
(15, 'Astronomy'),
(16, 'Athletic Training'),
(17, 'Basic Science (K-6)'),
(18, 'Biochemistry'),
(19, 'Bioinformatics'),
(20, 'Biology'),
(21, 'Biology: Biomedical'),
(22, 'Biology: Ecology and'),
(23, 'Biology: Microbiolog'),
(24, 'Biology: Plant Biosc'),
(25, 'Biotechnology'),
(26, 'Business Communicati'),
(27, 'Business Teaching'),
(28, 'Chemistry'),
(29, 'Chemistry-Marketing'),
(30, 'Chemistry: Environme'),
(31, 'Coaching'),
(32, 'Communication'),
(33, 'Communication Studie'),
(34, 'Communication: Elect'),
(35, 'Communication: Journ'),
(36, 'Communication: Publi'),
(37, 'Communication: Theat'),
(38, 'Communication: Theat'),
(39, 'Communicative Disord'),
(40, 'Comparative Literatu'),
(41, 'Computer Information'),
(42, 'Computer Science'),
(43, 'Construction Managem'),
(44, 'Criminology'),
(45, 'Dance'),
(46, 'Early Childhood Educ'),
(47, 'Earth Science'),
(48, 'Earth Science: Inter'),
(49, 'Economics'),
(50, 'Electrical and Elect'),
(51, 'Electrical Engineeri'),
(52, 'Elementary Education'),
(53, 'English'),
(54, 'Environmental Studie'),
(55, 'Ethics'),
(56, 'European Studies'),
(57, 'Family Services'),
(58, 'Family Studies'),
(59, 'Finance'),
(60, 'French'),
(61, 'French (K-6)'),
(62, 'General Business Con'),
(63, 'General Studies'),
(64, 'General Studies: Reg'),
(65, 'Geography'),
(66, 'Geography: Environme'),
(67, 'Geology'),
(68, 'Geology: Environment'),
(69, 'German'),
(70, 'German (K-6)'),
(71, 'Gerontology'),
(72, 'Graphic Communicatio'),
(73, 'Health Education'),
(74, 'Health Education (K-'),
(75, 'Health Promotion'),
(76, 'History'),
(77, 'History (K-6)'),
(78, 'Humanities'),
(79, 'Instructional Techno'),
(80, 'Interior Design'),
(81, 'International Affair'),
(82, 'Leadership Studies'),
(83, 'Leisure, Youth and H'),
(84, 'Library Media Specia'),
(85, 'Literacy Education'),
(86, 'Management'),
(87, 'Management Informati'),
(88, 'Manufacturing Techno'),
(89, 'Marketing'),
(90, 'Mathematics'),
(91, 'Mathematics (K-6)'),
(92, 'Mathematics: Statist'),
(93, 'Mathematics: Applied'),
(94, 'Media'),
(95, 'Meteorology'),
(96, 'Middle Level Educati'),
(97, 'Military Science'),
(98, 'Modern Languages Dua'),
(99, 'Movement and Exercis'),
(100, 'Movement and Exercis'),
(101, 'Movement and Exercis'),
(102, 'Music'),
(103, 'Music: Composition-T'),
(104, 'Music Education'),
(105, 'Music Education: Jaz'),
(106, 'Music: Jazz Studies'),
(107, 'Music Performance'),
(108, 'Natural History Inte'),
(109, 'Networking and Syste'),
(110, 'Philosophy and World'),
(111, 'Physical Education'),
(112, 'Physical Education ('),
(113, 'Physics'),
(114, 'Political Communicat'),
(115, 'Political Science'),
(116, 'Politics and Law'),
(117, 'Portuguese'),
(118, 'Pre-Dentistry'),
(119, 'Pre-Engineering'),
(120, 'Pre-Law'),
(121, 'Pre-Medical Technolo'),
(122, 'Pre-Medicine'),
(123, 'Pre-Mortuary Science'),
(124, 'Pre-Nursing'),
(125, 'Pre-Nursing Home Adm'),
(126, 'Pre-Optometry'),
(127, 'Pre-Pharmacy'),
(128, 'Pre-Physical Therapy'),
(129, 'Pre-Podiatry'),
(130, 'Pre-Radiological Tec'),
(131, 'Pre-Theology'),
(132, 'Pre-Veterinary'),
(133, 'Psychology'),
(134, 'Public Administratio'),
(135, 'Real Estate'),
(136, 'Religion, Study of'),
(137, 'Russian'),
(138, 'Russian (K-6)'),
(139, 'Russian & East Europ'),
(140, 'Science: All Science'),
(141, 'Science: Middle/Juni'),
(142, 'Social Science'),
(143, 'Social Studies (K-6)'),
(144, 'Social Work'),
(145, 'Sociology'),
(146, 'Spanish'),
(147, 'Spanish (K-6)'),
(148, 'Special Education: E'),
(149, 'Special Education: I'),
(150, 'Special Education: I'),
(151, 'Special Education: S'),
(152, 'Special Education: T'),
(153, 'Speech-Language-Hear'),
(154, 'Technology Education'),
(155, 'Technology Managemen'),
(156, 'TESOL (Teaching Engl'),
(157, 'TESOL/Modern Languag'),
(158, 'Textile & Apparel'),
(159, 'Theatre'),
(160, 'Women’s Studies'),
(161, 'World History'),
(162, 'Writing'),
(163, 'Writing: Professiona'),
(164, 'Youth Services Admin')
(165, 'Unknown');

-- --------------------------------------------------------

--
-- Table structure for table `nav-items`
--

CREATE TABLE IF NOT EXISTS `nav-items` (
  `position` int(8) NOT NULL,
  `url_stub` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `href` varchar(50) NOT NULL,
  `style` varchar(200) NOT NULL,
  UNIQUE KEY `position` (`position`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nav-items`
--

INSERT INTO `nav-items` (`position`, `url_stub`, `name`, `href`, `style`) VALUES
(1, 'home', 'Home', 'index.php', ''),
(2, 'about', 'About', 'index.php?page=about', ''),
(3, 'contact', 'Contact', 'index.php?page=contact', ''),
(4, 'store', 'Store', 'index.php', '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `url_stub` varchar(50) NOT NULL,
  `page_title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `url_stub`, `page_title`, `content`) VALUES
(1, 'about', 'About UNIFI', ''),
(2, 'contact', 'Contact UNIFI', ''),
(3, 'brunch', 'Brunch!', ''),
(4, 'store', 'The store', ''),
(5, 'calendar', 'Our Calendar', ''),
(6, 'darwinweek', 'Darwin Week', ''),
(7, 'events', 'Our Events', '');

--
-- Table structure for table `positions`
--

CREATE TABLE IF NOT EXISTS `positions` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `desc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `desc`) VALUES
(1, 'Member'),
(2, 'President'),
(3, 'Vice President'),
(4, 'Blog Czar'),
(5, 'Webmaster');

--
-- Table structure for table `recruit_place`
--

CREATE TABLE IF NOT EXISTS `recruit_place` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

--
-- Dumping data for table `recruit_place`
--

INSERT INTO `recruit_place` (`id`, `desc`) VALUES
(1, 'Tabling'),
(2, 'FSM Dinner'),
(3, 'Other'),
(4, 'Unknown');

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `desc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `desc`) VALUES
(1, 'Faculty'),
(2, 'Officer'),
(3, 'Freshman'),
(4, 'Active Member');

--
-- Table structure for table `user-data`
--

CREATE TABLE IF NOT EXISTS `user-data` (
  `id` int(32) NOT NULL,
  `year` int(8) NOT NULL,
  `major` int(8) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `dorm` int(8) NOT NULL,
  `recruit_date` int(20) NOT NULL,
  `recruit_place` int(8) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(120) NOT NULL,
  `texting` int(2) NOT NULL,
  `positions` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `user-permissions`
--

CREATE TABLE IF NOT EXISTS `user-permissions` (
  `user_id` int(32) NOT NULL,
  `post_to_blog` int(2) NOT NULL,
  `access_admin_dashbord` int(2) NOT NULL,
  `view_members` int(2) NOT NULL,
  `edit_members` int(2) NOT NULL,
  `add_events` int(2) NOT NULL,
  `list_events` int(2) NOT NULL,
  `edit_events` int(2) NOT NULL,
  `edit_event_attendance` int(2) NOT NULL,
  `edit_custom_pages` int(2) NOT NULL,
  `view_log` int(2) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `cookie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

--
-- Table structure for table `users-deleted`
--

CREATE TABLE IF NOT EXISTS `users-deleted` (
  `id` int(32) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `cookie` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `desc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`id`, `desc`) VALUES
(1, 'Freshman'),
(2, 'Sophmore'),
(3, 'Junior'),
(4, 'Senior'),
(5, 'Super Senior'),
(6, 'Grad Student'),
(7, 'High School'),
(8, 'Post College'),
(9, 'Unknown');
