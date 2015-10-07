-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 06-10-2015 a las 21:32:05
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdfarmacia`
--
CREATE DATABASE IF NOT EXISTS `bdfarmacia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdfarmacia`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbagenteventas`
--

CREATE TABLE IF NOT EXISTS `tbagenteventas` (
  `idAgenteVenta` int(11) NOT NULL,
  `nombreAgente` varchar(45) NOT NULL,
  `telefonoAgente` varchar(45) NOT NULL,
  `correoAgente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcasacomercial`
--

CREATE TABLE IF NOT EXISTS `tbcasacomercial` (
  `idCasaComercial` int(11) NOT NULL,
  `idDireccionCasaComercial` int(11) NOT NULL,
  `nombreCasaComercial` varchar(45) NOT NULL,
  `telefonoCasaComercial` varchar(45) NOT NULL,
  `correoCasaComercial` varchar(45) NOT NULL,
  `faxCasaComercial` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcasacomercialagente`
--

CREATE TABLE IF NOT EXISTS `tbcasacomercialagente` (
  `idCasaComercial` int(11) NOT NULL,
  `idAgenteVenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategoria`
--

CREATE TABLE IF NOT EXISTS `tbcategoria` (
  `idCategoria` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbcategoria`
--

INSERT INTO `tbcategoria` (`idCategoria`, `descripcion`) VALUES
(1, 'Respiratoria'),
(2, '\r\n						Digestion'),
(3, '\r\n						Renal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcliente`
--

CREATE TABLE IF NOT EXISTS `tbcliente` (
  `cedulaCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdireccioncasacomercial`
--

CREATE TABLE IF NOT EXISTS `tbdireccioncasacomercial` (
  `idDireccionCasaComercial` int(11) NOT NULL,
  `provincia` varchar(45) NOT NULL,
  `canton` varchar(45) NOT NULL,
  `distrito` varchar(45) NOT NULL,
  `otraSenias` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempleado`
--

CREATE TABLE IF NOT EXISTS `tbempleado` (
  `cedulaEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbenfermedad`
--

CREATE TABLE IF NOT EXISTS `tbenfermedad` (
  `idEnfermedad` int(11) NOT NULL,
  `nombreCientifico` varchar(45) NOT NULL,
  `nombreComun` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbenfermedad`
--

INSERT INTO `tbenfermedad` (`idEnfermedad`, `nombreCientifico`, `nombreComun`) VALUES
(1, 'influeza', 'gripe'),
(2, 'asmitis', 'asma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbenfermedadsintoma`
--

CREATE TABLE IF NOT EXISTS `tbenfermedadsintoma` (
  `idEnfermedad` int(11) NOT NULL,
  `idSintoma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbenfermedadsintoma`
--

INSERT INTO `tbenfermedadsintoma` (`idEnfermedad`, `idSintoma`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbentrega`
--

CREATE TABLE IF NOT EXISTS `tbentrega` (
  `idEntrega` int(11) NOT NULL,
  `idFactura` int(11) NOT NULL,
  `estadoEntrega` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfactura`
--

CREATE TABLE IF NOT EXISTS `tbfactura` (
  `idFactura` int(11) NOT NULL,
  `idReceta` int(11) NOT NULL,
  `idTipoPago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `montoTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbfacturaproductos`
--

CREATE TABLE IF NOT EXISTS `tbfacturaproductos` (
  `idFacturacion` int(11) NOT NULL,
  `idLote` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbhorario`
--

CREATE TABLE IF NOT EXISTS `tbhorario` (
  `idHoraio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `asunto` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbhorario`
--

INSERT INTO `tbhorario` (`idHoraio`, `fecha`, `hora`, `asunto`, `correo`) VALUES
(1, '2015-10-04', '08:00:00', 'salud', 'q@q'),
(2, '2015-10-05', '08:00:00', 'wq', 'q@q'),
(3, '2015-10-06', '08:00:00', 'w', 'q@q'),
(4, '2015-10-08', '15:00:00', 'q', 'q@q'),
(5, '2015-10-07', '13:00:00', '12', 'q@q'),
(6, '2015-10-12', '08:00:00', 'sa', 'a@a'),
(7, '2015-10-16', '15:00:00', 'CAFE', 'F@Q'),
(8, '2015-10-16', '14:00:00', 'q', 'q@q'),
(9, '2015-10-16', '08:00:00', 'q', 'q@q'),
(10, '2015-11-05', '09:30:00', 'AS', 'Q@Q'),
(11, '2015-10-07', '08:00:00', 'Congestion', 'q@q');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbingredienteactivo`
--

CREATE TABLE IF NOT EXISTS `tbingredienteactivo` (
  `idIngredienteActivo` int(11) NOT NULL,
  `descripcionIngrediente` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbingredienteactivo`
--

INSERT INTO `tbingredienteactivo` (`idIngredienteActivo`, `descripcionIngrediente`) VALUES
(1, 'acido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmetodoaplicacion`
--

CREATE TABLE IF NOT EXISTS `tbmetodoaplicacion` (
  `idMetodoAplicacion` int(11) NOT NULL,
  `descripcionAplicacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpaciente`
--

CREATE TABLE IF NOT EXISTS `tbpaciente` (
  `idPaciente` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasenia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpersona`
--

CREATE TABLE IF NOT EXISTS `tbpersona` (
  `idPersona` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido1` varchar(45) NOT NULL,
  `apellido2` varchar(45) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `celular` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasenia` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpresentacionproducto`
--

CREATE TABLE IF NOT EXISTS `tbpresentacionproducto` (
  `idPresentacionProducto` int(11) NOT NULL,
  `descripcionPresentacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='biugyb';

--
-- Volcado de datos para la tabla `tbpresentacionproducto`
--

INSERT INTO `tbpresentacionproducto` (`idPresentacionProducto`, `descripcionPresentacion`) VALUES
(1, 'Pastilla'),
(2, 'InyecciÃ³n ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproducto`
--

CREATE TABLE IF NOT EXISTS `tbproducto` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idTipoProducto` int(11) NOT NULL,
  `idPresentacionProducto` int(11) NOT NULL,
  `idUnidadMedida` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbproducto`
--

INSERT INTO `tbproducto` (`idProducto`, `idCategoria`, `idTipoProducto`, `idPresentacionProducto`, `idUnidadMedida`, `descripcion`) VALUES
(1, 1, 2, 1, 1, 'Antifludes'),
(2, 1, 2, 1, 1, 'Tapcin'),
(3, 2, 2, 1, 1, 'Mentitas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductoaplicacion`
--

CREATE TABLE IF NOT EXISTS `tbproductoaplicacion` (
  `idProducto` int(11) NOT NULL,
  `idMetodoAplicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductoingrediente`
--

CREATE TABLE IF NOT EXISTS `tbproductoingrediente` (
  `idProducto` int(11) NOT NULL,
  `idIngredienteActivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductolote`
--

CREATE TABLE IF NOT EXISTS `tbproductolote` (
  `idLote` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idAgenteVenta` int(11) NOT NULL,
  `concentracion` double NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precioCompra` double NOT NULL,
  `precioVenta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductoreceta`
--

CREATE TABLE IF NOT EXISTS `tbproductoreceta` (
  `idProducto` int(11) NOT NULL,
  `idReceta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbproductosintoma`
--

CREATE TABLE IF NOT EXISTS `tbproductosintoma` (
  `idProducto` int(11) NOT NULL,
  `idSintoma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbproductosintoma`
--

INSERT INTO `tbproductosintoma` (`idProducto`, `idSintoma`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbreceta`
--

CREATE TABLE IF NOT EXISTS `tbreceta` (
  `idReceta` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idPaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsintoma`
--

CREATE TABLE IF NOT EXISTS `tbsintoma` (
  `idSintoma` int(11) NOT NULL,
  `descripcionSintoma` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbsintoma`
--

INSERT INTO `tbsintoma` (`idSintoma`, `descripcionSintoma`) VALUES
(1, 'dolor de cabeza'),
(2, 'congestión natal '),
(3, 'ardor estomacal'),
(4, 'acides estomacal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipopago`
--

CREATE TABLE IF NOT EXISTS `tbtipopago` (
  `idTipoPago` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipoproducto`
--

CREATE TABLE IF NOT EXISTS `tbtipoproducto` (
  `idTipoProducto` int(11) NOT NULL,
  `descripcionTipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbtipoproducto`
--

INSERT INTO `tbtipoproducto` (`idTipoProducto`, `descripcionTipo`) VALUES
(1, 'Estaminico'),
(2, 'Analgecico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipousuario`
--

CREATE TABLE IF NOT EXISTS `tbtipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbunidadmedida`
--

CREATE TABLE IF NOT EXISTS `tbunidadmedida` (
  `idUnidadMedida` int(11) NOT NULL,
  `descripcionUnidad` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbunidadmedida`
--

INSERT INTO `tbunidadmedida` (`idUnidadMedida`, `descripcionUnidad`) VALUES
(1, 'mg'),
(2, 'kg'),
(3, 'ml');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbagenteventas`
--
ALTER TABLE `tbagenteventas`
 ADD PRIMARY KEY (`idAgenteVenta`);

--
-- Indices de la tabla `tbcasacomercial`
--
ALTER TABLE `tbcasacomercial`
 ADD PRIMARY KEY (`idCasaComercial`), ADD KEY `fk_tbCasaComercial_1_idx` (`idDireccionCasaComercial`);

--
-- Indices de la tabla `tbcasacomercialagente`
--
ALTER TABLE `tbcasacomercialagente`
 ADD PRIMARY KEY (`idCasaComercial`,`idAgenteVenta`), ADD KEY `fk_tbCasaComercialAgente_1_idx` (`idAgenteVenta`);

--
-- Indices de la tabla `tbcategoria`
--
ALTER TABLE `tbcategoria`
 ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
 ADD PRIMARY KEY (`cedulaCliente`);

--
-- Indices de la tabla `tbdireccioncasacomercial`
--
ALTER TABLE `tbdireccioncasacomercial`
 ADD PRIMARY KEY (`idDireccionCasaComercial`);

--
-- Indices de la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
 ADD PRIMARY KEY (`cedulaEmpleado`);

--
-- Indices de la tabla `tbenfermedad`
--
ALTER TABLE `tbenfermedad`
 ADD PRIMARY KEY (`idEnfermedad`);

--
-- Indices de la tabla `tbenfermedadsintoma`
--
ALTER TABLE `tbenfermedadsintoma`
 ADD PRIMARY KEY (`idEnfermedad`,`idSintoma`), ADD KEY `fk_tbEnfermedadSintoma_1_idx` (`idSintoma`);

--
-- Indices de la tabla `tbentrega`
--
ALTER TABLE `tbentrega`
 ADD PRIMARY KEY (`idEntrega`,`idFactura`), ADD KEY `fk_tbEntrega_1_idx` (`idFactura`);

--
-- Indices de la tabla `tbfactura`
--
ALTER TABLE `tbfactura`
 ADD PRIMARY KEY (`idFactura`,`idReceta`,`idTipoPago`), ADD KEY `fk_tb_facturacion_3_idx` (`idTipoPago`), ADD KEY `fk_tbFactura_1_idx` (`idReceta`);

--
-- Indices de la tabla `tbfacturaproductos`
--
ALTER TABLE `tbfacturaproductos`
 ADD PRIMARY KEY (`idFacturacion`,`idLote`), ADD KEY `fk_tbFacturaProductos_1_idx` (`idLote`);

--
-- Indices de la tabla `tbhorario`
--
ALTER TABLE `tbhorario`
 ADD PRIMARY KEY (`idHoraio`);

--
-- Indices de la tabla `tbingredienteactivo`
--
ALTER TABLE `tbingredienteactivo`
 ADD PRIMARY KEY (`idIngredienteActivo`);

--
-- Indices de la tabla `tbmetodoaplicacion`
--
ALTER TABLE `tbmetodoaplicacion`
 ADD PRIMARY KEY (`idMetodoAplicacion`);

--
-- Indices de la tabla `tbpaciente`
--
ALTER TABLE `tbpaciente`
 ADD PRIMARY KEY (`idPaciente`);

--
-- Indices de la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
 ADD PRIMARY KEY (`idPersona`), ADD KEY `fk_tbPersona_1_idx` (`idTipoUsuario`);

--
-- Indices de la tabla `tbpresentacionproducto`
--
ALTER TABLE `tbpresentacionproducto`
 ADD PRIMARY KEY (`idPresentacionProducto`);

--
-- Indices de la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
 ADD PRIMARY KEY (`idProducto`), ADD KEY `fk_tb_producto_1_idx` (`idCategoria`), ADD KEY `fk_tbProducto_1_idx` (`idTipoProducto`), ADD KEY `fk_tbProducto_2_idx` (`idPresentacionProducto`), ADD KEY `fk_tbProducto_3_idx` (`idUnidadMedida`);

--
-- Indices de la tabla `tbproductoaplicacion`
--
ALTER TABLE `tbproductoaplicacion`
 ADD PRIMARY KEY (`idProducto`,`idMetodoAplicacion`), ADD KEY `fk_tbProductoAplicacion_2_idx` (`idMetodoAplicacion`);

--
-- Indices de la tabla `tbproductoingrediente`
--
ALTER TABLE `tbproductoingrediente`
 ADD PRIMARY KEY (`idProducto`,`idIngredienteActivo`), ADD KEY `fk_tbProductoIngrediente_1_idx` (`idIngredienteActivo`);

--
-- Indices de la tabla `tbproductolote`
--
ALTER TABLE `tbproductolote`
 ADD PRIMARY KEY (`idLote`,`idProducto`,`idAgenteVenta`), ADD KEY `fk_tbProductoLote_1_idx` (`idProducto`), ADD KEY `fk_tbProductoLote_2_idx` (`idAgenteVenta`);

--
-- Indices de la tabla `tbproductoreceta`
--
ALTER TABLE `tbproductoreceta`
 ADD PRIMARY KEY (`idProducto`,`idReceta`), ADD KEY `fk_tbProductoReceta_2_idx` (`idReceta`);

--
-- Indices de la tabla `tbproductosintoma`
--
ALTER TABLE `tbproductosintoma`
 ADD PRIMARY KEY (`idProducto`,`idSintoma`), ADD KEY `fk_tbProductoSintoma_2_idx` (`idSintoma`);

--
-- Indices de la tabla `tbreceta`
--
ALTER TABLE `tbreceta`
 ADD PRIMARY KEY (`idReceta`,`idProducto`,`idPaciente`), ADD KEY `fk_tbReceta_1_idx` (`idPaciente`);

--
-- Indices de la tabla `tbsintoma`
--
ALTER TABLE `tbsintoma`
 ADD PRIMARY KEY (`idSintoma`);

--
-- Indices de la tabla `tbtipopago`
--
ALTER TABLE `tbtipopago`
 ADD PRIMARY KEY (`idTipoPago`);

--
-- Indices de la tabla `tbtipoproducto`
--
ALTER TABLE `tbtipoproducto`
 ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `tbtipousuario`
--
ALTER TABLE `tbtipousuario`
 ADD PRIMARY KEY (`idTipoUsuario`);

--
-- Indices de la tabla `tbunidadmedida`
--
ALTER TABLE `tbunidadmedida`
 ADD PRIMARY KEY (`idUnidadMedida`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbcasacomercial`
--
ALTER TABLE `tbcasacomercial`
ADD CONSTRAINT `fk_tbCasaComercial_1` FOREIGN KEY (`idDireccionCasaComercial`) REFERENCES `tbdireccioncasacomercial` (`idDireccionCasaComercial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbcasacomercialagente`
--
ALTER TABLE `tbcasacomercialagente`
ADD CONSTRAINT `fk_tbCasaComercialAgente_1` FOREIGN KEY (`idAgenteVenta`) REFERENCES `tbagenteventas` (`idAgenteVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbCasaComercialAgente_2` FOREIGN KEY (`idCasaComercial`) REFERENCES `tbcasacomercial` (`idCasaComercial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbcliente`
--
ALTER TABLE `tbcliente`
ADD CONSTRAINT `fk_tbCliente_1` FOREIGN KEY (`cedulaCliente`) REFERENCES `tbpersona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbempleado`
--
ALTER TABLE `tbempleado`
ADD CONSTRAINT `fk_tbEmpleados_1` FOREIGN KEY (`cedulaEmpleado`) REFERENCES `tbpersona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbenfermedadsintoma`
--
ALTER TABLE `tbenfermedadsintoma`
ADD CONSTRAINT `fk_tbEnfermedadSintoma_1` FOREIGN KEY (`idSintoma`) REFERENCES `tbsintoma` (`idSintoma`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbEnfermedadSintoma_2` FOREIGN KEY (`idEnfermedad`) REFERENCES `tbenfermedad` (`idEnfermedad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbentrega`
--
ALTER TABLE `tbentrega`
ADD CONSTRAINT `fk_tbEntrega_1` FOREIGN KEY (`idFactura`) REFERENCES `tbfactura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbfactura`
--
ALTER TABLE `tbfactura`
ADD CONSTRAINT `fk_tbFactura_1` FOREIGN KEY (`idReceta`) REFERENCES `tbreceta` (`idReceta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_facturacion_3` FOREIGN KEY (`idTipoPago`) REFERENCES `tbtipopago` (`idTipoPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbfacturaproductos`
--
ALTER TABLE `tbfacturaproductos`
ADD CONSTRAINT `fk_tbFacturaProductos_1` FOREIGN KEY (`idLote`) REFERENCES `tbproductolote` (`idLote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbpersona`
--
ALTER TABLE `tbpersona`
ADD CONSTRAINT `fk_tbPersona_1` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tbtipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbproducto`
--
ALTER TABLE `tbproducto`
ADD CONSTRAINT `fk_tbProducto_1` FOREIGN KEY (`idTipoProducto`) REFERENCES `tbtipoproducto` (`idTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbProducto_2` FOREIGN KEY (`idPresentacionProducto`) REFERENCES `tbpresentacionproducto` (`idPresentacionProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbProducto_3` FOREIGN KEY (`idUnidadMedida`) REFERENCES `tbunidadmedida` (`idUnidadMedida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tb_producto_1` FOREIGN KEY (`idCategoria`) REFERENCES `tbcategoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbproductoaplicacion`
--
ALTER TABLE `tbproductoaplicacion`
ADD CONSTRAINT `fk_tbProductoAplicacion_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbProductoAplicacion_2` FOREIGN KEY (`idMetodoAplicacion`) REFERENCES `tbmetodoaplicacion` (`idMetodoAplicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbproductoingrediente`
--
ALTER TABLE `tbproductoingrediente`
ADD CONSTRAINT `fk_tbProductoIngrediente_1` FOREIGN KEY (`idIngredienteActivo`) REFERENCES `tbingredienteactivo` (`idIngredienteActivo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbProductoIngrediente_2` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbproductolote`
--
ALTER TABLE `tbproductolote`
ADD CONSTRAINT `fk_tbProductoLote_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbProductoLote_2` FOREIGN KEY (`idAgenteVenta`) REFERENCES `tbagenteventas` (`idAgenteVenta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbproductoreceta`
--
ALTER TABLE `tbproductoreceta`
ADD CONSTRAINT `fk_tbProductoReceta_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbProductoReceta_2` FOREIGN KEY (`idReceta`) REFERENCES `tbreceta` (`idReceta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbproductosintoma`
--
ALTER TABLE `tbproductosintoma`
ADD CONSTRAINT `fk_tbProductoSintoma_1` FOREIGN KEY (`idProducto`) REFERENCES `tbproducto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_tbProductoSintoma_2` FOREIGN KEY (`idSintoma`) REFERENCES `tbsintoma` (`idSintoma`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbreceta`
--
ALTER TABLE `tbreceta`
ADD CONSTRAINT `fk_tbReceta_1` FOREIGN KEY (`idPaciente`) REFERENCES `tbpaciente` (`idPaciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
