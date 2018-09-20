<?php
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['uname'])){header('location:login');} 
	if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
	{
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
	}
	include("header.php"); 
	include("left_menu.php"); 
	include("dbconnect.php");
 	if(strpos($_SERVER['REQUEST_URI'],"edit_audit"))
	{
		$str_explode = explode('/',$_SERVER['REQUEST_URI']);
		$count=count($str_explode);
		$pid = $str_explode[$count-2];
	 	$sql_query= "select * from tbl_project where pid='".$pid."'";
		$result=mysqli_query($sql,$sql_query);
		while($row=mysqli_fetch_array($result))
		{
			$pid=$row['pid'];
			$tempid=$row['tempid'];
			$tname=$row['tempname'];
			$deptid=$row['deptid'];
			$dname=$row['deptname'];
			$queid=$row['qid'];
			$quetitle=$row['title'];
			$pdate=$row['pdate']; 
			$acname=$row['auditorcname'];
			$aclogo=$row['auditorclogo'];
			$auditedby=$row['auditedby'];
			$ccname=$row['clientcname'];
			$cclogo=$row['clientclogo'];
			$ttype=$row['temptype'];
			$prjid=$pid;
			$_SESSION["getid"]=$prjid;//used in add_project.php
		}
		$parts = pathinfo($_SERVER['HTTP_REFERER']);
		$path = $parts ['dirname'];
		$path1 = dirname($path);
		$url1=explode('/',$path1);
		$path1=array_pop($url1);
		$url1=implode('/', $url1);
		$folder= "http://".$_SERVER["HTTP_HOST"]."/5s/own_logo/"; 
		$file1=$folder.$aclogo;			
		$data = getimagesize($file1);
		$width = $data[0];
		$height = $data[1];
		$actualWidth = $width;
		$actualHeight = $height;
		$imgRatio = $actualWidth/$actualHeight;
		$maxRatio = 100.0/100.0;
		if($imgRatio!=$maxRatio)
		{
			if($imgRatio < $maxRatio)
			{
				$imgRatio = 100.0 / $actualHeight;
				$actualWidth = $imgRatio * $actualWidth;
				$actualHeight = 100.0;
			}
			else
			{
				$imgRatio = 100.0 / $actualWidth;
				$actualHeight = $imgRatio * $actualHeight;
				$actualWidth = 100.0;
			}
		}
		$f2="http://".$_SERVER["HTTP_HOST"]."/5s/own_logo/".$cclogo;	
		list($width1, $height1) = getimagesize($f2);
		$actualWidth1 = $width1;
		$actualHeight1 = $height1;
		$imgRatio1 = $actualWidth1/$actualHeight1;
		$maxRatio1 = 100.0/100.0;
		if($imgRatio1!=$maxRatio1)
		{
			if($imgRatio1 < $maxRatio1)
			{
				$imgRatio1 = 100.0 / $actualHeight1;
				$actualWidth1 = $imgRatio1 * $actualWidth1;
				$actualHeight1 = 100.0;
			}
			else
			{
				$imgRatio1 = 100.0 / $actualWidth1;
				$actualHeight1 = $imgRatio1 * $actualHeight1;
				$actualWidth1 = 100.0;
			}
		}
	}
?>
<script type="text/javascript" language="javascript">
	function showCompany(str)
	{	
	 	if (str=="")
 		{
		 	document.getElementById("txtcomplogo").innerHTML="";
 			document.getElementById("txtcomp").innerHTML="";
			document.getElementById("txtccomplogo").innerHTML="";
 			document.getElementById("txtclientcomp").innerHTML="";
 			return;
 		}
		if (window.XMLHttpRequest)
  		{
  			xmlhttp=new XMLHttpRequest();
  		}
		else
  		{
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
				document.getElementById("txtcomplogo").value=str2;
    			document.getElementById("txtcomp").value=str1;
				document.getElementById("txtccomplogo").value=str4;
    			document.getElementById("txtclientcomp").value=str3;
				var image1 = f1 + str2;
				var image2 = f2 + str4;
				var actualWidth = str5;
				var actualHeight = str6;			
				var imgRatio = actualWidth/actualHeight;
				var maxRatio = 100.0/100.0;
				if(imgRatio!=maxRatio)
				{
					if(imgRatio < maxRatio)
					{
						imgRatio = 100.0 / actualHeight;
						actualWidth = imgRatio * actualWidth;
						actualHeight = 100.0;
					}
					else
					{
						imgRatio = 100.0 / actualWidth;
						actualHeight = imgRatio * actualHeight;
						actualWidth = 100.0;
					}
				}
				document.getElementById('image1').src= image1;
				document.getElementById('image1').height = actualHeight;
				document.getElementById('image1').width = actualWidth;
				var actualWidth1 = str7;
				var actualHeight1 = str8;
				var imgRatio1 = actualWidth1/actualHeight1;
				var maxRatio1 = 100.0/100.0;
				if(imgRatio1!=maxRatio1)
				{
					if(imgRatio1 < maxRatio1)
					{
						imgRatio1 = 100.0 / actualHeight1;
						actualWidth1 = imgRatio1 * actualWidth1;
						actualHeight1 = 100.0;
					}
					else
					{
						imgRatio1 = 100.0 / actualWidth1;
						actualHeight1 = imgRatio1 * actualHeight1;
						actualWidth1 = 100.0;
					}
				}		
				document.getElementById('image2').src= image2;
				document.getElementById('image2').height = actualHeight1;
				document.getElementById('image2').width = actualWidth1;
				if(str4 =='' && str3 =='' )
				{
					document.getElementById("message1").style.display = 'none';
					document.getElementById("message2").style.display = 'none';
					document.getElementById("image2").style.display = 'none';
				}
				else
				{
					document.getElementById("message1").style.display = 'block';
					document.getElementById("message2").style.display = 'block';
					document.getElementById("img2").style.display = 'none'; 	
					document.getElementById("image2").style.display = 'block';
				}		
				if(str2 == '')
				{
					document.getElementById("img1").style.display = 'block'; 
				 	document.getElementById("image1").style.display = 'none';
					document.getElementById("message3").style.display = 'none';
				}
				else
				{
					document.getElementById("img1").style.display = 'none';
				 	document.getElementById("image1").style.display = 'block';
					document.getElementById("message3").style.display = 'block';
				}
				if(str4 == '')
				{
					document.getElementById("img2").style.display = 'block'; 
				 	document.getElementById("image2").style.display = 'none';
				}
				else
				{
					document.getElementById("image2").style.display = 'block';	
					document.getElementById("img2").style.display = 'none'; 	
				}
    	  	}
 	   	}
		xmlhttp.open("GET","getcompany.php?c="+str,true);
		xmlhttp.send();
	}
</script>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
		<h6> <?php echo EDITAUDIT ?></h6>
	</div>
<?php 
if($manage_audit_right == 1){
?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
    	<div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>  Edit Audit</h6>
		</div> 
		<div class="container mt-3">
			<form action="add_project.php" class="mainForm" name="frmaudit" method="post" id="valid"  >
				<fieldset>
					<?php 
					if(strpos($_SERVER['REQUEST_URI'],$pid))
					{
					?> 				
						<input type="hidden" name="txtid" value="<?php echo $pid;?>">	
					<?php
					}
					?>	
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo SELECTTEMPLATE.":"?> <span class="req text-danger">*</span></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<?php	
							$sql_query="select * from addtemplate where superadminid ='".$_SESSION['said']."'";
							$result=mysqli_query($sql,$sql_query);
							if($result === FALSE){die(mysqli_error($sql));}
							?>
							<select name="drptemplate" style="color:#494949;" onChange="showCompany(this.value)" id="selectReq" class="validate[required] form-control form-control-sm imgopocity" >
								<option value="" style="color:#494949;"><?php echo SELECTTEMPLATE?></option>
								<?php
								while($row=mysqli_fetch_array($result))
								{
									$id=$row['tempid'];
									$templatename=$row['tempname'];
								?>
								<option value="<?php echo $id; ?>" style="color:#494949;" <?php if(strpos($_SERVER['REQUEST_URI'],$pid)) { if($tempid == $id){echo 'selected="selected"'; }}?>> <?php  echo $templatename;?></option>               
								<?php 
								}
								?>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>      	
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo DEPTNAME.":"?> <span class="req text-danger">*</span></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">                   
							<?php	
							$sql_query="select * from adddepartment where superadminid ='".$_SESSION['said']."'";
							$result=mysqli_query($sql,$sql_query);
							if($result === FALSE) {die(mysqli_error($sql));}
							?>
							<select name="drpdept" style="opacity: 0;color:#494949;" id="selectReq1"  class="validate[required] form-control form-control-sm imgopocity">
								<option value="" style="color:#494949;"><?php echo SELECTDEPT?></option>            
								<?php
								while($row=mysqli_fetch_array($result))
								{
									$id=$row['deptid'];
									$departmentname=$row['deptname'];
								?>
								<option value="<?php echo $id; ?>" style="color:#494949;" <?php if(strpos($_SERVER['REQUEST_URI'],$pid)){if($deptid == $id){echo 'selected="selected"';} }?>><?php echo $departmentname;?></option>
								<?php 
								}
								?>
							</select>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo SELECTAFORM.":"?> <span class="req text-danger">*</span></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<?php	
							$sql_query="select * from tbl_questionnair where superadminid ='".$_SESSION['said']."'";
							$result=mysqli_query($sql,$sql_query);
							if($result === FALSE) {die(mysqli_error($sql)); }
							?>
							<select name="drpquetitle1"  style="opacity: 0;color:#494949;" id="selectReq3" class="validate[required] form-control form-control-sm imgopocity"  disabled="disabled">
								<?php
								while($row=mysqli_fetch_array($result))
								{
								$id=$row['qid'];
								$qtitle=$row['title'];
								?>
								<option value="<?php echo $id; ?>" style="color:#494949;" <?php if(strpos($_SERVER['REQUEST_URI'],$pid)){if($queid == $id){echo 'selected="selected" '; $selected_q = $queid;} }?> ><?php echo $qtitle;?></option>
								<?php 
								}	
								?>
							</select>
							<input type="hidden" name="drpquetitle" value="<?php echo $selected_q;?>" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"> <?php echo DATE.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input  class="datepicker form-control form-control-sm" type="text" size="10" name="txtdate"  style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo date("d-m-Y", strtotime($pdate)); }?>" >
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITORCOMPNAME.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text"  id="txtcomp" name="txtacname" style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo $acname; }?> " readonly="yes" class="form-control form-control-sm" >
							<img src="<?php if($aclogo != ""){echo $file1;}else{echo "";} ?>"  id="img1" class="mt-2"  width="<?php if(strpos($_SERVER['REQUEST_URI'],$pid) && $file1 != "http://".$_SERVER["HTTP_HOST"]."/own_logo/") {echo $actualWidth;} ?>"  height="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo $actualHeight;} ?>"  />
							<img id="image1" class="mt-2" style=" <?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo  'display:none';}  ?>" />
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITORCOMPLOGO.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" name="txtaclogo" id="txtcomplogo" style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo $aclogo; }?> " readonly="yes" class="form-control form-control-sm" />
						 </div>	
						<div class="clearfix"></div>
					</div>
					<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITEDBY.":" ?> <span class="req text-danger">*</span> </label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" name="txtaudited" style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo $auditedby; }?> " id="req" class="validate[[required],custom[onlyLetterSp]] form-control form-control-sm" /></div>
						<div class="clearfix"></div>
					</div>
					<div id="message1" <?php if($ttype != 'c') { echo 'style="display:none;"';}?> >	
						<div class="form-group row">
							<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CLIENTCOMPNAME.":" ?></label>
							<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
								<input type="text"  id="txtclientcomp" name="txtccname"  style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo $ccname; } ?>" readonly="yes" class="form-control form-control-sm" >
								
									<img src="<?php if($f2 != "http://".$_SERVER["HTTP_HOST"]."/own_logo/") {echo $f2;}else{echo "";} ?>"  id="img2" class="mt-2" width="<?php if(strpos($_SERVER['REQUEST_URI'],$pid) && $f2 != "http://".$_SERVER["HTTP_HOST"]."/own_logo/") {echo $actualWidth1;} ?>" height="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo $actualHeight1;} ?>" />
									<img id="image2" class="mt-2" style=" <?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo  'display:none';}  ?>" />
								
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div id="message2" <?php if($ttype != 'c') { echo 'style="display:none;"';}?>>	
						<div class="form-group row">
							<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CLIENTCOMPLOGO.":" ?></label>
							<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
								<input type="text" name="txtcclogo" id="txtccomplogo" style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$pid)) {echo $cclogo; } ?>"  readonly="yes" class="form-control form-control-sm"/>			
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
							<input class="btn btn-success btn-sm" type="submit" value="<?php echo UPDATE ?>" name="cmdupdate" >
							<input class="btn btn-success btn-sm " type="submit" value="<?php echo UPDATE." "." & ".CONTINUE_MSG ?>" name="cmducontinue" >	
						</div>
					</div>
				</fieldset>
			</form>
		</div>	
		<div class="clearfix"></div>
	</div>
<?php } else { 
?>
<style>
#footer {
    position:fixed;
    bottom:0;
}
</style>
<h5><br><br><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">You Are Not Authorized To Access This Page...!</div></h5>
<?php } ?>	
</div>    
</div>
<?php include("footer.php"); ?>