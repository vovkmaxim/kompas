-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2014 at 06:46 PM
-- Server version: 5.5.38
-- PHP Version: 5.3.10-1ubuntu3.14

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
-- Table structure for table `km_sliders`
--

CREATE TABLE IF NOT EXISTS `km_sliders` (
  `link` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alt` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `hedline` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `km_sliders`
--

INSERT INTO `km_sliders` (`link`, `id`, `alt`, `path`, `hedline`) VALUES
('www.google.com', 5, 'www.google.com', '1214374502_animal_sport002.jpg', 'www.google.com'),
('www.google.com', 6, 'www.google.com', '1214374533_animal_sport003.jpg', 'www.google.com'),
('www.google.com', 7, 'www.google.com', '1363141919_sport_kstrim_2084132.jpg', 'www.google.com'),
('www.google.com', 8, 'www.google.com', 'basketball_sport_game_20131121_1978378222.jpg', 'www.google.com'),
('www.google.com', 9, 'www.google.com', 'sportаалгнн.jpg', 'www.google.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
