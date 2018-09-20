<?php 
session_start();
include_once("sadmin_dbconnect.php");
if(isset($_REQUEST["id"]))
{
    $query="delete from coupon_mgt where Id=".$_REQUEST["id"]." ";
        mysqli_query($sql,$query) or die(mysqli_error($sql));
        header("location:admin_couponlist.php?delete");
}	        
?>
