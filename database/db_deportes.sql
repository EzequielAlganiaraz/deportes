
-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 06:20:38
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

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
-- Estructura de tabla para la tabla `dp_comentarios`
--

CREATE TABLE `dp_comentarios` (
  `id_comentario` int(11) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `puntaje` int(2) NOT NULL,
  `id_jugador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dp_jugador`
--

INSERT INTO `dp_jugador` (`id_deportista`, `dni`, `nombre_apellido`, `edad`, `altura`, `domicilio`, `id_categoria`, `imagen`) VALUES
(13, 6, 'juan gomez', 7, 11, '3444', 1, ''),
(14, 234234234, 'Martinnnnnn', 33, 23, '3444 errr', 2, 'image/jugadores619f17ad702ea.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_usuario`
--

CREATE TABLE `dp_usuario` (
  `id_usuario` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dp_usuario`
--

INSERT INTO `dp_usuario` (`id_usuario`, `username`, `password`, `role`) VALUES
(17, 'eze', '$2y$10$d6oeWxMzIYYLJW6sXQQK0eGMgYomzaf2CmQwV7LJFnnlJyLhOBCLK', 'usuario'),
(18, 'agustina', '$2y$10$bEODdR1wWS37Fi5WE8iuCuA9n5tj1QEWzQE1644Xys3SUcQX7UqRO', 'administrador'),
(19, 'ezequiel', '$2y$10$PfuBOIrNwq95Fx07daLKG..c04IirctYd5wQfZKePfBM1OOWrk0qm', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dp_categoria`
--
ALTER TABLE `dp_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `dp_comentarios`
--
ALTER TABLE `dp_comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `fk_comentario_jugador` (`id_jugador`);

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dp_comentarios`
--
ALTER TABLE `dp_comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `dp_jugador`
--
ALTER TABLE `dp_jugador`
  MODIFY `id_deportista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `dp_usuario`
--
ALTER TABLE `dp_usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dp_comentarios`
--
ALTER TABLE `dp_comentarios`
  ADD CONSTRAINT `fk_comentario_jugador` FOREIGN KEY (`id_jugador`) REFERENCES `dp_jugador` (`id_deportista`);

--
-- Filtros para la tabla `dp_jugador`
--
ALTER TABLE `dp_jugador`
  ADD CONSTRAINT `dp_jugador_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `dp_categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;