-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2023 at 04:07 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_oop_midterm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `role_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_description` text NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `role_description`) VALUES
(1, 'unregistered', 'For every new user'),
(2, 'guest', 'guest role'),
(3, 'admin', 'In charge');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` smallint(11) NOT NULL AUTO_INCREMENT,
  `user_lname` varchar(200) NOT NULL,
  `user_fname` varchar(200) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_photo` varchar(25) DEFAULT 'default.jpg',
  `role_id` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_lname`, `user_fname`, `user_username`, `user_password`, `user_photo`, `role_id`) VALUES
(24, 'Ramesh', 'Meghna', 'ss', 'ss', 'default.jpg', 1),
(25, 'j', 'j', 'k', 'k', 'default.jpg', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_role`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `view_user_role`;
CREATE TABLE IF NOT EXISTS `view_user_role` (
`user_id` smallint(11)
,`user_lname` varchar(200)
,`user_fname` varchar(200)
,`user_username` varchar(100)
,`user_photo` varchar(25)
,`role_name` varchar(50)
,`role_description` text
);

-- --------------------------------------------------------

--
-- Structure for view `view_user_role`
--
DROP TABLE IF EXISTS `view_user_role`;

DROP VIEW IF EXISTS `view_user_role`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_role`  AS SELECT `tbl_user`.`user_id` AS `user_id`, `tbl_user`.`user_lname` AS `user_lname`, `tbl_user`.`user_fname` AS `user_fname`, `tbl_user`.`user_username` AS `user_username`, `tbl_user`.`user_photo` AS `user_photo`, `tbl_role`.`role_name` AS `role_name`, `tbl_role`.`role_description` AS `role_description` FROM (`tbl_user` join `tbl_role` on((`tbl_user`.`role_id` = `tbl_role`.`role_id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
