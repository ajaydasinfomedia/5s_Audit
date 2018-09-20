<?php
	session_start();
	$id=$_SESSION['uid'];
	$superid=$_SESSION['said'];
	if(isset($_SESSION['txtid']))
	{
	$textid=$_SESSION['txtid'];
	}
	include("dbconnect.php");
	if(isset($_REQUEST["cmdsave"]))
	{
	 if(isset($_FILES['ownclogo']['name']))
	 {
	 $file_name=$_FILES['ownclogo']['name'];
	 $file_name=str_replace (" ", "", $file_name);
	 $random_name=date(mktime());
	 $own_filename=$random_name.$file_name;
	 $folder="own_logo/";
	 $path=$folder.$own_filename;
 
	  if (is_uploaded_file ($_FILES ['ownclogo']['tmp_name'])) 
	  {
  	  	move_uploaded_file($_FILES ['ownclogo']['tmp_name'], $path);
  	  }
    }
	if($_FILES['ownclogo']['name'] == '')
    {
      $own_filename='';
    }
	 $sql_query=  "INSERT INTO `addtemplate`(`tempid`, `tempname`, `auditorcname`, `auditorclogo`, `temptimestamp`,`temptype`,                  `uid`,`superadminid`) VALUES ('', '".$_REQUEST["txtctempname"]."','".$_REQUEST["txtowncname"]."',
	              '$own_filename',CURRENT_TIMESTAMP,'o','$id','$superid')";				  		  
	 $result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));	  
	 header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/tempcreated/town/template_view");
}

if(isset($_REQUEST["cmdupdate"]))
	{

		if($_FILES['ownclogo']['name'] == '')
		{
			$new_filename= $_SESSION['oclogo'];
			
		}
		else
		{	
			 $file_name=$_FILES['ownclogo']['name'];
			 $file_name=str_replace (" ", "", $file_name);
			 $random_name=date(mktime());
			 $new_filename=$random_name.$file_name;
			  $folder="own_logo/";
	 		$path=$folder.$new_filename;
			 if (is_uploaded_file ($_FILES ['ownclogo']['tmp_name'])) 
			  {
  	  				move_uploaded_file($_FILES ['ownclogo']['tmp_name'], $path);
  	  		  }
			
		}	 
	echo	$sqlq="UPDATE `addtemplate` SET `tempname` = '".$_REQUEST["txtctempname"]."',
			 `auditorcname` = '".$_REQUEST["txtowncname"]."',`auditorclogo` = '".$new_filename."',
			`modified_date` = CURRENT_TIMESTAMP 
			  WHERE `tempid` ='$textid' " ;	
			$result=mysqli_query($sql,$sqlq) or die(mysqli_error($sql));	
			
			
 		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/owntempupdated/updated/template_view");
	}
	
?>