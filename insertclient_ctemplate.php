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
	if(isset($_FILES["auditorclogo"]["name"]))
	{
		$file_name=$_FILES['auditorclogo']['name'];
		$file_name=str_replace (" ", "", $file_name);
	 	$random_name=date(mktime());
		$own_filename=$random_name.$file_name;
		$folder="own_logo/";
		$path=$folder.$own_filename;
	    if (is_uploaded_file ($_FILES ['auditorclogo']['tmp_name'])) 
	  	{
  	  		move_uploaded_file($_FILES ['auditorclogo']['tmp_name'], $path);
  	  	}
	}
 if($_FILES['auditorclogo']['name'] == '')
  {
 
  $own_filename='';
  
  }
    if(isset($_FILES["clientclogo"]["name"]))
    {
		$file_name=$_FILES['clientclogo']['name'];
		$file_name=str_replace (" ", "", $file_name);
	 	$random_name=date(mktime());
		$client_filename=$random_name.$file_name;
		$folder="own_logo/";
		$path=$folder.$client_filename;
		 if (is_uploaded_file ($_FILES ['clientclogo']['tmp_name'])) 
	  	{
  	  		move_uploaded_file($_FILES ['clientclogo']['tmp_name'], $path);
  	  	}
	}
	if($_FILES["clientclogo"]["name"] == '')
	{
		
		$client_filename='';
	}
	echo $sqlq="INSERT INTO `addtemplate` (`tempid`, `tempname`, `auditorcname`, `auditorclogo`, `clientcname`, 
		 `clientclogo`,`temptimestamp`,`temptype`, `uid`,`superadminid` ) 
		  VALUES ('', '".$_REQUEST["txtclienttempname"]."','".$_REQUEST["txtauditorcname"]."', 
		  '$own_filename', '".$_REQUEST["txtclientcname"]."', '$client_filename', CURRENT_TIMESTAMP,'c', '$id','$superid') " ;			
	$result=mysqli_query($sql,$sqlq) or die(mysqli_error($sql));	
	header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/tempcreated/tclient/template_view");
}
else
{

		if(isset($_FILES["auditorclogo"]["name"]))
		{
		
			if($_FILES['auditorclogo']['name'] == '')
			{
				$own_filename=$_SESSION['oclogo'];			
			}	
			else
			{
				$file_name=$_FILES['auditorclogo']['name'];
				$file_name=str_replace (" ", "", $file_name);
	 			$random_name=date(mktime());
				$own_filename=$random_name.$file_name;
				$folder="own_logo/";
				$path=$folder.$own_filename;
				 if (is_uploaded_file ($_FILES ['auditorclogo']['tmp_name'])) 
	  				{
  	  					move_uploaded_file($_FILES ['auditorclogo']['tmp_name'], $path);
  	  				}
			}
		}
		if(isset($_FILES["clientclogo"]["name"]))
		{
			if($_FILES['clientclogo']['name'] == '')
			{
				$client_filename=$_SESSION['cclogo'];	
			}
			else
			{
				$file_name=$_FILES['clientclogo']['name'];
				$file_name=str_replace (" ", "", $file_name);
	 			$random_name=date(mktime());
				$client_filename=$random_name.$file_name;
				$folder="own_logo/";
				$path=$folder.$client_filename;
				 if (is_uploaded_file ($_FILES ['clientclogo']['tmp_name'])) 
	  				{
  	  					move_uploaded_file($_FILES ['clientclogo']['tmp_name'], $path);
  	  				}
			}
		}	 
		  $sql_query="UPDATE `addtemplate` SET `tempname` = '".$_REQUEST["txtclienttempname"]."',
					`auditorcname` = '".$_REQUEST["txtauditorcname"]."', `auditorclogo` = '$own_filename',
					`clientcname` = '".$_REQUEST["txtclientcname"]."',
					`clientclogo` = '$client_filename',modified_date =CURRENT_TIMESTAMP  WHERE `tempid` = $textid "; 
		 
		 $result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));		
		
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/clienttempupdated/updated/template_view"); 
}
?>