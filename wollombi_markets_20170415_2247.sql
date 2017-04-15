-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2017 at 02:46 PM
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
  `datetime` varchar(200) DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `datetime`, `ip_address`) VALUES
(1, 1, '2017-04-10 20:53:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reserve_start_time` datetime NOT NULL,
  `reserve_finish_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `reserve_start_time`, `reserve_finish_time`) VALUES
(41, 1, '2017-04-15 18:18:55', '2017-04-15 19:30:48'),
(42, 1, '2017-04-15 19:30:08', '2017-04-15 19:30:48'),
(43, 1, '2017-04-15 19:30:48', '2017-04-15 19:31:27'),
(44, 1, '2017-04-15 19:31:27', '2017-04-15 19:34:38'),
(45, 1, '2017-04-15 19:34:38', '2017-04-15 19:34:55'),
(46, 1, '2017-04-15 19:34:55', '2017-04-15 19:36:45'),
(47, 1, '2017-04-15 19:36:45', '2017-04-15 19:39:12'),
(48, 1, '2017-04-15 19:39:12', '2017-04-15 19:42:23'),
(49, 1, '2017-04-15 19:42:23', '2017-04-15 19:58:21'),
(50, 1, '2017-04-15 19:58:21', '2017-04-15 19:59:00'),
(51, 1, '2017-04-15 19:59:00', '2017-04-15 19:59:41'),
(52, 1, '2017-04-15 19:59:41', '2017-04-15 20:01:28'),
(53, 1, '2017-04-15 20:01:28', '2017-04-15 20:02:10'),
(54, 1, '2017-04-15 20:02:10', '2017-04-15 20:16:54'),
(55, 1, '2017-04-15 20:16:54', '2017-04-15 20:18:40'),
(56, 1, '2017-04-15 20:18:40', '2017-04-15 20:19:02'),
(57, 1, '2017-04-15 20:19:02', '2017-04-15 20:19:44'),
(58, 1, '2017-04-15 20:19:44', '2017-04-15 20:19:56'),
(59, 1, '2017-04-15 20:19:56', '2017-04-15 20:20:03'),
(60, 1, '2017-04-15 20:20:03', '2017-04-15 20:20:27'),
(61, 1, '2017-04-15 20:20:27', '2017-04-15 20:20:41'),
(62, 1, '2017-04-15 20:20:41', '2017-04-15 20:21:17'),
(63, 1, '2017-04-15 20:21:17', '2017-04-15 20:24:39'),
(64, 1, '2017-04-15 20:24:39', '2017-04-15 20:33:14'),
(65, 1, '2017-04-15 20:33:14', '2017-04-15 20:34:28'),
(66, 1, '2017-04-15 20:34:28', '2017-04-15 20:53:28'),
(67, 1, '2017-04-15 20:53:28', '2017-04-15 20:54:04'),
(68, 1, '2017-04-15 20:54:04', '2017-04-15 21:28:10'),
(69, 1, '2017-04-15 21:28:10', '2017-04-15 21:28:41'),
(70, 1, '2017-04-15 21:28:41', '2017-04-15 21:28:59'),
(71, 1, '2017-04-15 21:28:59', '2017-04-15 21:29:34'),
(72, 1, '2017-04-15 21:29:34', '2017-04-15 21:29:43'),
(73, 1, '2017-04-15 21:29:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0',
  `outline` varchar(3000) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `number`, `outline`, `price`) VALUES
(1, 1, '[[-0.567187488079071,2.378124952316284],[-0.38749998807907104,2.378124952316284],[-0.38749998807907104,2.534374952316284],[-0.567187488079071,2.534374952316284]]', 20),
(2, 2, '[[-0.551562488079071,2.221874952316284],[-0.37968748807907104,2.221874952316284],[-0.37968748807907104,2.378124952316284],[-0.551562488079071,2.378124952316284]]', 20),
(3, 3, '[[-0.567187488079071,2.049999952316284],[-0.37968748807907104,2.049999952316284],[-0.37968748807907104,2.221874952316284],[-0.567187488079071,2.221874952316284]]', 20),
(4, 4, '[[-0.567187488079071,1.8781249523162842],[-0.37968748807907104,1.8781249523162842],[-0.37968748807907104,2.042187452316284],[-0.567187488079071,2.042187452316284]]', 20),
(5, 5, '[[-0.551562488079071,1.7218749523162842],[-0.37968748807907104,1.7218749523162842],[-0.37968748807907104,1.8781249523162842],[-0.551562488079071,1.8781249523162842]]', 20),
(6, 6, '[[-0.567187488079071,1.5499999523162842],[-0.37968748807907104,1.5499999523162842],[-0.37968748807907104,1.7218749523162842],[-0.567187488079071,1.7218749523162842]]', 20),
(7, 7, '[[-0.567187488079071,1.3781249523162842],[-0.38749998807907104,1.3781249523162842],[-0.38749998807907104,1.5499999523162842],[-0.567187488079071,1.5499999523162842]]', 20),
(8, 8, '[[-0.551562488079071,1.2218749523162842],[-0.38749998807907104,1.2218749523162842],[-0.38749998807907104,1.3781249523162842],[-0.551562488079071,1.3781249523162842]]', 20),
(9, 9, '[[-0.567187488079071,1.0499999523162842],[-0.37968748807907104,1.0499999523162842],[-0.37968748807907104,1.2218749523162842],[-0.567187488079071,1.2218749523162842]]', 20),
(10, 10, '[[-0.567187488079071,0.8781249523162842],[-0.36406248807907104,0.8781249523162842],[-0.36406248807907104,1.0421874523162842],[-0.567187488079071,1.0421874523162842]]', 20);

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
-- Table structure for table `site_reservations`
--

CREATE TABLE `site_reservations` (
  `site_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_reservations`
--

INSERT INTO `site_reservations` (`site_id`, `reservation_id`) VALUES
(4, 68),
(3, 71),
(3, 72),
(3, 73);

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
(1, 'montano.harry@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Harry', 'Montano', '+61435002891'),
(2, 'sandy.tulloch@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'Sandy', 'Tulloch', '0433383998');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_active_reservations`
-- (See below for the actual view)
--
CREATE TABLE `vw_active_reservations` (
`id` int(11)
,`site_id` int(11)
,`user_id` int(11)
,`reserve_start_time` datetime
,`reserve_finish_time` datetime
);

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
,`held_by` varchar(11)
);

-- --------------------------------------------------------

--
-- Structure for view `vw_active_reservations`
--
DROP TABLE IF EXISTS `vw_active_reservations`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_active_reservations`  AS  select `reservations`.`id` AS `id`,`site_reservations`.`site_id` AS `site_id`,`reservations`.`user_id` AS `user_id`,`reservations`.`reserve_start_time` AS `reserve_start_time`,`reservations`.`reserve_finish_time` AS `reserve_finish_time` from (`reservations` left join `site_reservations` on((`site_reservations`.`reservation_id` = `reservations`.`id`))) where ((round(((unix_timestamp(now()) - unix_timestamp(`reservations`.`reserve_start_time`)) / 60),0) <= 30) and (`reservations`.`reserve_finish_time` = 0)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_site_status`
--
DROP TABLE IF EXISTS `vw_site_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_site_status`  AS  select `sites`.`id` AS `id`,`sites`.`number` AS `number`,`sites`.`outline` AS `outline`,'Empty' AS `Status`,'' AS `held_by` from ((`sites` left join `vw_active_reservations` on((`vw_active_reservations`.`site_id` = `sites`.`id`))) left join `site_bookings` on((`site_bookings`.`site_id` = `sites`.`id`))) where (isnull(`vw_active_reservations`.`id`) and isnull(`site_bookings`.`id`)) union select `sites`.`id` AS `id`,`sites`.`number` AS `number`,`sites`.`outline` AS `outline`,'Reserved' AS `Status`,`vw_active_reservations`.`user_id` AS `held_by` from ((`sites` left join `vw_active_reservations` on((`vw_active_reservations`.`site_id` = `sites`.`id`))) left join `site_bookings` on((`site_bookings`.`site_id` = `sites`.`id`))) where ((`vw_active_reservations`.`id` is not null) and isnull(`site_bookings`.`id`)) union select `sites`.`id` AS `id`,`sites`.`number` AS `number`,`sites`.`outline` AS `outline`,'Booked' AS `Status`,`bookings`.`user_id` AS `held_by` from (((`sites` left join `vw_active_reservations` on((`vw_active_reservations`.`site_id` = `sites`.`id`))) left join `site_bookings` on((`site_bookings`.`site_id` = `sites`.`id`))) left join `bookings` on((`bookings`.`id` = `site_bookings`.`booking_id`))) where (`site_bookings`.`id` is not null) order by `number` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
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
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
