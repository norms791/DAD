-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2012 at 06:30 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdproyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `muebles`
--

CREATE TABLE IF NOT EXISTS `muebles` (
  `idMueble` int(5) NOT NULL,
  `desAbreviada` text NOT NULL,
  `desDetallada` text NOT NULL,
  `ubicacion` text NOT NULL,
  `foto` text NOT NULL,
  `reservado` tinyint(1) NOT NULL,
  PRIMARY KEY (`idMueble`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muebles`
--

INSERT INTO `muebles` (`idMueble`, `desAbreviada`, `desDetallada`, `ubicacion`, `foto`, `reservado`) VALUES
(0, 'Sin Informacion', 'Sin Informacion', 'Sin Informacion', 'img_noDisponible.jpg', 0),
(1, 'Mueble - Repisa de Caoba', 'Mueble - Repisa de Caoba, tallado y fileteado a mano', 'Calle Imaginario, Col. Sueños, Monterrey, N.L., C.P. 64000', 'mueble_de_caoba.jpg', 0),
(2, 'Mueble - Mesa de Ebano', 'Mueble - Mesa de Ebano fabricado en Muebles Troncoso', 'Calle Solovino, Col. Desamparado, Monterrey, N.L., C.P. 64000', 'mesa_de_ebano.jpg', 0),
(3, 'Mueble - Silla de Ebano', 'Mueble - Silla de Ebano tallado a mano en Senegal, Africa', 'Calle Telacreiste, Col. Ahiteves, Monterrey, N.L., C.P. 64000', 'silla_de_ebano.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservacion`
--

CREATE TABLE IF NOT EXISTS `reservacion` (
  `idReservacion` int(5) NOT NULL,
  `IdMueble` int(5) NOT NULL,
  `idUsuario` int(5) NOT NULL,
  PRIMARY KEY (`idReservacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(5) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nombre`, `Apellido`, `Email`) VALUES
(12358, 'Rosario', 'Robles', 'rosa.roble@florreo.mx');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
