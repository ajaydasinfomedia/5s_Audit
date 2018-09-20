

CREATE TABLE `adddepartment` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(255) NOT NULL,
  `depttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO adddepartment VALUES("1","sales","2012-07-31 12:13:17","3","0");
INSERT INTO adddepartment VALUES("2","finance","2012-07-31 12:13:39","3","0");





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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO addtemplate VALUES("1","json template","json tech","1343738685Sunset.jpg","","","o","2012-07-31 11:58:44","3","0");
INSERT INTO addtemplate VALUES("3","jj template","json tech","1343738128Waterlilies.jpg","j","1343738128Bluehills.jpg","c","2012-07-31 12:12:22","3","0");
INSERT INTO addtemplate VALUES("4","asd temp","a","1343738732Bluehills.jpg","","","o","2012-07-31 12:45:32","3","0");





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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_project VALUES("1","1","json template","1","sales","1","5s audit","2012-07-31","json tech ","1343738685Sunset.jpg ","","","o","3","0","","1","good","parag ","1","0","0");
INSERT INTO tbl_project VALUES("2","3","jj template","2","finance","1","5s audit","2012-07-17","json tech  ","1343738128Waterlilies.jpg  ","j","1343738128Bluehills.jpg","c","3","0","","1","very good","jay  ","0","0","0");





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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO tbl_project_review VALUES("1","1","1","1","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("2","1","1","2","2","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("3","1","1","3","3","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("4","1","1","4","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("5","1","1","5","1","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("6","1","1","6","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("7","1","1","7","2","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("8","1","1","8","3","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("9","1","1","9","1","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("10","1","1","10","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("11","1","1","11","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("12","1","1","12","3","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("13","1","1","13","2","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("14","1","1","14","3","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("15","1","1","15","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("16","1","1","16","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("17","1","1","17","3","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("18","1","1","18","2","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("19","1","1","19","1","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("20","1","1","20","0","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("21","1","1","21","2","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("22","1","1","22","3","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("23","1","1","23","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("24","1","1","24","4","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("25","1","1","25","3","In Progress","3","2012-07-31 12:55:06","0");
INSERT INTO tbl_project_review VALUES("26","2","1","1","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("27","2","1","2","3","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("28","2","1","3","0","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("29","2","1","4","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("30","2","1","5","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("31","2","1","6","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("32","2","1","7","2","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("33","2","1","8","3","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("34","2","1","9","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("35","2","1","10","2","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("36","2","1","11","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("37","2","1","12","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("38","2","1","13","3","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("39","2","1","14","2","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("40","2","1","15","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("41","2","1","16","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("42","2","1","17","2","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("43","2","1","18","3","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("44","2","1","19","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("45","2","1","20","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("46","2","1","21","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("47","2","1","22","2","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("48","2","1","23","3","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("49","2","1","24","4","Completed","3","2012-07-31 12:58:34","0");
INSERT INTO tbl_project_review VALUES("50","2","1","25","3","Completed","3","2012-07-31 12:58:34","0");





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

INSERT INTO tbl_questionanswer VALUES("1","1","1","Materials or parts","Does the inventory or in-process inventory include and unneeded materials or parts?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("2","1","2","Machines or equipment","Are there any unused machines or other equipment around?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("3","1","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("4","1","4","Visual control","Is it obvious which items have been marked as unnecessary?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("5","1","5","Written standards","Has establishing the 5S’s left behind any useless standard?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("6","1","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("7","1","7","Item Indicators","Do the shelves have signboards showing which items go where?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("8","1","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("9","1","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("10","1","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("11","1","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("12","1","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("13","1","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("14","1","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("15","1","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("16","1","16","Improvement memos","Are improvement memos regularly being generated?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("17","1","17","Improvement ideas","Are improvement ideas being acted on?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("18","1","18","Key procedures","Are standard procedures clear, documented and actively used?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("19","1","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("20","1","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("21","1","21","Training","Is everyone adequately trained in standard procedure?","3","","0");
INSERT INTO tbl_questionanswer VALUES("22","1","22","Tools and parts","Are tools and parts being stored correctly?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("23","1","23","Stock controls","Are stock controls being adhered to?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("24","1","24","Procedures","Are procedures up-to-date and regularly reviewed?","3","2012-07-31 11:50:46","0");
INSERT INTO tbl_questionanswer VALUES("25","1","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","3","2012-07-31 11:50:46","0");





CREATE TABLE `tbl_questionnair` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tbl_questionnair VALUES("1","5s audit","3","0","2012-07-31 11:50:46");





CREATE TABLE `tbl_settings` (
  `sid` int(12) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `superadminid` int(4) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_settings VALUES("1","default_language","english.ini","0");
INSERT INTO tbl_settings VALUES("2","chart_default","1,2,6","1");



