<?php  
	session_start(); 
	include("dbconnect.php");	 
	if(!isset($_SESSION['uname'])){header('location:login');}	
	include("header.php"); 
	include("left_menu.php");
	$suid = $_SESSION['said'];
	$uid = $_SESSION['uid'];
	$sql=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	if($suid == $uid)
	{
	 	$sql_query= "select * from tbl_login where superadminid='$suid' and role = 'admin' ";
	}
	else
	{
		$sql_query= "select * from tbl_login where superadminid='$suid' and `uid` = '$uid' and role = 'auditor' ";
	}
	$result=mysqli_query($sql,$sql_query);
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['uid'];
		$uname= $row['username'];
		$fname = $row['firstname'];
		$lname = $row['lastname'];
		$dname = $row['displayname'];
		$email=$row['email'];
		$phone=$row['phone'];
		$password=$row['password'];
		$_SESSION['password'] = $password;
	}
	mysqli_close($sql) or die(mysqli_error($sql)); 		
?>
<script language="javascript" type="application/javascript">
	function valid()
	{
		var x = document.forms["frmeditulist"]["txtphone"].value;
		
		var isValid = false;
		var regex = /^(?=.*[0-9])[- +()0-9]+$/;
		isValid = regex.test(x);
		
       	if (!isValid)
 	 	{
 		 	alert("Enter Valid Phone Number");
 		 	return false;
 		}       
		/* if(isNaN(x)|| x.indexOf(" ")!=-1)
		{
        	alert("Enter numeric value");
			return false;
        } */
       	if (x.length > 16)
		{
        	alert("Enter 15 characters"); 
			return false;
        }
	}
</script>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6><?php echo EDIT." ".PERSONAL." ".INFORMATION ?></h6></div>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
		<div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>  <?php echo EDITPROFILE ?></h6>
		</div>	
		<div class="container my-3">
			<form action="addprofile.php" class="mainForm" name="frmeditulist" method="post"  id="valid" >
				<fieldset> 
					<?php
					if($suid == $uid)
					{
					?>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo DISPLAY." ".NAME.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" name="txtdisplayname" placeholder="enter your text here" value="<?php echo $dname; ?>" style="color:#494949;" class="validate[required] form-control form-control-sm" id="dnm" readonly="yes"/>
						</div>
						<div class="clearfix"></div>
					</div>
					<?php
					}
					?> 
					<input type="hidden" name="txtusername" value="<?php echo $uname; ?>" />
					<div class="form-group row ">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo FIRST." ".NAME.":" ?> <span class="req text-danger">*</span></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input name="firstname" type="text"  value="<?php echo $fname; ?>"  style="color:#494949;" id="fnm" class="validate[required,custom[onlyLetterSp]] form-control form-control-sm" />
						</div>
						<div class="clearfix"></div>
					</div>	                   
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo LAST." ".NAME.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input name="lastname" type="text" id="lnm"  value="<?php echo $lname; ?>" style="color:#494949;" class="validate[custom[onlyLetterSp]] form-control form-control-sm"/>
						</div>
						<div class="clearfix"></div>
					</div>                    
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo EMAIL." ".ID.":" ?> <span class="req text-danger">*</span> </label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" name="txtemailid" value="<?php echo $email; ?>" style="color:#494949;" class="form-control form-control-sm"  readonly="readonly"/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo PHONE.":" ?> <span class="req text-danger">*</span> </label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" name="txtphone" value="<?php echo $phone; ?>" style="color:#494949;" class="form-control form-control-sm"/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo NEW_T." ".PASSWORD.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="password" name="txtpassword" placeholder="enter new password" style="color:#494949;" class="form-control form-control-sm" id="password" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CONFIRM." ".PASSWORD.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="password" name="txtcpassword" placeholder="re-enter password" style="color:#494949;" id="password2" class="validate[equals[password]] form-control form-control-sm"/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
							<input class="btn btn-success btn-sm" type="submit" onclick="return valid();" value="<?php echo UPDATE ?>" name="cmdupdateprofile">
						</div>
					</div>
				</fieldset>
			</form>
		</div>	
	</div>	
	</div>	
	<div class="clearfix"></div>
</div>
<?php include("footer.php"); ?>