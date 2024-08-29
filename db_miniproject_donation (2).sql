-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2024 at 01:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_miniproject_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldoner`
--

CREATE TABLE `tbldoner` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `purpose` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldoner`
--

INSERT INTO `tbldoner` (`id`, `name`, `date`, `amount`, `phone`, `purpose`) VALUES
(225, '﻿Amit Kumar', '2024-08-01', 500, 9876543210, 'Education'),
(226, 'Priya Sharma', '2024-08-02', 1000, 9123456789, 'Healthcare'),
(227, 'Rajesh Patel', '2024-08-03', 1500, 8765432109, 'Environment'),
(228, 'Sita Devi', '2024-08-04', 2000, 9876012345, 'Relief Fund'),
(229, 'Ravi Singh', '2024-08-05', 2500, 9123987654, 'Community Development'),
(230, 'Anita Verma', '2024-08-06', 3000, 8765098765, 'Women Empowerment'),
(231, 'Vikram Rao', '2024-08-07', 3500, 9876541230, 'Disaster Relief'),
(232, 'Geeta Rani', '2024-08-08', 4000, 9123456780, 'Child Welfare'),
(233, 'Sunil Kumar', '2024-08-09', 4500, 8765432108, 'Education'),
(234, 'Meera Joshi', '2024-08-10', 5000, 9876098765, 'Healthcare');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldoner`
--
ALTER TABLE `tbldoner`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldoner`
--
ALTER TABLE `tbldoner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
