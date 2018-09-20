<?php  
	 session_start(); 
	 if(!isset($_SESSION['uname'])){	header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");
         include_once("admin_function_manage.php");
	

	 if(isset($_REQUEST["id"]))
	 {			 
             $id=$_REQUEST["id"];
	 	$sql_query= "select * from coupon_mgt where Id='$id' ";
		$result=mysqli_query($sql,$sql_query);
		while($row=mysqli_fetch_array($result))
		{			 
			$cc=$row['coupon_code'];
                        $type=$row['type'];
                        $ptype=$row['prod_type'];
                        $amt=$row['amount'];                        
                        $val=$row['validity'];                                                
		}
	}
?>

    <div class="content">
    	<div class="title"><h5>Edit Coupon Details</h5></div>
		
		
        <form action="admin/edit_couponlist.php"  class="mainForm"  id="valid"  method="post">		
		<fieldset>               

                    <?php 
	if(isset($_REQUEST['id']))
	{
?> 			

<input type="hidden" name="txtid" value="<?php  if(isset($_REQUEST["id"])) {echo $id; }?>" readonly="yes">		
<?php
	}
?>		
				<div class="rowElem">
				<label>Coupon Code<span class="req">*</span> </label>
				<div class="formRight">
					<input type="text" placeholder="enter coupon code" name="txtcc" style="color:#494949;"
					value="<?php if(isset($_REQUEST["id"])) {echo $cc; }?>" id="req1" 
					class="validate[required,custom[onlyLetterNumber]]">
				</div>
				<div class="fix"></div>
			</div>
							
			<div class="rowElem">
				<label>Type</label>
				<div class="formRight">
				
                                     <select name="drptype"  style="opacity: 0;"  id="dy" style="color:#494949;">                                                                           
                      <option <?php  if(isset($type) && $type == "percentage"  )
                    { echo 'selected="selected"';} ?> value="percentage" style="color:#494949;">Percentage</option>
                      <option <?php  if(isset($type) && $type == "amount" )
                    { echo 'selected="selected"';} ?> value="amount" style="color:#494949;">Amount</option>                       
		   </select>                    
				</div>
				<div class="fix"></div>
			</div>

                        <div class="rowElem">
				<label>Product Type</label>
				<div class="formRight">
		   <select name="drpptype"  style="opacity: 0;"  id="dy" style="color:#494949;">                                                 
                <option <?php  if(isset($ptype) && $ptype == ""  )
                    { echo 'selected="selected"';} ?> value="All" style="color:#494949;">All</option>             
                      <option <?php  if(isset($ptype) && $ptype == "5s"  )
                    { echo 'selected="selected"';} ?> value="5s" style="color:#494949;">5s</option>
                      <option <?php  if(isset($ptype) && $ptype == "7w" )
                    { echo 'selected="selected"';} ?> value="7w" style="color:#494949;">7w</option>                       
		   </select>                    
				</div>
				<div class="fix"></div>
			</div>
                    
                    <div class="rowElem">
				<label>Amount<span class="req">*</span> </label>
				<div class="formRight">
					<input type="text" placeholder="enter amount" name="txtamt" style="color:#494949;"
					value="<?php if(isset($_REQUEST["id"])) {echo $amt; }?>" id="req3" 
					class="validate[required,custom[onlyNumberSp]]">
				</div>
				<div class="fix"></div>
			</div>

                      <div class="rowElem">
				<label>Validity<span class="req">*</span> </label>
				<div class="formRight">
					<input type="text"  name="txtval" style="color:#494949;" 
					value="<?php if(isset($_REQUEST["id"])) {echo $val; }?>" id="req4" 
					class="datepicker validate[required]" >
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
