-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 06:53 PM
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
-- Database: `registration_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `role` enum('admin','teacher','student') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `profile_picture` varchar(255) DEFAULT NULL,
  `current_password` varchar(255) NOT NULL,
  `new_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `id_no`, `pic`, `sex`, `role`, `email`, `password`, `status`, `profile_picture`, `current_password`, `new_password`) VALUES
(22, 'Admin', 'Admin', 'admin123', 'admin_pic.jpg', 'male', 'admin', 'admin@example.com', '$2y$10$C9pnLbNut2ReV9dJ9b7MzOWoYgBy/vllJ8Z4qLhJZwC44loltFRrm', 'approved', NULL, '', ''),
(23, 'Ares', 'tutel', '123456', 'student.png', 'male', 'admin', 'admin@gmail.com', '$2y$10$7L6bjgjzm8sAjJTWai9P6./A7/tjx6NDr1I1ndjPAzsX2OBm19e1y', 'approved', NULL, '', ''),
(25, 'renato', 'bautista', '111111', 'student.png', 'male', 'teacher', 'renato@gmail.com', '$2y$10$ccS2egrGA.zBknHWo9K/5O6uYe9lwZZpp16csaZy6ABTiqMIJRTEu', 'approved', NULL, '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
