
CREATE TABLE `xalky_online` (
	`id` MEDIUMINT(18) NOT NULL AUTO_INCREMENT,
	`userID` INT(11) NOT NULL,
	`userName` VARCHAR(64) NOT NULL,
	`userRole` INT(1) NOT NULL,
	`channel` INT(11) NOT NULL,
	`time`  INT(13) NOT NULL,
	`ip` VARBINARY(16) NOT NULL,
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_generic;

CREATE TABLE `xalky_messages` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`userID` INT(11) NOT NULL,
	`userName` VARCHAR(64) NOT NULL,
	`userRole` INT(1) NOT NULL,
	`channel` INT(11) NOT NULL,
	`time`  INT(13) NOT NULL,
	`ip` VARBINARY(16) NOT NULL,
	`text` TEXT,
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_generic;

CREATE TABLE `xalky_bans` (
	`id` MEDIUMINT(18) NOT NULL AUTO_INCREMENT,
	`userID` INT(11) NOT NULL,
	`userName` VARCHAR(64) NOT NULL,
	`time`  INT(13) NOT NULL,
	`ip` VARBINARY(16) NOT NULL,
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_generic;

CREATE TABLE `xalky_invitations` (
	`id` MEDIUMINT(18) NOT NULL AUTO_INCREMENT,
	`userID` INT(11) NOT NULL,
	`channel` INT(11) NOT NULL,
	`time`  INT(13) NOT NULL,
	PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 COLLATE=utf8_generic;
