-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 03:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `age` int(2) NOT NULL,
  `salary` varchar(10) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `email`, `age`, `salary`, `phone`) VALUES
(1, 'yssyogesh', 'Yogesh', 'singh', 'yssyogesh@makitweb.com', 23, '24000', '7445542178'),
(2, 'sonarika', 'Sonarika', 'Bhadoria', 'sonarika@gmail.com', 23, '44000', '7898455412'),
(3, 'akilesh', 'Akilesh', 'sahu', 'akilesh93@gmail.com', 24, '32000', '9355447788'),
(4, 'shreya', 'Shreya', 'Joshi', 'shreya@gmail.com', 24, '25000', '8745112145'),
(5, 'ajay', 'Ajay', 'Singh', 'ajaysingh@gmail.com', 25, '31000', '9449662821'),
(6, 'vijay', 'Vijay', 'maurya', 'vijayec@gmail.com', 24, '26000', '7885251444'),
(7, 'sunil', 'Sunil', 'singh', 'sunilsingh94@gmail.com', 23, '27000', '9988784555'),
(8, 'vishal', 'Vishal', 'sahu', 'vishal92@gmail.com', 25, '44000', '9988553322'),
(9, 'mukesh', 'Mukesh', 'sharma', 'mukesh@gmail.com', 26, '32000', '8754451221'),
(10, 'nitin', 'Nitin', 'singh', 'nitin@gmail.com', 27, '38000', '9545217833');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
