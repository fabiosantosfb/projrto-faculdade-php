-- MySQL Script generated by MySQL Workbench
-- Seg 30 Jan 2017 12:38:41 BRT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema proconpb_naopertube
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `proconpb_naopertube` ;

-- -----------------------------------------------------
-- Schema proconpb_naopertube
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `proconpb_naopertube` DEFAULT CHARACTER SET utf8 ;
USE `proconpb_naopertube` ;

-- -----------------------------------------------------
-- Table `proconpb_naopertube`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proconpb_naopertube`.`usuario` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `senha` VARCHAR(60) CHARACTER SET 'utf8' NOT NULL,
  `type` VARCHAR(6) CHARACTER SET 'utf8' NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `id_usuario_UNIQUE` (`id_usuario` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `proconpb_naopertube`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proconpb_naopertube`.`endereco` (
  `cep` VARCHAR(9) CHARACTER SET 'utf8' NOT NULL,
  `rua` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `bairro` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `cidade` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `numero` VARCHAR(10) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `complemento` TINYTEXT CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `usuario_id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  INDEX `fk_endereco_usuario1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_endereco_1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `proconpb_naopertube`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `proconpb_naopertube`.`pessoa_fisica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proconpb_naopertube`.`pessoa_fisica` (
  `nome` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `cpf` VARCHAR(14) CHARACTER SET 'utf8' NOT NULL,
  `rg` VARCHAR(10) CHARACTER SET 'utf8' NOT NULL,
  `org` VARCHAR(5) CHARACTER SET 'utf8' NOT NULL,
  `uf` VARCHAR(2) CHARACTER SET 'utf8' NOT NULL,
  `data_expedicao` VARCHAR(8) CHARACTER SET 'utf8' NOT NULL,
  `usuario_id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC),
  UNIQUE INDEX `usuario_id_usuario_UNIQUE` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_pessoa_fisica_1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `proconpb_naopertube`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `proconpb_naopertube`.`pessoa_juridica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proconpb_naopertube`.`pessoa_juridica` (
  `nome` VARCHAR(35) CHARACTER SET 'utf8' NOT NULL,
  `cnpj` VARCHAR(18) CHARACTER SET 'utf8' NOT NULL,
  `usuario_id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  UNIQUE INDEX `cnpj_UNIQUE` (`cnpj` ASC),
  UNIQUE INDEX `usuario_id_usuario_UNIQUE` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_pessoa_juridica_1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `proconpb_naopertube`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 27
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `proconpb_naopertube`.`telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proconpb_naopertube`.`telefone` (
  `status_bloqueio` INT(11) NOT NULL,
  `data_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `data_atualizacao` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `telefone_numero` VARCHAR(45) CHARACTER SET 'utf8' NOT NULL,
  `usuario_id_usuario` INT(11) NOT NULL,
  UNIQUE INDEX `telefone_numero_UNIQUE` (`telefone_numero` ASC),
  INDEX `fk_telefone_1_idx` (`usuario_id_usuario` ASC),
  CONSTRAINT `fk_telefone_1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `proconpb_naopertube`.`usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `proconpb_naopertube`.`telemarketing`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `proconpb_naopertube`.`telemarketing` (
  `status_ativo` INT(11) NOT NULL,
  `pessoa_juridica_usuario_id_usuario` INT(11) NOT NULL,
  INDEX `fk_telemarketing_1_idx` (`pessoa_juridica_usuario_id_usuario` ASC),
  CONSTRAINT `fk_telemarketing_1`
    FOREIGN KEY (`pessoa_juridica_usuario_id_usuario`)
    REFERENCES `proconpb_naopertube`.`pessoa_juridica` (`usuario_id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
