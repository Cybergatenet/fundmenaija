-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 01:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `undmena_fundmenaija`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `C_No` int(11) NOT NULL,
  `Account_No` varchar(12) NOT NULL,
  `C_First_Name` text NOT NULL,
  `C_Last_Name` text NOT NULL,
  `C_Mobile_No` varchar(10) NOT NULL,
  `C_Email` varchar(200) NOT NULL,
  `C_Pincode` varchar(6) NOT NULL,
  `C_Adhar_Doc` varchar(500) NOT NULL,
  `C_Pan_Doc` varchar(500) NOT NULL,
  `Create_Date` date NOT NULL DEFAULT CURRENT_DATE(),
  `ProfileColor` varchar(100) NOT NULL,
  `ProfileImage` varchar(400) NOT NULL,
  `Bio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`C_No`, `Account_No`, `C_First_Name`, `C_Last_Name`,`C_Mobile_No`, `C_Email`, `C_Pincode`, `C_Adhar_Doc`, `C_Pan_Doc`, `Create_Date`, `ProfileColor`, `ProfileImage`, `Bio`) VALUES
(1, '1202222150', 'Cybergate', 'Abel', '0703775772', 'abelchinedu2@gmail.com', '', 'customer_data/SSN_doc/1(1)1222022215049.jpg', 'customer_data/Pan_doc/1(1)1222022215049.jpg', '2022-12-02', '#3b25cf', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`C_No`),
  ADD UNIQUE KEY `Account_No` (`Account_No`),
  ADD UNIQUE KEY `C_Pan_No` (`C_Pan_No`),
  ADD UNIQUE KEY `C_Adhar_No` (`C_Adhar_No`),
  ADD UNIQUE KEY `C_Email` (`C_Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `C_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
