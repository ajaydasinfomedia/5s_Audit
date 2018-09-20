<?php 
include_once("dbconnect.php");  
$sid=$_REQUEST["superadminid"];
  		 $sql_query= "select * from tbl_login_relation where uid = '$sid' and dbname like '%_5sdb%'";
  		 $rs=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
  		 while($row=mysqli_fetch_array($rs))
 		  {
   			$dbname= $row['dbname'];
  		  }
			$sql=mysqli_connect("localhost","root","",$dbname);

  $query = "SELECT * FROM tbl_questionnair WHERE superadminid='".$sid."'";
  $result = mysqli_query($sql,$query) or die(mysqli_error($sql));
  $blogs = array();
    while($blog = mysqli_fetch_array($result)) 
	{
	 $blogs[] = array('id'=>$blog['qid'],'title'=>$blog['title'],'uid'=>$blog['uid'],'modified_date'=>$blog['modified_date'],
	 'status' => $blog['status'],
	 'superadminid'=>$blog['superadminid'],'timestamp'=>$blog['timestamp']);
	}
    header('Content-type: application/json');
    echo json_encode(array('blogs'=>$blogs));
?>