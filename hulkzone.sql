-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 07:05 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
  `chatID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `receiverID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateReported` date NOT NULL,
  `actionTaken` text DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `evidence` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `subject`, `description`, `status`, `dateReported`, `actionTaken`, `userID`, `evidence`) VALUES
(28, 'Injured in the gym', 'i was working out and then suddenly the equipment fell off from the top and hit my leg.', 'Ignored', '2023-02-15', 'completed', 86, 'C:/xampp/htdocs/HulkZone/Complaintevidence/86_1676437108.jpg'),
(29, 'i got beaten from my trainer', 'i was working out and was exhausted, so I took a rest. suddenly, my trainer came and slapped me.', 'completed', '2023-02-19', 'done', 86, 'C:/xampp/htdocs/HulkZone/Complaintevidence/86_1676804757.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dieticianappointment`
--

CREATE TABLE `dieticianappointment` (
  `employeeID` int(11) NOT NULL,
  `memberID` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dietplan`
--

CREATE TABLE `dietplan` (
  `employeeID` int(11) NOT NULL,
  `dietplanDate` date NOT NULL,
  `breakfastQty` varchar(100) NOT NULL,
  `breakfastMeal` varchar(100) NOT NULL,
  `breakfastCal` varchar(11) NOT NULL,
  `lunchQty` varchar(100) NOT NULL,
  `lunchMeal` varchar(100) NOT NULL,
  `lunchCal` varchar(100) NOT NULL,
  `dinnerQty` varchar(100) NOT NULL,
  `dinnerMeal` varchar(100) NOT NULL,
  `dinnerCal` varchar(100) NOT NULL,
  `day` varchar(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `memberID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dietplan`
--

INSERT INTO `dietplan` (`employeeID`, `dietplanDate`, `breakfastQty`, `breakfastMeal`, `breakfastCal`, `lunchQty`, `lunchMeal`, `lunchCal`, `dinnerQty`, `dinnerMeal`, `dinnerCal`, `day`, `status`, `memberID`) VALUES
(10, '0000-00-00', 'hdj', 'nbnb', 'jdb', '', 'Green Gram', 'gyg', 'fgudgu', 'kwqhdk', 'errv', 'Tuesday', 1, 41),
(10, '2023-03-05', 'hdj', 'Meat', 'dfvd', '01 bowl', 'djhvjd', 'fvdvd', 'fgudgu', 'beuwegu', 'dfvfd', 'Saturday', 1, 41),
(10, '2023-03-14', 'hdj', 'Meat', 'dfvd', 'fnrj', 'Green Gram', 'fvdvd', 'fkvkfdd', 'ere', 'dfvfd', 'Thursday', 1, 41),
(10, '2023-03-15', 'hdj', 'jn', 'dfvd', 'lhdk', 'djhvjd', 'fvdvd', 'wjhdk', 'ere', 'dcnwke                           ', 'Wednesday', 1, 41),
(10, '2023-03-22', '02', 'jn', 'dfvd', '', 'djhvjd', 'fvdvd', 'jrheh', 'reheuy', 'dfvfd', 'Monday', 1, 41),
(10, '2023-04-01', 'wjdiwj', 'Eggs', 'dfvd', 'fnrj', 'djhvjd', 'gyg', 'wjhdk', 'kwqhdk', 'dfvfd', 'Friday', 1, 41),
(10, '2023-04-08', '02', 'Meat', 'jdb', '01 bowl', 'djhvjd', 'fvdvd', 'wehiu', 'ere', 'errv', 'Sunday', 1, 41);

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontact`
--

CREATE TABLE `emergencycontact` (
  `memberID` int(11) NOT NULL,
  `contactName` varchar(100) NOT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `streetNumber` text DEFAULT NULL,
  `addressLine1` text DEFAULT NULL,
  `addressLine2` text DEFAULT NULL,
  `city` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `employeeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `noOfYearsOfExperience` varchar(100) NOT NULL,
  `avgRating` double NOT NULL DEFAULT 0,
  `qualification` text NOT NULL,
  `description` text NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `serviceID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeeservice`
--

INSERT INTO `employeeservice` (`serviceID`, `employeeID`) VALUES
(1, 5),
(1, 7),
(1, 9),
(2, 5),
(2, 6),
(2, 7),
(2, 9),
(3, 8),
(3, 10),
(3, 11),
(4, 7),
(4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `exerciseID` int(11) NOT NULL,
  `exerciseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`exerciseID`, `exerciseName`) VALUES
(1, 'Bench Press'),
(2, 'Shoulder Press'),
(3, 'Military Press'),
(4, 'Leg Press'),
(5, 'Barbell Row'),
(6, 'Leg Extension'),
(7, 'Leg Curl');

-- --------------------------------------------------------

--
-- Table structure for table `gymuseappointment`
--

CREATE TABLE `gymuseappointment` (
  `appointmentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `memberID` int(11) NOT NULL,
  `slotID` int(11) NOT NULL,
  `attendance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(32, '2023-03-02', 41, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicalform`
--

CREATE TABLE `medicalform` (
  `memberID` int(11) NOT NULL,
  `isFatigue` varchar(10) NOT NULL,
  `isSmoke` varchar(10) NOT NULL,
  `existing_conditions` text NOT NULL,
  `isInjury` varchar(10) NOT NULL,
  `allergies` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `memberID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `height` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `planType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `memberservice`
--

CREATE TABLE `memberservice` (
  `memberID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageID` int(11) NOT NULL,
  `chatID` int(11) NOT NULL,
  `text` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationsID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notificationsID`, `message`, `created_at`, `type`) VALUES
(1, 'Gym is closed today after4.00p.m', '2023-03-02 08:29:45', 0),
(5, 'Keep the gym clean', '2023-03-02 13:27:04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `paymentDate` datetime NOT NULL,
  `amount` double NOT NULL,
  `type` int(11) NOT NULL,
  `memberID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `paymentDate`, `amount`, `type`, `memberID`) VALUES
(1, '2022-08-22 18:14:48', 10000, 4, 41),
(2, '2023-02-24 18:17:15', 10000, 4, 41),
(3, '2022-07-06 21:14:05', 10000, 3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `paymentplan`
--

CREATE TABLE `paymentplan` (
  `planID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `expiryDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentplan`
--

INSERT INTO `paymentplan` (`planID`, `memberID`, `expiryDate`) VALUES
(1, 55, '2023-06-02 00:00:00'),
(2, 56, '2023-06-02 00:00:00'),
(3, 57, '2023-09-02 00:00:00'),
(4, 41, '2023-06-14 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `servicePeriod` int(11) NOT NULL,
  `servicePrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `memberID` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `rate` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicecharge`
--

INSERT INTO `servicecharge` (`memberID`, `paymentID`, `serviceID`, `employeeID`, `startDate`, `endDate`, `rate`) VALUES
(41, 1, 4, 7, '2022-08-22 13:45:34', '2023-02-22 13:45:34', 2),
(41, 2, 4, 7, '2023-02-24 18:18:13', '2023-08-24 18:18:13', 0),
(41, 3, 3, 10, '2022-07-06 21:16:47', '2023-01-06 21:16:47', 2);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slotID` int(11) NOT NULL,
  `sTime` time NOT NULL,
  `eTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `employeeID` int(11) NOT NULL,
  `supplementID` int(11) NOT NULL,
  `supplementName` varchar(100) NOT NULL,
  `supplementType` varchar(100) NOT NULL,
  `memberID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplement`
--

INSERT INTO `supplement` (`employeeID`, `supplementID`, `supplementName`, `supplementType`, `memberID`) VALUES
(10, 5, 'BSN Syntha 6', 'Protein', 41);

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `availableID` int(11) NOT NULL,
  `weekDayID` int(11) NOT NULL,
  `slotID` int(11) NOT NULL,
  `availableSlots` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 2, 1, 9),
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
(44, 7, 2, 9),
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
  `employeeID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fName` text NOT NULL,
  `lName` text NOT NULL,
  `NIC` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `profilePhoto` text DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `roles` int(11) NOT NULL,
  `statuses` int(11) NOT NULL,
  `contactNumber` int(11) NOT NULL,
  `streetNumber` varchar(255) DEFAULT NULL,
  `addressLine01` text DEFAULT NULL,
  `addressLine02` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `pw` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fName`, `lName`, `NIC`, `gender`, `profilePhoto`, `dateOfBirth`, `roles`, `statuses`, `contactNumber`, `streetNumber`, `addressLine01`, `addressLine02`, `city`, `pw`, `created_at`, `email`) VALUES
(86, 'Khadijah', 'Azward', '123456789V', 'Male', '../profileImages/86.png', '2004-12-07', 1, 1, 1234567890, '23', 'flower street', 'gangarama', 'colombo  08', '$2y$10$7PqcBZyFKC4CC/fFecTauOMkQIyz6hGw6bpYd2LUqmgzadS4cMxB.', '2022-12-14', 'kay@gmail.com'),
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
  `usernotificationsID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `notificationsID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usernotifications`
--

INSERT INTO `usernotifications` (`usernotificationsID`, `userID`, `notificationsID`, `status`) VALUES
(1, 86, 1, 0),
(2, 86, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

CREATE TABLE `weekdays` (
  `weekDayID` int(11) NOT NULL,
  `weekDayName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `employeeID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `workoutPlanMonth` datetime NOT NULL,
  `day` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `exerciseID` int(11) NOT NULL,
  `restTime` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`employeeID`,`dietplanDate`,`memberID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `memberID` (`memberID`);

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
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`exerciseID`);

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
-- Indexes for table `memberservice`
--
ALTER TABLE `memberservice`
  ADD PRIMARY KEY (`memberID`,`serviceID`,`startDate`),
  ADD KEY `memberID` (`memberID`,`serviceID`,`employeeID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`,`chatID`),
  ADD KEY `chatID` (`chatID`);

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
  ADD PRIMARY KEY (`supplementID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `memberID` (`memberID`);

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
  ADD PRIMARY KEY (`employeeID`,`memberID`,`workoutPlanMonth`,`day`),
  ADD KEY `exerciseID` (`exerciseID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `exerciseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `gymuseappointment`
--
ALTER TABLE `gymuseappointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentplan`
--
ALTER TABLE `paymentplan`
  MODIFY `planID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplement`
--
ALTER TABLE `supplement`
  MODIFY `supplementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `availableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `usernotifications`
--
ALTER TABLE `usernotifications`
  MODIFY `usernotificationsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `weekdays`
--
ALTER TABLE `weekdays`
  MODIFY `weekDayID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `dietplan_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dietplan_ibfk_3` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `memberservice`
--
ALTER TABLE `memberservice`
  ADD CONSTRAINT `memberservice_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `memberservice_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `memberservice_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`chatID`) REFERENCES `chat` (`chatID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `memberID` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `workoutplan_ibfk_1` FOREIGN KEY (`exerciseID`) REFERENCES `exercise` (`exerciseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workoutplan_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workoutplan_ibfk_3` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
