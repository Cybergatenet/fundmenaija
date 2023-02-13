-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 06:01 PM
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
-- Table structure for table `_issues`
--

CREATE TABLE `_issues` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `avatar` text NOT NULL,
  `issue_title` varchar(255) NOT NULL,
  `issue_body` text NOT NULL,
  `issue_time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_issues`
--

INSERT INTO `_issues` (`id`, `user_id`, `user_username`, `avatar`, `issue_title`, `issue_body`, `issue_time`) VALUES
(1, '1', 'cybergate', 'user.jpg', 'School Fees', 'This is a welcome message to all our users who wish to raise fund for their business or academics. Thank you for signing in the our site. We promise to bring you amazing features that will improve and grace your life. Stay tune for much more. Or visit our about us page for more information.', 'date(\'g:i a\')'),
(2, '1', 'cybergate', 'issue.jpg', 'House Rent', 'We believe in building the life we deserve through innovation and creativity. This is a welcome message to all our users who wish to raise fund for their business or academics. Thank you for signing in the our site. We promise to bring you amazing features that will improve and grace your life. Stay tune for much more. Or visit our about us page for more information.', 'date(\'g:i a\')'),
(3, '1', 'cybergate', 'user.jpg', 'Church Project', 'We believe in building the life we deserve through innovation and creativity. This is a welcome message to all our users who wish to raise fund for their business or academics. Thank you for signing in the our site. We promise to bring you amazing features that will improve and grace your life. Stay tune for much more. Or visit our about us page for more information.', 'date(\'g:i a\')');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `_issues`
--
ALTER TABLE `_issues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `_issues`
--
ALTER TABLE `_issues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
