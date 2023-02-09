-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2023 at 08:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `A_log`
--

CREATE TABLE `A_log` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `A_log`
--

INSERT INTO `A_log` (`user_id`, `username`, `password`) VALUES
(1, 'Admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0');

-- --------------------------------------------------------

--
-- Table structure for table `blog_one`
--

CREATE TABLE `blog_one` (
  `blog_id` int(11) NOT NULL,
  `blog` text NOT NULL,
  `blog_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_one`
--

INSERT INTO `blog_one` (`blog_id`, `blog`, `blog_pic`) VALUES
(3, '<p><span style=\"font-size:14px\"><span style=\"font-family:Georgia,serif\">Ha ha ha! Walifikiria wanatuweza lakini waapi! The quick brown fox jumped over the lazy <span style=\"color:#c0392b\"><strong>dogs</strong></span></span></span></p>\r\n', 'Cycling-in-Hells-Gate-National-Park-846x563.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_two`
--

CREATE TABLE `blog_two` (
  `blog_id` int(200) NOT NULL,
  `blog` text NOT NULL,
  `blog_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_two`
--

INSERT INTO `blog_two` (`blog_id`, `blog`, `blog_pic`) VALUES
(2, '<p>There is something about it seriously.</p>\r\n', 'SJqLVaR-black-desktop-backgrounds.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `img_id` int(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `A_log`
--
ALTER TABLE `A_log`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `blog_one`
--
ALTER TABLE `blog_one`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blog_two`
--
ALTER TABLE `blog_two`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`img_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `A_log`
--
ALTER TABLE `A_log`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_one`
--
ALTER TABLE `blog_one`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_two`
--
ALTER TABLE `blog_two`
  MODIFY `blog_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `img_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
