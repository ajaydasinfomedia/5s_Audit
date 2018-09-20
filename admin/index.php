<?php include("../header.php"); 
?>

<div class="loginWrapper">
<?php
if(strpos($_SERVER['REQUEST_URI'],'success'))
{
?>
<div class="nNote nSuccess hideit">
	<p>
		<strong>SUCCESS: </strong>
			Thank you for sign up. Now, you can Log In!!!!
	</p>
	</div>
<?php
}	

if(strpos($_SERVER['REQUEST_URI'],'no'))

				{
				?>
					 <div class="nNote nFailure hideit">
						<p>
							<strong>FAILURE: </strong>
							Oops sorry. Username or Password is not valid or Account is Deactivated.
						</p>		
					</div>  
			<?php	
	
	}
if(strpos($_SERVER['REQUEST_URI'],'getuname'))		
{
?>
<div class="nNote nSuccess hideit">
	<p>
		<strong>SUCCESS: </strong>
			Username has been sent to your Email Id!!!!
	</p>
	</div>
<?php
}
	if(strpos($_SERVER['REQUEST_URI'],'getpassword'))	
{
?>
<div class="nNote nSuccess hideit">
	<p>
		<strong>SUCCESS: </strong>
			Password has been sent to your Email Id!!!!
	</p>
	</div>
<?php
}
if(strpos($_SERVER['REQUEST_URI'],'mailsent'))
{
?>
<div class="nNote nSuccess hideit">
	<p>
		<strong>SUCCESS: </strong>
			mail sent!!!!
	</p>
	</div>
<?php
}
?>
<div class="loginPanel">
<div class="head">
<h5 class="iUser">Login</h5>
</div>
<form id="valid" class="mainForm" action="admin/admin_logincheck.php" method="post">
	<fieldset>
		<div class="loginRow noborder">
			<label for="req1">Username:</label>
			<div class="loginInput">
                            <input id="req1" class="validate[required]" type="text" name="txtuname" style="color:#494949;" tabindex="1">
			</div>
			<a href='<?php echo 'forgetusername';?>'>Forgot Username</a>
			<div class="fix"></div>
		</div>
		
		<div class="loginRow">
			<label for="req2">Password:</label>
			<div class="loginInput">
                            <input id="req2" class="validate[required]" type="password" name="txtpassword" style="color:#494949;" tabindex="2">
			</div>
			<a href='<?php echo 'forgetpassword';?>'>Forgot Password</a>
			<div class="fix"></div>
		</div>
		
		<div class="loginRow">					
                    <input style="margin: 0 97px;" class="greenBtn" type="submit" value="Log in" name="cmdlogin">
			<div class="fix"></div>
		</div>
	</fieldset>
</form>
</div>
</div>
<?php include("admin_footer.php");?>
<?php //include("../footer.php"); ?>