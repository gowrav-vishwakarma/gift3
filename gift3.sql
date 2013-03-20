-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2013 at 02:35 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gift3`
--

-- --------------------------------------------------------

--
-- Table structure for table `gifter`
--

CREATE TABLE IF NOT EXISTS `gifter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `can_receive` tinyint(4) DEFAULT NULL,
  `became_receiver_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gifters_member` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gift_send_request`
--

CREATE TABLE IF NOT EXISTS `gift_send_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `is_approved` tinytext,
  `request_date` datetime DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gift_send_request_gifter1` (`from_id`),
  KEY `fk_gift_send_request_gifter2` (`to_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `bank_branch` varchar(45) DEFAULT NULL,
  `bank_ifsc_code` varchar(45) DEFAULT NULL,
  `bank_account_number` varchar(45) DEFAULT NULL,
  `mobile_no` varchar(45) DEFAULT NULL,
  `email_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gifter`
--
ALTER TABLE `gifter`
  ADD CONSTRAINT `fk_gifters_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gift_send_request`
--
ALTER TABLE `gift_send_request`
  ADD CONSTRAINT `fk_gift_send_request_gifter1` FOREIGN KEY (`from_id`) REFERENCES `gifter` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gift_send_request_gifter2` FOREIGN KEY (`to_id`) REFERENCES `gifter` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
