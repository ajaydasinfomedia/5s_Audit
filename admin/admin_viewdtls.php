<?php 	 
	 session_start(); 
	 include("sadmin_dbconnect.php");	 
	 if(!isset($_SESSION['uname'])){header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");
         include("admin_function_manage.php");
         
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
        
        
        if(isset($_REQUEST["uid"])){                    
            $uid=$_REQUEST["uid"];
        $statement = "`tbl_login` as l,`tbl_login_relation` as lr where l.superadminid = '$uid'  and role = 'auditor' and l.`uid` = lr.uid ";
        }        
        
       /* if(isset($_REQUEST["status"])){
            $uid=$_REQUEST["uid"];
            
            $query="select * from tbl_login where uid=$uid";
                $result=mysql_query($query) or die(mysql_error());
                
                while($row=mysql_fetch_array($result))
                {
                    $suid=$row["superadminid"];
                }
            
        $statement = "tbl_login` as l,`tbl_login_relation` as lr where l.superadminid = '$uid' and l.superadminid = lr.superadminid  and role = 'auditor'";
        }*/
        
?>
<script type="text/javascript">    
    function load(s)
    {        
     var dt = document.getElementById("sel");                    
     var Value = dt.options[dt.selectedIndex].value;
     window.location.href="admin/admin_index.php?limit="+Value;          
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
		<h5 class="iList">Auditor Listing</h5>
     </div>
            
      <div id="example_wrapper" class="dataTables_wrapper">
          <table class="tableStatic" width="100%" cellspacing="0" cellspadding="0" style="text-align: center;">
		<thead>
			<tr>
				<td style="width: 25%;">Username</td>
				<td style="width: 20%;">First Name</td>
				<td style="width: 20%;">Last Name</td>
				<td style="width: 20%;">Product</td>	
               <!-- <td style="width: 25%;">Email</td>	-->						
				<td style="width: 15%;">Create Date</td>
				<!--<td style="width: 8%;">Status</td>-->
			</tr>
		</thead>
<?php

$query ="SELECT l.*,lr.producttype as pt FROM {$statement}  LIMIT {$startpoint} , {$limit}";            
$result=mysqli_query($sql,$query) or die(mysqli_error($sql));

while($row=mysqli_fetch_array($result))
{               
     $arr=$row["username"];
     $arr1=$row["firstname"];
     $arr2=$row["lastname"];         
     $arr3=$row["email"];     
     $arr4=$row["createdate"];     

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
				<td><?php echo $arr; ?></td>
				<td><?php echo $arr1; ?></td>
				<td><?php echo $arr2; ?></td>
                <td><?php echo $row['pt']; ?></td>
				<!--<td><?php //echo $arr3; ?></td>	-->							
				<td><?php echo $arr4 ?></td>                                
				<!--<td><a href='<?php //echo 'admin/auditor_statuschange.php?uid='.$row['uid'].'&status='.$stat;?>'><?php //echo $stat; ?></a></td>-->				                               
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
   