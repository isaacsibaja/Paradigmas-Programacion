-- MySQL Script generated by MySQL Workbench
-- mar 29 sep 2015 12:01:53 CST
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bdfarmacia
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bdfarmacia` ;

-- -----------------------------------------------------
-- Schema bdfarmacia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdfarmacia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bdfarmacia` ;

-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbcategoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbcategoria` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbcategoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcion` VARCHAR(25) NOT NULL COMMENT '',
  PRIMARY KEY (`idCategoria`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbtipoproducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbtipoproducto` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbtipoproducto` (
  `idTipoProducto` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcionTipo` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipoProducto`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbpresentacionproducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbpresentacionproducto` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbpresentacionproducto` (
  `idPresentacionProducto` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcionPresentacion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idPresentacionProducto`)  COMMENT '')
ENGINE = InnoDB
COMMENT = 'biugyb';


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbunidadmedida`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbunidadmedida` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbunidadmedida` (
  `idUnidadMedida` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcionUnidad` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idUnidadMedida`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbproducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbproducto` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbproducto` (
  `idProducto` INT NOT NULL AUTO_INCREMENT COMMENT '',
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
    REFERENCES `bdfarmacia`.`tbcategoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProducto_1`
    FOREIGN KEY (`idTipoProducto`)
    REFERENCES `bdfarmacia`.`tbtipoproducto` (`idTipoProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProducto_2`
    FOREIGN KEY (`idPresentacionProducto`)
    REFERENCES `bdfarmacia`.`tbpresentacionproducto` (`idPresentacionProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProducto_3`
    FOREIGN KEY (`idUnidadMedida`)
    REFERENCES `bdfarmacia`.`tbunidadmedida` (`idUnidadMedida`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbagenteventas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbagenteventas` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbagenteventas` (
  `idAgenteVenta` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombreAgente` VARCHAR(45) NOT NULL COMMENT '',
  `telefonoAgente` VARCHAR(45) NOT NULL COMMENT '',
  `correoAgente` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idAgenteVenta`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbtipopago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbtipopago` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbtipopago` (
  `idTipoPago` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipoPago`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbpaciente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbpaciente` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbpaciente` (
  `idPaciente` INT NOT NULL AUTO_INCREMENT COMMENT '',
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
-- Table `bdfarmacia`.`tbreceta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbreceta` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbreceta` (
  `idReceta` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idProducto` INT NOT NULL COMMENT '',
  `idPaciente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idReceta`, `idProducto`, `idPaciente`)  COMMENT '',
  INDEX `fk_tbReceta_1_idx` (`idPaciente` ASC)  COMMENT '',
  CONSTRAINT `fk_tbReceta_1`
    FOREIGN KEY (`idPaciente`)
    REFERENCES `bdfarmacia`.`tbpaciente` (`idPaciente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbfactura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbfactura` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbfactura` (
  `idFactura` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idReceta` INT NOT NULL COMMENT '',
  `idTipoPago` INT NOT NULL COMMENT '',
  `fecha` DATE NOT NULL COMMENT '',
  `montoTotal` DOUBLE NOT NULL COMMENT '',
  PRIMARY KEY (`idFactura`, `idReceta`, `idTipoPago`)  COMMENT '',
  INDEX `fk_tb_facturacion_3_idx` (`idTipoPago` ASC)  COMMENT '',
  INDEX `fk_tbFactura_1_idx` (`idReceta` ASC)  COMMENT '',
  CONSTRAINT `fk_tb_facturacion_3`
    FOREIGN KEY (`idTipoPago`)
    REFERENCES `bdfarmacia`.`tbtipopago` (`idTipoPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbFactura_1`
    FOREIGN KEY (`idReceta`)
    REFERENCES `bdfarmacia`.`tbreceta` (`idReceta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbtipousuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbtipousuario` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbtipousuario` (
  `idTipoUsuario` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idTipoUsuario`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbpersona`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbpersona` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbpersona` (
  `idPersona` INT NOT NULL AUTO_INCREMENT COMMENT '',
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
    REFERENCES `bdfarmacia`.`tbtipousuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbproductolote`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbproductolote` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbproductolote` (
  `idLote` INT NOT NULL AUTO_INCREMENT COMMENT '',
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
    REFERENCES `bdfarmacia`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoLote_2`
    FOREIGN KEY (`idAgenteVenta`)
    REFERENCES `bdfarmacia`.`tbagenteventas` (`idAgenteVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbfacturaproductos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbfacturaproductos` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbfacturaproductos` (
  `idFacturacion` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idLote` INT NOT NULL COMMENT '',
  `cantidad` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFacturacion`, `idLote`)  COMMENT '',
  INDEX `fk_tbFacturaProductos_1_idx` (`idLote` ASC)  COMMENT '',
  CONSTRAINT `fk_tbFacturaProductos_1`
    FOREIGN KEY (`idLote`)
    REFERENCES `bdfarmacia`.`tbproductolote` (`idLote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbdireccioncasacomercial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbdireccioncasacomercial` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbdireccioncasacomercial` (
  `idDireccionCasaComercial` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `provincia` VARCHAR(45) NOT NULL COMMENT '',
  `canton` VARCHAR(45) NOT NULL COMMENT '',
  `distrito` VARCHAR(45) NOT NULL COMMENT '',
  `otraSenias` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idDireccionCasaComercial`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbcasacomercial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbcasacomercial` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbcasacomercial` (
  `idCasaComercial` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idDireccionCasaComercial` INT NOT NULL COMMENT '',
  `nombreCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  `telefonoCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  `correoCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  `faxCasaComercial` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idCasaComercial`)  COMMENT '',
  INDEX `fk_tbCasaComercial_1_idx` (`idDireccionCasaComercial` ASC)  COMMENT '',
  CONSTRAINT `fk_tbCasaComercial_1`
    FOREIGN KEY (`idDireccionCasaComercial`)
    REFERENCES `bdfarmacia`.`tbdireccioncasacomercial` (`idDireccionCasaComercial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbempleado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbempleado` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbempleado` (
  `cedulaEmpleado` INT NOT NULL COMMENT '',
  PRIMARY KEY (`cedulaEmpleado`)  COMMENT '',
  CONSTRAINT `fk_tbEmpleados_1`
    FOREIGN KEY (`cedulaEmpleado`)
    REFERENCES `bdfarmacia`.`tbpersona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbcliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbcliente` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbcliente` (
  `cedulaCliente` INT NOT NULL COMMENT '',
  PRIMARY KEY (`cedulaCliente`)  COMMENT '',
  CONSTRAINT `fk_tbCliente_1`
    FOREIGN KEY (`cedulaCliente`)
    REFERENCES `bdfarmacia`.`tbpersona` (`idPersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbcasacomercialagente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbcasacomercialagente` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbcasacomercialagente` (
  `idCasaComercial` INT NOT NULL COMMENT '',
  `idAgenteVenta` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idCasaComercial`, `idAgenteVenta`)  COMMENT '',
  INDEX `fk_tbCasaComercialAgente_1_idx` (`idAgenteVenta` ASC)  COMMENT '',
  CONSTRAINT `fk_tbCasaComercialAgente_1`
    FOREIGN KEY (`idAgenteVenta`)
    REFERENCES `bdfarmacia`.`tbagenteventas` (`idAgenteVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbCasaComercialAgente_2`
    FOREIGN KEY (`idCasaComercial`)
    REFERENCES `bdfarmacia`.`tbcasacomercial` (`idCasaComercial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbingredienteactivo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbingredienteactivo` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbingredienteactivo` (
  `idIngredienteActivo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcionIngrediente` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idIngredienteActivo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbproductoingrediente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbproductoingrediente` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbproductoingrediente` (
  `idProducto` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idIngredienteActivo` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idIngredienteActivo`)  COMMENT '',
  INDEX `fk_tbProductoIngrediente_1_idx` (`idIngredienteActivo` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoIngrediente_1`
    FOREIGN KEY (`idIngredienteActivo`)
    REFERENCES `bdfarmacia`.`tbingredienteactivo` (`idIngredienteActivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoIngrediente_2`
    FOREIGN KEY (`idProducto`)
    REFERENCES `bdfarmacia`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbsintoma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbsintoma` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbsintoma` (
  `idSintoma` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcionSintoma` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idSintoma`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbenfermedad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbenfermedad` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbenfermedad` (
  `idEnfermedad` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nombreCientifico` VARCHAR(45) NOT NULL COMMENT '',
  `nombreComun` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idEnfermedad`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbentrega`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbentrega` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbentrega` (
  `idEntrega` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idFactura` INT NOT NULL COMMENT '',
  `estadoEntrega` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idEntrega`, `idFactura`)  COMMENT '',
  INDEX `fk_tbEntrega_1_idx` (`idFactura` ASC)  COMMENT '',
  CONSTRAINT `fk_tbEntrega_1`
    FOREIGN KEY (`idFactura`)
    REFERENCES `bdfarmacia`.`tbfactura` (`idFactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbmetodoaplicacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbmetodoaplicacion` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbmetodoaplicacion` (
  `idMetodoAplicacion` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `descripcionAplicacion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`idMetodoAplicacion`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbproductosintoma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbproductosintoma` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbproductosintoma` (
  `idProducto` INT NOT NULL COMMENT '',
  `idSintoma` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idSintoma`)  COMMENT '',
  INDEX `fk_tbProductoSintoma_2_idx` (`idSintoma` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoSintoma_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `bdfarmacia`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoSintoma_2`
    FOREIGN KEY (`idSintoma`)
    REFERENCES `bdfarmacia`.`tbsintoma` (`idSintoma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbproductoaplicacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbproductoaplicacion` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbproductoaplicacion` (
  `idProducto` INT NOT NULL COMMENT '',
  `idMetodoAplicacion` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idMetodoAplicacion`)  COMMENT '',
  INDEX `fk_tbProductoAplicacion_2_idx` (`idMetodoAplicacion` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoAplicacion_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `bdfarmacia`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoAplicacion_2`
    FOREIGN KEY (`idMetodoAplicacion`)
    REFERENCES `bdfarmacia`.`tbmetodoaplicacion` (`idMetodoAplicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbproductoreceta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbproductoreceta` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbproductoreceta` (
  `idProducto` INT NOT NULL COMMENT '',
  `idReceta` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idProducto`, `idReceta`)  COMMENT '',
  INDEX `fk_tbProductoReceta_2_idx` (`idReceta` ASC)  COMMENT '',
  CONSTRAINT `fk_tbProductoReceta_1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `bdfarmacia`.`tbproducto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbProductoReceta_2`
    FOREIGN KEY (`idReceta`)
    REFERENCES `bdfarmacia`.`tbreceta` (`idReceta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdfarmacia`.`tbenfermedadsintoma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdfarmacia`.`tbenfermedadsintoma` ;

CREATE TABLE IF NOT EXISTS `bdfarmacia`.`tbenfermedadsintoma` (
  `idEnfermedad` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idSintoma` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idEnfermedad`, `idSintoma`)  COMMENT '',
  INDEX `fk_tbEnfermedadSintoma_1_idx` (`idSintoma` ASC)  COMMENT '',
  CONSTRAINT `fk_tbEnfermedadSintoma_1`
    FOREIGN KEY (`idSintoma`)
    REFERENCES `bdfarmacia`.`tbsintoma` (`idSintoma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbEnfermedadSintoma_2`
    FOREIGN KEY (`idEnfermedad`)
    REFERENCES `bdfarmacia`.`tbenfermedad` (`idEnfermedad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
