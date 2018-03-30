<?php

$sql = "CREATE DATABASE IF NOT EXISTS cookbook
			CHARACTER SET = 'utf8'
			COLLATE = 'utf8_bin'
		";

$sql = "CREATE TABLE users (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, user VARCHAR(32) NOT NULL, hash VARCHAR(255) NOT NULL)";

$sql =
    "CREATE TABLE `auth_tokens` (
        `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        `selector` char(12),
        `validator` char(255),
        `user_id` integer(11) not null,
        `expires` datetime
    )";
$sql = "CREATE UNIQUE INDEX `selector` ON auth_tokens (selector)";

$sql = "create table logins (
	id  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username varchar(16) not null,
	ip_address int(11) unsigned not null,
	attempted datetime not null,
	success int null
)";
$sql = "create index attempted_idx	on logins (attempted)";

$sql = "CREATE TABLE IF NOT EXISTS ingredients (
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(50) NOT NULL
		)";

$sql = "CREATE TABLE IF NOT EXISTS quantities (
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(50) NOT NULL
		)";

$sql = "CREATE TABLE IF NOT EXISTS recipes (
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			name VARCHAR(255) NOT NULL,
			path VARCHAR(255) NOT NULL,
			image VARCHAR(255),
			intro TEXT NOT NULL,
			description TEXT NOT NULL,
			creator INT(10) NOT NULL DEFAULT 0,
			modifier INT(10) NOT NULL DEFAULT 0,
			created DATETIME NOT NULL DEFAULT 0,
			modified DATETIME NOT NULL DEFAULT 0
		)";
$sql = "ALTER TABLE recipes ADD UNIQUE INDEX path (path)";

$sql = "CREATE TABLE IF NOT EXISTS recipes_ingredients (
			id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
			recipe_id INT NOT NULL,
			ingredient_id INT NOT NULL,
			quantity_id INT,
			quantity DOUBLE(10,2)
		)";

$sql = "ALTER TABLE recipes_ingredients ADD INDEX recipe_id (recipe_id)";
$sql = "ALTER TABLE recipes_ingredients ADD INDEX ingredient_id (ingredient_id)";
$sql = "ALTER TABLE recipes_ingredients ADD INDEX quantity_id (quantity_id)";
