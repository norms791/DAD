-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2012 a las 02:19:40
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muebles`
--

CREATE TABLE IF NOT EXISTS `muebles` (
  `idMueble` int(5) NOT NULL AUTO_INCREMENT,
  `desAbreviada` varchar(60) NOT NULL,
  `desDetallada` varchar(255) NOT NULL,
  `ubicacion` varchar(70) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `reservado` int(1) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idMueble`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `muebles`
--

INSERT INTO `muebles` (`idMueble`, `desAbreviada`, `desDetallada`, `ubicacion`, `latitud`, `longitud`, `reservado`, `usuario`) VALUES
(1, 'Sin Informacion', 'Sin Informacion', 'Sin Informacion', 0, 0, 0, 'norma791@hotmail.com'),
(2, 'mesa', 'mesa madera', 'sin informacion', 0, 0, 0, 'gaby_roes@hotmail.com'),
(5, 'nuevo Mueble', 'mueble nuevo de prueba', 'mi casa', 0, 0, 0, 'norma791@hotmail.com'),
(6, 'nuevo Mueble', 'mueble nuevo de prueba', 'mi casa', 0, 0, 0, 'norma791@hotmail.com'),
(7, 'nuevo Mueble', 'mueble nuevo de prueba', 'mi casa', 0, 0, 0, 'norma791@hotmail.com'),
(8, 'nuevo Mueble', 'mueble nuevo de prueba', 'mi casa', 0, 0, 0, 'norma791@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `idReservacion` int(11) NOT NULL AUTO_INCREMENT,
  `idMueble` int(5) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idReservacion`),
  KEY `idMueble` (`idMueble`),
  KEY `idUsuario` (`idUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idReservacion`, `idMueble`, `idUsuario`) VALUES
(1, 1, 'gaby_roes@hotmail.com'),
(2, 2, 'norma791@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Email` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  PRIMARY KEY (`Email`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Email`, `Nombre`, `Apellido`) VALUES
('gaby_roes@hotmail.com', 'Gabriela', 'Rodriguez'),
('mary@florreo.mx', 'Rosario', 'Robles'),
('norma791@hotmail.com', 'Norma', 'Escobedo'),
('rosa.roble@florreo.mx', 'Rosario', 'Robles');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `muebles`
--
ALTER TABLE `muebles`
  ADD CONSTRAINT `muebles_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`Email`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`Email`),
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`idMueble`) REFERENCES `muebles` (`idMueble`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
