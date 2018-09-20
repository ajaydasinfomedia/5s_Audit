<?php
session_start();
	include_once("dbconnect.php");
	$sqlq="update tbl_project set status=0 where pid='".$_REQUEST["project_id"]."'";	
	echo $sqlq;
		$result=mysqli_query($sql,$sqlq);
	
		header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/moved/history");
?>