-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2010 at 02:00 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unifi-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog-comments`
--

CREATE TABLE IF NOT EXISTS `blog-comments` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `blog_post` int(32) NOT NULL,
  `author` int(32) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `blog-comments`
--

INSERT INTO `blog-comments` (`id`, `blog_post`, `author`, `timestamp`, `content`) VALUES
(1, 13, 1, 1290800874, 'This is a test...');

-- --------------------------------------------------------

--
-- Table structure for table `blog-posts`
--

CREATE TABLE IF NOT EXISTS `blog-posts` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `author` int(32) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `comments` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `blog-posts`
--

INSERT INTO `blog-posts` (`id`, `author`, `timestamp`, `title`, `content`, `comments`) VALUES
(1, 1, 1290724630, 'Test', 'Testing...', 0),
(2, 1, 1290724640, 'Testing..', 'This is a test...', 0),
(3, 1, 1290724650, 'Something cool', 'This is something...', 0),
(4, 1, 1290724700, 'sadsadsd', 'sdaasdas', 0),
(5, 1, 1290724710, 'sdasd', 'sadsadsa', 0),
(6, 1, 1290724720, 'sadsad', 'adsadsad', 0),
(7, 1, 1290724730, 'adsadsds', '12907247', 0),
(8, 1, 1290724740, 'asdsladas', 'daassd', 0),
(9, 1, 1290724750, 'asdsdasdsa', 'sdsadsdadsad', 0),
(10, 1, 1290724760, 'sadsadasda', 'dfdasfsadfas', 0),
(11, 1, 1290724770, 'sadsaasasdas', 'safsadsdada', 0),
(12, 1, 1290724780, 'sadsadas', 'The pope''s new statements about condom use, which appear in the book Light of the World: The Pope, the Church and the Signs of the Times, in effect denote that condom use is acceptable for HIV-positive male prostitutes to prevent the transmission of the virus. There is some interesting discussion among Catholics, who are trying to decode the pope''s pronouncement:\r\n"The pope''s comments in a book interview do not amount to an official teaching, a point conservative Catholics made repeatedly and vociferously Tuesday. They argued that the pope was only noting that by using a condom, a person with HIV is displaying some moral sense about the consequences of his behavior."\r\n\r\nI hope I never unwrap a condom that has arms and a face...\r\nOf course, you and I know that this posturing is ridiculous. These conservatives are in effect admitting that the Church''s teachings on condom use have nothing to do with what is actually moral. Why can''t we all embrace the common sense that if someone has AIDS, the good and moral thing to do is to use a condom to prevent the spread of HIV to others, and that if the Catholic Church wants to tell people what is right and wrong, it should make damn sure that its teachings actually line up with what is right and wrong in reality?\r\n\r\nThe barricade between the Church and common sense is called dogma: the pope is supposed to be infallible, so what happens when he changes his mind? Is he no longer infallible? Is he retroactively fallible, so that he was not infallible when he made statements against condom use? As for the awkward feeling you may get when hearing any bald ape claim to be infallible, that''s the subject of a future blog post. In any case, infallibility means that doctrines/dogmas can be incredibly difficult to change.\r\n\r\nAs for the pope''s statement itself, it is nothing more or less than an extremely tiny step in the right direction. There is no cause for celebration, and I for one do not plan on giving the pope any credit for being slightly less deranged than he was before, because this pronouncement does not wash his hands of the blood of thousands (if not more) of Africans who died because they were told in effect that condoms are worse than AIDS, and because he is still guilty of sheltering an army of sex criminals from the justice system. I hope he eventually does the right thing, but until then, and even after, I think we should be hesitant to commend his efforts.', 0),
(13, 1, 1290724790, 'dsaaddads', 'Welcome to the thirteenth edition of Fursdays wif Stef! Because it''s Thanksgiving, you''re probably expecting some positive, "...and this was a list of all the things we have to be thankful for" post. However, after being alerted to this story by Cory Derringer, I think it would be a shame to not to mention it.\r\n\r\nAccording to The Huffington Post, the UN General Assembly just voted to remove sexual orientation from the list of groups that member countries should pay special attention to when it comes to putting a stop to unnecessary and wrongful executions. Benin, a small country in Western Africa, was the one to propose the amendment to take sexual orientation out of the resolution, which still currently includes ethnic and religious minorities and human rights activists, among other groups that have been targeted for discriminatory killings in the past.\r\n\r\nThe vote came out as 79 countries for the amendment, and 70 against. The countries against included all of North America and the EU, most of South America, and a few other countries, such as Israel and Japan. Almost all of Africa and the Middle East voted for the amendment, as well as some others like China\r\nand Cuba. How sad that in the year 2010, the majority of countries in the world think that homosexuality should be allowed to be punishable by death?\r\n\r\nAs most of you know, this isn''t just some symbolic vote. Gays are beheaded in Saudi Arabia, hung in Iran, and executed in Uganda. It is illegal to simply be gay in many more countries. Luckily, there are courageous human rights activists such as Ugandan Kasha Jacqueline, who aren''t afraid to speak out against such horrendous acts. Think talking to people for One Iowa is hard? People like Jacqueline often risk their lives simply to speak out in support of gay rights.\r\n\r\nHearing about horrendous stories such as this just confirms the fact that we have such a long way to go when it comes to civil rights in the world. However, I''ve just realized that maybe I DO have something to be thankful for after all; I''m lucky enough to live in one of the only places in the world that not only allows homosexuality, but same-sex marriage. And I''m lucky enough to have a group of friends (UNIFI) who aren''t afraid to speak out in favor of civil rights.\r\n\r\nHAPPY THANKSGIVING!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nav-items`
--

CREATE TABLE IF NOT EXISTS `nav-items` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `href` varchar(1024) NOT NULL,
  `style` varchar(1024) NOT NULL,
  `position` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `posit\` (`position`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nav-items`
--

INSERT INTO `nav-items` (`id`, `name`, `href`, `style`, `position`) VALUES
(1, 'Home', 'index.php', '', 1),
(2, 'About', 'index.php?page=about', '', 2),
(3, 'Contact', 'index.php?page=contact', '', 3),
(4, 'Events', 'index.php?page=events', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `cookie` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `salt`, `email`, `facebook`, `cookie`) VALUES
(1, 'Adam', 'Shannon', 'e315081ffb63c1fd8519004a0b5b714e78eaaff0', '@51fgW!R%$', 'adam@ashnnon.us', '100001740549868', 'JO!JEI@H!I@HEIDBI!B@FI@!FNIN');
