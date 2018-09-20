<?php
include("dbconnect.php"); 
       $suid=$_REQUEST["superadminid"];
       $uid=$_REQUEST["uid"];
       $pid=$_REQUEST["pid"];
       $tid=$_REQUEST["tid"];
       $tname=$_REQUEST["tname"];
       $did=$_REQUEST["did"];
       $dname=$_REQUEST["dname"];
       $qid=$_REQUEST["qid"];
       $title=$_REQUEST["title"];
       $dt=$_REQUEST["pdate"];
       $acname=$_REQUEST["acname"];
       $aclogo=$_REQUEST["aclogo"];
       $ccname=$_REQUEST["ccname"];
       $cclogo=$_REQUEST["cclogo"];
       $ttype=$_REQUEST["ttype"];
       $timestamp=$_REQUEST["timestamp"];
       $status=$_REQUEST["status"];
       $status_progress=$_REQUEST["status_progress"];
       $notes=$_REQUEST["notes"];
       $auditedby=$_REQUEST["auditedby"];
       $tstamp=$_REQUEST["tstamp"];
	   $title = $_REQUEST['title'];
     
  $sql_query= "select * from tbl_login_relation where uid = '$suid' and dbname like '%_5sdb%'";   
   $rs=mysql_query($sql_query) or die(mysql_error());
   $no = mysql_num_rows($rs);

   while($row=mysql_fetch_array($rs))
   {
   	$dbname= $row['dbname'];
   }
   
   
			$sql=mysql_connect("localhost","root","Bigyear2012") or die('Could not connect: ' . mysql_error());
			$db_selected =	mysql_select_db($dbname,$sql) or die ('Can\'t use foo : ' . mysql_error()) ;
   if($pid!=0)
   {
       $query="UPDATE `tbl_project` SET 
	   `tempid`='$tid',
	   `tempname`='$tname',
	   `deptid`='$did',
	   `deptname`='$dname',
	   `qid`='$qid',
	 `title`='$title',
				  `pdate`='$dt',
				  `auditorcname`='$acname',
				  `auditorclogo`='$aclogo',
				  `clientcname`='$ccname',
				  `clientclogo`='$cclogo',
				  `temptype`='$ttype',
				  `uid`='$uid',
				  `superadminid`='$suid',
				  `status`='$status',
				  `status_progress`='$status_progress',
				  `notes`='$notes',
				  `auditedby`='$auditedby',
				  `sync_status`='1',
				  `tstamp` = '$tstamp' where pid='$pid' ";  
   }
   else
   {
   $utf = "set names 'utf8'";
mysql_query($utf);
   
       $query="INSERT INTO `tbl_project`(`pid`,`tempid`,`tempname`,`deptid`,`deptname`,`qid`,`title`,`pdate`,
       `auditorcname` ,`auditorclogo` ,`clientcname` ,`clientclogo` ,`temptype` ,`uid` ,`superadminid`,`timestamp`,
       `status`,`status_progress`,`notes`,`auditedby`,`sync_status`,`tstamp`)
	   VALUES ('',
	   '$tid',
	   '$tname',
	   '$did',
	   '$dname',
	   '$qid',
	    '$title',
		'$dt',
		'$acname',
		'$aclogo',
		'$ccname',
		'$cclogo',
		'$ttype',
	   '$uid',
	   '$suid',
	   '$timestamp',
	   '$status',
	   '$status_progress',
	   '$notes',
	   '$auditedby',
	   '0',
	   '$tstamp')";
   } 
   $res=mysql_query($query) or die(mysql_error());
   $logs=array('project_id'=>mysql_insert_id()); 
 echo json_encode($logs);				                  
?>