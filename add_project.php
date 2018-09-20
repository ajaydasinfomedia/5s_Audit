<?php
	session_start();
	$id=$_SESSION['uid'];
	$superid=$_SESSION['said'];	
	include("dbconnect.php");
	//Get Template name
	$sqlq="select `tempname` from addtemplate where tempid='".$_REQUEST['drptemplate']."' "; 
	$result=mysqli_query($sql,$sqlq);
	$row=mysqli_fetch_assoc($result);
	$tname=$row['tempname'];
	//Get Department name
	$sql_query="select `deptname` from adddepartment where deptid='".$_REQUEST['drpdept']."' "; 
	$result=mysqli_query($sql,$sql_query);
	$row=mysqli_fetch_assoc($result);
	$dname=$row['deptname'];
	$_SESSION['deptname']=$dname;//used in caudit_recordset.php
	//Get Questionnair title	
	$sql_q="select `title` from tbl_questionnair where qid='".$_REQUEST['drpquetitle']."' "; 
	$result=mysqli_query($sql,$sql_q);
	$row=mysqli_fetch_assoc($result);
	$qname=$row['title'];

	$dt = date("Y-m-d", strtotime($_REQUEST['txtdate']));
	$_SESSION['date']=$dt;//used in caudit_recordset.php
	
	$auditor=$_REQUEST['txtaudited'];
	$_SESSION['aname']=$auditor;//used in caudit_recordset.php	
	if(isset($_REQUEST['cmdsave']))//save project and redirects user to the questionnair page
	{
		$questionnaryid = $_REQUEST['drpquetitle'];
		$sqlq=  " INSERT INTO `tbl_project` (`pid`, `tempid`, `tempname`, `deptid`, `deptname`, `qid`, `title`, `pdate`,`auditorcname`, `auditorclogo`,`clientcname`,`clientclogo`,  `uid`, `superadminid`, `auditedby`) 
				 VALUES ('','".$_REQUEST['drptemplate']."','$tname','".$_REQUEST['drpdept']."','$dname ','".$_REQUEST['drpquetitle']."','$qname ','$dt',
				 '".$_REQUEST['txtacname']."', '".$_REQUEST['txtaclogo']."','".$_REQUEST['txtccname']."','".$_REQUEST['txtcclogo']."','$id','$superid','".trim($auditor)."')";			
	 	$result=mysqli_query($sql,$sqlq);
	   	$pid = mysqli_insert_id($sql);
		/*$sql_q="select `pid` from tbl_project order by pid desc limit 1";//Get Project Id 
		$result=mysqli_query($sql,$sql_q);
		$row=mysql_fetch_assoc($result);
		$pid=$row['pid'];*/
		if(isset($_REQUEST['txtccname']) && isset($_REQUEST['txtcclogo']))
		{
			$s="update tbl_project set temptype= 'c' where  pid= '$pid' ";
			$r=mysqli_query($sql,$s);
		}
		if($_REQUEST['txtccname']=='')
		{
			$s="update tbl_project set temptype= 'o' where  pid= '$pid' ";
			$r=mysqli_query($sql,$s);
		}       
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/$pid/$questionnaryid/new/questionnairy");
	}
	if(isset($_REQUEST["cmducontinue"]))//Update project if user clicks on 'update & continue' button and redirects user to the questionnair page
	{
		$id=$_REQUEST["txtid"];
        $questionnaryid1 = $_REQUEST['drpquetitle'];
		$dt = date("Y-m-d", strtotime($_REQUEST['txtdate']));
		$sql_query ="UPDATE `tbl_project` SET `tempid` = '".$_REQUEST['drptemplate']."',`tempname` = '$tname',`deptid` = '".$_REQUEST['drpdept']."',
					`deptname` = '$dname',`qid` = '".$_REQUEST['drpquetitle']."',`title` = '$qname',`pdate` = '$dt',`auditorcname` = '".$_REQUEST['txtacname']."',
					`auditorclogo` = '".$_REQUEST['txtaclogo']."',`auditedby` = '".trim($auditor)."',`clientcname` = '".$_REQUEST['txtccname']."',
					`clientclogo` = '".$_REQUEST['txtcclogo']."' WHERE `pid` ='".$_SESSION['getid']."'";
		$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql)); 		
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/$id/$questionnaryid1/update/questionnairy");		
	}	
	if(isset($_REQUEST["cmdupdate"]))//Update project and redirects user to the Manage Audit page
	{
		$id=$_REQUEST["txtid"];
		$dt = date("Y-m-d", strtotime($_REQUEST['txtdate']));
		if($_REQUEST['txtccname'] != '' || $_REQUEST['txtcclogo'] != '')
		{
			$sql_query ="UPDATE `tbl_project` SET `tempid` = '".$_REQUEST['drptemplate']."',`tempname` = '$tname',`deptid` = '".$_REQUEST['drpdept']."',
						`deptname` = '$dname',`qid` = '".$_REQUEST['drpquetitle']."',`title` = '$qname',`pdate` = '$dt',`auditorcname` = '".$_REQUEST['txtacname']."',
						`auditorclogo` = '".$_REQUEST['txtaclogo']."',`auditedby` = '".trim($auditor)."',`clientcname` = '".$_REQUEST['txtccname']."',
						`clientclogo` = '".$_REQUEST['txtcclogo']."',`temptype` = 'c' WHERE `pid` ='".$_SESSION['getid']."'  ";
			
		}
		else
		{
			$sql_query ="UPDATE `tbl_project` SET `tempid` = '".$_REQUEST['drptemplate']."',`tempname` = '$tname',`deptid` = '".$_REQUEST['drpdept']."',
						`deptname` = '$dname',`qid` = '".$_REQUEST['drpquetitle']."',`title` = '$qname',`pdate` = '$dt',`auditorcname` = '".$_REQUEST['txtacname']."',
						`auditorclogo` = '".$_REQUEST['txtaclogo']."',`auditedby` = '".trim($auditor)."',`temptype` = 'o' WHERE `pid` ='".$_SESSION['getid']."'  ";
		}
		$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql)); 	
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/"."create_update/manage_audit");		
	}
?>