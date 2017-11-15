-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 07:06 PM
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
(2, 'pcdv15', '$2y$10$2tl.Mn.XJtggIpZblBMKJOUtUrIj9yxjQ3leJsAPC099uCr0RfqVO'),
(3, 'frtz', '$2y$10$pKFCL/D1X9wJdEQHzXh2Z.cyx/Zbdc3cD1S7Ll6xv6f4W28LB/1fy'),
(4, 'taton', '$2y$10$eJv7Km6EAHbmzgqIPAXdU.6teZx.i.1bUJdO2jnmzl7N97QVeUKFC');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(3) NOT NULL,
  `room_num` int(3) NOT NULL,
  `type` varchar(15) NOT NULL,
  `available` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_num`, `type`, `available`) VALUES
(1, 301, 'VIP', 1),
(2, 302, 'VIP', 1),
(3, 303, 'VIP', 1),
(4, 201, 'DELUXE', 1),
(5, 202, 'DELUXE', 1),
(6, 203, 'DELUXE', 1),
(7, 204, 'DELUXE', 1),
(8, 205, 'DELUXE', 1),
(9, 101, 'STANDARD', 1),
(10, 102, 'STANDARD', 1),
(11, 103, 'STANDARD', 1),
(12, 104, 'STANDARD', 1),
(13, 105, 'STANDARD', 1),
(14, 106, 'STANDARD', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstname`, `lastname`, `address`, `email`, `dateofbirth`, `create_date`) VALUES
(2, 'Paul', 'Villanueva', 'Davao City', 'paulvillanueva2012@gmail.com', '1998-01-15', '2017-11-12 09:26:06'),
(3, 'Fritz', 'Getigan', 'Samal', 'frtz@gmail.com', '1111-11-11', '2017-11-12 10:04:03'),
(4, 'Theona', 'Aton', 'Davao', 'aton@mail.com', '1111-11-11', '2017-11-13 01:17:42'),
(10, 'Barry', 'Allen', 'Central City', 'theflash@gmail.com', '1970-01-01', '2017-11-15 11:04:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
