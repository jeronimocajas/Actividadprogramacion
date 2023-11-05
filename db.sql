-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema aeropuerto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema aeropuerto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `aeropuerto` DEFAULT CHARACTER SET utf8 ;
USE `aeropuerto` ;

-- -----------------------------------------------------
-- Table `aeropuerto`.`vuelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aeropuerto`.`vuelo` (
  `idvuelo` INT NOT NULL,
  `numero_vuelo` VARCHAR(45) NOT NULL,
  `origen` VARCHAR(45) NOT NULL,
  `destino` VARCHAR(45) NOT NULL,
  `fecha de salida` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idvuelo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aeropuerto`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aeropuerto`.`roles` (
  `idroles` INT NOT NULL,
  `nombreRol` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idroles`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aeropuerto`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aeropuerto`.`usuario` (
  `idUsuario` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `constraseña` VARCHAR(45) NOT NULL,
  `roles_idroles` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_usuario_roles1_idx` (`roles_idroles` ASC),
  CONSTRAINT `fk_usuario_roles1`
    FOREIGN KEY (`roles_idroles`)
    REFERENCES `aeropuerto`.`roles` (`idroles`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aeropuerto`.`asientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aeropuerto`.`asientos` (
  `idasientos` INT NOT NULL,
  PRIMARY KEY (`idasientos`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aeropuerto`.`reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aeropuerto`.`reserva` (
  `idreserva` INT NOT NULL AUTO_INCREMENT,
  `vuelo_idvuelo` INT NOT NULL,
  `usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idreserva`),
  INDEX `fk_reserva_vuelo1_idx` (`vuelo_idvuelo` ASC),
  INDEX `fk_reserva_usuario1_idx` (`usuario_idUsuario` ASC),
  CONSTRAINT `fk_reserva_vuelo1`
    FOREIGN KEY (`vuelo_idvuelo`)
    REFERENCES `aeropuerto`.`vuelo` (`idvuelo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reserva_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `aeropuerto`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aeropuerto`.`cheking`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aeropuerto`.`cheking` (
  `idcheking` INT NOT NULL,
  `reserva_idreserva` INT NOT NULL,
  PRIMARY KEY (`idcheking`),
  INDEX `fk_cheking_reserva1_idx` (`reserva_idreserva` ASC),
  CONSTRAINT `fk_cheking_reserva1`
    FOREIGN KEY (`reserva_idreserva`)
    REFERENCES `aeropuerto`.`reserva` (`idreserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aeropuerto`.`asientos_has_vuelo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `aeropuerto`.`asientos_has_vuelo` (
  `asientos_idasientos` INT NOT NULL,
  `vuelo_idvuelo` INT NOT NULL,
  PRIMARY KEY (`asientos_idasientos`, `vuelo_idvuelo`),
  INDEX `fk_asientos_has_vuelo_vuelo1_idx` (`vuelo_idvuelo` ASC),
  INDEX `fk_asientos_has_vuelo_asientos1_idx` (`asientos_idasientos` ASC),
  CONSTRAINT `fk_asientos_has_vuelo_asientos1`
    FOREIGN KEY (`asientos_idasientos`)
    REFERENCES `aeropuerto`.`asientos` (`idasientos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_asientos_has_vuelo_vuelo1`
    FOREIGN KEY (`vuelo_idvuelo`)
    REFERENCES `aeropuerto`.`vuelo` (`idvuelo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
