-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2013 at 05:17 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.6-13ubuntu3.6

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
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `is_forclient` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `key`, `value`, `is_forclient`) VALUES
(1, 'SendRequestOnJoining', 'No', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `can_receive` tinyint(4) DEFAULT NULL,
  `became_receiver_on` datetime DEFAULT NULL,
  `is_participent` tinyint(4) NOT NULL,
  `Priority` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gifters_member` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`, `member_id`, `can_receive`, `became_receiver_on`, `is_participent`, `Priority`) VALUES
(1, 1, 1, NULL, 1, 0),
(2, 2, 0, NULL, 1, 0),
(3, 3, 0, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `filestore_file`
--

CREATE TABLE IF NOT EXISTS `filestore_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filestore_type_id` int(11) NOT NULL DEFAULT '0',
  `filestore_volume_id` int(11) NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `original_filename` varchar(255) DEFAULT NULL,
  `filesize` int(11) NOT NULL DEFAULT '0',
  `filenum` int(11) NOT NULL DEFAULT '0',
  `deleted` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `filestore_file`
--

INSERT INTO `filestore_file` (`id`, `filestore_type_id`, `filestore_volume_id`, `filename`, `original_filename`, `filesize`, `filenum`, `deleted`) VALUES
(3, 1, 1, '0/20130321152651_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(4, 1, 1, '0/20130321152651__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(5, 1, 1, '0/20130321155534_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(6, 1, 1, '0/20130321155534__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(9, 1, 1, '0/20130321161724_1_thumb-alicia-machado-2-1920x1200.jpg', 'thumb_Alicia_Machado_2-1920X1200.jpg', 0, 0, ''),
(10, 1, 1, '0/20130321161724__alicia-machado-2-1920x1200.jpg', 'Alicia_Machado_2-1920X1200.jpg', 243836, 0, ''),
(11, 1, 1, '0/20130321161928_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(12, 1, 1, '0/20130321161928__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(13, 1, 1, '0/20130321162403_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(14, 1, 1, '0/20130321162403__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(15, 1, 1, '0/20130321162421_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(16, 1, 1, '0/20130321162421__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(17, 1, 1, '0/20130321162426_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(18, 1, 1, '0/20130321162426__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(19, 1, 1, '0/20130321162449_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(20, 1, 1, '0/20130321162449__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(21, 1, 1, '0/20130321162543_1_thumb-1-3028146-5942670.jpg', 'thumb_1-3028146-5942670.jpg', 0, 0, ''),
(22, 1, 1, '0/20130321162543__1-3028146-5942670.jpg', '1-3028146-5942670.jpg', 4829, 0, ''),
(23, 1, 1, '0/20130321164028_1_thumb-birthday-wishes.jpg', 'thumb_birthday-wishes.jpg', 0, 0, ''),
(24, 1, 1, '0/20130321164028__birthday-wishes.jpg', 'birthday-wishes.jpg', 55253, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `filestore_image`
--

CREATE TABLE IF NOT EXISTS `filestore_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `original_file_id` int(11) NOT NULL DEFAULT '0',
  `thumb_file_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `filestore_image`
--

INSERT INTO `filestore_image` (`id`, `name`, `original_file_id`, `thumb_file_id`) VALUES
(1, NULL, 2, 1),
(2, NULL, 4, 3),
(3, NULL, 6, 5),
(4, NULL, 8, 7),
(5, NULL, 10, 9),
(6, NULL, 12, 11),
(7, NULL, 14, 13),
(8, NULL, 16, 15),
(9, NULL, 18, 17),
(10, NULL, 20, 19),
(11, NULL, 22, 21),
(12, NULL, 24, 23);

-- --------------------------------------------------------

--
-- Table structure for table `filestore_type`
--

CREATE TABLE IF NOT EXISTS `filestore_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mime_type` varchar(64) NOT NULL DEFAULT '',
  `extension` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `filestore_type`
--

INSERT INTO `filestore_type` (`id`, `name`, `mime_type`, `extension`) VALUES
(1, 'jpg', 'image/jpeg', 'jpg'),
(2, 'jpeg', 'image/jpeg', 'jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `filestore_volume`
--

CREATE TABLE IF NOT EXISTS `filestore_volume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `dirname` varchar(255) NOT NULL DEFAULT '',
  `total_space` bigint(20) NOT NULL DEFAULT '0',
  `used_space` bigint(20) NOT NULL DEFAULT '0',
  `stored_files_cnt` int(11) NOT NULL DEFAULT '0',
  `enabled` enum('Y','N') DEFAULT 'Y',
  `last_filenum` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `filestore_volume`
--

INSERT INTO `filestore_volume` (`id`, `name`, `dirname`, `total_space`, `used_space`, `stored_files_cnt`, `enabled`, `last_filenum`) VALUES
(1, 'upload', 'upload', 1000000000, 0, 24, 'Y', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gift`
--

CREATE TABLE IF NOT EXISTS `gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `is_approved` tinytext,
  `request_date` datetime DEFAULT NULL,
  `approved_date` datetime DEFAULT NULL,
  `is_rejected` tinyint(4) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gift_send_request_gifter1` (`from_id`),
  KEY `fk_gift_send_request_gifter2` (`to_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gift`
--

INSERT INTO `gift` (`id`, `from_id`, `to_id`, `is_approved`, `request_date`, `approved_date`, `is_rejected`, `image_id`) VALUES
(1, 2, 1, '0', '2013-03-21 00:00:00', '0000-00-00 00:00:00', 0, 22),
(2, 3, 2, '0', '2013-03-21 00:00:00', '0000-00-00 00:00:00', 0, 24);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `username`, `password`, `bank`, `bank_branch`, `bank_ifsc_code`, `bank_account_number`, `mobile_no`, `email_id`) VALUES
(1, 'm1', 'm1', '1', 'yes bank', 'Udaipur', 'nahi pata', '00048500000620', '9783807100', 'gowravvishwakarma@gmail.com'),
(2, 'm2', 'm2', '2', '2', '2', '2', '2', '22', '2'),
(3, 'm3', 'm3', '3', '3', '3', '3', '3', '3', '3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `fk_gifters_member` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gift`
--
ALTER TABLE `gift`
  ADD CONSTRAINT `fk_gift_send_request_gifter1` FOREIGN KEY (`from_id`) REFERENCES `entry` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gift_send_request_gifter2` FOREIGN KEY (`to_id`) REFERENCES `entry` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
