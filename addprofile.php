<?php
	session_start();
			$sql=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	if(isset($_REQUEST['cmdupdateprofile']))
	{
		if($_REQUEST["txtpassword"] == '')
		{
			$sql_query="UPDATE `tbl_login` SET  `firstname` = '".$_REQUEST['firstname']."',`lastname`='".$_REQUEST['lastname']."',
						`phone` = '".$_REQUEST["txtphone"]."' WHERE `superadminid` = '".$_SESSION['said']."' and `uid` = '".$_SESSION['uid']."'  "; 
		}
		else
		{
			$pwd=$_REQUEST['txtpassword'];
			$ch1=curl_init();
				 curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/passwordreset.php");
				 curl_setopt($ch1,CURLOPT_POST,true);
				 $data = array('email' => $_REQUEST['txtemailid'] ,'password' => $pwd );
				 curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
				 curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
				 curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
				 $result = curl_exec($ch1);
				 curl_close($ch1);
			$sql_query="UPDATE `tbl_login` SET  `firstname` = '".$_REQUEST['firstname']."',`lastname`='".$_REQUEST['lastname']."',`phone` = '".$_REQUEST["txtphone"]."', 
						`password` = '".md5($pwd)."' WHERE `superadminid` = '".$_SESSION['said']."' and `uid` = '".$_SESSION['uid']."' ";
		}
		$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));	
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/updatedprofile/dashboard"); 
	}
 	mysqli_close($sql); 
?>