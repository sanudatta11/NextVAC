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
  `secretkey` VARCHAR(45) NOT NULL,
  `contestcode` VARCHAR(45) NOT NULL,
  `problemcode` INT(11) NOT NULL DEFAULT '1',
  `score` VARCHAR(45) NOT NULL DEFAULT '0',
  `subtime` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3) ON UPDATE CURRENT_TIMESTAMP());


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
  `marks` INT(11) NOT NULL DEFAULT '0',
  `status` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`defaultskill`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`defaultskill` (
  `id` BIGINT(2) NOT NULL,
  `branch` VARCHAR(100) NOT NULL DEFAULT 'global',
  `skillname` VARCHAR(300) NOT NULL,
  `skillhash` VARCHAR(100) NOT NULL,
  `active` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
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
  `sessionvar` VARCHAR(60) NULL DEFAULT 'invalid',
  `designation` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE INDEX `idlogin_UNIQUE` (`username` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`masterdb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`masterdb` (
  `secretkey` VARCHAR(50) NOT NULL,
  `propic` VARCHAR(45) NULL DEFAULT 'default.jpg',
  `firstname` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`secretkey`),
  UNIQUE INDEX `secretkey_UNIQUE` (`secretkey` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`profile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`profile` (
  `secretkey` VARCHAR(30) NOT NULL,
  `propic` VARCHAR(45) NOT NULL DEFAULT 'default.jpg',
  `status` VARCHAR(100) NOT NULL DEFAULT 'I am new to NextVAC',
  `designation` VARCHAR(45) NOT NULL,
  `incomming` INT(11) NOT NULL DEFAULT '0',
  `messages` INT(11) NOT NULL DEFAULT '0',
  `email` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `cover` VARCHAR(45) NOT NULL DEFAULT 'defaultcover.jpg',
  `hostel` VARCHAR(45) NULL DEFAULT 'Day Scholar',
  `hometown` VARCHAR(45) NULL DEFAULT 'Not Given',
  `number` VARCHAR(45) NOT NULL,
  `course` VARCHAR(45) NULL DEFAULT 'Teacher',
  `semester` INT(11) NOT NULL DEFAULT '0',
  `organization` VARCHAR(45) NULL DEFAULT NULL,
  `gender` INT(11) NOT NULL DEFAULT '3',
  `cgpa` DOUBLE NOT NULL DEFAULT '0',
  PRIMARY KEY (`secretkey`),
  UNIQUE INDEX `secretkey_UNIQUE` (`secretkey` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `nextvac`.`questiondb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`questiondb` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
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
  `status` INT(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
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
-- Table `nextvac`.`skilldb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`skilldb` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `secretkey` VARCHAR(50) NOT NULL,
  `skillname` VARCHAR(200) NOT NULL,
  `skillihash` VARCHAR(100) NOT NULL,
  `level` INT(11) NOT NULL,
  `loggedate` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3) ON UPDATE CURRENT_TIMESTAMP());


-- -----------------------------------------------------
-- Table `nextvac`.`studentinfo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`studentinfo` (
  `secretkey` VARCHAR(50) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `section` VARCHAR(50) NOT NULL,
  `regno` INT(11) NOT NULL,
  `attendance` INT(11) NULL DEFAULT '0',
  `rank` INT(11) NULL DEFAULT '0',
  PRIMARY KEY (`secretkey`),
  UNIQUE INDEX `secretkey_UNIQUE` (`secretkey` ASC),
  UNIQUE INDEX `regno_UNIQUE` (`regno` ASC))
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


-- -----------------------------------------------------
-- Table `nextvac`.`uniquecreate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nextvac`.`uniquecreate` (
  `uniqueid` VARCHAR(500) NOT NULL,
  `sessionkey` VARCHAR(100) NOT NULL,
  `firstname` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `created` INT(11) NOT NULL DEFAULT '0',
  `createdat` TIMESTAMP(3) NOT NULL DEFAULT CURRENT_TIMESTAMP(3) ON UPDATE CURRENT_TIMESTAMP());


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
