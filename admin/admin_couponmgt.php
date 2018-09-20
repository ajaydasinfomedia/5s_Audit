<?php 
session_start();
if(!isset($_SESSION['uname'])){header('location:admin/index.php');}
include("admin_header.php"); 
include("admin_left_menu.php"); 
include("sadmin_dbconnect.php");
include_once("admin_function_manage1.php");
?>
    <div class="content">
    	<div class="title"><h5>Add Coupon</h5></div>			
				
<?php
if(isset($_REQUEST["save"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			Coupon Information saved!!
	</p>
	</div>
	
<?php
}
				
if(isset($_REQUEST["exists"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Failure:</strong>
			Coupon already exists!!
	</p>
	</div>
	
<?php
}
?>	
		<form action="admin/insert.php" class="mainForm" id="valid" name="frmaudit" method="post">		
                                 
                         <div class="rowElem noborder">    
                  <label>Coupon Code<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
<input type="text" id="req1" class="validate[required,custom[onlyLetterNumber]]" name="txtcc"  placeholder="enter coupon code" />                                
                  </div>
                             <div class="fix"></div>
                         </div>
                        
                        <div class="rowElem noborder">
                        <label>Type                 
                  </label>
                   
                  <div class="formRight">   
				                     
                     <select name="drptype"  style="opacity: 0;"  id="dy" style="color:#494949;">              
                           
	      <option value="percentage" style="color:#494949;">Percentage</option>
              <option value="amount" style="color:#494949;">Amount</option>              
         
		   </select>                      
                  </div>
                            <div class="fix"></div>
                        </div>
                        
                        <div class="rowElem noborder">
                        <label>Product Type                 
                  </label>
                   
                  <div class="formRight">   
				                     
                      <select name="drpptype"  style="opacity: 0;"  id="dy" style="color:#494949;">              
              <option value="All" style="color:#494949;">All</option>             
	      <option value="5s" style="color:#494949;">5s</option>
              <option value="7w" style="color:#494949;">7w</option>              
         
		   </select>                      
                  </div>
                            <div class="fix"></div>
                        </div>
                        
                        <div class="rowElem noborder">
                        <label>Amount<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                      <input type="text" name="txtamt" class="validate[required,custom[onlyNumberSp]]"  placeholder="enter amount" 
                               id="r2" />
                  </div>
                            <div class="fix"></div>
                        </div>
                        
                        <div class="rowElem noborder">
			<label>Expiry Date</label>
			<div class="formRight">
				 <input  class="datepicker " type="text" size="10" name="txtdate" style="color:#494949;"
				  value="<?php echo date("d-m-Y"); ?>" >
			</div>
			<div class="fix"></div>
		</div>
                        <input class="greenBtn " type="submit" value="Save" 
		style=" float: left; margin: 1px 16px 22px 175px;" name="save_coupon" >
                                        
                </form>
            
    </div>             
    <div class="fix"></div>
</div>
<?php include("admin_footer.php"); ?>