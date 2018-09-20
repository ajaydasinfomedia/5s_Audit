<?php
include("../dbconnect.php");

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
$email = $_REQUEST["email_id"];
    if(isset($email))
    {
		
		$sql = "select * from tbl_login where email = '".$email."' ";
				$result = mysql_query($sql) or die(mysql_error());
				$num = mysql_num_rows($result);
				//echo $num."hi<br>";
				if($num > 0)
				{
					while($row=mysql_fetch_array($result))
 					 {
   					$uname= $row['username'];
  		 			 }
								if($_REQUEST['reqstatus'] == '1')
								{
									echo '1';
									 $to = $_REQUEST["email_id"];
     								 $from = "Niftysol";
    								 $subject = "Your Username";
									 $message = "  <body bgcolor='#DCEEFC'>  
													<b>".$uname."</b> <br>
 													 </body>
													</html>";
   
    								$headers  = "From: $from \r\n";
    								$headers .= "Content-type: text/html\r\n";
									$headers .= "Reply-To: sales@niftysol.com \r\n";
									exit;
								}
								else
								{			
								echo '1';	 
											$password = createPassword(8);
											
											
											
											$ch1 = curl_init();
											 curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/passwordreset.php");
											 curl_setopt($ch1,CURLOPT_POST,true);
					 						 $data = array('email' => $email ,'password' => $password );
					  						 curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
					   						 curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
											 curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
					 						 $result = curl_exec($ch1);
											 curl_close($ch1);
 
											 $to = $email;
     										$from = "Niftysol";
     										$subject = "Your Password";
    										$message = "  <body bgcolor='#DCEEFC'>  
															<b>".$password."</b> <br>
  																</body>
															</html>";
   
    										$headers  = "From: $from \r\n";
    										$headers .= "Content-type: text/html\r\n";
											$headers .= "Reply-To: sales@niftysol.com \r\n";
  											 mail($to, $subject, $message, $headers);
											 
											 $sql_update = "update tbl_login set password = '".md5($password)."' where email = '".$email."'";
											 mysql_query($sql_update) or die(mysql_error());

									exit;
								}
			 
					
					 $logs= 1;
				}
				else
				{
					   $logs = 0;
				}
			
	}
	else
	{
		   $logs = 0;
	}
	
	echo $logs;
?>