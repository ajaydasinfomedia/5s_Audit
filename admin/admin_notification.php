<?php 
session_start();
if(!isset($_SESSION['uname'])){header('location:admin/index.php');}
include("admin_header.php"); 
include("admin_left_menu.php"); 
include_once("admin_function_manage1.php");
$sql=mysqli_connect("localhost","root","","notification_center");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//$sql=mysql_connect("localhost","root","Bigyear2012") or die(mysql_error());
//mysql_select_db("notification_center",$sql) or die(mysql_error());					
?>
<div class="content">
   <div class="title"><h5>Notification Center</h5></div>	
   <?php
if(isset($_REQUEST["send"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			Notification successfully send.
	</p>
	</div>
	
<?php
}
?>
		<form action="admin/send_notification.php" class="mainForm" id="valid" name="frmaudit" method="post">
      
             <div class="rowElem noborder">
             <label>Select Title:<span class="req">*</span></label>
             <div class="formRight">   
<?php	
$sql_query="select * from products";
$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
?>  			                     
		<select name="drptitle"   style="opacity: 0;color:#494949;"  id="dy" class="validate[required]">                            
	    <option value="" style="color:#494949;">Select Title</option>   
<?php
while($row=mysqli_fetch_array($result))
{
$productid=$row['id'];
$producttitle=$row['title'];
?>         
<option value="<?php echo $productid; ?>" style="color:#494949;" > <?php  echo $producttitle;?></option>            
<?php 
}	
?>      
		   </select>                      
           </div>
           <div class="fix"></div>
           </div>
                        
           <div class="rowElem">
		   <label>Message:</label>
		   <div class="formRight">
		   <textarea rows="2" cols="" class="auto" name="txtmsg" style="color:#494949;"></textarea>
		   </div>
		   <div class="fix"></div>
		   </div>
                           
<input class="greenBtn " type="submit" value="Send" style=" float: left; margin: 1px 16px 22px 175px;" name="cmdnotify" >
</form>        
</div>             
<div class="fix"></div>
</div>
<?php 
mysqli_close($sql);
include("admin_footer.php"); ?>