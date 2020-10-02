-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 06:11 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himclasses`
--

-- --------------------------------------------------------

--
-- Table structure for table `classreg`
--

CREATE TABLE `classreg` (
  `Fname` varchar(15) NOT NULL,
  `Mname` varchar(15) NOT NULL,
  `Lname` varchar(15) NOT NULL,
  `Standard` varchar(12) NOT NULL,
  `Course` varchar(12) NOT NULL,
  `Schoolname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact` bigint(20) NOT NULL,
  `Address` varchar(150) NOT NULL,
  `Pswd` varchar(200) NOT NULL,
  `DP` varchar(255) NOT NULL,
  `Reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classreg`
--

INSERT INTO `classreg` (`Fname`, `Mname`, `Lname`, `Standard`, `Course`, `Schoolname`, `Email`, `Contact`, `Address`, `Pswd`, `DP`, `Reg_date`) VALUES
('YASH', '', 'DALVI', '11th', 'Science', 'SJC', 'yashdalvi45@gmail.com', 9669347249, '303,BHAKTI IRIS APT.,OPP. TO EURO KIDS SCHOOL,KATVI ROAD,TALEGAON', '$2y$10$42Ag7XtgESZRRIQn.rVGUO33DpaqVGWe0vo5m9gwzFHltO/uWTo6u', 'DP/', '2020-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Contact` bigint(40) NOT NULL,
  `Remark` longtext NOT NULL,
  `Enquiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `Feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `resetpswd`
--

CREATE TABLE `resetpswd` (
  `Email` varchar(255) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `Timee` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `Email` varchar(100) NOT NULL,
  `SessionID` varchar(200) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classreg`
--
ALTER TABLE `classreg`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD KEY `Email` (`Email`),
  ADD KEY `Email_2` (`Email`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
