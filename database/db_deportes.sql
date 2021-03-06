-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2021 a las 13:36:34
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dp_usuario`
--

CREATE TABLE `dp_usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dp_usuario`
--

INSERT INTO `dp_usuario` (`id_usuario`, `username`, `password`, `role`) VALUES
(1, 'ezequiel', 'd7216dec976c1beb88a5b60e749abf07', 'usuario'),
(2, 'Tudai', 'e10adc3949ba59abbe56e057f20f883e', 'administrador');

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
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `dp_jugador`
--
ALTER TABLE `dp_jugador`
  MODIFY `id_deportista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `dp_usuario`
--
ALTER TABLE `dp_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
