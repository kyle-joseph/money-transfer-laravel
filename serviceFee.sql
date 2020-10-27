-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2020 at 06:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampledb`
--

-- --------------------------------------------------------

--
-- Table structure for table `serviceFee`
--

CREATE TABLE `serviceFee` (
  `id` bigint(20) NOT NULL,
  `min` bigint(20) NOT NULL,
  `max` bigint(20) NOT NULL,
  `charge` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `serviceFee`
--

INSERT INTO `serviceFee` (`id`, `min`, `max`, `charge`) VALUES
(1, 1, 100, 2),
(2, 101, 300, 3),
(3, 301, 500, 8),
(4, 501, 700, 10),
(5, 701, 900, 12),
(6, 901, 1000, 15),
(7, 1001, 1500, 20),
(8, 1501, 2000, 30),
(9, 2001, 2500, 40),
(10, 2501, 3000, 50),
(11, 3001, 3500, 60),
(12, 3501, 4000, 70),
(13, 4001, 5000, 90),
(14, 5001, 7000, 115),
(15, 7001, 9500, 125),
(16, 9501, 10000, 140),
(17, 10001, 14000, 210),
(18, 14001, 15000, 220),
(19, 15001, 20000, 250),
(20, 20001, 30000, 290),
(21, 30001, 40000, 320),
(22, 40001, 50000, 345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `serviceFee`
--
ALTER TABLE `serviceFee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `serviceFee`
--
ALTER TABLE `serviceFee`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
