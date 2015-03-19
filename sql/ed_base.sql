-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-03-2015 a las 00:51:26
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ed_base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ed_datos`
--

CREATE TABLE IF NOT EXISTS `ed_datos` (
  `iddato` int(11) NOT NULL AUTO_INCREMENT,
  `codigocuenta` varchar(20) DEFAULT NULL,
  `comprobante` varchar(5) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `documento` varchar(9) DEFAULT NULL,
  `documentoreferencia` varchar(9) DEFAULT NULL,
  `nit` varchar(11) DEFAULT NULL,
  `detalle` varchar(28) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `valor` varchar(21) DEFAULT NULL,
  `valorbase` varchar(21) DEFAULT NULL,
  `centrocostos` varchar(20) DEFAULT NULL,
  `transaccion` varchar(3) DEFAULT NULL,
  `plazo` varchar(4) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `token` char(36) DEFAULT NULL,
  `fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`iddato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25843 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ed_importado`
--

CREATE TABLE IF NOT EXISTS `ed_importado` (
  `idimportado` int(11) NOT NULL AUTO_INCREMENT,
  `documento` varchar(20) DEFAULT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `proveedor` varchar(45) DEFAULT NULL,
  `exento` varchar(21) DEFAULT NULL,
  `excluido` varchar(21) DEFAULT NULL,
  `nograbado` varchar(21) DEFAULT NULL,
  `grabado` varchar(21) DEFAULT NULL,
  `iva` varchar(21) DEFAULT NULL,
  `costototal` varchar(21) DEFAULT NULL,
  `token` char(36) DEFAULT NULL,
  PRIMARY KEY (`idimportado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4441 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ed_proveedores`
--

CREATE TABLE IF NOT EXISTS `ed_proveedores` (
  `idproveedor` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idproveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `se_usuarios`
--

CREATE TABLE IF NOT EXISTS `se_usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `refroll` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombrecompleto` varchar(70) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
