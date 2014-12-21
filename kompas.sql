-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 03, 2014 at 11:33 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `km_banners`
--

INSERT INTO `km_banners` (`id`, `name`, `position`, `link`, `path`) VALUES
(57, 'asd', 0, 'http://www.kinopoisk.ru/', '1214374533_animal_sport003.jpg'),
(58, '55555555555555555555', 0, 'http://brb.to/video/cartoons/', '014959 (Мотоцикл, мотоциклист, мотоэкстрим, спорт).jpg'),
(61, 'mlkmklm', NULL, 'klklnkl', '343.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `km_comments`
--

CREATE TABLE IF NOT EXISTS `km_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `events_id` int(10) unsigned DEFAULT NULL,
  `competition_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`),
  KEY `fk_km_comments_km_events1` (`events_id`),
  KEY `fk_km_comments_km_competition1` (`competition_id`),
  KEY `fk_km_comments_km_user1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `km_comments`
--

INSERT INTO `km_comments` (`id`, `events_id`, `competition_id`, `user_id`, `create_date`, `title`, `text`) VALUES
(8, 0, 1, 3, '2014-08-05 21:00:00', 'Тест отзыва', '\r\nТекст:'),
(9, 0, 1, 3, '2014-09-01 21:00:00', 'Тест отзыва', 'wer qwefre gfrew qvwerqv  wev'),
(10, 12, 0, 3, '2014-09-02 21:00:00', 'iohjknjkn', 'jknjknnjk'),
(11, 12, 0, 3, '2014-09-02 21:00:00', 'jihuibiubhbhhb', 'jhbjhbjhbjhbjh'),
(12, 12, 0, 3, '2014-09-02 21:00:00', 'sdg sdfg sddb sdfb', ' rbrwt brt brtb tw brt brt'),
(13, 0, 5, 3, '2014-09-02 21:00:00', 'mlk', 'l  km k m '),
(14, 0, 5, 3, '2014-09-02 21:00:00', 'kjhjibhjb jhbjirg iutgui tqn qq', ' iuthgui erbh fg bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu'),
(15, 0, 5, 3, '2014-09-02 21:00:00', 'bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu ', 'bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu '),
(16, 0, 1, 3, '2014-09-02 21:00:00', 'bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu ', 'bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu bgrbrtbh ruitb ekwrtbnuiernrgwerij giwnf kh b niw ribjwtr jbgjfubn wdjoibj wrtnubwutjrb pv nnvjkeejv wkrov[b shgu ');

-- --------------------------------------------------------

--
-- Table structure for table `km_competition`
--

CREATE TABLE IF NOT EXISTS `km_competition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(10) unsigned DEFAULT NULL,
  `logo_path` varchar(255) DEFAULT NULL,
  `text` text,
  `create_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `start_data` timestamp NULL DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_data` timestamp NULL DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `close_registration_data` timestamp NULL DEFAULT NULL,
  `close_registration_time` time DEFAULT NULL,
  `enable_registration_flag` tinyint(1) unsigned DEFAULT '0' COMMENT '	',
  `position` int(10) unsigned DEFAULT NULL,
  `archive` tinyint(1) unsigned DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `km_competition`
--

INSERT INTO `km_competition` (`id`, `title`, `description`, `type`, `logo_path`, `text`, `create_date`, `update_date`, `start_data`, `start_time`, `end_data`, `end_time`, `close_registration_data`, `close_registration_time`, `enable_registration_flag`, `position`, `archive`, `views`) VALUES
(1, 'Забег на 1500 - 3000 м', 'Тринировка перед неким соривнованием бегом на большие дистанции', 2, '1363141919_sport_kstrim_2084132.jpg', 'здесь типа должен быть полный текст со всеми мелочныни описаниями', '2014-07-26 15:39:00', '2014-09-03 19:49:05', '2014-06-30 21:00:00', '07:00:00', '2014-06-30 21:00:00', '10:00:00', '2014-06-30 21:00:00', '19:00:00', 1, 0, 2, 76),
(2, 'Проверка сохранения выбора групп', 'Проверка сохранения выбора групп', 1, '343.jpg', 'Проверка сохранения выбора групп', '2014-07-27 12:33:10', '2014-08-26 16:47:57', '2013-12-31 22:00:00', '16:00:00', '2014-11-30 22:00:00', '01:00:00', '2013-12-31 22:00:00', '24:00:00', 2, 0, 2, 4),
(3, 'Проверка сохранения выбора групп ТЕСТ№2', 'Проверка сохранения выбора групп ТЕСТ№2', 1, '1235243444_nature-20.jpg', 'Проверка сохранения выбора групп ТЕСТ№2', '2014-07-27 13:03:48', '2014-09-02 16:43:49', '2013-12-31 22:00:00', '17:00:00', '2014-01-31 22:00:00', '02:00:00', '2014-01-31 22:00:00', '19:00:00', 2, 0, 2, 1),
(4, 'Проверка сохранения выбора групп ТЕСТ№3', 'Проверка сохранения выбора групп ТЕСТ№3', 1, 'amazing_photos_of_nature_42.jpg', 'Проверка сохранения выбора групп ТЕСТ№3', '2014-07-27 13:14:53', '2014-08-25 18:40:38', '2014-01-31 22:00:00', '03:00:00', '2014-02-28 22:00:00', '20:00:00', '2014-01-31 22:00:00', '02:00:00', 2, 0, 1, 0),
(5, 'Проверка сохранения выбора групп ТЕСТ№4', 'Проверка сохранения выбора групп ТЕСТ№4', 2, 'favre_photo8.jpg', 'Проверка сохранения выбора групп ТЕСТ№4', '2014-07-27 14:44:22', '2014-09-03 19:55:34', '2014-02-28 22:00:00', '14:00:00', '2014-04-30 21:00:00', '08:00:00', '2014-03-31 21:00:00', '06:00:00', 1, 0, 2, 12);

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
(1, 3),
(2, 3),
(5, 3),
(2, 6),
(5, 7),
(2, 34),
(1, 60),
(3, 60);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `km_competition_request`
--

INSERT INTO `km_competition_request` (`id`, `competition_id`, `group_id`, `name`, `lastname`, `year`, `chip`, `dyusch`, `sity`, `coutry`, `team`, `coach`, `fst`, `participation_data`, `status`, `user_id`) VALUES
(2, 1, 3, 'Maxim', 'Vovk', 1990, '123', 'ДЮСШ', 'Kharkiv', 'Ukraine', 'MaxCo', 'Max', '123', '2014-07-1, ', 1, 3),
(3, 5, 3, ' grtg', 'w gwerg ', 0000, 'werg', 'ДЮСШ', '\\eqqgerg', 'Ukraine', 'MaxCo', 'Max', '123', '2014-03-31, 2014-03-32, 2014-03-33, 2014-03-34, 2014-03-35, 2014-03-36, 2014-03-37, 2014-03-38, 2014-03-39, 2014-03-40, 2014-03-41, 2014-03-42, 2014-03-60, ', 0, 3);

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
  `status` smallint(6) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `km_events`
--

INSERT INTO `km_events` (`id`, `type`, `title`, `description`, `author`, `create_date`, `update_date`, `position`, `text`, `logo_title`, `logo_path`, `status`, `views`) VALUES
(12, 1, 'Самариада 2013', 'Спортклуб “СКИФ“ приглашает принять участие в соревнованиях, которые пройдут на местности с живописным меловым карьером, цветущим лугом, сосновым лесом, спелой земляникой, тихой речкой.', 'Max', '2014-09-03 19:11:06', '2014-09-03 19:11:06', 0, ' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. организаторы постараются обеспечить.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.', 'Logo Title', '343.jpg', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `km_file`
--

CREATE TABLE IF NOT EXISTS `km_file` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `path` text,
  `type` int(11) DEFAULT NULL,
  `events_id` int(10) unsigned DEFAULT '0',
  `competition_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `events_id` (`events_id`),
  KEY `fcompetition_id` (`competition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `km_file`
--

INSERT INTO `km_file` (`id`, `name`, `path`, `type`, `events_id`, `competition_id`) VALUES
(1, 'Test №1', 'Последняя война.pdf', 0, 0, 1),
(2, 'Test №1', '__MirFantastiki__2014no08_RuLit_Net_355105.pdf', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `km_group`
--

CREATE TABLE IF NOT EXISTS `km_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `km_group`
--

INSERT INTO `km_group` (`id`, `name`, `description`, `parent_id`) VALUES
(3, 'A', '', 0),
(6, 'B', '', 0),
(7, 'C', '', 0),
(34, 'A1', 'A1', 0),
(60, 'D', 'New D group', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `km_group_photo`
--

INSERT INTO `km_group_photo` (`id`, `title`, `description`, `parent_id`) VALUES
(18, 'All', 'Альбом всех фотографий', 0),
(19, 'Природа', 'Альбом всех фотографий Природы', 18),
(20, 'Спорт', 'Альбом всех фотографий спорта', 18);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `km_link`
--

INSERT INTO `km_link` (`id`, `name`, `description`, `path`) VALUES
(1, 'Google', 'Google', 'http://www.google.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `km_photo`
--

INSERT INTO `km_photo` (`id`, `title`, `description`, `path`, `group_photo_id`, `user_id`) VALUES
(34, 'Title', 'Description', '9002.jpg', 18, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `km_quote`
--

INSERT INTO `km_quote` (`id`, `quote`, `author_quote`, `create_date`, `update_date`) VALUES
(11, 'Цытата некоторая!', 'кто то когда то сказал!', '2014-07-22 20:22:10', '2014-08-10 11:59:39'),
(12, 'wefwef', 'wefwef', '2014-07-22 20:25:59', '2014-07-22 20:25:59'),
(13, 'efwe', 'wefwe', '2014-07-22 20:26:04', '2014-07-22 20:26:04'),
(14, 'fwewefwef', 'wefwefwefwefwe', '2014-07-22 20:26:10', '2014-07-22 20:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `km_rank`
--

CREATE TABLE IF NOT EXISTS `km_rank` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `km_rank`
--

INSERT INTO `km_rank` (`id`, `name`) VALUES
(1, 'M-11');

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
(1, 2),
(1, 3);

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
(0000000001, 3),
(0000000002, 3),
(0000000003, 3);

-- --------------------------------------------------------

--
-- Table structure for table `km_sliders`
--

CREATE TABLE IF NOT EXISTS `km_sliders` (
  `link` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alt` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `hedline` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `km_sliders`
--

INSERT INTO `km_sliders` (`link`, `id`, `alt`, `path`, `hedline`) VALUES
('www.google.com', 2, 'www.google.com', 'Мотокросс1.jpg', 'www.google.com'),
('www.google.com', 5, 'www.google.com', '1214374502_animal_sport002.jpg', 'www.google.com'),
('www.google.com', 6, 'www.google.com', '1214374533_animal_sport003.jpg', 'www.google.com'),
('www.google.com', 7, 'www.google.com', '1363141919_sport_kstrim_2084132.jpg', 'www.google.com'),
('www.google.com', 8, 'www.google.com', 'basketball_sport_game_20131121_1978378222.jpg', 'www.google.com'),
('www.google.com', 10, 'www.google.com', 'img_sport_202.jpg', 'www.google.com'),
('www.google.com', 11, 'www.google.com', 'sport.jpg', 'www.google.com'),
('www.google.com', 12, 'www.google.com', 'sport8.jpg', 'www.google.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `km_user`
--

INSERT INTO `km_user` (`id`, `email`, `username`, `password`, `name`, `lastname`, `data_birth`, `phone`, `sity`, `coutry`, `club`, `status`, `member`) VALUES
(1, 'max@ukr.net', 'max', '2ffe4e77325d9a7152f7086ea7aa5114', 'Max', 'Vovk', '0000-00-00', '+38-099-428-47-10', 'Kharkiv', 'Ukrain', 'Kompas', 1, 1),
(3, 'max', 'maxim', '95ac3c545fa3f9c81939f8fa4d0511ca', 'maxim', 'Vovk', '0000-00-00', '8936895689', 'Kharkiv', 'Ukrain', 'max', 1, 1),
(8, 'maximas90@ukr.net', 'max1', '21225dccb5d0c174f1bcacf72cd4dcb2', 'Max', 'Vovk', '0000-00-00', '+38-099-428-47-10', 'Харьков', 'Украина', 'Компас', 0, 0),
(9, 'maximas90@ukr.net', 'max2', '1c6268cd0d39f7aba33b053f84d3c310', 'Max', 'Vovk', '0000-00-00', '+38-099-428-47-10', 'Харьков', 'Украина', 'Компас', 0, 0);

--
-- Constraints for dumped tables
--

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
