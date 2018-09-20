<?php session_start();
include("dbconnect.php");








$sqlq = "select * from tbl_login where email = '".$_REQUEST['emailid']."'";
$result = mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
$num = mysqli_num_rows($result);
if($num > 0)
{
	
	while($row = mysqli_fetch_array($result))
	{
		$uname = $row['username'];
	}
	
	$to = $_POST['emailid'];
	$subject = 'Get Username';
	$txt =$uname;
	mail($to,$subject,$txt);
	header("location:getuname/login");
}
else
{
	header("location:no/forgotusername");
}
?>