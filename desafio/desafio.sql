-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-01-2020 a las 15:51:27
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desafio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE IF NOT EXISTS `documento` (
  `numero` int(11) NOT NULL AUTO_INCREMENT,
  `confirmado` tinyint(1) DEFAULT 0,
  `total` int(12) NOT NULL DEFAULT 0,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`numero`, `confirmado`, `total`) VALUES
(29, 0, 1),
(30, 0, 1),
(31, 0, 1),
(32, 0, 1),
(33, 0, 1),
(34, 0, 1),
(35, 0, 1),
(36, 0, 1),
(37, 0, 1),
(38, 0, 1),
(39, 0, 1),
(40, 0, 1),
(41, 0, 1),
(42, 0, 1),
(43, 0, 17),
(44, 0, 7),
(45, 1, 1),
(46, 1, 1),
(47, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id_documento` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `item_x_documento_fk` (`id_documento`),
  KEY `item_x_produto_fk` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id_documento`, `id_produto`, `id`) VALUES
(29, 1, 1),
(30, 1, 2),
(42, 5, 8),
(43, 5, 53),
(43, 1, 54),
(43, 1, 55),
(43, 1, 56),
(43, 1, 57),
(43, 1, 58),
(43, 1, 59),
(43, 1, 60),
(43, 1, 61),
(43, 1, 62),
(43, 1, 63),
(43, 1, 64),
(43, 1, 65),
(43, 1, 66),
(43, 1, 67),
(43, 1, 68),
(43, 1, 69),
(44, 1, 70),
(44, 5, 71),
(44, 1, 72),
(44, 1, 73),
(44, 5, 74),
(44, 1, 75),
(44, 1, 76),
(45, 1, 77),
(46, 1, 78),
(47, 1, 79),
(47, 1, 80),
(47, 1, 81),
(47, 5, 82);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(30) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `produto`
--

INSERT INTO `produto` (`id`, `codigo`, `descricao`, `preco`) VALUES
(1, '21s450', 'producto1', 24243),
(5, '424', 'producto 2', 24242),
(6, '242', 'producto 1', 13213);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_x_documento_fk` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`numero`),
  ADD CONSTRAINT `item_x_produto_fk` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
