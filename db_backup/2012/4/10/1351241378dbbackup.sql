

CREATE TABLE `adddepartment` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(255) NOT NULL,
  `depttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO adddepartment VALUES("1","sales","2012-08-06 09:44:51","4","4");
INSERT INTO adddepartment VALUES("2","finance","2012-08-06 13:26:00","4","4");





CREATE TABLE `addtemplate` (
  `tempid` int(11) NOT NULL AUTO_INCREMENT,
  `tempname` varchar(255) NOT NULL,
  `auditorcname` varchar(255) NOT NULL,
  `auditorclogo` varchar(255) NOT NULL,
  `clientcname` varchar(255) NOT NULL,
  `clientclogo` varchar(255) NOT NULL,
  `temptype` varchar(255) NOT NULL,
  `temptimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`tempid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO addtemplate VALUES("1","das template","das","1344252591Waterlilies.jpg","","","o","2012-08-06 09:44:30","4","4");
INSERT INTO addtemplate VALUES("2","india nic template","infosys","1344259545Waterlilies.jpg","india nic","1344259545Bluehills.jpg","c","2012-08-06 13:25:45","4","4");





CREATE TABLE `tbl_project` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `tempid` int(11) NOT NULL,
  `tempname` varchar(255) NOT NULL,
  `deptid` int(11) NOT NULL,
  `deptname` varchar(255) NOT NULL,
  `qid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `auditorcname` varchar(255) NOT NULL,
  `auditorclogo` varchar(255) NOT NULL,
  `clientcname` varchar(255) NOT NULL,
  `clientclogo` varchar(255) NOT NULL,
  `temptype` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `notes` varchar(255) NOT NULL,
  `auditedby` varchar(255) NOT NULL,
  `status_progress` int(11) NOT NULL DEFAULT '1',
  `sync_status` int(11) NOT NULL,
  `tstamp` int(11) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tbl_project VALUES("1","1","das template","1","sales","1","5s audit","2012-08-06","das  ","1344246270Waterlilies.jpg  ","","","o","4","4","","1","very good","ravi  ","0","0","0");
INSERT INTO tbl_project VALUES("2","1","das template","1","sales","1","5s audit","2012-08-03","das ","1344246270Waterlilies.jpg ","","","o","4","4","","1","good","pk ","1","0","0");
INSERT INTO tbl_project VALUES("3","2","india nic template","2","finance","1","5s audit","2012-08-02","infosys ","1344259545Waterlilies.jpg ","india nic","1344259545Bluehills.jpg","c","4","4","","1","good","parag ","1","0","0");





CREATE TABLE `tbl_project_review` (
  `prjid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `queid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`prjid`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

INSERT INTO tbl_project_review VALUES("1","1","1","1","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("2","1","1","2","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("3","1","1","3","2","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("4","1","1","4","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("5","1","1","5","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("6","1","1","6","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("7","1","1","7","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("8","1","1","8","2","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("9","1","1","9","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("10","1","1","10","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("11","1","1","11","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("12","1","1","12","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("13","1","1","13","2","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("14","1","1","14","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("15","1","1","15","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("16","1","1","16","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("17","1","1","17","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("18","1","1","18","2","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("19","1","1","19","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("20","1","1","20","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("21","1","1","21","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("22","1","1","22","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("23","1","1","23","2","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("24","1","1","24","3","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("25","1","1","25","4","Completed","4","2012-08-06 09:46:23","4");
INSERT INTO tbl_project_review VALUES("26","2","1","1","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("27","2","1","2","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("28","2","1","3","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("29","2","1","4","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("30","2","1","5","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("31","2","1","6","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("32","2","1","7","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("33","2","1","8","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("34","2","1","9","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("35","2","1","10","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("36","2","1","11","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("37","2","1","12","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("38","2","1","13","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("39","2","1","14","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("40","2","1","15","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("41","2","1","16","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("42","2","1","17","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("43","2","1","18","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("44","2","1","19","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("45","2","1","20","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("46","2","1","21","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("47","2","1","22","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("48","2","1","23","3","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("49","2","1","24","4","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("50","2","1","25","2","In Progress","4","2012-08-06 09:59:01","4");
INSERT INTO tbl_project_review VALUES("51","3","1","1","4","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("52","3","1","2","2","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("53","3","1","3","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("54","3","1","4","4","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("55","3","1","5","1","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("56","3","1","6","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("57","3","1","7","2","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("58","3","1","8","1","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("59","3","1","9","2","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("60","3","1","10","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("61","3","1","11","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("62","3","1","12","2","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("63","3","1","13","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("64","3","1","14","4","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("65","3","1","15","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("66","3","1","16","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("67","3","1","17","2","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("68","3","1","18","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("69","3","1","19","1","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("70","3","1","20","2","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("71","3","1","21","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("72","3","1","22","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("73","3","1","23","1","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("74","3","1","24","3","In Progress","4","2012-08-06 13:29:53","4");
INSERT INTO tbl_project_review VALUES("75","3","1","25","3","In Progress","4","2012-08-06 13:29:53","4");





CREATE TABLE `tbl_questionanswer` (
  `qaid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `queid` int(11) NOT NULL,
  `checkitem` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `uid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`qaid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO tbl_questionanswer VALUES("1","1","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("2","1","2","Machines or equipment","Are there any unused machines or other equipment around?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("3","1","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("4","1","4","Visual control","Is it obvious which items have been marked as unnecessary?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("5","1","5","Written standards","Has establishing the 5S’s left behind any useless standard?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("6","1","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("7","1","7","Item Indicators","Do the shelves have signboards showing which items go where?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("8","1","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("9","1","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("10","1","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("11","1","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("12","1","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("13","1","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("14","1","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("15","1","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("16","1","16","Improvement memos","Are improvement memos regularly being generated?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("17","1","17","Improvement ideas","Are improvement ideas being acted on?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("18","1","18","Key procedures","Are standard procedures clear, documented and actively used?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("19","1","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("20","1","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("21","1","21","Training","Is everyone adequately trained in standard procedure?","4","","4");
INSERT INTO tbl_questionanswer VALUES("22","1","22","Tools and parts","Are tools and parts being stored correctly?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("23","1","23","Stock controls","Are stock controls being adhered to?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("24","1","24","Procedures","Are procedures up-to-date and regularly reviewed?","4","2012-08-06 09:16:14","4");
INSERT INTO tbl_questionanswer VALUES("25","1","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","4","2012-08-06 09:16:14","4");





CREATE TABLE `tbl_questionnair` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_questionnair VALUES("1","5s audit","4","4","2012-08-06 09:16:14");





CREATE TABLE `tbl_settings` (
  `sid` int(12) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `superadminid` int(4) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_settings VALUES("1","default_language","english","4");
INSERT INTO tbl_settings VALUES("2","chart_default","0,0,6","4");



