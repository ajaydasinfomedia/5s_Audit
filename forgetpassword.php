<?php 
	session_start();
	include("dbconnect.php");
	include("header.php"); 
?>
<script type="text/javascript" language="javascript">
	function displayform()
	{
		document.location = 'login';
	}
</script>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 wrapper text-center mt-3 mt-sm-0">	
<?php
	if(strpos($_SERVER['REQUEST_URI'],'no'))
	{
?>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nFailure hideit">
			<p>
				<strong>FAILURE: </strong> Oops sorry. E-mail Id is not registered.
			</p>		
		</div>  
<?php	
	}
?>	
	<div class="container my-3 border">
	<form method="post" action="frgtpwdchnge.php" class="mainForm" name="frmrecpage" id="valid" >
		<fieldset>
			  
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4"> <h5 class="text-center">Forgot Password</h5></div>
				
				<div class="form-group row noborder offset-sm-3">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label">Enter E-mail Id : <span class="req text-danger">*</span></label>
					<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
						<input name="emailid" type="text" style="color:#494949;" id="r3" class="validate[required,custom[email]] form-control form-control-sm">
					</div>
					<div class="fix"></div>
     			</div>
				<div class="form-group row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
						<input type="submit" class="btn btn-success btn-sm" name="submit" value="Go"/>        
						<input type="button"  class="btn btn-success btn-sm" name="cmdcancel1" value="Cancel" onclick="displayform();" /> 
					</div>
				</div>
                <div class="fix"></div>                 	
			</div>	
		</fieldset>	
	</form>
	</div>
</div>
<?php include("footer.php"); ?>