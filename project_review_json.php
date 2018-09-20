
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
  			die('Could not connect: ');
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
  			die('Could not connect: ' . mysqli_error($sql));
 		 }
		$db_selected =	mysqli_select_db($sql,"5s");
		if (!$db_selected) {
  	  die ('Can\'t use foo : ' . mysqli_error($sql));
					}
   
}
$answer = array();
		 $answer[0]='1';$answer[1]='2';$answer[2]='3';$answer[3]='4';$answer[4]='2';$answer[5]='4';$answer[6]='3';$answer[7]='4';
		 $answer[8]='1';$answer[9]='0';$answer[10]='1';$answer[11]='2';$answer[12]='3';$answer[13]='4';$answer[14]='4';
		 $answer[15]='1';$answer[16]='2';$answer[17]='4';$answer[18]='4';$answer[19]='4';$answer[20]='2';$answer[21]='2';
		 $answer[22]='3';$answer[23]='4';$answer[24]='4';
		 
		 
for($i=0;$i<count($answer);$i++)
{


$sqlq= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, `status`, `uid`, `TIMESTAMP`,`superadminid`) VALUES ('', '".$_REQUEST['pid']."', '".$_REQUEST['qid']."', '$i', '".$answer[$i]."','".$_REQUEST['status']."', 
'".$_REQUEST['uid']."', CURRENT_TIMESTAMP,'".$_REQUEST['sid']."')";


	 		$result=mysqli_query($sql,$sqlq);
			if(!$result){echo "could not insert".mysqli_error($sql);}
	   		

}		 


          
		  
?>