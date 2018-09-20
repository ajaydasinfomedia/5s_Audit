<?php
	error_reporting(0);
	session_start();
	include('dbconnect.php');
	$sqlq="select * from addtemplate where tempid='".$_GET["c"]."' and superadminid = ".$_SESSION['said'];
	$result = mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
	while($row = mysqli_fetch_array($result))
    {
		$temptype=$row['temptype'];
	 	$f1="own_logo/".$row["auditorclogo"];
	 	$f2="own_logo/".$row["clientclogo"];	
	 	if(isset($row["auditorclogo"]))
		{
		list($width, $height) = getimagesize($f1);
		}
		

		if(isset($row["clientclogo"]))
		{
		list($width1, $height1) = getimagesize($f2);
		}
	
		echo $row['auditorcname'].",".$row["auditorclogo"].",".$row['clientcname'].",".$row['clientclogo'].",".$width.",".$height.",".$width1.",".$height1;
    }
?>



   
                    
                    
                