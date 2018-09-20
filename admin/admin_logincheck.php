<?php
	session_start();
	include("sadmin_dbconnect.php");	
	if(isset($_REQUEST["cmdlogin"]))
	{	
	    echo $query="select * from tbl_login where username='admin' and password='".md5($_REQUEST["txtpassword"])."' ";
            
		$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
		$num=mysqli_num_rows($result);
		if($num > 0)
		{	
                    while($row=mysqli_fetch_array($result))
			{
                        	 $id=$row['uid'];
                                 $sid=$row['superadminid'];
				 $uname=$row['username'];
                                 
                                 $_SESSION['uname']=$uname;
				 $_SESSION['uid']=$id;
				 $_SESSION['said']=$sid;	
                    }
                    
		 header("Location:admin_index.php");		
		}	
		else
		{
				 header("Location:index.php");
		}	
	}		
	else
	{
            header("Location:index.php");								
	}	
?>
