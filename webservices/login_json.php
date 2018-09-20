<?php
include_once("../dbconnect.php");  
if(isset($_REQUEST["username"]) && isset($_REQUEST["password"]))
{
    $uname=$_REQUEST["username"];
    $pass=$_REQUEST["password"];
  $sql_query=" select * from tbl_login where username='$uname' and password='".md5($pass)."'
	   and  app_login_status=0  and status = 1 "; 
	   
	   
	     //check email
	    $sql_query_user="select l.* from tbl_login as l where l.username='$uname'";
        $result_user=mysqli_query($sql,$sql_query_user) or die(mysqli_error($sql));
        $no_user=mysqli_num_rows($result_user);
        
        //check password
	    $sql_query_pass="select l.* from tbl_login as l where l.password='".md5($pass)."'";
        $result_pass=mysqli_query($sql,$sql_query_pass) or die(mysqli_error($sql));
        $no_pass=mysqli_num_rows($result_pass);
        
        //check status
	    $sql_query="select l.* from tbl_login as l,tbl_login_relation as r where l.username='$uname'	 and l.password='".md5($pass)."' and r.status = 1 and r.applogin_status=0 and l.uid = r.uid";
        $result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
        $no=mysqli_num_rows($result);
        
        if($no_user==0)
        {
            $logs=array('user_id'=>0,'error'=>'Email id is not registered.','type'=>0);    
        }else if($no_pass==0)
        {
            $logs=array('user_id'=>0 ,'error'=>'Password is wrong','type'=>1);    
        }else if($no==0)
        {
            $logs=array('user_id'=>0,'error'=>'Your account is not active or you might be logged in from other device.','type'=>2);    
        }
        else
        {            
            $row=mysqli_fetch_array($result);            
                $logs=array('user_id'=>intval($row['uid']),'superadmin_id'=>intval($row['superadminid']),
				'role'=>$row['role'],'user_name'=>$row['username'],'email_id'=>$row['email']);   
				    
  $query="UPDATE `tbl_login_relation` SET applogin_status = '1' WHERE uid = ".$row['uid'] ;
           mysqli_query($sql,$query) or die(mysqli_error($sql));
        }        
}
else
{
$logs=array('user_id'=>0);
}
 echo json_encode($logs);
?>