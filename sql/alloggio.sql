-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 08:17 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alloggio`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `transaction_id` int(99) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `accom_type` varchar(15) NOT NULL,
  `room_num` int(3) NOT NULL,
  `arrive_depart` varchar(50) NOT NULL,
  `num_night` int(3) NOT NULL,
  `total_paid` bigint(99) NOT NULL,
  `checkout` tinyint(4) NOT NULL,
  `booked_date` timestamp NOT NULL,
  `creditcard_num` bigint(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`transaction_id`, `customer`, `uid`, `accom_type`, `room_num`, `arrive_depart`, `num_night`, `total_paid`, `checkout`, `booked_date`, `creditcard_num`) VALUES
(1, 'Paul Villanueva', 2, 'STANDARD', 101, 'Thu Nov 16th, 2017 - Fri Nov 17th, 2017', 1, 1000, 1, '2017-11-16 14:46:07', 123456123456),
(2, 'Paul Villanueva', 2, 'SUITE', 301, 'Thu Nov 16th, 2017 - Fri Nov 17th, 2017', 1, 5000, 1, '2017-11-16 14:52:06', 123456123456),
(3, 'Fritz Getigan', 3, 'DELUXE', 203, 'Thu Nov 16th, 2017 - Mon Nov 20th, 2017', 4, 12000, 1, '2017-11-16 15:03:08', 456456123123),
(4, 'Paul Villanueva', 2, 'DELUXE', 205, 'Fri Nov 17th, 2017 - Mon Nov 20th, 2017', 3, 9000, 1, '2017-11-17 14:49:42', 123123123123),
(5, 'Paul Villanueva', 2, 'SUITE', 302, 'Tue Nov 21st, 2017 - Thu Nov 23rd, 2017', 2, 10000, 1, '2017-11-18 00:57:59', 123123123123),
(6, 'Paul Villanueva', 2, 'STANDARD', 105, 'Sat Nov 18th, 2017 - Thu Nov 30th, 2017', 12, 12000, 0, '2017-11-18 05:51:58', 123123123123),
(7, 'Theona Aton', 4, 'DELUXE', 201, 'Sat Nov 18th, 2017 - Sun Nov 19th, 2017', 1, 3000, 1, '2017-11-18 06:36:14', 654321654321);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `username`, `password`) VALUES
(2, 'pcdv15', '$2y$10$IJbcLFFj0UmsEfBJ/JI96ecddLtU172t/8hT4P36Z8wynNIDGeySi'),
(3, 'frtz', '$2y$10$pKFCL/D1X9wJdEQHzXh2Z.cyx/Zbdc3cD1S7Ll6xv6f4W28LB/1fy');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(3) NOT NULL,
  `room_num` int(3) NOT NULL,
  `type` varchar(15) NOT NULL,
  `available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_num`, `type`, `available`) VALUES
(9, 101, 'STANDARD', 1),
(10, 102, 'STANDARD', 1),
(11, 103, 'STANDARD', 1),
(12, 104, 'STANDARD', 1),
(13, 105, 'STANDARD', 0),
(14, 106, 'STANDARD', 1),
(4, 201, 'DELUXE', 1),
(5, 202, 'DELUXE', 1),
(6, 203, 'DELUXE', 1),
(7, 204, 'DELUXE', 1),
(8, 205, 'DELUXE', 1),
(1, 301, 'SUITE', 1),
(2, 302, 'SUITE', 1),
(3, 303, 'SUITE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `create_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstname`, `lastname`, `address`, `email`, `dateofbirth`, `create_date`) VALUES
(2, 'Paul', 'Villanueva', 'Davao City', 'paulvillanueva2012@gmail.com', '1998-01-15', '2017-11-12 09:26:06'),
(3, 'Fritz', 'Getigan', 'Samal', 'frtz@gmail.com', '1111-11-11', '2017-11-12 10:04:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_num`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `transaction_id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `userinfo` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
