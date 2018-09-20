<?php
	error_reporting(0);
	
	if(isset($_SESSION['uname']) && isset($_SESSION['dbname']) && $_SESSION['dbname'] != '' && $_SESSION['uname'] != "")
	{
		$db=$_SESSION['dbname'];
		// var_dump($db);exit;
		$sql= mysqli_connect("localhost","root","",$db);
		// var_dump($sql);exit;
		if (mysqli_connect_errno())
	  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
		//mysql_select_db("5s_web",$sql) or die(mysql_error());		
	}
	else
	{
		
		 $sql=mysqli_connect("localhost","root","","5s_web");
		// var_dump($sql);exit;	
		if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
		//mysql_select_db("5s_web",$sql) or die(mysql_error());		
	}	        
?>