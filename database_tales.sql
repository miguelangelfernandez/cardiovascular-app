-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 11:54 AM
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
-- Database: `cardiovascular_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `health_indicators`
--

CREATE TABLE `health_indicators` (
                                     `id` int(11) DEFAULT NULL,
                                     `Smoking` char(1) DEFAULT NULL,
                                     `Alcohol` char(1) DEFAULT NULL,
                                     `Physical_activity` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
                            `id` int(11) NOT NULL,
                            `Age` int(11) NOT NULL,
                            `Height` int(11) NOT NULL,
                            `Weight` float NOT NULL,
                            `Gender` char(12) NOT NULL,
                            `Doctor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
                                `id` int(11) DEFAULT NULL,
                                `Date` date NOT NULL,
                                `SVP` int(11) DEFAULT NULL,
                                `DVP` int(11) DEFAULT NULL,
                                `Cholesterol` char(1) DEFAULT NULL,
                                `Glucose` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `username` varchar(255) NOT NULL,
                        `userEmail` varchar(255) NOT NULL,
                        `fullName` varchar(255) NOT NULL,
                        `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `userEmail`, `fullName`, `password`) VALUES
    ('test', 'TEST@TEST', 'test', '098f6bcd4621d373cade4e832627b4f6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health_indicators`
--
ALTER TABLE `health_indicators`
    ADD KEY `id` (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
    ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21212;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `health_indicators`
--
ALTER TABLE `health_indicators`
    ADD CONSTRAINT `health_indicators_ibfk_1` FOREIGN KEY (`id`) REFERENCES `patients` (`id`);

--
-- Constraints for table `test_results`
--
ALTER TABLE `test_results`
    ADD CONSTRAINT `test_results_ibfk_1` FOREIGN KEY (`id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
