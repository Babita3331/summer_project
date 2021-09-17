-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 10:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_details`
--

CREATE TABLE `room_booking_details` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `roomType` varchar(100) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_in_time` varchar(6) NOT NULL,
  `check_out_date` date NOT NULL,
  `Occupancy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_booking_details`
--

INSERT INTO `room_booking_details` (`id`, `email`, `roomType`, `check_in_date`, `check_in_time`, `check_out_date`, `Occupancy`) VALUES
(53, 'ram@hotmail.com', 'Standard Room', '2021-09-09', '12:42', '2021-09-09', 'twin'),
(54, 'ram@hotmail.com', 'Luxurious Suite', '2021-09-16', '12:44', '2021-09-24', 'single'),
(64, 'babira23@gmail.com', 'Luxurious Suite', '2021-09-10', '16:10', '2021-09-10', 'single'),
(65, 'babira23@gmail.com', 'Parking Area', '2021-09-03', '17:46', '2021-09-10', 'twin'),
(94, 'babira23@gmail.com', 'Twin Deluxe Room', '2021-09-10', '03:43', '2021-09-11', 'single'),
(96, 'babira23@gmail.com', 'Standard Room', '2021-09-17', '13:47', '2021-09-10', 'single');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_booking_details`
--
ALTER TABLE `room_booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
