<?php 
session_start();
include_once("sadmin_dbconnect.php");

        if(isset($_REQUEST["cmdupdate"]))
        {            
            $id=$_REQUEST["txtid"];
            $dt = date("Y-m-d", strtotime($_REQUEST['txtval']));
          $query="UPDATE `coupon_mgt` SET `type` = '".$_REQUEST["drptype"]."',`prod_type`='".$_REQUEST["drpptype"]."',`amount` = ".$_REQUEST["txtamt"].",
              `validity` = '$dt',`coupon_code` = ".$_REQUEST["txtcc"]." WHERE `Id`=$id ";
            mysqli_query($sql,$query);
            
            header("Location:admin_couponlist.php?update");            
        }        
?>