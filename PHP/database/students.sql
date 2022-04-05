-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 11:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `carCode` int(11) NOT NULL,
  `carName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='טבלה לשמירת רכבים';

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carCode`, `carName`) VALUES
(1, 'Honda'),
(2, 'Mazda'),
(3, 'Suzuki'),
(4, 'Hyundai'),
(5, 'Kia');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityCode` int(11) NOT NULL,
  `cityName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='טבלה לשמירת שמות ערים';

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityCode`, `cityName`) VALUES
(1, 'Haifa'),
(2, 'Tel-Aviv'),
(3, 'Jeruslam'),
(4, 'Eilat'),
(5, 'Zfat');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `cityCode` int(11) NOT NULL,
  `carCode` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `userPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='פרטים אישיים של משתמשים';

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `cityCode`, `carCode`, `username`, `userPassword`) VALUES
(205923758, 'naor', 'ezra', 1, 5, 'naor', '$2y$10$43dMfzUjadyecyGoSfFOIuDK4GHosZIKEzzsqHwovjitFFJaBD1AG'),
(316165026, 'Shira', 'Alon', 1, 2, 'Shira', '$2y$10$TlRUfiRA1YZLORY1fmSBb.4IIb6Z1/Ygd7Hi9KUzZ8cugA6pyrnEO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD UNIQUE KEY `carCode` (`carCode`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityCode`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `existingCity` (`cityCode`),
  ADD KEY `carExist` (`carCode`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `persons`
--
ALTER TABLE `persons`
  ADD CONSTRAINT `carExist` FOREIGN KEY (`carCode`) REFERENCES `cars` (`carCode`),
  ADD CONSTRAINT `existingCity` FOREIGN KEY (`cityCode`) REFERENCES `city` (`cityCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
