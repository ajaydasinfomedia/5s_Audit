<?php 
session_start();
if(!isset($_SESSION['uname'])){header('location:admin/index.php');}
include("admin_header.php"); 
include("admin_left_menu.php"); 
include("sadmin_dbconnect.php");
 include_once("admin_function_manage1.php");
         
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
?>
<script type="text/javascript">    
    
    function load(s)
    {            
     var dt = document.getElementById("sel");                    
     var Value = dt.options[dt.selectedIndex].value;     
     window.location.href="admin/admin_planmgt.php?limit="+Value;          
    }                
</script>
<?php                    

     if(isset($_REQUEST['cmdgo']))
{
if($_REQUEST['drpplantype'] != '' )
{
	
    if($_REQUEST['drpplantype'] == "All" ){
        $statement = "`plan_options`  ORDER BY createdate DESC";
         $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit}";
$result=mysqli_query($sql,$sql_query); 
$disp1=mysqli_num_rows($result);
  // echo $disp1;       
    }
    else{
 $statement = "`plan_options` where plan_type='".$_REQUEST["drpplantype"]."' ORDER BY createdate DESC";
  $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit}";
$result=mysqli_query($sql,$sql_query); 
$disp2=mysqli_num_rows($result);
  // echo $disp2;       
    }	 

}
}

elseif(isset($_REQUEST['ptype']) && $_REQUEST['ptype']  != '' )
{
	
 $statement = "`plan_options` where plan_type='".$_REQUEST["ptype"]."' ORDER BY createdate DESC";
		 
 $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit}";
$result=mysqli_query($sql,$sql_query); 
$disp2=mysqli_num_rows($result);
   //echo $disp2;       
}

else
{
    $statement = "`plan_options` ORDER BY createdate DESC"; 	
     $sql_query="select * from {$statement}  LIMIT {$startpoint} , {$limit}";
    $result=mysqli_query($sql,$sql_query); 
    $disp3=mysqli_num_rows($result);
       // echo $disp3;       
}

?>
    <div class="content">
    	<div class="title"><h5>Plan Management</h5></div>			
		
		
<?php
if(isset($_REQUEST["update"]))
{
?>	
	<div class="nNote nSuccess hideit">
	<p>
		<strong>Success:</strong>
			Plan Information updated!!
	</p>
	</div>
	
<?php
}
?>	
		<form action="admin/admin_planmgt.php" class="mainForm" name="frmaudit" method="post">
		<div class="rowElem noborder">
                    <span style="margin-right: 10px; float:left; padding: 15px 0;color:#494949;">Select Options</span>
                    <div class="formRight">
			<?php	
                        
$statement="`plan_options` ORDER BY createdate DESC"; 	                       
$query="select * from {$statement} LIMIT {$startpoint} , {$limit}";
$res=mysqli_query($sql,$query);

$num=mysqli_num_rows($res);
if($res === FALSE){die(mysqli_error($sql));}
?>
		<select name="drpplantype" style="opacity: 0;"  id="t1"  style="color:#494949;">
                    <option  value="All"  style="color:#494949;">All</option>
//<?php
//while($row=mysql_fetch_array($res))
//{    
//echo $ptype=$row['plan_type'];
//?>
		<option <?php if(isset($_REQUEST['cmdgo'])){ if( $_REQUEST["drpplantype"] == "5s"  )
                    { echo 'selected="selected"';}}
                     else {   
                         if(isset($_REQUEST["ptype"]) && $_REQUEST["ptype"] == "5s" ){
                             echo 'selected="selected"';
                         }
                     }
                    ?>
                    value="5s" style="color:#494949;">5s
                </option>
                
                <option <?php if(isset($_REQUEST['cmdgo'])){ if( $_REQUEST["drpplantype"] == "7w"  )
                    { echo 'selected="selected"';}}
                    else {   
                         if(isset($_REQUEST["ptype"]) && $_REQUEST["ptype"] == "7w"){
                             echo 'selected="selected"';
                         }
                     }
                    ?>
                    value="7w" style="color:#494949;">7w
                </option>
//<?php
//}
//?>
                </select>                                 

		 <input class="greenBtn" type="submit" name="cmdgo" onchange="load(this.value)" value="Go" style="margin-left:10px;" />
</div>
<div class="fix"></div>
</div>      
	  </form>
	<div class="widget">	
            <div class="head">
<h5 class="iList">Plan Listing</h5>
             </div>
            <div id="example_wrapper" class="dataTables_wrapper">
                <table class="tableStatic" width="100%" cellspacing="0" cellspadding="0" style="text-align: center;">
	<thead>
	<tr>
	<td style="width: 20%;">Total User</td>
	<td style="width: 20%;">Price</td>
	<td style="width: 20%;">Plan Name</td>
	<td style="width: 20%;">Plan Type</td>
        <td style="width: 20%;">Edit</td>
	</tr>
	</thead>

        <?php
while($row=mysqli_fetch_array($result))
{    
 $tot_user=$row['total_user'];
 $price=$row['price'];
 $plan_name=$row['plan_name'];
 $plan_type=$row['plan_type'];
?>

	<tbody>
	<tr>
		<td id="txttname" style="color:#494949;"><?php echo $tot_user ?></td>
		<td id="txtdname" style="color:#494949;"><?php echo $price ?></td>
		<td id="txtdate" style="color:#494949;"><?php echo $plan_name; ?></td>
		<td id="txtdate" style="color:#494949;"><?php echo $plan_type; ?></td>
		<td><a href='<?php echo 'admin/admin_editplan.php?pid='.$row["plan_id"]?>' >
                    <img class='mr10' alt='' src='images/icons/dark/pencil.png' /></a></td>		
	</tr>

	</tbody>
<?php
}
?>
	</table>
    
                <?php 
    if($disp1 >= 4 || $disp3 >= 4 || $disp2 > 5)
      {
      ?>
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

</label>
        <?php
      }
      ?>
        
    </div>
<div id="example_paginate" class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers">
<span>
     <?php
	echo pagination($statement,$limit,$page);
     ?>
</span>
</div>
</div>                      
<?php
      }
      ?>
    </div>	
        </div>
    </div>
    <div class="fix"></div>
</div>
<?php include("admin_footer.php"); ?>