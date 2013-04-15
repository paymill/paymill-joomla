DROP TABLE IF EXISTS `#__paymill`;

CREATE TABLE `#__paymill` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `status` varchar(128) DEFAULT NULL,
  `token` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__paymill_settings`;

CREATE TABLE `#__paymill_settings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mode` int(11) DEFAULT NULL,
  `private_test` varchar(128) DEFAULT NULL,
  `public_test` varchar(128) DEFAULT NULL,
  `private_live` varchar(128) DEFAULT NULL,
  `public_live` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `#__paymill_settings` WRITE;

INSERT INTO `#__paymill_settings` (`id`, `mode`, `private_test`, `public_test`, `private_live`, `public_live`)
VALUES
    (1,NULL,NULL,NULL,NULL,NULL);

UNLOCK TABLES;