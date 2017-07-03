-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2017 a las 00:03:22
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratorio`
--
CREATE DATABASE IF NOT EXISTS `laboratorio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laboratorio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farmaco`
--

CREATE TABLE `farmaco` (
  `Id` int(11) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `laboratorio` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `observacion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `farmaco`
--

INSERT INTO `farmaco` (`Id`, `nombre`, `laboratorio`, `stock`, `precio`, `observacion`) VALUES
(5, 'clorfenamina', 'Chile', 300, 100, 'anti-alergico'),
(6, 'aspirina', 'Chile', 30, 5000, 'la aspirina mas cara del mundo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `farmaco`
--
ALTER TABLE `farmaco`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `farmaco`
--
ALTER TABLE `farmaco`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
