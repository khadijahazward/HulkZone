-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 07:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hulkzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `members_table`
--

CREATE TABLE `members_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `plan` varchar(10) NOT NULL,
  `profile_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_table`
--

INSERT INTO `members_table` (`id`, `name`, `gender`, `contact`, `plan`, `profile_link`) VALUES
(1, 'Nicky', 'Female', '0712016545', '2', 'http://localhost/hulkzone/img/profile-icon.png'),
(2, 'Leonard', 'Male', '0712016523', '1', 'http://localhost/hulkzone/img/profile-icon.png'),
(3, 'Lily', 'Female', '0712016545', '4', 'http://localhost/hulkzone/img/profile-icon.png'),
(4, 'James', 'Male', '0712016545', '2', 'http://localhost/hulkzone/img/profile-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `fullname`, `email`, `contact`, `password`) VALUES
(1, 'Conan James', 'james@gmail.com', 712016545, '202cb962ac59075b964b07152d234b70'),
(2, 'Admin', 'admin@gmail.com', 712016545, '21232f297a57a5a743894a0e4a801fc3'),
(3, 'Eshitha Suradin', 'eshitha@gmail.com', 712016545, '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members_table`
--
ALTER TABLE `members_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members_table`
--
ALTER TABLE `members_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
