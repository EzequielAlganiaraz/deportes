-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2021 a las 02:37:55
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_deportes`
--
CREATE DATABASE IF NOT EXISTS `db_deportes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_deportes`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_categoria`
--

CREATE TABLE `dp_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_deporte` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `tipo_competencia` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_jugador`
--

CREATE TABLE `dp_jugador` (
  `id_deportista` int(11) NOT NULL,
  `nombre_apellido` varchar(60) NOT NULL,
  `edad` int(2) NOT NULL,
  `altura` int(3) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `db_categoria`
--
ALTER TABLE `dp_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `dp_jugador`
--
ALTER TABLE `dp_jugador`
  ADD PRIMARY KEY (`id_deportista`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `db_categoria`
--
ALTER TABLE `dp_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dp_jugador`
--
ALTER TABLE `dp_jugador`
  MODIFY `id_deportista` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `db_categoria`
--
ALTER TABLE `dp_categoria`
  ADD CONSTRAINT `dp_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `dp_jugador` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
