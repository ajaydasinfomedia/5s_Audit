<?php
include("dbconnect.php");  
    if(isset($_REQUEST["superadminid"]))
    {
		$sid=$_REQUEST["superadminid"];
  		
		//$sql_query= "select * from tbl_login_relation where uid = '$sid'";
  		$sql_query="select l.*,r.status as rstatus,r.dbname from tbl_login as l,tbl_login_relation as r where l.uid = $sid and l.uid=r.uid and r.dbname like '%_5sdb%'";
		$rs=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
  		while($row=mysqli_fetch_array($rs))
 		 {
   			$dbname= $row['dbname'];
  		 }
			 $sql=mysqli_connect("localhost","root","",$dbname);
			 $sql_query="select * from adddepartment where superadminid='$sid' ";
        $result=mysqli_query($sql,$sql_query);
        $no=mysqli_num_rows($result);	
        if($no==0)
        {
            //$logs=array("deptid"=>0);            
        }
        else
        {            
            while($row=mysqli_fetch_array($result))
            {
                $logs[]=array("department_id"=>$row["deptid"],"department_name"=>$row["deptname"],
                "dept_timestamp"=>$row["depttimestamp"],"user_id"=>$row["uid"],"super-admin_id"=>$row["superadminid"]);  
            }
        }        
    }
    else
    {
            //$logs=array("deptid"=>0);            
    }    
    echo json_encode($logs);
?>