-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 10:04 AM
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
  `message` text NOT NULL,
  `dateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatID`, `senderID`, `receiverID`, `message`, `dateTime`, `status`) VALUES
(23, 122, 86, 'Hi', '2023-04-21 15:33:43', 0),
(24, 86, 122, 'Hi', '2023-04-21 15:54:34', 0),
(25, 122, 86, 'Hi', '2023-04-24 15:05:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateReported` date NOT NULL,
  `actionTaken` text,
  `userID` int NOT NULL,
  `evidence` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `subject`, `description`, `status`, `dateReported`, `actionTaken`, `userID`, `evidence`) VALUES
(28, 'Injured in the gym', 'i was working out and then suddenly the equipment fell off from the top and hit my leg.', 'Ignored', '2023-02-15', 'completed', 86, 'C:/xampp/htdocs/HulkZone/Complaintevidence/86_1676437108.jpg'),
(29, 'i got beaten from my trainer', 'i was working out and was exhausted, so I took a rest. suddenly, my trainer came and slapped me.', 'completed', '2023-02-19', 'done', 86, 'C:/xampp/htdocs/HulkZone/Complaintevidence/86_1676804757.jpg'),
(30, 'my data is upset', 'i dont want to work out anymore', 'Filed', '2023-03-09', NULL, 86, 'C:/xampp/htdocs/HulkZone/Complaintevidence/86_1678341333.jpeg');

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
  `status` varchar(100) NOT NULL DEFAULT '0'
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
(8, 41, '2023-04-16', '2023-04-16 12:00:00', '2023-04-16 13:00:00', '1'),
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
(10, NULL, '2023-04-23', '2023-04-23 12:00:00', '2023-04-23 13:00:00', '0');

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
(1, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 1),
(2, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 2),
(3, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 3),
(4, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 4),
(5, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 5),
(6, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 6),
(7, 10, 41, '2023-04-11 14:38:05', 'Oats', '01 Bowl', '100', 'Salad', '01 Bowl', '100', 'Vegetable Soup', '01 Bowl', '100', 7);

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
(18, 41, '2023-04-28', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontact`
--

CREATE TABLE `emergencycontact` (
  `memberID` int NOT NULL,
  `contactName` varchar(100) NOT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `streetNumber` text,
  `addressLine1` text,
  `addressLine2` text,
  `city` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergencycontact`
--

INSERT INTO `emergencycontact` (`memberID`, `contactName`, `relationship`, `telephone`, `streetNumber`, `addressLine1`, `addressLine2`, `city`) VALUES
(41, 'noorah', 'aunty', 987654311, '23', 'Lorris Road', 'bamba', 'colombo 03');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int NOT NULL,
  `userID` int NOT NULL,
  `noOfYearsOfExperience` varchar(100) NOT NULL,
  `avgRating` double NOT NULL DEFAULT '0',
  `qualification` text NOT NULL,
  `description` text NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `userID`, `noOfYearsOfExperience`, `avgRating`, `qualification`, `description`, `language`) VALUES
(5, 99, '05', 0, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(6, 105, '05', 0, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(7, 100, '05', 2, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(8, 101, '05', 0, 'Bsc. in Reading', 'I care deeply about my clients, and there’s nothing of more value to me than helping somebody go through an experience that makes them happy, confident, and strong. I realize how being overweight affects many aspects of your life, and I want to be there for you and help you discover the benefits and joys of training that helped me become the person I am today. I’m here to be your personal guide on every step of the journey.', 'English, Tamil, Sinhala'),
(9, 121, '10', 0, 'Bachelor of Arts', 'Chris is a passionate certified personal trainer and group fitness instructor who uses a combination of HIIT and metabolic training and stress management techniques. He’s worked with hundreds of clients, from CEOs to professional athletes–and everyone in between.   A recent client explained, “Chris’s knowledge, support, and personality makes his methods challenging but rewarding. He helps you achieve desired results without boredom or burnout.” ', 'sinhala'),
(10, 122, '3', 2, 'BSc. in Arts', 'Hi!  I’m a vegan registered dietitian nutritionist, and I created VeganCoach.com to empower people to optimize their health using a vegan diet. My paid coaching program sponsors this account for aspiring vegans, the Vegan Coach', 'sinhala'),
(11, 126, '3', 0, 'none', 'none', 'sinhala'),
(12, 127, '10', 0, 'Experienced trainer', 'jolly fun filled sessions ', 'sinhala'),
(13, 129, '', 0, '', '', 'sinhala'),
(14, 130, '4', 0, 'Undergraduate', '', 'sinhala');

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
(4, 14);

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
(34, '2023-04-16', 41, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicalform`
--

CREATE TABLE `medicalform` (
  `memberID` int NOT NULL,
  `isFatigue` varchar(10) NOT NULL,
  `isSmoke` varchar(10) NOT NULL,
  `existing_conditions` text NOT NULL,
  `isInjury` varchar(10) NOT NULL,
  `allergies` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalform`
--

INSERT INTO `medicalform` (`memberID`, `isFatigue`, `isSmoke`, `existing_conditions`, `isInjury`, `allergies`) VALUES
(41, 'Yes', '', 'Swelling_of_Ankles,Chest_Pains,Low_blood_pressure,High_blood_pressure', 'Yes', 'other');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int NOT NULL,
  `userID` int NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `planType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `userID`, `height`, `weight`, `planType`) VALUES
(41, 86, 100, 20, 'sixMonth'),
(55, 131, 100, 40, 'threeMonth'),
(56, 132, 100, 35, 'threeMonth'),
(57, 133, 73, 54, 'sixMonth');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int NOT NULL,
  `chatID` int NOT NULL,
  `text` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationsID` int NOT NULL,
  `message` varchar(255) NOT NULL,
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
(33, 'Member ID 41 Has Selected You to Train Them for Diet Service', '2023-04-11 14:38:05', 3);

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
(23, '2023-04-11 14:38:05', 10000, 3, 41);

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
(16, 41, '2023-12-14 15:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int NOT NULL,
  `serviceName` varchar(255) NOT NULL,
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
(41, 1, 3, 10, '2022-06-01 13:48:14', '2022-12-01 13:48:14', 4),
(41, 1, 4, 7, '2022-08-22 13:45:34', '2023-02-22 13:45:34', 1),
(41, 16, 4, 9, '2023-03-11 09:40:21', '2023-09-11 09:40:21', 0),
(41, 23, 3, 10, '2023-04-11 14:38:05', '2023-10-11 14:38:05', 0);

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
(18, 10, 41, '2023-04-11 14:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `supplementlist`
--

CREATE TABLE `supplementlist` (
  `supplementID` int NOT NULL,
  `supplementName` varchar(100) NOT NULL,
  `supplementType` varchar(50) NOT NULL,
  `supplementPhoto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplementlist`
--

INSERT INTO `supplementlist` (`supplementID`, `supplementName`, `supplementType`, `supplementPhoto`) VALUES
(18, 'Animal Cuts', 'Fat Burner', '../supplement/AnimalCuts.png'),
(19, 'Critical Mass', 'Mass Gainers', '../supplement/CriticalMass.png'),
(20, 'Critical Whey', 'Protein', '../supplement/CriticalWhey.png'),
(21, 'ASSAULT', 'Pre workout', '../supplement/ASSAULT.png'),
(22, 'Gat Liver Cleanse', 'Vitamin', '../supplement/GatLiverCleanse.png');

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
(8, 2, 1, 8),
(9, 2, 2, 10),
(10, 2, 3, 10),
(11, 2, 4, 10),
(12, 2, 5, 10),
(13, 2, 6, 10),
(14, 2, 7, 10),
(15, 3, 1, 9),
(16, 3, 2, 10),
(17, 3, 3, 10),
(18, 3, 4, 10),
(19, 3, 5, 10),
(20, 3, 6, 10),
(21, 3, 7, 10),
(22, 4, 1, 9),
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
(43, 7, 1, 9),
(44, 7, 2, 8),
(45, 7, 3, 0),
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
(7, NULL, '2023-04-16', '2023-04-16 12:00:00', '2023-04-16 14:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `fName` text NOT NULL,
  `lName` text NOT NULL,
  `NIC` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `profilePhoto` text,
  `dateOfBirth` date NOT NULL,
  `roles` int NOT NULL,
  `statuses` int NOT NULL,
  `contactNumber` int NOT NULL,
  `streetNumber` varchar(255) DEFAULT NULL,
  `addressLine01` text,
  `addressLine02` text,
  `city` text,
  `pw` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fName`, `lName`, `NIC`, `gender`, `profilePhoto`, `dateOfBirth`, `roles`, `statuses`, `contactNumber`, `streetNumber`, `addressLine01`, `addressLine02`, `city`, `pw`, `created_at`, `email`) VALUES
(86, 'Khadijah', 'Azward', '123456789V', 'Male', '../profileImages/86.jpg', '2004-12-07', 1, 1, 1234567890, '23', 'flower street', 'gangarama', 'colombo  08', '$2y$10$7PqcBZyFKC4CC/fFecTauOMkQIyz6hGw6bpYd2LUqmgzadS4cMxB.', '2022-12-14', 'kay@gmail.com'),
(99, 'khadi', 'azward', '123456789V', 'Female', NULL, '2021-12-01', 2, 1, 711541753, '', '', '', '', '$2y$10$gZRkdyuzET1oyP7KLaDNReQyhfF/0B4iMRLEPfo.sNSZcpLDVYEnG', '2022-12-16', 'khadijah@gmail.com'),
(100, 'Saitharsan', 'Perera', '123456789012', 'Female', NULL, '2021-12-08', 2, 1, 711541753, '', '', '', '', '$2y$10$cFBi7soQ/s9j6TbXtFASaOm6X.w.Km6x3NvOvwmsLEtlqHDhKBbJu', '2022-12-16', 'gf@gmail.com'),
(101, 'kj', 'aj', '123456789V', 'Male', NULL, '1999-02-17', 3, 1, 711541654, '', '', '', '', '$2y$10$l4w0IYYMJcry3qGOwu1V9OOE0.aRkopWRgaglrHXheuuTl9eTMrn2', '2023-01-27', 'kj1@gmail.com'),
(105, 'jkj', 'jbjk', '123456789009', 'Male', NULL, '2004-12-15', 2, 1, 1234567890, '', '', '', '', '$2y$10$F3YTzaS6JYEw8G62AppFletRnC9kJKhc/zVOZwW.bow6x7OSPxKl2', '2023-01-31', 'kji@gmail.com'),
(121, 'Eshitha', 'Kiribathgoda', '123098567432', 'Male', NULL, '2000-02-11', 2, 1, 776094223, '2', 'leyards Broadway', 'colombo', '', '$2y$10$Ukbnmw28hSRlQmVnM5JRsOC1/dZ.0lzD36e8P8DKhfTD75vtWARAi', '2023-02-09', 'eshitha@gmail.com'),
(122, 'kaveesha', 'gunawardana', '123456789V', 'Male', NULL, '2000-01-01', 3, 1, 711541753, '10', 'flower road', '', 'colombo 10', '$2y$10$.7jusna.OggSxAJjoUdPDOaZkyfgMRUIMiUp1GKCqZVbbxeUMhg1W', '2023-02-10', 'kaveesha@gmail.com'),
(125, 'hun', 'meh', '123456789V', 'Male', NULL, '2004-12-01', 2, 1, 71145689, '192', 'shoe road', '', 'colombo', '$2y$10$VI/sq8tw741aK2tdnpZS9.PEL8JLN2qvjrAlVd63v/E8p1PpVOpuu', '2023-02-10', 'hun@gmail.com'),
(126, 'james', 'millie', '123456789V', 'Male', NULL, '2004-11-29', 3, 1, 1234567890, '', '', '', '', '$2y$10$mpcJll08KRJ814NC.3oxKeWjUUMjjqVGvgbV1HCri7du5ntUZqY6W', '2023-02-10', 'james@gmail.com'),
(127, 'Juliet ', 'Khan', '123456789V', 'Female', NULL, '2004-12-01', 2, 1, 115467876, '', '', '', '', '$2y$10$nhnBvpmuRTPQGMejHCfCM.fsK64FyULvN/eKHAKdrB0ZdY1h0WXGS', '2023-02-10', 'juliet@gmail.com'),
(128, 'Fathima', 'Munzira', '985552614V', 'Female', NULL, '2003-10-14', 0, 1, 775097556, '3', 'hemmathagama', '', 'Colombo', '$2y$10$7fCyAsl.cReU6BIgzhe81OFHBBMVuH/9qP1pYsYUJBtxyysxUkJBy', '2023-02-10', 'munchi@gmail.com'),
(129, 'Edward', 'Gardin', '9855546232V', 'Male', NULL, '2004-12-03', 2, 1, 775087334, '3', '', '', 'Colombo', '$2y$10$1hCR19NL/PqarKGzfsLc3eQUNJhI6kRXWIiiz/s/Y9BpBe6KrTtYS', '2023-02-10', 'gardin@gmail.com'),
(130, 'Fathima', 'Shimra', '985552613V', 'Female', NULL, '2004-12-15', 2, 1, 775097556, '2', '', '', '', '$2y$10$WTZ87RckZ5/JN1o0HBJwIev0v1X6tSeoB5Zd/N7qIexoYLwGq.lke', '2023-02-10', 'shim@gmail.com'),
(131, 'husna', 'Azward', '987654321V', 'Female', NULL, '2004-12-01', 1, 1, 711541753, '', '', '', '', '$2y$10$wDE0s4uzlH/pFt4I8G.MaeHCcE6GUaMKSfmIsaA5.AuyQaIbnY3xK', '2023-03-02', 'kay40@gmail.com'),
(132, 'husna', 'Azward', '987654321V', 'Female', NULL, '2004-12-01', 1, 1, 711541753, '', '', '', '', '$2y$10$R5WsAWOx9jtwwTIu2jN9VuoNS2dqLbWRM2C46urgDqoXjF3I9E2YS', '2023-03-02', 'kay35@gmail.com'),
(133, 'amjad', 'azward', '200070903808', 'Male', NULL, '2001-01-08', 1, 1, 711541763, '172', 'leyards', 'broadway', 'colombo', '$2y$10$tfBOp99YGa/vsygAvvRRpOvRL5l9FYfIkfkoy/bdKyF9WRakR95Yu', '2023-03-02', 'amjad@gmail.com');

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
(19, 101, 33, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `weekDayID` int NOT NULL,
  `weekDayName` varchar(20) NOT NULL
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
  `exerciseName` varchar(50) NOT NULL,
  `reps` int NOT NULL,
  `restTime` int NOT NULL DEFAULT '3',
  `day` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workoutplan`
--

INSERT INTO `workoutplan` (`workout_id`, `employeeID`, `memberID`, `startDate`, `exerciseName`, `reps`, `restTime`, `day`) VALUES
(1, 9, 41, '2023-03-11 09:40:21', 'Planks', 3, 3, 1),
(2, 9, 41, '2023-03-11 09:40:21', 'Lunge', 4, 3, 1),
(3, 9, 41, '2023-03-11 09:40:21', 'Squats', 3, 3, 1),
(4, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 1),
(5, 9, 41, '2023-03-11 09:40:21', 'Single-leg deadlifts', 3, 3, 2),
(6, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 2),
(7, 9, 41, '2023-03-11 09:40:21', 'Side planks', 3, 3, 3),
(8, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 3),
(9, 9, 41, '2023-03-11 09:40:21', 'Overhead dumbbell presses', 3, 3, 4),
(10, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 4),
(11, 9, 41, '2023-03-11 09:40:21', 'Floor Press', 3, 3, 5),
(12, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 5),
(13, 9, 41, '2023-03-11 09:40:21', 'Frog Pumps', 3, 3, 6),
(14, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 6),
(15, 9, 41, '2023-03-11 09:40:21', 'Bar Dips', 3, 3, 7),
(16, 9, 41, '2023-03-11 09:40:21', 'push ups', 4, 3, 7);

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
(5, 41, '2023-05-05', 1, '2023-03-11 09:40:21');

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`,`chatID`);

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
  MODIFY `chatID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `dietplan`
--
ALTER TABLE `dietplan`
  MODIFY `diet_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `diet_plan_status`
--
ALTER TABLE `diet_plan_status`
  MODIFY `statusID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gymuseappointment`
--
ALTER TABLE `gymuseappointment`
  MODIFY `appointmentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `paymentplan`
--
ALTER TABLE `paymentplan`
  MODIFY `planID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `supplementID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `availableID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `usernotifications`
--
ALTER TABLE `usernotifications`
  MODIFY `usernotificationsID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `weekDayID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workoutplan`
--
ALTER TABLE `workoutplan`
  MODIFY `workout_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `workout_plan_status`
--
ALTER TABLE `workout_plan_status`
  MODIFY `statusID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
