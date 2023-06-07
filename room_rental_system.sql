-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 04, 2023 at 06:55 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `room_rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `_id` int(11) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `birthdate` varchar(300) NOT NULL,
  `user_password` varchar(300) NOT NULL,
  `valid_id_num` int(11) NOT NULL,
  `is_landlord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`_id`, `user_name`, `email`, `birthdate`, `user_password`, `valid_id_num`, `is_landlord`) VALUES
(1, 'John Doe', 'user@gmail.com', '2002-06-23', 'user', 1, 0),
(2, 'John Doe Admin', 'admin@gmail.com', '2004-02-23', 'admin', 1, 1);

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`_id`, `type`, `description`, `location`, `category`, `promo`, `rate_12`, `rate_24`) VALUES
(1, 'Regency', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Queen', 0, 20, 22),
(2, 'Premium Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Queen', 0, 7, 7),
(3, 'Regency', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Studio', 0, 23, 34),
(4, 'Deluxe Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Studio', 0, 23, 34),
(5, 'Regency', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Studio', 0, 23, 34),
(6, 'Regency', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Studio', 0, 23, 34),
(7, 'Executive Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Hollywood Twin', 0, 22, 23),
(8, 'Deluxe Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Hollywood Twin', 0, 22, 25),
(9, 'Executive Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Hollywood Twin', 0, 22, 25),
(10, 'Deluxe Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Hollywood Twin', 0, 22, 26),
(11, 'Executive Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Hollywood Twin', 0, 22, 25),
(12, 'Executive Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Hollywood Twin', 0, 22, 27),
(13, 'Deluxe Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York  gr rt', 'Double-double', 0, 22, 45),
(14, 'Premium Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Queen', 0, 5, 53),
(15, 'Deluxe Room', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis neque id libero bibendum posuere a ut nunc. Nam egestas dictum velit, eu lacinia nulla ultricies nec.', 'New York', 'Double-double', 0, 23, 23);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `_id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `location` varchar(5000) NOT NULL,
  `category` varchar(2000) NOT NULL,
  `promo` int(11) NOT NULL,
  `rate_12` int(11) NOT NULL,
  `rate_24` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
