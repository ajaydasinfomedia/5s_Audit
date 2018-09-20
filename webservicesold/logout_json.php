<?php
include_once("dbconnect.php");  
                      
            $query="UPDATE `tbl_login_relation` SET applogin_status=0 WHERE uid =".$_REQUEST['uid'] ;
            mysql_query($query) or die(mysql_error());
			                    
?>