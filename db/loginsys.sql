DROP DATABASE IF EXISTS loginsys;
CREATE DATABASE loginsys;
USE loginsys;

DROP TABLE IF EXISTS user;
CREATE TABLE user (
    uid INT(8) NOT NULL AUTO_INCREMENT,
    uname VARCHAR(120) NOT NULL,
    uemail VARCHAR(120) NOT NULL,
    upassword VARCHAR(120) NOT NULL,
    uprivilege INT(1) NOT NULL,
    PRIMARY KEY (uid)
);

-- user privilege 1 = admin 9 = regular user

INSERT INTO user (uname, uemail, upassword, uprivilege) VALUES ("admin", "admin", "admin", 1);