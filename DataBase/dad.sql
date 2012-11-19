-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2012 a las 21:04:58
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `muebles`
--

INSERT INTO `muebles` (`idMueble`, `desAbreviada`, `desDetallada`, `ubicacion`, `latitud`, `reservado`, `usuario`) VALUES
(18, 'Mesa madera plegable', 'Mesa de madera color cafe claro plegable, de aproximadamente 1 m de alto y 80x60 cm la parte superior', 'Direccion #4354 Col. colonia', '25.646208,-100.291793', 0, 'A00805387@itesm.mx'),
(19, 'Librero gato chico', 'Librero de roble en forma de gato chico, apróximadamente mide 1.50 de alto x 1.50 de ancho y de fondo mide aprox 30 cm. Color cafe oscuro.', 'Helechos #1885 Col Florida', '(25.657043592107676, -100.28926891136166)', 0, 'A01175276@itesm.mx'),
(21, 'Mesa cocina', 'Mesa para cocina mediana. Color café oscuro. De madera. 4 patas , plegable. Aproximadamente 1 metro de altura y metro y medio de diámetro.', 'Av del Estado #223 Col Tecnológico', '(25.649977270255057, -100.29451531219479)', 0, 'A00799416@itesm.mx'),
(22, 'Mesa esquinera', 'Mesa esquinera chica.  1 metro de alto y 30 cm de radio. Madera de cedro.', 'Técnicos #2245 Col. Tecnológico', '(25.647028374285014, -100.29247683334347)', 0, 'A00799416@itesm.mx'),
(23, 'Cama individual', 'Cama individual de madera color blanco. Diseño minimalista. Detalles color rosa en la cabecera.', 'Luis Elizondo #244 Colonia Tecnológico', '(25.646849930116314, -100.29136103439328)', 0, 'A00805387@itesm.mx'),
(24, 'Sofa cama blanco', 'Sofá cama color blanco. Cama matrimonial. Piel. El sofa abarca aproximadamente 3 m cuadrados', 'Av José Alvarado #2222 Country Diamante', '(25.660380038083282, -100.28043907928463)', 0, 'A00806027@itesm.mx'),
(25, 'Sillon de tela rojo', 'sillon de tela Roja. Para 2 personas. abarca aproximadamente 2.30 metros cuadrados. Incluye 2 cojines (se muestran en la imagen)', 'Edificio de arquitectura, Tec.', '(25.65345028000589, -100.28927964019772)', 0, 'A00904372@itesm.mx'),
(26, 'Mueble para tele grande', 'Librero de madera de cedro grande. Color cafe claro. Aproximadamente 2 metros de alto, 3 metros de largo y 80 cm de ancho. con espacio para televisión y diferentes gabinetes.', 'Helechos #1884 Col Florida', '(25.657125312680215, -100.2893654708862)', 0, 'A01104183@itesm.mx'),
(27, 'Mesa de noche (buro)', 'Mesa de noche chica, diseño minimalista. Color cafe claro. 2 cajones', 'Helechos #1884 Col Florida', '(25.65705326310048, -100.28935474205014)', 0, 'A01104183@itesm.mx'),
(28, 'Sillon reclinable', 'Sillon reclinable azul, material:tercipelo. Muy comodo', 'Pedro Martinez #3242 Col Florida', '(25.66191767366006, -100.29315275001522)', 0, 'A01175276@itesm.mx'),
(29, 'Cama matrimonial', 'Cama victoriana matrimonial.  Madera de roble. Incluye cabecera. Color cafe oscuro', 'Rio Panuco #2185 Departamento 4 Col Tecnologico', '(25.650157646241656, -100.29759448814389)', 0, 'A00805387@itesm.mx'),
(30, 'Cama infantil', 'Cama infantil (individual) blanca . con 3 cajones abajo . ', 'Bachilleres #232 Col Tecnológico', '(25.64764736820123, -100.29389303970333)', 0, 'A00805387@itesm.mx'),
(31, 'Closet portatil', 'Closet portatil color negro. 6 cajoneras y espacio para colgar la ropa. 2 metros de alto  , 1.70 de largo y 1 de ancho.', 'Porto Alegre #232 Col Primavera', '(25.65187917055967, -100.28355044174191)', 0, 'A00799416@itesm.mx');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
('A00799416@itesm.mx', 'ALEXLOPEX', 'Alejandro', 'Lopez', '8112748849', 1),
('A00805387@itesm.mx', 'norms', 'Norma', 'Escobedo', '8112748848', 1),
('A00805401@itesm.mx', 'anaa', 'Ana', 'Betancourt', '8116754654', 1),
('A00805403@itesm.mx', 'raul', 'Raul', 'Gomez', '8119987654', 0),
('A00806027@itesm.mx', 'joelg', 'Joel', 'Garcia', '8112233477', 1),
('A00806267@itesm.mx', 'saul', 'Saul', 'Gomez', '8112745634', 1),
('A00904372@itesm.mx', 'gaby', 'Gabriela', 'Rodriguez', '8110721753', 1),
('A01104183@itesm.mx', 'essau', 'Essau', 'Escobedo', '8116528856', 1),
('A01175276@itesm.mx', 'davidg', 'David', 'Guzman', '8112088475', 1);

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
