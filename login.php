<?php 
session_start();

include("livesite_header.php"); 

$base_path = "http://" . $_SERVER['SERVER_NAME']."/5s/";
?>
<div class="inner-bg"></div>
	<div id="content-wrapper">
		<div class="container">
        	<div class=" sixteen columns">
    			<div id="primary">
					<div id="content" role="main">
						<div class="six columns sloginfrm">
						<?php
						if(strpos($_SERVER['REQUEST_URI'],'success'))
						{
						?>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 hideit successbox">
								<p class="alertmsg">
									<strong style="margin-right: 5px;">SUCCESS: </strong>Thank you for sign up.You can login now!
								</p>
							</div>
						<?php
						}	
						?>
						<?php
						if(strpos($_SERVER['REQUEST_URI'],'no'))
						{
						?>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 failurebox">          
								<p class="alertmsg">
									<strong style="margin-right: 5px;">FAILURE: </strong>Oops sorry. Username or Password is not valid or Account is Deactivated.
								</p>		
							</div>  
						<?php	
						}
						if(strpos($_SERVER['REQUEST_URI'],'getuname'))		
						{
						?>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 alertmsg">
								<p class="alertmsg">
									<strong style="margin-right: 5px;">SUCCESS: </strong> Username has been sent to your Email Id!
								</p>
							</div>
						<?php
						}
						if(strpos($_SERVER['REQUEST_URI'],'getpassword'))	
						{
						?>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 alertmsg">
								<p class="alertmsg">
									<strong style="margin-right: 5px;">SUCCESS: </strong>Password has been sent to your Email Id!
								</p>
							</div>
						<?php
						}
						?>
     					<div class="loginwrapper">
                            <div class="loginpanel">
                                <img src="images/icons/middlenav/users.png" style="margin:7px; float: left" />   
                                <h5 class="loginhead">Login</h5>
                            </div>
        					<form id="valid" class="cssform" action="logincheck.php" method="post">
            					<fieldset style="float: left;width: 100%;">
                
            						<div class="rowelement">
               	 						<label class="formleft" for="req1">Email Id:</label>
                        				<div class="formright">
                            				<input style="-moz-box-sizing: border-box;background: none repeat scroll 0 0 #FFFFFF; border: 1px solid #D5D5D5;font-family: Arial,Helvetica,sans-serif;
    														font-size: 11px;padding: 0;color:#494949;width:145px;"  type="text" name="txtuname"  tabindex="1">
										</div>             
                        				<div style="clear: both;"></div>
									</div>
		
		 							<div class="rowelement">
                						<label class="formleft" for="req2">Password:</label>
                        				<div class="formright">
                            			<!--[if gte Chrome 6]>
											<input style="-moz-box-sizing: border-box; background: none repeat scroll 0 0 #FFFFFF; border: 1px solid #D5D5D5;
   														 	font-family: Arial,Helvetica,sans-serif;font-size: 11px; padding: 5px; width: 97%;"
                                							 type="password" name="txtpassword" style="color:#494949;" tabindex="2">
										<![endif]-->
                            			<input style="-moz-box-sizing: border-box;background: none repeat scroll 0 0 #FFFFFF; border: 1px solid #D5D5D5;font-family: Arial,Helvetica,sans-serif;
    														font-size: 11px;padding: 0;color:#494949;width:145px;height:26px;" type="password" name="txtpassword"  tabindex="2">
										</div>
            							<a class="forgotpwd" href='<?php echo 'forgotpassword';?>'>Forgot Password ? </a>
                        				<div style="clear: both;"></div>
									</div>
		
									<div class="bordertopbtn" >					
										<input  class="bt_login m btnsubmit" type="submit" value="Login" name="cmdlogin">
                    					<div style="clear: both;"></div>
									</div>
								</fieldset>
							</form>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include("livesite_footer.php"); ?>