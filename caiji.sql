CREATE TABLE `test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `addTime` int(10) DEFAULT NULL,
  `orderNum` varchar(100) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `orderPrice` varchar(45) DEFAULT NULL,
  `testcol` decimal(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `userid` int(11) DEFAULT '0',
  `zhifuqr` varchar(45) DEFAULT NULL,
  `storeid` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `orderNum_UNIQUE` (`orderNum`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8mb4;
