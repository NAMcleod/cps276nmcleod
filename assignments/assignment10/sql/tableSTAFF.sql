CREATE TABLE `tableSTAFF` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '',
  `phone` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(250) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL DEFAULT '',
  `city` varchar(250) NOT NULL DEFAULT '',
  `state` varchar(250) NOT NULL DEFAULT '',
  `dob` varchar(250) NOT NULL DEFAULT '',
  `contactUserBy` varchar(250) DEFAULT NULL ,
  `ageRange` varchar(250) DEFAULT NULL ,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;