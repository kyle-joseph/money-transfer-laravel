-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2020 at 08:13 AM
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
-- Database: `dbMoney`
--

-- --------------------------------------------------------

--
-- Table structure for table `claimed_trans`
--

CREATE TABLE `claimed_trans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `controlNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateClaimed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claimed_trans`
--

INSERT INTO `claimed_trans` (`id`, `controlNumber`, `dateClaimed`) VALUES
(1, 'MTS-20201069478', '2020-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_05_30_115004_create_senders_table', 1),
(3, '2020_05_30_115135_create_sender_addresses_table', 1),
(4, '2020_05_30_115223_create_sender_recipient_transactions_table', 1),
(5, '2020_05_30_115239_create_transactions_table', 1),
(6, '2020_05_30_120603_create_recipients_table', 1),
(7, '2020_05_30_120613_create_recipient_addresses_table', 1),
(8, '2020_06_02_083251_create_claimed_trans_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipientId` bigint(20) NOT NULL,
  `recipientFirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `recipientLastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `recipientNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipients`
--

INSERT INTO `recipients` (`id`, `recipientId`, `recipientFirstName`, `recipientLastName`, `recipientNumber`) VALUES
(1, 202010273804, 'Kahlil', 'Timajo', '09569856321'),
(2, 202010275942, 'Antonia', 'Orao', '09458526321'),
(3, 202010278693, 'Kenneth', 'Popera', '09874563210');

-- --------------------------------------------------------

--
-- Table structure for table `recipient_addresses`
--

CREATE TABLE `recipient_addresses` (
  `recipientId` bigint(20) NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `cityMun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipient_addresses`
--

INSERT INTO `recipient_addresses` (`recipientId`, `barangay`, `cityMun`, `province`) VALUES
(202010273804, 'Bulua', 'Cagayan de Oro', 'Misamis Oriental'),
(202010275942, 'Guinoyuran', 'Valencia', 'Bukidnon'),
(202010278693, 'Patag', 'Cagayan de Oro', 'Misamis Oriental');

-- --------------------------------------------------------

--
-- Table structure for table `senders`
--

CREATE TABLE `senders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `senderId` bigint(20) NOT NULL,
  `senderFirstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `senderLastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `senderNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `senders`
--

INSERT INTO `senders` (`id`, `senderId`, `senderFirstName`, `senderLastName`, `senderNumber`) VALUES
(1, 202010273804, 'Karizza', 'Timajo', '09245256321'),
(2, 202010275942, 'Kurt', 'Timajo', '09542135869'),
(3, 202010278693, 'Kyle Joseph', 'Timajo', '09563214452');

-- --------------------------------------------------------

--
-- Table structure for table `sender_addresses`
--

CREATE TABLE `sender_addresses` (
  `senderId` bigint(20) NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `cityMun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A',
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_addresses`
--

INSERT INTO `sender_addresses` (`senderId`, `barangay`, `cityMun`, `province`) VALUES
(202010273804, 'Compol', 'Catarman', 'Camiguin'),
(202010275942, 'Poblacion', 'Catarman', 'Camiguin'),
(202010278693, 'Compol', 'Catarman', 'Camiguin');

-- --------------------------------------------------------

--
-- Table structure for table `sender_recipient_transactions`
--

CREATE TABLE `sender_recipient_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `senderId` bigint(20) NOT NULL,
  `recipientId` bigint(20) NOT NULL,
  `controlNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_recipient_transactions`
--

INSERT INTO `sender_recipient_transactions` (`id`, `senderId`, `recipientId`, `controlNumber`) VALUES
(1, 202010273804, 202010273804, 'MTS-20201071462'),
(2, 202010275942, 202010275942, 'MTS-20201095721'),
(3, 202010278693, 202010278693, 'MTS-20201069478');

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

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `controlNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint(20) NOT NULL,
  `serviceFee` bigint(20) NOT NULL,
  `sendDate` datetime NOT NULL,
  `expiryDate` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `controlNumber`, `amount`, `serviceFee`, `sendDate`, `expiryDate`, `status`) VALUES
(1, 'MTS-20201071462', 10000, 140, '2020-10-27 05:37:07', '2020-11-26', 'unclaimed'),
(2, 'MTS-20201095721', 500, 8, '2020-10-27 05:38:30', '2020-11-26', 'unclaimed'),
(3, 'MTS-20201069478', 10000, 140, '2020-10-27 05:42:25', '2020-11-26', 'claimed');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$MLt.kVZVhBTGNJounRyri.q47aURSyRcFnu2PcIDn5HQ9WCsvxTf.', '2020-10-26 21:20:49', '2020-10-26 21:20:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claimed_trans`
--
ALTER TABLE `claimed_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senders`
--
ALTER TABLE `senders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sender_recipient_transactions`
--
ALTER TABLE `sender_recipient_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceFee`
--
ALTER TABLE `serviceFee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `claimed_trans`
--
ALTER TABLE `claimed_trans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `senders`
--
ALTER TABLE `senders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sender_recipient_transactions`
--
ALTER TABLE `sender_recipient_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `serviceFee`
--
ALTER TABLE `serviceFee`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
