-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-07-2018 a las 12:18:45
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.0.29
create database restaurantbd;
use restaurantbd;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurantbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Categoria',
  `cat_nombre` varchar(60) NOT NULL COMMENT 'Nombre de Categoria',
  `cat_imagen` varchar(200) NOT NULL COMMENT 'Imagen de Categoria',
  `cat_descripcion` varchar(200) NOT NULL COMMENT 'Descripcion de Categoria',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_imagen`, `cat_descripcion`) VALUES
(1, 'PAPAS', 'IMAGEN PAPA', 'TUBÉRCULO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Cliente',
  `cli_nombre` varchar(60) NOT NULL COMMENT 'Nombre de Cliente',
  `cli_apellido` varchar(60) NOT NULL COMMENT 'Apellido de Cliente',
  `cli_direccion` varchar(60) NOT NULL COMMENT 'Direccion de de Cliente',
  `cli_ciudad` varchar(60) NOT NULL COMMENT 'Ciudad de Cliente',
  `cli_telefono` varchar(60) NOT NULL COMMENT 'Telefono de Cliente',
  `cli_email` varchar(60) NOT NULL COMMENT 'Email de Cliente',
  `cli_fechaNacimiento` date NOT NULL COMMENT 'Nacimiento de Cliente',
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_nombre`, `cli_apellido`, `cli_direccion`, `cli_ciudad`, `cli_telefono`, `cli_email`, `cli_fechaNacimiento`) VALUES
(1, 'JOHNNY', 'VILLACÍS', 'AVENIDA DE LAS AMÉRICAS', 'AMBATO', '0987654321', '12345@GMAIL.COM', '1998-08-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

DROP TABLE IF EXISTS `cobro`;
CREATE TABLE IF NOT EXISTS `cobro` (
  `cob_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Cobro',
  `cob_total` float NOT NULL COMMENT 'Total de Cobro',
  `cob_cuenta_A` varchar(60) NOT NULL COMMENT 'Cuenta A de Cobro',
  `cob_cuenta_B` varchar(60) NOT NULL COMMENT 'Cuenta B de Cobro',
  `cob_estado` varchar(60) NOT NULL COMMENT 'Estado de Cobro',
  PRIMARY KEY (`cob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Factura',
  `fac_fecha` date NOT NULL COMMENT 'Fecha de Factura',
  `fac_subtotal` float NOT NULL COMMENT 'Subtotal de Factura',
  `fac_total` float NOT NULL COMMENT 'Total de Factura',
  `fac_iva` float NOT NULL COMMENT 'Iva de Factura',
  `fac_estado` varchar(60) NOT NULL COMMENT 'Estado de Factura',
  `cli_id` int(11) NOT NULL COMMENT 'id de Cliente',
  `ped_id` int(11) NOT NULL COMMENT 'id de Pedido',
  `cob_id` int(11) NOT NULL COMMENT 'id Cobro',
  PRIMARY KEY (`fac_id`),
  KEY `cli_id` (`cli_id`),
  KEY `ped_id` (`ped_id`),
  KEY `cob_id` (`cob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itempedido`
--

DROP TABLE IF EXISTS `itempedido`;
CREATE TABLE IF NOT EXISTS `itempedido` (
  `ite_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Item Pedido',
  `ite_cantidad` int(11) NOT NULL COMMENT 'Cantidad de Item Pedido',
  `ite_nombre` varchar(60) NOT NULL COMMENT 'Nombre de de Item Pedido',
  `ped_id` int(11) NOT NULL COMMENT 'id de Pedido',
  `pro_id` int(11) NOT NULL COMMENT 'id de Producto',
  PRIMARY KEY (`ite_id`),
  KEY `ped_id` (`ped_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `itempedido`
--

INSERT INTO `itempedido` (`ite_id`, `ite_cantidad`, `ite_nombre`, `ped_id`, `pro_id`) VALUES
(1, 10, 'COMBO ECONÓMICO FULL PAPAS', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `ped_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Pedido',
  `ped_numero` int(11) NOT NULL COMMENT 'numero de Pedido',
  `ped_estado` varchar(60) NOT NULL COMMENT 'Estado de Pedido',
  `ped_fecha` date NOT NULL COMMENT 'Fecha Pedido',
  PRIMARY KEY (`ped_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_id`, `ped_numero`, `ped_estado`, `ped_fecha`) VALUES
(1, 1111, 'ABIERTO', '2018-07-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Producto',
  `pro_nombre` varchar(60) NOT NULL COMMENT 'Nombre de Producto',
  `pro_descripcion` varchar(200) NOT NULL COMMENT 'Descripcion de Producto',
  `pro_costo` float NOT NULL COMMENT 'Costo de Producto',
  `pro_precio` float NOT NULL COMMENT 'Precio de Producto',
  `pro_imagen` varchar(200) NOT NULL COMMENT 'Imagen de Producto',
  `pro_estado` varchar(60) NOT NULL COMMENT 'Estado de Producto',
  `cat_id` int(11) NOT NULL COMMENT 'id Categoria',
  PRIMARY KEY (`pro_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_id`, `pro_nombre`, `pro_descripcion`, `pro_costo`, `pro_precio`, `pro_imagen`, `pro_estado`, `cat_id`) VALUES
(1, 'PAPAS', 'TUBÉRCULO', 0, 1, 'IMAGEN PAPAS', 'DISPONIBLE', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`cob_id`) REFERENCES `cobro` (`cob_id`);

--
-- Filtros para la tabla `itempedido`
--
ALTER TABLE `itempedido`
  ADD CONSTRAINT `itempedido_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `producto` (`pro_id`),
  ADD CONSTRAINT `itempedido_ibfk_2` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
