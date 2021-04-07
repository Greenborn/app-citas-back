-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-04-2021 a las 23:28:25
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_citas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat-room`
--

CREATE TABLE `chat-room` (
  `id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_sender` int(11) DEFAULT NULL,
  `user_receiver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `id_match` int(11) NOT NULL,
  `matcher` int(11) DEFAULT NULL,
  `matched` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_sender` int(11) DEFAULT NULL,
  `user_reciver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat-room`
--
ALTER TABLE `chat-room`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `user_sender` (`user_sender`,`user_receiver`),
  ADD KEY `user_receiver` (`user_receiver`);

--
-- Indices de la tabla `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id_match`),
  ADD UNIQUE KEY `matcher` (`matcher`,`matched`),
  ADD KEY `matched` (`matched`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD UNIQUE KEY `chat_id` (`chat_id`),
  ADD UNIQUE KEY `user_sender` (`user_sender`,`user_reciver`),
  ADD KEY `user_reciver` (`user_reciver`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat-room`
--
ALTER TABLE `chat-room`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matches`
--
ALTER TABLE `matches`
  MODIFY `id_match` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat-room`
--
ALTER TABLE `chat-room`
  ADD CONSTRAINT `chat-room_ibfk_1` FOREIGN KEY (`user_receiver`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `chat-room_ibfk_2` FOREIGN KEY (`chat_id`) REFERENCES `message` (`chat_id`);

--
-- Filtros para la tabla `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`matcher`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`matched`) REFERENCES `user` (`user_id`);

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_sender`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_reciver`) REFERENCES `user` (`user_id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `chat-room` (`user_sender`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
