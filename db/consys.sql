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
  CONSTRAINT compkey1 PRIMARY KEY (`building_id`, `condo_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `consys`.`parking_space`
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
  CONSTRAINT compkey2 PRIMARY KEY (`building_id`, `condo_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `consys`.`parking_space`
-- -----------------------------------------------------
CREATE TABLE `consys`.`parking_space` (
  `building_id` INT NOT NULL,
  `parking_space_id` INT NOT NULL,
  CONSTRAINT compkey3 PRIMARY KEY (`building_id`, `parking_space_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `consys`.`storage_space`
-- -----------------------------------------------------
CREATE TABLE `consys`.`storage_space` (
  `building_id` INT NOT NULL,
  `ss_id` INT NOT NULL,
  CONSTRAINT compkey4 PRIMARY KEY (`building_id`, `ss_id`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `consys`.`public_space`
-- -----------------------------------------------------
CREATE TABLE `consys`.`public_space` (
  `building_id` INT NOT NULL,
  `square_footage` DECIMAL NOT NULL,
  `type` VARCHAR(45) NOT NULL,
  CONSTRAINT compkey5 PRIMARY KEY (`building_id`, `square_footage`, `type`),
  FOREIGN KEY (`building_id`) REFERENCES building(`building_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `consys`.`condo_owners`
-- -----------------------------------------------------
CREATE TABLE `consys`.`condo_owners` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL, 
  `address` VARCHAR(45) NOT NULL,
  `percent_owned` DECIMAL NOT NULL,
  `privilege` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`)
);

-- -----------------------------------------------------
-- Table `consys`.`transaction_record`
-- -----------------------------------------------------
CREATE TABLE `consys`.`transaction_record` (
  `user_id` INT NOT NULL,
  `payment_date` DATE NOT NULL,
  `default_monthly_payment` DECIMAL,
  `maintenance_payment` DECIMAL, 
  CONSTRAINT compkey6 PRIMARY KEY (`user_id`, `payment_date`),
  FOREIGN KEY (`user_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);

-- -----------------------------------------------------
-- Table `consys`.`maintenance`
-- -----------------------------------------------------
CREATE TABLE `consys`.`maintenance` (
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
-- Table `consys`.`posts`
-- image will be in upload/<post_id>_img.jpg
-- -----------------------------------------------------
CREATE TABLE `consys`.`posts` (
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
-- Table `consys`.`friend`
-- -----------------------------------------------------
CREATE TABLE `consys`.`friend` (
  `friend_id_1` INT NOT NULL,
  `friend_id_2` INT NOT NULL,
  FOREIGN KEY (`friend_id_1`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`friend_id_2`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  CHECK (friend_id_1 <> friend_id_2)
);

-- -----------------------------------------------------
-- table `consys`.`groups`
-- -----------------------------------------------------
CREATE TABLE `consys`.`groups` (
  `group_id` INT NOT NULL AUTO_INCREMENT,
  `owner_id` INT NOT NULL,
  `group_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`group_id`),
  FOREIGN KEY (`owner_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);


-- -----------------------------------------------------
-- table `consys`.`groups`
-- -----------------------------------------------------
CREATE TABLE `consys`.`from_group` (
  `user_id` INT NOT NULL,
  `group_id` INT NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`group_id`) REFERENCES groups(`group_id`)
);

-- -----------------------------------------------------
-- table `consys`.`emails`
-- -----------------------------------------------------
CREATE TABLE `consys`.`emails` (
  `from_id` INT NOT NULL,
  `to_id` INT NOT NULL,
  `subject` VARCHAR(45) DEFAULT "No Subject",
  `content` VARCHAR(1000) NOT NULL,
  `email_date` DATETIME NOT NULL,
  FOREIGN KEY (`from_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`to_id`) REFERENCES condo_owners(`user_id`) ON DELETE CASCADE
);


/* default admin user */
INSERT INTO condo_owners (name, email, password, address, privilege, percent_owned) 
VALUES ("admin", "admin", "admin", "admin", "admin", 0);