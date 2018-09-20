<?php 
include_once("dbconnect.php");  
$sid=$_REQUEST["superadminid"];  
$qid = $_REQUEST['qid']; 
  		 $sql_query= "select * from tbl_login_relation where uid = '$sid' and dbname like '%_5sdb%'";
  		 $rs=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
  		 while($row=mysqli_fetch_array($rs))
 		  {
   			$dbname= $row['dbname'];
  		  }
			$sql=mysqli_connect("localhost","root","",$dbname);
		mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));		
  $query = "SELECT * FROM tbl_questionanswer where superadminid = $sid and qid in($qid)";
  $result = mysqli_query($sql,$query) or die(mysqli_error($sql));
  $blogs = array();
    while($blog = mysqli_fetch_array($result)) 
	{
		 $blogs[] = array('qaid'=>$blog['qaid'],'qid'=>$blog['qid'],'checkitem'=>$blog['checkitem'],
		 'description'=>$blog['description'],
		 'superadminid'=>$blog['superadminid'],'timestamp'=>$blog['timestamp'],'queid'=>$blog['queid']);
	}
    header('Content-type: application/json');
    echo json_encode(array('blogs'=>$blogs)); 
?>