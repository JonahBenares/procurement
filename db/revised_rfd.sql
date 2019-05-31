-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 07:52 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_procurement`
--

-- --------------------------------------------------------

--
-- Table structure for table `revised_rfd`
--

CREATE TABLE IF NOT EXISTS `revised_rfd` (
  `rfd_id` int(11) NOT NULL,
  `rfd_date` varchar(20) DEFAULT NULL,
  `revised_date` varchar(20) DEFAULT NULL,
  `apv_no` varchar(50) DEFAULT NULL,
  `company` varchar(200) DEFAULT NULL,
  `pay_to` varchar(200) DEFAULT NULL,
  `check_name` varchar(200) DEFAULT NULL,
  `cash` int(11) NOT NULL DEFAULT '0',
  `check` int(11) NOT NULL DEFAULT '0',
  `bank_no` varchar(50) DEFAULT NULL,
  `po_id` int(11) NOT NULL,
  `check_date` varchar(20) DEFAULT NULL,
  `due_date` varchar(20) DEFAULT NULL,
  `gross_amount` decimal(10,2) DEFAULT '0.00',
  `less_amount` decimal(10,2) DEFAULT '0.00',
  `net_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `prepared_by` int(11) NOT NULL DEFAULT '0',
  `checked_by` int(11) NOT NULL DEFAULT '0',
  `endorsed_by` int(11) NOT NULL DEFAULT '0',
  `approved_by` int(11) NOT NULL DEFAULT '0',
  `saved` int(11) NOT NULL DEFAULT '0',
  `revised` int(11) DEFAULT '0',
  `revision_no` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
