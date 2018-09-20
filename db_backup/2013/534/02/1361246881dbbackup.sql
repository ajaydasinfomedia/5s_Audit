

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO tbl_category VALUES("1","Work Instruction","2013-02-18 04:27:17");
INSERT INTO tbl_category VALUES("2","User Manual","2013-02-18 04:27:17");
INSERT INTO tbl_category VALUES("3","Training Manual","2013-02-18 04:27:17");
INSERT INTO tbl_category VALUES("4","Custom","2013-02-18 04:27:17");





CREATE TABLE `tbl_line` (
  `line_id` int(11) NOT NULL AUTO_INCREMENT,
  `line_name` varchar(20) NOT NULL,
  `line_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`line_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_log` (
  `wi_id` int(11) NOT NULL,
  `desc` text NOT NULL,
  `uid` int(11) NOT NULL,
  `l_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_steps` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_user_id` int(11) NOT NULL,
  `s_title` varchar(255) NOT NULL,
  `s_time` time NOT NULL,
  `s_image` varchar(255) NOT NULL,
  `s_description` text NOT NULL,
  `s_tags` text NOT NULL,
  `s_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `s_status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO tbl_steps VALUES("1","534","","00:00:00","","","","2013-02-18 04:38:02","0");





CREATE TABLE `tbl_videos` (
  `vid` int(11) NOT NULL AUTO_INCREMENT,
  `wi_id` int(11) NOT NULL,
  `link` text NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`vid`),
  KEY `wi_id` (`wi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_wi_details` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_user_id` int(11) NOT NULL,
  `wi_id` int(11) NOT NULL,
  `d_type` enum('b','t') NOT NULL,
  `d_title` varchar(255) NOT NULL,
  `d_location` varchar(255) NOT NULL,
  `d_quantity` int(11) NOT NULL,
  `d_note` varchar(255) NOT NULL,
  `d_description` text NOT NULL,
  `d_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`d_id`),
  KEY `wi_id` (`wi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;






CREATE TABLE `tbl_work_instruction` (
  `wi_id` int(11) NOT NULL AUTO_INCREMENT,
  `wi_user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `wi_title` varchar(255) NOT NULL,
  `wi_line_cell_station` varchar(255) NOT NULL,
  `wi_approved_by` varchar(255) NOT NULL,
  `wi_version` varchar(255) NOT NULL,
  `wi_steps` varchar(255) NOT NULL,
  `wi_description` text NOT NULL,
  `wi_tags` text NOT NULL,
  `wi_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `wi_status` enum('0','1','2') NOT NULL DEFAULT '0',
  PRIMARY KEY (`wi_id`),
  KEY `category` (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;




