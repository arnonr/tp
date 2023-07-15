-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 03:51 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL COMMENT 'สถานที่',
  `address_name` varchar(255) NOT NULL COMMENT 'สถานที่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `address_name`) VALUES
(1, 'อาคาร 96'),
(2, 'อาคาร 93');

-- --------------------------------------------------------

--
-- Table structure for table `fix`
--

CREATE TABLE `fix` (
  `fix_id` int(11) NOT NULL COMMENT 'แจ้งซ่อม',
  `fix_title` varchar(500) DEFAULT NULL COMMENT 'หัวข้อแจ้งซ่อม',
  `address_id` int(11) DEFAULT NULL COMMENT 'สถานที่',
  `fix_image` varchar(255) DEFAULT NULL COMMENT 'รูปภาพ',
  `fix_name` varchar(255) DEFAULT NULL COMMENT 'ชื่อผู้แจ้ง',
  `fix_email` varchar(255) DEFAULT NULL COMMENT 'เมลผู้แจ้ง',
  `fix_tel` varchar(255) DEFAULT NULL COMMENT 'เบอร์ติดต่อ (ถ้ามี)',
  `fix_detail` longtext DEFAULT NULL COMMENT 'รายละเอียด',
  `fix_status` int(11) DEFAULT 1 COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fix`
--

INSERT INTO `fix` (`fix_id`, `fix_title`, `address_id`, `fix_image`, `fix_name`, `fix_email`, `fix_tel`, `fix_detail`, `fix_status`) VALUES
(1, 'dddddddddd', 2, 'wdwdwd', 'wdwd', 'ewdewf', '02-858-98598', 'sdadqwdwqdwqdqwd', 2),
(2, 'ประปาเสียsd', 2, 'Capture5.png', 'อานนท์', 'arnon@gmail.com', '5698', 'ประปารั่วน้ำไหลนอง', 2),
(3, 'sadsad', 2, '0591959_PE674383_S5.webp', 'wqdwqd', 'wqd', 'dqw', 'wqdwqd', 1),
(4, 'sss', 2, '40a06f24e45bcc59528664163e3ff60a.jpg', 'sad', 'sad', 'wdwq', 'wqdwqd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'ผู้ใช้งาน',
  `username` varchar(255) NOT NULL COMMENT 'ผู้ใช้งาน',
  `password` varchar(500) NOT NULL COMMENT 'รหัสผ่าน',
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `auth_key`) VALUES
(2, 'admin1', 'admin1', NULL),
(4, 'admin2', 'admin2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `fix`
--
ALTER TABLE `fix`
  ADD PRIMARY KEY (`fix_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'สถานที่', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fix`
--
ALTER TABLE `fix`
  MODIFY `fix_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'แจ้งซ่อม', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ผู้ใช้งาน', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
