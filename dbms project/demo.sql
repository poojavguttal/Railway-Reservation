-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 05:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admlog`
--

CREATE TABLE `admlog` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admlog`
--

INSERT INTO `admlog` (`id`, `email`, `password`) VALUES
(1, 'poojaguttal@gmail.com', 'poojaguttal'),
(2, 'jyotsna@gmail.com', 'jyotsnabellary'),
(3, 'srima@gmail.com', 'srimashetty');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trains_display`
--

CREATE TABLE `trains_display` (
  `train_name` varchar(100) NOT NULL,
  `train_number` int(11) NOT NULL,
  `starting_point` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `arrival` datetime NOT NULL,
  `departure` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains_display`
--

INSERT INTO `trains_display` (`train_name`, `train_number`, `starting_point`, `destination`, `arrival`, `departure`) VALUES
('Rajdhani Express', 1234, 'Mumbai central', 'Delhi', '2020-12-22 07:30:00', '2020-12-22 21:00:00'),
('Duron Express', 1345, 'Mumbai central', 'Ernakulum', '2020-12-23 13:00:00', '2020-12-24 05:30:00'),
('Geeta Express', 1456, 'CST', 'Kolkata', '2020-12-24 06:00:00', '2020-12-24 16:30:00'),
('Mysore Express', 3476, 'Talguppa ', 'Mysore Jn', '2020-12-26 16:00:00', '2020-11-27 05:30:00'),
('Garib rath', 4561, 'rajasthan', 'Jammu tawi', '2020-12-25 20:00:00', '2020-11-26 06:00:00'),
('rain chennama', 6544, 'rajasthan', 'mumbai', '2020-12-23 06:00:00', '2020-12-24 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `train_booked`
--

CREATE TABLE `train_booked` (
  `name` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `adhar` int(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `train_booked` varchar(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admlog`
--
ALTER TABLE `admlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains_display`
--
ALTER TABLE `trains_display`
  ADD PRIMARY KEY (`train_number`);

--
-- Indexes for table `train_booked`
--
ALTER TABLE `train_booked`
  ADD PRIMARY KEY (`adhar`),
  ADD KEY `foreign key` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admlog`
--
ALTER TABLE `admlog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `trains_display`
--
ALTER TABLE `trains_display`
  MODIFY `train_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6545;

--
-- AUTO_INCREMENT for table `train_booked`
--
ALTER TABLE `train_booked`
  MODIFY `adhar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9879;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `train_booked`
--
ALTER TABLE `train_booked`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
