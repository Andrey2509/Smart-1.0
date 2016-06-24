CREATE TABLE `tmp_30` (
  `tmpID` int(10) unsigned NOT NULL,
  `ContID` int(10) unsigned NOT NULL,
  `Uv` decimal(30,2) DEFAULT NULL,
  `Ia` decimal(30,2) DEFAULT NULL,
  `Pv` decimal(30,2) DEFAULT NULL,
  `T1` decimal(30,2) DEFAULT NULL,
  `T2` decimal(30,2) DEFAULT NULL,
  `elec_date` datetime DEFAULT NULL,
  PRIMARY KEY (`tmpID`),
  KEY `elec_date` (`elec_date`),
  KEY `ContID` (`ContID`),
  CONSTRAINT `tmp_30_ibfk_1` FOREIGN KEY (`ContID`) REFERENCES `tCont` (`ContID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (8,105,223.80,6.82,1.52,47524.06,21086.78,'2016-01-18 21:17:46');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (9,105,224.60,11.45,2.57,47524.17,21086.78,'2016-01-18 21:21:22');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (10,105,221.40,16.81,3.72,47524.42,21086.78,'2016-01-18 21:26:52');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (11,105,216.90,30.53,6.62,47524.91,21086.78,'2016-01-18 21:32:22');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (12,105,222.40,16.87,3.75,47525.30,21086.78,'2016-01-18 21:37:52');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (13,105,223.30,25.35,5.65,47525.75,21086.78,'2016-01-18 21:43:22');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (14,105,219.40,30.33,6.65,47526.29,21086.78,'2016-01-18 21:48:52');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (15,105,225.10,15.37,3.45,47526.66,21086.78,'2016-01-18 21:54:22');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (16,105,217.30,26.13,5.67,47527.10,21086.78,'2016-01-18 21:59:52');
INSERT INTO `tmp_30` (`tmpID`,`ContID`,`Uv`,`Ia`,`Pv`,`T1`,`T2`,`elec_date`) VALUES (17,105,223.40,11.31,2.53,47527.40,21086.78,'2016-01-18 22:05:22');
