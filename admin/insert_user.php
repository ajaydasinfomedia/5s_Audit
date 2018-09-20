<?php 
session_start();
include_once("sadmin_dbconnect.php");

        if(isset($_REQUEST["save_user"]))
        {
            $dt=date("Y-m-d");
            $exp_dt = date("Y-m-d", strtotime($_REQUEST['txtedate']));   
            
            $query="select * from tbl_login where username='".$_REQUEST["txtuname"]."'";
            $res=mysqli_query($sql,$query) or die(mysqli_error($sql));
            $num=mysqli_num_rows($res);            
            
            $query1="select * from tbl_login where displayname='".$_REQUEST["txtdname"]."'";
            $res1=mysqli_query($sql,$query1) or die(mysqli_error($sql));
            $num1=mysqli_num_rows($res1);            
            
            $query2="select * from tbl_login where email='".$_REQUEST["txtemail"]."' ";
            $res2=mysqli_query($sql,$query2) or die(mysqli_error($sql));
            $num2=mysqli_num_rows($res2);            
            if($num >= 1 && $num1 >= 1 && $num2 >= 1){                
                header("location:add_user.php?exists_username&exists_displayname&exists_email");
            }
          else if($num >= 1 && $num1 >= 1){                
                header("location:add_user.php?exists_username&exists_displayname");
            }            
          else if($num >= 1 && $num2 >= 1){                
                header("location:add_user.php?exists_username&exists_email");
            }               
            else if($num1 >= 1 && $num2 >= 1){                
                header("location:add_user.php?exists_displayname&exists_email");
            }
            else if($num >= 1){                
                header("location:add_user.php?exists_username");
            }
            else if($num1 >= 1){                
                header("location:add_user.php?exists_displayname");
            }
            else if($num2 >= 1){                
                header("location:add_user.php?exists_email");
            }
            
            else{          
             $query="INSERT INTO `tbl_login` (`uid`, `role`, `email`, `dbname`, `firstname`, `lastname`, 
             `createdate`, `parent`, `superadminid`, `username`, `displayname`, `password`, `status`, 
             `payment_status`, `exp_date`, `subscr_id`, `app_login_status`, `creatdate`) VALUES 
             (NULL, 'admin', '".$_REQUEST["txtemail"]."', '','".$_REQUEST["txtfname"]."','".$_REQUEST["txtlname"]."',
             '$dt','','','".$_REQUEST["txtuname"]."','".$_REQUEST["txtdname"]."', '".md5($_REQUEST["txtpass"])."',
                 '1', '1','$exp_dt','', '1','');";
            
               mysqli_query($query);     
            
            $lid=mysqli_insert_id($sql);
            
            $query1="UPDATE `tbl_login` SET `parent`='$lid',`superadminid`='$lid' WHERE `uid`='$lid'";
               mysqli_query($sql,$query1);     
                              
             $query2="INSERT INTO `tbl_plan`(`planid`,`uid`,`num_of_user`,`price`,`num_of_period`,`payment_type`, 
            `subscr_id`, `plan_type`, `coupon_code`, `createdate`) VALUES (NULL, '$lid',".$_REQUEST["txtuser"].",
                ".$_REQUEST["txtprice"].", 'custom', '".$_REQUEST["txtpm"]."','','".$_REQUEST["drpptype"]."',
                '', '$dt');";
                mysqli_query($sql,$query2);     
                                           
            header("location:add_user.php?save");         
            }
        }
        
?>