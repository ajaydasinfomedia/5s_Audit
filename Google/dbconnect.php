<?php

	/*if(isset($_SESSION['uname']) && isset($_SESSION['dbname']))
	{
		$db=$_SESSION['dbname'];
			$sql=mysql_connect("localhost","root","Bigyea2012");
			mysql_select_db($db,$sql);
	}
	else
	{
		 $sql=mysql_connect("localhost","root","Bigyea2012");
	mysql_select_db("5s_web",$sql);
	}*/	
        
	if(isset($_SESSION['uname']) && isset($_SESSION['dbname']))
	{
		$db=$_SESSION['dbname'];
			$sql=mysqli_connect("localhost","root","",$db);
				if (!$sql)
 		 {
  			die('Could not connect: ');
 		 }
		
	}
	else
	{	
		 $sql=mysqli_connect("localhost","root","","5s");
		if (!$sql)
 		 {
  			die('Could not connect: ');
 		 }
				
					
		}			
?>