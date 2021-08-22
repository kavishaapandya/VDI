-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2021 at 12:16 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vdi`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(4) NOT NULL,
  `category` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Personal Documents', '2021-08-22 16:33:46', '2021-08-22 16:33:46'),
(2, 'Canadian Entity Documents', '2021-08-22 16:33:46', '2021-08-22 16:33:46'),
(3, 'Current Entity Documents', '2021-08-22 16:34:34', '2021-08-22 16:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 2, 'Potential Clients in North Ame', '2021-08-22 16:40:04', '2021-08-22 16:40:04'),
(6, 3, 'Vendor Contracts', '2021-08-22 16:41:30', '2021-08-22 16:41:30'),
(8, 3, 'Technology and Intellectual Pr', '2021-08-22 16:41:30', '2021-08-22 16:41:30'),
(13, 2, 'North American Client List', '2021-08-22 21:53:46', '2021-08-22 21:53:46'),
(15, 3, 'Lease Contracts', '2021-08-22 21:54:45', '2021-08-22 21:54:45'),
(17, 1, 'Photo', '2021-08-22 22:02:42', '2021-08-22 22:02:42'),
(18, 1, 'Passport', '2021-08-22 22:02:42', '2021-08-22 22:02:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
