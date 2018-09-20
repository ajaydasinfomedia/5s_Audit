<?php 	 
	 session_start(); 
	 include("sadmin_dbconnect.php");	 
	 if(!isset($_SESSION['uname'])){header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");                           
?>
 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>User Management</h5></div>					                	
		
<?php
if(isset($_REQUEST["save"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			User Information Saved!!
	</p>
	</div>
	
<?php
}

if(isset($_REQUEST["exists_username"]))
{
?>	
	<div class="nNote nFailure hideit">
	<p>
		<strong>Failure:</strong>
			Username is already exists!!
	</p>
	</div>
	
<?php
}

if(isset($_REQUEST["exists_displayname"]))
{
?>	
	<div class="nNote nFailure hideit">
	<p>
		<strong>Failure:</strong>
			Display Name is already exists!!
	</p>
	</div>
	
<?php
}

if(isset($_REQUEST["exists_email"]))
{
?>	
	<div class="nNote nFailure hideit">
	<p>
		<strong>Failure:</strong>
			Email is already exists!!
	</p>
	</div>
	
<?php
}
?>
 <form class="mainForm" id="valid" method="post" action="admin/insert_user.php" >
            
            <div class="rowElem noborder">     
                                
                  <label>Number of User<span class="req">*</span>               
                  </label>
                   
                  <div class="formRight">   
				                     
            <input type="text"   class="validate[required,custom[onlyNumberSp]]" name="txtuser"  placeholder="enter user" id="u1" />							                        
		</div>                                   
                <div class="fix"></div>
            </div>
     
     <div class="rowElem noborder">     
                                
                  <label>Price<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text"  class="validate[required,custom[onlyNumberSp]]" name="txtprice"  placeholder="enter price" id="p1" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>Payment Method<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text" class="validate[required,custom[onlyLetterSp]]" name="txtpm"  placeholder="enter payment method" id="pm1" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>Expiry Date<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text"  class="datepicker validate[required]" name="txtedate"  placeholder="enter expiry date" id="ed1" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>Plan Type<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <select name="drpptype" style="opacity: 0;"  id="dy" style="color:#494949;">                                
	      <option value="5s" style="color:#494949;">5s</option>
              <option value="7w" style="color:#494949;">7w</option>                      
	   </select>                      
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>First Name<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text"  class="validate[required,custom[onlyLetterSp]]" name="txtfname" placeholder="enter first name"  id="fn1" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
      <div class="rowElem noborder">     
                                
                  <label>Last Name                  
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text" name="txtlname" placeholder="enter last name" id="lnm" class="validate[custom[onlyLetterSp]]" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
      <div class="rowElem noborder">     
                                
                  <label>Display Name<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text"  class="validate[required,custom[onlyLetterNumber]]" name="txtdname" placeholder="enter display name"  id="dn1" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>User Name<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text" class="validate[required,custom[onlyLetterNumber]]" name="txtuname" placeholder="enter user name" id="un1" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>Email id<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                <input type="text"  class="validate[required,custom[email]]" name="txtemail" 
                       placeholder="enter email id" id="email1" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>Password<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                      <input type="password"  class="validate[required]" name="txtpass"
                             placeholder="enter password" id="pass" />							                        
		</div>
         <div class="fix"></div>
         </div>
     
     <div class="rowElem noborder">     
                                
                  <label>Confirm Password<span class="req">*</span>                   
                  </label>
                   
                  <div class="formRight">   
				                     
                      <input type="password"  class="validate[required,equals[pass]]" name="txtcpass" placeholder="re-enter password"  id="cpass" />							                        
		</div>
         <div class="fix"></div>
         </div>
                         <input class="greenBtn" type="submit" name="save_user"
					style=" float: left; margin: 1px 16px 22px 175px;" value="Save"/>
                        <div class="fix"></div>                             
        </form>
       
	</div>				    
    <div class="fix"></div>
</div>
<?php
include("admin_footer.php");?>
   