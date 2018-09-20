<?php 

function getActiveUserRole($module, $role)
{	
	include("dbconnect.php");
	
	$query = "select $role from access_rights where module_name = '".$module."'";
		
	$rs = mysqli_query($sql,$query);
	
	$row = mysqli_fetch_assoc($rs);
	
	return $row[$role];
}
?>