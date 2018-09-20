<?php
session_start();
include("dbconnect.php"); 

   $sid=100;
   
   $sql_query= "select * from tbl_login where uid = '$sid'";
   $rs=mysqli_query($sql,$sql_query);
   while($row=mysqli_fetch_array($rs))
   {
   	$dbname= $row['dbname'];
   }

mysqli_close($sql) or die(mysqli_error($sql));

if(isset($dbname))
{
	
			$sql=mysqli_connect("localhost","root","");
				if (!$sql)
 		 {
  			die('Could not connect: ' );
 		 }
		$db_selected =	mysqli_select_db($sql,$dbname);
		if (!$db_selected) {
  	  die ('Can\'t use foo : ' . mysqli_error($sql));
					}
}
else
{

	 $sql=mysqli_connect("localhost","root","");
				if (!$sql)
 		 {
  			die('Could not connect: ');
 		 }
		$db_selected =	mysqli_select_db($sql,"5s");
		if (!$db_selected) {
  	  die ('Can\'t use foo : ' . mysqli_error($sql));
					}
   
} 


 $sqlq=  " INSERT INTO `tbl_project` (`pid`, `tempid`, `tempname`, `deptid`, `deptname`, `qid`, `title`, `pdate`,               	`auditorcname`, `auditorclogo`,`clientcname`,`clientclogo`,  `uid`, `superadminid`,  `auditedby`) 
				 VALUES ('','".$_REQUEST['tid']."','".$_REQUEST['tname']."',
				 '".$_REQUEST['did']."','".$_REQUEST['dname']."',
				 '".$_REQUEST['qid']."','".$_REQUEST['qname']."',
				 '".$_REQUEST['dt']."','".$_REQUEST['acname']."',
				 '".$_REQUEST['aclogo']."',
				 '".$_REQUEST['ccname']."','".$_REQUEST['cclogo']."','".$_REQUEST['uid']."','".$_REQUEST['uid']."',
				 '".$_REQUEST['aby']."')";		
	 	$result=mysqli_query($sql,$sqlq);



		                    



?>