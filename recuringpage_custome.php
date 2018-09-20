<script type="text/javascript" language="javascript">
function displayform()
{
	document.location = 'formcustome';
}
</script>
<?php 
session_start();
include("header.php"); 
include("dbconnect.php");
if(isset($_REQUEST['cmdcustom']))
{
$user=$_POST['txtuser'];
$price=$_POST['txtprice'];
$period = $_POST['txtperiod'];
$paymenttype = $_POST['paysitecustom'];
$coupncode = $_POST['cc'];
}
$_SESSION['no_of_user'] = $user;
$_SESSION['payment_type'] = $paymenttype;
$_SESSION['coupon_code'] = $coupncode;
if($_REQUEST['paysitecustom'] == 'Paypal' && isset($_REQUEST['cmdcustom']))
{
?>		
<div class="content" style="margin: 0 141px;">		
	<form method="post" action="custompaypal.php" class="mainForm" name="frmcustompage" id="valid" >
	<fieldset>
	
	<div class="widget first">
		<div class="head">
			<h5 class="iFrames">Proceed</h5>
		</div>
		
		<?php
		if(strpos($_SERVER['REQUEST_URI'],'no'))	
				{
				?>	
					 <div class="nNote nFailure hideit">
						<p>
							<strong>FAILURE: </strong>
							Oops sorry. User Name & E-mail Id Must Be Unique.Click on Sign Up Link.
						</p>		
					</div>  
			<?php	
				}
			?>	
				<input  name="user" type="hidden" value="<?php echo $user; ?>"  style="color:#494949;" readonly="yes" >
				<input  name="amount" type="hidden" value="<?php echo $price; ?>"  >		
			   <input name="no_of_time_period" type="hidden" 
			   value="12"  style="color:#494949;" readonly="yes" />
				<input name="time_period" type="hidden" value="<?php echo $period; ?>"  style="color:#494949;" readonly="yes"  >
		 <div class="rowElem" style="padding:0 16px;">
			<label> First Name:<span class="req">*</span></label>
			<div class="formRight">
				<input name="txtpfirstname" type="text" id="fnm" class="validate[required,custom[onlyLetterSp]]"  
				style="color:#494949;"/>
			</div>
			<div class="fix"></div>
     </div>	                   
                                
        <div class="rowElem" style="padding:0 16px;">
			<label> Last Name:</label>
			<div class="formRight">
				<input name="txtplastname" type="text" id="lnm" class="validate[custom[onlyLetterSp]]" style="color:#494949;"/>
			</div>
			<div class="fix"></div>
     </div>	 
			
	<div class="rowElem" style="padding:0 16px;">
			<label>Display Name : <span class="req">*</span> </label>
			<div class="formRight">
              <label style="float: left; margin-left: -10px;margin-right: -9px;">5s.niftysol.com/ 
            </label>
				 <input name="txtdispname" type="text" style="color:#494949;border: 1px solid #D5D5D5;
    width:53%;" id="dis" 
				class="validate[required,custom[onlyLetterSp],custom[onlyLetterNumber]]" 
				style="color:#494949;" >
			</div>
			<div class="fix"></div>
	</div>	
					

				<input name="fpname" type="hidden"   style="color:#494949;" id="r2" 
				class="validate[required,custom[onlyLetterNumber]]" >

				
	<div class="rowElem" style="padding:0 16px;">
			<label >Email Id : <span class="req">*</span> </label>
			<div class="formRight">
				<input  type="text" name="txtpemail"  style="color:#494949;" id="r3" class="validate[required,custom[email]]" >
			</div>
			<div class="fix"></div>
	</div>
				<input  type="hidden" name="txttoemail" value="sunil_1344255754_biz@dasinfomedia.com" >
					  
	<div class="rowElem" style="padding:0 16px;">
			<label>Password : <span class="req">*</span></label>
			<div class="formRight">
				<input type="password" name="txtpass"  style="color:#494949;" id="password" class="validate[required]" >
			</div>
			<div class="fix"></div>
	</div>
	
	<div class="rowElem" style="padding:0 16px;">
		   <label >Confirm Password : <span class="req">*</span></label>
			<div class="formRight">
				<input type="password" name="txtcpass"  style="color:#494949;" id="password2" 
				class="validate[required,equals[password]]">
			</div>
			<div class="fix"></div>
	</div>         	
				<input class="greenBtn" type="submit" value="Proceed" name="cmdproceed" style="margin-left:191px;" >
				<input class="greenBtn" type="button" value="Cancel" name="cmdcancel" style="margin-left:10px;" 
				onclick="displayform()" >
				
	</div>
	</fieldset>	
	</form>
</div>
<div class="fix"></div>
</div>
<?php
}
?>