<?php
	session_start();
	include('dbconnect.php');
	$sqlq="select * from addtemplate where tempid='".$_GET["c"]."' and superadminid = ".$_SESSION['said'];
	$result = mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
	while($row = mysqli_fetch_array($result))
    {
		$temptype=$row['temptype'];
    	echo $row['auditorcname'].",".$row["auditorclogo"].",".$row['clientcname'].",".$row['clientclogo'];
    }

?>