-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 18, 2019 at 02:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ytf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(25) NOT NULL,
  `Password` longtext NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`Admin_id`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Username`, `Password`, `Address`) VALUES
(2, 'admin', 'admin', 'ljnbojbhgdfjsghorus');

-- --------------------------------------------------------

--
-- Table structure for table `appeal`
--

DROP TABLE IF EXISTS `appeal`;
CREATE TABLE IF NOT EXISTS `appeal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_program_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

DROP TABLE IF EXISTS `judge`;
CREATE TABLE IF NOT EXISTS `judge` (
  `Id` int(2) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `pgm_id` int(3) NOT NULL,
  `contactinfo` varchar(100) NOT NULL,
  `mailid` varchar(150) DEFAULT NULL,
  `jdgno` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`Id`, `Name`, `password`, `pgm_id`, `contactinfo`, `mailid`, `jdgno`) VALUES
(1, 'Adarsh', '2f9f1ef468aefb88c02f68e1f23dd7ae', 2, '8593087846', 'adarsh@gmail.com', 'mark1'),
(2, 'rahul', '9e770d779365e230fe3819be2e995441', 2, '8593087846', 'rahul@gmail.com', 'mark1'),
(3, 'rahul', 'd0e23e3b65228fca14b280f353512cb0', 9, '8593087846', 'rahul@gmail.com', 'mark1');

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

DROP TABLE IF EXISTS `otp`;
CREATE TABLE IF NOT EXISTS `otp` (
  `otp_id` int(11) NOT NULL AUTO_INCREMENT,
  `mob` varchar(255) NOT NULL,
  `otp` varchar(255) NOT NULL,
  PRIMARY KEY (`otp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`otp_id`, `mob`, `otp`) VALUES
(1, '8089196698', '12043');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `name`, `address`, `mob`, `level`, `school_id`) VALUES
(1, 'a01', 'Address1', '5489652145', 'j', 1),
(2, 'a02', 'Address2', '8695475632', 'j', 1),
(3, 'a03', 'Address3', '8954712546', 'j', 1),
(4, 'a04', 'Address4', '9658745896', 'j', 1),
(5, 'a05', 'Address5', '7546982546', 'j', 1),
(6, 'a06', 'Address6', '7832459685', 'j', 1),
(7, 'a07', 'Address7', '4589623548', 'j', 1),
(8, 'a08', 'Address8', '6325457852', 'j', 1),
(9, 'a09', 'Address9', '2546985632', 'j', 1),
(10, 'a10', 'Address10', '2548965874', 'j', 1),
(11, 'a11', 'Address11', '4587256358', 's', 1),
(12, 'a12', 'Address12', '8956457896', 's', 1),
(13, 'a13', 'Address13', '4578965875', 's', 1),
(14, 'a14', 'Address14', '7869532145', 's', 1),
(15, 'a15', 'Address15', '7845129645', 's', 1),
(16, 'a16', 'Address16', '4785695632', 's', 1),
(17, 'a17', 'Address17', '2545456585', 's', 1),
(18, 'a18', 'Address18', '2547896532', 's', 1),
(19, 'a19', 'Address19', '4589632541', 's', 1),
(20, 'a20', 'Address20', '9214586352', 's', 1),
(21, 'b01', 'Address1', '8965235478', 'j', 2),
(22, 'b02', 'Address2', '8956457896', 'j', 2),
(23, 'b03', 'Address3', '5489652145', 'j', 2),
(24, 'b04', 'Address4', '8695475632', 'j', 2),
(25, 'b05', 'Address5', '8956457896', 'j', 2),
(26, 'b06', 'Address6', '5489652145', 's', 2),
(27, 'b07', 'Address7', '5489658145', 's', 2),
(28, 'b08', 'Address8', '5489652145', 's', 2),
(29, 'b09', 'Address9', '8695475632', 's', 2),
(30, 'b10', 'Address10', '8593087846', 's', 2),
(31, 'c01', 'Address1', '5489652145', 'j', 3),
(32, 'c02', 'Address2', '8956457896', 'j', 3),
(33, 'c03', 'Address3', '8954712546', 'j', 3),
(34, 'c04', 'Address4', '5489652145', 'j', 3),
(35, 'c05', 'Address5', '9658745896', 'j', 3),
(36, 'c06', 'Address6', '5489652145', 's', 3),
(37, 'c07', 'Address7', '8695475632', 's', 3),
(38, 'c08', 'Address8', '8956457896', 's', 3),
(39, 'c09', 'Address9', '8956457896', 's', 3),
(40, 'c10', 'Address10', '8956457896', 's', 3),
(41, 'd01', 'Address1', '5489652145', 'j', 4),
(42, 'd02', 'Address2', '8956457896', 'j', 4),
(43, 'd03', 'Address3', '8695475632', 'j', 4),
(44, 'd04', 'Address4', '8593087846', 'j', 4),
(45, 'd05', 'Address5', '8956457896', 'j', 4),
(46, 'd06', 'Address6', '8695475632', 's', 4),
(47, 'd07', 'Address7', '5489652145', 's', 4),
(48, 'd08', 'Address8', '8593087846', 's', 4),
(49, 'd09', 'Address9', '8956457896', 's', 4),
(50, 'd10', 'Address10', '9658745896', 's', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pgrmdetail`
--

DROP TABLE IF EXISTS `pgrmdetail`;
CREATE TABLE IF NOT EXISTS `pgrmdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` varchar(50) NOT NULL,
  `lunch` time NOT NULL,
  `startime` varchar(50) NOT NULL,
  `endtime` time NOT NULL,
  `qw` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pgrmdetail`
--

INSERT INTO `pgrmdetail` (`id`, `startdate`, `lunch`, `startime`, `endtime`, `qw`) VALUES
(1, '2019-06-30', '12:00:00', '9:00', '20:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

DROP TABLE IF EXISTS `program`;
CREATE TABLE IF NOT EXISTS `program` (
  `Program_id` int(3) NOT NULL AUTO_INCREMENT,
  `Program_type` varchar(50) NOT NULL,
  `Program` varchar(50) NOT NULL,
  `Number_of_participants` int(11) NOT NULL,
  `Stage` int(2) DEFAULT NULL,
  `start` longtext,
  `end` longtext,
  `st_size` int(11) NOT NULL,
  `time_limit` int(11) NOT NULL,
  `total_time` int(11) DEFAULT NULL,
  `total_no` int(11) DEFAULT NULL,
  `ststate` int(11) NOT NULL DEFAULT '0',
  `mstatus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Program_id`, `Program_type`, `Program`, `Number_of_participants`, `Stage`, `start`, `end`, `st_size`, `time_limit`, `total_time`, `total_no`, `ststate`, `mstatus`) VALUES
(1, 's', 'Kuchipudi', 1, 2, ' 2019-06-30 09:00:00 ', ' 2019-06-30 10:20:00 ', 2, 7, 56, 8, 1, 0),
(2, 'g', 'Sangaganam', 8, 2, ' 2019-06-15 10:20:00 ', ' 2019-06-30 11:32:00 ', 2, 6, 48, 8, 1, 1),
(3, 's', 'Mohiniyattam', 1, 2, ' 2019-06-30 11:32:00 ', ' 2019-06-30 13:52:00 ', 2, 7, 56, 8, 1, 0),
(4, 's', 'Mono Act', 1, 3, ' 2019-06-30 09:00:00 ', ' 2019-06-30 10:44:00 ', 2, 10, 80, 8, 1, 0),
(5, 'g', 'Nadakam', 10, 3, ' 2019-06-30 10:44:00 ', ' 2019-06-30 13:28:00 ', 2, 10, 80, 8, 1, 0),
(6, 's', 'Keralanadanam', 1, 4, ' 2019-06-30 09:00:00 ', ' 2019-06-30 10:12:00 ', 2, 6, 48, 8, 1, 0),
(7, 's', 'Kadhak', 1, 4, ' 2019-06-30 10:12:00 ', ' 2019-06-30 11:32:00 ', 2, 7, 56, 8, 1, 0),
(8, 's', 'Nadodi Nirtham', 1, 4, ' 2019-06-30 11:32:00 ', ' 2019-06-30 13:52:00 ', 2, 7, 56, 8, 1, 0),
(9, 's', 'Lalitha ganam', 1, 1, ' 2019-06-15 09:00:00 ', ' 2019-06-30 10:04:00 ', 1, 5, 40, 8, 1, 0),
(10, 'g', 'Thiruvathira', 8, 5, ' 2019-06-30 09:00:00 ', ' 2019-06-30 10:44:00 ', 2, 10, 80, 8, 1, 0),
(11, 'g', 'Oppana', 10, 5, ' 2019-06-30 10:44:00 ', ' 2019-06-30 13:28:00 ', 2, 10, 80, 8, 1, 0),
(12, 'g', 'Naadan Paatu', 5, 1, ' 2019-06-30 10:04:00 ', ' 2019-06-30 11:24:00 ', 1, 7, 56, 8, 1, 0),
(13, 'g', 'Margamkali', 5, 2, ' 2019-06-30 13:52:00 ', ' 2019-06-30 15:36:00 ', 2, 10, 80, 8, 1, 0),
(14, 's', 'abcd', 1, 1, ' 2019-06-30 11:24:00 ', ' 2019-06-30 14:07:00 ', 1, 100, 100, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `School_id` int(11) NOT NULL AUTO_INCREMENT,
  `School_code` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Name_of_principal` varchar(50) DEFAULT NULL,
  `Password` longtext NOT NULL,
  `st` int(11) NOT NULL DEFAULT '0',
  `coninfo` varchar(100) NOT NULL,
  PRIMARY KEY (`School_id`),
  UNIQUE KEY `School_code` (`School_code`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`School_id`, `School_code`, `Admin_id`, `Name`, `Address`, `Name_of_principal`, `Password`, `st`, `coninfo`) VALUES
(5, 1998, 2, 'KDA', 'KDA vallakadavu', 'VASUDEV', '439ed537979d8e831561964dbbbd7413', 0, ''),
(4, 1997, 2, 'FDA', 'FDA kuttichal', 'ashraf', '439ed537979d8e831561964dbbbd7413', 0, ''),
(3, 1996, 2, 'EDA', 'EDA poojapura', 'sarath', '439ed537979d8e831561964dbbbd7413', 0, ''),
(2, 1995, 2, 'QDA', 'QDA thiruvallam', 'joseph', '439ed537979d8e831561964dbbbd7413', 0, ''),
(1, 1994, 2, 'SDA', 'SDA Thirumala', 'rahul', '439ed537979d8e831561964dbbbd7413', 0, ''),
(6, 1999, 2, 'FSA ', 'FSA PULIYARAKONAM', 'Jithin s', 'e816956a51a1dbabfc53403199dd354a', 1, '8593087846'),
(10, 2000, 2, 'FSA ', 'FSA PULIYARAKONAM', 'Jithin s', '03a7384563949d123e04ac3708646a93', 1, '8593087846'),
(9, 2001, 2, 'FSA ', 'FSA PULIYARAKONAM', 'sdfsdf', 'e320d71a64124601fc310b6e0dc7c868', 1, '8593087846');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

DROP TABLE IF EXISTS `stage`;
CREATE TABLE IF NOT EXISTS `stage` (
  `Name` varchar(25) NOT NULL,
  `Stage_Number` int(10) NOT NULL AUTO_INCREMENT,
  `size` int(11) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  `work` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Stage_Number`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`Name`, `Stage_Number`, `size`, `state`, `work`) VALUES
('Kabani', 1, 1, 1, 196),
('Bhavani', 2, 2, 1, 240),
('Kallada', 3, 2, 0, 160),
('Pamba', 4, 2, 0, 160),
('Nila', 5, 2, 0, 160);

-- --------------------------------------------------------

--
-- Table structure for table `student_program`
--

DROP TABLE IF EXISTS `student_program`;
CREATE TABLE IF NOT EXISTS `student_program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `program_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `mobno` varchar(255) NOT NULL,
  `mark1` int(11) DEFAULT NULL,
  `mark2` int(11) DEFAULT NULL,
  `mark3` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `mark_status` int(20) DEFAULT '0',
  `regno` int(50) DEFAULT NULL,
  `team` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_program`
--

INSERT INTO `student_program` (`id`, `participant_id`, `name`, `level`, `program_id`, `school_id`, `mobno`, `mark1`, `mark2`, `mark3`, `total`, `mark_status`, `regno`, `team`) VALUES
(1, 1, 'a01', 'j', 1, 1, '5489652145', NULL, NULL, NULL, NULL, 0, 101, NULL),
(2, 11, 'a11', 's', 1, 1, '4587256358', NULL, NULL, NULL, NULL, 0, 102, NULL),
(3, 1, 'a01', 'j', 2, 1, '5489652145', 10, 1, 1, 12, 1, 201, 'PM67'),
(4, 2, 'a02', 'j', 2, 1, '8695475632', 10, 1, 1, 12, 1, NULL, 'PM67'),
(5, 3, 'a03', 'j', 2, 1, '8954712546', 10, 1, 1, 12, 1, NULL, 'PM67'),
(6, 11, 'a11', 's', 2, 1, '4587256358', 9, 1, 1, 11, 1, 202, 'AK18'),
(7, 12, 'a12', 's', 2, 1, '8956457896', 9, 1, 1, 11, 1, NULL, 'AK18'),
(8, 13, 'a13', 's', 2, 1, '4578965875', 9, 1, 1, 11, 1, NULL, 'AK18'),
(9, 2, 'a02', 'j', 3, 1, '8695475632', NULL, NULL, NULL, NULL, 0, 301, NULL),
(10, 12, 'a12', 's', 3, 1, '8956457896', NULL, NULL, NULL, NULL, 0, 302, NULL),
(11, 3, 'a03', 'j', 4, 1, '8954712546', NULL, NULL, NULL, NULL, 0, 401, NULL),
(12, 13, 'a13', 's', 4, 1, '4578965875', NULL, NULL, NULL, NULL, 0, 402, NULL),
(13, 4, 'a04', 'j', 5, 1, '9658745896', NULL, NULL, NULL, NULL, 0, 501, NULL),
(14, 5, 'a05', 'j', 5, 1, '7546982546', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(15, 6, 'a06', 'j', 5, 1, '7832459685', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(16, 14, 'a14', 's', 5, 1, '7869532145', NULL, NULL, NULL, NULL, 0, 502, NULL),
(17, 15, 'a15', 's', 5, 1, '7845129645', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(18, 16, 'a16', 's', 5, 1, '4785695632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(19, 4, 'a04', 'j', 6, 1, '9658745896', NULL, NULL, NULL, NULL, 0, 601, NULL),
(20, 14, 'a14', 's', 6, 1, '7869532145', NULL, NULL, NULL, NULL, 0, 602, NULL),
(21, 5, 'a05', 'j', 7, 1, '7546982546', NULL, NULL, NULL, NULL, 0, 701, NULL),
(22, 15, 'a15', 's', 7, 1, '7845129645', NULL, NULL, NULL, NULL, 0, 702, NULL),
(23, 5, 'a05', 'j', 8, 1, '7546982546', NULL, NULL, NULL, NULL, 0, 801, NULL),
(24, 15, 'a15', 's', 8, 1, '7845129645', NULL, NULL, NULL, NULL, 0, 802, NULL),
(25, 6, 'a06', 'j', 9, 1, '7832459685', NULL, NULL, NULL, NULL, 0, 901, NULL),
(26, 16, 'a16', 's', 9, 1, '4785695632', NULL, NULL, NULL, NULL, 0, 902, NULL),
(27, 7, 'a07', 'j', 10, 1, '4589623548', NULL, NULL, NULL, NULL, 0, 1001, NULL),
(28, 8, 'a08', 'j', 10, 1, '6325457852', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(29, 9, 'a09', 'j', 10, 1, '2546985632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(30, 10, 'a10', 'j', 10, 1, '2548965874', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(31, 17, 'a17', 's', 10, 1, '2545456585', NULL, NULL, NULL, NULL, 0, 1002, NULL),
(32, 18, 'a18', 's', 10, 1, '2547896532', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(33, 19, 'a19', 's', 10, 1, '4589632541', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(34, 20, 'a20', 's', 10, 1, '9214586352', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(35, 1, 'a01', 'j', 11, 1, '5489652145', NULL, NULL, NULL, NULL, 0, 1101, NULL),
(36, 2, 'a02', 'j', 11, 1, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(37, 3, 'a03', 'j', 11, 1, '8954712546', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(38, 4, 'a04', 'j', 11, 1, '9658745896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(39, 11, 'a11', 's', 11, 1, '4587256358', NULL, NULL, NULL, NULL, 0, 1102, NULL),
(40, 12, 'a12', 's', 11, 1, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(41, 13, 'a13', 's', 11, 1, '4578965875', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(42, 14, 'a14', 's', 11, 1, '7869532145', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(43, 6, 'a06', 'j', 12, 1, '7832459685', NULL, NULL, NULL, NULL, 0, 1201, NULL),
(44, 7, 'a07', 'j', 12, 1, '4589623548', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(45, 8, 'a08', 'j', 12, 1, '6325457852', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(46, 16, 'a16', 's', 12, 1, '4785695632', NULL, NULL, NULL, NULL, 0, 1202, NULL),
(47, 17, 'a17', 's', 12, 1, '2545456585', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(48, 18, 'a18', 's', 12, 1, '2547896532', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(49, 4, 'a04', 'j', 13, 1, '9658745896', NULL, NULL, NULL, NULL, 0, 1301, NULL),
(50, 5, 'a05', 'j', 13, 1, '7546982546', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(51, 6, 'a06', 'j', 13, 1, '7832459685', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(52, 14, 'a14', 's', 13, 1, '7869532145', NULL, NULL, NULL, NULL, 0, 1302, NULL),
(53, 15, 'a15', 's', 13, 1, '7845129645', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(54, 16, 'a16', 's', 13, 1, '4785695632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(55, 21, 'b01', 'j', 1, 2, '8965235478', NULL, NULL, NULL, NULL, 0, 103, NULL),
(56, 26, 'b06', 's', 1, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 104, NULL),
(57, 21, 'b01', 'j', 2, 2, '8965235478', 8, 1, 1, 10, 1, 203, 'HS76'),
(58, 22, 'b02', 'j', 2, 2, '8956457896', 8, 1, 1, 10, 1, NULL, 'HS76'),
(59, 26, 'b06', 's', 2, 2, '5489652145', 7, 1, 1, 9, 1, 204, 'UG40'),
(60, 27, 'b07', 's', 2, 2, '5489658145', 7, 1, 1, 9, 1, NULL, 'UG40'),
(61, 22, 'b02', 'j', 3, 2, '8956457896', NULL, NULL, NULL, NULL, 0, 303, NULL),
(62, 27, 'b07', 's', 3, 2, '5489658145', NULL, NULL, NULL, NULL, 0, 304, NULL),
(63, 23, 'b03', 'j', 4, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 403, NULL),
(64, 28, 'b08', 's', 4, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 404, NULL),
(65, 23, 'b03', 'j', 5, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 503, NULL),
(66, 24, 'b04', 'j', 5, 2, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(67, 28, 'b08', 's', 5, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 504, NULL),
(68, 29, 'b09', 's', 5, 2, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(69, 24, 'b04', 'j', 6, 2, '8695475632', NULL, NULL, NULL, NULL, 0, 603, NULL),
(70, 29, 'b09', 's', 6, 2, '8695475632', NULL, NULL, NULL, NULL, 0, 604, NULL),
(71, 25, 'b05', 'j', 7, 2, '8956457896', NULL, NULL, NULL, NULL, 0, 703, NULL),
(72, 30, 'b10', 's', 7, 2, '8593087846', NULL, NULL, NULL, NULL, 0, 704, NULL),
(73, 24, 'b04', 'j', 8, 2, '8695475632', NULL, NULL, NULL, NULL, 0, 803, NULL),
(74, 29, 'b09', 's', 8, 2, '8695475632', NULL, NULL, NULL, NULL, 0, 804, NULL),
(75, 23, 'b03', 'j', 9, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 903, NULL),
(76, 28, 'b08', 's', 9, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 904, NULL),
(77, 25, 'b05', 'j', 10, 2, '8956457896', NULL, NULL, NULL, NULL, 0, 1003, NULL),
(78, 24, 'b04', 'j', 10, 2, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(79, 30, 'b10', 's', 10, 2, '8593087846', NULL, NULL, NULL, NULL, 0, 1004, NULL),
(80, 29, 'b09', 's', 10, 2, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(81, 21, 'b01', 'j', 11, 2, '8965235478', NULL, NULL, NULL, NULL, 0, 1103, NULL),
(82, 22, 'b02', 'j', 11, 2, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(83, 26, 'b06', 's', 11, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 1104, NULL),
(84, 27, 'b07', 's', 11, 2, '5489658145', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(85, 23, 'b03', 'j', 12, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 1203, NULL),
(86, 24, 'b04', 'j', 12, 2, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(87, 28, 'b08', 's', 12, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 1204, NULL),
(88, 29, 'b09', 's', 12, 2, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(89, 21, 'b01', 'j', 13, 2, '8965235478', NULL, NULL, NULL, NULL, 0, 1303, NULL),
(90, 25, 'b05', 'j', 13, 2, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(91, 26, 'b06', 's', 13, 2, '5489652145', NULL, NULL, NULL, NULL, 0, 1304, NULL),
(92, 30, 'b10', 's', 13, 2, '8593087846', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(93, 31, 'c01', 'j', 1, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 105, NULL),
(94, 36, 'c06', 's', 1, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 106, NULL),
(95, 31, 'c01', 'j', 2, 3, '5489652145', 6, 1, 1, 8, 1, 205, 'DY73'),
(96, 32, 'c02', 'j', 2, 3, '8956457896', 6, 1, 1, 8, 1, NULL, 'DY73'),
(97, 36, 'c06', 's', 2, 3, '5489652145', 5, 1, 1, 7, 1, 206, 'FZ87'),
(98, 37, 'c07', 's', 2, 3, '8695475632', 5, 1, 1, 7, 1, NULL, 'FZ87'),
(99, 32, 'c02', 'j', 3, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 305, NULL),
(100, 37, 'c07', 's', 3, 3, '8695475632', NULL, NULL, NULL, NULL, 0, 306, NULL),
(101, 33, 'c03', 'j', 4, 3, '8954712546', NULL, NULL, NULL, NULL, 0, 405, NULL),
(102, 38, 'c08', 's', 4, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 406, NULL),
(103, 34, 'c04', 'j', 5, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 505, NULL),
(104, 35, 'c05', 'j', 5, 3, '9658745896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(105, 39, 'c09', 's', 5, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 506, NULL),
(106, 40, 'c10', 's', 5, 3, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(107, 34, 'c04', 'j', 6, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 605, NULL),
(108, 39, 'c09', 's', 6, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 606, NULL),
(109, 35, 'c05', 'j', 7, 3, '9658745896', NULL, NULL, NULL, NULL, 0, 705, NULL),
(110, 40, 'c10', 's', 7, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 706, NULL),
(111, 31, 'c01', 'j', 8, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 805, NULL),
(112, 36, 'c06', 's', 8, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 806, NULL),
(113, 35, 'c05', 'j', 9, 3, '9658745896', NULL, NULL, NULL, NULL, 0, 905, NULL),
(114, 40, 'c10', 's', 9, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 906, NULL),
(115, 33, 'c03', 'j', 10, 3, '8954712546', NULL, NULL, NULL, NULL, 0, 1005, NULL),
(116, 34, 'c04', 'j', 10, 3, '5489652145', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(117, 38, 'c08', 's', 10, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 1006, NULL),
(118, 39, 'c09', 's', 10, 3, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(119, 34, 'c04', 'j', 11, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 1105, NULL),
(120, 35, 'c05', 'j', 11, 3, '9658745896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(121, 39, 'c09', 's', 11, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 1106, NULL),
(122, 40, 'c10', 's', 11, 3, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(123, 31, 'c01', 'j', 12, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 1205, NULL),
(124, 35, 'c05', 'j', 12, 3, '9658745896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(125, 36, 'c06', 's', 12, 3, '5489652145', NULL, NULL, NULL, NULL, 0, 1206, NULL),
(126, 40, 'c10', 's', 12, 3, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(127, 32, 'c02', 'j', 13, 3, '8956457896', NULL, NULL, NULL, NULL, 0, 1305, NULL),
(128, 33, 'c03', 'j', 13, 3, '8954712546', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(129, 37, 'c07', 's', 13, 3, '8695475632', NULL, NULL, NULL, NULL, 0, 1306, NULL),
(130, 38, 'c08', 's', 13, 3, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(131, 41, 'd01', 'j', 1, 4, '5489652145', NULL, NULL, NULL, NULL, 0, 107, NULL),
(132, 46, 'd06', 's', 1, 4, '8695475632', NULL, NULL, NULL, NULL, 0, 108, NULL),
(133, 41, 'd01', 'j', 2, 4, '5489652145', 4, 1, 1, 6, 1, 207, 'PC42'),
(134, 42, 'd02', 'j', 2, 4, '8956457896', 4, 1, 1, 6, 1, NULL, 'PC42'),
(135, 46, 'd06', 's', 2, 4, '8695475632', 1, 1, 1, 3, 1, 208, 'XO66'),
(136, 47, 'd07', 's', 2, 4, '5489652145', 1, 1, 1, 3, 1, NULL, 'XO66'),
(137, 42, 'd02', 'j', 3, 4, '8956457896', NULL, NULL, NULL, NULL, 0, 307, NULL),
(138, 47, 'd07', 's', 3, 4, '5489652145', NULL, NULL, NULL, NULL, 0, 308, NULL),
(139, 43, 'd03', 'j', 4, 4, '8695475632', NULL, NULL, NULL, NULL, 0, 407, NULL),
(140, 48, 'd08', 's', 4, 4, '8593087846', NULL, NULL, NULL, NULL, 0, 408, NULL),
(141, 42, 'd02', 'j', 5, 4, '8956457896', NULL, NULL, NULL, NULL, 0, 507, NULL),
(142, 43, 'd03', 'j', 5, 4, '8695475632', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(143, 47, 'd07', 's', 5, 4, '5489652145', NULL, NULL, NULL, NULL, 0, 508, NULL),
(144, 48, 'd08', 's', 5, 4, '8593087846', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(145, 44, 'd04', 'j', 6, 4, '8593087846', NULL, NULL, NULL, NULL, 0, 607, NULL),
(146, 49, 'd09', 's', 6, 4, '8956457896', NULL, NULL, NULL, NULL, 0, 608, NULL),
(147, 45, 'd05', 'j', 7, 4, '8956457896', NULL, NULL, NULL, NULL, 0, 707, NULL),
(148, 50, 'd10', 's', 7, 4, '9658745896', NULL, NULL, NULL, NULL, 0, 708, NULL),
(149, 43, 'd03', 'j', 8, 4, '8695475632', NULL, NULL, NULL, NULL, 0, 807, NULL),
(150, 48, 'd08', 's', 8, 4, '8593087846', NULL, NULL, NULL, NULL, 0, 808, NULL),
(151, 44, 'd04', 'j', 9, 4, '8593087846', NULL, NULL, NULL, NULL, 0, 907, NULL),
(152, 49, 'd09', 's', 9, 4, '8956457896', NULL, NULL, NULL, NULL, 0, 908, NULL),
(153, 41, 'd01', 'j', 10, 4, '5489652145', NULL, NULL, NULL, NULL, 0, 1007, NULL),
(154, 42, 'd02', 'j', 10, 4, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(155, 46, 'd06', 's', 10, 4, '8695475632', NULL, NULL, NULL, NULL, 0, 1008, NULL),
(156, 47, 'd07', 's', 10, 4, '5489652145', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(157, 44, 'd04', 'j', 11, 4, '8593087846', NULL, NULL, NULL, NULL, 0, 1107, NULL),
(158, 45, 'd05', 'j', 11, 4, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(159, 49, 'd09', 's', 11, 4, '8956457896', NULL, NULL, NULL, NULL, 0, 1108, NULL),
(160, 50, 'd10', 's', 11, 4, '9658745896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(161, 43, 'd03', 'j', 12, 4, '8695475632', NULL, NULL, NULL, NULL, 0, 1207, NULL),
(162, 44, 'd04', 'j', 12, 4, '8593087846', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(163, 48, 'd08', 's', 12, 4, '8593087846', NULL, NULL, NULL, NULL, 0, 1208, NULL),
(164, 49, 'd09', 's', 12, 4, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(165, 41, 'd01', 'j', 13, 4, '5489652145', NULL, NULL, NULL, NULL, 0, 1307, NULL),
(166, 42, 'd02', 'j', 13, 4, '8956457896', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(167, 46, 'd06', 's', 13, 4, '8695475632', NULL, NULL, NULL, NULL, 0, 1308, NULL),
(168, 47, 'd07', 's', 13, 4, '5489652145', NULL, NULL, NULL, NULL, 0, NULL, NULL),
(169, 16, 'a16', 's', 14, 1, '4785695632', NULL, NULL, NULL, NULL, 0, 1401, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `School_code` int(6) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Id` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`School_code`, `Name`, `Id`) VALUES
(55, 'Haritha', 1),
(88, 'Paru', 2),
(32434, 'sasi', 3),
(3121434, 'sasi', 4),
(600718, 'Chinikandam', 5),
(4545, 'Lethika', 6),
(454466, 'xxxxx', 7),
(34, 'www', 8),
(45454545, 'HHHHHHH', 9),
(23232, 'ttttt', 10),
(12345, 'aaaaa', 11),
(12332156, 'Ammu', 12),
(1994, 'sreelekshmi', 13),
(1994, 'sreedevi', 14),
(1994, 'dhanya', 15),
(2000, 'Kabani', 16);

-- --------------------------------------------------------

--
-- Table structure for table `testtable`
--

DROP TABLE IF EXISTS `testtable`;
CREATE TABLE IF NOT EXISTS `testtable` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `state` int(11) NOT NULL,
  `school` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testtable`
--

INSERT INTO `testtable` (`id`, `name`, `state`, `school`) VALUES
(1, 'ram', 1, 'addi'),
(2, 'ram', 2, 'addi'),
(3, 'vvina', 1, 'addi'),
(4, 'ram', 3, 'vih');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
