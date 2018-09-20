<?php 
include_once("dbconnect.php");  
$sid=$_REQUEST["superadminid"];
  		 $sql_query= "select * from tbl_login_relation where uid = '$sid' and dbname like '%_5sdb%'";
  		 $rs=mysql_query($sql_query) or die(mysql_error());
  		 while($row=mysql_fetch_array($rs))
 		  {
   			$dbname= $row['dbname'];
  		  }
			$sql=mysql_connect("localhost","root","Bigyear2012") or die('Could not connect: ' . mysql_error());
			$db_selected =	mysql_select_db($dbname,$sql) or die ('Can\'t use foo : ' . mysql_error()) ;

  $query = "SELECT * FROM tbl_questionnair WHERE superadminid='".$sid."'";
  $result = mysql_query($query) or die(mysql_error());
  $blogs = array();
    while($blog = mysql_fetch_array($result)) 
	{
	 $blogs[] = array('id'=>$blog['qid'],'title'=>$blog['title'],'uid'=>$blog['uid'],'modified_date'=>$blog['modified_date'],
	 'status' => $blog['status'],
	 'superadminid'=>$blog['superadminid'],'timestamp'=>$blog['timestamp']);
	}
    header('Content-type: application/json');
    echo json_encode(array('blogs'=>$blogs));
?>