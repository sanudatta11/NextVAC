-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema nextvac
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema nextvac
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `nextvac` DEFAULT CHARACTER SET latin1 ;
USE `nextvac` ;

-- -----------------------------------------------------
-- Table `nextvac`.`answersdb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`answersdb` (
  `secretkey` VARCHAR(30) NOT NULL,
  `section` VARCHAR(10) NOT NULL,
  `quescode` VARCHAR(25) NOT NULL,
  `codeid` INT(11) NOT NULL,
  `answer` INT(11) NOT NULL,
  `verdict` BINARY(1) NOT NULL,
  PRIMARY KEY (`secretkey`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `secretkey_UNIQUE` ON `nextvac`.`answersdb` (`secretkey` ASC);


-- -----------------------------------------------------
-- Table `nextvac`.`classallocate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`classallocate` (
  `id` VARCHAR(45) NOT NULL,
  `secretkey` VARCHAR(30) NOT NULL,
  `section` VARCHAR(30) NOT NULL,
  `subject` VARCHAR(70) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`globaldata`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`globaldata` (
  `name` VARCHAR(70) NOT NULL,
  `events` INT(11) NOT NULL,
  `crank` INT(11) NOT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`ipconnect`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`ipconnect` (
  `id` INT(11) NOT NULL,
  `roomno` VARCHAR(45) NOT NULL,
  `ipaddress` VARCHAR(45) NOT NULL,
  `ipkey` VARCHAR(145) NOT NULL,
  `section` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`login` (
  `username` INT(10) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `secretkey` VARCHAR(30) NOT NULL,
  `sessionvar` VARCHAR(60) NOT NULL DEFAULT 'none',
  `designation` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `idlogin_UNIQUE` ON `nextvac`.`login` (`username` ASC);


-- -----------------------------------------------------
-- Table `nextvac`.`profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`profile` (
  `secretkey` VARCHAR(30) NOT NULL,
  `propic` VARCHAR(45) NOT NULL,
  `status` VARCHAR(100) NULL DEFAULT NULL,
  `designation` VARCHAR(45) NOT NULL,
  `incomming` INT(11) NOT NULL,
  `messages` INT(11) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `cover` VARCHAR(45) NOT NULL,
  `hostel` VARCHAR(45) NOT NULL,
  `hometown` VARCHAR(45) NOT NULL,
  `number` VARCHAR(45) NOT NULL,
  `course` VARCHAR(45) NOT NULL,
  `semester` INT(11) NOT NULL,
  `organization` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`secretkey`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `secretkey_UNIQUE` ON `nextvac`.`profile` (`secretkey` ASC);

CREATE UNIQUE INDEX `propic_UNIQUE` ON `nextvac`.`profile` (`propic` ASC);


-- -----------------------------------------------------
-- Table `nextvac`.`questiondb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`questiondb` (
  `id` INT(11) NOT NULL,
  `secretkey` VARCHAR(30) NOT NULL,
  `section` VARCHAR(20) NOT NULL,
  `code` VARCHAR(20) NOT NULL,
  `codeid` INT(11) NOT NULL,
  `question` VARCHAR(120) NOT NULL,
  `first` VARCHAR(45) NOT NULL,
  `second` VARCHAR(45) NOT NULL,
  `third` VARCHAR(45) NOT NULL,
  `fourth` VARCHAR(45) NOT NULL,
  `correct` SMALLINT(5) NOT NULL,
  `status` INT(11) NOT NULL DEFAULT '0')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`studentinfo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`studentinfo` (
  `secretkey` VARCHAR(30) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `section` VARCHAR(30) NOT NULL,
  `regno` INT(11) NOT NULL,
  `attendance` INT(11) NOT NULL,
  `rank` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`secretkey`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `secretkey_UNIQUE` ON `nextvac`.`studentinfo` (`secretkey` ASC);

CREATE UNIQUE INDEX `regno_UNIQUE` ON `nextvac`.`studentinfo` (`regno` ASC);

CREATE UNIQUE INDEX `rank_UNIQUE` ON `nextvac`.`studentinfo` (`rank` ASC);


-- -----------------------------------------------------
-- Table `nextvac`.`teacherinfo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`teacherinfo` (
  `secretkey` VARCHAR(30) NOT NULL,
  `cabin` VARCHAR(20) NOT NULL,
  `name` VARCHAR(85) NOT NULL,
  `specialisation` VARCHAR(55) NOT NULL,
  `honour` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`secretkey`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `secretkey_UNIQUE` ON `nextvac`.`teacherinfo` (`secretkey` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

