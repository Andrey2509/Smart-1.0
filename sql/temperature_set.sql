CREATE TABLE `temperature_set` (
  `room` int(11) NOT NULL,
  `temperature` int(11) DEFAULT NULL,
  `key_label` varchar(50) DEFAULT NULL,
  `graf` varchar(50) DEFAULT NULL,
  `managable` int(11) DEFAULT NULL,
  `key_title` varchar(50) DEFAULT NULL,
  `contid` int(11) DEFAULT NULL,
  PRIMARY KEY (`room`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `temperature_set` (`room`,`temperature`,`key_label`,`graf`,`managable`,`key_title`,`contid`) VALUES (1,0,'termo1','temp_in',1,'1 этаж',6);
INSERT INTO `temperature_set` (`room`,`temperature`,`key_label`,`graf`,`managable`,`key_title`,`contid`) VALUES (2,0,'termo2','temp_in_sf',1,'2 этаж',54);
INSERT INTO `temperature_set` (`room`,`temperature`,`key_label`,`graf`,`managable`,`key_title`,`contid`) VALUES (3,0,'termo3','temp_sport',1,'Спортзал',99);
INSERT INTO `temperature_set` (`room`,`temperature`,`key_label`,`graf`,`managable`,`key_title`,`contid`) VALUES (4,0,'sauna','temp_sauna',1,'Сауна',106);
INSERT INTO `temperature_set` (`room`,`temperature`,`key_label`,`graf`,`managable`,`key_title`,`contid`) VALUES (5,0,'under','temp_under',0,'Подвал',21);
INSERT INTO `temperature_set` (`room`,`temperature`,`key_label`,`graf`,`managable`,`key_title`,`contid`) VALUES (6,0,'str','temp_str',0,'Улица',22);
