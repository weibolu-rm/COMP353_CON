/*40025805, 40058095*/

CREATE DATABASE IF NOT EXISTS `eac353_2`;
USE `eac353_2`;


DROP TABLE IF EXISTS `parking_space`;
DROP TABLE IF EXISTS `storage_space`;
DROP TABLE IF EXISTS `public_space`;
DROP TABLE IF EXISTS `maintenance`;
DROP TABLE IF EXISTS `transaction_record`;
DROP TABLE IF EXISTS `posts`;
DROP TABLE IF EXISTS `friend`;
DROP TABLE IF EXISTS `from_group`;
DROP TABLE IF EXISTS `groups`;
DROP TABLE IF EXISTS `emails`;
DROP TABLE IF EXISTS `emails_record`;
DROP TABLE IF EXISTS `condo`;
DROP TABLE IF EXISTS `building`;
DROP TABLE IF EXISTS `condo_owners`;

-- -----------------------------------------------------
-- Table `building`
-- -----------------------------------------------------
CREATE TABLE `building` (
  `building_id` INT NOT NULL AUTO_INCREMENT,
  `square_footage` DECIMAL NOT NULL,
  `address` VARCHAR(45) NOT NULL,
  `postal_code` VARCHAR(7) NOT NULL,
  PRIMARY KEY (`building_id`)
);

-- -----------------------------------------------------
-- Table `parking_space`
-- -----------------------------------------------------
CREATE TABLE `parking_space` (
  `building_id` INT NOT NULL,
  `parking_space_id` INT NOT NULL,
  CONSTRAINT compkey3 PRIMARY KEY (`building_id`, `parking_space_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `storage_space`
-- -----------------------------------------------------
CREATE TABLE `storage_space` (
  `building_id` INT NOT NULL,
  `ss_id` INT NOT NULL,
  CONSTRAINT compkey4 PRIMARY KEY (`building_id`, `ss_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `public_space`
-- -----------------------------------------------------
CREATE TABLE `public_space` (
  `building_id` INT NOT NULL,
  `square_footage` DECIMAL NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  CONSTRAINT compkey5 PRIMARY KEY (`building_id`, `square_footage`, `type`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `condo_owners`
-- -----------------------------------------------------
CREATE TABLE `condo_owners` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL, 
  `primary_address` VARCHAR(45) NOT NULL,
  `postal_code` VARCHAR (7) NOT NULL,
  `privilege` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`)
);

-- -----------------------------------------------------
-- Table `condo`
-- -----------------------------------------------------
CREATE TABLE `condo` (
  `building_id` INT NOT NULL,
  `condo_id` INT NOT NULL,
  `owner_id` INT,
  CONSTRAINT compkey2 PRIMARY KEY (`building_id`, `condo_id`),
  FOREIGN KEY (`building_id`) REFERENCES building (`building_id`) ON DELETE CASCADE,
  FOREIGN KEY (`owner_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `transaction_record`
-- -----------------------------------------------------
CREATE TABLE `transaction_record` (
  `user_id` INT NOT NULL,
  `payment_date` DATE NOT NULL,
  `default_monthly_payment` DECIMAL,
  `maintenance_payment` DECIMAL, 
  CONSTRAINT compkey6 PRIMARY KEY (`user_id`, `payment_date`),
  FOREIGN KEY (`user_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `maintenance`
-- -----------------------------------------------------
CREATE TABLE `maintenance` (
  `Contractor` VARCHAR(45) NOT NULL,
  `start_date` DATE NOT NULL,
  `complete_date` DATE NULL,
  `Type` VARCHAR(45) NOT NULL,
  `total_cost` DECIMAL DEFAULT NULL,
  `building_id` INT NOT NULL,
  `condo_id` INT,
  PRIMARY KEY (`Contractor`, `start_date`)
);

-- -----------------------------------------------------
-- Table `posts`
-- -----------------------------------------------------
CREATE TABLE `posts` (
  `post_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `post_date` DATETIME NOT NULL,
  `view_permission` VARCHAR(45) DEFAULT "public",
  `title` VARCHAR(45),
  `content` VARCHAR(1000),
  `image_id` VARCHAR(45) DEFAULT "none", /* none = no image */
  `is_announcement` INT(1) DEFAULT 0, /* 0 = not announcement, 1 = announcement */
  PRIMARY KEY (`post_id`),
  FOREIGN KEY (`user_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `friend`
-- -----------------------------------------------------
CREATE TABLE `friend` (
  `friend_id_1` INT NOT NULL,
  `friend_id_2` INT NOT NULL,
  FOREIGN KEY (`friend_id_1`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`friend_id_2`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  CHECK (friend_id_1 <> friend_id_2)
);

-- -----------------------------------------------------
-- table `groups`
-- -----------------------------------------------------
CREATE TABLE `groups` (
  `group_id` INT NOT NULL AUTO_INCREMENT,
  `owner_id` INT NOT NULL,
  `group_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`group_id`),
  FOREIGN KEY (`owner_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);


-- -----------------------------------------------------
-- table `groups`
-- -----------------------------------------------------
CREATE TABLE `from_group` (
  `user_id` INT NOT NULL,
  `group_id` INT NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`group_id`) REFERENCES `groups`(`group_id`) ON DELETE CASCADE

);

-- -----------------------------------------------------
-- table `emails`
-- -----------------------------------------------------
CREATE TABLE `emails` (
  `from_id` INT NOT NULL,
  `to_id` INT NOT NULL,
  `subject` VARCHAR(45) DEFAULT "No Subject",
  `content` VARCHAR(1000) NOT NULL,
  `email_date` DATETIME NOT NULL,
  FOREIGN KEY (`from_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`to_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- table `emails_record`
-- -----------------------------------------------------
CREATE TABLE `emails_record` (
  `from_id` INT NOT NULL,
  `to_id` INT NOT NULL,
  `subject` VARCHAR(45) DEFAULT "No Subject",
  `content` VARCHAR(1000) NOT NULL,
  `email_date` DATETIME NOT NULL,
  FOREIGN KEY (`from_id`) REFERENCES condo_owners(`user_id`),
  FOREIGN KEY (`to_id`) REFERENCES condo_owners(`user_id`)
);

/* default admin user */
INSERT INTO condo_owners (name, email, password, primary_address, privilege) 
VALUES ("admin", "admin", "admin", "admin", "admin");

