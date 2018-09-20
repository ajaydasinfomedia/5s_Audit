<?php
	session_start();
	include("dbconnect.php");
	$user=$_REQUEST["txtuname"];
	$pwd=$_REQUEST["txtpassword"];	
	if(isset($_REQUEST["cmdlogin"]))
	{	
	     $sql_user="select * from tbl_login where 
			   username='".$_REQUEST["txtuname"]."' and password='".md5($_REQUEST["txtpassword"])."' ";   
		$result=mysqli_query($sql,$sql_user) or die(mysqli_error($sql));
		$num=mysqli_num_rows($result);
		
		//echo "<br>".$num;

		if($num>0)
		{
			while($row=mysqli_fetch_array($result))
			{
				
				
				 $id=$row['uid'];
           		 $sid=$row['superadminid'];
				 $uname=$row['username'];
				 $dname= $row['displayname'];
				 $fname = $row['firstname'];
				 $role = $row['role'];
			 	 
	
				$sqlquery = "select * from tbl_login_relation where superadminid = '$sid' and uid = '$id' and producttype like '5s'";
				 $res = mysqli_query($sql,$sqlquery) or die(mysqli_error($sql));
				 $num = mysqli_num_rows($res);
				 //echo $num."<br>";
			
				 while($row = mysqli_fetch_array($res))
				 {
					$databasename = $row['dbname'];
					$status = $row['status'];	
						
				 }
				
				
				/*echo $databasename."<br>";
				echo $status."<br>";
				exit;*/
				$_SESSION['role'] = $role;
				$_SESSION['status'] = $status;
				// var_dump($status);
				
				   
				if(($role == 'auditor' && $status == '0') || ($role == 'auditor' && $status == '2'))
				{ 
				
				header("Location:no/login");	
				exit;
				// header("Location:no/login");
				}
	
	
					 $_SESSION['uname']=$fname;
					 $_SESSION['uid']=$id;
					 $_SESSION['said']=$sid;
				if($id == $sid)
				{
						
					
					 $_SESSION['dname']=$dname; 
					
					

					if($role == 'admin' && $status == '0')
					 {
					  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/$id/recuringpage");
					 }
					 else
					 {
						 $_SESSION['dbname'] = $databasename;
				 			$todays_date = date("Y-m-d");
				 
						    $chkexpiry = "select * from tbl_plan where plan_type like '5s' and exp_date > '$todays_date' and uid = $id";
				 			$rs = mysqli_query($sql,$chkexpiry) or die(mysqli_error($sql));
							 $num = mysqli_num_rows($rs);


							 if($num > 0 )
							 {
				 				$_SESSION['expired'] = 'no'; 
								 header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/dashboard");
							 }
							 else
							 {
								 $_SESSION['expired'] = '';
				 				header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/plans");
							 }
					 }
				 }
 else {
	  
					 $squery = "select * from tbl_login where uid = '$sid'";
				 	$rs = mysqli_query($sql,$squery) or die(mysqli_error($sql));
				 	while($r = mysqli_fetch_array($rs))
					 {
					 $displayname = $r['displayname'];
					 }
					 $_SESSION['dbname'] = $sid.'_5sdb';
					 $_SESSION['dname']=$displayname; 
    header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/dashboard");
 }
			}	
		}	
		else
		{
				 header("Location:no/login");
		}	
	}		
	else
	{
		echo"hello";
		
		exit;
            header("Location:login");	
	}	
?>