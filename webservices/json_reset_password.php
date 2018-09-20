<?php
include("dbconnect.php");  
    if(isset($_REQUEST["uid"]))
    {
		$uid = $_REQUEST['uid'];
		$pwd = $_REQUEST['password'];
			$sqlquery = "select * from tbl_login where uid = $uid";
			$rs = mysqli_query($sql,$sqlquery) or die(mysqli_error($sql));
		
					$row = mysqli_fetch_assoc($rs);
					$email = $row['email'];	
					
					$ch1 = curl_init();
					curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/passwordreset.php");
					curl_setopt($ch1,CURLOPT_POST,true);
					$data = array('email' => $email ,'password' => $pwd );
					curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
					curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
					curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
					$result = curl_exec($ch1);
					curl_close($ch1);

		$query = "update tbl_login set password = '".md5($pwd)."' where uid = $uid";
		mysqli_query($sql,$query) or die(mysqli_error($sql));
		
	}
?>	