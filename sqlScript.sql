CREATE DATABASE usersDB;
USE usersDB;

CREATE TABLE IF NOT EXISTS `users` (
	  `id` int(30) NOT NULL AUTO_INCREMENT,
	  `first_name` varchar(30) NOT NULL,
	  `last_name` varchar(30) NOT NULL,
	  `email` varchar(30) NOT NULL,
	  `username` varchar(30) NOT NULL,
	  `password` varchar(30) NOT NULL,
	  `userStocks` text NOT NULL,
	  PRIMARY KEY (`id`)
	);
