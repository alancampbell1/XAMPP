-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2018 at 03:06 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ReadingList`
--

-- --------------------------------------------------------

--
-- Table structure for table `Records`
--

CREATE TABLE `Records` (
  `ID` int(11) NOT NULL,
  `theDate` date NOT NULL DEFAULT '2018-04-20',
  `name` text NOT NULL,
  `URL` text NOT NULL,
  `theDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Records`
--

INSERT INTO `Records` (`ID`, `theDate`, `name`, `URL`, `theDesc`) VALUES
(2, '2018-04-20', 'Alan', 'www.google.ie', 'another website'),
(3, '2018-04-20', 'Stephen', 'youtube.com', 'video site'),
(6, '2018-04-20', 'Conor', 'thejournal.ie', 'news site'),
(7, '2018-04-20', 'jack', 'entertainment.ie', 'gossip'),
(8, '2018-04-20', 'Alan Campbell', 'Facebook.com', 'search engine'),
(12, '2018-04-20', 'Mark', 'rte.ie', 'news'),
(13, '2018-04-20', 'Alan', 'Facebook.com', 'search engine'),
(14, '2018-04-20', 'Alan', 'www.google.ie', 'desc'),
(18, '2018-04-20', 'Denis', 'www.google.ie', 'search engine'),
(19, '2018-04-20', 'Denis', 'youtube.com', 'video site'),
(20, '2018-04-20', 'Mark', 'www.google.ie', 'desc'),
(25, '2018-04-20', 'Denis', 'twitter', 'search engine'),
(26, '2018-04-20', 'Mark', 'yahoo.com', 'another website'),
(28, '2018-04-20', 'Denis', 'twitter', 'video site'),
(30, '2018-04-20', 'Alan Campbell', 'youtube.com', 'search engine'),
(31, '2018-04-20', 'Denis', 'Facebook.com', 'another website'),
(32, '2018-04-20', 'James', 'youtube.com', 'video site'),
(33, '2018-04-20', 'Alan', 'Facebook.com', 'video site'),
(34, '2018-04-20', 'Alan', 'yahoo.com', 'search engine'),
(35, '2018-04-20', 'Alan', 'Facebook.com', 'search engine'),
(36, '2018-04-20', 'jake', 'linkedin.com', 'job social media');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Records`
--
ALTER TABLE `Records`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Records`
--
ALTER TABLE `Records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
