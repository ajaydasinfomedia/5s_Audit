<?php session_start();
include("dbconnect.php");
include("header.php"); 
?>
<script type="text/javascript" language="javascript">
function displayform()
{
	document.location = 'login';
}
</script>
<div class="wrapper" >	
<?php
if(strpos($_SERVER['REQUEST_URI'],'no'))
				{
				?>
					 <div class="nNote nFailure hideit">
						<p>
							<strong>FAILURE: </strong>
							Oops sorry. E-mail Id is not registered.
						</p>		
					</div>  
			<?php	
				}
				?>	
	<form method="post" action="frgtmodulechange.php" class="mainForm" name="frmrecpage" id="valid" >
	<fieldset>
	<div class="widget first">
		<div class="head">
			<h5 class="iFrames">Forgot Username</h5>
		</div>
		
		<div class="rowElem noborder" style="padding:0 16px;">
			<label>Enter E-mail Id :  <span class="req">*</span> </label>
			<div class="formRight">
				<input  name="emailid" type="text"  style="color:#494949;" id="r3" class="validate[required,custom[email]]">
			</div>
			<div class="fix"></div>
     	</div>
		
		<input type="submit" class="greenBtn" name="submit" value="Go" style="margin-left: 192px; margin-bottom: 2%;" />        
	 <input type="button"  class="greenBtn" name="cmdcancel1" value="Cancel" style="margin-left: 10px; margin-bottom: 2%;"
	 onclick="displayform();" />                  
		
	</div>	
</fieldset>	
	</form>
</div>
<div class="fix"></div>
</div>


<?php include("footer.php");  ?>
