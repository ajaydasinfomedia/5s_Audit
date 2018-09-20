<?php
	session_start();
	include("dbconnect.php");
	$sqlq="delete from tbl_project where pid='".$_REQUEST["project_id"]."'";
	$rs=mysqli_query($sql,$sqlq);
	$s="delete from tbl_project_review where pid='".$_REQUEST["project_id"]."'";
	$r=mysqli_query($sql,$s);
	header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/deleted/history");
?>	
	