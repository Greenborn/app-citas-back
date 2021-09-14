-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2021 at 07:33 PM
-- Server version: 10.5.11-MariaDB-1
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appcitas`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `id` int(11) NOT NULL,
  `user_sender_id` int(11) DEFAULT NULL,
  `user_receiver_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`id`, `user_sender_id`, `user_receiver_id`) VALUES
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `type`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `user_matcher_id` int(11) DEFAULT NULL,
  `user_matched_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `user_matcher_id`, `user_matched_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_sender_id` int(11) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `chat_id`, `user_sender_id`, `message`) VALUES
(1, 2, 2, 'hola, esto es una prueba'),
(2, 2, 1, 'Ok, bueno espero que esa prueba funcione perfectamente'),
(3, 2, 1, 'bien, este es un nuevo mensaje, a ver como se ve'),
(4, 2, 1, 'ahora luego de enviado, debería desaparecer de este campo de texto'),
(5, 2, 1, 'otro mensajito'),
(6, 2, 2, 'a ver que pasa');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `birth_date` varchar(15) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image_src` varchar(500) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `gender_preference_id` int(11) NOT NULL,
  `default_profile_image_id` int(11) NOT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `birth_date`, `description`, `email`, `image_src`, `gender_id`, `gender_preference_id`, `default_profile_image_id`, `lat`, `lng`) VALUES
(1, '631152000000', 'Una descripcion de prueba', 'test@gmail.com', 'https://griffonagedotcom.files.wordpress.com/2016/07/profile-modern-2e.jpg', 2, 1, 1, -33.0507, -71.6027),
(2, '631152000000', 'Una descripcion de prueba', 'test@gmail.com', '..', 1, 2, 1, -36.7681, -59.0886);

-- --------------------------------------------------------

--
-- Table structure for table `profile_image`
--

CREATE TABLE `profile_image` (
  `id` int(11) NOT NULL,
  `path` varchar(400) NOT NULL,
  `url` varchar(400) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_image`
--

INSERT INTO `profile_image` (`id`, `path`, `url`, `profile_id`) VALUES
(1, 'https://technoxyz.com/wp-content/uploads/2018/05/Stylish-WhatsApp-DP-Images-for-Boys-Cool-Profile-Pictures-2018-7.jpg', '', 1),
(2, 'https://technoxyz.com/wp-content/uploads/2018/05/Stylish-WhatsApp-DP-Images-for-Boys-Cool-Profile-Pictures-2018-7.jpg', '', 2),
(3, 'https://technoxyz.com/wp-content/uploads/2018/05/Stylish-WhatsApp-DP-Images-for-Boys-Cool-Profile-Pictures-2018-7.jpg', '', 2),
(4, '/var/www/html/app-citas-back/web/user_data/16262942052021-07-13_14.40.43.png', '', 1),
(5, '/var/www/html/app-citas-back/web/user_data/16262942082021-07-13_14.40.43.png', '', 1),
(7, '/var/www/html/app-citas-back/web/user_data/1626897130index.jpeg', '/user_data/1626897130index.jpeg', 1),
(8, '/var/www/html/app-citas-back/web/user_data/1626897172index.jpeg', '/user_data/1626897172index.jpeg', 1),
(9, '/var/www/html/app-citas-back/web/user_data/1626897194index.jpeg', '/user_data/1626897194index.jpeg', 1),
(10, '/var/www/html/app-citas-back/web/user_data/1626897214index.jpeg', '/user_data/1626897214index.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `type`) VALUES
(1, 'administrator'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `access_token` varchar(128) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `online` tinyint(1) DEFAULT 0,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `verification_email` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `password_reset_token`, `access_token`, `state_id`, `online`, `created_at`, `updated_at`, `role_id`, `profile_id`, `verification_email`) VALUES
(1, 'admin', '$2y$13$maydzLNRwqH4cQP2L8FCQu6OxIU/.GpzxwRxcqM3Tnzhk9uLMzcrm', NULL, '$2y$13$Tr6i.CEbjh7LoQDbFmBYGOLolsriXJfCeYSSQ9gc9QkRFsr842hc6', 1, 1, NULL, NULL, 1, 1, 1),
(2, 'test1', '$2y$13$IIR2nCCC3PBdcgbjOxDEMe2PVe/WJklqm2OiUmkEEfS6GRxcYeIN2', NULL, '$2y$13$Tr6i.CEbjh7LoQDbFmBYGOLolsriXJfCeYSSQ9gc9QkRFsr842hc6', 1, 0, NULL, NULL, 2, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chat_room_user_sender_id` (`user_sender_id`),
  ADD KEY `fk_chat_room_user_reciver_id` (`user_receiver_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matches_user_matcher_id` (`user_matcher_id`),
  ADD KEY `fk_matches_user_matched_id` (`user_matched_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_message_user_sender_id` (`user_sender_id`),
  ADD KEY `fk_message_chat_id` (`chat_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_profile_gender_preference_id` (`gender_id`),
  ADD KEY `fk_profile_gender_prefernce_id` (`gender_preference_id`);

--
-- Indexes for table `profile_image`
--
ALTER TABLE `profile_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_image`
--
ALTER TABLE `profile_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD CONSTRAINT `fk_chat_room_user_reciver_id` FOREIGN KEY (`user_receiver_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_chat_room_user_sender_id` FOREIGN KEY (`user_sender_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `fk_matches_user_matched_id` FOREIGN KEY (`user_matched_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matches_user_matcher_id` FOREIGN KEY (`user_matcher_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_chat_id` FOREIGN KEY (`chat_id`) REFERENCES `chat_room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_message_user_sender_id` FOREIGN KEY (`user_sender_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profile_gender_prefernce_id` FOREIGN KEY (`gender_preference_id`) REFERENCES `gender` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
