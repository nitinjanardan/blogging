-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2017 at 07:05 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogging`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(30) NOT NULL,
  `category_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Sports'),
(3, 'Business'),
(4, 'Technoloy'),
(5, 'Education'),
(6, 'Food'),
(7, 'Entertainment');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `blog_id` int(20) NOT NULL,
  `blog_head` varchar(4000) NOT NULL,
  `blog_image` varchar(500) NOT NULL,
  `blog_description` varchar(30000) NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `u_id` varchar(30) NOT NULL,
  `category_name` varchar(40) NOT NULL,
  `verified` varchar(30) NOT NULL DEFAULT 'no',
  `block` varchar(30) NOT NULL DEFAULT 'no',
  `is_delete` varchar(30) NOT NULL DEFAULT 'no',
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`blog_id`, `blog_head`, `blog_image`, `blog_description`, `blog_date`, `u_id`, `category_name`, `verified`, `block`, `is_delete`, `name`) VALUES
(68, 'neymar jrcxcxcxzc', 'upload/ga2.jpg', '    psg        ', '2017-08-13 09:25:07', '1', 'Business', 'yes', 'no', 'no', ''),
(69, 'neymar jr nitin', 'upload/blog1.jpg', '   bbvcbcvbcvbcvb    ', '2017-08-13 10:17:05', '3', 'Business', 'yes', 'yes', 'yes', ''),
(70, 'neymar jr saint', 'upload/ga5.jpg', '    bbvcbcvbcvbcvb      ', '2017-08-13 10:56:38', '3', 'Business', 'yes', 'no', 'no', ''),
(71, 'neymar jrqwww', 'upload/blog1.jpg', '    bbvcbcvbcvbcvb      ', '2017-08-13 10:56:54', '3', 'Business', 'yes', 'no', 'no', ''),
(72, 'neymar jr paris', 'upload/ga2.jpg', '     bbvcbcvbcvbcvb        ', '2017-08-13 10:57:10', '3', 'Business', 'yes', 'no', 'no', ''),
(73, 'neymar jr', 'upload/Koala.jpg', '    bbvcbcvbcvbcvb      ', '2017-08-13 10:57:34', '4', 'Business', 'yes', 'no', 'no', ''),
(74, 'neymar jrnitinmmm psg', 'upload/blog2.jpg', '      bbvcbcvbcvbcvb          ', '2017-08-13 18:42:44', '4', 'Business', 'yes', 'no', 'no', ''),
(78, 'neymar jrcxcxcxzc', 'upload/ga2.jpg', '   bbvcbcvbcvbcvb    ', '2017-08-13 18:56:27', '1', 'Business', 'yes', 'no', 'no', 'nitin'),
(82, 'neymar jr', 'upload/ga5.jpg', '   bbvcbcvbcvbcvb    ', '2017-08-14 17:24:48', '4', 'Business', 'yes', 'no', 'no', 'moon'),
(83, 'neymar jr psg', 'upload/pro4.jpg', '   bbvcbcvbcvbcvb    ', '2017-08-14 17:25:50', '4', 'Business', 'yes', 'no', 'no', 'moon'),
(84, 'Why Delhiâ€™s odd-even plan failed in its stated goals, and the way forward for Kejriwal', 'upload/pro1.jpg', '<a pg=\"Blog_Cat_Times Impact_Blog_Pos#4\" href=\"http://blogs.economictimes.indiatimes.com/GreyMatters/why-delhis-odd-even-plan-failed-in-its-stated-goals-and-the-way-forward-for-kejriwal/\" title=\"Go to Why Delhiâ€™s odd-even plan failed in its stated goals, and the way forward for Kejriwal\" style=\"background-color: rgb(255, 255, 255); max-width: 100%; color: rgb(102, 102, 85) !important;\"><h5 style=\"margin-bottom: 0px; max-width: 100%; height: auto !important;\"><font size=\"3\" style=\"\" face=\"helvetica\">If implementation was the goal, then the Delhi governmentâ€™s odd-even plan could be described as something of a runaway success. High fines, a hyper-vigilant police force and the short period of enforcement contributed to itsâ€¦</font></h5></a> ', '2017-08-15 13:59:42', '3', 'Education', 'yes', 'no', 'no', 'viplav');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role`, `role_name`) VALUES
(1, 'admin'),
(2, 'editor'),
(3, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `u_id` int(10) NOT NULL,
  `u_fname` varchar(30) NOT NULL,
  `u_lname` varchar(30) NOT NULL,
  `u_email` varchar(30) NOT NULL,
  `u_password` varchar(20) NOT NULL,
  `u_mob_no` bigint(20) NOT NULL,
  `u_dob` varchar(20) NOT NULL,
  `u_gender` varchar(20) NOT NULL,
  `u_city` varchar(30) NOT NULL,
  `u_address` varchar(40) NOT NULL,
  `u_image` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `verified` varchar(15) NOT NULL DEFAULT 'no',
  `block` varchar(15) NOT NULL DEFAULT 'no',
  `is_delete` varchar(15) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_password`, `u_mob_no`, `u_dob`, `u_gender`, `u_city`, `u_address`, `u_image`, `role`, `verified`, `block`, `is_delete`) VALUES
(1, 'nitin', 'jordan', 'nitin@gmail.com', '1234', 8602102117, '23/05/97', 'male', 'hyd', 'bhilai', 'upload/img3.jpg', 'admin', 'yes', 'no', '0'),
(3, 'viplav', 'sahu', 'viplav@gmail.com', 'viplav', 9424108445, '19/02/1995', 'male', 'mumbai', 'church gate , mumbai', 'upload/img2.jpg', 'user', 'yes', 'no', '0'),
(4, 'moon', 'daw', 'moondaw@gmail.com', 'moon', 7587224218, '15/08/1996', 'female', 'mumbai', 'street-4 sector-6 ,pune', 'upload/ga5.jpg', 'user', 'yes', 'no', '0'),
(5, 'Winsor', 'Sins', 'winsorsins@gmail.com', 'winsor', 7587224218, '19/02/1995', 'male', 'mumbai', 'Navi Mumbai', '', 'user', 'no', 'yes', '0'),
(6, 'Magnetic', 'Soler', 'magnetic@gmail.com', 'magnetic', 8317968845, '17/9/1999', 'male', 'pune', 'Pune', 'upload/blog1.jpg', 'user', 'no', 'yes', '0'),
(9, 'optimus', 'infot', 'optimus@gmail.com', '123', 9424108445, '19/02/1995', 'male', 'hyd', 'sector -10', '', 'user', 'no', 'no', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `blog_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
