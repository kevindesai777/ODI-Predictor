-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2014 at 02:18 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `profile_url` varchar(255) DEFAULT NULL,
  `logo_picture_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `profile_url`, `logo_picture_url`) VALUES
(1, 'Australia', NULL, NULL),
(2, 'England', NULL, NULL),
(3, 'South Africa', NULL, NULL),
(4, 'West Indies', NULL, NULL),
(5, 'New Zealand', NULL, NULL),
(6, 'India', NULL, NULL),
(7, 'Pakistan', NULL, NULL),
(8, 'Sri Lanka', NULL, NULL),
(9, 'Zimbabwe', NULL, NULL),
(10, 'Bangladesh', NULL, NULL),
(11, 'ICC World XI', NULL, NULL),
(12, 'East Africa', NULL, NULL),
(13, 'Canada', NULL, NULL),
(14, 'United Arab Emirates', NULL, NULL),
(15, 'Netherlands', NULL, NULL),
(16, 'Kenya', NULL, NULL),
(17, 'Scotland', NULL, NULL),
(18, 'Namibia', NULL, NULL),
(19, 'Hong Kong', NULL, NULL),
(20, 'United States of America', NULL, NULL),
(21, 'Asia XI', NULL, NULL),
(22, 'Africa XI', NULL, NULL),
(23, 'Bermuda', NULL, NULL),
(24, 'Ireland', NULL, NULL),
(27, 'Afghanistan', NULL, NULL),
(28, 'Kolkata Knight Riders', NULL, NULL),
(30, 'Chennai Super Kings', NULL, NULL),
(31, 'Kings XI Punjab', NULL, NULL),
(32, 'Rajasthan Royals', NULL, NULL),
(33, 'Delhi Daredevils', NULL, NULL),
(34, 'Deccan Chargers', NULL, NULL),
(35, 'Mumbai Indians', NULL, NULL),
(36, 'Royal Challengers Bangalore', NULL, NULL),
(48, '', NULL, NULL);
