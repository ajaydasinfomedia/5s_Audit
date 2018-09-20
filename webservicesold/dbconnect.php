<?php
		 $sql=mysql_connect("localhost","root","Bigyear2012");
		 if (!$sql)
 		 {
  			die('Could not connect:' . mysql_error());
 		 }
	$db_selected =mysql_select_db("5s_web",$sql);
			if (!$db_selected) {
  	  die ('Can\'t use foo : ' . mysql_error());
					}		
?>