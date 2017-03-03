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
  PRIMARY KEY (`secretkey`),
  UNIQUE INDEX `secretkey_UNIQUE` (`secretkey` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


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
-- Table `nextvac`.`coderesults`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`coderesults` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `coderesultscol` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`codingdb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`codingdb` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `secretkey` VARCHAR(30) NOT NULL,
  `section` VARCHAR(45) NOT NULL,
  `contestcode` VARCHAR(35) NOT NULL,
  `contestname` VARCHAR(75) NOT NULL,
  `problemname` VARCHAR(75) NOT NULL,
  `problemcode` INT(11) NOT NULL DEFAULT '1',
  `problemstat` VARCHAR(2000) NOT NULL,
  `inputstat` VARCHAR(2000) NOT NULL,
  `outputstat` VARCHAR(2000) NOT NULL,
  `totaltestcase` INT(11) NOT NULL,
  `sample` VARCHAR(75) NOT NULL,
  `explaination` VARCHAR(700) NULL DEFAULT NULL,
  `inpfolder` VARCHAR(100) NOT NULL,
  `outfolder` VARCHAR(100) NOT NULL,
  `duration` BIGINT(5) NOT NULL,
  `status` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 12
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`globaldata`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`globaldata` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(70) NOT NULL,
  `events` INT(11) NOT NULL,
  `crank` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
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
  PRIMARY KEY (`username`),
  UNIQUE INDEX `idlogin_UNIQUE` (`username` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


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
  `hostel` VARCHAR(45) NULL DEFAULT NULL,
  `hometown` VARCHAR(45) NOT NULL,
  `number` VARCHAR(45) NOT NULL,
  `course` VARCHAR(45) NOT NULL,
  `semester` INT(11) NOT NULL,
  `organization` VARCHAR(45) NULL DEFAULT NULL,
  `gender` INT(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`secretkey`),
  UNIQUE INDEX `secretkey_UNIQUE` (`secretkey` ASC),
  UNIQUE INDEX `propic_UNIQUE` (`propic` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


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
-- Table `nextvac`.`rankingtable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`rankingtable` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `secretkey` VARCHAR(50) NOT NULL,
  `contestcode` VARCHAR(45) NOT NULL,
  `problemcode` VARCHAR(35) NOT NULL,
  `mainscore` DOUBLE NOT NULL,
  `time` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`ratingtable`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`ratingtable` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `secretkey` VARCHAR(50) NOT NULL,
  `mainscore` BIGINT(20) NOT NULL DEFAULT '100',
  `elorating` BIGINT(20) NOT NULL DEFAULT '2000',
  PRIMARY KEY (`id`))
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
  PRIMARY KEY (`secretkey`),
  UNIQUE INDEX `secretkey_UNIQUE` (`secretkey` ASC),
  UNIQUE INDEX `regno_UNIQUE` (`regno` ASC),
  UNIQUE INDEX `rank_UNIQUE` (`rank` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`teacherinfo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`teacherinfo` (
  `secretkey` VARCHAR(30) NOT NULL,
  `cabin` VARCHAR(20) NOT NULL,
  `name` VARCHAR(85) NOT NULL,
  `specialisation` VARCHAR(55) NOT NULL,
  `honour` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`secretkey`),
  UNIQUE INDEX `secretkey_UNIQUE` (`secretkey` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
