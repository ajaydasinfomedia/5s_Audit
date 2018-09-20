<?php  
	 session_start(); 
	 if(!isset($_SESSION['uname'])){	header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");
         include_once("admin_function_manage.php");
	

	 if(isset($_REQUEST["pid"]))
	 {			 
             $pid=$_REQUEST["pid"];
	 	$sql_query= "select * from plan_options where plan_id='$pid' ";
		$result=mysqli_query($sql,$sql_query);
		while($row=mysqli_fetch_array($result))
		{			 
			$tot_user=$row['total_user'];
                        $price=$row['price'];
                        $plan_name=$row['plan_name'];                        
		}
	}
?>

    <div class="content">
    	<div class="title"><h5>Edit Plan Details</h5></div>
		
		
        <form action="admin/edit_plan.php"  class="mainForm"  id="valid"  method="post">		
		<fieldset>               

                    <?php 
	if(isset($_REQUEST['pid']))
	{
?> 			

<input type="hidden" name="txtpid" value="<?php  if(isset($_REQUEST["pid"])) {echo $pid; }?>" readonly="yes">		
<?php
	}
?>		
				<div class="rowElem">
				<label>Total User:<span class="req">*</span> </label>
				<div class="formRight">
					<input class="validate[required,custom[onlyNumberSp]]" type="text" placeholder="enter total user" name="txttotuser" style="color:#494949;"
					value="<?php if(isset($_REQUEST["pid"])) {echo $tot_user; }?>" id="req1" >					
				</div>
				<div class="fix"></div>
			</div>
							
			<div class="rowElem">
				<label>Price:<span class="req">*</span> </label>
				<div class="formRight">
					<input class="validate[required,custom[onlyNumberSp]]" type="text" placeholder="enter price" name="txtprice" style="color:#494949;"
					value="<?php if(isset($_REQUEST["pid"])) {echo $price; }?>" id="req2" >					
				</div>
				<div class="fix"></div>
			</div>
                    
                    <div class="rowElem">
				<label>Plan Name:<span class="req">*</span> </label>
				<div class="formRight">
					<input class="validate[required,custom[onlyLetterSp]]" type="text" placeholder="enter plan name" name="txtpname" style="color:#494949;"
					value="<?php if(isset($_REQUEST["pid"])) {echo $plan_name; }?>" id="req3" >					
				</div>
				<div class="fix"></div>
			</div>
		
			
 
			<input class="greenBtn " type="submit" style=" float: left; margin: 1px 16px 22px 175px;" 
			value="Update" name="cmdupdate">
                        
		</fieldset>                    
		</form>
        

    </div>
    <div class="fix"></div>
</div>

<?php include("footer.php"); ?>
