<?php 
session_start(); 
include("dbconnect.php");
include("header.php"); 
?>
<?php
if(isset($_SESSION['norecuring']) && $_SESSION['norecuring']== 0)
{?>
<script>
alert("Email or display name already exist");
</script>
<?php $_SESSION['norecuring']=1;} ?>
<script type="text/javascript" language="javascript">
function displayform()
{
	document.location = 'pricing_plans';
	
}
function checkform()
{
	
	if(document.frmrecpage.agree.checked == '')
            {
                 return false;
  	        }		
	if(document.frmrecpage.txtpfirstname.value == '')
	{
		alert("please enter firstname");
		return false;
	}	
	if(!document.frmrecpage.txtpfirstname.value.match(/^[a-zA-Z\ \']+$/))
	{
		alert("only letters");
		return false;
	}	
	if(document.frmrecpage.txtdispname.value == '')
	{
		alert("please enter displayname");
		return false;
	}	
	if(!document.frmrecpage.txtdispname.value.match(/^[a-zA-Z\\']+$/))
	{
		alert("only letters dnm");
		return false;
	}
	if(document.frmrecpage.txtpemail.value == '')
	{
		alert("please enter email");
		return false;
	}	
	if(!document.frmrecpage.txtpemail.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
	{
		alert("please enter valid email id");
		return false;
	}
		
	 var x = document.frmrecpage.txtphone.value;
       
        if (x==null || x=="")
 	 {
 		 alert("Phone number cannot be left blank");
 		 return false;
 	 }       

       	 if(isNaN(x)|| x.indexOf(" ")!=-1)
	{
              			alert("Enter numeric value");
			return false;
                }
       			 if (x.length > 10)
			{
                			alert("enter 10 characters"); 
				return false;
          			 }
		
		
			if(document.frmrecpage.txtpass.value !=document.frmrecpage.txtcpass.value)
	{
		alert("password do not match");
		return false;
	}
			return true;
}
</script>
<?php
	if(isset($_REQUEST['pay']))
 	{
		$user=$_REQUEST['noofusers'];
		$price=$_REQUEST['price'];
		$period =1;
		$no_period =1;
		$paymenttype = $_REQUEST['payment_methodss'];
		$planname = $_REQUEST['planname'];
		$coupncode = $_REQUEST['couponcode'];
 	}	
	if(strpos($_SERVER['REQUEST_URI'],'newplan') || strpos($_SERVER['REQUEST_URI'],'upgrade'))
	{
		$str_explode = explode('/',$_SERVER['REQUEST_URI']);
		$count=count($str_explode);
		$uid = $str_explode[$count-2];
		$sql_connect=mysqli_connect("localhost","root","") or die('Could not connect: ');
		mysqli_select_db($sql_connect,"5s_web") or die ('Can\'t use foo : ' . mysqli_error($sql_connect)); 
		$sqlselect = "select * from tbl_login where uid= ".$uid;
		$res = mysqli_query($sql_connect,$sqlselect) or die(mysqli_error($sql_connect));
		while($r = mysqli_fetch_array($res))
		{
			$firstname = $r['firstname'];
			$lastname = $r['lastname'];
			$displayname = $r['displayname'];
			$username = $r['username'];	
			$emailid = $r['email'];
			$phone = $r['phone'];
		}
		$sqlselectplan = "select * from tbl_plan where uid= ".$uid;
		$rs = mysqli_query($sql_connect,$sqlselectplan) or die(mysqli_error($sql_connect));
		/*while($row = mysql_fetch_array($rs))
		{
			$user = $row['num_of_user'];
			$price = $row['price'];
			$paymenttype = $row['payment_type'];
			$coupncode = $row['coupon_code'];
			$planname = $row['plan_id'];
			$period =1;
			$no_period =12;
		}*/
		mysqli_close($sql_connect);
	}

	if(strpos($_SERVER['REQUEST_URI'],'/no/'))	
	{
?>	
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0 wrapper nNote nFailure hideit">
			<p>
				<strong>FAILURE: </strong> Oops sorry. User Name & E-mail Id Must Be Unique.Click on Sign Up Link.
			</p>		
		</div>  
<?php	
	}
	if(strpos($_SERVER['REQUEST_URI'],'noauthorize'))	
	{
?>	
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0 wrapper nNote nFailure hideit">
			<p>
				<strong>FAILURE: </strong>Oops sorry.Fill All Value Correctly.Click on Sign Up Link.
			</p>		
		</div>  
<?php	
	}	
?>	
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0 wrapper">
         <div class="border pl-1 pt-2">
            <h6><i class="fa fa-bars" aria-hidden="true"></i> Proceed </h6>
         </div>
		<div class="container mt-3">

<?php
	if(strpos($_SERVER['REQUEST_URI'],'upgrade') )
 	{
?>          
    	<form method="post" action="upgradepayment.php" class="mainForm" name="frmrecpage" id="valid" >
<?php
	}
	else if(strpos($_SERVER['REQUEST_URI'],'newplan'))
	{
?>	 
		<form method="post" action="recurpaymentdetails.php" class="mainForm" name="frmrecpage" id="valid" >
<?php	 
	}
 	else
 	{
?>	 
		<form method="post" action="recuringpayment.php" class="mainForm" name="frmrecpage" id="valid" >
<?php	 
	}
?>  
		<div class="container">
			<fieldset>
				
            		<div class="form-group row">
               			<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">First Name: <span class="req text-danger">*</span></label>
                 		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input name="txtpfirstname" type="text" value ="<?php echo $firstname;?>" class="form-control form-control-sm"/>
						</div>
						<div class="clearfix"></div>
     				</div>	
            		                   					
             		<div class="form-group row">
						<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label"> Last Name: <span> </span></label>
                 		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input name="txtplastname" type="text"  value ="<?php echo $lastname;?>" class="form-control form-control-sm"/>
						</div>
						<div class="clearfix"></div>
     				</div>	 
					<div class="form-group row" >
						<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Display Name: <span class="req text-danger">*</span></label>
             			<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 input-group input-group-sm">
							<div class="input-group-append">
								<span class="input-group-text"> 5s.niftysol.com/ &nbsp;</span>
							</div>
							<input name="txtdispname" type="text" value ="<?php echo $displayname;?>" 
							<?php if(strpos($_SERVER['REQUEST_URI'],$uid)){echo 'readonly = "readonly"'; }?> class="form-control form-control-sm" />
               			</div>
						<div class="clearfix"></div>
					</div>	
       				<div class="form-group row" >
						<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label"> Email Id: <span class="req text-danger">*</span></label>
                   		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input  type="text" name="txtpemail" value ="<?php echo $emailid;?>" 
                            <?php if(strpos($_SERVER['REQUEST_URI'],$uid)){ echo 'readonly = "readonly"'; }?> class="form-control form-control-sm" />
						</div>
						<div class="clearfix"></div>
					</div>
    				<div class="form-group row" >
						<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label"> Phone Number: <span class="req text-danger">*</span></label>
                   		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 input-group input-group-sm">
							<div class="input-group-append">
								 <span class="input-group-text">
									<?php $phone1 = explode(" ", $phone);?>
										<input name="txtcntrycode" type="text" value="<?php echo $phone1[0]?>" class="form-control form-control-sm"
										<?php if(strpos($_SERVER['REQUEST_URI'],$uid)){ echo 'readonly = "readonly"'; }?> />
								</span>
							</div>
							<input  type="text" name="txtphone" value ="<?php echo $phone1[1];?>" class="form-control form-control-sm"
                            <?php if(strpos($_SERVER['REQUEST_URI'],$uid)){ echo 'readonly = "readonly"'; }?> />
						</div>
						<div class="clearfix"></div>
					</div>
               		<div class="form-group row">
						<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Password: <span class="req text-danger">*</span></label>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6" >
							<input type="password" name="txtpass" class="form-control form-control-sm">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
		   				<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label">Confirm password: <span class="req text-danger">*</span></label>
                   		<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="password" name="txtcpass" class="form-control form-control-sm">
						</div>
						<div class="clearfix"></div>
					</div>     
					<div class="form-group row">
						<label class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 col-form-label"> Please check: <span class="req text-danger">*</span></label>	
    					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" name="agree" class="custom-control-input" id="customCheck">
								<label class="custom-control-label" for="agree" ><a href="terms&condition/terms.pdf" target="blank">Accept terms? </a> </label>
							</div>
                        </div>
						<div class="clearfix"></div>
					</div>  
					<div class="form-group row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">	
							<?php 										
							if(strpos($_SERVER['REQUEST_URI'],'newplan'))
							{ 
							?>
								<input  type="hidden" name="txtnewplan" value="newuser" >
							<?php
							}
							if(strpos($_SERVER['REQUEST_URI'],'upgrade'))
							{
							?> 
								<input  type="hidden" name="txtnewplan" value="upgrade" >
							<?php
							}
							?> 
							
							<input  name="user" type="hidden" value="<?php echo $user; ?>" />
							<input  name="amount" type="hidden" value="<?php  echo $price; ?>" />		
							<input name="no_of_time_period" type="hidden" value="<?php  echo $no_period; ?>" />   
							<input name="plan_name" type="hidden" value="<?php echo $planname; ?>" />
							<input name="coupncode" type="hidden" value="<?php echo $coupncode; ?>" />
							<input name="paymenttype" type="hidden" value="<?php  echo $paymenttype; ?>" />
							<input  class="greenBtn btn btn-success btn-sm" type="submit" value="Proceed" name="cmdproceed"  onclick="return checkform()">
							<input class="greenBtn btn btn-success btn-sm"  id="userinfobtn" type="button" value="Cancel" name="cmdcancel" onclick="displayform()" >
							<div class="clearfix"></div>
						</div>
			</fieldset>
		</div>	
		</form>
	</div>
</div>
<?php include("footer.php");?>