SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `CI_advanced` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `CI_advanced` ;

-- -----------------------------------------------------
-- Table `CI_advanced`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CI_advanced`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NULL ,
  `password` VARCHAR(45) NULL ,
  `firstname` VARCHAR(45) NULL ,
  `lastname` VARCHAR(45) NULL ,
  `user_level` VARCHAR(45) NULL ,
  `description` VARCHAR(255) NULL ,
  `created_at` DATETIME NULL ,
  `updated_at` DATETIME NULL ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CI_advanced`.`messages`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `CI_advanced`.`messages` (
  `message_id` INT NOT NULL AUTO_INCREMENT ,
  `content` VARCHAR(255) NULL ,
  `recipient_id` DECIMAL(10,0) NULL ,
  `user_id` INT NOT NULL ,
  `created_at` DATETIME NULL ,
  `parent_message_id` INT NULL ,
  PRIMARY KEY (`message_id`) ,
  INDEX `fk_messages_users_idx` (`user_id` ASC) ,
  CONSTRAINT `fk_messages_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `CI_advanced`.`users` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `CI_advanced` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
