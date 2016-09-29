-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_PoesiAPP
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_PoesiAPP` ;

-- -----------------------------------------------------
-- Schema db_PoesiAPP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_PoesiAPP` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `db_PoesiAPP` ;

-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tb_autor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tb_autor` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tb_autor` (
  `id_autor` INT NOT NULL,
  `nme_autor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_autor`),
  UNIQUE INDEX `idt_autor_UNIQUE` (`id_autor` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tb_categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tb_categoria` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tb_categoria` (
  `id_categoria` INT NOT NULL,
  `nme_categoria` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE INDEX `idtable1_UNIQUE` (`id_categoria` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tb_tipo_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tb_tipo_usuario` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tb_tipo_usuario` (
  `id_tipo` INT NOT NULL,
  `nme_tipo_usuario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tb_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tb_usuario` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tb_usuario` (
  `id_usuario` INT NOT NULL,
  `nme_usuario` VARCHAR(45) NOT NULL,
  `senha_usuario` VARCHAR(15) NOT NULL,
  `dt_usu_cadastro` DATE NOT NULL,
  `cod_tipo` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE INDEX `idt_leitor_UNIQUE` (`id_usuario` ASC),
  INDEX `fk_tb_usuario_tb_tipo_usuario1_idx` (`cod_tipo` ASC),
  CONSTRAINT `fk_tb_usuario_tb_tipo_usuario1`
    FOREIGN KEY (`cod_tipo`)
    REFERENCES `db_PoesiAPP`.`tb_tipo_usuario` (`id_tipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tb_poema`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tb_poema` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tb_poema` (
  `id_poema` INT NOT NULL,
  `nme_poema` VARCHAR(45) NOT NULL,
  `dt_cadastro` DATE NOT NULL,
  `txt_poema` VARCHAR(500) NOT NULL,
  `cod_autor` INT NOT NULL,
  `cod_categoria` INT NOT NULL,
  `cod_usuario` INT NOT NULL,
  PRIMARY KEY (`id_poema`),
  UNIQUE INDEX `idt_poema_UNIQUE` (`id_poema` ASC),
  INDEX `fk_tb_poema_tb_autor` (`cod_autor` ASC),
  INDEX `fk_tb_poema_Categoria1_idx` (`cod_categoria` ASC),
  INDEX `fk_tb_poema_tb_usuario1_idx` (`cod_usuario` ASC),
  CONSTRAINT `fk_tb_poema_tb_autor`
    FOREIGN KEY (`cod_autor`)
    REFERENCES `db_PoesiAPP`.`tb_autor` (`id_autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_poema_Categoria1`
    FOREIGN KEY (`cod_categoria`)
    REFERENCES `db_PoesiAPP`.`tb_categoria` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_poema_tb_usuario1`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `db_PoesiAPP`.`tb_usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tb_grava_MP3`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tb_grava_MP3` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tb_grava_MP3` (
  `id_gravacao` INT NOT NULL,
  `nome_local_arq_MP3` VARCHAR(45) NOT NULL,
  `dt_gravacao` DATE NOT NULL,
  `cod_poema` INT NOT NULL,
  `cod_usuario` INT NOT NULL,
  PRIMARY KEY (`id_gravacao`),
  UNIQUE INDEX `idt_gravacao_UNIQUE` (`id_gravacao` ASC),
  INDEX `fk_tb_grava_MP3_tb_poema1_idx` (`cod_poema` ASC),
  INDEX `fk_tb_grava_MP3_tb_usuario1_idx` (`cod_usuario` ASC),
  CONSTRAINT `fk_tb_grava_MP3_tb_poema1`
    FOREIGN KEY (`cod_poema`)
    REFERENCES `db_PoesiAPP`.`tb_poema` (`id_poema`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_grava_MP3_tb_usuario1`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `db_PoesiAPP`.`tb_usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_PoesiAPP`.`tb_avalia_MP3`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_PoesiAPP`.`tb_avalia_MP3` ;

CREATE TABLE IF NOT EXISTS `db_PoesiAPP`.`tb_avalia_MP3` (
  `id_avalia` INT NOT NULL,
  `Txt_comentario` VARCHAR(200) NOT NULL,
  `like_dislike` VARCHAR(1) NOT NULL,
  `denunciar` VARCHAR(1) NOT NULL,
  `cod_usuario` INT NOT NULL,
  `cod_grava_MP3` INT NOT NULL,
  PRIMARY KEY (`id_avalia`),
  UNIQUE INDEX `idt_audicao_UNIQUE` (`id_avalia` ASC),
  INDEX `fk_tb_avalia_MP3_tb_usuario1_idx` (`cod_usuario` ASC),
  INDEX `fk_tb_avalia_MP3_tb_grava_MP31_idx` (`cod_grava_MP3` ASC),
  CONSTRAINT `fk_tb_avalia_MP3_tb_usuario1`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `db_PoesiAPP`.`tb_usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_avalia_MP3_tb_grava_MP31`
    FOREIGN KEY (`cod_grava_MP3`)
    REFERENCES `db_PoesiAPP`.`tb_grava_MP3` (`id_gravacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
