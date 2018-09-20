<?php 
session_start();
include_once("sadmin_dbconnect.php");

        if(isset($_REQUEST["cmdupdate"]))
        {            
          $query="update plan_options set `total_user`='".$_REQUEST["txttotuser"]."',
                `price`=".$_REQUEST["txtprice"].",`plan_name`='".$_REQUEST["txtpname"]."'
                    where plan_name='".$_REQUEST["txtpname"]."' ";        
            mysqli_query($sql,$query);
            
            header("Location:admin_editcplan.php?update");            
        }        
?>