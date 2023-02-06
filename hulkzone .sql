-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 05:07 AM
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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcementID` int NOT NULL,
  `date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announcementID`, `date`, `message`) VALUES
(1, '2022-12-05', 'hello'),
(3, '2022-12-22', 'hello today gym is closed.'),
(4, '2022-12-16', 'Gym is going to close soon'),
(5, '2022-12-16', 'Keep Gym clean'),
(6, '2022-12-16', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceID` int NOT NULL,
  `memberID` int NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatID` int NOT NULL,
  `senderID` int NOT NULL,
  `receiverID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaintID` int NOT NULL,
  `subject` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `desiredOutcome` text NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateReported` date NOT NULL,
  `actionTaken` text,
  `userID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaintID`, `subject`, `description`, `desiredOutcome`, `status`, `dateReported`, `actionTaken`, `userID`) VALUES
(48, 'help me', 'i paid my fee and i cant access my work out plan', 'fulfill my need asap', 'Filed', '2022-12-08', NULL, 71),
(49, 'help me', 'i paid my fee and i cant access my work out plan', 'fulfill my need asap', 'Filed', '2022-12-08', NULL, 71),
(50, 'gym coach hit me', 'yeah so he hit me on my head', 'please have well behaved staff in the future', 'Filed', '2022-12-17', NULL, 71),
(51, 'i paid my fee and i cant access my work out plan', 'i paid my fee and i cant access my work out plan', 'i paid my fee and i cant access my work out plan', 'Filed', '2022-12-23', NULL, 71),
(56, 'my friend tried to kill me', 'so yeah he slapped me', 'please ban him from the gym', 'Filed', '2022-12-16', NULL, 71),
(58, 'hey', 'yes', 'no', 'Filed', '2022-12-13', NULL, 71),
(61, 'saa', 'kjjna', 'kjas', 'Filed', '2022-12-22', NULL, 71),
(62, 'saa', 'kjjna', 'kjas', 'Filed', '2022-12-22', NULL, 71),
(63, 'saa', 'kjjna', 'kjas', 'Filed', '2022-12-22', NULL, 71),
(64, 'ka,', 'jms', 'm', 'Filed', '2022-12-29', NULL, 71),
(65, 'nm', 'nm', 'n', 'Filed', '2022-12-16', NULL, 71),
(66, 'kk', 'jjsd', 'kjs', 'Filed', '2022-12-22', NULL, 71),
(67, 'khds', 'kjsd', 'jb', 'Filed', '2022-12-14', NULL, 71),
(68, 'khds', 'kjsd', 'jb', 'Filed', '2022-12-14', NULL, 71),
(69, 'Work out plan not updated', 'the workout plan was not showing the progress', 'make the error soon', 'Filed', '2022-12-15', NULL, 86);

-- --------------------------------------------------------

--
-- Table structure for table `dieticianappointment`
--

CREATE TABLE `dieticianappointment` (
  `employeeID` int NOT NULL,
  `memberID` int NOT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dietplan`
--

CREATE TABLE `dietplan` (
  `employeeID` int NOT NULL,
  `dietplanDate` date NOT NULL,
  `mealType` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Qty` varchar(100) NOT NULL,
  `day` varchar(100) NOT NULL,
  `meal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergencycontact`
--

CREATE TABLE `emergencycontact` (
  `memberID` int NOT NULL,
  `contactName` varchar(100) NOT NULL,
  `relationship` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `streetNumber` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `addressLine1` text,
  `addressLine2` text,
  `city` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergencycontact`
--

INSERT INTO `emergencycontact` (`memberID`, `contactName`, `relationship`, `telephone`, `streetNumber`, `addressLine1`, `addressLine2`, `city`) VALUES
(41, 'noorah', 'Mom', 987654311, '23', 'Lorris Road', 'bamba', 'colombo 03');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int NOT NULL,
  `userID` int NOT NULL,
  `noOfYearsOfExperience` varchar(100) NOT NULL,
  `avgRating` double NOT NULL,
  `qualification` text NOT NULL,
  `description` text NOT NULL,
  `language` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeeservice`
--

CREATE TABLE `employeeservice` (
  `serviceID` int NOT NULL,
  `employeeID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `exerciseID` int NOT NULL,
  `exerciseName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gymuseappointment`
--

CREATE TABLE `gymuseappointment` (
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `memberID` int NOT NULL,
  `slot` int NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalform`
--

CREATE TABLE `medicalform` (
  `memberID` int NOT NULL,
  `isFatigue` varchar(10) NOT NULL,
  `isSmoke` varchar(10) NOT NULL,
  `existing_conditions` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `isInjury` varchar(10) NOT NULL,
  `allergies` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalform`
--

INSERT INTO `medicalform` (`memberID`, `isFatigue`, `isSmoke`, `existing_conditions`, `isInjury`, `allergies`) VALUES
(41, 'Yes', '', 'Swelling_of_Ankles,Low_blood_pressure,High_blood_pressure', 'Yes', 'other');

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
(25, 71, 0, 0, 'oneMonth'),
(41, 86, 100, 20, 'twelveMonth'),
(43, 98, 0, 0, 'twelveMonth'),
(44, 99, 0, 0, 'twelveMonth'),
(45, 100, 0, 0, 'twelveMonth'),
(46, 101, 0, 0, 'oneMonth'),
(47, 102, 0, 0, 'oneMonth'),
(50, 105, 0, 0, 'oneMonth');

-- --------------------------------------------------------

--
-- Table structure for table `memberservice`
--

CREATE TABLE `memberservice` (
  `memberID` int NOT NULL,
  `serviceID` int NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime NOT NULL,
  `status` varchar(100) NOT NULL,
  `employeeID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int NOT NULL,
  `paymentDate` datetime NOT NULL,
  `amount` double NOT NULL,
  `bill` blob NOT NULL,
  `memberID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentplan`
--

CREATE TABLE `paymentplan` (
  `memberID` int NOT NULL,
  `paymentID` int NOT NULL,
  `expiryDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `memberID` int NOT NULL,
  `rating` double NOT NULL,
  `timestamp` datetime NOT NULL,
  `serviceID` int NOT NULL,
  `employeeID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceID` int NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `servicePeriod` int NOT NULL,
  `servicePrice` double NOT NULL,
  `serviceDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `endDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainerappointment`
--

CREATE TABLE `trainerappointment` (
  `employeeID` int NOT NULL,
  `memberID` int NOT NULL,
  `date` date NOT NULL,
  `startTime` datetime NOT NULL,
  `endTime` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `streetNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `addressLine01` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `addressLine02` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `pw` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fName`, `lName`, `NIC`, `gender`, `profilePhoto`, `dateOfBirth`, `roles`, `statuses`, `contactNumber`, `streetNumber`, `addressLine01`, `addressLine02`, `city`, `pw`, `created_at`, `email`) VALUES
(71, 'zah', 'ra', '', 'Male', NULL, '2006-07-22', 1, 1, 1234567890, '', '', '', '', '$2y$10$PhOkPbicL/IeemnaPkvboOlarG1QOT/STGyVfoyXGH7HGuVqbJ14W', '2022-12-13', 'zahra@gmail.com'),
(86, ' Saitharsan', 'Nanthakumaran', '123456789V', 'Male', 'profileImages/86.jpeg', '2004-12-07', 1, 1, 1234567890, '', '', '', '', '$2y$10$tryEREPEWp0J1qMCtpXokedgbAbrMIN6OzYlrgyw9235bvApxNwO.', '2022-12-14', 'sai@gmail.com'),
(97, 'Munsira', 'Mansoor', '123456789012', 'Male', NULL, '2012-12-03', 0, 1, 711541753, NULL, NULL, NULL, NULL, '$2y$10$PhOkPbicL/IeemnaPkvboOlarG1QOT/STGyVfoyXGH7HGuVqbJ14W', '2022-12-16', 'munsira@gmail.com'),
(98, 'munsira', 'Mansoor', '123456789012', 'Female', NULL, '1998-07-09', 1, 1, 711541753, '', '', '', '', '$2y$10$qIy0CFE7KytNEGbPsQ/7ZugRzxliEiZUZ.EDkGeIUPhMwnbvDvZ4W', '2022-12-16', 'kj@gmail.com'),
(99, 'khadi', 'azward', '123456789V', 'Female', NULL, '2021-12-01', 1, 1, 711541753, '', '', '', '', '$2y$10$gZRkdyuzET1oyP7KLaDNReQyhfF/0B4iMRLEPfo.sNSZcpLDVYEnG', '2022-12-16', 'khadijah@gmail.com'),
(100, 'khadijah', 'Azward', '123456789012', 'Female', NULL, '2021-12-08', 1, 1, 711541753, '', '', '', '', '$2y$10$cFBi7soQ/s9j6TbXtFASaOm6X.w.Km6x3NvOvwmsLEtlqHDhKBbJu', '2022-12-16', 'gf@gmail.com'),
(101, 'kj', 'aj', '123456789V', 'Male', NULL, '1999-02-17', 1, 1, 711541654, '', '', '', '', '$2y$10$l4w0IYYMJcry3qGOwu1V9OOE0.aRkopWRgaglrHXheuuTl9eTMrn2', '2023-01-27', 'kj1@gmail.com'),
(102, 'Khadijah', 'Azward', '123456789V', 'Male', NULL, '2004-12-01', 1, 1, 711541753, '', '', '', '', '$2y$10$eUxzhlIJVy8LIPlDx2qUTOh6awKys29yPnDM/fu8zZTxa.kXcYJ/O', '2023-01-31', '123@gmail.com'),
(105, 'jkj', 'jbjk', '123456789009', 'Male', NULL, '2004-12-15', 1, 1, 1234567890, '', '', '', '', '$2y$10$F3YTzaS6JYEw8G62AppFletRnC9kJKhc/zVOZwW.bow6x7OSPxKl2', '2023-01-31', 'kji@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `workoutplan`
--

CREATE TABLE `workoutplan` (
  `employeeID` int NOT NULL,
  `memberID` int NOT NULL,
  `workoutPlanMonth` datetime NOT NULL,
  `day` varchar(100) NOT NULL,
  `duration` int NOT NULL,
  `exerciseID` int NOT NULL,
  `restTime` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceID`),
  ADD KEY `memberID` (`memberID`);

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
  ADD PRIMARY KEY (`employeeID`,`dietplanDate`,`mealType`),
  ADD KEY `employeeID` (`employeeID`);

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
  ADD PRIMARY KEY (`date`,`startTime`,`slot`),
  ADD KEY `memberID` (`memberID`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `memberID` (`memberID`);

--
-- Indexes for table `paymentplan`
--
ALTER TABLE `paymentplan`
  ADD PRIMARY KEY (`memberID`,`paymentID`),
  ADD KEY `memberID` (`memberID`,`paymentID`),
  ADD KEY `paymentID` (`paymentID`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`memberID`,`serviceID`,`employeeID`),
  ADD KEY `memberID` (`memberID`,`serviceID`,`employeeID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `servicecharge`
--
ALTER TABLE `servicecharge`
  ADD PRIMARY KEY (`memberID`,`paymentID`,`serviceID`),
  ADD KEY `memberID` (`memberID`,`paymentID`,`serviceID`,`employeeID`),
  ADD KEY `employeeID` (`employeeID`),
  ADD KEY `paymentID` (`paymentID`),
  ADD KEY `serviceID` (`serviceID`);

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
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaintID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `exerciseID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `dietplan_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `gymuseappointment_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `paymentplan_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paymentplan_ibfk_2` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_ibfk_3` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `servicecharge`
--
ALTER TABLE `servicecharge`
  ADD CONSTRAINT `servicecharge_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicecharge_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicecharge_ibfk_3` FOREIGN KEY (`paymentID`) REFERENCES `payment` (`paymentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicecharge_ibfk_4` FOREIGN KEY (`serviceID`) REFERENCES `service` (`serviceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trainerappointment`
--
ALTER TABLE `trainerappointment`
  ADD CONSTRAINT `trainerappointment_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `member` (`memberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trainerappointment_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
