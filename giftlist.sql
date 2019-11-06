-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 05:05 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `giftlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gift`
--

CREATE TABLE `tbl_gift` (
  `gift_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `gift_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ranking` double(2,1) NOT NULL,
  `website_link` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `where_to_buy` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `gift_image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gift`
--

INSERT INTO `tbl_gift` (`gift_id`, `list_id`, `gift_name`, `ranking`, `website_link`, `quantity`, `price`, `where_to_buy`, `detail`, `gift_image`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status_id`) VALUES
(1, 1, 'giraffe b/w', 2.0, 'www.aeon.com', 2, 404.00, 'AEON', 'Wow cool giraffe!\r\nThanks for sharing.', 'images/gift-1.jpg', 1, '2019-11-05 22:35:40', 1, '2019-11-06 00:04:09', 1),
(2, 1, 'Earth', 5.0, NULL, 1, 10000000.00, NULL, NULL, 'images/gift-2.jpg', 1, '2019-11-05 23:47:47', 1, '2019-11-05 23:47:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gift_list`
--

CREATE TABLE `tbl_gift_list` (
  `list_id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_id` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gift_list`
--

INSERT INTO `tbl_gift_list` (`list_id`, `title`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status_id`) VALUES
(1, 'Web Development Opening Class', 1, '2019-11-05 17:31:14', 1, '2019-11-05 17:31:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_sharing`
--

CREATE TABLE `tbl_list_sharing` (
  `id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `usr_id` int(11) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `usr_password` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`usr_id`, `full_name`, `email`, `usr_password`, `status_id`) VALUES
(1, 'User 1', 'user1@mail.com', '$2y$10$LiVL07jtuveXphw0IE0lK.6FF/YK3oxPSMY2eZEgbQ9DS7BAa4qK6', 1),
(2, 'User 2', 'user2@mail.com', '$2y$10$ZrlG53151lYJgSPSnIsyCuGhWyu4/GEYQTEDxYSPHYR0LYirbjUjK', 1),
(3, 'User 3', 'user3@mail.com', '$2y$10$bWok3/j0E322VtXiVryZ0O7FlHHStWzq/cNQNgLL8Oab0CkchCAOS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gift`
--
ALTER TABLE `tbl_gift`
  ADD PRIMARY KEY (`gift_id`);

--
-- Indexes for table `tbl_gift_list`
--
ALTER TABLE `tbl_gift_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `tbl_list_sharing`
--
ALTER TABLE `tbl_list_sharing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_gift`
--
ALTER TABLE `tbl_gift`
  MODIFY `gift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_gift_list`
--
ALTER TABLE `tbl_gift_list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_list_sharing`
--
ALTER TABLE `tbl_list_sharing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
