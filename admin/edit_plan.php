<?php 
session_start();
include_once("sadmin_dbconnect.php");

        if(isset($_REQUEST["cmdupdate"]))
        {            
          $query="update plan_options set `total_user`='".$_REQUEST["txttotuser"]."',
                `price`=".$_REQUEST["txtprice"].",`plan_name`='".$_REQUEST["txtpname"]."'
                    where plan_id=".$_REQUEST["txtpid"]." ";
            mysqli_query($sql,$query);
            header("Location:admin_planmgt.php?update");            
        }        
?>