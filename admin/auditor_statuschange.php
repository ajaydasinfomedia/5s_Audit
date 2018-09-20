<?php
session_start();
include("sadmin_dbconnect.php");

if($_GET['status'] == "Deactive")
{
$sqlq = "update tbl_login_relation set status = 0 where uid = '".$_GET['uid']."'";
}
else
{
$sqlq = "update tbl_login_relation set status = 1 where uid = '".$_GET['uid']."'";
}
mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
$uid =$_GET['uid'];
header("location:admin_viewdtls.php?status&uid=$uid");

?>