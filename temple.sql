-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 07:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temple`
--

-- --------------------------------------------------------

--
-- Table structure for table `important_days`
--

CREATE TABLE `important_days` (
  `important_days_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `important_days`
--

INSERT INTO `important_days` (`important_days_id`, `title`, `date`, `description`, `modified_date`, `status`) VALUES
(2, 'sdfsfsdf Test 2222', '2018-12-29', 'fdgdfg jhjhjh Test', '2018-12-29 16:15:30', 1),
(3, 'ghfhfghgf Good', '2018-12-31', 'Test ', '2018-12-29 15:48:06', 1),
(4, 'hfghgfh', '2018-12-29', 'fghfg', '2018-12-29 15:36:15', 1),
(5, 'jhkjhkh', '2018-12-29', 'hjkh', '2018-12-29 16:23:13', 1),
(6, 'fghfh', '2018-12-29', 'fhgh', '2018-12-29 16:23:21', 0),
(7, 'kjhkjhkjh', '2018-12-29', 'kjhkjh', '2018-12-29 15:41:47', 1),
(9, 'kjhkjhkh', '2018-12-29', 'hjkhjkh', '2018-12-29 16:03:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `description`, `date`, `date_modified`, `status`) VALUES
(2, 'Test', 'GGGG', '2018-12-30 00:18:12', '2018-12-30 00:18:12', 1),
(3, 'kannan', 'kan a', '2019-01-10 00:43:10', '2019-01-10 00:43:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photo_id` int(11) NOT NULL,
  `title` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `thumb_photo_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `title`, `description`, `photo_name`, `thumb_photo_name`, `date`, `date_modified`, `status`) VALUES
(12, 'h', 'fghgfh', 'Chrysanthemum.jpg', 'Chrysanthemum_thumb.jpg', '2019-01-01 18:25:46', '2019-01-01 18:25:46', 1),
(13, 'Test', 'fgdg', 'Garden_view_01.jpg', 'Garden_view_01_thumb.jpg', '2019-01-05 00:51:56', '2019-01-05 00:51:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rituals`
--

CREATE TABLE `rituals` (
  `ritual_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rituals`
--

INSERT INTO `rituals` (`ritual_id`, `title`, `date`, `description`, `modified_date`, `status`) VALUES
(4, 'Test 3 3', '2018-12-31', 'TTTT Me', '2018-12-30 00:48:20', 0),
(5, 'Daily 1 y', '2018-12-29', 'Daily Dwescc', '2018-12-29 23:32:33', 1),
(6, 'gdfgdgfdg', '2019-01-01', 'dfgfdg', '2019-01-01 18:26:14', 1),
(7, 'Test', '2019-01-10', 'Test', '2019-01-05 00:51:11', 1),
(8, 'Test', '2019-01-23', 'wd', '2019-01-05 00:51:30', 1),
(9, 'Test', '2019-01-11', 'Test', '2019-01-05 19:52:53', 1),
(10, 'Test', '2019-01-18', 'hgj', '2019-01-05 19:53:09', 1),
(11, 'Test', '2019-01-24', 'jh', '2019-01-05 19:57:52', 1),
(12, 'kannan', '2019-01-10', 'jhgjhhjkhkl', '2019-01-10 23:33:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `title`, `description`, `song_name`, `date`, `date_modified`, `status`) VALUES
(2, 'Test', 'hfhgf', 'SampleAudio_0_7mb.mp3', '2019-01-01 18:25:30', '2019-01-02 23:59:48', 1),
(3, 'fsd', 'fdsfs', 'SampleAudio_0_4mb.mp3', '2019-01-01 18:26:55', '2019-01-01 18:26:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `user_name`, `user_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `title`, `url`, `description`, `date`, `modified_date`, `status`) VALUES
(2, 'TTTTT', 'google.com', 'VV', '2018-12-30 00:02:32', '2018-12-30 00:02:32', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `important_days`
--
ALTER TABLE `important_days`
  ADD PRIMARY KEY (`important_days_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `rituals`
--
ALTER TABLE `rituals`
  ADD PRIMARY KEY (`ritual_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `important_days`
--
ALTER TABLE `important_days`
  MODIFY `important_days_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rituals`
--
ALTER TABLE `rituals`
  MODIFY `ritual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
