<?php  
	session_start(); 
	if(!isset($_SESSION['uname'])){	header('location:login');}	
	if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
	{
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
	}
	include("header.php"); 
	include("left_menu.php");
	include("dbconnect.php");
?>
<script language="javascript">
	function copy_data(val)
	{
		 document.getElementById("copy_to").value=val;
	}
	function copyclient_data(val)
	{
		 document.getElementById("copyclient_temp").value=val;
	}
	
</script> 
<style>
.formError .formErrorContent{width:310px;}
</style>
<!-- Content -->
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
		<h6><?php echo ADDTEMPLATE?></h6>
	</div>	
<?php 
if($template_create_right == 1){
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0">
		<div class="border mt-2">
			<ul class="nav nav-tabs">
				<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab1"><?php echo OWNCOMP ?></a></li>
				<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"><?php echo CLIENTCOMP ?></a></li>
			</ul>
			<div class="tab-content">
				<div id="tab1" class="container tab-pane active mt-5">
				
					<form action="insertown_ctemplate.php" id="valid" class="mainForm" name="frmowncompany"  method="post" enctype="multipart/form-data">
						<fieldset>  
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo YOURCOMPNAME.":" ?>  <span class="req text-danger">*</span> </label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="text" placeholder="enter your company name" name="txtowncname" style="color:#494949;" onkeyup="return copy_data(this.value);" id="req1" class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo NAMEYOURTEMPLATE.":" ?> <span class="req text-danger">*</span> </label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="text"  placeholder="enter your template name" name="txtctempname"  id="copy_to" style="color:#494949;" class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm"  >
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo YOURCOMPLOGO.":" ?></label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="file" class="form-control-file border imgopocity form-control-sm" name="ownclogo">
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
									<input class="btn btn-success btn-sm" type="submit" value="<?php echo SAVE_B ?>" name="cmdsave">
								</div>
							</div>
						</fieldset>
					</form>
				</div>
				<div id="tab2" class="container tab-pane fade mt-5">
					<form action="insertclient_ctemplate.php"  name="frmclientcompany" method="post" enctype="multipart/form-data" id="validate" class="mainForm">
						<fieldset>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CLIENTCOMPNAME.":" ?> <span class="req text-danger">*</span></label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="text" name="txtclientcname" placeholder="enter client company name" onkeyup="return copyclient_data(this.value);" id="ccn" style="color:#494949;" class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo NAMEYOURTEMPLATE.":" ?><span class="req text-danger">*</span> </label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="text" name="txtclienttempname" placeholder="enter your template name" style="color:#494949;" id="copyclient_temp"  class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITORCOMPLOGO.":" ?></label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="file" name="auditorclogo" class="form-control-file border imgopocity form-control-sm" />
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITORCOMPNAME.":" ?> <span class="req text-danger">*</span></label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="text" name="txtauditorcname" placeholder="enter auditor company name" style="color:#494949;" id="acn" class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CLIENTCOMPLOGO.":" ?></label>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<input type="file" name="clientclogo" class="form-control-file border imgopocity form-control-sm"/>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="form-group row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
									<input class="btn btn-success btn-sm" type="submit" value="<?php echo SAVE_B ?>" name="cmdsave">
								</div>
							</div>
						</fieldset>
					</form>
				</div>
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
<h5>
<br><br>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">You Are Not Authorized To Access This Page...!
	</div>
</h5>
<?php } ?>
</div>
<div class="fix"></div>
</div>
<?php include("footer.php");?>
   