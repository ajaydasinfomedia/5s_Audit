<?php 
session_start();
include_once("sadmin_dbconnect.php");

        if(isset($_REQUEST["save_coupon"]))
        {
            $dt = date("Y-m-d", strtotime($_REQUEST['txtdate']));     
            
            $query="select * from coupon_mgt where coupon_code='".$_REQUEST["txtcc"]."' ";
            $res=mysqli_query($sql,$query) or die(mysqli_error($sql));
            $num=mysqli_num_rows($res);            
            if($num > 1){                
                header("location:admin_couponmgt.php?exists");
            }
            else{
          $query="INSERT INTO `coupon_mgt` (`Id`, `type`,`prod_type` ,`amount`, `validity`, `date_created`, `coupon_code`) 
               VALUES (NULL, '".$_REQUEST["drptype"]."','".$_REQUEST["drpptype"]."',".$_REQUEST["txtamt"].",
               '$dt', CURRENT_TIMESTAMP, '".$_REQUEST["txtcc"]."');";
        
            mysqli_query($sql,$query)  or die(mysqli_error($sql));               
            header("location:admin_couponmgt.php?save");           
            }
        }
        
?>