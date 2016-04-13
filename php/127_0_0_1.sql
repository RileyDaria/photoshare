-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 07:07 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photoshare_430`
--
DROP DATABASE `photoshare_430`;
CREATE DATABASE IF NOT EXISTS `photoshare_430` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `photoshare_430`;

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

DROP TABLE IF EXISTS `image_table`;
CREATE TABLE `image_table` (
  `image_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cat_1` varchar(50) NOT NULL,
  `cat_2` varchar(50) DEFAULT NULL,
  `cat_3` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `user_ID` int(11) NOT NULL,
  `file_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- MIME TYPES FOR TABLE `image_table`:
--   `file_type`
--       `Image_JPEG`
--

--
-- RELATIONS FOR TABLE `image_table`:
--   `user_ID`
--       `user_table` -> `user_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE `user_table` (
  `user_ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `user_table`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`image_ID`),
  ADD UNIQUE KEY `Unique_Image_name` (`name`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `Unique` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_table`
--
ALTER TABLE `image_table`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`user_ID`) REFERENCES `user_table` (`user_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
