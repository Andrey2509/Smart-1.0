CREATE TABLE `camera_set` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `imgpath_big` varchar(250) DEFAULT NULL,
  `imgpath_baby` varchar(250) DEFAULT NULL,
  `localpath` varchar(250) DEFAULT NULL,
  `inetpath` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `camera_set` (`id`,`name`,`model`,`imgpath_big`,`imgpath_baby`,`localpath`,`inetpath`) VALUES (1,'Терраса','Tvision','snap/Camera1_hi.jpg','snap/Camera1_low.jpg','rtmp://192.168.2.200:1935/camera1/stream?e=','rtmp://www.my.ru:8095/camera1/stream?e=');
INSERT INTO `camera_set` (`id`,`name`,`model`,`imgpath_big`,`imgpath_baby`,`localpath`,`inetpath`) VALUES (2,'Запад','Hikvision','snap/Camera2_hi.jpg','snap/Camera2_low.jpg','rtmp://192.168.2.200:1935/camera2/stream?e=','rtmp://www.my.ru:8095/camera2/stream?e=');
INSERT INTO `camera_set` (`id`,`name`,`model`,`imgpath_big`,`imgpath_baby`,`localpath`,`inetpath`) VALUES (3,'Восток','Kicong','snap/Camera3_hi.jpg','snap/Camera3_low.jpg','rtmp://192.168.2.200:1935/camera3/stream?e=','rtmp://www.my.ru:8095/camera3/stream?e=');
