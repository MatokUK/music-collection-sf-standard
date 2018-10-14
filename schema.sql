-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `artist`;
DROP TABLE IF EXISTS `album`;
DROP TABLE IF EXISTS `app_user`;

CREATE TABLE `album` (
  `album_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(128) NOT NULL,
  `genre` varchar(64) DEFAULT NULL,
  `year` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`album_id`),
  KEY `artist_id` (`artist_id`),
  CONSTRAINT `fk_album_artist_id` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `artist` (
  `artist_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `web_page` varchar(512) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`artist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `app_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `app_user` (`id`, `username`, `password`, `is_active`) VALUES
(1,	'admin',	'$2y$09$UC.laZocnkigdYeDYStbXOT0MhLst7p99CuLi32JeBf9tlOQ9vsqe',	1),
(2,	'user',	'$2y$09$dbKDijZ1WtDAd7MBdTsVruzhbQSFld6M03N1C44GJA7dgvg16nkMi',	1),
(3,	'music',	'$2y$09$lTWAtTBI9LGGor23qYXJYOdAzR5cftWiWfhDKa3qw.WCWNqGRpaH.',	1);
