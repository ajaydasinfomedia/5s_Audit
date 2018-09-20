<?php
session_start();
include("dbconnect.php");

if(isset($_GET['status_del']) && $_GET['status_del'] == 2)
{
	$link_del=mysqli_connect("localhost","root","") or die('Could not connect: ');	
	mysqli_select_db($link_del,"5s_web") or die ('Can\'t use foo : ' . mysqli_error($link_del));
	$status_update = "update tbl_login_relation set status=2 where uid=".$_GET['uid'];
	
	mysqli_query($link_del,$status_update) or die(mysqli_error($link_del)); 
	header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/userlist");
}
if(isset($_GET['status']) &&  $_GET['status']== "Active")
{
	$link2=mysqli_connect("localhost","root","") or die('Could not connect: ');	
	mysqli_select_db($link2,"5s_web") or die ('Can\'t use foo : ' . mysqli_error($link2));
	$sql1 = "select * from tbl_plan where plan_type like '5s' and uid = ".$_SESSION['said']." and active_status = 1"; 
	$rs = mysqli_query($link2,$sql1) or die(mysqli_error($link2));
	while($row = mysqli_fetch_array($rs))
	{
	$no = $row['num_of_user'];
	}	
	
	
	$sql_login="select * from tbl_login_relation where superadminid = ".$_SESSION['said']." 
				and status = '1'  and producttype like '5s'";  
       			$result=mysqli_query($link2,$sql_login) or die(mysqli_query($link2));
       			$num=mysqli_num_rows($result);
	
				if($num > $no)
        		{
					header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/not_eligible/userlist"); 
				}
				else
				{
					
				$sql_query = "update tbl_login_relation set status = 1 where superadminid = '".$_SESSION['said']."' 
				and uid = '".$_GET['uid']."'";
					mysqli_query($link2,$sql_query) or die(mysqli_error($link2));	
				header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/activated/userlist");
				}	
}
?>
