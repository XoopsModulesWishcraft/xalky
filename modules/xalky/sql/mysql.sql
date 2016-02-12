
CREATE TABLE `xalky_blowfishing` (
  `salt-id` varchar(32) NOT NULL,
  `source-peer-id` varchar(32) NOT NULL DEFAULT '',
  `remote-peer-id` varchar(32) NOT NULL DEFAULT '',
  `source-salt` varchar(128) NOT NULL DEFAULT '',
  `remote-salt` varchar(128) NOT NULL DEFAULT '',
  `created` int(12) NOT NULL DEFAULT '0',
  `updated` int(12) NOT NULL DEFAULT '0',
  `expires` int(12) NOT NULL DEFAULT '0',
  `date-zone` varchar(64) NOT NULL DEFAULT 'Australia/Sydney',
  PRIMARY KEY (`salt-id`,`source-peer-id`,`remote-peer-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `xalky_callbacks` (
  `when` int(12) NOT NULL,
  `uri` varchar(250) NOT NULL DEFAULT '',
  `timeout` int(4) NOT NULL DEFAULT '0',
  `connection` int(4) NOT NULL DEFAULT '0',
  `data` mediumtext NOT NULL,
  `queries` mediumtext NOT NULL,
  `fails` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`when`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `xalky_message` (
  `msg-id` varchar(32) NOT NULL,
  `peer-id` varchar(32) NOT NULL,
  `peering-id` varchar(32) NOT NULL,
  `room-id` varchar(32) NOT NULL,
  `user-id` varchar(32) NOT NULL,
  `to-user-id` varchar(32) NOT NULL DEFAULT '',
  `to-peer-id` varchar(32) NOT NULL DEFAULT '',
  `message` varchar(500) NOT NULL DEFAULT '',
  `sfx` varchar(45) NOT NULL,
  `sent` enum('Yes','No') NOT NULL DEFAULT 'No',
  `sent-peers` enum('Yes','No') NOT NULL DEFAULT 'No',
  `when` int(12) NOT NULL DEFAULT '0',
  `zone` varchar(45) NOT NULL DEFAULT 'Australia/Sydney',
  PRIMARY KEY (`msg-id`,`peer-id`,`peering-id`,`room-id`,`user-id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `xalky_networking` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `type` enum('ipv4','ipv6') NOT NULL DEFAULT 'ipv4',
  `ipaddy` varchar(64) NOT NULL DEFAULT '',
  `netbios` varchar(198) NOT NULL DEFAULT '',
  `domain` varchar(128) NOT NULL DEFAULT '',
  `country` varchar(3) NOT NULL DEFAULT '',
  `region` varchar(128) NOT NULL DEFAULT '',
  `city` varchar(128) NOT NULL DEFAULT '',
  `postcode` varchar(15) NOT NULL DEFAULT '',
  `timezone` varchar(10) NOT NULL DEFAULT '',
  `longitude` float(12,8) NOT NULL DEFAULT '0.00000000',
  `latitude` float(12,8) NOT NULL DEFAULT '0.00000000',
  `credits` bigint(20) NOT NULL DEFAULT '0',
  `messages` bigint(20) NOT NULL DEFAULT '0',
  `privates` bigint(20) NOT NULL DEFAULT '0',
  `owned` int(10) NOT NULL DEFAULT '0',
  `users` int(10) NOT NULL DEFAULT '0',
  `created` int(13) NOT NULL DEFAULT '0',
  `last` int(13) NOT NULL DEFAULT '0',
  `whoisids` tinytext,
  PRIMARY KEY (`id`,`type`,`ipaddy`(15)),
  KEY `SEARCH` (`type`,`ipaddy`(15),`netbios`(12),`domain`(12),`country`(2),`city`(12),`region`(12),`postcode`(6),`longitude`,`latitude`,`created`,`last`,`timezone`(6)),
  KEY `EXISTS` (`type`,`ipaddy`,`netbios`,`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `xalky_peering` (
  `peering-id` varchar(32) NOT NULL,
  `local-room-id` varchar(32) NOT NULL DEFAULT '',
  `remote-room-id` varchar(32) NOT NULL DEFAULT '',
  `drop-link-pass` varchar(32) NOT NULL DEFAULT '',
  `local-owner-user-id` varchar(32) NOT NULL DEFAULT '',
  `remote-owner-user-id` varchar(32) NOT NULL DEFAULT '',
  `callback-peer-id` varchar(32) NOT NULL DEFAULT '',
  `callback-name` varchar(250) NOT NULL DEFAULT '',
  `callback-uri` varchar(250) NOT NULL DEFAULT '',
  `seeder-peer-id` varchar(32) NOT NULL DEFAULT '',
  `seeder-name` varchar(250) NOT NULL DEFAULT '',
  `seeder-uri` varchar(250) NOT NULL DEFAULT '',
  `local-users` bigint(20) unsigned NOT NULL DEFAULT '0',
  `remote-users` bigint(20) unsigned NOT NULL DEFAULT '0',
  `send-messages` bigint(20) unsigned NOT NULL DEFAULT '0',
  `recieved-messages` bigint(20) unsigned NOT NULL DEFAULT '0',
  `local-aes` enum('yes','no') NOT NULL DEFAULT 'yes',
  `local-aes-salt` varchar(128) NOT NULL DEFAULT '',
  `remote-aes` enum('yes','no') NOT NULL DEFAULT 'yes',
  `remote-aes-salt` varchar(128) NOT NULL DEFAULT '',
  `room-seeder` enum('yes','no') NOT NULL DEFAULT 'no',
  `room-save` enum('yes','no') NOT NULL DEFAULT 'yes',
  `remote-ping` float(22,16) NOT NULL DEFAULT '0.0000000000000000',
  `remote-down` enum('yes','no') NOT NULL DEFAULT 'yes',
  `started` int(12) NOT NULL,
  `last-message` int(12) NOT NULL,
  `last-ping` int(12) NOT NULL,
  `delay-ping` int(12) NOT NULL,
  `finished` int(12) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`peering-id`,`local-room-id`,`remote-room-id`,`remote-down`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `xalky_peers` (
  `peer-id` varchar(32) NOT NULL,
  `peer-sitename` varchar(200) NOT NULL,
  `peer-slogan` varchar(200) NOT NULL,
  `peer-description` tinytext,
  `peer-email` varchar(200) NOT NULL,
  `api-uri` varchar(200) NOT NULL,
  `api-uri-callback` varchar(200) NOT NULL,
  `api-uri-profile` varchar(200) NOT NULL,
  `api-uri-data` varchar(200) NOT NULL,
  `aes-support` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `remote` enum('Yes','No') NOT NULL DEFAULT 'No',
  `seeder` enum('Yes','No') NOT NULL DEFAULT 'No',
  `banned` enum('Yes','No') NOT NULL DEFAULT 'No',
  `priviledged` enum('Yes','No') NOT NULL DEFAULT 'No',
  `application` varchar(30) NOT NULL DEFAULT 'xalky',
  `version` varchar(20) NOT NULL DEFAULT '1.0.1',
  `heard` int(12) NOT NULL DEFAULT '0',
  `called` int(12) NOT NULL DEFAULT '0',
  `down` int(12) NOT NULL DEFAULT '0',
  `created` int(12) NOT NULL DEFAULT '0',
  `ping` double(22,12) NOT NULL DEFAULT '0.000000000000',
  `ping-delay` int(8) NOT NULL DEFAULT '360',
  `ping-next` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`peer-id`,`api-uri`,`api-uri-callback`,`api-uri-profile`,`remote`,`seeder`,`banned`,`priviledged`,`api-uri-data`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `xalky_profiles` (
  `profile-id` bigint(22) NOT NULL,
  `peer-uid` int(11) NOT NULL AUTO_INCREMENT,
  `peering-id` varchar(32) NOT NULL DEFAULT '',
  `peer-id` varchar(32) NOT NULL DEFAULT '',
  `peer-uname` varchar(64) NOT NULL DEFAULT '',
  `peer-name` varchar(64) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `peer-profile-url` varchar(250) NOT NULL DEFAULT 'http://',
  `peer-avatar-url` varchar(250) NOT NULL DEFAULT 'http://',
  PRIMARY KEY (`peer-userID`,`profile-id`,`peering-id`,`peer-id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `xalky_rooms` (
  `room-id` varchar(32) NOT NULL,
  `peer-id` varchar(32) NOT NULL DEFAULT '',
  `linux-name` varchar(64) NOT NULL DEFAULT '',
  `title-name` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(400) NOT NULL DEFAULT '',
  `background` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `owner-user-id` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `admins` int(12) NOT NULL DEFAULT '0',
  `moderators` int(12) NOT NULL DEFAULT '0',
  `bans` int(12) NOT NULL DEFAULT '0',
  `kicks` int(12) NOT NULL DEFAULT '0',
  `peers` int(12) NOT NULL DEFAULT '0',
  `users` int(12) NOT NULL DEFAULT '0',
  `created` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`room-id`,`peer-id`,`linux-name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE `xalky_rooms_users` (
  `room-id` varchar(32) NOT NULL,
  `user-id` varchar(32) NOT NULL,
  `guest` enum('Yes','No') DEFAULT NULL,
  `moderator` enum('Yes','No') DEFAULT NULL,
  `admin` enum('Yes','No') DEFAULT NULL,
  `kicked` enum('Yes','No') DEFAULT NULL,
  `banned` enum('Yes','No') DEFAULT NULL,
  `till` int(12) DEFAULT NULL,
  `action` int(12) DEFAULT NULL,
  PRIMARY KEY (`room-id`,`user-id`),
  KEY `SEARCH` (`guest`,`moderator`,`admin`,`banned`,`kicked`,`till`,`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `xalky_users` (
  `user-id` varchar(32) NOT NULL,
  `peering-id` varchar(32) NOT NULL DEFAULT '',
  `peer-id` varchar(32) NOT NULL DEFAULT '',
  `userID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) NOT NULL DEFAULT '',
  `uname` varchar(64) NOT NULL DEFAULT '',
  `gender` enum('Male','Female','Couple','Transsexual','Unknown') NOT NULL DEFAULT 'Unknown',
  `dob` varchar(12) NOT NULL DEFAULT '',
  `ip-id` varchar(32) NOT NULL DEFAULT '',
  `previous-room` varchar(32) NOT NULL DEFAULT '',
  `current-room` varchar(32) NOT NULL DEFAULT '',
  `avatar-url` varchar(250) NOT NULL DEFAULT '',
  `local-active` int(13) NOT NULL DEFAULT '0',
  `peer-active` int(13) NOT NULL DEFAULT '0',
  `kicked` enum('Yes','No') NOT NULL DEFAULT 'No',
  `banned` enum('Yes','No') NOT NULL DEFAULT 'No',
  `online` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` varchar(255) NOT NULL DEFAULT '',
  `points-active` bigint(22) NOT NULL DEFAULT '0',
  `points-kicked` bigint(22) NOT NULL DEFAULT '0',
  `points-banned` bigint(22) NOT NULL DEFAULT '0',
  `groups` varchar(300) NOT NULL DEFAULT '',
  `enabled` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `guest` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `admin` enum('Yes','No') NOT NULL DEFAULT 'No',
  `moderator` enum('Yes','No') NOT NULL DEFAULT 'No',
  `speaker` enum('Yes','No') NOT NULL DEFAULT 'No',
  `data` mediumtext,
  PRIMARY KEY (`user-id`,`peering-id`,`peer-id`),
  KEY `SEARCH` (`groups`,`enabled`,`guest`,`moderator`,`speaker`,`data`,`admin`,`online`,`banned`,`kicked`,`local-active`,`current-room`,`uname`,`peer-id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `xalky_whois` (
  `id` varchar(32) NOT NULL,
  `whois` mediumtext NOT NULL,
  `emails` tinytext NOT NULL,
  `created` int(12) NOT NULL DEFAULT '0',
  `instances` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

