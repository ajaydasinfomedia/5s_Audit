<?php
session_start();
include("sadmin_dbconnect.php");

if($_GET['status'] == "Deactive")
{
$sqlq = "update tbl_login set status = 0 where uid = '".$_GET['uid']."'";
}
else
{
$sqlq = "update tbl_login set status = 1 where uid = '".$_GET['uid']."'";
}
mysqli_query($sql,$sqlq) or die(mysqli_error($sql));

header("location:admin_index.php?status");

?>