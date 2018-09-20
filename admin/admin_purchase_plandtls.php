<?php 	 
	 session_start(); 
	 include("sadmin_dbconnect.php");	 
	 if(!isset($_SESSION['uname'])){header('location:admin/index.php');}	
	 include("admin_header.php"); 
	 include("admin_left_menu.php");
         include("admin_function_manage3.php");         
         
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
        $statement = "`tbl_plan` where uid = '$uid'";        
        }        
        
?>
<script type="text/javascript">    
    function load(s)
    {        
        var qs = (function(a) {
    if (a == "") return {};
    var b = {};
    for (var i = 0; i < a.length; ++i)
    {
        var p=a[i].split('=');
        if (p.length != 2) continue;
        b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
    }
    return b;
})(window.location.search.substr(1).split('&'));

        
     var dt = document.getElementById("sel");                    
     var Value = dt.options[dt.selectedIndex].value;
     //alert(Value);
     window.location.href="admin/admin_purchase_plandtls.php?limit="+Value+"&uid="+qs["uid"];          
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
		<h5 class="iList">Order History</h5>
     </div>
            
      <div id="example_wrapper" class="dataTables_wrapper">
          <table class="tableStatic" width="100%" cellspacing="0" cellspadding="0" style="text-align: center;">
		<thead>
			<tr>				
				<td style="width: 20%;">No Of User</td>
				<td style="width: 20%;">Price</td>
				<td style="width: 20%;">No Of Period</td>								
				<td style="width: 20%;">Create Date</td>				
			</tr>
		</thead>
<?php
 $query ="SELECT * FROM {$statement}  LIMIT {$startpoint} , {$limit}";            
$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
$num=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{                    
     $arr1=$row["num_of_user"];
     $arr2=$row["price"];         
     $arr3=$row["num_of_period"];     
     $arr4=$row["createdate"];     
?>
		<tbody>
			<tr>				
				<td><?php echo $arr1; ?></td>
				<td><?php echo $arr2; ?></td>
				<td><?php echo $arr3; ?></td>								
				<td><?php echo $arr4 ?></td>                                				
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
   