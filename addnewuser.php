<?php
	session_start();
	$id=$_SESSION['uid'];
	$superid=$_SESSION['said'];
	$dt= date('Y-m-d');
	if(isset($_REQUEST['cmdsave']))//save project
	{
		$link1=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
		
		$sql="select * from tbl_login where  email = '".$_REQUEST['txtemailid']."'";
        $result=mysqli_query($link1,$sql) or die(mysqli_error($link1));     
        $no=mysqli_num_rows($result);
	 	mysqli_close($link1); 
        if($no > 0)
        {
			header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/notallow/userlist"); 
        }
		else
		{
			$link2=mysqli_connect("localhost","root","","5s_web");
			$sql_query1 = "INSERT INTO `tbl_login` (`uid`,`role`,`superadminid`,`parent`,`username`,`firstname`,`lastname`,`password`,`email`,`createdate`) VALUES 
							('', 'auditor', '$superid','$superid','".$_REQUEST['txtemailid']."', '".$_REQUEST['firstname']."', '".$_REQUEST['lastname']."',
				 			'".md5($_REQUEST['txtpassword'])."','".$_REQUEST['txtemailid']."', '$dt')";
			mysqli_query($link2,$sql_query1) or die(mysqli_error($link2));
			$uid = mysqli_insert_id($link2);
			$squery = "insert into tbl_login_relation (`id`,`uid`,`superadminid`,`status`,`applogin_status`,`producttype`,`createdate`)
		   					values ('','$uid','$superid','".$_REQUEST['role']."','0','5s','".date('Y-m-d')."') ";
			mysqli_query($link2,$squery) or die(mysqli_error($link2)) ;
			mysqli_close($link2);
			$ch1 = curl_init();
			curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/insert.php");
			curl_setopt($ch1,CURLOPT_POST,true);
			$data = array('name' => $_REQUEST['txtusername'] , 'email' => $_REQUEST['txtemailid'] ,'password' => $_REQUEST['txtpassword'] );
			curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
			curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
			$result = curl_exec($ch1);
			curl_close($ch1);
	 		include("dbconnect.php"); 
			$squery = "INSERT INTO `tbl_settings` (`sid`, `key`, `value`,`superadminid`, `uid`) VALUES ('','default_language','9','$superid','$uid'), 
													('', 'default_language_question', '9', '$superid', '$uid')";
			mysqli_query($sql,$squery) or die(mysqli_error($sql));
			header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/yes/userlist");
		}
	}
	if(isset($_REQUEST['cmdupdate']))//update project
	{
				$sql=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
		if(isset($_REQUEST["status"]))
		{
			$sql_query1="UPDATE `tbl_login_relation` SET `status` = '".$_REQUEST['status']."' WHERE `uid` = '".$_REQUEST["txtid"]."' ";
			$result=mysqli_query($sql,$sql_query1);
		}
		
	 	if($_REQUEST["txtpassword"] == '')
		{
			$sql_query="UPDATE `tbl_login` SET `firstname` = '".$_REQUEST['firstname']."',`lastname`='".$_REQUEST['lastname']."',`email` = '".$_REQUEST["txtemailid"]."',
					`username` = '".$_REQUEST["txtemailid"]."' WHERE `uid` = '".$_REQUEST["txtid"]."' and role = 'auditor' ";
								
		}
		else
		{
			$pwd=$_REQUEST['txtpassword'];
			$ch1 = curl_init();
			curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/passwordreset.php");
			curl_setopt($ch1,CURLOPT_POST,true);
			$data = array('email' => $_REQUEST['txtemailid'] ,'password' => $pwd );
			curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
			curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
			curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
			$result = curl_exec($ch1);
			curl_close($ch1);
			$sql_query="UPDATE `tbl_login` SET `firstname` = '".$_REQUEST['firstname']."',`lastname`='".$_REQUEST['lastname']."',`email` = '".$_REQUEST["txtemailid"]."',
						`password` = '".md5($pwd)."' WHERE `uid` = '".$_REQUEST["txtid"]."' and role = 'auditor' "; 
			
		}
		$result=mysqli_query($sql,$sql_query);	
			
		mysqli_close($sql) or die(mysqli_error());

		
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/updated/userlist"); 
	}
?>