<?php
include_once("../dbconnect.php");  
if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
{
    $uname=$_REQUEST["username"];
    $pass=$_REQUEST["password"];
  $sql_query=" select * from tbl_login where username='$uname' and password='".md5($pass)."'
	   and  app_login_status=0  and role = 'auditor' and status = 1 "; 
	   
	   
	     
	    $sql_query="select l.* from tbl_login as l,tbl_login_relation as r where l.role='auditor' and l.username='$uname'
					 and l.password='".md5($pass)."' and r.status = 1 and r.applogin_status=0 and l.uid = r.uid";
					 
					 
        $result=mysql_query($sql_query) or die(mysql_error());
        $no=mysql_num_rows($result);
        if($no==0)
        {
            $logs=array('user_id'=>0);    
        }
        else
        {            
            $row=mysql_fetch_array($result);            
                $logs=array('user_id'=>intval($row['uid']),'superadmin_id'=>intval($row['superadminid']),
				'role'=>$row['role'],'user_name'=>$row['username'],'email_id'=>$row['email']);   
				    
  $query="UPDATE `tbl_login_relation` SET applogin_status = '1' WHERE uid = ".$row['uid'] ;
           mysql_query($query) or die(mysql_error());
        }        
}
else
{
$logs=array('user_id'=>0);
}
 echo json_encode($logs);
?>