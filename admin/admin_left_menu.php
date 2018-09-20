<!-- Content wrapper -->
<div class="wrapper">
	<!-- Left navigation -->
    <div class="leftNav">
    	<ul id="menu"  style="width: 218px;">
			<li class="manage"><a style="font-size: 16px;" href="<?php echo "admin/admin_index.php" ?>" title="" 
			<?php if((strpos($_SERVER['REQUEST_URI'],"admin_index.php"))
                                ||
                                (strpos($_SERVER['REQUEST_URI'],"admin_viewdtls.php"))
                                ||
                                (strpos($_SERVER['REQUEST_URI'],"admin_purchase_plandtls.php")))                             						
			{ echo 'class="active"'; }?>>
			<span>User Management</span></a></li>	
                        
                        <li class="create"><a style="font-size: 16px;" href="<?php echo "admin/add_user.php" ?>" title="" 
			<?php if((strpos($_SERVER['REQUEST_URI'],"add_user.php")))                                
			{ echo 'class="active"'; }?>>
			<span>Add User</span></a></li>
                        
                        <li class="manage"><a style="font-size: 16px;" href="<?php echo "admin/admin_planmgt.php" ?>" title="" 
			<?php if((strpos($_SERVER['REQUEST_URI'],"admin_planmgt.php"))
                                ||(strpos($_SERVER['REQUEST_URI'],"admin_editplan.php")))                             						
			{ echo 'class="active"'; }?>>
			<span>Plan Management</span></a></li>
                        
                        <li class="create"><a style="font-size: 16px;" href="<?php echo "admin/admin_couponmgt.php" ?>" title="" 
			<?php if((strpos($_SERVER['REQUEST_URI'],"admin_couponmgt.php")))                               
			{ echo 'class="active"'; }?>>
			<span>Coupon Management</span></a></li>
                        
                        <li class="manage"><a style="font-size: 16px;" href="<?php echo "admin/admin_couponlist.php" ?>" title="" 
			<?php if((strpos($_SERVER['REQUEST_URI'],"admin_couponlist.php"))
                                ||(strpos($_SERVER['REQUEST_URI'],"admin_editcoupon.php")))                             						
			{ echo 'class="active"'; }?>>
			<span>Coupon Listing</span></a></li>
                        
                         <li class="manage"><a style="font-size: 16px;" href="<?php echo "admin/admin_editcplan.php" ?>" title="" 
			<?php if((strpos($_SERVER['REQUEST_URI'],"admin_editcplan.php")))                               
			{ echo 'class="active"'; }?>>
			<span>Custom Plan Management</span></a></li>
            
                <li class="manage"><a style="font-size: 16px;" href="<?php echo "admin/admin_notification.php" ?>" title="" 
			<?php if((strpos($_SERVER['REQUEST_URI'],"admin_notification.php")))                               
			{ echo 'class="active"'; }?>>
			<span>Notification Center</span></a></li>
                        
	</ul>
    </div>