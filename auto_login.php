<?php
session_start();
include("webservices/dbconnect.php");

if(isset($_REQUEST["email"]) && isset($_REQUEST["password"]))
{
	$email = $_REQUEST["email"];
	$password = $_REQUEST["password"];
	$en_pass = md5($password);
	$query = "SELECT * FROM `tbl_login` where email = '$email' and password = '$en_pass' and status = 1 and role = 'admin' ";
	
	$res = mysqli_query($sql,$query) or die(mysqli_error($sql));
	
	$no = mysqli_num_rows($res);
	if($no == 0)
	{
		$logs = array("error"=>"Email and Password Not Found...!");
	}
	else
	{
		while($row=mysqli_fetch_array($res))
		{
			$id=$row['uid'];
			$sid=$row['superadminid'];
			$uname=$row['username'];
			$dname= $row['displayname'];
			$fname = $row['firstname'];
			$role = $row['role'];
			
			$sqlquery = "select * from tbl_login_relation where superadminid = '$sid' and uid = '$id' and producttype like '5s'";
			$result = mysqli_query($sql,$sqlquery) or die(mysqli_error($sql));
			
			while($row_data = mysqli_fetch_array($result))
			{
				$databasename = $row_data['dbname'];
				$status = $row_data['status'];	 
			}
			
			$_SESSION['role'] = $role;
			$_SESSION['status'] = $status;
			$_SESSION['uname']=$fname;
			$_SESSION['uid']=$id;
			$_SESSION['said']=$sid;
			$_SESSION['dname']=$dname;
			$_SESSION['dbname'] = $sid.'_5sdb';
		}
		
		$url = $_SESSION['dname']."/".$_SESSION['uname']."/dashboard";
		
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/dashboard");
	}
}
	echo json_encode($logs);

?>