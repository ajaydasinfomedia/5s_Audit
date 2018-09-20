<?php  
	error_reporting(0);
	 session_start(); 
	 if(!isset($_SESSION['uname'])){	header('location:login');}	
	 include("header.php"); 
	 include("left_menu.php");
	 include("dbconnect.php");
	 if(strpos($_SERVER['REQUEST_URI'],"update_owntemplate"))
	 {
		$str_explode = explode('/',$_SERVER['REQUEST_URI']);
		$count=count($str_explode);
		$sid = $str_explode[$count-2];
	 	$sql_query= "select * from addtemplate where tempid='".$sid."'";
		$result=mysqli_query($sql,$sql_query);
		while($row=mysqli_fetch_array($result))
		{
			$id=$row['tempid'];
			$compname= $row['auditorcname'];
			$tempname=$row['tempname'];
			$complogo=$row['auditorclogo'];
			$_SESSION['txtid']=$sid;
			$_SESSION['acname']= $compname;
			$_SESSION['oclogo']= $complogo;
		}
		$folder= "http://".$_SERVER["HTTP_HOST"]."/5s/own_logo/"; 
		$file1=$folder.$complogo;			
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
	}
?>

<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6><?php echo EDITOWNCOMP ?></h6>
	</div>	
<?php 
if($template_view_right == 1){
?>	
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
 		<div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>  <?php echo EDITOWNCOMP ?></h6>
		</div>  
		<div class="container my-3">
			<form action="insertown_ctemplate.php" class="mainForm" name="frmowncompany" id="valid"  method="post" enctype="multipart/form-data">
			<fieldset>               
				<input type="hidden" name="txtid" value="<?php  if(strpos($_SERVER['REQUEST_URI'],$sid)) {echo $id; }?>">		
				<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo YOURCOMPNAME.":" ?> <span class="req text-danger">*</span> </label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" placeholder="enter your company name" name="txtowncname" style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$sid)) {echo $compname; }?>" class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm" id="req1" >
						</div>
						<div class="clearfix"></div>
				</div>
				<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo NAMEYOURTEMPLATE.":" ?> <span class="req text-danger">*</span> </label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<input type="text" placeholder="enter your template name" name="txtctempname" style="color:#494949;" value="<?php if(strpos($_SERVER['REQUEST_URI'],$sid)) {echo $tempname; }?>" class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm" id="req2" >
                    		
               		 		<img src="<?php if($file1 != $folder){echo $file1;}else{echo '';}?>" width="80px" height="80px" class="mt-3" />
                    		
						</div>
						<div class="clearfix"></div>
				</div>
				<div class="form-group row">
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo YOURCOMPLOGO.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                			<input type="file" name="ownclogo" class="form-control-file border imgopocity form-control-sm">
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
<?php } else { 
?>
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
<?php include("footer.php"); ?>