-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 09:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driving`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ClassID` int(11) NOT NULL,
  `TutorID` int(11) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `ClassCapacity` int(11) NOT NULL,
  `ClassPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ClassID`, `TutorID`, `Subject`, `Description`, `StartDate`, `StartTime`, `EndTime`, `ClassCapacity`, `ClassPrice`) VALUES
(2, 2, 'Bike Driving test', 'Available Time', '2023-04-15', '09:10:00', '10:40:00', 2, '3000.00'),
(3, 2, 'Scooter Class', 'Scooter Class For 1 to 3 months ', '2023-04-22', '06:00:00', '06:30:00', 3, '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `classrequest`
--

CREATE TABLE `classrequest` (
  `RequestID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `FeasibleTime` varchar(255) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `submit_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrequest`
--

INSERT INTO `classrequest` (`RequestID`, `Name`, `Phone`, `Email`, `Address`, `FeasibleTime`, `ClassID`, `message`, `status`, `submit_datetime`) VALUES
(4, 'Elite Motors', '981-6697951', 'ankitpoudel1146@gmail.com', 'Uttamchowk', '10 am to 2 pm ', 2, 'k xa dai', 1, '2023-04-16 22:43:37'),
(5, 'Ankit Poudel', '9816697951', 'ankitpoudel1146@gmail.com', 'pokhara', '11 am', 2, 'dhannewad dajii', 0, '2023-04-16 22:43:45'),
(6, 'Elite Motors', '981-6697951', 'ankitpoudel1146@gmail.com', 'Uttamchowk', '10 am to 2 pm ', 2, 'k xa dai', 0, '2023-04-16 22:43:48'),
(7, 'ankit poudel', '981-6697951', 'ankitpoudel1146@gmail.com', 'Uttamchowk', '10 am to 2 pm ', 2, 'assasa', 0, '2023-04-16 22:43:50'),
(8, 'Kritim', '123456', 'Rijal@email.com', 'pokhara', '10:30', 2, 'hello', 0, '2023-04-16 22:43:51'),
(18, 'asnajsja', '4242442', 'as67795419@gmail.com', 'dbdjbdjk', '10 am to 2 pm ', 3, 'csfsdf', 0, '2023-04-16 19:44:19');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `EnrollmentID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `EnrollmentDate` date NOT NULL,
  `PaymentAmount` decimal(10,2) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`EnrollmentID`, `StudentID`, `ClassID`, `EnrollmentDate`, `PaymentAmount`, `PaymentDate`) VALUES
(1, 3, 2, '2023-04-27', '15000.00', '2023-04-13'),
(2, 5, 2, '2022-11-11', '122.00', '0000-00-00'),
(3, 4, 2, '2023-04-03', '350.00', '2023-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(11) NOT NULL,
  `Number` varchar(20) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `correct_opt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `text`, `opt1`, `opt2`, `opt3`, `opt4`, `correct_opt`) VALUES
(79, 'what is super bike', 'gadi', 'bike', 'cycle', 'veh', 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `StudentID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EducationLevel` enum('high school','college','graduate') NOT NULL,
  `Description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `UserID`, `EducationLevel`, `Description`, `email`, `address`, `phone`, `age`, `Name`) VALUES
(3, 1, 'high school', 'he is good', 'email@ankit.com', 'pkr', '23', 23, 'Ankit'),
(4, 1, 'high school', 'this is a boy', 'ankit@email.com', 'pkr', '234', 23, 'Ankit'),
(5, 1, 'graduate', 'he is sujal ', 'sujal@emai.l.c', 'pokhara', '1234', 24, 'Sujal'),
(6, 1, 'college', 'he is ram', 'ram@ram.com', 'ktm', '234343', 34, 'Ram bahadur'),
(7, 1, 'college', 'he is lokraj', 'lokraj@gmail.com', 'chuathe', '123344', 22, 'lokraj Magar'),
(8, 1, 'high school', 'Added from Class Request.', 'Rijal@email.com', 'pokhara', '123456', NULL, 'Kritim'),
(9, 1, 'high school', 'Added from Class Request.', 'ankitpoudel1146@gmail.com', 'Uttamchowk', '981-6697951', NULL, 'Elite Motors');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `TutorID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ExperienceYear` int(11) DEFAULT NULL,
  `Education` varchar(100) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `HourlyRate` decimal(10,2) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`TutorID`, `UserID`, `ExperienceYear`, `Education`, `Description`, `HourlyRate`, `name`, `email`, `phone`, `address`) VALUES
(2, 1, 2, 'backelord', 'he is  good boy', '12.00', 'Ankit', 'ankit@user.com', '1234', 'pkr'),
(4, 1, 2, 'Bsc', 'Krish is a responsible driver who has been driving for two years and has a good understanding of driving rules. As a driver, Ankit understands the importance of safety on the road and always makes sure to wear his seatbelt, obey the speed limit, and follow traffic signs and signals. Ankit also knows the importance of maintaining his vehicle to ensure it\'s in good condition and safe to drive. Overall, Ankit is a conscientious and safety-conscious driver who takes driving seriously and strives to be a responsible member of the driving community.', '250.00', 'Krish', 'krish@gmail.com', '1234', 'Uttamchowk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Role` enum('admin','tutor','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Email`, `Role`) VALUES
(1, 'sundar', '$2y$10$5fO7SxsvV97zWWAcuQuVFOUwgkJwWkd3K0p9MMZ3al6nfJJnZOvM2', 'sundar', 'pass', 'Email@email.com', 'admin'),
(2, 'ankit', '$2y$10$.MKb3YrvjFVLeaDQCTDb9e0tL6zyHngf40JnRNhnx32Xe4NjDWX7u', 'ankit', 'sharma', 'ankit@sharma.com', 'admin'),
(6, 'ankits', '$2y$10$C/g3F.QmltWBNYiT9dW6MetQYzuCjkCKkpsezNq9JiIAoh.ybYBi.', 'ankit', 'ankit', 'ankit@ankitcp.com', 'admin'),
(7, 'sujal', '$2y$10$RwoymJqDW5DsuOTaDBo0me1w19648oPy7vvinvKgpHakBszP5rgV.', 'sujal', 'sujal', 'sujal@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `TutorID` (`TutorID`);

--
-- Indexes for table `classrequest`
--
ALTER TABLE `classrequest`
  ADD PRIMARY KEY (`RequestID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`EnrollmentID`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `ClassID` (`ClassID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`StudentID`),
  ADD KEY `students_ibfk_1` (`UserID`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`TutorID`),
  ADD KEY `tutors_ibfk_1` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classrequest`
--
ALTER TABLE `classrequest`
  MODIFY `RequestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `EnrollmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `TutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`TutorID`) REFERENCES `tutors` (`TutorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classrequest`
--
ALTER TABLE `classrequest`
  ADD CONSTRAINT `classrequest_ibfk_1` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`);

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `students` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`ClassID`) REFERENCES `classes` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
