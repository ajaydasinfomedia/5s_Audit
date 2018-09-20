<?php 	 
	 session_start(); 
	 include("sadmin_dbconnect.php");	 
	 if(!isset($_SESSION['uname'])){header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");
         include("admin_function_manage2.php");
         
         $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);   
         
         if(isset($_REQUEST["limit"]))
        {                    
            $limit = $_REQUEST["limit"];
        }
        else
        {
            $limit=5;
        }
    	$startpoint = ($page * $limit) - $limit;
                
        //to make pagination        
        $statement = "`coupon_mgt` order by date_created DESC"; 
?>
<script type="text/javascript">    
    function load(s)
    {        
     var dt = document.getElementById("sel");                    
     var Value = dt.options[dt.selectedIndex].value;
     window.location.href="admin/admin_couponlist.php?limit="+Value;          
    }            
</script>


 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>Coupon Listing</h5></div>					                			
<?php
if(isset($_REQUEST["delete"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			Coupon Information deleted!!
	</p>
	</div>
	
<?php
}
if(isset($_REQUEST["update"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			Coupon Information updated!!
	</p>
	</div>
	
<?php
}
?>
	<div class="widget">            
    
      <div id="example_wrapper" class="dataTables_wrapper">
    <table class="tableStatic" width="100%" cellspacing="0" cellspadding="0" style="text-align: center;">
		<thead>
			<tr>
				<td style="width: 16%;">Coupon Code</td>
				<td style="width: 16%;">Type</td>
                                <td style="width: 16%;">Product Type</td>
				<td style="width: 16%;">Amount</td>											
				<td style="width: 16%;">Expiry Date</td>                                
                                <td style="width: 10%;">Delete</td>
                                <td style="width: 10%;">Edit</td>
			</tr>
		</thead>
<?php
$query ="SELECT * FROM {$statement}  LIMIT {$startpoint} , {$limit}";            
$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
$num=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{
?>
		<tbody>
			<tr>
				<td><?php echo $row['coupon_code']; ?></td>
				<td><?php echo $row['type']; ?></td>
                                <td><?php echo $row['prod_type']; ?></td>
				<td><?php echo $row['amount']; ?></td>											
				<td><?php echo $row['validity']; ?></td>				
                                <td><a href='<?php echo 'admin/delete.php?id='.$row['Id']?>'><img class="mr10" src="images/uploader/deleteFile.png"></a></td>
                                <td><a href='<?php echo 'admin/admin_editcoupon.php?id='.$row['Id']?>'><img src="images/icons/dark/pencil.png"></a></td>
			</tr>
		</tbody>
<?php
}
?>
	</table>     
          
          <div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">    
    
<div id="example_length" class="dataTables_length">
<label>    
     <?php 
    if($num >= 5)
      {
      ?>
<span class="itemsPerPage">Items per page</span>
<select id="sel" name="example_length" size="1" style="opacity: 0;" onchange="load(this.value)" >
    <option style="color:#494949;" value="5"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==5) echo "selected='selected' " ?>>5</option>
<option style="color:#494949;" value="10"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==10) echo 'selected="selected"'  ?>>10</option>
<option style="color:#494949;" value="15"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==15) echo 'selected="selected"' ?>>15</option>
<option style="color:#494949;" value="20"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==20) echo 'selected="selected"' ?>>20</option>
<option style="color:#494949;" value="25"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==25) echo 'selected="selected"' ?>>25</option>
</select>
<?php
      }
      ?>
</label>
    </div>
<div id="example_paginate" class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers">
<span>
     <?php
	echo pagination($statement,$limit,$page);
     ?>
</span>
</div>
</div>  
          
		</div>
		</div>
	</div>
		<div class="fix"></div>
	</div>
		
		
    </div>
    <div class="fix"></div>
</div>
<?php
include("admin_footer.php");?>
   