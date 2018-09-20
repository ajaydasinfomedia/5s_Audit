<?php
session_start();
include("dbconnect.php");
$sqlq = "delete from addtemplate where tempid='".$_REQUEST["sid"]."'";
$rs = mysqli_query($sql,$sqlq) or die(mysqli_error($sql));	
header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/down/deleted/template_view");
?>
