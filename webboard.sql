-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2024 at 05:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'เรื่องทั่วไป'),
(2, 'เรื่องเรียน'),
(3, 'เรื่องกีฬา');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `content` varchar(20148) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(2048) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `post_date`, `cat_id`, `user_id`) VALUES
(1, 'ใครน่ารักขอให้ยกมือขึ้น', 'ใครน่ารักขอให้ยกมือขึ้น 0/ 0/ 0/ 0/', '2024-03-01 11:03:56', 1, 7),
(2, 'ใครน่ารักขอให้ยกมือขึ้น', 'ใครน่ารักขอให้ยกมือขึ้น 0/ 0/ 0/ 0/', '2024-03-01 11:04:34', 1, 7),
(3, 'คณิตศาสน์', '1+1=0', '2024-03-01 11:19:43', 2, 7),
(4, 'ลิเวอพูได้แชม', 'แมนยู 7-0 ยิงได้ !โดนยิง', '2024-03-01 11:20:48', 3, 7),
(5, 'จะ F มั้ยครับ', '', '2024-03-01 11:46:38', 2, 8),
(6, 'Onepiece อยู่ไหนว้าาาาาาา', '', '2024-03-01 11:47:14', 1, 8),
(7, 'ท่าทางจะรีไทร์ ไปขอเกรดกับใครดี', '', '2024-03-01 11:47:50', 2, 8),
(8, 'ลิเวอร์พูล กับ แมนซิตี้ ผลเมื่อคืนเป็นยังไงบ้าง', '', '2024-03-01 11:48:42', 3, 8),
(9, 'มาแบบแพ็คคู่! เอ็มบัปเป้ขอเรอัล มาดริดดึงน้องชายร่วมทีมด้วย', '', '2024-03-01 11:52:41', 3, 9),
(10, 'ไม่กลัวแหกโค้ง! Marca ฟันธง’เอ็มบัปเป้’เป็นนักเตะเรอัล มาดริดแล้ว', '', '2024-03-01 11:53:58', 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `gender`, `email`, `role`) VALUES
(3, 'm1', 'c9198296f907c066bd972d59eace9af1402a4eea', 'msm1', 'M', 'msm@mail.com', 'm'),
(8, 'ad', '356a192b7913b04c54574d18c28d46e6395428ab', 'dda', 'M', 'dddbbb@email.com', 'm'),
(9, 'ff', '356a192b7913b04c54574d18c28d46e6395428ab', 'ffff', 'M', 'fffff@gmail.com', 'm'),
(10, 'ee', '356a192b7913b04c54574d18c28d46e6395428ab', 'eeee', 'M', 'eeeeee@gmail.com', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
