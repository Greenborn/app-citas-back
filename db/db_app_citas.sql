-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 04:23 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app_citas`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat-room`
--

CREATE TABLE `chat-room` (
  `chat_id` int(11) NOT NULL,
  `user_sender` int(11) DEFAULT NULL,
  `user_receiver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id_match` int(11) NOT NULL,
  `matcher` int(11) DEFAULT NULL,
  `matched` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_sender` int(11) DEFAULT NULL,
  `user_reciver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) DEFAULT NULL,
  `user_pass` int(11) NOT NULL,
  `user_sex` int(45) DEFAULT NULL,
  `i_find` int(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `user_description` varchar(225) DEFAULT NULL,
  `user_role` int(45) DEFAULT NULL,
  `profile_img_src` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat-room`
--
ALTER TABLE `chat-room`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_sender` (`user_sender`,`user_receiver`),
  ADD KEY `user_receiver` (`user_receiver`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id_match`),
  ADD UNIQUE KEY `matcher` (`matcher`,`matched`),
  ADD KEY `matched` (`matched`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD UNIQUE KEY `chat_id` (`chat_id`),
  ADD UNIQUE KEY `user_sender` (`user_sender`,`user_reciver`),
  ADD KEY `user_reciver` (`user_reciver`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat-room`
--
ALTER TABLE `chat-room`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat-room`
--
ALTER TABLE `chat-room`
  ADD CONSTRAINT `chat-room_ibfk_1` FOREIGN KEY (`user_receiver`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `chat-room_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `message` (`chat_id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`matcher`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`matched`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_sender`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_reciver`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `chat-room` (`user_sender`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;