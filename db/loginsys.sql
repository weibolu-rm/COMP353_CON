CREATE DATABASE IF NOT EXISTS loginsys;
USE loginsys;

CREATE TABLE IF NOT EXISTS user (
    uid INT(8) NOT NULL AUTO_INCREMENT,
    uname VARCHAR(120) NOT NULL,
    uemail VARCHAR(120) NOT NULL,
    upwd VARCHAR(120) NOT NULL,
    PRIMARY KEY (uid)
);