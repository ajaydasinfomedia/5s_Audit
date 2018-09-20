<?php
include("dbconnect.php");  
    if(isset($_REQUEST["uid"]))
    {
		$uid = $_REQUEST['uid'];
		$sqlprofile = "select * from tbl_login where uid = $uid";
		$res = mysqli_query($sql,$sqlprofile) or die(mysqli_error($sql));
		$no=mysqli_num_rows($res);	
        if($no==0)
        {
            $logs=array("userid"=>0);            
        }
        else
        {
			while($row = mysqli_fetch_array($res))
			{
				$logs=array("displayname"=>$row["displayname"],"username"=>$row["username"],
                "firstname"=>$row["firstname"],"lastname"=>$row["lastname"],"email"=>$row["email"]);
			}
		}
	}
	else
	{
		 $logs=array("userid"=>0);
	}
	  echo json_encode($logs);
?>	