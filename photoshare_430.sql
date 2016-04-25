-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2016 at 08:47 PM
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
CREATE DATABASE IF NOT EXISTS `photoshare_430` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `photoshare_430`;

-- --------------------------------------------------------

--
-- Table structure for table `images_table`
--

CREATE TABLE `images_table` (
  `image_ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `user_ID` int(11) NOT NULL,
  `file_type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- MIME TYPES FOR TABLE `images_table`:
--   `file_type`
--       `Image_JPEG`
--

--
-- RELATIONS FOR TABLE `images_table`:
--   `user_ID`
--       `users_table` -> `user_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags_table`
--

CREATE TABLE `tags_table` (
  `image_ID` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `tags_table`:
--   `image_ID`
--       `images_table` -> `image_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_ID` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS FOR TABLE `users_table`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images_table`
--
ALTER TABLE `images_table`
  ADD PRIMARY KEY (`image_ID`),
  ADD UNIQUE KEY `Unique_Image_name` (`name`),
  ADD UNIQUE KEY `user_ID` (`user_ID`);

--
-- Indexes for table `tags_table`
--
ALTER TABLE `tags_table`
  ADD KEY `cat_index` (`category`),
  ADD KEY `image_ID` (`image_ID`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `Unique` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images_table`
--
ALTER TABLE `images_table`
  MODIFY `image_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images_table`
--
ALTER TABLE `images_table`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`user_ID`) REFERENCES `users_table` (`user_ID`);

--
-- Constraints for table `tags_table`
--
ALTER TABLE `tags_table`
  ADD CONSTRAINT `fk_imageID` FOREIGN KEY (`image_ID`) REFERENCES `images_table` (`image_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
