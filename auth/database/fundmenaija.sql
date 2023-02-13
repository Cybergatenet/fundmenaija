-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 11:02 PM
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
-- Database: `fundmenaija`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `Balance` varchar(100) NOT NULL,
  `SavingBalance` varchar(100) NOT NULL,
  `SavingTarget` varchar(100) NOT NULL,
  `AccountType` text NOT NULL,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `AccountNo`, `Balance`, `SavingBalance`, `SavingTarget`, `AccountType`, `State`) VALUES
(1, '120222215049', '0.0', '0.0', '', 'Savings', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `srNo` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `CardNo` varchar(16) NOT NULL,
  `cvv` int(3) NOT NULL,
  `IssuedDate` varchar(20) NOT NULL,
  `ExpiryDate` varchar(20) NOT NULL,
  `Status` varchar(12) NOT NULL,
  `Verified` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `Create_Date` date NOT NULL DEFAULT current_timestamp(),
  `ProfileColor` varchar(100) NOT NULL,
  `ProfileImage` varchar(400) NOT NULL,
  `Bio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`C_No`, `Account_No`, `C_First_Name`, `C_Last_Name`, `C_Mobile_No`, `C_Email`, `C_Pincode`, `C_Adhar_Doc`, `C_Pan_Doc`, `Create_Date`, `ProfileColor`, `ProfileImage`, `Bio`) VALUES
(1, '1202222150', 'cybergate', 'abel', '07037757724', 'abelchinedu2@gmail.com', '', 'customer_data/SSN_doc/1(1)1222022215049.jpg', 'customer_data/Pan_doc/1(1)1222022215049.jpg', '2022-12-02', '#3b25cf', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `State` int(11) NOT NULL,
  `AuthKey` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `AccountNo`, `Username`, `Password`, `Status`, `State`, `AuthKey`) VALUES
(2, '120222215049', 'cybergate', '298df202fee378a015e518ab7ff37e26', 'Inactive', 0, '0'),
(1, '1234567890', 'Admin', '298df202fee378a015e518ab7ff37e26', 'Super', 1, '982369');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `AccountNo` varchar(12) NOT NULL,
  `FAccountNo` varchar(12) NOT NULL,
  `Name` text NOT NULL,
  `Amount` varchar(100) NOT NULL,
  `Debit` varchar(100) NOT NULL,
  `Credit` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Status` text NOT NULL,
  `ProfileColor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `AccountNo` (`AccountNo`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`srNo`),
  ADD UNIQUE KEY `AccountNo` (`AccountNo`),
  ADD UNIQUE KEY `CardNo` (`CardNo`);

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
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`AccountNo`),
  ADD UNIQUE KEY `Unique` (`ID`),
  ADD UNIQUE KEY `AccountNo` (`AccountNo`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `srNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `C_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
