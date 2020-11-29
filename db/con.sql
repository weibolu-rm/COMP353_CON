-- -----------------------------------------------------
-- Schema consys
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `consys`;
CREATE DATABASE `consys`;
USE `consys`;

-- -----------------------------------------------------
-- Table `consys`.`building`
-- -----------------------------------------------------
CREATE TABLE `consys`.`building` (
  `building_id` INT NOT NULL AUTO_INCREMENT,
  `square_footage` DECIMAL NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`building_id`)
);

-- -----------------------------------------------------
-- Table `consys`.`condo`
-- -----------------------------------------------------
CREATE TABLE `consys`.`condo` (
  `building_id` INT NOT NULL,
  `condo_id` INT NOT NULL,
  PRIMARY KEY (`building_id`, `condo_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`)
);

-- -----------------------------------------------------
-- Table `consys`.`parking_space`
-- -----------------------------------------------------
CREATE TABLE `consys`.`parking_space` (
  `building_id` INT NOT NULL,
  `parking_space_id` INT NOT NULL,
  PRIMARY KEY (`building_id`, `parking_space_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`)
);

-- -----------------------------------------------------
-- Table `consys`.`storage_space`
-- -----------------------------------------------------
CREATE TABLE `consys`.`storage_space` (
  `building_id` INT NOT NULL,
  `ss_id` INT NOT NULL,
  PRIMARY KEY (`building_id`, `ss_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`)
);

-- -----------------------------------------------------
-- Table `consys`.`public_space`
-- -----------------------------------------------------
CREATE TABLE `consys`.`public_space` (
  `building_id` INT NOT NULL,
  `square_footage` DECIMAL NOT NULL,
  `type` VARCHAR(45) NOT NULL UNIQUE,
  PRIMARY KEY (`building_id`, `square_footage`, `type`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`)
);

-- -----------------------------------------------------
-- Table `consys`.`transaction_record`
-- -----------------------------------------------------
CREATE TABLE `consys`.`transaction_record` (
  `payment_date` DATE NOT NULL,
  `default_monthly_payment` DECIMAL NULL,
  `maintenance_payment` DECIMAL NULL
);

-- -----------------------------------------------------
-- Table `consys`.`condo_owners`
-- -----------------------------------------------------
CREATE TABLE `consys`.`condo_owners` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `percent_owned` DECIMAL NOT NULL,
  `privilege` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`)
);

-- -----------------------------------------------------
-- Table `consys`.`Maintenance`
-- -----------------------------------------------------
CREATE TABLE `consys`.`Maintenance` (
  `Contractor` VARCHAR(45) NOT NULL,
  `start_date` DATE NOT NULL,
  `complete_date` DATE NULL,
  `Type` VARCHAR(45) NOT NULL,
  `total_cost` DECIMAL DEFAULT NULL,
  `building_id` INT NOT NULL,
  `condo_id` INT DEFAULT NULL,
  PRIMARY KEY (`Contractor`, `start_date`)
);


/*row data for building table*/
INSERT INTO building (square_footage, address) VALUES (2300, "3524 Rue Sherbrooke, Montreal, QC");
INSERT INTO building (square_footage, address) VALUES (3000, "1587 Rue Laval, Montreal, QC");
INSERT INTO building (square_footage, address) VALUES (2500, "2490 Rue St Denis, Montreal, QC");

/*row data for condo table*/
INSERT INTO condo VALUES (1,1);
INSERT INTO condo VALUES (1,2);
INSERT INTO condo VALUES (1,3);
INSERT INTO condo VALUES (1,4);
INSERT INTO condo VALUES (1,5);
INSERT INTO condo VALUES (1,6);
INSERT INTO condo VALUES (1,7);
INSERT INTO condo VALUES (1,8);
INSERT INTO condo VALUES (1,9);
INSERT INTO condo VALUES (1,10);
INSERT INTO condo VALUES (2,1);
INSERT INTO condo VALUES (2,2);
INSERT INTO condo VALUES (2,3);
INSERT INTO condo VALUES (2,4);
INSERT INTO condo VALUES (2,5);
INSERT INTO condo VALUES (2,6);
INSERT INTO condo VALUES (2,7);
INSERT INTO condo VALUES (2,8);
INSERT INTO condo VALUES (2,9);
INSERT INTO condo VALUES (2,10);
INSERT INTO condo VALUES (3,1);
INSERT INTO condo VALUES (3,2);
INSERT INTO condo VALUES (3,3);
INSERT INTO condo VALUES (3,4);
INSERT INTO condo VALUES (3,5);
INSERT INTO condo VALUES (3,6);
INSERT INTO condo VALUES (3,7);
INSERT INTO condo VALUES (3,8);
INSERT INTO condo VALUES (3,9);
INSERT INTO condo VALUES (3,10);

/* default admin user */
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("admin", "admin", "admin", "admin", "admin", 0);
