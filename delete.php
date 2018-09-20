<?php 
session_start();
include("dbconnect.php");
if(isset($_REQUEST["deptid"]))
{
	$sql_query="delete from adddepartment where deptid=".$_REQUEST["deptid"];
	$rs = mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
    header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/deleted/department_add");
}
if(isset($_REQUEST["qid"]))
{
	$sql_query="delete from tbl_questionnair where qid=".$_REQUEST["qid"];
    mysqli_query($sql,$sql_query);
    header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/manage_audit");
}
?>
