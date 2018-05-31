-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: mysql.zakbrinlee.com
-- Generation Time: May 31, 2018 at 12:33 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `central_zak240`
--

-- --------------------------------------------------------

--
-- Table structure for table `Question`
--

CREATE TABLE `Question` (
  `Quest_ID` int(11) NOT NULL,
  `correct` varchar(100) DEFAULT NULL,
  `answer1` varchar(100) DEFAULT NULL,
  `answer2` varchar(100) DEFAULT NULL,
  `answer3` varchar(100) DEFAULT NULL,
  `answer4` varchar(100) DEFAULT NULL,
  `Quest_text` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Question`
--

INSERT INTO `Question` (`Quest_ID`, `correct`, `answer1`, `answer2`, `answer3`, `answer4`, `Quest_text`) VALUES
(1, '$', '&', '*', '@', '$', 'PHP requires each varible to have what character in front of it?'),
(2, 'GET', 'POST', 'GET', 'JSON', 'XML', 'What is the array of varibles that is passed through the URL?'),
(3, 'POST', 'POST ', 'GET', 'JSON', 'XML', '\r\nWhat is the array of variables that is passed through input?'),
(4, 'SQL Injection', 'SQL Dupe', 'SQL insert', 'SQL Injection', 'Query Doping', 'What hack allows a user to input their own SQL code into a website?'),
(5, '<?PHP and ?>', '<PHP and PHP>', '<PHP? and ?>', '<?PHP and ?>', '<script> and </script>', 'Typically, PHP code is begins and ends with what statements?'),
(6, 'PHP: Hypertext Preprocessor', 'Powered Home Program', 'PHP: Hypertext Preprocessor', 'Primary Hypertext Processor', 'Peter Henry Paul', 'What does PHP stand for?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`Quest_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Question`
--
ALTER TABLE `Question`
  MODIFY `Quest_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
