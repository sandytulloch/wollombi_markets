-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2017 at 01:49 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wollombi_markets`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `datetime` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `datetime`) VALUES
(1, 1, '2017-04-10 20:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0',
  `outline` varchar(3000) NOT NULL DEFAULT '0',
  `reserve_date` datetime DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `number`, `outline`, `reserve_date`, `price`) VALUES
(1, 1, '', '0000-00-00 00:00:00', 20),
(2, 2, '', '0000-00-00 00:00:00', 20),
(3, 3, '', '2017-04-10 21:42:05', 20),
(4, 4, '', '0000-00-00 00:00:00', 20),
(5, 5, '', '0000-00-00 00:00:00', 20),
(6, 6, '', '0000-00-00 00:00:00', 20),
(7, 7, '', '0000-00-00 00:00:00', 20),
(8, 8, '', '0000-00-00 00:00:00', 20),
(9, 9, '', '0000-00-00 00:00:00', 20),
(10, 10, '', '0000-00-00 00:00:00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `site_bookings`
--

CREATE TABLE `site_bookings` (
  `id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL DEFAULT '0',
  `booking_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `site_bookings`
--

INSERT INTO `site_bookings` (`id`, `site_id`, `booking_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL DEFAULT '0',
  `password` varchar(200) NOT NULL DEFAULT '0',
  `first_name` varchar(200) NOT NULL DEFAULT '0',
  `last_name` varchar(200) NOT NULL DEFAULT '0',
  `phone_number` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `phone_number`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'Harry', 'Montano', '+61435002891');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_site_status`
-- (See below for the actual view)
--
CREATE TABLE `vw_site_status` (
`id` int(11)
,`number` int(11)
,`outline` text
,`Status` varchar(8)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_site_status`
--
DROP TABLE IF EXISTS `vw_site_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_site_status`  AS  select `sites`.`id` AS `id`,`sites`.`number` AS `number`,`sites`.`outline` AS `outline`,'Empty' AS `Status` from (`sites` left join `site_bookings` on((`site_bookings`.`site_id` = `sites`.`id`))) where (isnull(`site_bookings`.`id`) and ((round(((unix_timestamp(now()) - unix_timestamp(`sites`.`reserve_date`)) / 60),0) >= 10) or (`sites`.`reserve_date` = 0))) union select `sites`.`id` AS `id`,`sites`.`number` AS `number`,`sites`.`outline` AS `outline`,'Booked' AS `Status` from (`sites` left join `site_bookings` on((`site_bookings`.`site_id` = `sites`.`id`))) where (`site_bookings`.`id` is not null) union select `sites`.`id` AS `id`,`sites`.`number` AS `number`,`sites`.`outline` AS `outline`,'Reserved' AS `Status` from (`sites` left join `site_bookings` on((`site_bookings`.`site_id` = `sites`.`id`))) where (isnull(`site_bookings`.`id`) and (round(((unix_timestamp(now()) - unix_timestamp(`sites`.`reserve_date`)) / 60),0) < 10)) order by `number` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_bookings`
--
ALTER TABLE `site_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `site_bookings`
--
ALTER TABLE `site_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
