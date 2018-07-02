-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2018 at 12:05 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maildb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `msg_id` int(11) NOT NULL,
  `cr_box_id` varchar(16) NOT NULL,
  `rec_box_id` varchar(16) NOT NULL,
  `creator_id` varchar(50) NOT NULL,
  `recipient_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `msg_body` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`msg_id`, `cr_box_id`, `rec_box_id`, `creator_id`, `recipient_id`, `subject`, `msg_body`, `create_date`) VALUES
(1, 'R1', 'E1', 'roxy', 'emil', 'University', 'Hey, how is university going for you?', '2018-07-01'),
(2, 'J1', 'E1', 'jenny', 'emil', 'Walk in the park', 'Hey, how about going to the park?', '2018-07-02'),
(3, 'J1', 'R1', 'jenny', 'roxy', 'Homework', 'Hey, Roxy, can you help me with my homework?', '2018-07-02'),
(4, 'R1', 'J1', 'roxy', 'jenny', 'Homework', 'Of course!', '2018-07-02'),
(5, 'R1', 'E1', 'anonymous', 'emil', 'Test', 'These are the answers to the test:\r\n1- a,\r\n2- c,\r\n3- a,\r\n4- d,\r\n5- d,\r\n6- b,\r\n7- a', '2018-07-02'),
(7, 'E1', 'J1', 'emil', 'jenny', 'Beach party', 'Hey, there will be a beach party tonight at 9 p.m.', '2018-07-02'),
(8, 'J1', 'E1', 'jenny', 'emil', 'Beach party', 'Hey, I would love to come.', '2018-07-02'),
(9, 'R1', 'E1', 'roxy', 'emil', 'Beach party', 'Oh, nice! I will be there.', '2018-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `sent`
--

CREATE TABLE `sent` (
  `msg_id` int(11) NOT NULL,
  `cr_box_id` varchar(16) NOT NULL,
  `rec_box_id` varchar(16) NOT NULL,
  `creator_id` varchar(50) NOT NULL,
  `recipient_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `msg_body` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sent`
--

INSERT INTO `sent` (`msg_id`, `cr_box_id`, `rec_box_id`, `creator_id`, `recipient_id`, `subject`, `msg_body`, `create_date`) VALUES
(1, 'R1', 'E1', 'roxy', 'emil', 'University', 'Hey, how is university going for you?', '2018-07-01'),
(2, 'J1', 'E1', 'jenny', 'emil', 'Walk in the park', 'Hey, how about going to the park?', '2018-07-02'),
(3, 'J1', 'R1', 'jenny', 'roxy', 'Homework', 'Hey, Roxy, can you help me with my homework?', '2018-07-02'),
(5, 'R1', 'E1', 'anonymous', 'emil', 'Test', 'These are the answers to the test:\r\n1- a,\r\n2- c,\r\n3- a,\r\n4- d,\r\n5- d,\r\n6- b,\r\n7- a', '2018-07-02'),
(6, 'E1', 'R1', 'emil', 'roxy', 'Beach party', 'Hey, there will be a beach party tonight at 9 p.m.', '2018-07-02'),
(7, 'E1', 'J1', 'emil', 'jenny', 'Beach party', 'Hey, there will be a beach party tonight at 9 p.m.', '2018-07-02'),
(8, 'J1', 'E1', 'jenny', 'emil', 'Beach party', 'Hey, I would love to come.', '2018-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `trash`
--

CREATE TABLE `trash` (
  `trash_id` int(11) NOT NULL,
  `box_id` varchar(16) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `creator_id` varchar(50) NOT NULL,
  `recipient_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `messege` text NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userboxes`
--

CREATE TABLE `userboxes` (
  `box_id` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userboxes`
--

INSERT INTO `userboxes` (`box_id`, `user_id`, `create_date`) VALUES
('E1', 1, '2018-06-27'),
('J1', 5, '2018-06-27'),
('M1', 4, '2018-06-28'),
('R1', 2, '2018-06-27'),
('R2', 2, '2018-06-27'),
('R3', 2, '2018-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `birth_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `birth_date`) VALUES
(1, 'emil', '$2y$10$cNbyPgYXrB1cpD5grt1Hr.8bniHYNqNXZdzHmnu1HrNQdVtC3Zxau', 'Emil Petrov', '1996-06-18'),
(2, 'roxy', '$2y$10$zf5ozBX4NWiq/eQ0rggideafwlx5uN/jzq0fUmzBZd2AU5Uzp4Bkm', 'Roxy Yaneva', '1996-01-01'),
(3, 'vanko', '$2y$10$IyM5N31mWKAngE3KNS0R1.y7mOsfIbSiHihq5pUXNE/9kdIsgoe2O', 'Ivan Ivanov', '2001-01-10'),
(4, 'marty', '$2y$10$owzIqJAbfJgtCo4EzPtAzOXPFMeVLWLbBsMCFo9QMA8dDodz0RRL2', 'Martina Rosenova', '2000-02-10'),
(5, 'jenny', '$2y$10$foaRTpIgQq9k3ZzBe5B/BOm11ypzzgR7OyKE5eycXTMWwCyjBjamG', 'Jenny', '1994-11-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `sent`
--
ALTER TABLE `sent`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `trash`
--
ALTER TABLE `trash`
  ADD PRIMARY KEY (`trash_id`);

--
-- Indexes for table `userboxes`
--
ALTER TABLE `userboxes`
  ADD PRIMARY KEY (`box_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trash`
--
ALTER TABLE `trash`
  MODIFY `trash_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
