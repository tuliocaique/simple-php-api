CREATE SCHEMA `simple_api`;
USE `simple_api`;
CREATE TABLE `user` (
    `id` VARCHAR(15) PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(256) NOT NULL,
    `country` VARCHAR(2)
);
