

DROP TABLE IF EXISTS `xalky_bans`;
CREATE TABLE `xalky_bans` (
  `banID` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `userName` varchar(64) NOT NULL DEFAULT '',
  `time` float(26,12) unsigned NOT NULL DEFAULT '0.000000000000',
  `ip` varchar(128) NOT NULL DEFAULT '::1',
  PRIMARY KEY (`banID`),
  KEY `SEARCH` (`userID`,`time`,`ip`(8),`userName`(12),`key`(11))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `xalky_bean_counter`;
CREATE TABLE `xalky_bean_counter` (
  `beanscounterID` mediumint(42) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `parentKey` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `typal` enum('_XALKY_ENUM_COUNT','_XALKY_ENUM_TALLEY') NOT NULL DEFAULT '_XALKY_ENUM_COUNT',
  `method` enum('_XALKY_ENUM_USERS','_XALKY_ENUM_ROLES','_XALKY_ENUM_CHANNELS','_XALKY_ENUM_EMAILS','_XALKY_ENUM_UNKNOWN') NOT NULL DEFAULT '_XALKY_ENUM_UNKNOWN',
  `period` enum('_XALKY_ENUM_FIVEMINS','_XALKY_ENUM_TENMINS','_XALKY_ENUM_TWENTYMINS','_XALKY_ENUM_THIRTYMINS','_XALKY_ENUM_HOURLY','_XALKY_ENUM_DAILY','_XALKY_ENUM_WEEKLY','_XALKY_ENUM_FORTNIGHLY','_XALKY_ENUM_MONTHLY','_XALKY_ENUM_QUARTERLY','_XALKY_ENUM_YEARLY','_XALKY_ENUM_TODAY','_XALKY_ENUM_TOTAL') NOT NULL DEFAULT '_XALKY_ENUM_TODAY',
  `onlineID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `banID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `emailID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `start` int(12) unsigned NOT NULL DEFAULT '0',
  `ended` int(12) unsigned NOT NULL DEFAULT '0',
  `sized` int(12) unsigned NOT NULL DEFAULT '0',
  `bytes` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `email` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `channel` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `user` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `second` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `message` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `baning` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `moderator` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `administrator` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `invite` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `response` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `idling` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `active` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `paused` float(9,5) unsigned NOT NULL DEFAULT '0.00000',
  `when` float(26,12) unsigned NOT NULL DEFAULT '0.000000000000',
  PRIMARY KEY (`beanscounterID`),
  KEY `SEARCH` (`userID`,`roleID`,`channelID`,`typal`,`method`,`period`,`start`,`sized`,`key`(11),`parentKey`(10)),
  KEY `CHRONOLOGICS` (`when`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_channels_notify`;
CREATE TABLE `xalky_channels_notify` (
  `channelnotifierID` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `type` enum('_XALKY_ENUM_LOGONS','_XALKY_ENUM_LOGOFF','_XALKY_ENUM_SCHEDULE','_XALKY_ENUM_MADEBAN','_XALKY_ENUM_BANNED','_XALKY_ENUM_BANSTOP','_XALKY_ENUM_JOINS','_XALKY_ENUM_REQUESTS') NOT NULL DEFAULT '_XALKY_ENUM_JOINS',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `fromUserID` int(13) unsigned NOT NULL DEFAULT '0',
  `toUserID` int(13) unsigned NOT NULL DEFAULT '0',
  `emailID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastsent` int(13) unsigned NOT NULL DEFAULT '0',
  `nomore` int(13) unsigned NOT NULL DEFAULT '0',
  `created` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`channelnotifierID`),
  KEY `CHRONOLOGICS` (`created`,`nomore`,`lastsent`,`type`),
  KEY `SEARCH` (`channelID`,`userID`,`roleID`,`toUserID`,`fromUserID`,`emailID`,`key`(11))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_channels_roles`;
CREATE TABLE `xalky_channels_roles` (
  `channelroleID` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `bytes` int(11) unsigned NOT NULL DEFAULT '0',
  `emails` int(11) unsigned NOT NULL DEFAULT '0',
  `roles` int(11) unsigned NOT NULL DEFAULT '0',
  `users` int(11) unsigned NOT NULL DEFAULT '0',
  `session` int(11) unsigned NOT NULL DEFAULT '0',
  `online` int(11) unsigned NOT NULL DEFAULT '0',
  `active` int(11) unsigned NOT NULL DEFAULT '0',
  `idling` int(11) unsigned NOT NULL DEFAULT '0',
  `message` int(11) unsigned NOT NULL DEFAULT '0',
  `banning` int(11) unsigned NOT NULL DEFAULT '0',
  `invites` int(11) unsigned NOT NULL DEFAULT '0',
  `respond` int(11) unsigned NOT NULL DEFAULT '0',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  `denied` int(13) unsigned NOT NULL DEFAULT '0',
  `access` int(13) unsigned NOT NULL DEFAULT '0',
  `login` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`channelroleID`),
  KEY `SEARCH` (`channelID`,`roleID`,`denied`,`access`,`key`(11)),
  KEY `CHRONOLOGICS` (`created`,`denied`,`access`,`login`),
  KEY `STATISTICS` (`users`,`session`,`online`,`active`,`idling`,`message`,`banning`,`invites`,`respond`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_channels_scheduler`;
CREATE TABLE `xalky_channels_scheduler` (
  `channelscheduleID` mediumint(42) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `typal` enum('_XALKY_ENUM_DEFAULT','_XALKY_ENUM_GRANTED','_XALKY_ENUM_DENIED','_XALKY_ENUM_HOLIDAY') NOT NULL DEFAULT '_XALKY_ENUM_DEFAULT',
  `period` enum('_XALKY_ENUM_HOURLY','_XALKY_ENUM_DAILY','_XALKY_ENUM_WEEKLY','_XALKY_ENUM_FORTNIGHLY','_XALKY_ENUM_MONTHLY') NOT NULL DEFAULT '_XALKY_ENUM_HOURLY',
  `requires` enum('_XALKY_ENUM_NOTHING','_XALKY_ENUM_GUEST','_XALKY_ENUM_MEMBER','_XALKY_ENUM_NOIDLE','_XALKY_ENUM_NOBANS','_XALKY_ENUM_FEMALE','_XALKY_ENUM_MALE','_XALKY_ENUM_TEEN','_XALKY_ENUM_ADULT','_XALKY_ENUM_CLIENT','_XALKY_ENUM_OVER50','_XALKY_ENUM_IPRADIUS','_XALKY_ENUM_IPCOUNTRY','_XALKY_ENUM_IPSTATE','_XALKY_ENUM_CHNMODS') NOT NULL DEFAULT '_XALKY_ENUM_NOTHING',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `longitude` float(12,8) unsigned NOT NULL DEFAULT '0.00000000',
  `latitude` float(12,8) unsigned NOT NULL DEFAULT '0.00000000',
  `radius` float(12,4) unsigned NOT NULL DEFAULT '0.0000',
  `country` varchar(32) NOT NULL DEFAULT '--------------------------------',
  `place` varchar(32) NOT NULL DEFAULT '--------------------------------',
  `state` varchar(32) NOT NULL DEFAULT '--------------------------------',
  `start` int(12) unsigned NOT NULL DEFAULT '0',
  `ended` int(12) unsigned NOT NULL DEFAULT '0',
  `sized` int(12) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`channelscheduleID`),
  KEY `SEARCH` (`channelID`,`roleID`,`typal`,`requires`,`period`,`start`,`sized`,`key`(11)),
  KEY `PERMITS` (`channelID`,`roleID`,`requires`,`longitude`,`latitude`,`radius`,`country`(6),`place`(6),`state`(6))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_channels_statistics`;
CREATE TABLE `xalky_channels_statistics` (
  `channelstatisticsID` mediumint(42) unsigned NOT NULL AUTO_INCREMENT,
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `group` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `typal` enum('_XALKY_ENUM_METRIC','_XALKY_ENUM_HISTORICAL','_XALKY_ENUM_THEBESTWAS') NOT NULL DEFAULT '_XALKY_ENUM_METRIC',
  `method` enum('_XALKY_ENUM_TOTAL','_XALKY_ENUM_AVERAGE','_XALKY_ENUM_STDDEV','_XALKY_ENUM_MAXIMUM','_XALKY_ENUM_MINIMUM') NOT NULL DEFAULT '_XALKY_ENUM_TOTAL',
  `period` enum('_XALKY_ENUM_FIVEMINS','_XALKY_ENUM_TENMINS','_XALKY_ENUM_TWENTYMINS','_XALKY_ENUM_THIRTYMINS','_XALKY_ENUM_HOURLY','_XALKY_ENUM_DAILY','_XALKY_ENUM_WEEKLY','_XALKY_ENUM_FORTNIGHLY','_XALKY_ENUM_MONTHLY','_XALKY_ENUM_QUARTERLY','_XALKY_ENUM_YEARLY','_XALKY_ENUM_TODAY','_XALKY_ENUM_TOTAL') NOT NULL DEFAULT '_XALKY_ENUM_TODAY',
  `start` int(12) unsigned NOT NULL DEFAULT '0',
  `ended` int(12) unsigned NOT NULL DEFAULT '0',
  `sized` int(12) unsigned NOT NULL DEFAULT '0',
  `bytes` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `emails` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `roles` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `users` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `seconds` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `messages` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `banned` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `moderators` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `administrator` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `invites` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `responses` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `idling` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `active` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `paused` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`channelstatisticsID`),
  KEY `SEARCH` (`channelID`,`typal`,`method`,`period`,`start`,`sized`,`key`(11),`group`(10)),
  KEY `CHRONOLOGICS` (`created`,`start`,`ended`,`sized`,`period`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_channels_users`;
CREATE TABLE `xalky_channels_users` (
  `channeluserID` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `condition` enum('_XALKY_ENUM_GUEST','_XALKY_ENUM_MEMBER','_XALKY_ENUM_MODERATOR','_XALKY_ENUM_ADMINISTRATOR') NOT NULL DEFAULT '_XALKY_ENUM_MEMBER',
  `bytes` int(11) unsigned NOT NULL DEFAULT '0',
  `session` int(11) unsigned NOT NULL DEFAULT '0',
  `online` int(11) unsigned NOT NULL DEFAULT '0',
  `active` int(11) unsigned NOT NULL DEFAULT '0',
  `idling` int(11) unsigned NOT NULL DEFAULT '0',
  `message` int(11) unsigned NOT NULL DEFAULT '0',
  `banning` int(11) unsigned NOT NULL DEFAULT '0',
  `invites` int(11) unsigned NOT NULL DEFAULT '0',
  `response` int(11) unsigned NOT NULL DEFAULT '0',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  `denied` int(13) unsigned NOT NULL DEFAULT '0',
  `access` int(13) unsigned NOT NULL DEFAULT '0',
  `login` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`channeluserID`),
  KEY `CHRONOLOGICS` (`created`,`denied`,`access`,`login`),
  KEY `STATISTICS` (`session`,`online`,`active`,`idling`,`message`,`banning`,`invites`,`response`),
  KEY `SEARCH` (`channelID`,`userID`,`condition`,`denied`,`access`,`key`(11))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_invitations`;
CREATE TABLE `xalky_invitations` (
  `invitesID` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `time` float(26,12) unsigned NOT NULL DEFAULT '0.000000000000',
  PRIMARY KEY (`invitesID`),
  KEY `SEARCH` (`userID`,`channelID`,`time`,`key`(11))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_messages`;
CREATE TABLE `xalky_messages` (
  `messageID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `onlineID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `userName` varchar(64) NOT NULL,
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `time` float(26,12) unsigned NOT NULL DEFAULT '0.000000000000',
  `ip` varchar(128) NOT NULL DEFAULT '::1',
  `text` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`messageID`),
  KEY `SEARCH` (`userID`,`channelID`,`roleID`,`ip`(8),`text`(14),`key`(11))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `xalky_notifier_queue`;
CREATE TABLE `xalky_notifier_queue` (
  `queueID` mediumint(32) unsigned NOT NULL AUTO_INCREMENT,
  `emailID` mediumint(25) unsigned NOT NULL DEFAULT '0',
  `fromUserID` int(13) unsigned NOT NULL DEFAULT '0',
  `toUserID` int(13) unsigned NOT NULL DEFAULT '0',
  `queued` int(12) unsigned NOT NULL DEFAULT '0',
  `sent` int(12) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`queueID`),
  KEY `SEARCH` (`queued`,`sent`,`emailID`,`fromUserID`,`toUserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_online`;
CREATE TABLE `xalk_online` (
  `onlineID` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `time` float(26,12) unsigned NOT NULL DEFAULT '0.000000000000',
  `ip` varchar(128) NOT NULL DEFAULT '::1',
  PRIMARY KEY (`onlineID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_roles_groups`;
CREATE TABLE `xalky_roles_groups` (
  `rolegroupID` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `groupid` int(8) NOT NULL DEFAULT '0',
  `bytes` int(11) unsigned NOT NULL DEFAULT '0',
  `channel` int(11) unsigned NOT NULL DEFAULT '0',
  `users` int(11) unsigned NOT NULL DEFAULT '0',
  `session` int(11) unsigned NOT NULL DEFAULT '0',
  `online` int(11) unsigned NOT NULL DEFAULT '0',
  `active` int(11) unsigned NOT NULL DEFAULT '0',
  `idling` int(11) unsigned NOT NULL DEFAULT '0',
  `message` int(11) unsigned NOT NULL DEFAULT '0',
  `banning` int(11) unsigned NOT NULL DEFAULT '0',
  `invites` int(11) unsigned NOT NULL DEFAULT '0',
  `response` int(11) unsigned NOT NULL DEFAULT '0',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  `denied` int(13) unsigned NOT NULL DEFAULT '0',
  `access` int(13) unsigned NOT NULL DEFAULT '0',
  `login` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rolegroupID`),
  KEY `SEARCH` (`roleID`,`groupid`,`key`(11)),
  KEY `CHRONOLOGICS` (`created`,`denied`,`access`,`login`),
  KEY `STATISTICS` (`channel`,`users`,`session`,`online`,`active`,`idling`,`message`,`banning`,`invites`,`response`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_roles_statistics`;
CREATE TABLE `xalky_roles_statistics` (
  `rolestatisticID` mediumint(42) unsigned NOT NULL AUTO_INCREMENT,
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `group` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `typal` enum('_XALKY_ENUM_METRIC','_XALKY_ENUM_HISTORICAL','_XALKY_ENUM_THEBESTWAS') NOT NULL DEFAULT '_XALKY_ENUM_METRIC',
  `method` enum('_XALKY_ENUM_TOTAL','_XALKY_ENUM_AVERAGE','_XALKY_ENUM_STDDEV','_XALKY_ENUM_MAXIMUM','_XALKY_ENUM_MINIMUM') NOT NULL DEFAULT '_XALKY_ENUM_TOTAL',
  `period` enum('_XALKY_ENUM_FIVEMINS','_XALKY_ENUM_TENMINS','_XALKY_ENUM_TWENTYMINS','_XALKY_ENUM_THIRTYMINS','_XALKY_ENUM_HOURLY','_XALKY_ENUM_DAILY','_XALKY_ENUM_WEEKLY','_XALKY_ENUM_FORTNIGHLY','_XALKY_ENUM_MONTHLY','_XALKY_ENUM_QUARTERLY','_XALKY_ENUM_YEARLY','_XALKY_ENUM_TODAY','_XALKY_ENUM_TOTAL') NOT NULL DEFAULT '_XALKY_ENUM_TODAY',
  `start` int(12) unsigned NOT NULL DEFAULT '0',
  `ended` int(12) unsigned NOT NULL DEFAULT '0',
  `sized` int(12) NOT NULL DEFAULT '0',
  `bytes` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `emails` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `channels` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `users` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `seconds` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `messages` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `banned` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `moderators` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `administrator` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `invites` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `responses` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `idling` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `active` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `paused` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rolestatisticID`),
  KEY `SEARCH` (`roleID`,`typal`,`method`,`period`,`start`,`sized`,`key`(11),`group`(10)),
  KEY `CHRONOLOGICS` (`created`,`start`,`ended`,`sized`,`period`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `xalky_users_roles`;
CREATE TABLE `xalky_users_roles` (
  `userroleid` mediumint(18) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `channels` int(11) unsigned NOT NULL DEFAULT '0',
  `bytes` int(11) unsigned NOT NULL DEFAULT '0',
  `roles` int(11) unsigned NOT NULL DEFAULT '0',
  `users` int(11) unsigned NOT NULL DEFAULT '0',
  `session` int(11) unsigned NOT NULL DEFAULT '0',
  `online` int(11) unsigned NOT NULL DEFAULT '0',
  `active` int(11) unsigned NOT NULL DEFAULT '0',
  `idling` int(11) unsigned NOT NULL DEFAULT '0',
  `message` int(11) unsigned NOT NULL DEFAULT '0',
  `banning` int(11) unsigned NOT NULL DEFAULT '0',
  `invites` int(11) unsigned NOT NULL DEFAULT '0',
  `respond` int(11) unsigned NOT NULL DEFAULT '0',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  `denied` int(13) unsigned NOT NULL DEFAULT '0',
  `access` int(13) unsigned NOT NULL DEFAULT '0',
  `login` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userroleid`),
  KEY `SEARCH` (`roleID`,`userID`,`key`(11)),
  KEY `CHRONOLOGICS` (`created`,`denied`,`access`,`login`),
  KEY `STATISTICS` (`users`,`session`,`online`,`active`,`idling`,`message`,`banning`,`invites`,`respond`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_users_statistics`;
CREATE TABLE `xalky_users_statistics` (
  `userstatisticID` mediumint(42) unsigned NOT NULL,
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `group` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `typal` enum('_XALKY_ENUM_METRIC','_XALKY_ENUM_HISTORICAL','_XALKY_ENUM_THEBESTWAS') NOT NULL DEFAULT '_XALKY_ENUM_METRIC',
  `method` enum('_XALKY_ENUM_TOTAL','_XALKY_ENUM_AVERAGE','_XALKY_ENUM_STDDEV','_XALKY_ENUM_MAXIMUM','_XALKY_ENUM_MINIMUM') NOT NULL DEFAULT '_XALKY_ENUM_TOTAL',
  `period` enum('_XALKY_ENUM_FIVEMINS','_XALKY_ENUM_TENMINS','_XALKY_ENUM_TWENTYMINS','_XALKY_ENUM_THIRTYMINS','_XALKY_ENUM_HOURLY','_XALKY_ENUM_DAILY','_XALKY_ENUM_WEEKLY','_XALKY_ENUM_FORTNIGHLY','_XALKY_ENUM_MONTHLY','_XALKY_ENUM_QUARTERLY','_XALKY_ENUM_YEARLY','_XALKY_ENUM_TODAY','_XALKY_ENUM_TOTAL') NOT NULL DEFAULT '_XALKY_ENUM_TODAY',
  `start` int(12) unsigned NOT NULL DEFAULT '0',
  `ended` int(12) unsigned NOT NULL DEFAULT '0',
  `sized` int(12) NOT NULL DEFAULT '0',
  `bytes` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `emails` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `channels` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `users` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `seconds` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `messages` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `banned` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `moderators` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `administrator` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `invites` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `responses` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `idling` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `active` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `paused` float(12,6) unsigned NOT NULL DEFAULT '0.000000',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userstatisticID`),
  KEY `SEARCH` (`userID`,`typal`,`method`,`period`,`start`,`sized`,`key`(11),`group`(10)),
  KEY `CHRONOLOGICS` (`created`,`start`,`ended`,`sized`,`period`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_notifier_emails`;
CREATE TABLE `xalky_notifier_emails` (
  `emailID` mediumint(25) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `type` enum('_XALKY_ENUM_INVITE','_XALKY_ENUM_NOTICE','_XALKY_ENUM_BANNING','_XALKY_ENUM_STATISTIC','_XALKY_ENUM_SYSTEM','_XALKY_ENUM_UNKNOWN') NOT NULL DEFAULT '_XALKY_ENUM_UNKNOWN',
  `finger` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `channelID` int(8) unsigned NOT NULL DEFAULT '0',
  `roleID` int(4) unsigned NOT NULL DEFAULT '0',
  `userID` int(13) unsigned NOT NULL DEFAULT '0',
  `template` varchar(128) NOT NULL DEFAULT '',
  `language` varchar(128) NOT NULL DEFAULT 'english',
  `subject` varchar(128) NOT NULL DEFAULT '',
  `message` tinytext,
  `sent` int(8) unsigned NOT NULL DEFAULT '0',
  `last` int(12) unsigned NOT NULL DEFAULT '0',
  `created` int(12) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`emailID`),
  KEY `SEARCH` (`sent`,`last`,`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `xalky_channels`;
CREATE TABLE `xalky_channels` (
  `channelID` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `parentKey` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `default` enum('_XALKY_ENUM_YES','_XALKY_ENUM_NO') NOT NULL DEFAULT '_XALKY_ENUM_NO',
  `condition` enum('_XALKY_ENUM_GUESTANY','_XALKY_ENUM_OPENANY','_XALKY_ENUM_CLOSEDANY','_XALKY_ENUM_SYSOPSANY','_XALKY_ENUM_GUESTTIMED','_XALKY_ENUM_OPENTIMED','_XALKY_ENUM_CLOSEDTIMED','_XALKY_ENUM_SYSOPSTIMED') NOT NULL DEFAULT '_XALKY_ENUM_OPENANY',
  `required` enum('_XALKY_ENUM_NOTHING','_XALKY_ENUM_GUEST','_XALKY_ENUM_MEMBER','_XALKY_ENUM_NOIDLE','_XALKY_ENUM_NOBANS','_XALKY_ENUM_FEMALE','_XALKY_ENUM_MALE','_XALKY_ENUM_TEEN','_XALKY_ENUM_ADULT','_XALKY_ENUM_CLIENT','_XALKY_ENUM_OVER50','_XALKY_ENUM_IPRADIUS','_XALKY_ENUM_IPCOUNTRY','_XALKY_ENUM_IPSTATE','_XALKY_ENUM_CHNMODS') NOT NULL DEFAULT '_XALKY_ENUM_NOTHING',
  `language` varchar(64) NOT NULL DEFAULT 'english',
  `datezone` varchar(64) NOT NULL DEFAULT 'Australia/Sydney',
  `longitude` float(12,8) unsigned NOT NULL DEFAULT '0.00000000',
  `latitude` float(12,8) unsigned NOT NULL DEFAULT '0.00000000',
  `radius` float(12,4) unsigned NOT NULL DEFAULT '0.0000',
  `country` varchar(32) NOT NULL DEFAULT '--------------------------------',
  `place` varchar(32) NOT NULL DEFAULT '--------------------------------',
  `state` varchar(32) NOT NULL DEFAULT '--------------------------------',
  `icon` varchar(128) NOT NULL DEFAULT 'default-icon.png',
  `background` varchar(128) NOT NULL DEFAULT 'default-background.png',
  `channel` varchar(24) NOT NULL DEFAULT '',
  `title` varchar(128) NOT NULL DEFAULT '',
  `description` tinytext,
  `ownerUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `moderatorUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastAdminUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastModeratorUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastAccessedUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastRespondedUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastIdlingUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastBannedUserID` mediumint(18) unsigned NOT NULL DEFAULT '0',
  `lastSessioning` int(13) unsigned NOT NULL DEFAULT '0',
  `allowedIdling` int(14) unsigned NOT NULL DEFAULT '0',
  `allowedUsers` int(14) unsigned NOT NULL DEFAULT '0',
  `allowedModerators` int(14) unsigned NOT NULL DEFAULT '0',
  `allowedInvites` int(14) unsigned NOT NULL DEFAULT '0',
  `allowedResponses` int(14) unsigned NOT NULL DEFAULT '0',
  `bytes` int(11) unsigned NOT NULL DEFAULT '0',
  `emails` int(14) unsigned NOT NULL DEFAULT '0',
  `roles` int(11) unsigned NOT NULL DEFAULT '0',
  `users` int(11) unsigned NOT NULL DEFAULT '0',
  `session` int(21) unsigned NOT NULL DEFAULT '0',
  `online` int(21) unsigned NOT NULL DEFAULT '0',
  `active` int(21) unsigned NOT NULL DEFAULT '0',
  `idling` int(21) unsigned NOT NULL DEFAULT '0',
  `message` int(21) unsigned NOT NULL DEFAULT '0',
  `banning` int(21) unsigned NOT NULL DEFAULT '0',
  `invites` int(21) unsigned NOT NULL DEFAULT '0',
  `respond` int(21) unsigned NOT NULL DEFAULT '0',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  `denied` int(13) unsigned NOT NULL DEFAULT '0',
  `access` int(13) unsigned NOT NULL DEFAULT '0',
  `login` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`channelID`),
  KEY `SEARCH` (`condition`,`required`,`ownerUserID`,`moderatorUserID`,`channel`(12),`key`(12),`parentKey`(12)),
  KEY `PERMITS` (`condition`,`required`,`allowedIdling`,`allowedUsers`,`allowedModerators`,`allowedInvites`,`allowedResponses`),
  KEY `CHRONOLOGICS` (`created`,`denied`,`access`,`login`),
  KEY `STATISTICS` (`users`,`roles`,`session`,`online`,`active`,`idling`,`message`,`banning`,`invites`,`respond`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `xalky_roles`;
CREATE TABLE `xalky_roles` (
  `roleID` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `roleName` varchar(64) NOT NULL,
  `roleDescription` varchar(250) NOT NULL,
  `condition` enum('_XALKY_ENUM_INVITATION','_XALKY_ENUM_GUEST','_XALKY_ENUM_MEMBER','_XALKY_ENUM_MODERATOR','_XALKY_ENUM_ADMINISTRATOR') NOT NULL DEFAULT '_XALKY_ENUM_GUEST',
  `bytes` int(11) unsigned NOT NULL DEFAULT '0',
  `channels` int(11) unsigned NOT NULL DEFAULT '0',
  `users` int(11) unsigned NOT NULL DEFAULT '0',
  `session` int(11) unsigned NOT NULL DEFAULT '0',
  `online` int(11) unsigned NOT NULL DEFAULT '0',
  `active` int(11) unsigned NOT NULL DEFAULT '0',
  `idling` int(11) unsigned NOT NULL DEFAULT '0',
  `message` int(11) unsigned NOT NULL DEFAULT '0',
  `banning` int(11) unsigned NOT NULL DEFAULT '0',
  `invites` int(11) unsigned NOT NULL DEFAULT '0',
  `response` int(11) unsigned NOT NULL DEFAULT '0',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  `denied` int(13) unsigned NOT NULL DEFAULT '0',
  `access` int(13) unsigned NOT NULL DEFAULT '0',
  `login` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`roleID`),
  KEY `SEARCH` (`roleID`,`condition`,`roleName`(12),`key`(11)),
  KEY `CHRONOLOGICS` (`created`,`denied`,`access`,`login`),
  KEY `STATISTICS` (`channels`,`users`,`session`,`online`,`active`,`idling`,`message`,`banning`,`invites`,`response`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `xalky_users`;
CREATE TABLE `xalky_users` (
  `userID` int(13) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(44) NOT NULL DEFAULT '--------------------------------------------',
  `state` enum('_XALKY_ENUM_INVITEE','_XALKY_ENUM_ACTIVATION','_XALKY_ENUM_GUEST','_XALKY_ENUM_ACTIVE','_XALKY_ENUM_REMINDED','_XALKY_ENUM_BANNED','_XALKY_ENUM_SUPERSYSOP','_XALKY_ENUM_SUPERMOD') NOT NULL DEFAULT '_XALKY_ENUM_GUEST',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `userPass` varchar(44) DEFAULT '--------------------------------------------',
  `userName` varchar(64) NOT NULL,
  `userEmail` varchar(198) NOT NULL,
  `signature` tinytext,
  `bytes` int(11) unsigned NOT NULL DEFAULT '0',
  `channel` int(11) unsigned NOT NULL DEFAULT '0',
  `roles` int(11) unsigned NOT NULL DEFAULT '0',
  `users` int(11) unsigned NOT NULL DEFAULT '0',
  `session` int(11) unsigned NOT NULL DEFAULT '0',
  `online` int(11) unsigned NOT NULL DEFAULT '0',
  `active` int(11) unsigned NOT NULL DEFAULT '0',
  `idling` int(11) unsigned NOT NULL DEFAULT '0',
  `message` int(11) unsigned NOT NULL DEFAULT '0',
  `banning` int(11) unsigned NOT NULL DEFAULT '0',
  `invites` int(11) unsigned NOT NULL DEFAULT '0',
  `respond` int(11) unsigned NOT NULL DEFAULT '0',
  `created` int(13) unsigned NOT NULL DEFAULT '0',
  `denied` int(13) unsigned NOT NULL DEFAULT '0',
  `access` int(13) unsigned NOT NULL DEFAULT '0',
  `login` int(13) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userID`),
  KEY `SEARCH` (`userID`,`state`,`uid`,`userPass`(12),`userName`(12),`userEmail`(10),`key`(11)),
  KEY `CHRONOLOGICS` (`created`,`denied`,`access`,`login`),
  KEY `STATISTICS` (`users`,`session`,`online`,`active`,`idling`,`message`,`banning`,`invites`,`respond`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




