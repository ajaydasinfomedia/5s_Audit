<?php  
	 session_start(); 
	 if(!isset($_SESSION['uname'])){	header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");
         include_once("admin_function_manage.php");
	
	 
	 	 $sql_query= "select * from plan_options where plan_name='custom' ";
                
		$result=mysqli_query($sql,$sql_query);
//                $num=mysql_num_rows($result);
//                echo $num;
//                exit;
		while($row=mysqli_fetch_array($result))
		{			 
			$tot_user=$row['total_user'];
                        $price=$row['price'];
                         $plan_name=$row['plan_name'];                        
		}
?>

    <div class="content">
    	<div class="title"><h5>Edit Custom Plan Details</h5></div>
	
<?php
if(isset($_REQUEST["update"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			Custom plan Information updated!!
	</p>
	</div>
	
<?php
}
?>	
        <form action="admin/edit_cplan.php"  class="mainForm"  id="valid"  method="post">		
		<fieldset>               

                    
				<div class="rowElem">
				<label>Total User:<span class="req">*</span> </label>
				<div class="formRight">
					<input class="validate[required,custom[onlyNumberSp]]" type="text" placeholder="enter total user" name="txttotuser" style="color:#494949;"
					value="<?php echo $tot_user;?>" id="req1" >					
				</div>
				<div class="fix"></div>
			</div>
							
			<div class="rowElem">
				<label>Price:<span class="req">*</span> </label>
				<div class="formRight">
					<input class="validate[required,custom[onlyNumberSp]]" type="text" placeholder="enter price" name="txtprice" style="color:#494949;"
					value="<?php echo $price; ?>" id="req2" >					
				</div>
				<div class="fix"></div>
			</div>
                    
                    <div class="rowElem">
				<label>Plan Name:<span class="req">*</span> </label>
				<div class="formRight">
					<input class="validate[required,custom[onlyLetterSp]]" type="text" placeholder="enter plan name " name="txtpname" style="color:#494949;"
					value="<?php echo $plan_name; ?>" id="req3"  readonly="yes" >					
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
