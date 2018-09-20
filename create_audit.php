<?php 

session_start();
if(!isset($_SESSION['uname'])){header('location:login');}
if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
					 {
					  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
					 }
include("header.php"); 
include("left_menu.php"); 
include("dbconnect.php");
?>
<style type="text/css">
#message1,
#message2,#img1,#img2 {
    display: none;
}
</style> 
<script type="text/javascript" language="javascript" >

	function showCompany(str)
	{	
	
		if (str=="")
 		 {
		 	document.getElementById("txtcomplogo").innerHTML="";
 			document.getElementById("txtcomp").innerHTML="";
 			return;
 		 }
		if (window.XMLHttpRequest)
  			{// code for IE7+, Firefox, Chrome, Opera, Safari
  				xmlhttp=new XMLHttpRequest();
  			}
		else
  		{// code for IE6, IE5
 			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		}
		xmlhttp.onreadystatechange=function()
  		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	  {
		 	var f1="own_logo/";
			var f2="own_logo/";
				myresult=xmlhttp.responseText.split(",");
				str1=myresult[0];
				str2=myresult[1];
				str3=myresult[2];
				str4=myresult[3];
				str5=myresult[4];
				str6=myresult[5];
				str7=myresult[6];
				str8=myresult[7];
				
				var image1 = f1 + str2;
				var image2 = f2 + str4;
				
    			document.getElementById("txtcomp").value=str1;
				document.getElementById("txtcomplogo").value=str2;
    			document.getElementById("txtclientcomp").value=str3;
				document.getElementById("txtccomplogo").value=str4;
				


				
			if(str4 =='' && str3 =='' )
				{
				document.getElementById("message1").style.display = 'none';
				document.getElementById("message2").style.display = 'none';
				}
				else
				{
				document.getElementById("message1").style.display = 'block';
				document.getElementById("message2").style.display = 'block';
				}
				if(str2 == '')
				{
				 	document.getElementById("img1").style.display = 'none';
				}
				else
				{
				 	document.getElementById("img1").style.display = 'block';	
				}
				if(str4 == '')
				{
				 	document.getElementById("img2").style.display = 'none';		
				}
				else
				{
				 	document.getElementById("img2").style.display = 'block';	
				}
				var actualWidth = str5;
var actualHeight = str6;
var imgRatio = actualWidth/actualHeight;
var maxRatio = 100.0/100.0;

if(imgRatio!=maxRatio){
if(imgRatio < maxRatio){
imgRatio = 100.0 / actualHeight;
actualWidth = imgRatio * actualWidth;
actualHeight = 100.0;
}
else{
imgRatio = 100.0 / actualWidth;
actualHeight = imgRatio * actualHeight;
actualWidth = 100.0;
}
}
document.getElementById('img1').src= image1;
document.getElementById('img1').height = actualHeight;
document.getElementById('img1').width = actualWidth;




var actualWidth1 = str7;
var actualHeight1 = str8;
var imgRatio1 = actualWidth1/actualHeight1;
var maxRatio1 = 100.0/100.0;

if(imgRatio1!=maxRatio1){
if(imgRatio1 < maxRatio1){
imgRatio1 = 100.0 / actualHeight1;
actualWidth1 = imgRatio1 * actualWidth1;
actualHeight1 = 100.0;
}
else{
imgRatio1 = 100.0 / actualWidth1;
actualHeight1 = imgRatio1 * actualHeight1;
actualWidth1 = 100.0;
}
}			document.getElementById('img2').height = actualHeight1;
			document.getElementById('img2').width = actualWidth1;
			document.getElementById('img2').src= image2;
    	  }
 	   }
	   
		xmlhttp.open("GET","getcompany.php?c="+str,true);
		xmlhttp.send();
}




</script>

<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6><?php echo CREATEAUDIT ?></h6>
	</div>
<?php 
if($create_audit_right == 1){
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
		<div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>      <?php echo CREATEAUDIT ?></h6>
		</div>
		<div class="container my-3">	
			<form action="add_project.php" id="valid" class="mainForm" name="frmaudit" method="post" >
			<fieldset>
			<div class="form-group row noborder">
				<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo SELECTTEMPLATE.":"?> <span class="req text-danger">*</span></label>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<?php	
					$sql_query="select * from addtemplate where superadminid ='".$_SESSION['said']."'";
					$result=mysqli_query($sql,$sql_query);
					if($result === FALSE){die(mysqli_error($sql));}
					?>
					<select name="drptemplate"  onChange="showCompany(this.value);"  
					id="selectReq" class="validate[required] form-control form-control-sm imgopocity" >
						<option value="" style="color:#494949;"><?php echo SELECTTEMPLATE ?></option>
							<?php
						while($row=mysqli_fetch_array($result))
						{
						$tid=$row['tempid'];
						$templatename=$row['tempname'];
						$temp_type=$row['temptype'];
						?>
								<option value="<?php echo $tid; ?>" style="color:#494949;" > <?php  echo $templatename;?></option>
						<?php 
						}	
						?>
					</select>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group row noborder">
				<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo DEPTNAME.":"?> <span class="req text-danger">*</span></label>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<?php	
					$sql_query="select * from adddepartment where superadminid ='".$_SESSION['said']."'";
					$result=mysqli_query($sql,$sql_query);
					if($result === FALSE) {die(mysqli_error($sql));}
					?>
					<select  name="drpdept" id="selectReq1"  class="validate[required] form-control form-control-sm imgopocity" >
						<option value="" style="color:#494949;"><?php echo SELECTDEPT ?></option>
						<?php
						while($row=mysqli_fetch_array($result))
						{
						$id=$row['deptid'];
						$departmentname=$row['deptname'];
						?>
								<option value="<?php echo $id; ?>" style="color:#494949;"><?php  echo $departmentname;?></option>
						<?php 
						}
						?>
					</select>
				</div>
				<div class="clearfix"></div>
			</div>
					
			<div class="form-group row noborder">
				<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo SELECTAFORM.":"?> <span class="req text-danger">*</span></label>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<?php	
					 //$squery="SELECT q.* FROM `tbl_settings` as s, `tbl_questionnair` as q WHERE q.`superadminid` = ".$_SESSION['said']." 
					 //and s.`uid` = ".$_SESSION['uid']." and s.`value` = q.lid and s.`key` like 'default_language_question'";
					 
					$squery = "SELECT q.* FROM `tbl_settings` as s, `tbl_questionnair` as q join `tbl_questionanswer` as qs on q.qid=qs.qid WHERE q.`superadminid` = ".$_SESSION['said']."
					 and s.`uid` = ".$_SESSION['uid']." and s.`value` = q.lid and s.`key` like 'default_language_question' GROUP BY q.qid";
					 
					$rs=mysqli_query($sql,$squery) or die(mysqli_error($sql));
					$no = mysqli_num_rows($rs);
					?>
					<select name="drpquetitle" id="selectReq3" class="validate[required] form-control form-control-sm imgopocity" >
						<?php
						while($r=mysqli_fetch_array($rs))
						{
						$id=$r['qid'];
						$_SESSION['qid']=$id;
						$qtitle=$r['title'];

						?>
						<option value="<?php echo $id; ?>" selected="selected" style="color:#494949;"><?php  echo $qtitle;?></option>
						<?php 
						}	
						?>
					</select>
				</div>
				<div class="clearfix"></div>
			</div>
			
			<div class="form-group row noborder">
				<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo DATE.":" ?></label>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					 <input  class="datepicker form-control form-control-sm" type="text" name="txtdate" style="color:#494949;"
					  value="<?php echo date("d-m-Y"); ?>" >
				</div>
				<div class="clearfix"></div>
			</div>
			
			<div class="form-group row noborder">
				<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITORCOMPNAME.":" ?> </label>
				<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<input type="text"  id="txtcomp" name="txtacname"  readonly="yes" style="color:#494949;" class="form-control form-control-sm">
					<img  id="img1" class="mt-2" width="80px" height="80px" />
				</div>
				<div class="clearfix"></div>
			</div>
				
			<div id="message3">			
				<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITORCOMPLOGO.":" ?></label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<input type="text" name="txtaclogo" id="txtcomplogo"  readonly="yes" style="color:#494949;" class="form-control form-control-sm"/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
					
			<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITEDBY.":" ?> <span class="req text-danger">*</span> </label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<input type="text" placeholder="enter auditor name" name="txtaudited" id="req2"  style="color:#494949;" class="validate[[required],custom[onlyLetterSp]] form-control form-control-sm" />
					</div>
					<div class="clearfix"></div>
			</div>
			
			<div id="message1">	
				<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CLIENTCOMPNAME.":" ?></label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<input type="text"  id="txtclientcomp" name="txtccname"  readonly="yes" style="color:#494949;" class="form-control form-control-sm">
					<img  id="img2" class="mt-2" width="80px" height="80px" />
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div id="message2">			
				<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CLIENTCOMPLOGO.":" ?></label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
					<input type="text" name="txtcclogo" id="txtccomplogo"  readonly="yes" style="color:#494949;" class="form-control form-control-sm"/>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>	
			<div class="form-group row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
					<input class="btn btn-success btn-sm" type="submit" value="<?php echo SAVE_B ?>" name="cmdsave" >
				</div>	
			</div>	
			</fieldset>
			</form>	
		</div> 
	</div> 
<?php } else { ?>
	<style>
	#footer {
		position:fixed;
		bottom:0;
	}
	</style>
	<h5><br><br>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">
		You Are Not Authorized To Access This Page...!
		</div>
	</h5>
<?php } ?>
</div>
	<div class="clearfix"></div>
</div>
<?php include("footer.php"); ?>