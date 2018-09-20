<?php

session_start(); 
include("dbconnect.php");

$admin = $_REQUEST['admin'];
$auditor = $_REQUEST['auditor'];


if(isset($admin))
{
$admin_id = $_REQUEST['admin_id'];
$value = $_REQUEST['value'];
$query= "update access_rights set admin=$value where id=$admin_id";

$result = mysqli_query($sql,$query) or die(mysqli_error($sql));
}

if(isset($auditor))
{
$auditor_id = $_REQUEST['auditor_id'];
$value = $_REQUEST['value'];
$query= "update access_rights set auditor=$value where id=$auditor_id";

$result = mysqli_query($sql,$query) or die(mysqli_error($sql));
}


?>