<?php  
	 session_start(); 
	 include("dbconnect.php");
	 if(!isset($_SESSION['uname'])){header('location:login');}	
	 include("header.php"); 
	 include("left_menu.php");
	 $sql=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	// $sql=mysql_connect("localhost","root","Bigyear2012") or die('Could not connect: ' . mysql_error());	
	// mysql_select_db("5s_web",$sql) or die ('Can\'t use foo : ' . mysql_error());	 
 	 if(strpos($_SERVER['REQUEST_URI'],"update_userlist"))
	 { 
	 	$str_explode = explode('/',$_SERVER['REQUEST_URI']);
		$count=count($str_explode);
		$uid = $str_explode[$count-2];	
	 	// $sql_query= "select * from tbl_login where uid='".$uid."'";
	 	$sql_query= "select l.*,r.status as rstatus from tbl_login as l
		LEFT join tbl_login_relation as r on l.uid=r.uid 
		where l.uid='".$uid."'";
		
	 	$sql_query_status = "select status from tbl_login_relation where uid='".$uid."'";
		$result_status = mysqli_query($sql,$sql_query_status);
		while($rows=mysqli_fetch_array($result_status))
		{
			$role=$rows['status'];
		}
		
		$result=mysqli_query($sql,$sql_query);
		while($row=mysqli_fetch_array($result))
		{
			/* var_dump($row); */
			$id=$row['uid'];
			$uname= $row['username'];
			$fname = $row['firstname'];
			$lname = $row['lastname'];
			$email=$row['email'];
			$password=$row['password'];
			$_SESSION['password'] = $password;
			$rstatus=$row['rstatus'];
		}
	}
	mysqli_close($sql) or die(mysqli_error($sql)); 
?>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
      <h6> <?php echo EDIT." ".USER." ".INFORMATION ?></h6>
	</div>
 	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0 border">
    	<div class="border pl-1 pt-2"><h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo EDITPROFILE ?></h6></div>
		<div class="container mt-3">	
			<form action="addnewuser.php" class="mainForm" name="frmeditulist" method="post"  id="valid" >
				<fieldset>
					<input type="hidden" name="txtid" value="<?php if(strpos($_SERVER['REQUEST_URI'],$uid)) {echo $id; }?>">
					<input type="hidden" name="txtusername" value="<?php if(strpos($_SERVER['REQUEST_URI'],$uid)) {echo $uname; }?>" />				
					<div class="form-group row ">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo FIRST." ".NAME.":" ?> <span class="req text-danger">*</span></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input name="firstname" type="text"  value="<?php if(strpos($_SERVER['REQUEST_URI'],$uid)) echo $fname; ?>"  style="color:#494949;" class="validate[required,custom[onlyLetterSp]] form-control form-control-sm" id="un" />
						</div>
						<div class="clearfix"></div>
					</div>	                   
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo LAST." ".NAME.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input name="lastname" type="text"  value="<?php if(strpos($_SERVER['REQUEST_URI'],$uid)) echo $lname; ?>" style="color:#494949;" class="form-control form-control-sm"  />
						</div>
						<div class="clearfix"></div>
					</div>                              
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo EMAIL." ".ID.":" ?> <span class="req text-danger">*</span> </label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" name="txtemailid" value="<?php if(strpos($_SERVER['REQUEST_URI'],$uid)) {echo $email; }?>" style="color:#494949;" id="eid" class="validate[required,custom[email]] form-control form-control-sm"/>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo NEW_T." ".PASSWORD.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="password" name="txtpassword" placeholder="enter new password" style="color:#494949;" id="password" class="form-control form-control-sm" />
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
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo STATUS.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 CUST_radio">
							<input type="radio" name="status" style="color:#494949;" value="0" class=" imgopocity" <?php if($rstatus == 0){echo "checked='checked'";}?>/> Active
							&ensp;&ensp;
							<input type="radio" name="status" style="color:#494949;" value="1" class=" imgopocity"  <?php if($rstatus == 1){echo "checked='checked'";}?>/> Deactive
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
							<input class="btn btn-success btn-sm" type="submit" value="<?php echo UPDATE ?>" name="cmdupdate">	
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	
        <div class="clearfix"></div>
	</div>	
	</div>	
</div>   
<?php include("footer.php"); ?>