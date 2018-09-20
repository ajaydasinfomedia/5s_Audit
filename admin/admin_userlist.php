<?php 	 
	 session_start(); 
	 include("sadmin_dbconnect.php");	 
	 if(!isset($_SESSION['uname'])){header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");
         include_once("admin_function_manage.php");
         
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
        $statement = "`tbl_login` where `role`='admin'"; 
?>
<script type="text/javascript">    
    function load(s)
    {        
     var dt = document.getElementById("sel");                    
     var Value = dt.options[dt.selectedIndex].value;
     window.location.href="admin/admin_userlist.php?limit="+Value;          
    }            
</script>


 <!-- Content -->
    <div class="content">
    	<div class="title"><h5>User Management</h5></div>					                	
		
<?php
if(isset($_REQUEST["status"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			Status changed!!
	</p>
	</div>
	
<?php
}
?>
	
		
	<div class="widget">            
    <div class="head">
		<h5 class="iList">User Listing</h5>
     </div>
            
      <div id="example_wrapper" class="dataTables_wrapper">
    <table class="tableStatic" width="100%" cellspacing="0" cellspadding="0">
		<thead>
			<tr>
				<td style="width: 12%;">Username</td>
				<td style="width: 12%;">First Name</td>
				<td style="width: 12%;">Last Name</td>
				<td style="width: 13%;">Email id</td>								
				<td style="width: 9%;">Create Date</td>
				<td style="width: 8%;">Status</td>
				<td style="width: 12%;">View User Details</td>
                                <td style="width: 12%;">View Purchase-Plan Details</td>

			</tr>
		</thead>
<?php
$query ="SELECT * FROM {$statement}  LIMIT {$startpoint} , {$limit}";            
$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
$num=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{
$status= $row['status'];
if($status == 1)
{
	$stat = "Deactive";
}
else
{
	$stat = "Active";
}
?>
		<tbody>
			<tr>
				<td><?php echo $row['username']; ?></td>
				<td><?php echo $row['firstname']; ?></td>
				<td><?php echo $row['lastname']; ?></td>
				<td><?php echo $row['email']; ?></td>								
				<td><?php echo $row['createdate']; ?></td>
				<td><a href='<?php echo 'admin/admin_statuschange.php?uid='.$row['uid'].'&status='.$stat;?>'><?php echo $stat; ?></a></td>				
                                <td><a href='<?php echo 'admin/admin_viewdtls.php?uid='.$row['uid']?>'><img src="images/icons/dark/preview.png"></a></td>
                                <td><a href='<?php echo 'admin/admin_purchase_plandtls.php?uid='.$row['uid']?>'><img src="images/icons/dark/preview.png"></a></td>
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
			
		<div id="tab2" class="tab_content" >	
		<?php	
			if(strpos($_SERVER['REQUEST_URI'],'no'))
				{
				?>
					 <div class="nNote nFailure hideit">
						<p>
							<strong><?php echo FAILURE.":" ?></strong>							
       <?php echo OOPS." ".SORRY."!"." ".USERNAME_T." ".AND_MSG." ".EMAIL." ".ID." ".MUST." ".BE_MSG." ".UNIQUE ?>
						</p>		
					</div>  
			<?php	
				}
					if(strpos($_SERVER['REQUEST_URI'],'not_eligible'))
				{
				?>
					 <div class="nNote nFailure hideit">
						<p>
							<strong><?php echo FAILURE.":" ?></strong>
<?php echo OOPS." ".SORRY."!"." ".PLEASE." ".SIGN." ".UP_M." ".FOR_MSG." ".MORE." ".NEW_TT." ".USER_T ?>							
						</p>		
					</div>  
			<?php	
				}						
	?>	
	</div>
	</div>
		<div class="fix"></div>
	</div>
		
		
    </div>
    <div class="fix"></div>
</div>
<?php
include("admin_footer.php");?>
   