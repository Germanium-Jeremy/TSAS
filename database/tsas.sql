-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 10:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `id` int(11) NOT NULL,
  `name` varchar(5) DEFAULT NULL,
  `email` varchar(15) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@tsas.com', 'tsas admin');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(10) NOT NULL,
  `Branch_Name` varchar(20) DEFAULT NULL,
  `Course_Name` varchar(20) DEFAULT NULL,
  `Creation_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `Branch_Name`, `Course_Name`, `Creation_Date`) VALUES
(3, 'Electronics', 'Mathematics', '2024-05-14 15:29:49'),
(6, 'CRUD', 'PHP', '2024-05-12 09:43:14'),
(8, 'Electronics', 'Physics', '2024-05-12 12:08:59'),
(9, 'Phonetics', 'English', '2024-05-14 13:36:08'),
(10, 'Comprehensions', 'English', '2024-05-14 15:31:26'),
(11, 'Kinyarwanda', 'Language', '2024-05-17 05:52:53'),
(12, 'French', 'Language', '2024-05-17 05:53:15'),
(16, 'Crud', 'Database', '2024-05-17 06:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `suballocation`
--

CREATE TABLE `suballocation` (
  `ID` int(5) NOT NULL,
  `CourseID` int(5) DEFAULT NULL,
  `TeacherID` int(5) NOT NULL,
  `SubjectID` int(5) NOT NULL,
  `AllocationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suballocation`
--

INSERT INTO `suballocation` (`ID`, `CourseID`, `TeacherID`, `SubjectID`, `AllocationDate`) VALUES
(6, 1, 4, 1, '2024-05-12 09:27:12'),
(8, 4, 3, 13, '2024-05-12 09:58:27'),
(11, 3, 5, 10, '2024-05-13 17:14:42'),
(12, 9, 4, 17, '2024-05-15 10:24:09'),
(13, 8, 2, 15, '2024-05-15 10:24:23'),
(15, 9, 2, 17, '2024-05-17 05:51:43'),
(17, 3, 1, 2, '2024-05-17 08:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `ID` int(5) NOT NULL,
  `CourseID` int(5) DEFAULT NULL,
  `SubjectFullname` varchar(200) DEFAULT NULL,
  `SubjectShortname` varchar(200) DEFAULT NULL,
  `SubjectCode` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`ID`, `CourseID`, `SubjectFullname`, `SubjectShortname`, `SubjectCode`, `CreationDate`) VALUES
(2, 2, 'Mathematics', 'Math', 'Math333', '2024-05-12 09:04:19'),
(10, 3, 'Mathematics', 'Math', 'Math', '2024-05-12 09:52:24'),
(13, 4, 'Kinyarwanda', 'Kiny', 'kiny990', '2024-05-12 09:58:11'),
(14, 6, 'HyperText PreProcessor', 'PHP', 'PHP221', '2024-05-15 11:34:53'),
(15, 8, 'Physics', 'Phy', 'Phy232', '2024-05-14 15:39:41'),
(16, 9, 'Comprehensive English', 'Engl', 'Eng404', '2024-05-15 10:23:20'),
(17, 9, 'English', 'Eng', 'Engw43', '2024-05-14 15:45:50'),
(18, 11, 'English', 'Eng', 'Eng222', '2024-05-17 05:55:23'),
(19, 6, 'PHP', 'PHP', 'PHP660', '2024-05-17 05:55:54'),
(20, 3, 'Mathematics', 'Math', 'Math333', '2024-05-17 05:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `ID` int(10) NOT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `LastName` varchar(10) DEFAULT NULL,
  `MobileNumber` varchar(10) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Dob` varchar(20) DEFAULT NULL,
  `Religion` varchar(20) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `ProfilePic` varchar(20) DEFAULT NULL,
  `JoiningDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Gender`, `Dob`, `Religion`, `Address`, `ProfilePic`, `JoiningDate`) VALUES
(1, 'John', 'Doe', '0788888888', 'germany@me.com', 'Male', '2024-05-03', 'Protestant', 'London, England', NULL, '2024-05-11 18:25:10'),
(2, 'Nelson', 'Sallym', '0730000000', 'sallym@gmail.com', 'Male', '2024-05-04', 'Catholic', 'Ugunda', NULL, '2024-05-12 09:05:38'),
(3, 'Ngwije', 'Version2', '0790000000', 'ngwije@gmail.com', 'Male', '2024-04-05', 'Adventist', 'Nyabihu, Mukamira', NULL, '2024-05-12 09:06:35'),
(4, 'Ester', 'Hope', '0770000999', 'ester@hope.com', 'Female', '2024-04-22', 'Other', 'Mukamira, Nyabihu', NULL, '2024-05-12 09:10:12'),
(5, 'migisha ', 'Yvan', '0776555456', 'gish@gmail.com', 'Female', '2024-05-10', 'Catholic', 'Mukanogo', NULL, '2024-05-15 12:04:17'),
(6, 'Jeremy', 'NkundabaG', '0933232312', 'nkundabaG@gmail.com', 'Male', '', 'Catholic', '', NULL, '2024-05-17 06:01:09'),
(7, 'Olga', 'Lady', '0785455333', 'admin@tsas.com', 'Female', '2024-05-03', 'Catholic', 'London', NULL, '2024-05-17 06:19:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `suballocation`
--
ALTER TABLE `suballocation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_course_id` (`CourseID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `suballocation`
--
ALTER TABLE `suballocation`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
