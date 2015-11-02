-- MySQL Script generated by MySQL Workbench
-- lun 02 nov 2015 06:56:20 CST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dbdrugstore
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `dbdrugstore` ;

-- -----------------------------------------------------
-- Schema dbdrugstore
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbdrugstore` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `dbdrugstore` ;

-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbcategoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbcategoria` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbcategoria` (
  `idCategoria` INT NOT NULL COMMENT '',
  `descripcion` VARCHAR(25) NOT NULL COMMENT '',
  PRIMARY KEY (`idCategoria`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbtipoproducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbtipoproducto` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbtipoproducto` (
  `idTipoProducto` INT NOT NULL COMMENT '',
  `descripcionTipo` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipoProducto`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbpresentacionproducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbpresentacionproducto` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbpresentacionproducto` (
  `idPresentacionProducto` INT NOT NULL COMMENT '',
  `descripcionPresentacion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idPresentacionProducto`)  COMMENT '')
ENGINE = InnoDB
COMMENT = 'biugyb';


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbunidadmedida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbunidadmedida` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbunidadmedida` (
  `idUnidadMedida` INT NOT NULL COMMENT '',
  `descripcionUnidad` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idUnidadMedida`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbproducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbproducto` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbproducto` (
  `idProducto` INT NOT NULL COMMENT '',
  `idCategoria` INT NOT NULL COMMENT '',
  `idTipoProducto` INT NOT NULL COMMENT '',
  `idPresentacionProducto` INT NOT NULL COMMENT '',
  `idUnidadMedida` INT NOT NULL COMMENT '',
  `descripcion` VARCHAR(60) NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`)  COMMENT '',
  INDEX `fk_tb_producto_1_idx` (`idCategoria` ASC)  COMMENT '',
  INDEX `fk_tbProducto_1_idx` (`idTipoProducto` ASC)  COMMENT '',
  INDEX `fk_tbProducto_2_idx` (`idPresentacionProducto` ASC)  COMMENT '',
  INDEX `fk_tbProducto_3_idx` (`idUnidadMedida` ASC)  COMMENT '',
  CONSTRAINT `fk_tb_producto_1`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `dbdrugstore`.`tbcategoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProducto_1`
    FOREIGN KEY (`idTipoProducto`)
    REFERENCES `dbdrugstore`.`tbtipoproducto` (`idTipoProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProducto_2`
    FOREIGN KEY (`idPresentacionProducto`)
    REFERENCES `dbdrugstore`.`tbpresentacionproducto` (`idPresentacionProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProducto_3`
    FOREIGN KEY (`idUnidadMedida`)
    REFERENCES `dbdrugstore`.`tbunidadmedida` (`idUnidadMedida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbagenteventas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbagenteventas` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbagenteventas` (
  `idAgenteVenta` INT NOT NULL COMMENT '',
  `nombreAgente` VARCHAR(45) NOT NULL COMMENT '',
  `telefonoAgente` VARCHAR(45) NOT NULL COMMENT '',
  `correoAgente` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idAgenteVenta`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbtipopago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbtipopago` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbtipopago` (
  `idTipoPago` INT NOT NULL COMMENT '',
  `descripcion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipoPago`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbpaciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbpaciente` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbpaciente` (
  `idPaciente` INT NOT NULL COMMENT '',
  `cedula` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `apellido1` VARCHAR(45) NOT NULL COMMENT '',
  `apellido2` VARCHAR(45) NOT NULL COMMENT '',
  `direccion` VARCHAR(45) NOT NULL COMMENT '',
  `telefono` VARCHAR(45) NOT NULL COMMENT '',
  `correo` VARCHAR(45) NOT NULL COMMENT '',
  `contrasenia` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idPaciente`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbreceta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbreceta` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbreceta` (
  `idReceta` INT NOT NULL COMMENT '',
  `idProducto` INT NOT NULL COMMENT '',
  `idPaciente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idReceta`, `idProducto`, `idPaciente`)  COMMENT '',
  INDEX `fk_tbReceta_1_idx` (`idPaciente` ASC)  COMMENT '',
  CONSTRAINT `fk_tbReceta_1`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `dbdrugstore`.`tbpaciente` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbfactura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbfactura` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbfactura` (
  `idFactura` INT NOT NULL COMMENT '',
  `idReceta` INT NOT NULL COMMENT '',
  `idTipoPago` INT NOT NULL COMMENT '',
  `fecha` DATE NOT NULL COMMENT '',
  `montoTotal` DOUBLE NOT NULL COMMENT '',
  PRIMARY KEY (`idFactura`, `idReceta`, `idTipoPago`)  COMMENT '',
  INDEX `fk_tb_facturacion_3_idx` (`idTipoPago` ASC)  COMMENT '',
  INDEX `fk_tbFactura_1_idx` (`idReceta` ASC)  COMMENT '',
  CONSTRAINT `fk_tb_facturacion_3`
    FOREIGN KEY (`idTipoPago`)
    REFERENCES `dbdrugstore`.`tbtipopago` (`idTipoPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbFactura_1`
    FOREIGN KEY (`idReceta`)
    REFERENCES `dbdrugstore`.`tbreceta` (`idReceta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbtipousuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbtipousuario` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbtipousuario` (
  `idTipoUsuario` INT NOT NULL COMMENT '',
  `descripcion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipoUsuario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbpersona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbpersona` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbpersona` (
  `idPersona` INT NOT NULL COMMENT '',
  `cedula` INT NOT NULL COMMENT '',
  `idTipoUsuario` INT NOT NULL COMMENT '',
  `nombre` VARCHAR(45) NOT NULL COMMENT '',
  `apellido1` VARCHAR(45) NOT NULL COMMENT '',
  `apellido2` VARCHAR(45) NOT NULL COMMENT '',
  `direccion` VARCHAR(45) NOT NULL COMMENT '',
  `telefono` VARCHAR(45) NOT NULL COMMENT '',
  `celular` VARCHAR(45) NOT NULL COMMENT '',
  `correo` VARCHAR(45) NOT NULL COMMENT '',
  `contrasenia` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idPersona`)  COMMENT '',
  INDEX `fk_tbPersona_1_idx` (`idTipoUsuario` ASC)  COMMENT '',
  CONSTRAINT `fk_tbPersona_1`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `dbdrugstore`.`tbtipousuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbproductolote`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbproductolote` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbproductolote` (
  `idLote` INT NOT NULL COMMENT '',
  `idProducto` INT NOT NULL COMMENT '',
  `idAgenteVenta` INT NOT NULL COMMENT '',
  `concentracion` DOUBLE NOT NULL COMMENT '',
  `fechaIngreso` DATE NOT NULL COMMENT '',
  `fechaVencimiento` DATE NOT NULL COMMENT '',
  `cantidad` INT NOT NULL COMMENT '',
  `precioCompra` DOUBLE NOT NULL COMMENT '',
  `precioVenta` DOUBLE NOT NULL COMMENT '',
  PRIMARY KEY (`idLote`, `idProducto`, `idAgenteVenta`)  COMMENT '',
  INDEX `fk_tbProductoLote_1_idx` (`idProducto` ASC)  COMMENT '',
  INDEX `fk_tbProductoLote_2_idx` (`idAgenteVenta` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoLote_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `dbdrugstore`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoLote_2`
    FOREIGN KEY (`idAgenteVenta`)
    REFERENCES `dbdrugstore`.`tbagenteventas` (`idAgenteVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbfacturaproductos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbfacturaproductos` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbfacturaproductos` (
  `idFacturacion` INT NOT NULL COMMENT '',
  `idLote` INT NOT NULL COMMENT '',
  `cantidad` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFacturacion`, `idLote`)  COMMENT '',
  INDEX `fk_tbFacturaProductos_1_idx` (`idLote` ASC)  COMMENT '',
  CONSTRAINT `fk_tbFacturaProductos_1`
    FOREIGN KEY (`idLote`)
    REFERENCES `dbdrugstore`.`tbproductolote` (`idLote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbdireccioncasacomercial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbdireccioncasacomercial` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbdireccioncasacomercial` (
  `idDireccionCasaComercial` INT NOT NULL COMMENT '',
  `provincia` VARCHAR(45) NOT NULL COMMENT '',
  `canton` VARCHAR(45) NOT NULL COMMENT '',
  `distrito` VARCHAR(45) NOT NULL COMMENT '',
  `otraSenias` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idDireccionCasaComercial`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbcasacomercial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbcasacomercial` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbcasacomercial` (
  `idCasaComercial` INT NOT NULL COMMENT '',
  `idDireccionCasaComercial` INT NOT NULL COMMENT '',
  `nombreCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  `telefonoCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  `correoCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  `faxCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idCasaComercial`)  COMMENT '',
  INDEX `fk_tbCasaComercial_1_idx` (`idDireccionCasaComercial` ASC)  COMMENT '',
  CONSTRAINT `fk_tbCasaComercial_1`
    FOREIGN KEY (`idDireccionCasaComercial`)
    REFERENCES `dbdrugstore`.`tbdireccioncasacomercial` (`idDireccionCasaComercial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbempleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbempleado` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbempleado` (
  `cedulaEmpleado` INT NOT NULL COMMENT '',
  PRIMARY KEY (`cedulaEmpleado`)  COMMENT '',
  CONSTRAINT `fk_tbEmpleados_1`
    FOREIGN KEY (`cedulaEmpleado`)
    REFERENCES `dbdrugstore`.`tbpersona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbcliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbcliente` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbcliente` (
  `cedulaCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`cedulaCliente`)  COMMENT '',
  CONSTRAINT `fk_tbCliente_1`
    FOREIGN KEY (`cedulaCliente`)
    REFERENCES `dbdrugstore`.`tbpersona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbcasacomercialagente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbcasacomercialagente` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbcasacomercialagente` (
  `idCasaComercial` INT NOT NULL COMMENT '',
  `idAgenteVenta` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idCasaComercial`, `idAgenteVenta`)  COMMENT '',
  INDEX `fk_tbCasaComercialAgente_1_idx` (`idAgenteVenta` ASC)  COMMENT '',
  CONSTRAINT `fk_tbCasaComercialAgente_1`
    FOREIGN KEY (`idAgenteVenta`)
    REFERENCES `dbdrugstore`.`tbagenteventas` (`idAgenteVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbCasaComercialAgente_2`
    FOREIGN KEY (`idCasaComercial`)
    REFERENCES `dbdrugstore`.`tbcasacomercial` (`idCasaComercial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbingredienteactivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbingredienteactivo` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbingredienteactivo` (
  `idIngredienteActivo` INT NOT NULL COMMENT '',
  `descripcionIngrediente` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idIngredienteActivo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbproductoingrediente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbproductoingrediente` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbproductoingrediente` (
  `idProducto` INT NOT NULL COMMENT '',
  `idIngredienteActivo` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idIngredienteActivo`)  COMMENT '',
  INDEX `fk_tbProductoIngrediente_1_idx` (`idIngredienteActivo` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoIngrediente_1`
    FOREIGN KEY (`idIngredienteActivo`)
    REFERENCES `dbdrugstore`.`tbingredienteactivo` (`idIngredienteActivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoIngrediente_2`
    FOREIGN KEY (`idProducto`)
    REFERENCES `dbdrugstore`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbsintoma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbsintoma` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbsintoma` (
  `idSintoma` INT NOT NULL COMMENT '',
  `descripcionSintoma` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idSintoma`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbenfermedad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbenfermedad` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbenfermedad` (
  `idEnfermedad` INT NOT NULL COMMENT '',
  `nombreCientifico` VARCHAR(45) NOT NULL COMMENT '',
  `nombreComun` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idEnfermedad`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbentrega`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbentrega` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbentrega` (
  `idEntrega` INT NOT NULL COMMENT '',
  `idFactura` INT NOT NULL COMMENT '',
  `estadoEntrega` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idEntrega`, `idFactura`)  COMMENT '',
  INDEX `fk_tbEntrega_1_idx` (`idFactura` ASC)  COMMENT '',
  CONSTRAINT `fk_tbEntrega_1`
    FOREIGN KEY (`idFactura`)
    REFERENCES `dbdrugstore`.`tbfactura` (`idFactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbmetodoaplicacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbmetodoaplicacion` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbmetodoaplicacion` (
  `idMetodoAplicacion` INT NOT NULL COMMENT '',
  `descripcionAplicacion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idMetodoAplicacion`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbproductosintoma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbproductosintoma` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbproductosintoma` (
  `idProducto` INT NOT NULL COMMENT '',
  `idSintoma` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idSintoma`)  COMMENT '',
  INDEX `fk_tbProductoSintoma_2_idx` (`idSintoma` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoSintoma_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `dbdrugstore`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoSintoma_2`
    FOREIGN KEY (`idSintoma`)
    REFERENCES `dbdrugstore`.`tbsintoma` (`idSintoma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbproductoaplicacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbproductoaplicacion` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbproductoaplicacion` (
  `idProducto` INT NOT NULL COMMENT '',
  `idMetodoAplicacion` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idMetodoAplicacion`)  COMMENT '',
  INDEX `fk_tbProductoAplicacion_2_idx` (`idMetodoAplicacion` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoAplicacion_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `dbdrugstore`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoAplicacion_2`
    FOREIGN KEY (`idMetodoAplicacion`)
    REFERENCES `dbdrugstore`.`tbmetodoaplicacion` (`idMetodoAplicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbproductoreceta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbproductoreceta` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbproductoreceta` (
  `idProducto` INT NOT NULL COMMENT '',
  `idReceta` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idReceta`)  COMMENT '',
  INDEX `fk_tbProductoReceta_2_idx` (`idReceta` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoReceta_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `dbdrugstore`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoReceta_2`
    FOREIGN KEY (`idReceta`)
    REFERENCES `dbdrugstore`.`tbreceta` (`idReceta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbenfermedadsintoma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbenfermedadsintoma` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbenfermedadsintoma` (
  `idEnfermedad` INT NOT NULL COMMENT '',
  `idSintoma` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idEnfermedad`, `idSintoma`)  COMMENT '',
  INDEX `fk_tbEnfermedadSintoma_1_idx` (`idSintoma` ASC)  COMMENT '',
  CONSTRAINT `fk_tbEnfermedadSintoma_1`
    FOREIGN KEY (`idSintoma`)
    REFERENCES `dbdrugstore`.`tbsintoma` (`idSintoma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbEnfermedadSintoma_2`
    FOREIGN KEY (`idEnfermedad`)
    REFERENCES `dbdrugstore`.`tbenfermedad` (`idEnfermedad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbdoctor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbdoctor` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbdoctor` (
  `idDoctor` INT NOT NULL COMMENT '',
  `charter` VARCHAR(10) NOT NULL COMMENT '',
  `fullName` VARCHAR(20) NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idDoctor`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbregentschedule`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbregentschedule` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbregentschedule` (
  `idRegentSchedule` INT NOT NULL COMMENT '',
  `idDoctor` INT NOT NULL COMMENT '',
  `date` DATE NOT NULL COMMENT '',
  `hour` TIME NOT NULL COMMENT '',
  PRIMARY KEY (`idRegentSchedule`, `idDoctor`)  COMMENT '',
  INDEX `fk_tbregentschedule_1_idx` (`idDoctor` ASC)  COMMENT '',
  CONSTRAINT `fk_tbregentschedule_1`
    FOREIGN KEY (`idDoctor`)
    REFERENCES `dbdrugstore`.`tbdoctor` (`idDoctor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbcustomercare`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbcustomercare` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbcustomercare` (
  `idCustomerCare` INT NOT NULL COMMENT '',
  `idDoctor` INT NOT NULL COMMENT '',
  `date` DATE NOT NULL COMMENT '',
  `hour` TIME NOT NULL COMMENT '',
  PRIMARY KEY (`idCustomerCare`, `idDoctor`)  COMMENT '',
  INDEX `fk_tbCustomerCare_1_idx` (`idDoctor` ASC)  COMMENT '',
  CONSTRAINT `fk_tbCustomerCare_1`
    FOREIGN KEY (`idDoctor`)
    REFERENCES `dbdrugstore`.`tbdoctor` (`idDoctor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dbdrugstore`.`tbappointment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbdrugstore`.`tbappointment` ;

CREATE TABLE IF NOT EXISTS `dbdrugstore`.`tbappointment` (
  `idAppointment` INT NOT NULL COMMENT '',
  `idCustomer` INT NOT NULL COMMENT '',
  `idDoctor` INT NOT NULL COMMENT '',
  `date` DATE NOT NULL COMMENT '',
  `hour` TIME NOT NULL COMMENT '',
  `case` VARCHAR(45) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idAppointment`, `idDoctor`, `idCustomer`)  COMMENT '',
  INDEX `fk_tbappointment_1_idx` (`idDoctor` ASC)  COMMENT '',
  CONSTRAINT `fk_tbappointment_1`
    FOREIGN KEY (`idDoctor`)
    REFERENCES `dbdrugstore`.`tbcustomercare` (`idCustomerCare`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
