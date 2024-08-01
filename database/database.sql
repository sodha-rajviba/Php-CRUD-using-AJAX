DROP DATABASE IF EXISTS `UserDetailDB`;

CREATE DATABASE `UserDetailDB`;

USE `UserDetailDB`;

CREATE TABLE `User`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `Username` VARCHAR(255) NOT NULL,
    `Password` VARCHAR(255) NOT NULL
);

CREATE TABLE `UserDetails`(
    `Id` INT PRIMARY KEY AUTO_INCREMENT,
    `Userid` INT,
    `Firstname` VARCHAR(255) NOT NULL,
    `Lastname` VARCHAR(255) NOT NULL,
    `Address` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `Phonenumber` VARCHAR(255) NOT NULL,
    FOREIGN KEY (`Userid`) REFERENCES `User` (`Id`)
);