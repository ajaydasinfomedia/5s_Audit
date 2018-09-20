<?php 
include_once("dbconnect.php");  
$sid=$_REQUEST["superadminid"];  
$qid = $_REQUEST['qid']; 
  		 $sql_query= "select * from tbl_login_relation where uid = '$sid' and dbname like '%_5sdb%'";
  		 $rs=mysql_query($sql_query) or die(mysql_error());
  		 while($row=mysql_fetch_array($rs))
 		  {
   			$dbname= $row['dbname'];
  		  }
			$sql=mysql_connect("localhost","root","Bigyear2012") or die('Could not connect: ' . mysql_error());
			$db_selected =	mysql_select_db($dbname,$sql) or die ('Can\'t use foo : ' . mysql_error()) ;
		mysql_query("set names 'utf8'") or die(mysql_error());		
  $query = "SELECT * FROM tbl_questionanswer where superadminid = $sid and qid in($qid)";
  $result = mysql_query($query) or die(mysql_error());
  $blogs = array();
    while($blog = mysql_fetch_array($result)) 
	{
		 $blogs[] = array('qaid'=>$blog['qaid'],'qid'=>$blog['qid'],'checkitem'=>$blog['checkitem'],
		 'description'=>$blog['description'],
		 'superadminid'=>$blog['superadminid'],'timestamp'=>$blog['timestamp'],'queid'=>$blog['queid']);
	}
    header('Content-type: application/json');
    echo json_encode(array('blogs'=>$blogs)); 
?>