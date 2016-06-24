CREATE TABLE `tmp_26` (
  `tmpID` int(10) unsigned NOT NULL,
  `ContID` int(10) unsigned NOT NULL,
  `camera_date` datetime DEFAULT NULL,
  `camera_id` decimal(30,0) DEFAULT NULL,
  `pir_id` decimal(30,0) DEFAULT NULL,
  `img` text,
  `mailsent` int(11) DEFAULT NULL,
  `babyimg` text,
  PRIMARY KEY (`tmpID`),
  KEY `camera_date` (`camera_date`),
  KEY `ContID` (`ContID`),
  CONSTRAINT `tmp_26_ibfk_1` FOREIGN KEY (`ContID`) REFERENCES `tCont` (`ContID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


