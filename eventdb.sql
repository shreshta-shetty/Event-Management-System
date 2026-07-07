-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2026 at 04:00 AM
-- Server version: 8.0.41
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Admin Sharma', 'admin@gmail.com', NULL, 'Great Website!!', '2026-07-04 01:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `venue` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `event_time`, `venue`, `image`, `created_at`) VALUES
(3, 'Coding Challenge', 'Test your programming skills in C, Java, Python, and problem-solving competitions.', '2026-07-15', '09:30:00', 'Computer Lab', 'event1.png', '2026-07-03 13:29:44'),
(4, 'AI & Machine Learning Workshop', 'Learn the basics of Artificial Intelligence and Machine Learning through hands-on sessions.', '2026-07-24', '10:00:00', 'Seminar Hall-1', 'event2.png', '2026-07-03 13:30:57'),
(5, 'Hackathon 2026', 'Join our 24-hour Hackathon and work in teams to build innovative software solutions. Showcase your creativity, coding skills, and problem-solving abilities .', '2026-08-20', '09:00:00', 'Computer Science Block', 'event3.png', '2026-07-03 13:32:29'),
(6, 'Cultural Fest', 'Celebrate music, dance, drama, fashion shows, and cultural performances.', '2026-08-28', '10:00:00', 'Seminar Hall-3', 'event4.png', '2026-07-03 13:33:49'),
(8, 'Entrepreneurship Summit', 'Meet successful entrepreneurs and explore startup ideas, innovation, and business strategies.', '2026-10-15', '10:30:00', 'Conference Hall', 'event5.png', '2026-07-03 13:36:56'),
(9, 'Web Development Bootcamp', 'Learn HTML, CSS, JavaScript, PHP, and MySQL by building real-world web applications.', '2026-10-28', '09:00:00', 'Seminar Hall-1', 'event6.png', '2026-07-03 13:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `name`, `email`, `phone`, `college`, `event_id`, `created_at`) VALUES
(1, 'Aarav Sharma', 'aarav.sharmaXX@gmail.com', '9876543210', 'XX College of Engineering', 3, '2026-07-04 01:00:28'),
(2, 'Priya Nair', 'priya.nairXX@gmail.com', '9876501234', 'XXX College of Engineering', 3, '2026-07-04 01:01:41'),
(3, 'Rahul Verma', 'rahul.vermaXX@gmail.com', '9123456789', 'XXX University', 4, '2026-07-04 01:21:16'),
(4, 'Sneha Reddy', 'sneha.reddyXX@gmail.com', '9988776655', 'XX XXXXXXX Institute of Technology', 4, '2026-07-04 01:22:20'),
(5, 'Aditya Kumar', 'aditya.kumar@gmail.com', '9012345678', 'XXXX University', 5, '2026-07-04 01:23:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
