-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2012 a las 04:46:20
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
  `latitud` varchar(100) NOT NULL,
  `reservado` int(1) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idMueble`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `muebles`
--

INSERT INTO `muebles` (`idMueble`, `desAbreviada`, `desDetallada`, `ubicacion`, `latitud`, `reservado`, `usuario`) VALUES
(1, 'ola', 'Sin Informacion', 'Sin Informacion', '0', 1, 'norma791@hotmail.com'),
(2, 'mesa', 'mesa madera', 'sin informacion', '0', 0, 'gaby_roes@hotmail.com');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idReservacion`, `idMueble`, `idUsuario`) VALUES
(11, 1, 'dajavax@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Email` varchar(50) NOT NULL,
  `contrasena` varchar(12) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `valida` int(1) NOT NULL,
  PRIMARY KEY (`Email`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Email`, `contrasena`, `Nombre`, `Apellido`, `telefono`, `valida`) VALUES
('cacmartinez@gmail.com', '', 'Carlos', 'Compean', '0', 0),
('dajavax@gmail.com', 'davidg', 'David', 'Guzman', '8112088475', 1),
('gaby_roes@hotmail.com', '', 'Gabriela', 'Rodriguez', '0', 0),
('jegv91@gmail.com', 'joelito', 'Joel', 'Garcia', '0', 0),
('norma791@hotmail.com', 'norma', 'Norma', 'Escobedo', '0', 1),
('rosa.roble@florreo.mx', '', 'Rosario', 'Robles', '0', 0);

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
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`idMueble`) REFERENCES `muebles` (`idMueble`),
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`Email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
