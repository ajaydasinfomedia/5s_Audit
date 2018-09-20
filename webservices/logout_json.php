<?php
include_once("dbconnect.php");  
                      
            $query="UPDATE `tbl_login_relation` SET applogin_status=0 WHERE uid =".$_REQUEST['uid'] ;
            mysqli_query($sql,$query) or die(mysqli_error($sql));
			                    
?>