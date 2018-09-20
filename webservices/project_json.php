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
       $timestamp=@$_REQUEST["timestamp"];
       $status=$_REQUEST["status"];
       $status_progress=$_REQUEST["status_progress"];
       $notes=$_REQUEST["notes"];
       $auditedby=$_REQUEST["auditedby"];
       $tstamp=@$_REQUEST["tstamp"];
	   $title = $_REQUEST['title'];
     
  $sql_query= "select * from tbl_login_relation where uid = '$suid' and dbname like '%_5sdb%'";   
   $rs=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
   $no = mysqli_num_rows($rs);

   while($row=mysqli_fetch_array($rs))
   {
   	$dbname= $row['dbname'];
   }
   
   
			$sql=mysqli_connect("localhost","root","",$dbname);
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
mysqli_query($sql,$utf);
   
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
   $res=mysqli_query($sql,$query) or die(mysqli_error($sql));
   $logs=array('project_id'=>mysqli_insert_id($sql)); 
 echo json_encode($logs);				                  
?>