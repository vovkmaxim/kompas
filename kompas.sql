-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 29, 2014 at 03:36 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kompas`
--

-- --------------------------------------------------------

--
-- Table structure for table `km_banners`
--

CREATE TABLE IF NOT EXISTS `km_banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `position` int(10) unsigned DEFAULT NULL,
  `link` text,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `km_banners`
--

INSERT INTO `km_banners` (`id`, `name`, `position`, `link`, `path`) VALUES
(7, 'Test №1', 0, 'Test №1', '1340400052_screenshot_16.png'),
(13, 'Test №2', 0, '0', 'ipb.html.jpeg'),
(14, 'Test №3', 0, 'ml;kmklmklm', '1359707432_skachat-albom-red-release-the-panic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `km_comments`
--

CREATE TABLE IF NOT EXISTS `km_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `events_id` int(10) unsigned DEFAULT '0',
  `competition_id` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`),
  KEY `fk_km_comments_km_events1` (`events_id`),
  KEY `fk_km_comments_km_competition1` (`competition_id`),
  KEY `fk_km_comments_km_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `km_comments`
--

INSERT INTO `km_comments` (`id`, `events_id`, `competition_id`, `user_id`, `create_date`, `title`, `text`) VALUES
(2, 0, 9, 3, '2014-08-04 21:00:00', 'Дорога', 'Чёт непонятно с догогой!!!'),
(3, 0, 9, 3, '2014-08-04 21:00:00', 'Дорога', 'qweqw dweqfd erfer '),
(4, 0, 9, 3, '2014-08-04 21:00:00', '111111111', '22222222222'),
(5, 1, 0, 3, '2014-08-04 21:00:00', 'йцу', 'йцу'),
(6, 1, 0, 3, '2014-08-04 21:00:00', 'Дорога', 'Некий новый текст))'),
(7, 4, 0, 3, '2014-08-04 21:00:00', 'аук цйаук аску', 'с уксцу суас у'),
(8, 0, 10, 3, '2014-08-04 21:00:00', 'цукпам цукп цкм', 'м цуама цмек кем е4км'),
(9, 0, 9, 3, '2014-08-04 21:00:00', 'hiu', 'iuohui');

-- --------------------------------------------------------

--
-- Table structure for table `km_competition`
--

CREATE TABLE IF NOT EXISTS `km_competition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  `logo_desc` varchar(255) DEFAULT NULL,
  `text` text,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `start_data` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_data` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `close_registration_data` date DEFAULT NULL,
  `close_registration_time` time DEFAULT NULL,
  `enable_registration_flag` tinyint(1) unsigned DEFAULT '0' COMMENT '	',
  `position` int(10) unsigned DEFAULT NULL,
  `archive` tinyint(1) unsigned DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `km_competition`
--

INSERT INTO `km_competition` (`id`, `title`, `description`, `type`, `logo_desc`, `text`, `create_date`, `update_date`, `start_data`, `start_time`, `end_data`, `end_time`, `close_registration_data`, `close_registration_time`, `enable_registration_flag`, `position`, `archive`, `views`) VALUES
(9, 'Сревнование крос на 1500 - 3000 м ', 'Сревнование крос на 1500 - 3000 м ', 2, '1340400052_screenshot_16.png', 'Сревнование крос на 1500 - 3000 м \r\nСтарт где-то в лесу с полосой препядствий и всё такое!\r\nВыживут не все!', '2014-08-01 10:43:46', '2014-08-29 10:44:16', '2014-08-08', '16:00:00', '2014-08-14', '20:00:00', '2014-08-07', '17:00:00', 1, 0, 2, 22),
(10, 'Тренировка перед забегом', 'Тренировка перед забегом на большие дистанции в 1500 и 3000 метров', 1, 'images.jpeg', 'Тренировка перед забегом на большие дистанции в 1500 и 3000 метров\r\nбудете просматривать трассу беге пытатся ёё преодолеть но всёравно выживут даже на ренировке не все!!!!', '2014-08-01 11:08:09', '2014-08-29 10:55:30', '2014-08-04', '17:00:00', '2014-08-05', '13:00:00', '2014-08-03', '17:00:00', 1, 0, 2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `km_competition_group_refs`
--

CREATE TABLE IF NOT EXISTS `km_competition_group_refs` (
  `km_competition_id` int(10) unsigned NOT NULL,
  `km_group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`km_competition_id`,`km_group_id`),
  KEY `fk_km_competition_has_km_group_km_group1` (`km_group_id`),
  KEY `fk_km_competition_has_km_group_km_competition1` (`km_competition_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `km_competition_group_refs`
--

INSERT INTO `km_competition_group_refs` (`km_competition_id`, `km_group_id`) VALUES
(9, 1),
(10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `km_competition_request`
--

CREATE TABLE IF NOT EXISTS `km_competition_request` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `competition_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `chip` varchar(255) DEFAULT NULL,
  `dyusch` varchar(255) DEFAULT NULL,
  `sity` varchar(255) DEFAULT NULL,
  `coutry` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL,
  `coach` varchar(255) DEFAULT NULL,
  `fst` varchar(255) DEFAULT NULL,
  `participation_data` varchar(255) DEFAULT NULL,
  `status` int(10) unsigned DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_km_competition_request_km_competition1` (`competition_id`),
  KEY `fk_km_competition_request_km_group1` (`group_id`),
  KEY `fk_km_competition_request_km_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `km_competition_request`
--

INSERT INTO `km_competition_request` (`id`, `competition_id`, `group_id`, `name`, `lastname`, `year`, `chip`, `dyusch`, `sity`, `coutry`, `team`, `coach`, `fst`, `participation_data`, `status`, `user_id`) VALUES
(2, 9, 1, 'Test№1', 'Test№1', 2014, 'Test№1', 'Test№1', 'Test№1', 'Test№1', 'Test№1', 'Test№1', 'Test№1', '2014-08-8, 2014-08-9, 2014-08-10, ', 1, 3),
(4, 9, 1, 'Test№2', 'Test№2', 1990, 'Test№2', 'Test№2', 'Test№2', 'Test№2', 'Test№2', 'Test№2', 'Test№2', '2014-08-8, 2014-08-9, 2014-08-10, 2014-08-11, 2014-08-12, ', 1, 3),
(5, 9, 1, 'Test№2', 'Test№2', 1990, 'Test№2', 'Test№2', 'Test№2', 'Test№2', 'Test№2', 'Test№2', 'Test№2', '2014-08-8, 2014-08-9, 2014-08-10, 2014-08-11, 2014-08-12, ', 1, 3),
(6, 9, 1, 'Test№3', 'Test№3', 1990, 'Test№3', 'Test№3', 'Test№3', 'Test№3', 'Test№3', 'Test№3', 'Test№3', '2014-08-8, 2014-08-10, 2014-08-12, ', 1, 3),
(7, 10, 1, 'Max1', 'Vovk1', 1990, '312', 'ДЮСШ', 'Kharkov', 'Ukraine', 'maxCO', 'Max', '123', '2014-08-4, ', 1, 3),
(8, 9, 1, 'Максим', 'Вовк', 1990, '1111', '№331', 'Kharkov', 'Ukraine', 'maxCO', 'Max', '1233254', '2014-08-8, 2014-08-9, 2014-08-10, 2014-08-11, 2014-08-12, ', 1, 3),
(9, 9, 1, 'Max12', 'Vovk12', 0000, '312', 'ДЮСШ', 'Kharkov', 'Ukraine', 'Test`', 'Test№2', '123', '2014-08-9, 2014-08-10, 2014-08-11, ', 1, 3),
(10, 10, 1, 'Max1', 'uihio', 0000, 'uioh', 'oihoi', 'hoihoih', 'iohio', 'hioh', 'ioh', 'oihoi', '2014-08-4, ', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `km_events`
--

CREATE TABLE IF NOT EXISTS `km_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `position` int(10) unsigned DEFAULT '0',
  `text` text,
  `logo_title` varchar(255) DEFAULT NULL,
  `logo_path` varchar(555) DEFAULT NULL,
  `status` smallint(1) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `km_events`
--

INSERT INTO `km_events` (`id`, `type`, `title`, `description`, `author`, `create_date`, `update_date`, `position`, `text`, `logo_title`, `logo_path`, `status`, `views`) VALUES
(1, 1, 'Title', 'Description 122222231r 3rfkr4 vjtr vbfvyuf vefv rtvyb ruvb Description 122222231r 3rfkr4 vjtr vbfvyuf vefv rtvyb ruvb Description 122222231r 3rfkr4 vjtr vbfvyuf vefv rtvyb ruvb Description 122222231r 3rfkr4 vjtr vbfvyuf vefv rtvyb ruvb ', 'Author', '0000-00-00 00:00:00', '2014-08-29 08:25:05', 0, '	\r\nText', 'Logo Title', '52905081.jpg', 1, 9),
(2, 2, '111', '111', '11', '2014-07-25 08:38:54', '2014-08-01 07:54:56', 0, '111', '1111', 'ipb.html.jpeg', 2, 1),
(3, 1, '11111111', '2222222222', '333333333333', '2014-07-25 08:43:46', '2014-08-01 07:54:29', 0, '444444444444444', '555555555555555555', '1359707432_skachat-albom-red-release-the-panic.jpg', 1, 1),
(4, 2, 'qqqqqqqqqq', 'qqqqqqqqqqqq', 'qqqqqqqqqqqqq', '2014-07-25 08:56:44', '2014-08-01 07:56:01', 0, 'qqqqqqqqqqqqqqq', 'q', '1363416202_skachat-besplatno-igru-strelyalku-na-kompyuter-tom-clancys-ghost-recon-future-soldier-deluxe-edition-s-ustanovlennymi-dlc-i-poslednimi.jpg', 1, 1),
(5, 1, 'TEST_IMAGE', 'TEST_IMAGE', 'TEST_IMAGE', '2014-07-25 09:59:06', '2014-08-01 07:54:42', 0, 'TEST_IMAGE', 'TEST_IMAGE', '1340400052_screenshot_16.png', 1, 1),
(6, 1, 'Title№1', 'Description№1', 'Author№1', '2014-07-30 13:24:04', '2014-08-01 07:55:51', 0, 'Text№1', 'Logo Title№1', '1330482615_cs-1_6_-_portable.png', 2, 0),
(7, 1, 'Title№1', 'Description№1', 'Author№1', '2014-07-30 13:33:18', '2014-08-01 07:55:29', 0, 'Text', 'Logo Title№1', '1377324322_skachat-besplatno-igru-strelyalku-na-pleysteyshen-3-snayper-2-sniper-ghost-warrior-2-ps-3-russkaya-versiya-repa.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `km_file`
--

CREATE TABLE IF NOT EXISTS `km_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` text,
  `type` int(11) DEFAULT NULL,
  `events_id` int(10) unsigned DEFAULT NULL,
  `competition_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_id` (`events_id`),
  KEY `fcompetition_id` (`competition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `km_file`
--

INSERT INTO `km_file` (`id`, `name`, `path`, `type`, `events_id`, `competition_id`) VALUES
(1, 'TEST №1', '10104297.pdf', 1, 6, 9),
(2, 'QWE', 'SQL_-_konspekt.pdf', 1, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `km_group`
--

CREATE TABLE IF NOT EXISTS `km_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_km_group_km_group1` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `km_group`
--

INSERT INTO `km_group` (`id`, `name`, `description`, `parent_id`) VALUES
(1, 'test', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `km_group_photo`
--

CREATE TABLE IF NOT EXISTS `km_group_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_km_group_photo_km_group_photo1` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `km_group_photo`
--

INSERT INTO `km_group_photo` (`id`, `title`, `description`, `parent_id`) VALUES
(1, 'All', 'All', 1),
(7, 'New', 'New', 7),
(8, 'Test', 'Description Test photo goup', 8);

-- --------------------------------------------------------

--
-- Table structure for table `km_link`
--

CREATE TABLE IF NOT EXISTS `km_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `km_link`
--

INSERT INTO `km_link` (`id`, `name`, `description`, `path`) VALUES
(1, 'Google', 'Google', 'http://www.google.com'),
(2, 'VKontake', 'Соцыальная сеть', 'http://vk.com/');

-- --------------------------------------------------------

--
-- Table structure for table `km_photo`
--

CREATE TABLE IF NOT EXISTS `km_photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `path` text,
  `group_photo_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `group_photo_id` (`group_photo_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `km_photo`
--

INSERT INTO `km_photo` (`id`, `title`, `description`, `path`, `group_photo_id`, `user_id`) VALUES
(1, 'Test №1', 'Test №1', '1363416202_skachat-besplatno-igru-strelyalku-na-kompyuter-tom-clancys-ghost-recon-future-soldier-deluxe-edition-s-ustanovlennymi-dlc-i-poslednimi.jpg', 1, 3),
(2, 'Test №2', 'Test №2', 'images.jpeg', 8, 3),
(4, 'Test №3', 'Test №3', '1359707432_skachat-albom-red-release-the-panic.jpg', 8, 3),
(5, 'Test №4', 'Test №4', 'directx_w8s.jpg', 7, 3),
(6, 'Test №5', 'Test №5', '1340400052_screenshot_16.png', 8, 3),
(7, 'Test №3', 'Test №3', '52905081.jpg', 1, 3),
(8, 'Test №3', 'Test №3', '52905081(1).jpg', 1, 3),
(9, 'Test №5', 'Test №4', '1277741913_dark-games.ru_cs_skachat.jpg', 1, 3),
(10, 'Test №2', 'Test №1', '1330482615_cs-1_6_-_portable.png', 1, 3),
(11, 'Test №5', 'Test №4', '1340400052_screenshot_16.png', 1, 3),
(12, 'Test №1', 'Test №1', '1359707432_skachat-albom-red-release-the-panic.jpg', 1, 3),
(13, 'Title', 'Description', '6.jpg', 1, 3),
(14, 'Title', 'Description', '19rtz.png', 1, 3),
(15, 'Title', 'Description', '1156.jpg', 1, 3),
(16, 'Title', 'Description', '64895-3008x2000.jpg', 1, 3),
(17, 'Title', 'Description', '397757_devushka_shtanga_sport_1920x1080.jpg', 1, 3),
(18, 'Title', 'Description', 'About-sports-betting-systems2.png', 1, 3),
(19, 'Title', 'Description', 'ddddd.jpg', 1, 3),
(20, 'Title', 'Description', 'mota_ru_2082423-preview.jpg', 1, 3),
(21, 'Title', 'Description', 'rvl_msportsmix_03item01_e3.png', 1, 3),
(22, 'Title', 'Description', 'Sports_Item_Basketball.jpg', 1, 3),
(23, 'Title', 'Description', 'sports-wallpaper-android.jpg', 1, 3),
(24, 'Title', 'Description', 'ychscfuccsz9.jpg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `km_quote`
--

CREATE TABLE IF NOT EXISTS `km_quote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quote` text,
  `author_quote` varchar(255) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `km_quote`
--

INSERT INTO `km_quote` (`id`, `quote`, `author_quote`, `create_date`, `update_date`) VALUES
(11, 'ewfwef', 'wefwef', '2014-07-22 20:22:10', '2014-07-22 20:22:10'),
(12, 'wefwef', 'wefwef', '2014-07-22 20:25:59', '2014-07-22 20:25:59'),
(13, 'efwe', 'wefwe', '2014-07-22 20:26:04', '2014-07-22 20:26:04'),
(14, 'fwewefwef', 'wefwefwefwefwe', '2014-07-22 20:26:10', '2014-07-22 20:26:10'),
(15, 'eferg trh h', 'r jtyj tj rtn', '2014-07-22 20:26:15', '2014-07-22 20:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `km_rank`
--

CREATE TABLE IF NOT EXISTS `km_rank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `km_rank`
--

INSERT INTO `km_rank` (`id`, `name`) VALUES
(1, 'M-11'),
(2, 'MRS-23'),
(3, 'SSTG-47001');

-- --------------------------------------------------------

--
-- Table structure for table `km_rank_has_km_competition_request`
--

CREATE TABLE IF NOT EXISTS `km_rank_has_km_competition_request` (
  `rank_id` int(10) unsigned NOT NULL,
  `competition_request_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`rank_id`,`competition_request_id`),
  KEY `fk_km_rank_has_km_competition_request_km_competition_request1` (`competition_request_id`),
  KEY `fk_km_rank_has_km_competition_request_km_rank1` (`rank_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `km_rank_has_km_competition_request`
--

INSERT INTO `km_rank_has_km_competition_request` (`rank_id`, `competition_request_id`) VALUES
(3, 2),
(2, 4),
(2, 5),
(1, 6),
(3, 6),
(2, 7),
(2, 9),
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `km_result_competition`
--

CREATE TABLE IF NOT EXISTS `km_result_competition` (
  `id` int(11) NOT NULL,
  `competitioncol_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `km_role`
--

CREATE TABLE IF NOT EXISTS `km_role` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `km_role`
--

INSERT INTO `km_role` (`id`, `role`) VALUES
(0000000001, 'administrator'),
(0000000002, 'manager'),
(0000000003, 'editor'),
(0000000004, 'guest'),
(0000000005, 'user'),
(0000000006, 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `km_role_has_km_user`
--

CREATE TABLE IF NOT EXISTS `km_role_has_km_user` (
  `role_id` int(10) unsigned zerofill NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `fk_km_role_has_km_user_km_user1` (`user_id`),
  KEY `fk_km_role_has_km_user_km_role1` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `km_role_has_km_user`
--

INSERT INTO `km_role_has_km_user` (`role_id`, `user_id`) VALUES
(0000000003, 1),
(0000000001, 3),
(0000000002, 3),
(0000000003, 3),
(0000000003, 14),
(0000000004, 14),
(0000000006, 15);

-- --------------------------------------------------------

--
-- Table structure for table `km_sliders`
--

CREATE TABLE IF NOT EXISTS `km_sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `hedline` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `km_sliders`
--

INSERT INTO `km_sliders` (`id`, `link`, `alt`, `path`, `hedline`) VALUES
(2, 'google.com', 'GOOOGLE', '6.jpg', 'google.com'),
(3, 'wqerwqer', 'oioiuoiu', '19rtz.png', '123444412r rgfr teh'),
(4, 'google.com', 'GOOOGLE', '1156.jpg', '123444412r rgfr teh'),
(6, 'google.com', 'GOOOGLE', '397757_devushka_shtanga_sport_1920x1080.jpg', '123444412r rgfr teh'),
(7, 'google.com', 'GOOOGLE', 'About-sports-betting-systems2.png', 'google.com'),
(8, 'google.com', 'GOOOGLE', 'ddddd.jpg', '123444412r rgfr teh'),
(9, 'google.com', 'GOOOGLE', 'mota_ru_2082423-preview.jpg', 'google.com'),
(10, 'google.com', 'GOOOGLE', 'sports-wallpaper-android.jpg', 'google.com');

-- --------------------------------------------------------

--
-- Table structure for table `km_user`
--

CREATE TABLE IF NOT EXISTS `km_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `data_birth` date DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `sity` varchar(255) DEFAULT NULL,
  `coutry` varchar(255) DEFAULT NULL,
  `club` varchar(255) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT '0',
  `member` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `km_user`
--

INSERT INTO `km_user` (`id`, `email`, `username`, `password`, `name`, `lastname`, `data_birth`, `phone`, `sity`, `coutry`, `club`, `status`, `member`) VALUES
(1, 'max@ukr.net', 'max', '2ffe4e77325d9a7152f7086ea7aa5114', 'Max', 'Vovk', '1996-08-02', '+38-099-428-47-10', 'Kharkiv', 'Ukrain', 'Kompas', 1, 1),
(3, 'max', 'maxim', '95ac3c545fa3f9c81939f8fa4d0511ca', 'maxim', 'Vovk', '1990-08-24', '8936895689', 'Kharkiv', 'Ukrain', 'max', 1, 1),
(8, 'maximas90@ukr.net', 'max1', '200c29f5fa970ad93df1553c0072ef9c', 'Max', 'Vovk', '2014-07-22', '+38-099-428-47-10', 'Харьков', 'Украина', 'Компас', 1, 1),
(9, 'maximas90@ukr.net', 'max2', '1c6268cd0d39f7aba33b053f84d3c310', 'Max', 'Vovk', '2012-08-16', '+38-099-428-47-10', 'Харьков', 'Украина', 'Компас', 0, 0),
(14, 'new', 'new', '22af645d1859cb5ca6da0c484f1f37ea', 'new', 'new', '2014-09-19', 'new', 'new', 'new', 'new', 0, 0),
(15, 'new1', 'new1', '565d008474834831d44e3e000e6f9690', 'new1', 'new1', '2014-08-27', 'new1', 'new1', 'new1', 'new1', 1, 0),
(16, 'mvovk90@mail.ru', 'maximas', 'da1234909a94fca44f7c25cc0fc93a41', 'maximas', 'maximas', '1996-08-31', '+38-099-428-47-10', 'Харьков', 'Украина', '', 1, 0),
(17, 'mvovk90@mail.ru', 'maxim2', '9c928476c64e29c89c2ba77b3911cf8a', 'maxim2', 'maxim2', '0000-00-00', '+38-099-428-47-10', 'Харьков', 'Украина', 'new', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `km_comments`
--
ALTER TABLE `km_comments`
  ADD CONSTRAINT `fk_km_comments_km_user1` FOREIGN KEY (`user_id`) REFERENCES `km_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `km_competition_group_refs`
--
ALTER TABLE `km_competition_group_refs`
  ADD CONSTRAINT `fk_km_competition_has_km_group_km_competition1` FOREIGN KEY (`km_competition_id`) REFERENCES `km_competition` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_km_competition_has_km_group_km_group1` FOREIGN KEY (`km_group_id`) REFERENCES `km_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `km_competition_request`
--
ALTER TABLE `km_competition_request`
  ADD CONSTRAINT `fk_km_competition_request_km_competition1` FOREIGN KEY (`competition_id`) REFERENCES `km_competition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_km_competition_request_km_group1` FOREIGN KEY (`group_id`) REFERENCES `km_group` (`id`),
  ADD CONSTRAINT `fk_km_competition_request_km_user1` FOREIGN KEY (`user_id`) REFERENCES `km_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `km_file`
--
ALTER TABLE `km_file`
  ADD CONSTRAINT `events_id` FOREIGN KEY (`events_id`) REFERENCES `km_events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fcompetition_id` FOREIGN KEY (`competition_id`) REFERENCES `km_competition` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `km_group`
--
ALTER TABLE `km_group`
  ADD CONSTRAINT `km_group_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `km_group` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `km_group_photo`
--
ALTER TABLE `km_group_photo`
  ADD CONSTRAINT `km_group_photo_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `km_group_photo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `km_photo`
--
ALTER TABLE `km_photo`
  ADD CONSTRAINT `group_photo_id` FOREIGN KEY (`group_photo_id`) REFERENCES `km_group_photo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `km_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `km_rank_has_km_competition_request`
--
ALTER TABLE `km_rank_has_km_competition_request`
  ADD CONSTRAINT `fk_km_rank_has_km_competition_request_km_competition_request1` FOREIGN KEY (`competition_request_id`) REFERENCES `km_competition_request` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_km_rank_has_km_competition_request_km_rank1` FOREIGN KEY (`rank_id`) REFERENCES `km_rank` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `km_role_has_km_user`
--
ALTER TABLE `km_role_has_km_user`
  ADD CONSTRAINT `fk_km_role_has_km_user_km_role1` FOREIGN KEY (`role_id`) REFERENCES `km_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_km_role_has_km_user_km_user1` FOREIGN KEY (`user_id`) REFERENCES `km_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
