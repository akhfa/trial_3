-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2015 at 05:45 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trial_tugas3`
--
CREATE DATABASE IF NOT EXISTS `trial_tugas3` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trial_tugas3`;

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`group_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `group_name`) VALUES
(0, 'default'),
(1, 'group1'),
(10, 'group2');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_file` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `group_id` int(3) NOT NULL,
  `jenis_log` varchar(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `nama_file`, `username`, `group_id`, `jenis_log`, `waktu`) VALUES
(13, 'oke3.odt', 'akhfa3', 10, 'delete', '2015-04-01 20:14:19'),
(14, 'travel', 'akhfa3', 10, 'upload', '2015-04-01 20:14:47'),
(15, 'travel1.travel', 'akhfa3', 10, 'upload', '2015-04-01 20:14:52'),
(16, 'travel2.travel', 'akhfa3', 10, 'upload', '2015-04-01 20:14:59'),
(17, 'travel', 'akhfa3', 10, 'delete', '2015-04-01 20:40:18'),
(18, 'travel.txt', 'akhfa3', 10, 'upload', '2015-04-01 20:40:42'),
(19, 'oke1.odt', 'akhfa3', 10, 'upload', '2015-04-01 20:47:17'),
(20, 'oke.odt', 'akhfa3', 10, 'download', '2015-04-01 20:58:16'),
(21, 'travel1.travel', 'akhfa3', 10, 'download', '2015-04-01 21:00:13'),
(22, 'oke.odt', 'akhfa', 1, 'upload', '2015-04-01 21:07:06'),
(23, 'oke1.odt', 'akhfa', 1, 'upload', '2015-04-01 21:07:12'),
(24, 'oke.odt', 'akhfa', 1, 'download', '2015-04-01 21:07:21'),
(25, 'oke.odt', 'akhfa4', 5, 'upload', '2015-04-01 21:19:41'),
(26, 'oke1.odt', 'akhfa4', 5, 'upload', '2015-04-01 21:20:05'),
(27, 'oke1.odt', 'akhfa4', 5, 'download', '2015-04-01 21:20:17'),
(28, 'oke.odt', 'akhfa4', 11, 'upload', '2015-04-01 21:23:58'),
(29, 'travel.txt', 'akhfa4', 11, 'upload', '2015-04-01 21:24:14'),
(30, 'group3', 'akhfa', 1, 'delete', '2015-04-01 21:24:53'),
(31, 'oke.odt', 'akhfa3', 10, 'upload', '2015-04-01 22:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `group` int(3) NOT NULL DEFAULT '0',
  `role` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group`, `role`) VALUES
(1, 'akhfa', '1b8ecafda6be41799698012eadf3f5f8', 1, 'admin'),
(5, 'akhfa1', '1b8ecafda6be41799698012eadf3f5f8', 1, 'leader'),
(15, 'akhfa2', '1b8ecafda6be41799698012eadf3f5f8', 10, 'user'),
(16, 'akhfa3', '143e5ad801846681f7b0c0dd1a276ba0', 10, 'leader');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
