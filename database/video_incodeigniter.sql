-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2013 at 12:35 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `video_incodeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_jobs`
--

CREATE TABLE IF NOT EXISTS `assigned_jobs` (
  `video_id` int(10) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_users`
--

CREATE TABLE IF NOT EXISTS `assigned_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `assigned_users`
--

INSERT INTO `assigned_users` (`id`, `user_id`, `job_id`) VALUES
(29, 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `assigned_videos`
--

CREATE TABLE IF NOT EXISTS `assigned_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_done` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `description`, `location`, `start_date`, `end_date`, `is_done`) VALUES
(24, 'job1', 'job description', 'job location', '2013-01-11 00:00:00', '2013-01-12 00:00:00', '0'),
(32, 'job1', 'decription of the job', '', '2013-04-12 00:00:00', '2013-10-12 00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(400) NOT NULL,
  `last_name` varchar(400) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `real_password` varchar(255) NOT NULL,
  `role` varchar(300) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `organisation` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `password`, `real_password`, `role`, `user_email`, `organisation`) VALUES
(1, 'user', '', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'user', 'user@usercom', 'nisapp'),
(2, 'admin', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@nisapptech.com', 'nisapp');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `camera_operator` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `is_promo` enum('1','0') NOT NULL,
  `video_in_folder` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_name`, `description`, `camera_operator`, `version`, `is_promo`, `video_in_folder`) VALUES
(11, 'Wild Life', 'Wild life description', 'the camera operator', '1.1', '0', 'barsandtone.flv');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
