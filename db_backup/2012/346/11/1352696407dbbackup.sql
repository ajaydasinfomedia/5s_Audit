

CREATE TABLE `adddepartment` (
  `deptid` int(11) NOT NULL AUTO_INCREMENT,
  `deptname` varchar(255) NOT NULL,
  `depttimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`deptid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO adddepartment VALUES("1","JR","2012-10-20 11:03:40","346","346");
INSERT INTO adddepartment VALUES("3","Finance","2012-10-20 11:03:50","346","346");
INSERT INTO adddepartment VALUES("5","iPhone edit","2012-10-20 11:04:12","346","346");





CREATE TABLE `addtemplate` (
  `tempid` int(11) NOT NULL AUTO_INCREMENT,
  `tempname` varchar(255) NOT NULL,
  `auditorcname` varchar(255) NOT NULL,
  `auditorclogo` varchar(255) NOT NULL,
  `clientcname` varchar(255) NOT NULL,
  `clientclogo` varchar(255) NOT NULL,
  `temptype` varchar(255) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '1970-01-05 00:00:00',
  `temptimestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  PRIMARY KEY (`tempid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO addtemplate VALUES("1","das infomedia template","das infomedia edit","1351322872error.png","","","o","2012-10-27 07:27:52","2012-10-20 11:01:23","346","346");
INSERT INTO addtemplate VALUES("2","my auditor template","my auditor","1351158079photo(1).PNG","","","o","2012-10-25 10:09:11","2012-10-20 11:02:59","346","346");
INSERT INTO addtemplate VALUES("3","myclienttemplate","myauditor","1350972993loginLogo.png","myclient","1350972993logo_final-1.png","c","2012-10-23 06:16:33","2012-10-20 11:03:32","346","346");
INSERT INTO addtemplate VALUES("4","mytest","myaudit","1351323202loginLogo.png","mytest","1351159313addFiles.png","c","2012-10-27 07:34:43","2012-10-25 10:01:53","346","346");





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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

INSERT INTO tbl_project VALUES("1","1","das infomedia template","5","iPhone edit","1","5s audit - english","2012-10-20","das infomedia ","1350730883Tulips.jpg ","","","o","347","346","\'","1","Hgfdryujggg","uurygdsas ","0","1","1350731836");
INSERT INTO tbl_project VALUES("2","1","das infomedia template","3","Finance","1","5s audit - english","2012-09-20","das infomedia  ","1350730883Tulips.jpg  ","","","o","347","346","\'","1","ftgyuhtrfhjhg","dasd  ","1","0","1348144057");
INSERT INTO tbl_project VALUES("3","1","das infomedia template","5","iPhone edit","1","5s audit - english","2012-08-20","das infomedia  ","1350730883Tulips.jpg  ","","","o","347","346","\'","1","Sdasd asd asd a","dasddsa  ","0","0","1345465677");
INSERT INTO tbl_project VALUES("4","1","das infomedia template","3","Finance","13","5s audit - dutch","2012-10-22","das infomedia edit","1350730883Tulips.jpg","","","o","347","346","\'","1","Fdsfsdf","dfsdasd","0","1","1350878259");
INSERT INTO tbl_project VALUES("5","1","das infomedia template","3","Finance","13","5s audit - dutch","2012-10-22","das infomedia edit","1350730883Tulips.jpg","","","o","347","346","\'","1","Asdasdasdasd","asdd","1","0","1350879647");
INSERT INTO tbl_project VALUES("6","1","das infomedia template","3","Finance","13","5s audit - dutch","2012-10-23","das infomedia edit","1350730883Tulips.jpg","","","o","347","346","\'","1","Ytuiuukk","dqweq","0","1","1350930600");
INSERT INTO tbl_project VALUES("7","2","my auditor template","5","iPhone edit","13","5s audit - dutch","2012-10-23","my auditor  ","  ","","","o","347","346","\'","1","Hgfdddf","gfjyyu  ","0","1","1350930600");
INSERT INTO tbl_project VALUES("8","2","my auditor template","5","iPhone edit","13","5s audit - dutch","2012-10-22","my auditor","","","","o","347","346","\'","1","Asdasd asad asd ad","asda","1","1","1350844200");
INSERT INTO tbl_project VALUES("9","3","myclienttemplate","1","JR","13","5s audit - dutch","2012-10-22","myauditor","","myclient","","c","347","346","\'","1","Czxczc","df","1","1","1350844200");
INSERT INTO tbl_project VALUES("10","2","my auditor template","3","Finance","12","5s audit - japanese","2012-10-24","my auditor  ","  ","","","o","347","346","\'","1","100","dgj  ","1","1","1351078492");
INSERT INTO tbl_project VALUES("11","2","my auditor template","3","Finance","12","5s audit - japanese","2012-09-22","my auditor","","","","o","347","346","\'","1","Ncgghj","chgghhjvjhv","0","0","1348313991");
INSERT INTO tbl_project VALUES("12","2","my auditor template","3","Finance","12","5s audit - japanese","2012-08-22","my auditor","","","","o","347","346","\'","1","Cfbxnch","fhxdtut","0","0","1345635598");
INSERT INTO tbl_project VALUES("13","2","my auditor template","3","Finance","12","5s audit - japanese","2012-07-22","my auditor","","","","o","347","346","\'","1","B,jggkjlkh","bxfcb","1","0","1342957203");
INSERT INTO tbl_project VALUES("14","2","my auditor template","5","iPhone edit","1","5s audit - english","2012-09-23","my auditor "," ","","","o","347","346","\'","1","Fobs vjhfjvjg","dufyfifu ","1","1","1348378754");
INSERT INTO tbl_project VALUES("15","2","my auditor template","5","iPhone edit","14","TempQuestionnair","2012-10-23","my auditor "," ","","","o","347","346","\'","1","2 nd audit","cyhfjyjjku ","0","0","1350970566");
INSERT INTO tbl_project VALUES("16","3","myclienttemplate","1","JR","14","TempQuestionnair","2012-11-25","myauditor    ","    ","myclient","","c","347","346","\'","1","1 st audit comment","vvffghgfdfffv    ","0","0","1353823481");
INSERT INTO tbl_project VALUES("17","3","myclienttemplate","1","JR","1","5s audit - english","2012-11-25","myauditor    ","    ","myclient","","c","347","346","\'","1","2nd audit and audited me.....","me    ","0","0","1353823481");
INSERT INTO tbl_project VALUES("18","1","das infomedia template","3","Finance","1","5s audit - english","2012-11-25","das infomedia edit  ","1350730883Tulips.jpg  ","","","o","347","346","\'","1","Fhjyfhj logo testing","me  ","1","0","1353823481");
INSERT INTO tbl_project VALUES("19","2","my auditor template","3","Finance","1","5s audit - english","2012-10-23","my auditor","","","","o","347","346","\'","1","Cfgfhhnhjhj","dff vh","0","1","1350973781");
INSERT INTO tbl_project VALUES("20","2","my auditor template","5","iPhone edit","1","5s audit - english","2012-07-22","my auditor  ","  ","","","o","347","346","\'","1","Well done","bhavin  ","0","0","1342939757");
INSERT INTO tbl_project VALUES("21","2","my auditor template","1","JR","2","5s audit - french","2012-01-20","my auditor","","","","o","347","346","\'","1","Waw","Patel","0","0","1327051003");
INSERT INTO tbl_project VALUES("22","1","das infomedia template","1","JR","6","5s audit - german","2012-05-22","das infomedia edit ","1350730883Tulips.jpg ","","","o","347","346","\'","1","Cool and again very much","bhavin","1","1","1338286593");
INSERT INTO tbl_project VALUES("23","2","my auditor template","5","iPhone edit","1","5s audit - english","2012-10-23","my auditor","","","","o","347","346","\'","1","Greet hill j j o I o u u t tt h ","tyt","1","0","1350969957");
INSERT INTO tbl_project VALUES("24","1","das infomedia template","1","JR","1","5s audit - english","2012-10-23","das infomedia edit","1350730883Tulips.jpg","","","o","347","346","\'","1","Q qeh","eqweeq","1","1","1350987872");
INSERT INTO tbl_project VALUES("25","3","myclienttemplate","5","iPhone edit","6","5s audit - german","2012-10-23","myauditor","1350972993loginLogo.png","myclient","1350972993logo_final-1.png","c","347","346","\'","1","","fhffh","0","1","1350987596");
INSERT INTO tbl_project VALUES("26","1","das infomedia template","1","JR","1","5s audit - english","2012-03-25","das infomedia edit","1350730883Tulips.jpg","","","o","347","346","\'","1","Well done.....","bhavin","0","0","1332672843");
INSERT INTO tbl_project VALUES("27","3","myclienttemplate","3","Finance","1","5s audit - english","2012-09-27","myauditor","1350972993loginLogo.png","myclient","1350972993logo_final-1.png","c","347","346","\'","1","Hmmmm.......WELL.......????.?.?..a.a.a","bhavin ","0","1","1348744260");
INSERT INTO tbl_project VALUES("28","2","my auditor template","5","iPhone edit","6","5s audit - german","2012-08-01","my auditor      ","      ","","","o","347","346","\'","1","Jfhxhxhdcn","ghj      ","0","0","1357038574");
INSERT INTO tbl_project VALUES("29","3","myclienttemplate","5","iPhone edit","1","5s audit - english","2012-11-23","myauditor ","1350972993loginLogo.png ","myclient","1350972993logo_final-1.png","c","347","346","\'","1","Patel mmmm Bas bi","bhavin ","0","0","1353669389");
INSERT INTO tbl_project VALUES("30","1","das infomedia template","1","JR","1","5s audit - english","2012-12-23","das infomedia edit   ","1350730883Tulips.jpg   ","","","o","347","346","\'","1","","bhavin   ","0","0","1356261779");
INSERT INTO tbl_project VALUES("31","2","my auditor template","3","Finance","11","5s audit - greek","2012-10-31","my auditor "," ","","","o","347","346","\'","1","","montu ","0","1","1351683960");
INSERT INTO tbl_project VALUES("32","3","myclienttemplate","5","iPhone edit","1","5s audit - english","2012-10-23","myauditor ","1350972993loginLogo.png ","myclient","1350972993logo_final-1.png","c","346","346","","1","thrthuyrtyhrt","fghfg ","0","0","0");
INSERT INTO tbl_project VALUES("33","3","myclienttemplate","1","JR","6","5s audit - german","2012-12-23","myauditor","1350972993loginLogo.png","myclient","1350972993logo_final-1.png","c","347","346","\'","1","","twdg","0","1","1356264331");
INSERT INTO tbl_project VALUES("34","2","my auditor template","1","JR","12","5s audit - japanese","2012-12-31","my auditor   ","   ","","","o","347","346","\'","1","Huddi baba and raghav baba and crock roach baba","Patel and Patel   ","0","1","1356955986");
INSERT INTO tbl_project VALUES("35","2","my auditor template","1","JR","1","5s audit - english","2012-10-23","my auditor","","","","o","347","346","\'","1","Chugged","fightvhh","1","0","1350995924");
INSERT INTO tbl_project VALUES("36","1","das infomedia template","5","iPhone edit","9","5s audit - russsian","2012-10-23","das infomedia edit","1350730883Tulips.jpg","","","o","347","346","\'","1","Veert Nice","ghzjd","0","0","1350995395");
INSERT INTO tbl_project VALUES("37","1","das infomedia template","1","JR","11","5s audit - greek","2012-09-23","das infomedia edit ","1350730883Tulips.jpg ","","","o","347","346","\'","1","gfhfghfgh","vragen ","1","0","1348405151");
INSERT INTO tbl_project VALUES("38","2","my auditor template","1","JR","1","5s audit - english","2012-10-23","my auditor "," ","","","o","346","346","","1","Ytuiuukk","dqweq ","1","0","0");
INSERT INTO tbl_project VALUES("39","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","Hgfdddf","gfjyyu  ","1","0","0");
INSERT INTO tbl_project VALUES("40","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","2 nd audit","cyhfjyjjku ","1","0","0");
INSERT INTO tbl_project VALUES("41","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","Cfgfhhnhjhj","dff vh","1","0","0");
INSERT INTO tbl_project VALUES("42","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","Greet hill j j o I o u u t tt h ","tyt","1","0","0");
INSERT INTO tbl_project VALUES("43","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","Q qeh","eqweeq","1","0","0");
INSERT INTO tbl_project VALUES("44","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","","fhffh","1","0","0");
INSERT INTO tbl_project VALUES("45","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","thrthuyrtyhrt","fghfg ","1","0","0");
INSERT INTO tbl_project VALUES("46","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","Chugged","fightvhh","1","0","0");
INSERT INTO tbl_project VALUES("47","2","my auditor template","1","JR","1","5s audit","2012-10-23","my auditor","","","","o","346","346","","1","Veert Nice","ghzjd","1","0","0");
INSERT INTO tbl_project VALUES("48","1","das infomedia template","1","JR","5","5s audit - danish","2012-10-23","das infomedia edit","1350730883Tulips.jpg","","","o","347","346","\'","1","Jødiske","jgfy","0","0","1350998404");
INSERT INTO tbl_project VALUES("49","3","myclienttemplate","3","Finance","1","5s audit - english","2012-11-05","myauditor ","1350972993loginLogo.png ","myclient","1350972993logo_final-1.png","c","347","346","\'","1","This is for test","dss ","0","0","1352094460");
INSERT INTO tbl_project VALUES("50","1","das infomedia template","3","Finance","1","5s audit - english","2012-11-10","das infomedia edit","1351322872error.png","","","o","347","346","\'","1","Serb","cdd","1","0","1352543530");
INSERT INTO tbl_project VALUES("51","2","my auditor template","3","Finance","14","TempQuestionnair","2012-11-10","my auditor","1351158079photo(1).PNG","","","o","347","346","\'","1","Fcgcjghcfjgc","gh","0","0","1352543811");
INSERT INTO tbl_project VALUES("52","4","mytest","3","Finance","1","5s audit - english","2012-11-11","myaudit","1351323202loginLogo.png","mytest","1351159313addFiles.png","c","347","346","\'","1","","hyuu","1","0","1352608845");





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
) ENGINE=InnoDB AUTO_INCREMENT=1917 DEFAULT CHARSET=utf8;

INSERT INTO tbl_project_review VALUES("26","1","1","0","3","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("27","1","1","1","2","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("28","1","1","2","1","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("29","1","1","3","4","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("30","1","1","4","4","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("31","1","1","5","3","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("32","1","1","6","4","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("33","1","1","7","2","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("34","1","1","8","1","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("35","1","1","9","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("36","1","1","10","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("37","1","1","11","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("38","1","1","12","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("39","1","1","13","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("40","1","1","14","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("41","1","1","15","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("42","1","1","16","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("43","1","1","17","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("44","1","1","18","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("45","1","1","19","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("46","1","1","20","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("47","1","1","21","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("48","1","1","22","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("49","1","1","23","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("50","1","1","24","0","0","347","2012-10-20 12:30:38","346");
INSERT INTO tbl_project_review VALUES("51","2","1","0","4","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("52","2","1","1","4","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("53","2","1","2","3","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("54","2","1","3","3","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("55","2","1","4","2","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("56","2","1","5","3","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("57","2","1","6","4","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("58","2","1","7","4","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("59","2","1","8","3","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("60","2","1","9","2","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("61","2","1","10","2","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("62","2","1","11","0","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("63","2","1","12","4","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("64","2","1","13","0","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("65","2","1","14","2","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("66","2","1","15","2","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("67","2","1","16","0","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("68","2","1","17","3","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("69","2","1","18","0","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("70","2","1","19","2","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("71","2","1","20","2","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("72","2","1","21","0","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("73","2","1","22","0","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("74","2","1","23","0","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("75","2","1","24","4","In_Progress","347","2012-10-20 12:31:22","346");
INSERT INTO tbl_project_review VALUES("76","3","1","0","2","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("77","3","1","1","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("78","3","1","2","3","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("79","3","1","3","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("80","3","1","4","1","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("81","3","1","5","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("82","3","1","6","3","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("83","3","1","7","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("84","3","1","8","4","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("85","3","1","9","3","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("86","3","1","10","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("87","3","1","11","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("88","3","1","12","2","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("89","3","1","13","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("90","3","1","14","4","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("91","3","1","15","4","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("92","3","1","16","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("93","3","1","17","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("94","3","1","18","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("95","3","1","19","4","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("96","3","1","20","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("97","3","1","21","2","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("98","3","1","22","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("99","3","1","23","0","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("100","3","1","24","1","Completed","347","2012-10-20 12:32:27","346");
INSERT INTO tbl_project_review VALUES("126","5","13","0","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("127","5","13","1","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("128","5","13","2","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("129","5","13","3","1","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("130","5","13","4","2","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("131","5","13","5","2","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("132","5","13","6","2","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("133","5","13","7","2","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("134","5","13","8","2","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("135","5","13","9","2","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("136","5","13","10","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("137","5","13","11","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("138","5","13","12","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("139","5","13","13","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("140","5","13","14","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("141","5","13","15","4","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("142","5","13","16","4","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("143","5","13","17","4","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("144","5","13","18","4","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("145","5","13","19","4","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("146","5","13","20","1","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("147","5","13","21","2","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("148","5","13","22","3","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("149","5","13","23","4","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("150","5","13","24","0","0","347","2012-10-22 07:51:28","346");
INSERT INTO tbl_project_review VALUES("251","4","13","0","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("252","4","13","1","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("253","4","13","2","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("254","4","13","3","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("255","4","13","4","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("256","4","13","5","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("257","4","13","6","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("258","4","13","7","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("259","4","13","8","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("260","4","13","9","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("261","4","13","10","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("262","4","13","11","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("263","4","13","12","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("264","4","13","13","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("265","4","13","14","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("266","4","13","15","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("267","4","13","16","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("268","4","13","17","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("269","4","13","18","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("270","4","13","19","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("271","4","13","20","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("272","4","13","21","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("273","4","13","22","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("274","4","13","23","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("275","4","13","24","4","0","347","2012-10-22 07:57:04","346");
INSERT INTO tbl_project_review VALUES("401","6","13","0","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("402","6","13","1","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("403","6","13","2","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("404","6","13","3","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("405","6","13","4","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("406","6","13","5","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("407","6","13","6","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("408","6","13","7","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("409","6","13","8","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("410","6","13","9","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("411","6","13","10","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("412","6","13","11","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("413","6","13","12","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("414","6","13","13","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("415","6","13","14","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("416","6","13","15","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("417","6","13","16","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("418","6","13","17","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("419","6","13","18","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("420","6","13","19","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("421","6","13","20","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("422","6","13","21","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("423","6","13","22","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("424","6","13","23","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("425","6","13","24","3","0","347","2012-10-22 08:48:22","346");
INSERT INTO tbl_project_review VALUES("426","7","13","0","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("427","7","13","1","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("428","7","13","2","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("429","7","13","3","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("430","7","13","4","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("431","7","13","5","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("432","7","13","6","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("433","7","13","7","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("434","7","13","8","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("435","7","13","9","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("436","7","13","10","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("437","7","13","11","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("438","7","13","12","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("439","7","13","13","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("440","7","13","14","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("441","7","13","15","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("442","7","13","16","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("443","7","13","17","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("444","7","13","18","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("445","7","13","19","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("446","7","13","20","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("447","7","13","21","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("448","7","13","22","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("449","7","13","23","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("450","7","13","24","1","Completed","347","2012-10-22 08:48:24","346");
INSERT INTO tbl_project_review VALUES("451","8","13","0","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("452","8","13","1","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("453","8","13","2","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("454","8","13","3","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("455","8","13","4","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("456","8","13","5","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("457","8","13","6","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("458","8","13","7","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("459","8","13","8","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("460","8","13","9","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("461","8","13","10","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("462","8","13","11","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("463","8","13","12","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("464","8","13","13","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("465","8","13","14","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("466","8","13","15","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("467","8","13","16","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("468","8","13","17","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("469","8","13","18","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("470","8","13","19","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("471","8","13","20","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("472","8","13","21","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("473","8","13","22","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("474","8","13","23","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("475","8","13","24","2","0","347","2012-10-22 08:48:26","346");
INSERT INTO tbl_project_review VALUES("476","9","13","0","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("477","9","13","1","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("478","9","13","2","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("479","9","13","3","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("480","9","13","4","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("481","9","13","5","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("482","9","13","6","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("483","9","13","7","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("484","9","13","8","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("485","9","13","9","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("486","9","13","10","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("487","9","13","11","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("488","9","13","12","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("489","9","13","13","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("490","9","13","14","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("491","9","13","15","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("492","9","13","16","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("493","9","13","17","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("494","9","13","18","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("495","9","13","19","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("496","9","13","20","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("497","9","13","21","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("498","9","13","22","4","0","347","2012-10-22 08:48:28","346");
INSERT INTO tbl_project_review VALUES("499","9","13","23","4","0","347","2012-10-22 08:48:29","346");
INSERT INTO tbl_project_review VALUES("500","9","13","24","4","0","347","2012-10-22 08:48:29","346");
INSERT INTO tbl_project_review VALUES("526","11","12","0","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("527","11","12","1","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("528","11","12","2","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("529","11","12","3","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("530","11","12","4","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("531","11","12","5","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("532","11","12","6","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("533","11","12","7","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("534","11","12","8","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("535","11","12","9","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("536","11","12","10","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("537","11","12","11","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("538","11","12","12","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("539","11","12","13","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("540","11","12","14","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("541","11","12","15","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("542","11","12","16","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("543","11","12","17","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("544","11","12","18","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("545","11","12","19","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("546","11","12","20","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("547","11","12","21","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("548","11","12","22","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("549","11","12","23","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("550","11","12","24","3","1","347","2012-10-22 11:45:30","346");
INSERT INTO tbl_project_review VALUES("551","12","12","0","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("552","12","12","1","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("553","12","12","2","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("554","12","12","3","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("555","12","12","4","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("556","12","12","5","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("557","12","12","6","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("558","12","12","7","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("559","12","12","8","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("560","12","12","9","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("561","12","12","10","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("562","12","12","11","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("563","12","12","12","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("564","12","12","13","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("565","12","12","14","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("566","12","12","15","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("567","12","12","16","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("568","12","12","17","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("569","12","12","18","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("570","12","12","19","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("571","12","12","20","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("572","12","12","21","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("573","12","12","22","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("574","12","12","23","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("575","12","12","24","2","1","347","2012-10-22 11:45:31","346");
INSERT INTO tbl_project_review VALUES("576","13","12","0","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("577","13","12","1","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("578","13","12","2","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("579","13","12","3","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("580","13","12","4","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("581","13","12","5","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("582","13","12","6","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("583","13","12","7","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("584","13","12","8","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("585","13","12","9","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("586","13","12","10","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("587","13","12","11","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("588","13","12","12","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("589","13","12","13","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("590","13","12","14","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("591","13","12","15","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("592","13","12","16","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("593","13","12","17","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("594","13","12","18","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("595","13","12","19","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("596","13","12","20","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("597","13","12","21","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("598","13","12","22","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("599","13","12","23","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("600","13","12","24","1","0","347","2012-10-22 11:45:33","346");
INSERT INTO tbl_project_review VALUES("601","10","12","0","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("602","10","12","1","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("603","10","12","2","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("604","10","12","3","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("605","10","12","4","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("606","10","12","5","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("607","10","12","6","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("608","10","12","7","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("609","10","12","8","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("610","10","12","9","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("611","10","12","10","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("612","10","12","11","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("613","10","12","12","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("614","10","12","13","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("615","10","12","14","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("616","10","12","15","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("617","10","12","16","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("618","10","12","17","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("619","10","12","18","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("620","10","12","19","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("621","10","12","20","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("622","10","12","21","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("623","10","12","22","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("624","10","12","23","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("625","10","12","24","4","In Progress","347","2012-10-22 11:47:25","346");
INSERT INTO tbl_project_review VALUES("651","15","14","0","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("652","15","14","1","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("653","15","14","2","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("654","15","14","3","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("655","15","14","4","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("656","15","14","5","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("657","15","14","6","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("658","15","14","7","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("659","15","14","8","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("660","15","14","9","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("661","15","14","10","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("662","15","14","11","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("663","15","14","12","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("664","15","14","13","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("665","15","14","14","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("666","15","14","15","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("667","15","14","16","2","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("668","15","14","17","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("669","15","14","18","2","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("670","15","14","19","4","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("671","15","14","20","2","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("672","15","14","21","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("673","15","14","22","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("674","15","14","23","3","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("675","15","14","24","2","Completed","347","2012-10-23 05:40:08","346");
INSERT INTO tbl_project_review VALUES("676","14","1","0","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("677","14","1","1","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("678","14","1","2","2","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("679","14","1","3","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("680","14","1","4","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("681","14","1","5","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("682","14","1","6","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("683","14","1","7","2","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("684","14","1","8","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("685","14","1","9","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("686","14","1","10","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("687","14","1","11","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("688","14","1","12","2","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("689","14","1","13","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("690","14","1","14","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("691","14","1","15","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("692","14","1","16","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("693","14","1","17","2","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("694","14","1","18","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("695","14","1","19","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("696","14","1","20","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("697","14","1","21","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("698","14","1","22","2","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("699","14","1","23","3","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("700","14","1","24","4","In Progress","347","2012-10-23 05:41:50","346");
INSERT INTO tbl_project_review VALUES("701","16","14","0","2","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("702","16","14","1","2","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("703","16","14","2","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("704","16","14","3","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("705","16","14","4","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("706","16","14","5","1","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("707","16","14","6","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("708","16","14","7","2","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("709","16","14","8","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("710","16","14","9","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("711","16","14","10","1","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("712","16","14","11","2","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("713","16","14","12","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("714","16","14","13","4","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("715","16","14","14","4","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("716","16","14","15","4","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("717","16","14","16","4","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("718","16","14","17","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("719","16","14","18","2","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("720","16","14","19","1","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("721","16","14","20","4","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("722","16","14","21","1","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("723","16","14","22","3","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("724","16","14","23","2","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("725","16","14","24","0","Completed","347","2012-10-23 06:12:55","346");
INSERT INTO tbl_project_review VALUES("726","17","1","0","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("727","17","1","1","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("728","17","1","2","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("729","17","1","3","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("730","17","1","4","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("731","17","1","5","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("732","17","1","6","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("733","17","1","7","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("734","17","1","8","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("735","17","1","9","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("736","17","1","10","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("737","17","1","11","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("738","17","1","12","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("739","17","1","13","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("740","17","1","14","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("741","17","1","15","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("742","17","1","16","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("743","17","1","17","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("744","17","1","18","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("745","17","1","19","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("746","17","1","20","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("747","17","1","21","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("748","17","1","22","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("749","17","1","23","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("750","17","1","24","4","Completed","347","2012-10-23 06:12:57","346");
INSERT INTO tbl_project_review VALUES("751","18","1","0","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("752","18","1","1","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("753","18","1","2","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("754","18","1","3","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("755","18","1","4","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("756","18","1","5","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("757","18","1","6","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("758","18","1","7","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("759","18","1","8","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("760","18","1","9","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("761","18","1","10","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("762","18","1","11","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("763","18","1","12","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("764","18","1","13","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("765","18","1","14","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("766","18","1","15","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("767","18","1","16","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("768","18","1","17","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("769","18","1","18","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("770","18","1","19","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("771","18","1","20","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("772","18","1","21","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("773","18","1","22","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("774","18","1","23","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("775","18","1","24","1","1","347","2012-10-23 06:17:52","346");
INSERT INTO tbl_project_review VALUES("851","20","1","0","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("852","20","1","1","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("853","20","1","2","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("854","20","1","3","1","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("855","20","1","4","1","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("856","20","1","5","1","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("857","20","1","6","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("858","20","1","7","3","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("859","20","1","8","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("860","20","1","9","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("861","20","1","10","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("862","20","1","11","3","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("863","20","1","12","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("864","20","1","13","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("865","20","1","14","3","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("866","20","1","15","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("867","20","1","16","3","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("868","20","1","17","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("869","20","1","18","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("870","20","1","19","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("871","20","1","20","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("872","20","1","21","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("873","20","1","22","4","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("874","20","1","23","3","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("875","20","1","24","2","1","347","2012-10-23 06:53:00","346");
INSERT INTO tbl_project_review VALUES("876","21","2","0","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("877","21","2","1","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("878","21","2","2","2","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("879","21","2","3","3","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("880","21","2","4","1","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("881","21","2","5","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("882","21","2","6","3","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("883","21","2","7","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("884","21","2","8","3","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("885","21","2","9","3","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("886","21","2","10","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("887","21","2","11","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("888","21","2","12","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("889","21","2","13","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("890","21","2","14","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("891","21","2","15","3","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("892","21","2","16","3","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("893","21","2","17","2","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("894","21","2","18","1","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("895","21","2","19","2","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("896","21","2","20","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("897","21","2","21","3","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("898","21","2","22","2","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("899","21","2","23","1","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("900","21","2","24","4","0","347","2012-10-23 09:32:24","346");
INSERT INTO tbl_project_review VALUES("926","23","1","0","1","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("927","23","1","1","1","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("928","23","1","2","2","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("929","23","1","3","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("930","23","1","4","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("931","23","1","5","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("932","23","1","6","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("933","23","1","7","2","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("934","23","1","8","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("935","23","1","9","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("936","23","1","10","2","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("937","23","1","11","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("938","23","1","12","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("939","23","1","13","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("940","23","1","14","2","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("941","23","1","15","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("942","23","1","16","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("943","23","1","17","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("944","23","1","18","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("945","23","1","19","2","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("946","23","1","20","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("947","23","1","21","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("948","23","1","22","2","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("949","23","1","23","3","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("950","23","1","24","4","1","347","2012-10-23 10:25:47","346");
INSERT INTO tbl_project_review VALUES("976","24","1","0","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("977","24","1","1","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("978","24","1","2","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("979","24","1","3","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("980","24","1","4","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("981","24","1","5","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("982","24","1","6","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("983","24","1","7","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("984","24","1","8","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("985","24","1","9","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("986","24","1","10","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("987","24","1","11","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("988","24","1","12","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("989","24","1","13","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("990","24","1","14","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("991","24","1","15","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("992","24","1","16","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("993","24","1","17","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("994","24","1","18","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("995","24","1","19","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("996","24","1","20","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("997","24","1","21","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("998","24","1","22","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("999","24","1","23","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("1000","24","1","24","0","1","347","2012-10-23 10:26:12","346");
INSERT INTO tbl_project_review VALUES("1076","26","1","0","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1077","26","1","1","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1078","26","1","2","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1079","26","1","3","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1080","26","1","4","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1081","26","1","5","2","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1082","26","1","6","3","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1083","26","1","7","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1084","26","1","8","3","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1085","26","1","9","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1086","26","1","10","4","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1087","26","1","11","1","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1088","26","1","12","3","0","347","2012-10-23 10:56:34","346");
INSERT INTO tbl_project_review VALUES("1089","26","1","13","3","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1090","26","1","14","4","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1091","26","1","15","4","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1092","26","1","16","3","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1093","26","1","17","3","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1094","26","1","18","4","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1095","26","1","19","2","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1096","26","1","20","4","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1097","26","1","21","2","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1098","26","1","22","4","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1099","26","1","23","1","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1100","26","1","24","4","0","347","2012-10-23 10:56:35","346");
INSERT INTO tbl_project_review VALUES("1101","22","6","0","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1102","22","6","1","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1103","22","6","2","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1104","22","6","3","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1105","22","6","4","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1106","22","6","5","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1107","22","6","6","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1108","22","6","7","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1109","22","6","8","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1110","22","6","9","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1111","22","6","10","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1112","22","6","11","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1113","22","6","12","2","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1114","22","6","13","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1115","22","6","14","2","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1116","22","6","15","2","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1117","22","6","16","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1118","22","6","17","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1119","22","6","18","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1120","22","6","19","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1121","22","6","20","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1122","22","6","21","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1123","22","6","22","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1124","22","6","23","3","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1125","22","6","24","4","In Progress","347","2012-10-23 10:58:35","346");
INSERT INTO tbl_project_review VALUES("1126","25","6","0","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1127","25","6","1","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1128","25","6","2","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1129","25","6","3","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1130","25","6","4","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1131","25","6","5","2","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1132","25","6","6","2","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1133","25","6","7","2","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1134","25","6","8","2","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1135","25","6","9","2","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1136","25","6","10","4","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1137","25","6","11","4","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1138","25","6","12","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1139","25","6","13","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1140","25","6","14","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1141","25","6","15","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1142","25","6","16","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1143","25","6","17","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1144","25","6","18","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1145","25","6","19","1","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1146","25","6","20","4","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1147","25","6","21","4","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1148","25","6","22","3","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1149","25","6","23","2","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1150","25","6","24","1","1","347","2012-10-23 11:00:34","346");
INSERT INTO tbl_project_review VALUES("1176","28","6","0","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1177","28","6","1","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1178","28","6","2","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1179","28","6","3","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1180","28","6","4","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1181","28","6","5","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1182","28","6","6","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1183","28","6","7","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1184","28","6","8","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1185","28","6","9","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1186","28","6","10","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1187","28","6","11","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1188","28","6","12","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1189","28","6","13","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1190","28","6","14","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1191","28","6","15","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1192","28","6","16","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1193","28","6","17","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1194","28","6","18","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1195","28","6","19","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1196","28","6","20","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1197","28","6","21","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1198","28","6","22","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1199","28","6","23","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1200","28","6","24","4","Completed","347","2012-10-23 11:10:29","346");
INSERT INTO tbl_project_review VALUES("1201","27","1","0","3","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1202","27","1","1","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1203","27","1","2","1","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1204","27","1","3","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1205","27","1","4","2","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1206","27","1","5","1","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1207","27","1","6","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1208","27","1","7","3","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1209","27","1","8","2","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1210","27","1","9","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1211","27","1","10","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1212","27","1","11","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1213","27","1","12","3","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1214","27","1","13","1","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1215","27","1","14","3","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1216","27","1","15","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1217","27","1","16","3","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1218","27","1","17","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1219","27","1","18","2","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1220","27","1","19","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1221","27","1","20","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1222","27","1","21","3","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1223","27","1","22","2","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1224","27","1","23","1","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1225","27","1","24","4","0","347","2012-10-23 11:12:40","346");
INSERT INTO tbl_project_review VALUES("1226","29","1","0","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1227","29","1","1","2","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1228","29","1","2","3","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1229","29","1","3","1","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1230","29","1","4","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1231","29","1","5","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1232","29","1","6","1","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1233","29","1","7","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1234","29","1","8","3","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1235","29","1","9","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1236","29","1","10","3","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1237","29","1","11","3","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1238","29","1","12","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1239","29","1","13","3","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1240","29","1","14","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1241","29","1","15","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1242","29","1","16","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1243","29","1","17","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1244","29","1","18","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1245","29","1","19","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1246","29","1","20","2","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1247","29","1","21","3","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1248","29","1","22","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1249","29","1","23","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1250","29","1","24","4","Completed","347","2012-10-23 11:19:28","346");
INSERT INTO tbl_project_review VALUES("1251","30","1","0","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1252","30","1","1","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1253","30","1","2","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1254","30","1","3","2","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1255","30","1","4","3","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1256","30","1","5","1","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1257","30","1","6","2","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1258","30","1","7","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1259","30","1","8","1","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1260","30","1","9","1","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1261","30","1","10","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1262","30","1","11","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1263","30","1","12","3","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1264","30","1","13","3","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1265","30","1","14","3","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1266","30","1","15","1","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1267","30","1","16","2","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1268","30","1","17","1","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1269","30","1","18","2","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1270","30","1","19","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1271","30","1","20","2","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1272","30","1","21","3","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1273","30","1","22","2","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1274","30","1","23","3","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1275","30","1","24","4","Completed","347","2012-10-23 11:25:20","346");
INSERT INTO tbl_project_review VALUES("1276","19","1","0","1","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1277","19","1","1","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1278","19","1","2","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1279","19","1","3","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1280","19","1","4","3","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1281","19","1","5","1","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1282","19","1","6","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1283","19","1","7","3","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1284","19","1","8","4","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1285","19","1","9","4","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1286","19","1","10","1","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1287","19","1","11","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1288","19","1","12","3","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1289","19","1","13","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1290","19","1","14","4","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1291","19","1","15","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1292","19","1","16","3","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1293","19","1","17","4","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1294","19","1","18","3","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1295","19","1","19","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1296","19","1","20","3","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1297","19","1","21","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1298","19","1","22","3","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1299","19","1","23","2","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1300","19","1","24","4","0","347","2012-10-23 11:35:47","346");
INSERT INTO tbl_project_review VALUES("1326","32","1","1","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1327","32","1","2","2","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1328","32","1","3","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1329","32","1","4","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1330","32","1","5","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1331","32","1","6","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1332","32","1","7","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1333","32","1","8","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1334","32","1","9","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1335","32","1","10","2","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1336","32","1","11","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1337","32","1","12","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1338","32","1","13","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1339","32","1","14","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1340","32","1","15","2","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1341","32","1","16","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1342","32","1","17","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1343","32","1","18","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1344","32","1","19","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1345","32","1","20","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1346","32","1","21","3","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1347","32","1","22","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1348","32","1","23","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1349","32","1","24","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1350","32","1","25","4","Completed","346","2012-10-23 12:16:23","346");
INSERT INTO tbl_project_review VALUES("1401","35","1","0","4","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1402","35","1","1","2","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1403","35","1","2","2","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1404","35","1","3","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1405","35","1","4","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1406","35","1","5","4","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1407","35","1","6","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1408","35","1","7","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1409","35","1","8","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1410","35","1","9","2","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1411","35","1","10","4","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1412","35","1","11","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1413","35","1","12","2","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1414","35","1","13","4","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1415","35","1","14","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1416","35","1","15","4","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1417","35","1","16","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1418","35","1","17","4","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1419","35","1","18","2","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1420","35","1","19","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1421","35","1","20","0","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1422","35","1","21","1","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1423","35","1","22","2","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1424","35","1","23","3","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1425","35","1","24","1","1","347","2012-10-23 12:41:25","346");
INSERT INTO tbl_project_review VALUES("1426","33","6","0","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1427","33","6","1","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1428","33","6","2","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1429","33","6","3","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1430","33","6","4","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1431","33","6","5","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1432","33","6","6","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1433","33","6","7","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1434","33","6","8","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1435","33","6","9","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1436","33","6","10","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1437","33","6","11","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1438","33","6","12","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1439","33","6","13","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1440","33","6","14","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1441","33","6","15","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1442","33","6","16","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1443","33","6","17","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1444","33","6","18","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1445","33","6","19","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1446","33","6","20","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1447","33","6","21","4","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1448","33","6","22","4","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1449","33","6","23","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1450","33","6","24","0","0","347","2012-10-23 12:49:32","346");
INSERT INTO tbl_project_review VALUES("1451","34","12","0","3","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1452","34","12","1","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1453","34","12","2","3","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1454","34","12","3","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1455","34","12","4","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1456","34","12","5","3","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1457","34","12","6","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1458","34","12","7","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1459","34","12","8","3","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1460","34","12","9","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1461","34","12","10","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1462","34","12","11","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1463","34","12","12","3","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1464","34","12","13","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1465","34","12","14","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1466","34","12","15","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1467","34","12","16","2","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1468","34","12","17","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1469","34","12","18","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1470","34","12","19","3","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1471","34","12","20","1","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1472","34","12","21","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1473","34","12","22","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1474","34","12","23","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1475","34","12","24","4","1","347","2012-10-23 12:49:35","346");
INSERT INTO tbl_project_review VALUES("1476","36","9","0","3","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1477","36","9","1","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1478","36","9","2","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1479","36","9","3","3","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1480","36","9","4","3","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1481","36","9","5","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1482","36","9","6","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1483","36","9","7","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1484","36","9","8","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1485","36","9","9","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1486","36","9","10","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1487","36","9","11","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1488","36","9","12","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1489","36","9","13","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1490","36","9","14","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1491","36","9","15","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1492","36","9","16","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1493","36","9","17","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1494","36","9","18","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1495","36","9","19","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1496","36","9","20","1","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1497","36","9","21","1","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1498","36","9","22","3","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1499","36","9","23","1","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1500","36","9","24","4","1","347","2012-10-23 12:49:38","346");
INSERT INTO tbl_project_review VALUES("1501","31","2","0","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1502","31","2","1","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1503","31","2","2","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1504","31","2","3","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1505","31","2","4","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1506","31","2","5","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1507","31","2","6","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1508","31","2","7","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1509","31","2","8","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1510","31","2","9","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1511","31","2","10","2","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1512","31","2","11","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1513","31","2","12","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1514","31","2","13","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1515","31","2","14","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1516","31","2","15","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1517","31","2","16","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1518","31","2","17","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1519","31","2","18","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1520","31","2","19","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1521","31","2","20","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1522","31","2","21","4","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1523","31","2","22","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1524","31","2","23","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1525","31","2","24","3","Completed","347","2012-10-23 13:01:37","346");
INSERT INTO tbl_project_review VALUES("1526","37","11","0","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1527","37","11","1","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1528","37","11","2","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1529","37","11","3","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1530","37","11","4","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1531","37","11","5","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1532","37","11","6","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1533","37","11","7","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1534","37","11","8","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1535","37","11","9","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1536","37","11","10","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1537","37","11","11","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1538","37","11","12","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1539","37","11","13","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1540","37","11","14","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1541","37","11","15","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1542","37","11","16","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1543","37","11","17","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1544","37","11","18","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1545","37","11","19","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1546","37","11","20","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1547","37","11","21","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1548","37","11","22","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1549","37","11","23","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1550","37","11","24","4","In_Progress","347","2012-10-23 13:01:41","346");
INSERT INTO tbl_project_review VALUES("1551","38","1","1","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1552","38","1","2","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1553","38","1","3","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1554","38","1","4","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1555","38","1","5","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1556","38","1","6","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1557","38","1","7","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1558","38","1","8","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1559","38","1","9","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1560","38","1","10","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1561","38","1","11","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1562","38","1","12","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1563","38","1","13","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1564","38","1","14","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1565","38","1","15","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1566","38","1","16","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1567","38","1","17","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1568","38","1","18","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1569","38","1","19","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1570","38","1","20","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1571","38","1","21","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1572","38","1","22","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1573","38","1","23","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1574","38","1","24","3","In_Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1575","39","1","1","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1576","39","1","2","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1577","39","1","3","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1578","39","1","4","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1579","39","1","5","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1580","39","1","6","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1581","39","1","7","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1582","39","1","8","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1583","39","1","9","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1584","39","1","10","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1585","39","1","11","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1586","39","1","12","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1587","39","1","13","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1588","39","1","14","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1589","39","1","15","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1590","39","1","16","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1591","39","1","17","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1592","39","1","18","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1593","39","1","19","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1594","39","1","20","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1595","39","1","21","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1596","39","1","22","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1597","39","1","23","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1598","39","1","24","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1599","40","1","1","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1600","40","1","2","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1601","40","1","3","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1602","40","1","4","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1603","40","1","5","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1604","40","1","6","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1605","40","1","7","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1606","40","1","8","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1607","40","1","9","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1608","40","1","10","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1609","40","1","11","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1610","40","1","12","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1611","40","1","13","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1612","40","1","14","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1613","40","1","15","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1614","40","1","16","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1615","40","1","17","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1616","40","1","18","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1617","40","1","19","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1618","40","1","20","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1619","40","1","21","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1620","40","1","22","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1621","40","1","23","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1622","40","1","24","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1623","41","1","1","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1624","41","1","2","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1625","41","1","3","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1626","41","1","4","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1627","41","1","5","1","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1628","41","1","6","2","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1629","41","1","7","3","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1630","41","1","8","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1631","41","1","9","4","In Progress","346","2012-10-23 13:25:22","346");
INSERT INTO tbl_project_review VALUES("1632","41","1","10","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1633","41","1","11","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1634","41","1","12","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1635","41","1","13","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1636","41","1","14","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1637","41","1","15","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1638","41","1","16","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1639","41","1","17","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1640","41","1","18","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1641","41","1","19","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1642","41","1","20","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1643","41","1","21","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1644","41","1","22","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1645","41","1","23","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1646","41","1","24","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1647","42","1","1","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1648","42","1","2","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1649","42","1","3","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1650","42","1","4","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1651","42","1","5","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1652","42","1","6","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1653","42","1","7","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1654","42","1","8","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1655","42","1","9","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1656","42","1","10","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1657","42","1","11","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1658","42","1","12","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1659","42","1","13","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1660","42","1","14","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1661","42","1","15","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1662","42","1","16","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1663","42","1","17","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1664","42","1","18","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1665","42","1","19","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1666","42","1","20","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1667","42","1","21","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1668","42","1","22","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1669","42","1","23","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1670","42","1","24","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1671","43","1","1","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1672","43","1","2","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1673","43","1","3","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1674","43","1","4","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1675","43","1","5","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1676","43","1","6","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1677","43","1","7","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1678","43","1","8","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1679","43","1","9","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1680","43","1","10","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1681","43","1","11","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1682","43","1","12","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1683","43","1","13","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1684","43","1","14","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1685","43","1","15","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1686","43","1","16","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1687","43","1","17","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1688","43","1","18","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1689","43","1","19","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1690","43","1","20","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1691","43","1","21","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1692","43","1","22","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1693","43","1","23","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1694","43","1","24","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1695","44","1","1","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1696","44","1","2","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1697","44","1","3","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1698","44","1","4","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1699","44","1","5","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1700","44","1","6","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1701","44","1","7","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1702","44","1","8","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1703","44","1","9","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1704","44","1","10","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1705","44","1","11","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1706","44","1","12","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1707","44","1","13","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1708","44","1","14","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1709","44","1","15","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1710","44","1","16","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1711","44","1","17","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1712","44","1","18","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1713","44","1","19","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1714","44","1","20","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1715","44","1","21","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1716","44","1","22","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1717","44","1","23","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1718","44","1","24","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1719","45","1","1","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1720","45","1","2","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1721","45","1","3","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1722","45","1","4","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1723","45","1","5","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1724","45","1","6","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1725","45","1","7","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1726","45","1","8","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1727","45","1","9","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1728","45","1","10","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1729","45","1","11","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1730","45","1","12","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1731","45","1","13","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1732","45","1","14","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1733","45","1","15","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1734","45","1","16","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1735","45","1","17","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1736","45","1","18","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1737","45","1","19","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1738","45","1","20","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1739","45","1","21","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1740","45","1","22","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1741","45","1","23","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1742","45","1","24","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1743","45","1","25","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1744","46","1","1","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1745","46","1","2","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1746","46","1","3","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1747","46","1","4","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1748","46","1","5","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1749","46","1","6","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1750","46","1","7","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1751","46","1","8","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1752","46","1","9","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1753","46","1","10","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1754","46","1","11","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1755","46","1","12","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1756","46","1","13","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1757","46","1","14","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1758","46","1","15","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1759","46","1","16","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1760","46","1","17","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1761","46","1","18","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1762","46","1","19","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1763","46","1","20","0","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1764","46","1","21","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1765","46","1","22","2","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1766","46","1","23","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1767","46","1","24","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1768","47","1","1","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1769","47","1","2","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1770","47","1","3","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1771","47","1","4","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1772","47","1","5","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1773","47","1","6","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1774","47","1","7","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1775","47","1","8","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1776","47","1","9","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1777","47","1","10","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1778","47","1","11","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1779","47","1","12","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1780","47","1","13","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1781","47","1","14","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1782","47","1","15","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1783","47","1","16","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1784","47","1","17","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1785","47","1","18","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1786","47","1","19","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1787","47","1","20","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1788","47","1","21","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1789","47","1","22","3","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1790","47","1","23","1","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1791","47","1","24","4","In Progress","346","2012-10-23 13:25:23","346");
INSERT INTO tbl_project_review VALUES("1792","48","5","0","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1793","48","5","1","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1794","48","5","2","4","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1795","48","5","3","4","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1796","48","5","4","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1797","48","5","5","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1798","48","5","6","1","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1799","48","5","7","4","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1800","48","5","8","4","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1801","48","5","9","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1802","48","5","10","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1803","48","5","11","1","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1804","48","5","12","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1805","48","5","13","4","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1806","48","5","14","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1807","48","5","15","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1808","48","5","16","2","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1809","48","5","17","4","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1810","48","5","18","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1811","48","5","19","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1812","48","5","20","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1813","48","5","21","4","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1814","48","5","22","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1815","48","5","23","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1816","48","5","24","0","0","347","2012-10-23 13:28:24","346");
INSERT INTO tbl_project_review VALUES("1817","49","1","1","4","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1818","49","1","2","3","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1819","49","1","3","2","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1820","49","1","4","1","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1821","49","1","5","0","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1822","49","1","6","4","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1823","49","1","7","3","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1824","49","1","8","2","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1825","49","1","9","1","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1826","49","1","10","0","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1827","49","1","11","4","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1828","49","1","12","3","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1829","49","1","13","2","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1830","49","1","14","1","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1831","49","1","15","0","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1832","49","1","16","4","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1833","49","1","17","3","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1834","49","1","18","2","Completed","347","2012-11-05 05:59:20","346");
INSERT INTO tbl_project_review VALUES("1835","49","1","19","1","Completed","347","2012-11-05 05:59:21","346");
INSERT INTO tbl_project_review VALUES("1836","49","1","20","0","Completed","347","2012-11-05 05:59:21","346");
INSERT INTO tbl_project_review VALUES("1837","49","1","21","4","Completed","347","2012-11-05 05:59:21","346");
INSERT INTO tbl_project_review VALUES("1838","49","1","22","3","Completed","347","2012-11-05 05:59:21","346");
INSERT INTO tbl_project_review VALUES("1839","49","1","23","2","Completed","347","2012-11-05 05:59:21","346");
INSERT INTO tbl_project_review VALUES("1840","49","1","24","3","Completed","347","2012-11-05 05:59:21","346");
INSERT INTO tbl_project_review VALUES("1841","49","1","25","4","Completed","347","2012-11-05 05:59:21","346");
INSERT INTO tbl_project_review VALUES("1842","50","1","1","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1843","50","1","2","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1844","50","1","3","2","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1845","50","1","4","2","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1846","50","1","5","0","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1847","50","1","6","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1848","50","1","7","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1849","50","1","8","2","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1850","50","1","9","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1851","50","1","10","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1852","50","1","11","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1853","50","1","12","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1854","50","1","13","2","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1855","50","1","14","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1856","50","1","15","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1857","50","1","16","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1858","50","1","17","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1859","50","1","18","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1860","50","1","19","3","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1861","50","1","20","1","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1862","50","1","21","2","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1863","50","1","22","2","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1864","50","1","23","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1865","50","1","24","4","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1866","50","1","25","2","1","347","2012-11-10 10:44:21","346");
INSERT INTO tbl_project_review VALUES("1867","51","14","1","4","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1868","51","14","2","3","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1869","51","14","3","2","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1870","51","14","4","1","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1871","51","14","5","1","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1872","51","14","6","0","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1873","51","14","7","1","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1874","51","14","8","2","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1875","51","14","9","3","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1876","51","14","10","4","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1877","51","14","11","4","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1878","51","14","12","3","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1879","51","14","13","2","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1880","51","14","14","1","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1881","51","14","15","1","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1882","51","14","16","4","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1883","51","14","17","3","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1884","51","14","18","2","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1885","51","14","19","3","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1886","51","14","20","4","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1887","51","14","21","4","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1888","51","14","22","3","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1889","51","14","23","2","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1890","51","14","24","3","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1891","51","14","25","4","0","347","2012-11-10 10:44:22","346");
INSERT INTO tbl_project_review VALUES("1892","52","1","1","1","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1893","52","1","2","3","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1894","52","1","3","0","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1895","52","1","4","2","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1896","52","1","5","3","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1897","52","1","6","0","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1898","52","1","7","4","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1899","52","1","8","1","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1900","52","1","9","3","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1901","52","1","10","2","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1902","52","1","11","1","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1903","52","1","12","3","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1904","52","1","13","1","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1905","52","1","14","3","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1906","52","1","15","1","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1907","52","1","16","1","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1908","52","1","17","3","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1909","52","1","18","0","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1910","52","1","19","3","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1911","52","1","20","2","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1912","52","1","21","1","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1913","52","1","22","4","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1914","52","1","23","0","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1915","52","1","24","2","1","347","2012-11-11 04:42:55","346");
INSERT INTO tbl_project_review VALUES("1916","52","1","25","1","1","347","2012-11-11 04:42:55","346");





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
) ENGINE=InnoDB AUTO_INCREMENT=357 DEFAULT CHARSET=utf8;

INSERT INTO tbl_questionanswer VALUES("1","1","1","Materials or parts -edit","Does the inventory or in-process inventory include and unneeded materials or parts? edited","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("2","1","2","Machines or equipment","Are there any unused machines or other equipment around?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("3","1","3","Jigs, tools, or dies","Are there any unused jigs, tools, dies or similar items around?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("4","1","4","Visual control","Is it obvious which items have been marked as unnecessary?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("5","1","5","Written standards","Has establishing the 5Ss left behind any useless standard?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("6","1","6","Location Indicators","Are shelves and other storage areas marked with location indicators and addresses?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("7","1","7","Item Indicators","Do the shelves have signboards showing which items go where?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("8","1","8","Quantity Indicators","Are the maximum and minimum allowable quantities indicated?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("9","1","9","Demarcation of walkways and in-process inventory areas","Are white lines or other markers used to clearly indicate walkways and storage areas?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("10","1","10","Jigs and tools","Are jigs and tools arranged more rationally to facilitate picking them up and returning them?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("11","1","11","Floors","Are floors kept shiny clean and free of waste, water and oil?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("12","1","12","Machines","Are the machine wiped clean often and kept free of shavings, chips and oil?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("13","1","13","Cleaning and checking","Is equipment inspection combined with equipment maintenance?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("14","1","14","Cleaning responsibilities","Is there a person responsible for overseeing cleaning operations?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("15","1","15","Habitual cleanliness","Do operators habitually sweep floors, and wipe equipment without being told?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("16","1","16","Improvement memos","Are improvement memos regularly being generated?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("17","1","17","Improvement ideas","Are improvement ideas being acted on?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("18","1","18","Key procedures","Are standard procedures clear, documented and actively used?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("19","1","19","Improvement plan","Are the future standards being considered with a clear improvement plan for the area?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("20","1","20","The first 3 Ss","Are the first 3 Ss (sort, set locations and shine) being maintained?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("21","1","21","Training","Is everyone adequately trained in standard procedure?","346","","346");
INSERT INTO tbl_questionanswer VALUES("22","1","22","Tools and parts","Are tools and parts being stored correctly?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("23","1","23","Stock controls","Are stock controls being adhered to?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("24","1","24","Procedures","Are procedures up-to-date and regularly reviewed?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("25","1","25","Activity boards","Are activity boards up-to-date and regularly reviewed?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("26","2","1","Matriel ou pices","L\'inventaire ou l\'inventaire en cours incluent-ils des matriaux ou pices inutiles?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("27","2","2","Machine ou quipement","Y-a-t\'il des machines non utilises ou d\'autres quipementsqui trainent?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("28","2","3","Outils, Matrice ou gabarits","Y-a-t\'il des outils, matrices ou gabarits non utilises ou d\'autres quipementsqui trainent?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("29","2","4","Contrle visuel","Les objets marqus comme non ncessaires sont-ils mis en vidence?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("30","2","5","Normes rdactionnelles","La mise  jour des standards XXX rend elle les anciens standards inutiles?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("31","2","6","Indicateurs de positionnement","Les tagres et autres zones de stockages sont-ils marqus avec des indicateurs de zones et d\'adresses?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("32","2","7","Indicateurs d\' article","Les tagres ont-elles des panneaux qui indiquent l\'emplacement des objets?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("33","2","8","Indicateurs de quantit","Les quantits maximale et minimale permises sont-elles indiques?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("34","2","9","Dmarcateur des alles et des zones d\'inventaire en cours","Des lignes blanches ou d\'autres marques sont-elles clairement indiques pour les alles et les zones de stockages?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("35","2","10","Gabarits et outils","Les gabarits et outils sont-ils ranges de manire rationnelle pour faciliter leur ramassage et leur retour?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("36","2","11","Sols","Les sols sont-ils gardss propre et sans ordures, eau et huile?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("37","2","12","Machines","Les machines sont-elles nettoyes souvent et sans copeaux, poussires et huiles?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("38","2","13","Nettoyage et vrification","L\'inspection et la maintenance sont-elles faites ensemble?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("39","2","14","Responsabilits de nettoyage","Y-a-t\'il une personne responsable pour les oprations de nettoyage?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("40","2","15","Propret  habituelle","Les oprateurs brossent-ils rgulirement les sols et essuient-ils l\'quipement sans qu\'on leur demande? ","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("41","2","16","Mmos d\'amlioration","Les mmos d\'amlioration sont-ils rgulirement gnrs?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("42","2","17","Ides d\'amlioration","Les ides d\'amlioration sont-elles souvent prises en compte?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("43","2","18","Procedures Cls","Les procedures standards sont-elles claires, documentes et souvent utilises?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("44","2","19","Plan d\'amlioration","Les futures standards sont-ils considrs avec un plan d\'amlioration prcis pour la zone?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("45","2","20","Les trois premires  secondes","Les trois S (sort  trier, set locations  dfinition d\'une zone, shine  polir ) sont-ils respects?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("46","2","21","Formation","Tout le monde est-il correctement entrain pour les procdures standards?","346","","346");
INSERT INTO tbl_questionanswer VALUES("47","2","22","Outils et pices dtaches","Les outils et les pices sont-ils correctement rangs?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("48","2","23","Contrle de stock","Les contrles de stock sont-ils respects?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("49","2","24","Procdures","Les procdures sont-elles mise  jour et rgulirement inspectes?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("50","2","25","Affichage d\'activit","L\'affichage des activits est-elle mise  jour et rgulirement inspecte","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("51","3","1","Materiali o parti","L\'inventario o l\'inventario di lavorazione materiale include del materiale o delle parti non necessarie?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("52","3","2","Macchine o equipaggiamento","Sono presenti macchinari o altro equipaggiamento inutilizzati?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("53","3","3","Strutture di montaggio, attrezzi o matrici di stampa","Sono presenti strutture di montaggio, attrezzi o matrici di stampa inutilizzate in giro?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("54","3","4","Controllo visivo","E\' evidente quali oggetti sono stati identificati come non necessari?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("55","3","5","Standard scritti","L\'adozione dello standard 5S’ ha reso obsoleto ogni altro inutile standard?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("56","3","6","Indicatori di posizione","Gli scaffali e le altre aree di stoccaggio sono demarcate con indicatori di posizione e indirizzi?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("57","3","7","Indicatori Oggetto","Gli scaffali sono dotati di cartellini che mostrino dove deve andare ogni oggetto?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("58","3","8","Indicatori di Quantit","Sono indicate le quantit massime e minime consentite?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("59","3","9","Demarcazione di passatoi e di aree di inventario per materiale in lavorazione","Vengono utilizzate linee bianche o altri segni di demarcazione per indicare chiaramente passatoi e aree di stoccaggio?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("60","3","10","Strutture di montaggio e attrezzi","Strumenti e strutture di montaggio sono disposte in maniera pi razionale per facilitare il prendere e riporre tali attrezzi?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("61","3","11","Pavimenti","I pavimenti vengono mantenuti perfettamente puliti e liberi da rifiuti e olio?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("62","3","12","Macchinari","Le macchine vengono pulite spesso e liberate da residui, truciolame e olio?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("63","3","13","Pulizia e controllo","L\'ispezione dell\'equipaggiamento  combinata alla manutenzione dell\'equipaggiamento stesso?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("64","3","14","Responsabilit di pulizia","C\' una persona responsabile alla supervisione delle operazioni di pulizia?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("65","3","15","Pulizia abituale","Gli operatori puliscono con regolarit i pavimenti, e puliscono i macchinari senza che venga detto loro di farlo?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("66","3","16","Promemoria per il miglioramento","I promemoria per il miglioramento vengono realizzati con regolarit?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("67","3","17","Idee per il miglioramento","Le idee per il miglioramento vengono tenute in considerazione?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("68","3","18","Procedure chiave","Le procedure standard sono chiare, documentate e usate attivamente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("69","3","19","Miglioramento piano","Gli standard futuri vengono considerati con un chiaro piano di miglioramento per l\'area?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("70","3","20","Le prime tre S","Vengono mantenute le tre S (sort, set locations and shine, ossia organizzare, posizionare e far brillare)?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("71","3","21","Addestramento","Sono stati tutti quanti adeguatamente istruiti riguardo alla procedura standard?","346","","346");
INSERT INTO tbl_questionanswer VALUES("72","3","22","Strumenti e parti","Attrezzi e parti vengono immagazzinati correttamente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("73","3","23","Controllo Stock","Vengono rispettati i controlli di stock?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("74","3","24","Procedure","Le procedure sono aggiornate e revisionate regolarmente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("75","3","25","Tabelle attivit","Le tabelle delle attivit sono aggiornate e revisionate regolarmente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("76","4","1","Material eller delar","Innehller lagret eller lager som ni arbetar med ondiga material eller delar?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("77","4","2","Maskiner eller utrustning","r det ngra oanvnda maskiner eller andra redskap tillgngliga?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("78","4","3","Jigg, verktyg, eller stmplar","Finns det ngra oanvnda jiggs, verktyg, stmplar eller liknande artiklar omkring?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("79","4","4","Visuell kontroll","r det uppenbart vilken artikel som har mrkts som ondig?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("80","4","5","Skriftliga standarder","Har inrttandet av 5S’s lmnat kvar ngra vrdelsa standarder?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("81","4","6","Platsvisare","r hyllor och andra lagringsutrymmen markerade med plats- och adressvisare?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("82","4","7","Sakmtare","Har hyllorna skyltar som visar vart artiklarna skall vara?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("83","4","8","Kvantitetsrknare","Finns det minimalt och maximalt artiklar angivet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("84","4","9","Avgrnsning av gngbanor och omrden under inventering","r vita linjer eller andra markrer i anvndning fr att visa gngbanor och lagringsutrymmen?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("85","4","10","Jigg och verktyg","r jiggs och verktyg arrangerade mer rationellt fr att plocka upp och returnera dem?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("86","4","11","Golv","r golv skinande rena och fria frn avfall, vatten och olja?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("87","4","12","Maskiner","r maskinerna rengjorda regelbundet och fria frn spn, flis och olja?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("88","4","13","Rengring och kontroll","r verktygsinspektion kombinerat med verktygsunderhll?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("89","4","14","Ansvar fr rengring","Finns det en person som ansvarar fr rengringsoperationer?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("90","4","15","Livsmiljrengring","Rengr operatrer golv och maskiner utan att bli tillsagda?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("91","4","16","FrbttringsPMs","Kommer det regelbundet frbttrings PMs?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("92","4","17","Frbttringsider","r frbttringsider diskuterade?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("93","4","18","Huvudrutiner","r standard procedurer frstdda, dokumenterade och aktivt i anvndning?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("94","4","19","Frbttringsplan","Finns det framtida standarder tillgngliga med en klar frbttringsplan fr omrdet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("95","4","20","De frsta 3 S:ena","r de 3:sen(sort=sortering, set locations=placering och shine= skinande rent) upprtthllna?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("96","4","21","Trning","r alla utbildade tillrckligt i standard procedurer?","346","","346");
INSERT INTO tbl_questionanswer VALUES("97","4","22","Verktyg och delar","r verktyg och delar lagrade p rtt stt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("98","4","23","Frrdskontroll","Fljs lagerkontroller?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("99","4","24","Tillvgagngsstt","r procedurer nydaterade och regelbundet granskade?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("100","4","25","Aktivitetsstyrelser","r aktivitetsstyrelser nydaterade och regelbundet granskade?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("101","5","1","Materialer eller dele","Inkluderer inventaret eller lagerinventaret undvendige materiale eller dele?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("102","5","2","Maskiner eller udstyr","Er der nogle ubrugte maskiner eller anden udstyr tilgngelig?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("103","5","3","Skabeloner, Vrktjer og Gevindskrerer","Er der nogle ubrugte skabeloner, vrktjer, gevindskrerer eller lignende ting tilgngelige?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("104","5","4","Visuel Kontrol","Er det indlysende, hvilke ting der er markeret som ubrugelige?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("105","5","5","Skriftlige stanarder","Har etableringen af  5S’s efterladt en ubrugelig standard?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("106","5","6","Lokation indikator","Er der hylder og anden opbevaringsomrder markeret med lokations indikatorer og adresser?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("107","5","7","Ting indikator","Har hylderne symboltavler der indikerer hvilke ting passer hvor?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("108","5","8","Kvantitets indikatorer","Er der et maksimum og minimum tilladt kvantitet indikeret?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("109","5","9","Afgrnsning af gangomrder og vareindleverings omrder","Er hvide linjer og andre mrkater brugt til klart at indikere gangomrder og lageromrder?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("110","5","10","Skabeloner og vrktjer","Er skabeloner og vrktjer arrangeret rationelt i forhold til faciliteringen af afhentning og returnering af dem?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("111","5","11","Gulv","Er gulv holdt skindende rene og fri for skidt, vand og olie?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("112","5","12","Maskiner eller udstyr","Er maskinen holdt ren for spner, flis og olie ofte?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("113","5","13","Rengring og undersgelse","Er udstyrs inspektion kombineret med udstyrsvedligeholdelse?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("114","5","14","Rengringsansvar","Er der en person med ansvar for tilsyn med rengringsopgaver?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("115","5","15","Vanlig rengring","Gr behandlere gulvet rent og pudser udstyret uden at blive bedt om det?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("116","5","16","Forbedring memoer","Bliver et forbedrelsespapir udarbejdet ofte?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("117","5","17","Forbedring ideer","Bliver forbedringsideer prvet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("118","5","18","Ngleprocedurer","Er standard procedurer klare, dokumenteret og brugt hyppigt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("119","5","19","Forbedringsplan","Bliver fremtidige standarder overvejet med en klar forbedringsplan for omrdet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("120","5","20","De frste 3 S\'er","Er de frste tre S\'er (sorter, st omrder, skindende) vedligeholdt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("121","5","21","Trning","Er alle tilfredsstillende trnet i standard procedurer?","346","","346");
INSERT INTO tbl_questionanswer VALUES("122","5","22","Vrktjer og dele","Bliver vrktjer opbevaret korrekt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("123","5","23","Lagerkontrol","Bliver lagerkontrollerne efterfulgt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("124","5","24","Procedurer","Er procedurerne nutidige og genovervejet ofte?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("125","5","25","Aktivitets tavle","Er aktivitetstavlen nutidige og ofte genovervejet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("126","6","1","Material oder Teile","Der Warenbestandoder im Einsatz befindliche Gertschaften schlieen nicht bentigte Materialien oder Teile33 ein? ","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("127","6","2","Maschienen oder Zubehr","Sind dort irgendwelche nicht bentigten Maschinen oder Materialien im Einsatz?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("128","6","3","Bohrvorrichtungen, Werkzeuge, oder Andere","Sind dort unbentzte Bohrvorrichtungen, Werkzeuge, oder hnliche Materialien im Einsatz?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("129","6","4","Visuelle Kontrolle","Ist es offensichtlich welche Materialien als unntig gekennzeichnet sind?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("130","6","5","Schriftliche Normen","Bleibt beim erstellen des 5S’ irgend ein Standart zurck?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("131","6","6","Positionsbestimmung","Wurden Bereiche und Lagerorte mit Positionshinweisen und Adressen gekennzeichnet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("132","6","7","Materialkennzeichnung","Wurden die Regale entsprechend mit Versandhinweisen gekennzeichnet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("133","6","8","Mengenindikatoren","Sind die maximalen und minimalen zulssigen Mengen angezeigt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("134","6","9","Abgrenzung vonprozessbegintem \"In Betrieb\" und \"Warenbestand\"","Wurden Linien oder andere Kemnnzeichnungen  verwendet, um Laufwegen und Lagerorte anzuzeigen?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("135","6","10","Bohrvorrichtungen und Werkzeuge","Wurden Bohrvorrichtungen und Werkzeuge ordnungsgem eingeordnet, um die Annahme und das Zurckbringen zu erleichtern?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("136","6","11","Bden","Sind die Bden sauber, frei von Schmutz, Wasser und l?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("137","6","12","Maschinen","Wurden die Maschinen gesubert und sind diese frei von Materialspnne und l?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("138","6","13","Reiningen und testen","Wrde die Kontrolle mit einer Wartung verbuden?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("139","6","14","Reinigungsanforderung","Gibt es eine Person, die dafr verantwortlich ist, Reinigungsvorgnge zu beaufsichtigen?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("140","6","15","Gewhnlicher Reiningungszustand","Reinigen die Maschinenfhrer eigenverantwortlich und ohne Aufforderung die Machinen und Bden?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("141","6","16","Protokolle","Werden regelmig Verbessungsvorschlge unterbreitet?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("142","6","17","Ideen","Folgen Verbesserungsvorschlge?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("143","6","18","Wichtige Verfahren","Sind Standardverfahren verstndlich, dokumentiert und werden diese angewandt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("144","6","19","Plne","Fanden Verbesserungsvorschlge fr zuknftige Standards in dessen Gebiet beachtung?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("145","6","20","Die ersten 3 Sekunden","Wurden die 3s eingehalten?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("146","6","21","Training","Wurde jeder ordnungsgem in die Standartverfahren eingewiesen?","346","","346");
INSERT INTO tbl_questionanswer VALUES("147","6","22","Werkzeuge und Teile","Wurden Werkzeuge und Teile ordnungsgem eingelagert?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("148","6","23","Warenbestandskontrolle","Wurden Lagerkontrollen eingehalten?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("149","6","24","Abwicklung","Sind die Verfahren aktuell und ordnungsgem kontrolliert?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("150","6","25","Aufgaben, Ttigkeiten","Sind die Lauflisten aktuell und ordnungsgem kontrolliert?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("151","7","1","Materiais ou peas","O inventrio ou o inventrio em progresso inclui os materiais ou peas desnecessrias?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("152","7","2","Mquinas ou equipamentos","H algumas mquinas ou outros equipamentos desnecessrios por a?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("153","7","3","Utenslios, ferramentas ou matrizes","H alguns utenslios, ferramentas, matrizes ou itens similares desnecessrios por ai?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("154","7","4","Controlo Visual"," obvio qual o objeto que foi definido como desnecessrio?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("155","7","5","Normas escritas","Estabeleceu que o 5S’s deixou para trs algum padro desnecessrio?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("156","7","6","Indicadores de localizao","As prateleiras e outros locais de armazenamento esto marcados com indicadores de localizao e moradas?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("157","7","7","Indicadores de Item","As prateleiras tm placas com a indicao de que item contm?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("158","7","8","Indicadores de Quantidade","As quantidades mximas e mnimas permitidas esto indicadas?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("159","7","9","Demarcao de caminhos e reas em processo de inventrio","H linhas brancas ou outras marcas a serem usadas para indicar claramente o caminho e as reas de armazenamento?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("160","7","10","Utenslios e ferramentas","Os utenslios e as ferramentas esto organizados de forma racional para facilitar a sua recolha e devoluo?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("161","7","11","Chos","O cho  mantido limpo e livre de lixo, gua e leo?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("162","7","12","Mquinas","As mquinas so limpas com frequncia e mantidas sem aparas, impurezas e leo?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("163","7","13","Limpando e verificando","A inspeo de equipamentos  combinada com a manuteno dos equipamentos?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("164","7","14","Responsabilidades de limpeza","H uma pessoa responsvel por supervisionar as operaes de limpeza?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("165","7","15","Limpeza habitual","Os operadores costumam limpar o cho e os equipamentos sem ser necessrio dar-lhes ordens nesse sentido?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("166","7","16","Memorandos de melhoras","Os memorandos de melhorias esto a ser feitos com regularidade?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("167","7","17","Ideias de melhorias","As ideias de melhorias esto a ser postas em prtica?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("168","7","18","Procedimentos principais","As normas de procedimentos so claras, documentadas e utilizadas ativamente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("169","7","19","Plano de melhoria","As futuras normas esto a ser consideradas com um plano bvio de melhoria para a rea?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("170","7","20","Os primeiros 3 Ss","Os primeiros 3 Ss (sort, set locations e shine  ordenar, definir o local e brilhar) esto a ser mantidos?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("171","7","21","Treino","Todas as pessoas tm a devida formao dos standards de procedimentos?","346","","346");
INSERT INTO tbl_questionanswer VALUES("172","7","22","Ferramentas e peas","As ferramentas e as peas esto a ser devidamente armazenadas?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("173","7","23","Controlo de stocks","Os controlos de stock tambm esto a ser cumpridos?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("174","7","24","Procedimentos","Os procedimentos esto atualizados e so revistos regularmente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("175","7","25","Quadros de atividades ","Os quadros de atividades esto atualizados e so revistos\n regularmente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("176","8","1","Materiales o piezas","Incluye el inventario vigente o en proceso algn material o parte innecesaria?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("177","8","2","Mquinas o equipos","Existe alguna mquina u otro equipo sin utilizar alrededor?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("178","8","3","Plantillas, herramientas o moldes","Existe alguna plantilla, herramienta, molde o artculo similar sin utilizar alrededor?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("179","8","4","Control visual","Es evidente cules artculos han sido marcados como innecesarios?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("180","8","5","Normas escritas","Ha dejado el establecimiento de 5S’s alguna norma inefectiva?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("181","8","6","Indicadores de lugar","Estn marcados los estantes y otras reas de almacenamiento con indicadores de lugar y direccin?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("182","8","7","Indicadores de artculos","Tienen los estantes algn letrero mostrando cules artculos van dnde?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("183","8","8","Indicadores de cantidad","Estn indicadas las cantidades mximas y mnimas admisibles?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("184","8","9","Demarcacin de pasillos y reas de inventarios en proceso","Se han utilizado lneas blancas u otros marcadores para indicar claramente los pasillos y reas de almacenamiento?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("185","8","10","Plantillas y herramientas","Estn las plantillas y herramientas dispuestas de forma ms racional para facilitar su recogida y devolucin?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("186","8","11","Pisos","Se mantienen los pisos completamente limpios y libres de residuos, agua y aceite?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("187","8","12","Mquinas","Es limpiada la mquina con frecuencia y mantenida libre de virutas, astillas y aceite?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("188","8","13","Limpieza y verificacin","Se combina la inspeccin de los equipos con el mantenimiento de los mismos?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("189","8","14","Responsabilidades de limpieza","Existe una persona responsable de supervisar las operaciones de limpieza?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("190","8","15","Limpieza habitual","Barren los operadores habitualmente los pisos y limpian los equipos sin que se les diga?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("191","8","16","Notas de mejoramiento","Se generan regularmente las notas de mejoramiento?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("192","8","17","Ideas de mejoramiento","Son llevadas a efecto las ideas de mejoramiento?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("193","8","18","Procedimientos clave","Son los procedimientos estndar claros, documentados y utilizados activamente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("194","8","19","Plan de mejoramiento","Estn siendo consideradas las futuras normas con un plan de mejoramiento claro para el rea?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("195","8","20","Las primeras 3 Ss","Estn siendo mantenidas las primeras 3 Ss (ordenar, establecer ubicaciones y hacer brillar)?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("196","8","21","Capacitacin","Estn todos adecuadamente capacitados en el procedimiento estndar?","346","","346");
INSERT INTO tbl_questionanswer VALUES("197","8","22","Herramientas y partes","Las herramientas y piezas se almacenan correctamente?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("198","8","23","Controles de exist\nencias","Se han observado los controles de las existencias?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("199","8","24","Procedimientos","Estn los procedimientos actualizados y con revisin peridica?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("200","8","25","Tablas de actividad","Estn las tablas de actividad actualizadas y con revisin peridica?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("201","9","1","Материалы или части","Есть ли запас или в процессе инвентаризации включают в себя и ненужных материалов или их частей?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("202","9","2","Машины и оборудование","Есть ли неиспользованные машин или другого оборудования, вокруг?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("203","9","3","Джиги, инструменты и штампы","Есть ли неиспользованные приспособлений, инструментов, штампов или аналогичные предметы вокруг?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("204","9","4","Визуальный контроль","Является очевидным, какие элементы были отмечены как ненужное?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("205","9","5","Письменные стандарты","С установлении 5SA € ™ с любого оставил бесполезные стандарт?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("206","9","6","Расположение индикаторов","Полки и другие складские помещения, отмеченные расположение индикаторов и адреса?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("207","9","7","Пункт показатели","У полках вывески, показывающие, какие элементы Куда?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("208","9","8","Количественные показатели","Максимальное и минимальное допустимое количество указано?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("209","9","9","Демаркация проходы и в процессе инвентаризации областях","Белые линии или другие маркеры используются для ясно показывают, тротуаров и мест хранения?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("210","9","10","Приспособления и инструменты","Ли и приспособления расположены более рационально для облегчения их собирать и возвращать их?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("211","9","11","Этажи","Готовы этажей держали блестящие чистыми и свободными от отходов, воды и масла?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("212","9","12","машины","Являются ли машина протирать часто и быть свободным от стружки, щепы и нефти?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("213","9","13","Очистка и проверка","Является ли проверка оборудования сочетании с оборудованием обслуживания?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("214","9","14","Очистка обязанностей","Есть ли лицо, ответственное за контроль операций по очистке?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("215","9","15","Привычные чистоты","У операторов обычно подметать полы и протрите оборудование без слов?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("216","9","16","Улучшение заметки","Являются совершенствование заметки регулярно генерируется?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("217","9","17","Улучшение идеи","Являются улучшение идеи, действовали на?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("218","9","18","Основные процедуры","Существуют стандартные процедуры ясно, документированный и активно используется?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("219","9","19","Улучшение плана","Это будущие стандарты рассматриваются с четким планом улучшения для области?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("220","9","20","Первые 3 Ss","Первые 3 SS (сортировка, множество локаций и блеск) поддерживается?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("221","9","21","обучение","Является ли все должным образом подготовлены в стандартной процедурой?","346","","346");
INSERT INTO tbl_questionanswer VALUES("222","9","22","Инструменты и запчасти","Существуют приборы и комплектующие хранится правильно?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("223","9","23","со контроля","Ли фондовый управления соблюдались?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("224","9","24","Процедуры","Существуют ли процедуры, до современных и регулярно пересматриваться?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("225","9","25","Деятельность платы","Есть деятельностью платы до современных и регулярно пересматриваться?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("226","10","1","材料或零件","庫存或在製品庫存是否包括和不必要的材料或零部件？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("227","10","2","機器或設備","是否有任何未使用的機器或其他周邊設備嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("228","10","3","夾具，工具或模具","是否有任何未使用的夾具，工具，模具或周圍類似的項目嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("229","10","4","可視化控制","這是明顯的項目已被標記為不必要的？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("230","10","5","書面標準","建立5SA€™的留下任何無用的標準嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("231","10","6","位置指示燈","標記的貨架上和其他存儲區的位置指標和地址嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("232","10","7","項目指標","做的貨架，招牌顯示哪些項目去哪裡？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("233","10","8","數量指標","的最大和最小允許數量是否表示嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("234","10","9","人行道和在製品庫存區的劃界","白線或其他標記，清楚地表明人行道和存儲領域嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("235","10","10","夾具和工具","夾具和工具是否安排更合理，以方便採摘起來，並把他們送回？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("236","10","11","地板","地板保持光澤的清潔，廢物，水和油？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("237","10","12","機","是機器擦拭乾淨，經常保持無屑，薯片和油嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("238","10","13","清潔和檢查","設備設備的維護與檢查相結合？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("239","10","14","清潔工作","有一個人負責監督清潔操作？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("240","10","15","習慣性的清潔","，操作員習慣性地打掃地板，擦拭設備，沒有人告訴你嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("241","10","16","改善備忘錄","定期改善備忘錄產生的呢？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("242","10","17","改進思路","改進的思路是否採取行動？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("243","10","18","關鍵程序","標準程序是明確的，成文的和積極地使用？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("244","10","19","改進計劃","被認為是未來的標準，該地區有明顯的改善計劃？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("245","10","20","第3條SS","第3 SS（排序，設置位置和光澤）維護呢？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("246","10","21","訓練","大家充分的培訓標準的過程中嗎？","346","","346");
INSERT INTO tbl_questionanswer VALUES("247","10","22","工具及零件","正確存放的工具和零件嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("248","10","23","庫存控制","存貨控制是否得到遵守？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("249","10","24","程序","程序到日期，並定期檢討嗎？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("250","10","25","活動板","最新活動板，並定期檢討呢？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("251","11","1","Υλικά ή εξαρτήματα","Μήπως το απόθεμα ή το απόθεμα σε επεξεργασία περιλαμβάνει και άχρηστα υλικά ή εξαρτήματα;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("252","11","2","Μηχανήματα ή εξοπλισμός","Υπάρχουν αχρησιμοποίητα μηχανήματα ή άλλος εξοπλισμός γύρω εκεί;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("253","11","3","Σφιγκτήρες, εργαλεία ή καλούπια","Υπάρχουν αχρησιμοποίητοι σφιγκτήρες, καλούπια ή παρόμοια αντικείμενα γύρω εκεί;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("254","11","4","Οπτικός έλεγχος","Είναι ξεκάθαρο ποια αντικείμενα έχουν επισημανθεί ως περιττά;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("255","11","5","Γραπτά πρότυπα","Το εδραιωμένο 5Sâ€™s έχει αφήσει πίσω κάθε άχρηστο πρότυπο;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("256","11","6","Δείκτες τοποθεσίας","Τα ράφια και τα άλλα σημεία αποθήκευσης έχουν επισημανθεί με δείκτες τοποθεσίας και διευθύνσεις;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("257","11","7","Δείτες αντικειμένου","Τα ράφια έχουν πινακίδες που να δείχνουν ποια αντικείμενα πάνε που;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("258","11","8","Δείκτες ποσότητας","Αναφέρονται οι μέγιστες και οι ελάχιστες επιτρεπόμενες ποσότητες;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("259","11","9","Οριοθέτηση των διαδρόμων και των περιοχών της επεξεργασίας των υλικών","Υπάρχουν λευκές γραμμές και  άλλοι δείκτες που να δείχνουν με σαφήνεια τους διαδρόμους και τους χώρους αποθήκευσης;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("260","11","10","Σφιγκτήρες και εργαλεία","Οι σφιγκτήρες και τα εργαλεία είναι τοποθετημένα πιο ορθολογικά για να διευκολύνουν το να τα πάρει κάποιος και να τα επιστρέψει;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("261","11","11","Δάπεδα","Τα δάπεδα διατηρούνται αστραφτερά καθαρά χωρίς σκουπίδια, νερό και λάδια;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("262","11","12","Μηχανήματα","Τα μηχανήματα καθαρίζονται συχνά και διατηρούνται χωρίς σκουπίδια, ρινίσματα και λάδια;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("263","11","13","Καθαρισμός και έλεγχος","Η επιθεώρηση του εξοπλισμού συνδυάζεται με την συντήρηση του εξοπλισμού;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("264","11","14","Αρμοδιότητες καθαρισμού","Υπάρχει πρόσωπο που είναι υπεύθυνο για την εποπτεία των εργασιών καθαρισμού;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("265","11","15","Συνήθης καθαριότητα","Οι υπεύθυνοι σκουπίζουν συχνά τα δάπεδα και καθαρίζουν τον εξοπλισμό χωρίς να τους το πει κάποιος;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("266","11","16","Υπομνήματα για βελτίωση","Δημιουργούνται συχνά υπομνήματα βελτίωσης;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("267","11","17","Ιδέες για βελτίωση","Οι ιδέες βελτίωσης εφαρμόζονται;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("268","11","18","Διαδικασίες κλειδί","Οι τυποποιημένες διαδικασίες είναι ξεκάθαρες, καταγεγραμμένες και χρησιμοποιούνται ενεργά;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("269","11","19","Πλάνο βελτίωσης","Τα μελλοντικά πρότυπα που εξετάζονται συνοδεύονται από ένα ξεκάθαρο πλάνο βελτίωσης της περιοχής;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("270","11","20","Τα πρώτα 3 Ss","Τα πρώτα τρία Ss (ταξινόμηση, ορισμός τοποθεσίας και λάμψη) διατηρούνται;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("271","11","21","Εκπαίδευση","Είναι όλοι κατάλληλα εκπαιδευμένοι για τις τυποποιημένες διαδικασίες;","346","","346");
INSERT INTO tbl_questionanswer VALUES("272","11","22","Εργαλεία και εξαρτήματα","Τα εργαλεία και τα εξαρτήματα αποθηκεύονται σωστά;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("273","11","23","Έλεγχοι του αποθέματος","Τηρούνται στοιχεία ελέγχου των αποθεμάτων;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("274","11","24","Διαδικασίες ","Οι διαδικασίες είναι εκσυχρονισμένες και αξιολογούνται τακτικά;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("275","11","25","Πίνακες δραστηριότητας","Οι πίνακες δραστηριότητας είναι ενήμερωμένοι και αξιολογούνται τακτικά;","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("276","12","1","具材か部品","インベントリまたはインプロセスインベントリが不要な材料や部品が含まれていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("277","12","2","機械か装備","そこに使用されていない機械や他の装備は周辺にありますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("278","12","3","冶具、道具か型","そこに使用されていない冶具、道具か型は周辺にありますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("279","12","4","視覚制御","不必要としてマークされているアイテムは明らかですか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("280","12","5","規格書","5S™sを確立する事によって無駄な標準は解消できましたか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("281","12","6","位置表示","棚や他は位置表示と住所マーク付けされてますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("282","12","7","項目インジケータ","棚にはアイテムの行き先が指定するものがありますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("283","12","8","品質指標","最大値と最小値の許容量が示されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("284","12","9","歩道やプロセス中インベントリ領域の境界","歩道や保存エリアは白い線や他のマーカーで示されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("285","12","10","冶具や道具","治工具やそれらを拾って返しやすい配置に置いていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("286","12","11","フロア","床は汚れ、水やオイルの無い清潔を保ってますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("287","12","12","機械","削り、チップやオイルを機械から拭き取っていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("288","12","13","清掃と点検","設備点検と機器のメンテナンス葉同時に行われていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("289","12","14","清掃責任","洗浄操作を監督する責任者はいますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("290","12","15","常習的な清浄度","オペレータは言われずに習慣的に機器を拭きますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("291","12","16","改善メモ","改善メモは定期的に生成されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("292","12","17","改善アイディア","改善のアイデアは作用されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("293","12","18","主要な手順","標準的な手順は、明確な文書化と積極的に使われていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("294","12","19","改善プラン","将来の規格は明確な改善計画で検討されている？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("295","12","20","最初のS三つ","最初のS三つ（ソート、セット・ロケーション、シャイン）は維持されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("296","12","21","訓練","誰もが十分に標準的な手順の訓練を受けていますか？","346","","346");
INSERT INTO tbl_questionanswer VALUES("297","12","22","工具や部品","ツールや部品は正しく保存されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("298","12","23","ストックコントロール","ストックコントロールがに付着されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("299","12","24","手続き","手順は、最新かつ定期的に見直していますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("300","12","25","アクティビティボード","アクティビティボードは、最新かつ定期的に見直していますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("301","13","1","Materialen of onderdelen","Bevat de voorraad of de in behandeling zijnde voorraad onnodige materialen of onderdelen?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("302","13","2","Machines of gereedschap","Is er sprake van niet gebruikte machines of andere uitrusting?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("303","13","3","Sjablonen, gereedschap of stempels","Is er sprake van niet-gebruikte sjablonen, gereedschap of stempels?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("304","13","4","Visuele controle","Is het duidelijk welke items zijn aangeduid als onnodig?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("305","13","5","Beschreven standaarden","Heeft het vaststellen van de ??? onbruikbare standaarden aangetoond?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("306","13","6","Plaats-aanduiders","Zijn schappen en andere bergings-ruimten gemarkeerd met plaats-aanduiders en adressen?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("307","13","7","Item-aanduiders","Hebben de schappen aanduidings-borden die aangeven welke items waar naartoe gaan?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("308","13","8","Hoeveelheid-aanwijzers"," Zijn de maximum en minimum toelaatbare hoeveelheden aangegeven?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("309","13","9","Afscheiding van looppaden en in behandeling zijnde inventaris-gebieden","Zijn er witte lijnen of andere aanduidingen gebruikt die duidelijk de looppaden en de bergingsruimten aangeven?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("310","13","10","Sjablonen en gereedschap","Zijn sjablonen, gereedschap en stempels functioneel geordend om het oppakken en terugplaatsen te ","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("311","13","11","Verdiepingen","Worden de vloeren blinkend schoon en vrij van afval, water en olie gehouden?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("312","13","12","Machines","Worden de machines dikwijls schoongemaakt en vrij gehouden van slijpsel, snippers en olie?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("313","13","13","Schoonmaak en controle","Wordt de inspectie van de apparatuur gecombineerd met het ondferhoud ervan?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("314","13","14","Schoonmaak-verantwoordelijkheden","Is er iemand verantwoordelijk gesteld om toezicht te houden op de schoonmaak-werkzaamheden?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("315","13","15","Gebruikelijke zuiverheid","Maken de operators wel de vloer en de apparatuur schoon zonder dat het hen opgedragen is?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("316","13","16","Memo’s ter verbetering","Worden er regelmatig memo’s ter verbetering opgemaakt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("317","13","17","Ideeën voor verbeteringen","Wordt er actie ondernomen op ideeën ter verbetering?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("318","13","18","Sleutel-procedures","Zijn de standaard procedures duidelijk en omschreven en worden ze actief gebruikt?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("319","13","19","Plan ter verbetering","Worden de toekomstige standaarden in overweging genomen met een duidelijk verbeterings-plan voor het ","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("320","13","20","De eerste drie S’en","Worden de eerste drie S’en (sort-orden, set location-locatie instellen en shine-blinkend schoon) gehandhaafd?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("321","13","21","Training","Is iedereen voldoende getraind in de standaard procedures?","346","","346");
INSERT INTO tbl_questionanswer VALUES("322","13","22","Gereedschap en onderdelen","Worden gereedschap en onderdelen op de juiste wijze opgeborgen?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("323","13","23","Voorraad-controles","Wordt er vastgehouden aan voorraad-controles?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("324","13","24","Procedures","Zijn de procedures up-to-date en worden ze regelmatig herzien?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("325","13","25","Activiteiten-commissies","Zijn de activiteiten-commissie up-to-date en worden ze regelmatig herzien?","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("326","14","1","具材か部品","インベントリまたはインプロセスインベントリが不要な材料や部品が含まれていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("327","14","2","機械か装備","そこに使用されていない機械や他の装備は周辺にありますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("328","14","3","冶具、道具か型","そこに使用されていない冶具、道具か型は周辺にありますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("329","14","4","視覚制御","不必要としてマークされているアイテムは明らかですか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("330","14","5","規格書","5S™sを確立する事によって無駄な標準は解消できましたか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("331","14","6","位置表示","棚や他は位置表示と住所マーク付けされてますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("332","14","7","項目インジケータ","棚にはアイテムの行き先が指定するものがありますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("333","14","8","品質指標","最大値と最小値の許容量が示されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("334","14","9","歩道やプロセス中インベントリ領域の境界","歩道や保存エリアは白い線や他のマーカーで示されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("335","14","10","冶具や道具","治工具やそれらを拾って返しやすい配置に置いていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("336","14","11","フロア","床は汚れ、水やオイルの無い清潔を保ってますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("337","14","12","機械","削り、チップやオイルを機械から拭き取っていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("338","14","13","清掃と点検","設備点検と機器のメンテナンス葉同時に行われていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("339","14","14","清掃責任","洗浄操作を監督する責任者はいますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("340","14","15","常習的な清浄度","オペレータは言われずに習慣的に機器を拭きますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("341","14","16","改善メモ","改善メモは定期的に生成されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("342","14","17","改善アイディア","改善のアイデアは作用されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("343","14","18","主要な手順","標準的な手順は、明確な文書化と積極的に使われていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("344","14","19","改善プラン","将来の規格は明確な改善計画で検討されている？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("345","14","20","最初のS三つ","最初のS三つ（ソート、セット・ロケーション、シャイン）は維持されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("346","14","21","訓練","誰もが十分に標準的な手順の訓練を受けていますか？","346","","346");
INSERT INTO tbl_questionanswer VALUES("347","14","22","工具や部品","ツールや部品は正しく保存されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("348","14","23","ストックコントロール","ストックコントロールがに付着されていますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("349","14","24","手続き","手順は、最新かつ定期的に見直していますか？","346","2012-10-20 08:57:25","346");
INSERT INTO tbl_questionanswer VALUES("350","14","25","アクティビティボード","アクティビティボードは、最新かつ定期的に見直していますか？","346","2012-10-20 08:57:25","346");





CREATE TABLE `tbl_questionnair` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT '1970-01-05 00:00:00',
  `status` int(11) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

INSERT INTO tbl_questionnair VALUES("1","5s audit - english","346","9","346","2012-10-20 13:09:32","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("2","5s audit - french","346","4","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("3","5s audit - italy","346","7","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("4","5s audit - swedish","346","14","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("5","5s audit - danish","346","2","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("6","5s audit - german","346","5","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("7","5s audit - portugal","346","11","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("8","5s audit - spanish","346","13","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("9","5s audit - russsian","346","12","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("10","5s audit - chinese","346","1","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("11","5s audit - greek","346","6","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("12","5s audit - japanese","346","8","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("13","5s audit - dutch","346","3","346","1970-01-05 00:00:00","1","2012-10-20 08:58:27");
INSERT INTO tbl_questionnair VALUES("14","TempQuestionnair","346","8","346","1970-01-05 00:00:00","0","2012-10-20 11:04:36");





CREATE TABLE `tbl_settings` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `superadminid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO tbl_settings VALUES("1","default_language","9","346","346");
INSERT INTO tbl_settings VALUES("2","default_language_question","9","346","346");
INSERT INTO tbl_settings VALUES("3","default_language","9","346","347");
INSERT INTO tbl_settings VALUES("4","default_language_question","9","346","347");
INSERT INTO tbl_settings VALUES("5","chart_default","2,5,6","346","347");
INSERT INTO tbl_settings VALUES("6","chart_default","1,5,6","346","346");



