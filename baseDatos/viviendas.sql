-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2022 a las 21:04:06
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viviendas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_viviendas`
--

CREATE TABLE `tabla_viviendas` (
  `id` smallint(6) NOT NULL,
  `tipo` enum('Piso','Adosado','Chalet','Casa') NOT NULL,
  `zona` enum('Centro','Nervión','Triana','Macarena') NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `dormitorios` enum('1','2','3','4','5') NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `tamano` decimal(10,0) NOT NULL,
  `extras` varchar(100) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla_viviendas`
--

INSERT INTO `tabla_viviendas` (`id`, `tipo`, `zona`, `direccion`, `dormitorios`, `precio`, `tamano`, `extras`, `foto`, `observaciones`) VALUES
(28, 'Piso', 'Centro', 'sdf', '2', '5', '6', 'Piscina Jardin ', '', ''),
(29, 'Piso', 'Centro', 'dsfg', '2', '5', '5', 'Piscina Garage ', '', ''),
(30, 'Piso', 'Centro', 'calle', '3', '34', '34', 'Piscina Garage ', 'C:/xampp/htdocs/practica/images/png-transparent-logo-black-and-white-brand-letter-d-white-text-rectangle.png', ''),
(31, 'Piso', 'Centro', 'zxdcvf', '2', '6', '6', 'Piscina Jardin ', 'images/png-transparent-logo-black-and-white-brand-letter-d-white-text-rectangle.png', ''),
(32, 'Piso', 'Centro', 'fh', '3', '5', '56', 'Garage ', 'images/png-transparent-logo-black-and-white-brand-letter-d-white-text-rectangle.png', ''),
(33, 'Piso', 'Centro', 'calle', '4', '78', '78', 'Jardin Garage ', 'images/descarga.jpg', ''),
(34, 'Piso', 'Centro', 'asdgf', '2', '5', '5', 'Jardin ', 'images/png-transparent-logo-black-and-white-brand-letter-d-white-text-rectangle.png', ''),
(36, 'Piso', 'Centro', 'asdf', '2', '5', '5', 'Jardin ', 'images/png-transparent-logo-black-and-white-brand-letter-d-white-text-rectangle.png', ''),
(38, 'Piso', 'Centro', 'asdf', '3', '6', '6', 'Piscina Jardin ', 'images/casa.jpg', ''),
(39, 'Piso', 'Centro', 'sdfg', '3', '8', '8', '', 'images/descarga.jpg', ''),
(40, 'Piso', 'Centro', 'calle', '5', '7', '7', 'Piscina Garage ', '', ''),
(41, 'Chalet', 'Nervión', 'asdf', '4', '5', '5', '', '', ''),
(42, 'Casa', '', 'asdfg', '4', '5', '5', '', '', ''),
(43, 'Piso', 'Centro', 'asfd', '2', '3', '4', '', '', ''),
(44, 'Piso', 'Centro', 'sadf', '2', '4', '4', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla_viviendas`
--
ALTER TABLE `tabla_viviendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla_viviendas`
--
ALTER TABLE `tabla_viviendas`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
