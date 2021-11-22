-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-11-2021 a las 20:02:48
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

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

-- --------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `db_deportes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_deportes`;
--
-- Estructura de tabla para la tabla `dp_categoria`
--

CREATE TABLE `dp_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `tipo_competencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dp_categoria`
--

INSERT INTO `dp_categoria` (`id_categoria`, `nombre`, `descripcion`, `tipo_competencia`) VALUES
(1, 'Basket', 'Deporte en el que juegan 5 vs 5, con el objetivo de convertir la mayor cantidad de puntos en el arco contrario', 'Grupal'),
(2, 'Tennis', 'Deporte de 1 vs 1 o 2 vs 2, se puede jugar en cancha de cesped, cemento o ladrillo', 'Mixta'),
(3, 'Futbol', 'Se juegan 11 vs 11, el objetivo es convertir la mayor cantidad de goles al arco contrario', 'Grupal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_jugador`
--

CREATE TABLE `dp_jugador` (
  `id_deportista` int(11) NOT NULL,
  `dni` int(9) NOT NULL,
  `nombre_apellido` varchar(60) NOT NULL,
  `edad` int(2) NOT NULL,
  `altura` int(3) NOT NULL,
  `domicilio` varchar(50) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dp_jugador`
--

INSERT INTO `dp_jugador` (`id_deportista`, `dni`, `nombre_apellido`, `edad`, `altura`, `domicilio`, `id_categoria`) VALUES
(14, 34567854, 'Lucio Castro', 34, 134, 'Sarmiento 3562', 2),
(16, 2147483647, 'Luciano Castro', 34, 156, 'calle 58 4563', 1),
(17, 34567876, 'Santiago Gomez', 21, 157, 'San Martin 2453', 1),
(18, 32456321, 'Santiago Gomez', 22, 153, 'calle 58 4563', 2),
(19, 23456765, 'Delfina Cataño', 23, 161, 'Sarmiento 3562', 3),
(20, 32453234, 'Ludmila Sanchez', 23, 160, 'calle 58 1765', 3),
(21, 25145298, 'Karen Rodriguez', 24, 159, 'Necochea 2425', 3),
(22, 41526365, 'Mariano Gallo', 24, 167, 'Saavedra 2425', 2),
(23, 23456432, 'Luciano Castro', 34, 167, 'Sarmiento 3562', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_usuario`
--

CREATE TABLE `dp_usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dp_usuario`
--

INSERT INTO `dp_usuario` (`id_usuario`, `username`, `password`, `role`) VALUES
(2, 'Tudai', 'e10adc3949ba59abbe56e057f20f883e', 'administrador'),
(4, 'agustina', '4d186321c1a7f0f354b297e8914ab240 ', 'usuario'),
(7, 'ezequiel', 'd7216dec976c1beb88a5b60e749abf07', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dp_categoria`
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
-- Indices de la tabla `dp_usuario`
--
ALTER TABLE `dp_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dp_categoria`
--
ALTER TABLE `dp_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `dp_jugador`
--
ALTER TABLE `dp_jugador`
  MODIFY `id_deportista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `dp_usuario`
--
ALTER TABLE `dp_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dp_jugador`
--
ALTER TABLE `dp_jugador`
  ADD CONSTRAINT `dp_jugador_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `dp_categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
