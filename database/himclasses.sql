-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 08:37 AM
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
('admin', '', 'x', '10th', 'SSC', 'SJC', 'admin@gmail.com', 1111111111, 'Xyz colony,Pune,Mh', '$2y$10$gSQGCCjvXp8QBng.EIzKZeH2qGSDOpyKurngtnX.gIV5IFVAMerWi', 'DP/', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `sr_no` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Contact` bigint(40) NOT NULL,
  `Remark` longtext NOT NULL,
  `Enquiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`sr_no`, `Fname`, `Lname`, `Email`, `Contact`, `Remark`, `Enquiry_date`) VALUES
(1, 'admin', 'x', 'admin@gmail.com', 9669347249, 'Hello there', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `sr_no` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Message` varchar(1000) NOT NULL,
  `Feedback_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`sr_no`, `Email`, `Subject`, `Message`, `Feedback_date`) VALUES
(1, 'admin@gmail.com', 'Regarding Class', 'Your classes are amazing', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `resetpswd`
--

CREATE TABLE `resetpswd` (
  `sr_no` int(11) NOT NULL,
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
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `Email` (`Email`),
  ADD KEY `Email_2` (`Email`);

--
-- Indexes for table `resetpswd`
--
ALTER TABLE `resetpswd`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `resetpswd`
--
ALTER TABLE `resetpswd`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
