<?php
session_start();
	include("header.php"); 
	$id=$_SESSION['uid'];
    $suid=$_SESSION['said'];
	if(!isset($_SESSION['uname'])){	header('location:login');}	
	if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
					 {
					  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/$id/recuringpage");
					 }
	include("left_menu.php");
?>	 
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
     <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6><?php echo MANAGEQUES ?></h6></div>        
<?php
if(isset($_REQUEST['msg'])){ ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
	<p>
		<strong><?php echo SUCCESS.":" ?></strong><?php echo QUESNOTCREATED ?>
	</p>
	</div>
<?php }else  {if(strpos($_SERVER['REQUEST_URI'],'questionnair_save'))
{
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
	<p>
		<strong><?php echo SUCCESS.":" ?></strong><?php echo QUESCREATED ?>
	</p>
	</div>
<?php
}}
?>
<script>
		// jQuery(document).ready(function() {
		// jQuery('#questionnair_table').DataTable({
			// columnDefs: [ {
						// className: 'control',
						// orderable: false,
						// targets:   [1]
					// } ],
			// "order": [[ 0, "desc" ]],
			// "pageLength": 25,
			// "searching": false
			// });
		// } );
</script>        
<script type="text/javascript" language="javascript">
function valid()
{
	if( document.frmcopyquestionnair.select2.value == 0)
	{
		return false;
	}
}
</script>
<?php 
if($manage_questionnary_right == 1){
?>	
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
    <div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>
		<?php echo CREATEQUES ?></h6>
	</div>
	<div class="container my-3">
		  <form class="mainForm" method="post" action="insert.php" id="valid" name="frmcopyquestionnair">
			   <fieldset>
					<div class="form-group row noborder">    
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITFORMNAME.":" ?></label>
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							  <input type="text" name="txttitle" placeholder="title"  style="color:#494949;" id="auditname" class="validate[required] form-control form-control-sm"/>
							</div>        
						  <div class="fix"></div>                  
					</div>     
					<div class="form-group row noborder">                 
						<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo COPYAUDITFORMFROM.":" ?></label>  
						<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
							<?php
							include("dbconnect.php");
							$sql_query="select * from tbl_questionnair where uid = $id";

							$res=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));   
							?>
							<select name="select2" id="stitle" class="validate[required] form-control form-control-sm imgopocity">
								<option value="0" style="color:#494949;"><?php echo SELECTTITLE ?></option>
								<?php
								while($row=mysqli_fetch_array($res))
								{
								?>
								<option value=<?php echo $row['qid'] ?> style="color:#494949;"><?php echo $row["title"] ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="fix"></div>       
					</div> 
					<div class="form-group row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
							<input class="btn btn-success btn-sm" type="submit" name="save_title" value="Save" onClick="return valid()"/>
						</div>
					</div>
			   </fieldset>
		 </form>
	</div>
</div>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">	
	<div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>  <?php echo QUESLIST?></h6>
	</div>
	<?php
	include("dbconnect.php");
	$query = "SELECT * FROM tbl_questionnair where uid = $id " ;
	$rs = mysqli_query($sql,$query) or die(mysqli_error($sql));
	?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
		<table class="table table-striped table-bordered table-hover dataTables-example" id="dataTables-example" width="100%">
			 <thead class="text-center">
				<tr>
				   <td><?php echo TITLE ?></td>
				   <td><?php echo VIEW." "."/"." ".EDIT ?></td>
				</tr>
			</thead>
			<tbody class="text-center">
		<?php	
			while($row=mysqli_fetch_array($rs))
			{
		?>  <tr class="odd gradeX">     
				<td align="center"><?php echo  $row["title"]; ?></td>         
				<td align="center"><a href='<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['qid']."/questions/view_questionnary"; ?>'>
				<img src="images/icons/dark/preview.png"></a></td>
			</tr>	
		<?php	
			}	
		?>
			</tbody>
		</table>
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
    <div class="fix"></div>
    </div>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			sDom: 'lfrtip'
        });
    });
</script>
<?php include("footer.php"); ?>