<?php
/*var_dump($_REQUEST);
exit;*/
include("dbconnect.php");  
   $suid=$_REQUEST["superadminid"];
   $uid=$_REQUEST["uid"];
   
   $sql_query= "select * from tbl_login_relation where uid = '$suid' and dbname like '%_5sdb%'";
   $rs=mysql_query($sql_query) or die(mysql_error());
   while($row=mysql_fetch_array($rs))
   {
   	$dbname= $row['dbname'];
   }
			$sql=mysql_connect("localhost","root","Bigyear2012") or die('Could not connect: ' . mysql_error());
			$db_selected =	mysql_select_db($dbname,$sql) or die ('Can\'t use foo : ' . mysql_error()) ;
	
$answer = array();
$answer = explode(',',$_REQUEST['answer']);


/* $answer[0]='1';$answer[1]='2';$answer[2]='3';$answer[3]='4';$answer[4]='2';$answer[5]='4';$answer[6]='3';$answer[7]='4';
		 $answer[8]='1';$answer[9]='0';$answer[10]='1';$answer[11]='2';$answer[12]='3';$answer[13]='4';$answer[14]='4';
		 $answer[15]='1';$answer[16]='2';$answer[17]='4';$answer[18]='4';$answer[19]='4';$answer[20]='2';$answer[21]='2';
		 $answer[22]='3';$answer[23]='4';$answer[24]='4';*/
		 
		 
		  
$query="select * from tbl_project_review where pid='".$_REQUEST["pid"]."' ";
        $res=mysql_query($query) or die(mysql_error());
        $no=mysql_num_rows($res);
		
        if($no != 0 )
		{
            $query="delete from tbl_project_review where pid=".$_REQUEST["pid"]." ";
           $res=mysql_query($query) or die(mysql_error());
        }	
		//count($answer)
for($i=1;$i<=25;$i++)
{
	$j= $i-1;
 $sql= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, `status`, `uid`, `TIMESTAMP`,`superadminid`) 
 VALUES ('', '".$_REQUEST['pid']."', '".$_REQUEST['qid']."', '$i', '".$answer[$j]."','".$_REQUEST['status']."', 
'$uid', CURRENT_TIMESTAMP,'$suid')";
mysql_query($sql) or die(mysql_error());			
}		 		  
?>