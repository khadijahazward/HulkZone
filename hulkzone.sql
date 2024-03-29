-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 09:34 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.12

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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatID` int NOT NULL,
  `senderID` int NOT NULL,
  `receiverID` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatID`, `senderID`, `receiverID`, `message`, `dateTime`, `status`) VALUES
(23, 122, 86, 'Hi', '2023-04-21 15:33:43', 0),
(24, 86, 122, 'Hi', '2023-04-21 15:54:34', 0),
(29, 86, 122, 'hello how are u ', '2023-05-06 17:00:50', 0),
(30, 122, 86, 'did you try all the supplements ', '2023-05-06 17:02:26', 0),
(31, 86, 122, 'yes i did ', '2023-05-07 16:04:23', 0),
(32, 86, 122, 'i feel that i am allergic to the breakfast suggested, please change it ', '2023-05-07 16:04:46', 0),
(35, 86, 122, 'Hi', '2023-05-09 06:13:12', 0),
(40, 141, 122, 'Hi', '2023-05-15 09:28:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int NOT NULL,
  `subject` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dateReported` date NOT NULL,
  `actionTaken` text COLLATE utf8mb4_general_ci,
  `userID` int NOT NULL,
  `evidence` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `subject`, `description`, `status`, `dateReported`, `actionTaken`, `userID`, `evidence`) VALUES
(46, 'good morning', 'hi', 'Filed', '2023-05-18', NULL, 86, NULL),
(47, 'hi', 'good morning', 'Filed', '2023-05-18', NULL, 86, 'C:/xampp/htdocs/HulkZone/Complaintevidence/86_1684395113.png');

-- --------------------------------------------------------

--
-- Table structure for table `dieticianappointment`
--

CREATE TABLE `dieticianappointment` (
  `employeeID` int NOT NULL,
  `memberID` int DEFAULT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dieticianappointment`
--

INSERT INTO `dieticianappointment` (`employeeID`, `memberID`, `date`, `startTime`, `endTime`, `status`) VALUES
(8, NULL, '2023-04-10', '2023-04-10 08:00:00', '2023-04-10 09:00:00', '0'),
(8, NULL, '2023-04-11', '2023-04-11 09:00:00', '2023-04-11 10:00:00', '0'),
(8, NULL, '2023-04-11', '2023-04-11 22:00:00', '2023-04-11 23:00:00', '0'),
(8, NULL, '2023-04-12', '2023-04-12 10:00:00', '2023-04-12 11:00:00', '0'),
(8, 41, '2023-04-13', '2023-04-13 14:00:00', '2023-04-13 15:00:00', '1'),
(8, NULL, '2023-04-13', '2023-04-13 16:00:00', '2023-04-13 17:00:00', '0'),
(8, NULL, '2023-04-14', '2023-04-14 12:00:00', '2023-04-14 13:00:00', '0'),
(8, NULL, '2023-04-15', '2023-04-15 15:00:00', '2023-04-15 16:00:00', '0'),
(8, NULL, '2023-04-16', '2023-04-16 12:00:00', '2023-04-16 13:00:00', '1'),
(8, NULL, '2023-04-16', '2023-04-16 13:00:00', '2023-04-16 14:00:00', '0'),
(8, NULL, '2023-04-16', '2023-04-16 16:00:00', '2023-04-16 17:00:00', '0'),
(8, NULL, '2023-04-16', '2023-04-16 18:00:00', '2023-04-16 19:00:00', '0'),
(10, NULL, '2023-04-17', '2023-04-17 08:00:00', '2023-04-17 09:00:00', '0'),
(10, NULL, '2023-04-17', '2023-04-17 10:00:00', '2023-04-17 11:00:00', '0'),
(10, NULL, '2023-04-17', '2023-04-17 12:00:00', '2023-04-17 13:00:00', '0'),
(10, NULL, '2023-04-18', '2023-04-18 08:00:00', '2023-04-18 09:00:00', '0'),
(10, NULL, '2023-04-18', '2023-04-18 10:00:00', '2023-04-18 11:00:00', '0'),
(10, NULL, '2023-04-18', '2023-04-18 12:00:00', '2023-04-18 13:00:00', '0'),
(10, NULL, '2023-04-19', '2023-04-19 08:00:00', '2023-04-19 09:00:00', '0'),
(10, NULL, '2023-04-19', '2023-04-19 10:00:00', '2023-04-19 11:00:00', '0'),
(10, NULL, '2023-04-19', '2023-04-19 12:00:00', '2023-04-19 13:00:00', '0'),
(10, NULL, '2023-04-20', '2023-04-20 08:00:00', '2023-04-20 09:00:00', '0'),
(10, NULL, '2023-04-20', '2023-04-20 10:00:00', '2023-04-20 11:00:00', '0'),
(10, NULL, '2023-04-20', '2023-04-20 12:00:00', '2023-04-20 13:00:00', '0'),
(10, NULL, '2023-04-21', '2023-04-21 08:00:00', '2023-04-21 09:00:00', '0'),
(10, NULL, '2023-04-21', '2023-04-21 10:00:00', '2023-04-21 11:00:00', '0'),
(10, NULL, '2023-04-21', '2023-04-21 12:00:00', '2023-04-21 13:00:00', '0'),
(10, NULL, '2023-04-22', '2023-04-22 08:00:00', '2023-04-22 09:00:00', '0'),
(10, NULL, '2023-04-22', '2023-04-22 10:00:00', '2023-04-22 11:00:00', '0'),
(10, NULL, '2023-04-22', '2023-04-22 12:00:00', '2023-04-22 13:00:00', '0'),
(10, NULL, '2023-04-23', '2023-04-23 08:00:00', '2023-04-23 09:00:00', '0'),
(10, NULL, '2023-04-23', '2023-04-23 10:00:00', '2023-04-23 11:00:00', '0'),
(10, NULL, '2023-04-23', '2023-04-23 12:00:00', '2023-04-23 13:00:00', '0'),
(10, 41, '2023-05-07', '2023-05-07 10:00:00', '2023-05-07 11:00:00', '1'),
(10, 41, '2023-05-09', '2023-05-09 14:00:00', '2023-05-09 15:00:00', '1'),
(10, NULL, '2023-05-15', '2023-05-15 08:00:00', '2023-05-15 09:00:00', '0'),
(10, NULL, '2023-05-15', '2023-05-15 10:00:00', '2023-05-15 11:00:00', '0'),
(10, NULL, '2023-05-15', '2023-05-15 12:00:00', '2023-05-15 13:00:00', '0'),
(10, 70, '2023-05-16', '2023-05-16 12:00:00', '2023-05-16 13:00:00', '1'),
(10, NULL, '2023-05-16', '2023-05-16 14:00:00', '2023-05-16 15:00:00', '0'),
(10, NULL, '2023-05-17', '2023-05-17 10:00:00', '2023-05-17 11:00:00', '0'),
(10, NULL, '2023-05-17', '2023-05-17 14:00:00', '2023-05-17 15:00:00', '0'),
(10, NULL, '2023-05-18', '2023-05-18 10:00:00', '2023-05-18 11:00:00', '0'),
(10, NULL, '2023-05-18', '2023-05-18 12:00:00', '2023-05-18 13:00:00', '0'),
(10, NULL, '2023-05-19', '2023-05-19 11:00:00', '2023-05-19 12:00:00', '0'),
(10, NULL, '2023-05-19', '2023-05-19 12:00:00', '2023-05-19 13:00:00', '0'),
(10, NULL, '2023-05-19', '2023-05-19 15:00:00', '2023-05-19 16:00:00', '0'),
(10, NULL, '2023-05-20', '2023-05-20 09:00:00', '2023-05-20 10:00:00', '0'),
(10, NULL, '2023-05-20', '2023-05-20 12:00:00', '2023-05-20 13:00:00', '0'),
(10, NULL, '2023-05-20', '2023-05-20 15:00:00', '2023-05-20 16:00:00', '0'),
(10, NULL, '2023-05-21', '2023-05-21 09:00:00', '2023-05-21 10:00:00', '0'),
(10, NULL, '2023-05-21', '2023-05-21 14:00:00', '2023-05-21 15:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `dietplan`
--

CREATE TABLE `dietplan` (
  `diet_id` int NOT NULL,
  `employeeID` int NOT NULL,
  `memberID` int NOT NULL,
  `startDate` datetime NOT NULL,
  `breakfastMeal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `breakfastQty` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `breakfastCal` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lunchMeal` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `lunchQty` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lunchCal` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dinnerMeal` text COLLATE utf8mb4_general_ci NOT NULL,
  `dinnerQty` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `dinnerCal` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `day` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietplan`
--

INSERT INTO `dietplan` (`diet_id`, `employeeID`, `memberID`, `startDate`, `breakfastMeal`, `breakfastQty`, `breakfastCal`, `lunchMeal`, `lunchQty`, `lunchCal`, `dinnerMeal`, `dinnerQty`, `dinnerCal`, `day`) VALUES
(1, 10, 41, '2023-04-11 14:38:05', 'Meat', '01 Bowl', '100', 'pineapple juice', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 1),
(2, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 2),
(3, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 3),
(4, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 4),
(5, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 5),
(6, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 6),
(7, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 7),
(8, 10, 65, '2023-05-10 12:44:50', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable soup', '01 Bowl', '100', 1),
(9, 10, 65, '2023-05-10 12:44:50', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 2),
(10, 10, 65, '2023-05-10 12:44:50', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 3),
(11, 10, 65, '2023-05-10 12:44:50', 'Meat', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 4),
(12, 10, 65, '2023-05-10 12:44:50', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 5),
(13, 10, 65, '2023-05-10 12:44:50', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 6),
(14, 10, 65, '2023-05-10 12:44:50', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 7),
(15, 10, 70, '2023-05-16 09:29:05', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 'Oats', '01 Bowl', '100', 1),
(16, 10, 70, '2023-05-16 09:29:05', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 2),
(17, 10, 70, '2023-05-16 09:29:05', 'oats', '1 bowl', '100', 'oats', '1 bowl', '100', 'oats', '1 bowl', '100', 3),
(18, 10, 70, '2023-05-16 09:29:05', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 4),
(19, 10, 70, '2023-05-16 09:29:05', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 5),
(20, 10, 70, '2023-05-16 09:29:05', 'oals', '01 bowl', '100', 'oals', '01 bowl', '100', 'oals', '01 bowl', '100', 6),
(21, 10, 70, '2023-05-16 09:29:05', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 'oats', '01 bowl', '100', 7);

-- --------------------------------------------------------

--
-- Table structure for table `diet_plan_status`
--

CREATE TABLE `diet_plan_status` (
  `statusID` int NOT NULL,
  `member_id` int NOT NULL,
  `CompletedDate` date NOT NULL,
  `status` int NOT NULL,
  `dietID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet_plan_status`
--

INSERT INTO `diet_plan_status` (`statusID`, `member_id`, `CompletedDate`, `status`, `dietID`) VALUES
(1, 41, '2023-04-11', 1, 1),
(2, 41, '2023-04-12', 1, 2),
(3, 41, '2023-04-13', 1, 3),
(4, 41, '2023-04-14', 1, 4),
(5, 41, '2023-04-15', 1, 5),
(6, 41, '2023-04-16', 1, 6),
(8, 41, '2023-04-17', 1, 1),
(9, 41, '2023-04-18', 1, 2),
(11, 41, '2023-04-24', 1, 1),
(12, 41, '2023-04-25', 1, 2),
(13, 41, '2023-04-26', 1, 3),
(14, 41, '2023-04-27', 1, 4),
(18, 41, '2023-04-28', 1, 5),
(19, 41, '2023-05-08', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontact`
--

CREATE TABLE `emergencycontact` (
  `memberID` int NOT NULL,
  `contactName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `relationship` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `streetNumber` text COLLATE utf8mb4_general_ci,
  `addressLine1` text COLLATE utf8mb4_general_ci,
  `addressLine2` text COLLATE utf8mb4_general_ci,
  `city` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergencycontact`
--

INSERT INTO `emergencycontact` (`memberID`, `contactName`, `relationship`, `telephone`, `streetNumber`, `addressLine1`, `addressLine2`, `city`) VALUES
(41, 'Noorah', 'Aunty', 772347317, '23', 'Lorris Road', 'Bambalapitiya', 'Colombo 03');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int NOT NULL,
  `userID` int NOT NULL,
  `noOfYearsOfExperience` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `avgRating` double NOT NULL DEFAULT '0',
  `qualification` text COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `userID`, `noOfYearsOfExperience`, `avgRating`, `qualification`, `description`, `language`) VALUES
(5, 99, '05', 0, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(6, 105, '05', 0, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(7, 100, '05', 3, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(8, 101, '05', 0, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(9, 121, '10', 0, 'Bachelor of Arts', 'Chris is a passionate certified personal trainer and group fitness instructor who uses a combination of HIIT and metabolic training and stress management techniques. He’s worked with hundreds of clients, from CEOs to professional athletes–and everyone in between.   A recent client explained, “Chris’s knowledge, support, and personality makes his methods challenging but rewarding. He helps you achieve desired results without boredom or burnout.” ', 'sinhala'),
(10, 122, '3', 3, 'BSc. in Arts', 'Hi!  I’m a vegan registered dietitian nutritionist, and I created VeganCoach.com to empower people to optimize their health using a vegan diet. My paid coaching program sponsors this account for aspiring vegans, the Vegan Coach', 'sinhala'),
(11, 126, '3', 0, 'none', 'none', 'sinhala'),
(12, 127, '10', 0, 'Experienced trainer', 'jolly fun filled sessions ', 'sinhala'),
(13, 129, '', 0, '', '', 'sinhala'),
(14, 130, '4', 0, 'Undergraduate', '', 'sinhala'),
(24, 155, '', 0, 'Certified Personal Trainer (CPT)', 'Experienced trainer with a focus on strength training and weight loss.', 'English,Sinhala,Tamil');

-- --------------------------------------------------------

--
-- Table structure for table `employeeservice`
--

CREATE TABLE `employeeservice` (
  `serviceID` int NOT NULL,
  `employeeID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeeservice`
--

INSERT INTO `employeeservice` (`serviceID`, `employeeID`) VALUES
(1, 5),
(2, 5),
(2, 6),
(1, 7),
(2, 7),
(4, 7),
(3, 8),
(1, 9),
(2, 9),
(4, 9),
(3, 10),
(3, 11),
(4, 14),
(1, 24),
(2, 24),
(4, 24);

-- --------------------------------------------------------

--
-- Table structure for table `gymuseappointment`
--

CREATE TABLE `gymuseappointment` (
  `appointmentID` int NOT NULL,
  `date` date NOT NULL,
  `memberID` int NOT NULL,
  `slotID` int NOT NULL,
  `attendance` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gymuseappointment`
--

INSERT INTO `gymuseappointment` (`appointmentID`, `date`, `memberID`, `slotID`, `attendance`) VALUES
(15, '2023-02-17', 41, 1, 0),
(16, '2023-02-19', 41, 1, 0),
(17, '2023-02-20', 41, 2, 0),
(18, '2023-02-22', 41, 1, 0),
(28, '2023-02-26', 41, 1, 0),
(29, '2023-02-28', 41, 1, 1),
(30, '2023-03-01', 41, 1, 1),
(31, '2023-03-05', 41, 2, 1),
(32, '2023-03-02', 41, 1, 0),
(33, '2023-04-11', 41, 1, 0),
(34, '2023-04-16', 41, 2, 0),
(35, '2023-05-07', 41, 1, 0),
(37, '2023-05-14', 41, 1, 0),
(40, '2023-05-16', 70, 5, 0),
(41, '2023-05-17', 70, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicalform`
--

CREATE TABLE `medicalform` (
  `memberID` int NOT NULL,
  `isFatigue` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `isSmoke` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `existing_conditions` text COLLATE utf8mb4_general_ci NOT NULL,
  `isInjury` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `allergies` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalform`
--

INSERT INTO `medicalform` (`memberID`, `isFatigue`, `isSmoke`, `existing_conditions`, `isInjury`, `allergies`) VALUES
(41, 'Yes', 'No', 'Swelling_of_Ankles,High_cholesterol,Chest_Pains,Low_blood_pressure,High_blood_pressure', 'Yes', 'env');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int NOT NULL,
  `userID` int NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `planType` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `userID`, `height`, `weight`, `planType`) VALUES
(41, 86, 152, 48, 'sixMonth'),
(62, 138, 10, 10, 'oneMonth'),
(63, 139, 0, 0, 'oneMonth'),
(64, 140, 0, 0, 'twelveMonth'),
(65, 141, 12.3, 0, 'sixMonth'),
(66, 147, 0, 0, 'sixMonth'),
(70, 156, 0, 0, 'threeMonth');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationsID` int NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `type` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationsID`, `message`, `created_at`, `type`) VALUES
(1, 'Gym is closed today after4.00p.m', '2023-03-02 08:29:45', 0),
(5, 'Keep the gym clean', '2023-03-02 13:27:04', 0),
(23, 'Your membership plan will expire in 3 days.', '2023-03-03 11:02:44', 2),
(30, 'Member ID 41 membership plan has expired. The Account Has Been Disabled.', '2023-03-03 12:10:29', 2),
(32, 'Member ID 41 Has Selected You to Train Them for Diet Service', '2023-03-11 12:52:44', 3),
(33, 'Member ID 41 Has Selected You to Train Them for Diet Service', '2023-04-11 14:38:05', 3),
(34, 'Your complaint is ignored. Subject: my data is upset, Date Reported: 2023-03-09', '2023-05-06 14:01:30', 2),
(61, 'There is an active appointment for Member ID 41  on 2023-05-07 at 10:00:00 - 11:00:00.', '2023-05-07 20:50:42', 4),
(62, 'There is an active appointment for Member ID 41  on 2023-05-07 at 08:00:00 - 10:00:00.', '2023-05-07 20:58:05', 4),
(63, 'Congratulations on completing the Strength service! We hope that it was a valuable experience for you and we look forward to serving you again in the future.', '2023-02-22 13:45:34', 3),
(66, 'Congratulations on completing the Diet service! We hope that it was a valuable experience for you and we look forward to serving you again in the future.', '2022-12-01 13:48:14', 3),
(67, 'We will fix the issue within 2 days', '2023-05-09 11:06:09', 1),
(68, 'Your complaint is ignored. Subject: i got beaten from my trainer, Date Reported: 2023-02-19', '2023-05-09 11:07:16', 2),
(70, 'Gym will not be closed today after4.00p.m', '2023-05-09 11:11:40', 0),
(71, 'There is an active appointment for Member ID 41  on 2023-05-09 at 09:00:00 - 10:00:00.', '2023-05-09 08:05:04', 4),
(72, 'Your dietician has updated your diet plan', '2023-05-09 11:53:19', 2),
(73, 'Member ID 65 Has Selected You to Train Them for CrossFit Service', '2023-05-09 13:08:13', 3),
(74, 'Member ID 65 Has Selected You to Train Them for Diet Service', '2023-05-09 13:11:08', 3),
(75, 'Member ID 65 Has Selected You to Train Them for Diet Service', '2023-05-09 19:13:06', 3),
(76, 'Member ID 65 Has Selected You to Train Them for CrossFit Service', '2023-05-10 12:34:03', 3),
(77, 'Member ID 65 Has Selected You to Train Them for Diet Service', '2023-05-10 12:44:50', 3),
(78, 'Your membership plan will expire in 2 days.', '2023-05-13 17:04:30', 2),
(79, 'There is an active appointment for Member ID 41  on 2023-05-14 at 08:00:00 - 10:00:00.', '2023-05-14 17:07:54', 4),
(80, 'MAchine fixed', '2023-05-15 14:08:56', 1),
(81, 'Your complaint is ignored. Subject: Gym Equipment is broken., Date Reported: 2023-05-10', '2023-05-15 14:09:37', 1),
(83, 'Ignore the previously posted announcement.Announcement:Gym closed tomorrow 16th May,Posted on:2023-05-15 14:10:06', '2023-05-15 14:10:55', 0),
(84, 'Keep the gym clean for sure', '2023-05-15 14:12:08', 0),
(85, 'Member ID 69 Has Selected You to Train Them for Strength Service', '2023-05-15 14:18:56', 3),
(86, 'Member ID 69 Has Selected You to Train Them for Diet Service', '2023-05-15 14:20:15', 3),
(87, 'Member ID 69 Has Selected You to Train Them for CrossFit Service', '2023-05-15 14:29:13', 3),
(88, 'There is an active appointment for Member ID 69  on 2023-05-15 at 10:00:00 - 12:00:00.', '2023-05-15 11:06:12', 4),
(89, 'There is an active appointment for Member ID 69  on 2023-05-17 at 12:00:00 - 14:00:00.', '2023-05-15 11:08:29', 4),
(90, 'Your dietician has created your diet plan', '2023-05-15 14:53:54', 2),
(91, 'Fixed the damage and sorry for the inconc=venience', '2023-05-16 09:22:22', 1),
(93, 'Soory.GYm wil be closed tomorrow on 17th MAy.', '2023-05-16 09:23:48', 0),
(94, 'Ignore the previously posted announcement.Announcement:GYm wil be closed tomorrow on 17th MAy.,Posted on:2023-05-16 09:23:05', '2023-05-16 09:24:13', 0),
(95, 'Member ID 70 Has Selected You to Train Them for CrossFit Service', '2023-05-16 09:28:18', 3),
(96, 'Member ID 70 Has Selected You to Train Them for Diet Service', '2023-05-16 09:29:05', 3),
(97, 'There is an active appointment for Member ID 70  on 2023-05-16 at 12:00:00 - 13:00:00.', '2023-05-16 06:00:59', 4),
(98, 'There is an active appointment for Member ID 70  on 2023-05-16 at 16:00:00 - 18:00:00.', '2023-05-16 06:05:58', 4),
(99, 'Your dietician has created your diet plan', '2023-05-16 09:40:23', 2),
(100, 'There is an active appointment for Member ID 70  on 2023-05-17 at 12:00:00 - 14:00:00.', '2023-05-16 06:37:33', 4);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int NOT NULL,
  `paymentDate` datetime NOT NULL,
  `amount` double NOT NULL,
  `type` int NOT NULL,
  `memberID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `paymentDate`, `amount`, `type`, `memberID`) VALUES
(1, '2022-08-22 18:14:48', 10000, 4, 41),
(16, '2023-03-11 09:40:21', 10000, 2, 41),
(22, '2023-03-12 19:48:33', 5600, 0, 41),
(23, '2023-04-11 14:38:05', 10000, 3, 41),
(28, '2023-05-10 12:34:03', 10000, 1, 65),
(29, '2023-05-10 12:44:50', 10000, 3, 65),
(30, '2023-05-11 15:30:59', 5600, 0, 65),
(31, '2023-05-13 18:57:33', 11000, 0, 64),
(35, '2023-05-16 09:28:18', 10000, 1, 70),
(36, '2023-05-16 09:29:05', 10000, 3, 70);

-- --------------------------------------------------------

--
-- Table structure for table `paymentplan`
--

CREATE TABLE `paymentplan` (
  `planID` int NOT NULL,
  `memberID` int NOT NULL,
  `expiryDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentplan`
--

INSERT INTO `paymentplan` (`planID`, `memberID`, `expiryDate`) VALUES
(6, 41, '2023-06-14 15:45:06'),
(16, 41, '2023-12-14 15:45:06'),
(21, 62, '2023-06-05 00:00:00'),
(22, 63, '2023-06-05 00:00:00'),
(23, 64, '2024-05-05 00:00:00'),
(24, 65, '2023-11-05 00:00:00'),
(25, 66, '2023-11-08 00:00:00'),
(29, 65, '2024-05-05 00:00:00'),
(30, 64, '2025-05-05 00:00:00'),
(32, 70, '2023-08-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int NOT NULL,
  `serviceName` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `servicePeriod` int NOT NULL,
  `servicePrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceID`, `serviceName`, `servicePeriod`, `servicePrice`) VALUES
(1, 'CrossFit', 6, 10000),
(2, 'BodyBuilding', 6, 10000),
(3, 'Diet', 6, 10000),
(4, 'Strength', 6, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `servicecharge`
--

CREATE TABLE `servicecharge` (
  `memberID` int NOT NULL,
  `paymentID` int NOT NULL,
  `serviceID` int NOT NULL,
  `employeeID` int NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `rate` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicecharge`
--

INSERT INTO `servicecharge` (`memberID`, `paymentID`, `serviceID`, `employeeID`, `startDate`, `endDate`, `rate`) VALUES
(41, 1, 3, 10, '2022-06-01 13:48:14', '2022-12-01 13:48:14', 3),
(41, 16, 4, 9, '2023-03-11 09:40:21', '2023-09-11 09:40:21', 0),
(41, 23, 3, 10, '2023-04-11 14:38:05', '2023-10-11 14:38:05', 0),
(65, 1, 4, 9, '2023-01-23 13:45:34', '2023-06-23 13:45:34', 1),
(65, 29, 3, 10, '2023-05-10 12:44:50', '2023-11-10 12:44:50', 0),
(70, 35, 1, 24, '2023-05-16 09:28:18', '2023-11-16 09:28:18', 0),
(70, 36, 3, 10, '2023-05-16 09:29:05', '2023-11-16 09:29:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slotID` int NOT NULL,
  `sTime` time NOT NULL,
  `eTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`slotID`, `sTime`, `eTime`) VALUES
(1, '08:00:00', '10:00:00'),
(2, '10:00:00', '12:00:00'),
(3, '12:00:00', '14:00:00'),
(4, '14:00:00', '16:00:00'),
(5, '16:00:00', '18:00:00'),
(6, '18:00:00', '20:00:00'),
(7, '20:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplement`
--

CREATE TABLE `supplement` (
  `supplementID` int NOT NULL,
  `employeeID` int NOT NULL,
  `memberID` int NOT NULL,
  `startDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplement`
--

INSERT INTO `supplement` (`supplementID`, `employeeID`, `memberID`, `startDate`) VALUES
(19, 10, 41, '2023-04-11 14:38:05'),
(20, 10, 65, '2023-05-10 12:44:50'),
(20, 10, 70, '2023-05-16 09:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `supplementlist`
--

CREATE TABLE `supplementlist` (
  `supplementID` int NOT NULL,
  `supplementName` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `supplementType` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `supplementPhoto` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplementlist`
--

INSERT INTO `supplementlist` (`supplementID`, `supplementName`, `supplementType`, `supplementPhoto`) VALUES
(18, 'Animal Cuts', 'Fat Burner', '../supplement/AnimalCuts.png'),
(19, 'Critical Mass', 'Mass Gainers', '../supplement/CriticalMass.png'),
(20, 'Critical Whey', 'Protein', '../supplement/CriticalWhey.png'),
(21, 'ASSAULT', 'Pre workout', '../supplement/ASSAULT.png'),
(22, 'Gat Liver Cleanse', 'Vitamin', '../supplement/GatLiverCleanse.png'),
(23, 'protien pro', 'protien shake', '../supplement/protienpro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `availableID` int NOT NULL,
  `weekDayID` int NOT NULL,
  `slotID` int NOT NULL,
  `availableSlots` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`availableID`, `weekDayID`, `slotID`, `availableSlots`) VALUES
(1, 1, 1, 10),
(2, 1, 2, 10),
(3, 1, 3, 10),
(4, 1, 4, 10),
(5, 1, 5, 10),
(6, 1, 6, 10),
(7, 1, 7, 10),
(8, 2, 1, 10),
(9, 2, 2, 10),
(10, 2, 3, 10),
(11, 2, 4, 10),
(12, 2, 5, 9),
(13, 2, 6, 10),
(14, 2, 7, 10),
(15, 3, 1, 10),
(16, 3, 2, 10),
(17, 3, 3, 9),
(18, 3, 4, 10),
(19, 3, 5, 10),
(20, 3, 6, 10),
(21, 3, 7, 10),
(22, 4, 1, 10),
(23, 4, 2, 10),
(24, 4, 3, 10),
(25, 4, 4, 10),
(26, 4, 5, 10),
(27, 4, 6, 10),
(28, 4, 7, 10),
(29, 5, 1, 10),
(30, 5, 2, 10),
(31, 5, 3, 10),
(32, 5, 4, 10),
(33, 5, 5, 10),
(34, 5, 6, 10),
(35, 5, 7, 10),
(36, 6, 1, 10),
(37, 6, 2, 10),
(38, 6, 3, 10),
(39, 6, 4, 10),
(40, 6, 5, 10),
(41, 6, 6, 10),
(42, 6, 7, 10),
(43, 7, 1, 10),
(44, 7, 2, 10),
(45, 7, 3, 10),
(46, 7, 4, 10),
(47, 7, 5, 10),
(48, 7, 6, 10),
(49, 7, 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `trainerappointment`
--

CREATE TABLE `trainerappointment` (
  `employeeID` int NOT NULL,
  `memberID` int DEFAULT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainerappointment`
--

INSERT INTO `trainerappointment` (`employeeID`, `memberID`, `date`, `startTime`, `endTime`, `status`) VALUES
(7, NULL, '2023-04-15', '2023-04-15 20:00:00', '2023-04-15 22:00:00', '0'),
(7, 41, '2023-04-16', '2023-04-16 10:00:00', '2023-04-16 12:00:00', '1'),
(7, NULL, '2023-04-16', '2023-04-16 12:00:00', '2023-04-16 14:00:00', '0'),
(9, 41, '2023-05-07', '2023-05-07 08:00:00', '2023-05-07 10:00:00', '1'),
(9, NULL, '2023-05-08', '2023-05-08 08:00:00', '2023-05-08 10:00:00', '0'),
(9, NULL, '2023-05-09', '2023-05-09 10:00:00', '2023-05-09 12:00:00', '0'),
(24, 70, '2023-05-16', '2023-05-16 16:00:00', '2023-05-16 18:00:00', '1'),
(24, 70, '2023-05-17', '2023-05-17 12:00:00', '2023-05-17 14:00:00', '1'),
(24, NULL, '2023-05-18', '2023-05-18 14:00:00', '2023-05-18 16:00:00', '0'),
(24, NULL, '2023-05-19', '2023-05-19 16:00:00', '2023-05-19 18:00:00', '0'),
(24, NULL, '2023-05-20', '2023-05-20 16:00:00', '2023-05-20 18:00:00', '0'),
(24, NULL, '2023-05-21', '2023-05-21 18:00:00', '2023-05-21 20:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `fName` text COLLATE utf8mb4_general_ci NOT NULL,
  `lName` text COLLATE utf8mb4_general_ci NOT NULL,
  `NIC` text COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `profilePhoto` text COLLATE utf8mb4_general_ci,
  `dateOfBirth` date NOT NULL,
  `roles` int NOT NULL,
  `statuses` int NOT NULL,
  `contactNumber` int NOT NULL,
  `streetNumber` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `addressLine01` text COLLATE utf8mb4_general_ci,
  `addressLine02` text COLLATE utf8mb4_general_ci,
  `city` text COLLATE utf8mb4_general_ci,
  `pw` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fName`, `lName`, `NIC`, `gender`, `profilePhoto`, `dateOfBirth`, `roles`, `statuses`, `contactNumber`, `streetNumber`, `addressLine01`, `addressLine02`, `city`, `pw`, `created_at`, `email`) VALUES
(86, 'Khadijah', 'Azward', '123456789V', 'Female', '../profileImages/86.jpeg', '2004-12-07', 1, 1, 1234567890, '23', 'flower street', 'gangarama', 'colombo  08', '$2y$10$K/k368JHKud/oLX8Fk0i9.Rd8vOKf3ITQoGhbCntc5PloHZ5qMafG', '2022-12-14', '2020is011@stu.ucsc.cmb.ac.lk'),
(99, 'Kareema', 'Deen', '123456789V', 'Female', NULL, '2021-12-01', 2, 1, 711541753, '', '', '', '', '$2y$10$gZRkdyuzET1oyP7KLaDNReQyhfF/0B4iMRLEPfo.sNSZcpLDVYEnG', '2022-12-16', 'khadijah@gmail.com'),
(100, 'Saitharsan', 'Perera', '123456789012', 'Female', NULL, '2021-12-08', 2, 1, 711541753, '', '', '', '', '$2y$10$cFBi7soQ/s9j6TbXtFASaOm6X.w.Km6x3NvOvwmsLEtlqHDhKBbJu', '2022-12-16', 'saitharsan@gmail.com'),
(101, 'John', 'Andrews', '123456789V', 'Male', NULL, '1999-02-17', 3, 1, 711541654, '', '', '', '', '$2y$10$l4w0IYYMJcry3qGOwu1V9OOE0.aRkopWRgaglrHXheuuTl9eTMrn2', '2023-01-27', 'johnAndrews@gmail.com'),
(105, 'Shanthi', 'Krishnan', '123456789009', 'Male', NULL, '2004-12-15', 2, 1, 1234567890, '', '', '', '', '$2y$10$F3YTzaS6JYEw8G62AppFletRnC9kJKhc/zVOZwW.bow6x7OSPxKl2', '2023-01-31', 'Shanthi99@gmail.com'),
(121, 'Eshitha', 'Kiribathgoda', '123098567432', 'Male', NULL, '2000-02-11', 2, 1, 776094223, '2', 'leyards Broadway', 'colombo', '', '$2y$10$K/k368JHKud/oLX8Fk0i9.Rd8vOKf3ITQoGhbCntc5PloHZ5qMafG', '2023-02-09', 'eshitha@gmail.com'),
(122, 'Kaveesha', 'Gunawardana', '123456789V', 'Male', '../profileImages/122.jpg', '2000-01-01', 3, 1, 711541753, '10', 'flower road', '', 'colombo 10', '$2y$10$1k1YMHHZV9wsUa32vrpX1.idbM09VTEL8csC.c3BGqPD4qoBwfy3S', '2023-02-10', 'kaveeshagunawardana293@gmail.com'),
(125, 'Dhoni', 'Mathews', '123456789V', 'Male', NULL, '2004-12-01', 2, 1, 71145689, '192', 'shoe road', '', 'colombo', '$2y$10$VI/sq8tw741aK2tdnpZS9.PEL8JLN2qvjrAlVd63v/E8p1PpVOpuu', '2023-02-10', 'DhoniCSK@gmail.com'),
(126, 'James', 'Millie', '123456789V', 'Male', NULL, '2004-11-29', 3, 1, 1234567890, '', '', '', '', '$2y$10$mpcJll08KRJ814NC.3oxKeWjUUMjjqVGvgbV1HCri7du5ntUZqY6W', '2023-02-10', 'james@gmail.com'),
(127, 'Juliet ', 'Romeo', '123456789V', 'Female', NULL, '2004-12-01', 2, 1, 115467876, '', '', '', '', '$2y$10$nhnBvpmuRTPQGMejHCfCM.fsK64FyULvN/eKHAKdrB0ZdY1h0WXGS', '2023-02-10', 'juliet@gmail.com'),
(128, 'Fathima', 'Munzira', '985552614V', 'Female', '../profileImages/128.jpg', '2003-10-14', 0, 1, 775067556, '3', 'hemmathagama', 'dhehiwala', 'colombo ', '$2y$10$IV2yurcCXfKQcHoOyaPdAe0XC4ytXbSYs/10zUE1c/P0tXSOJTZfC', '2023-02-10', 'munzirammf0224@gmail.com'),
(129, 'Edward', 'Gardin', '9855546232V', 'Male', NULL, '2004-12-03', 2, 1, 775087334, '3', '', '', 'Colombo', '$2y$10$1hCR19NL/PqarKGzfsLc3eQUNJhI6kRXWIiiz/s/Y9BpBe6KrTtYS', '2023-02-10', 'gardin@gmail.com'),
(130, 'Fathima', 'Shimra', '985552613V', 'Female', NULL, '2004-12-15', 2, 1, 775097556, '2', '', '', '', '$2y$10$WTZ87RckZ5/JN1o0HBJwIev0v1X6tSeoB5Zd/N7qIexoYLwGq.lke', '2023-02-10', 'shim@gmail.com'),
(138, 'Amjad', 'Azward', '123456789V', 'Male', NULL, '2004-12-02', 1, 1, 772347317, '', '', '', '', '$2y$10$U0pRvt1hEJksE93FsEFBReEr2jcIivGOGdSI6HaKOjTB2iT5iC056', '2023-05-05', 'amjad@gmail.com'),
(139, 'Azraar', 'Azward', '123456789122', 'Male', NULL, '1990-01-28', 1, 1, 772347317, '', '', '', '', '$2y$10$VqnD4zENtZrmBkH6QTcZ8uuhYl9D1kLNgcNpKTPRvwfRmnDfu3Loe', '2023-05-05', 'azraar@gmail.com'),
(140, 'Husna', 'Azward', '987654321V', 'Female', NULL, '1978-01-31', 1, 1, 778249346, '', '', '', '', '$2y$10$Xa3sqe/2aG0WYnzFi80SE.jpJyGZmEUv5m/kA7g4D8E0MzpidCx.u', '2023-05-05', 'husna@gmail.com'),
(141, 'Azward', 'Nizar', '123456789V', 'Male', NULL, '1965-02-12', 1, 1, 776006705, '', '', '', '', '$2y$10$K/k368JHKud/oLX8Fk0i9.Rd8vOKf3ITQoGhbCntc5PloHZ5qMafG', '2023-05-05', 'azward@gmail.com'),
(147, 'Zulfa', 'Ameer', '987654567V', 'Female', NULL, '1998-03-18', 1, 1, 775412345, '', '', '', '', '$2y$10$eTxDDIlT0sX0nuliIv/ljOraxLH4ReDkr7fnLGwHJiXUZnqwvqf0m', '2023-05-08', 'zee@gmail.com'),
(155, 'Eshitha', 'kiribathgoa', '985552614V', 'Male', 'http://localhost/hulkzone/trainer/img/155_1684210006.jpg', '2004-12-07', 2, 1, 775067556, '', '', '72', 'Colombo', '$2y$10$x9ax439AJEQzDqaRpLB9PugoUC6/kwDCTmjZ3V/uJSVK6/c/KMtMi', '2023-05-16', 'eshithasuradin123@gmail.com'),
(156, 'Aleena', 'Deen', '655793596V', 'Female', NULL, '2004-10-05', 1, 1, 777007605, '', '', '', '', '$2y$10$nyVYODQw35mWJSvJXdwvQORhNvFAA6j2TpWIgYXoe.bSwRi1Mkn9a', '2023-05-16', 'khadijahazward@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usernotifications`
--

CREATE TABLE `usernotifications` (
  `usernotificationsID` int NOT NULL,
  `userID` int NOT NULL,
  `notificationsID` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usernotifications`
--

INSERT INTO `usernotifications` (`usernotificationsID`, `userID`, `notificationsID`, `status`) VALUES
(1, 86, 1, 1),
(13, 86, 23, 1),
(16, 128, 30, 0),
(18, 101, 32, 0),
(19, 101, 33, 0),
(20, 86, 34, 1),
(47, 122, 61, 0),
(48, 121, 62, 0),
(49, 86, 63, 1),
(52, 86, 66, 1),
(53, 86, 67, 1),
(54, 86, 68, 1),
(86, 86, 70, 1),
(87, 99, 70, 0),
(88, 100, 70, 0),
(89, 101, 70, 0),
(90, 105, 70, 0),
(91, 121, 70, 0),
(92, 122, 70, 0),
(93, 125, 70, 0),
(94, 126, 70, 0),
(95, 127, 70, 0),
(96, 129, 70, 0),
(97, 130, 70, 0),
(98, 138, 70, 0),
(99, 139, 70, 0),
(100, 140, 70, 1),
(101, 141, 70, 0),
(102, 147, 70, 0),
(117, 122, 71, 0),
(118, 86, 72, 1),
(119, 99, 73, 0),
(120, 122, 74, 0),
(121, 122, 75, 0),
(122, 99, 76, 0),
(123, 122, 77, 0),
(124, 140, 78, 0),
(125, 121, 79, 0),
(126, 86, 80, 1),
(127, 141, 81, 0),
(147, 86, 83, 1),
(148, 99, 83, 0),
(149, 100, 83, 0),
(150, 101, 83, 0),
(151, 105, 83, 0),
(152, 121, 83, 0),
(153, 122, 83, 0),
(154, 125, 83, 0),
(155, 126, 83, 0),
(156, 127, 83, 0),
(157, 129, 83, 0),
(158, 130, 83, 0),
(159, 138, 83, 0),
(160, 139, 83, 0),
(161, 140, 83, 0),
(162, 141, 83, 0),
(163, 147, 83, 0),
(178, 86, 84, 1),
(179, 99, 84, 0),
(180, 100, 84, 0),
(181, 101, 84, 0),
(182, 105, 84, 0),
(183, 121, 84, 0),
(184, 122, 84, 0),
(185, 125, 84, 0),
(186, 126, 84, 0),
(187, 127, 84, 0),
(188, 129, 84, 0),
(189, 130, 84, 0),
(190, 138, 84, 0),
(191, 139, 84, 0),
(192, 140, 84, 0),
(193, 141, 84, 0),
(194, 147, 84, 0),
(197, 121, 85, 0),
(198, 122, 86, 1),
(202, 86, 91, 0),
(221, 86, 93, 0),
(222, 99, 93, 0),
(223, 100, 93, 0),
(224, 101, 93, 0),
(225, 105, 93, 0),
(226, 121, 93, 0),
(227, 122, 93, 0),
(228, 125, 93, 0),
(229, 126, 93, 0),
(230, 127, 93, 0),
(231, 129, 93, 0),
(232, 130, 93, 0),
(233, 138, 93, 0),
(234, 139, 93, 0),
(235, 140, 93, 0),
(236, 141, 93, 0),
(237, 147, 93, 0),
(238, 155, 93, 0),
(239, 86, 94, 0),
(240, 99, 94, 0),
(241, 100, 94, 0),
(242, 101, 94, 0),
(243, 105, 94, 0),
(244, 121, 94, 0),
(245, 122, 94, 0),
(246, 125, 94, 0),
(247, 126, 94, 0),
(248, 127, 94, 0),
(249, 129, 94, 0),
(250, 130, 94, 0),
(251, 138, 94, 0),
(252, 139, 94, 0),
(253, 140, 94, 0),
(254, 141, 94, 0),
(255, 147, 94, 0),
(256, 155, 94, 0),
(270, 155, 95, 0),
(271, 122, 96, 0),
(272, 122, 97, 0),
(273, 155, 98, 0),
(274, 155, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `verify_email`
--

CREATE TABLE `verify_email` (
  `userID` int NOT NULL,
  `verify_status` int NOT NULL DEFAULT '0',
  `token` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verify_email`
--

INSERT INTO `verify_email` (`userID`, `verify_status`, `token`, `timestamp`) VALUES
(86, 1, 504026, '2023-05-13 11:33:39'),
(122, 1, 665188, '2023-05-16 02:43:50'),
(128, 1, 727986, '2023-05-15 09:12:04'),
(138, 1, 987654, '2023-05-08 04:36:07'),
(139, 1, 123456, '2023-05-08 04:36:07'),
(140, 1, 546378, '2023-05-08 04:36:07'),
(141, 1, 262407, '2023-05-08 05:31:41'),
(147, 0, 0, '2023-05-08 08:02:26'),
(156, 1, 886904, '2023-05-16 03:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `weekDayID` int NOT NULL,
  `weekDayName` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`weekDayID`, `weekDayName`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `workoutplan`
--

CREATE TABLE `workoutplan` (
  `workout_id` int NOT NULL,
  `employeeID` int NOT NULL,
  `memberID` int NOT NULL,
  `startDate` datetime NOT NULL,
  `exerciseName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `reps` int NOT NULL,
  `sets` int NOT NULL,
  `day` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workoutplan`
--

INSERT INTO `workoutplan` (`workout_id`, `employeeID`, `memberID`, `startDate`, `exerciseName`, `reps`, `sets`, `day`) VALUES
(114, 9, 41, '2023-03-11 09:40:21', 'Planks', 3, 3, 1),
(115, 9, 41, '2023-03-11 09:40:21', 'Lunge', 4, 3, 1),
(116, 9, 41, '2023-03-11 09:40:21', 'Squats', 3, 3, 1),
(117, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 1),
(118, 9, 41, '2023-03-11 09:40:21', 'frog jumps', 5, 3, 1),
(119, 9, 41, '2023-03-11 09:40:21', 'Single-leg deadlifts', 3, 3, 2),
(120, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 2),
(121, 9, 41, '2023-03-11 09:40:21', 'Side planks', 3, 3, 3),
(122, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 3),
(123, 9, 41, '2023-03-11 09:40:21', 'Overhead dumbbell presses', 3, 3, 4),
(124, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 4),
(125, 9, 41, '2023-03-11 09:40:21', 'Floor Press', 3, 3, 5),
(126, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 5),
(127, 9, 41, '2023-03-11 09:40:21', 'Frog Pumps', 3, 3, 6),
(128, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 6),
(129, 9, 41, '2023-03-11 09:40:21', 'Bar Dips', 3, 3, 7),
(130, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 7),
(131, 9, 41, '2023-03-11 09:40:21', 'Squat', 10, 3, 7),
(134, 9, 65, '2023-01-23 13:45:34', 'planks', 1, 1, 1),
(135, 9, 65, '2023-01-23 13:45:34', 'frogs jump', 1, 1, 7),
(144, 24, 70, '2023-05-16 09:28:18', 'Barbell Squats', 10, 3, 1),
(145, 24, 70, '2023-05-16 09:28:18', 'Deadlifts', 10, 3, 1),
(146, 24, 70, '2023-05-16 09:28:18', 'Deadlifts', 10, 3, 2),
(147, 24, 70, '2023-05-16 09:28:18', 'Bench Press', 12, 3, 2),
(148, 24, 70, '2023-05-16 09:28:18', 'Bench Press', 10, 3, 3),
(149, 24, 70, '2023-05-16 09:28:18', 'Bench Press', 10, 3, 4),
(150, 24, 70, '2023-05-16 09:28:18', 'Bench Press', 10, 3, 5),
(151, 24, 70, '2023-05-16 09:28:18', 'Bench Press', 10, 3, 6),
(152, 24, 70, '2023-05-16 09:28:18', 'Bench Press', 12, 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `workout_plan_status`
--

CREATE TABLE `workout_plan_status` (
  `statusID` int NOT NULL,
  `memberID` int NOT NULL,
  `completedDate` date NOT NULL,
  `status` int NOT NULL,
  `startDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_plan_status`
--

INSERT INTO `workout_plan_status` (`statusID`, `memberID`, `completedDate`, `status`, `startDate`) VALUES
(1, 41, '2023-05-02', 1, '2023-03-11 09:40:21'),
(2, 41, '2023-05-01', 1, '2023-03-11 09:40:21'),
(3, 41, '2023-05-03', 1, '2023-03-11 09:40:21'),
(4, 41, '2023-05-04', 1, '2023-03-11 09:40:21'),
(5, 41, '2023-05-05', 1, '2023-03-11 09:40:21'),
(6, 41, '2023-05-06', 1, '2023-03-11 09:40:21'),
(7, 41, '2023-05-07', 1, '2023-03-11 09:40:21'),
(9, 41, '2023-05-16', 1, '2023-03-11 09:40:21'),
(14, 41, '2023-05-18', 1, '2023-03-11 09:40:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatID`),
  ADD KEY `senderID` (`senderID`,`receiverID`),
  ADD KEY `receiverID` (`receiverID`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaintID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `dieticianappointment`
--
ALTER TABLE `dieticianappointment`
  ADD PRIMARY KEY (`employeeID`,`date`,`startTime`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `dietplan`
--
ALTER TABLE `dietplan`
  ADD PRIMARY KEY (`diet_id`),
  ADD KEY `day` (`day`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `diet_plan_status`
--
ALTER TABLE `diet_plan_status`
  ADD PRIMARY KEY (`statusID`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `dietID` (`dietID`);

--
-- Indexes for table `emergencycontact`
--
ALTER TABLE `emergencycontact`
  ADD PRIMARY KEY (`memberID`,`contactName`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `employeeservice`
--
ALTER TABLE `employeeservice`
  ADD PRIMARY KEY (`serviceID`,`employeeID`),
  ADD KEY `serviceID` (`serviceID`,`employeeID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `gymuseappointment`
--
ALTER TABLE `gymuseappointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `slotID` (`slotID`);

--
-- Indexes for table `medicalform`
--
ALTER TABLE `medicalform`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationsID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `paymentplan`
--
ALTER TABLE `paymentplan`
  ADD PRIMARY KEY (`planID`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `servicecharge`
--
ALTER TABLE `servicecharge`
  ADD PRIMARY KEY (`memberID`,`paymentID`,`serviceID`,`employeeID`),
  ADD KEY `memberID` (`memberID`,`paymentID`,`serviceID`,`employeeID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `paymentID` (`paymentID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slotID`);

--
-- Indexes for table `supplement`
--
ALTER TABLE `supplement`
  ADD PRIMARY KEY (`supplementID`,`employeeID`,`memberID`,`startDate`),
  ADD KEY `supplementID` (`supplementID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `supplementlist`
--
ALTER TABLE `supplementlist`
  ADD PRIMARY KEY (`supplementID`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`availableID`),
  ADD KEY `weekDayID` (`weekDayID`),
  ADD KEY `slotID` (`slotID`);

--
-- Indexes for table `trainerappointment`
--
ALTER TABLE `trainerappointment`
  ADD PRIMARY KEY (`employeeID`,`date`,`startTime`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `usernotifications`
--
ALTER TABLE `usernotifications`
  ADD PRIMARY KEY (`usernotificationsID`),
  ADD KEY `usernotifications_ibfk_1` (`userID`),
  ADD KEY `usernotifications_ibfk_2` (`notificationsID`);

--
-- Indexes for table `verify_email`
--
ALTER TABLE `verify_email`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `weekdays`
--
ALTER TABLE `weekdays`
  ADD PRIMARY KEY (`weekDayID`);

--
-- Indexes for table `workoutplan`
--
ALTER TABLE `workoutplan`
  ADD PRIMARY KEY (`workout_id`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `day` (`day`);

--
-- Indexes for table `workout_plan_status`
--
ALTER TABLE `workout_plan_status`
  ADD PRIMARY KEY (`statusID`),
  ADD KEY `memberID` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `dietplan`
--
ALTER TABLE `dietplan`
  MODIFY `diet_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `diet_plan_status`
--
ALTER TABLE `diet_plan_status`
  MODIFY `statusID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gymuseappointment`
--
ALTER TABLE `gymuseappointment`
  MODIFY `appointmentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `paymentplan`
--
ALTER TABLE `paymentplan`
  MODIFY `planID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slotID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplementlist`
--
ALTER TABLE `supplementlist`
  MODIFY `supplementID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `availableID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `usernotifications`
--
ALTER TABLE `usernotifications`
  MODIFY `usernotificationsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `weekDayID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workoutplan`
--
ALTER TABLE `workoutplan`
  MODIFY `workout_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `workout_plan_status`
--
ALTER TABLE `workout_plan_status`
  MODIFY `statusID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`receiverID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`senderID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dieticianappointment`
--
ALTER TABLE `dieticianappointment`
  ADD CONSTRAINT `dieticianappointment_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dieticianappointment_ibfk_3` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dietplan`
--
ALTER TABLE `dietplan`
  ADD CONSTRAINT `dietplan_ibfk_1` FOREIGN KEY (`day`) REFERENCES `weekdays` (`weekDayID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dietplan_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dietplan_ibfk_3` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diet_plan_status`
--
ALTER TABLE `diet_plan_status`
  ADD CONSTRAINT `diet_plan_status_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diet_plan_status_ibfk_2` FOREIGN KEY (`dietID`) REFERENCES `dietplan` (`diet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emergencycontact`
--
ALTER TABLE `emergencycontact`
  ADD CONSTRAINT `emergencycontact_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employeeservice`
--
ALTER TABLE `employeeservice`
  ADD CONSTRAINT `employeeservice_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employeeservice_ibfk_2` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gymuseappointment`
--
ALTER TABLE `gymuseappointment`
  ADD CONSTRAINT `gymuseappointment_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gymuseappointment_ibfk_2` FOREIGN KEY (`slotID`) REFERENCES `slots` (`slotID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `medicalform`
--
ALTER TABLE `medicalform`
  ADD CONSTRAINT `medicalform_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentplan`
--
ALTER TABLE `paymentplan`
  ADD CONSTRAINT `paymentplan_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicecharge`
--
ALTER TABLE `servicecharge`
  ADD CONSTRAINT `servicecharge_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicecharge_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicecharge_ibfk_3` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicecharge_ibfk_4` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplement`
--
ALTER TABLE `supplement`
  ADD CONSTRAINT `supplement_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplement_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplement_ibfk_3` FOREIGN KEY (`supplementID`) REFERENCES `supplementlist` (`supplementID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD CONSTRAINT `timeslots_ibfk_1` FOREIGN KEY (`weekDayID`) REFERENCES `weekdays` (`weekDayID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timeslots_ibfk_2` FOREIGN KEY (`slotID`) REFERENCES `slots` (`slotID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainerappointment`
--
ALTER TABLE `trainerappointment`
  ADD CONSTRAINT `trainerappointment_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trainerappointment_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usernotifications`
--
ALTER TABLE `usernotifications`
  ADD CONSTRAINT `usernotifications_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usernotifications_ibfk_2` FOREIGN KEY (`notificationsID`) REFERENCES `notifications` (`notificationsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verify_email`
--
ALTER TABLE `verify_email`
  ADD CONSTRAINT `verify_email_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workoutplan`
--
ALTER TABLE `workoutplan`
  ADD CONSTRAINT `workoutplan_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workoutplan_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workoutplan_ibfk_3` FOREIGN KEY (`day`) REFERENCES `weekdays` (`weekDayID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workout_plan_status`
--
ALTER TABLE `workout_plan_status`
  ADD CONSTRAINT `workout_plan_status_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
