-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 21, 2014 at 07:09 PM
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
-- Table structure for table `km_timers`
--

CREATE TABLE IF NOT EXISTS `km_timers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL,
  `timer_date` varchar(255) NOT NULL,
  `titles` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `km_timers`
--

INSERT INTO `km_timers` (`id`, `status`, `timer_date`, `titles`) VALUES
(1, 1, '09/20/2014 12:00', '09/20/2014 12:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
