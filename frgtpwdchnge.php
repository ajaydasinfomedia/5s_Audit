<?php 
	include("dbconnect.php");
	function createPassword($length) 
	{
		$chars = "234567890abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$i = 0;
		$password = "";
		while ($i <= $length) 
		{
			$password .= $chars
			{
				mt_rand(0,strlen($chars))
			};
			$i++;
		}
		return $password;
	}
	$password = createPassword(8);
	$to = $_POST['emailid'];
	
	$from = "Niftysol";
	$subject = "Your password";
	$txt ="<html><body><center><b>Youe new Password is :- ".$password." </b></center></body></html>";
	$headers  = "From: Niftysol - 5s <noreply@niftysol.com> \r\n";
	$headers  .= "MIME-Version: 1.0 \r\n";
	$headers .= "Content-type: text/html; charset=UTF-8 \r\n";
	$headers .= "Reply-To: sales@niftysol.com \r\n";
	mail($to, $subject, $txt, $headers);
	
	$sqlq = "select * from tbl_login where email = '".$_REQUEST['emailid']."'";
	$result = mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
	$num = mysqli_num_rows($result);
	
	if($num > 0)
	{
		$ch1 = curl_init();
		curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/passwordreset.php");
		curl_setopt($ch1,CURLOPT_POST,true);
		$data = array('email' => $_REQUEST['emailid'] ,'password' => $password );
		curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
		curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch1);
		curl_close($ch1);
		$sql_update = "update tbl_login set password = '".md5($password)."' where email = '".$_REQUEST['emailid']."'";
		mysqli_query($sql,$sql_update) or die(mysqli_error($sql));
		header("location:getpassword/login");
	}
	else
	{
		header("location:no/forgotpassword");
	}
?>