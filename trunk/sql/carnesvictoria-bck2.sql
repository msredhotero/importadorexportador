-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-12-2014 a las 00:01:00
-- Versión del servidor: 5.1.36-community-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `carnesvictoria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv_datosfacturacion`
--

CREATE TABLE IF NOT EXISTS `cv_datosfacturacion` (
  `iddatosfacturacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `ciudad` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `cuit` varchar(15) DEFAULT NULL,
  `telefonofijo` varchar(18) DEFAULT NULL,
  `telefonomovil` varchar(18) DEFAULT NULL,
  `inicioactividad` date DEFAULT NULL,
  `refiva` smallint(6) DEFAULT NULL,
  `ingresobruto` varchar(20) DEFAULT NULL,
  `codpostal` varchar(8) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `imagen` longblob,
  PRIMARY KEY (`iddatosfacturacion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv_detallefacturas`
--

CREATE TABLE IF NOT EXISTS `cv_detallefacturas` (
  `iddetallefactura` int(11) NOT NULL AUTO_INCREMENT,
  `reffactura` int(11) NOT NULL,
  `refproducto` int(11) NOT NULL,
  `precioventa` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`iddetallefactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv_detallefacturasaux`
--

CREATE TABLE IF NOT EXISTS `cv_detallefacturasaux` (
  `idauxdetallefactura` int(11) NOT NULL AUTO_INCREMENT,
  `refcliente` int(11) NOT NULL,
  `refproducto` int(11) NOT NULL,
  `precioventa` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `temporal` datetime NOT NULL,
  `activo` bit(1) NOT NULL,
  PRIMARY KEY (`idauxdetallefactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv_facturas`
--

CREATE TABLE IF NOT EXISTS `cv_facturas` (
  `idfactura` int(11) NOT NULL AUTO_INCREMENT,
  `nrofactura` varchar(45) NOT NULL,
  `fechacreacion` datetime NOT NULL,
  `refcliente` int(11) NOT NULL,
  PRIMARY KEY (`idfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv_productos`
--

CREATE TABLE IF NOT EXISTS `cv_productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(70) NOT NULL,
  `imagen` longblob,
  `preciounit` decimal(18,2) NOT NULL,
  `precioventa` decimal(18,2) NOT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  `fechacrea` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `peso` decimal(18,2) DEFAULT NULL,
  `reftipoproducto` int(11) NOT NULL,
  `mime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `cv_productos`
--

INSERT INTO `cv_productos` (`idproducto`, `producto`, `imagen`, `preciounit`, `precioventa`, `observacion`, `fechacrea`, `peso`, `reftipoproducto`, `mime`) VALUES
(5, 'Bife ancho ', '', '10.00', '10.00', '', '2014-11-20 20:31:45', '10.00', 1, ''),
(4, 'Asado del medio  Estancia La Victoria', '', '62.00', '350.00', '', '2014-11-20 20:16:21', '23.00', 1, ''),
(6, 'Bife angosto ', '', '10.00', '10.00', '', '2014-11-20 20:32:33', '10.00', 1, ''),
(7, 'Bife angosto  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:33:08', '10.00', 1, ''),
(8, 'Bife con lomo ', '', '10.00', '10.00', '', '2014-11-20 20:34:05', '10.00', 1, ''),
(9, 'Bife con lomo  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:34:33', '10.00', 1, ''),
(10, 'Bife de chorizo ', '', '10.00', '10.00', '', '2014-11-20 20:35:04', '10.00', 1, ''),
(11, 'Bife parrilla ', '', '10.00', '10.00', '', '2014-11-20 20:35:53', '10.00', 1, ''),
(12, 'Bife parrilla  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:36:17', '10.00', 1, ''),
(13, 'Bola de lomo ', '', '10.00', '10.00', '', '2014-11-20 20:38:03', '10.00', 1, ''),
(14, 'Carnaza ', '', '10.00', '10.00', '', '2014-11-20 20:38:24', '10.00', 1, ''),
(15, 'Carnaza  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:38:45', '10.00', 1, ''),
(16, 'Colita de cuadril ', '', '10.00', '10.00', '', '2014-11-20 20:39:09', '10.00', 1, ''),
(17, 'Colita de cuadril  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:39:27', '10.00', 1, ''),
(18, 'Cuadrada milanesa', '', '10.00', '10.00', '', '2014-11-20 20:39:47', '10.00', 1, ''),
(19, 'Entraña ', '', '10.00', '10.00', '', '2014-11-20 20:40:09', '10.00', 1, ''),
(20, 'Entraña  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:43:13', '10.00', 1, ''),
(21, 'Falda atravezada  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:43:35', '10.00', 1, ''),
(22, 'Falda ', '', '10.00', '10.00', '', '2014-11-20 20:44:00', '10.00', 1, ''),
(23, 'Lomo ', '', '10.00', '10.00', '', '2014-11-20 20:44:18', '10.00', 1, ''),
(24, 'Lomo  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:44:39', '10.00', 1, ''),
(25, 'Matambre ', '', '10.00', '10.00', '', '2014-11-20 20:45:01', '10.00', 1, ''),
(26, 'Matambre  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:45:17', '10.00', 1, ''),
(27, 'Medallon de lomo ', '', '10.00', '10.00', '', '2014-11-20 20:45:44', '10.00', 1, ''),
(28, 'Milanesa de peceto  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:46:40', '10.00', 1, ''),
(29, 'Milanesas bola de lomo  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:47:02', '10.00', 1, ''),
(30, 'Milanesas de nalga  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:48:12', '10.00', 1, ''),
(31, 'Ojo de bife ', '', '10.00', '10.00', '', '2014-11-20 20:48:36', '10.00', 1, ''),
(32, 'Paleta del centro  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:49:03', '10.00', 1, ''),
(33, 'Paleta ', '', '10.00', '10.00', '', '2014-11-20 20:49:25', '10.00', 1, ''),
(34, 'Palomita feteada  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:50:07', '10.00', 1, ''),
(35, 'Palomita ', '', '10.00', '10.00', '', '2014-11-20 20:50:25', '10.00', 1, ''),
(36, 'Pastrón', '', '10.00', '10.00', '', '2014-11-20 20:50:43', '10.00', 1, ''),
(37, 'Peceto milanesa ', '', '10.00', '10.00', '', '2014-11-20 20:51:06', '10.00', 1, ''),
(38, 'Peceto ', '', '10.00', '10.00', '', '2014-11-20 20:51:25', '10.00', 1, ''),
(39, 'Picanha  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:51:51', '10.00', 1, ''),
(40, 'Roast beef  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:52:13', '10.00', 1, ''),
(41, 'Tapa nalga ', '', '10.00', '10.00', '', '2014-11-20 20:52:39', '10.00', 1, ''),
(42, 'Tortuguita feteada  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:52:59', '10.00', 1, ''),
(43, 'Tortuguita ', '', '10.00', '10.00', '', '2014-11-20 20:53:17', '10.00', 1, ''),
(44, 'Vacio del centro  Estancia La Victoria', '', '10.00', '10.00', '', '2014-11-20 20:55:44', '10.00', 1, ''),
(45, 'Vacio ', '', '10.00', '10.00', '', '2014-11-20 20:56:06', '10.00', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cv_tipoproducto`
--

CREATE TABLE IF NOT EXISTS `cv_tipoproducto` (
  `idtipoproducto` int(11) NOT NULL AUTO_INCREMENT,
  `tipoproducto` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `activo` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idtipoproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cv_tipoproducto`
--

INSERT INTO `cv_tipoproducto` (`idtipoproducto`, `tipoproducto`, `activo`) VALUES
(1, 'Novillo', b'1'),
(2, 'Ternera', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pifotos`
--

CREATE TABLE IF NOT EXISTS `pifotos` (
  `idfoto` int(11) NOT NULL AUTO_INCREMENT,
  `refproducto` int(11) NOT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `principal` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idfoto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `pifotos`
--

INSERT INTO `pifotos` (`idfoto`, `refproducto`, `imagen`, `type`, `principal`) VALUES
(1, 4, 'asadomedionovillo.jpg', 'image/jpeg', NULL),
(2, 5, 'bifeanchonovillito.jpg', 'image/jpeg', NULL),
(3, 6, 'bifeangostonovillito.jpg', 'image/jpeg', NULL),
(4, 7, 'bifeangostonovillitoev.jpg', 'image/jpeg', NULL),
(5, 8, 'bifelomonovillo.jpg', 'image/jpeg', NULL),
(6, 9, 'bifelomonovilloev.jpg', 'image/jpeg', NULL),
(7, 10, 'bifechorizonovillo.jpg', 'image/jpeg', NULL),
(8, 11, 'bifeparrillanovillo.jpg', 'image/jpeg', NULL),
(9, 12, 'bifeparrillanovilloev.jpg', 'image/jpeg', NULL),
(10, 13, 'bolalomonovillo.jpg', 'image/jpeg', NULL),
(11, 14, 'carnazanovillo.jpg', 'image/jpeg', NULL),
(12, 15, 'carnazanovilloev.jpg', 'image/jpeg', NULL),
(13, 16, 'colitacuadrilnovillo.jpg', 'image/jpeg', NULL),
(14, 17, 'colitacuadrilnovilloev.jpg', 'image/jpeg', NULL),
(15, 18, 'cuadradamilanesa.jpg', 'image/jpeg', NULL),
(16, 19, 'entrañanovillo.jpg', 'image/jpeg', NULL),
(17, 20, 'entrañanovilloev.jpg', 'image/jpeg', NULL),
(18, 21, 'faldaatravesadaev.jpg', 'image/jpeg', NULL),
(19, 22, 'faldanovillo.jpg', 'image/jpeg', NULL),
(20, 23, 'lomonovillo.jpg', 'image/jpeg', NULL),
(21, 24, 'lomonovilloev.jpg', 'image/jpeg', NULL),
(22, 25, 'matambrenovillo.jpg', 'image/jpeg', NULL),
(23, 26, 'matambrenovilloev.jpg', 'image/jpeg', NULL),
(24, 27, 'medallonlomonovillo.jpg', 'image/jpeg', NULL),
(25, 28, 'milanesapecetonovilloev.jpg', 'image/jpeg', NULL),
(26, 29, 'milanesabolalomonovilloev.jpg', 'image/jpeg', NULL),
(27, 30, 'milanesanalganovillo.jpg', 'image/jpeg', NULL),
(28, 31, 'ojobifenovillo.jpg', 'image/jpeg', NULL),
(29, 32, 'paletanovilloev.jpg', 'image/jpeg', NULL),
(30, 33, 'paletanovillo.jpg', 'image/jpeg', NULL),
(31, 34, 'palomitanovilloev.jpg', 'image/jpeg', NULL),
(32, 35, 'palomitanovillo.jpg', 'image/jpeg', NULL),
(33, 36, 'pastron.jpg', 'image/jpeg', NULL),
(34, 37, 'pecetomilanesanovillo.jpg', 'image/jpeg', NULL),
(35, 38, 'pecetonovillo.jpg', 'image/jpeg', NULL),
(36, 39, 'picanhanovilloev.jpg', 'image/jpeg', NULL),
(37, 40, 'roastbeefnovilloev.jpg', 'image/jpeg', NULL),
(38, 41, 'tapanalganovilloeco.jpg', 'image/jpeg', NULL),
(39, 42, 'tortuguitafeteadanovilloec.jpg', 'image/jpeg', NULL),
(40, 43, 'tortuguitanovillo.jpg', 'image/jpeg', NULL),
(41, 44, 'vacionovilloev.jpg', 'image/jpeg', NULL),
(42, 45, 'vacionovillo.jpg', 'image/jpeg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `se_roles`
--

CREATE TABLE IF NOT EXISTS `se_roles` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `se_usuarios`
--

CREATE TABLE IF NOT EXISTS `se_usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `apellido` varchar(40) NOT NULL,
  `password` varchar(10) NOT NULL,
  `refroll` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(60) DEFAULT NULL,
  `imagen` longblob,
  `mime` varchar(20) DEFAULT NULL,
  `carpeta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `se_usuarios`
--

INSERT INTO `se_usuarios` (`idusuario`, `apellido`, `password`, `refroll`, `email`, `nombre`, `telefono`, `direccion`, `imagen`, `mime`, `carpeta`) VALUES
(8, 'marcos', 'marcos', 1, 'msredhotero@msn.com', 'Saupurein Marcos', NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
