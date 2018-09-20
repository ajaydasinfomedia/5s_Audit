<?php
session_start();
if(!isset($_SESSION['uname'])){header('location:login');}
if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
					 {
					  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
					 }
include("header.php"); 
include("left_menu.php"); 
include("dbconnect.php");
include_once("function_history.php");
$suid=$_SESSION['said'];
$uid=$_SESSION['uid'];       
if(strpos($_SERVER['REQUEST_URI'],'page')){
$str_explode = explode('/',$_SERVER['REQUEST_URI']);
$count=count($str_explode);                                                
$page = $str_explode[$count-2];                                               
}
else {
$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);    
}
?>
<script>
		jQuery(document).ready(function() {
		jQuery('#archive_table').DataTable({
			columnDefs: [ {
						className: 'control',
						orderable: false,
						targets:   [4,5]
					} ],
			"order": [[ 3, "desc" ]],
			"pageLength": 25,
			// "searching": false
			});
		} );
</script>
<script type="text/javascript">    
    function load1(s)
    {        
     var t = document.getElementById("t1");                    
     var Value1 = t.options[t.selectedIndex].value;
     var d = document.getElementById("d1");                    
     var Value2 = d.options[d.selectedIndex].value;  
     window.location.href=s+"/temp/"+Value1+"/dept/"+Value2+"/history";
    }       
</script>
<?php
    // if(strpos($_SERVER['REQUEST_URI'],'limit'))
        // {        
            // if(strpos($_SERVER['REQUEST_URI'],'page')){
            // $str_explode = explode('/',$_SERVER['REQUEST_URI']);
            // $count=count($str_explode);                               
            // $limit = $str_explode[$count-8];         
            // }
            // else{
                // $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                // $count=count($str_explode);                               
                // $limit = $str_explode[$count-6];         
            // }
        // }
        // else
        // {
            // $limit=5;
        // }
    	// $startpoint = ($page * $limit) - $limit;              
if(isset($_REQUEST['cmdgo']))
{
if($_REQUEST['drptemplate'] != '' && $_REQUEST['drpdept'] != '')
{
	if($suid == $uid)
	{
     $statement = "`tbl_project` where status=0 and tempid='".$_REQUEST['drptemplate']."' and deptid ='".$_REQUEST['drpdept']."'
            		and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
		$statement = "`tbl_project` where status=0 and tempid='".$_REQUEST['drptemplate']."' and deptid ='".$_REQUEST['drpdept']."'
            			and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}		
    // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit}";
    $sql_query="select * from {$statement}";
}
if($_REQUEST['drptemplate'] == '0' && $_REQUEST['drpdept'] != '' )
{
	if($suid == $uid)
	{
     $statement = "`tbl_project` where status=0 and deptid ='".$_REQUEST['drpdept']."' and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	 $statement = "`tbl_project` where status=0 and deptid ='".$_REQUEST['drpdept']."' and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
     // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit} ";
     $sql_query="select * from {$statement}";
}
if($_REQUEST['drptemplate'] != '' && $_REQUEST['drpdept'] == '0'  )
{
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0 and tempid='".$_REQUEST['drptemplate']."' and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	$statement = "`tbl_project` where status=0 and tempid='".$_REQUEST['drptemplate']."' and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
    // $sql_query="select * from {$statement}  LIMIT {$startpoint} , {$limit} ";
    $sql_query="select * from {$statement}";
}
if($_REQUEST['drptemplate'] == '0' && $_REQUEST['drpdept'] == '0')
{
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0 and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	$statement = "`tbl_project` where status=0 and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
    // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit} ";
    $sql_query="select * from {$statement}";
}
}
else
{
if($suid == $uid)
	{
$statement = "`tbl_project` where status=0 and `superadminid`=$suid  ORDER BY pdate DESC";
}
else
{
$statement = "`tbl_project` where status=0 and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
}
 // $sql_query="select * from {$statement}  LIMIT {$startpoint} , {$limit}";
 $sql_query="select * from {$statement}";
}
if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept') && strpos($_SERVER['REQUEST_URI'],'page') )
{    
    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
    $count=count($str_explode);
    $dept = $str_explode[$count-4];
    $temp = $str_explode[$count-6];
    if($dept != '0' && $temp != '0'){
	if($suid == $uid)
	{
      $statement = "`tbl_project` where status=0 and tempid=$temp and deptid=$dept and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	  $statement = "`tbl_project` where status=0 and tempid=$temp and deptid=$dept and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
      // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit}";   
      $sql_query="select * from {$statement}";   
    }
if($dept!='0' && $temp=='0'){
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0  and deptid =$dept and `superadminid`=$suid ORDER BY pdate DESC ";
	}
	else
	{
	$statement = "`tbl_project` where status=0  and deptid =$dept and `superadminid`=$suid ans `uid` = '$uid' ORDER BY pdate DESC ";
	}
    // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit} ";
    $sql_query="select * from {$statement}";
}
if($dept=='0' && $temp!='0'){
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0  and tempid=$temp and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	 $statement = "`tbl_project` where status=0  and tempid=$temp and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
    // $sql_query="select * from {$statement}  LIMIT {$startpoint} , {$limit} ";
    $sql_query="select * from {$statement}";
}
if($dept=='0' && $temp=='0'){
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0 and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	 $statement = "`tbl_project` where status=0 and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
     // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit} ";
     $sql_query="select * from {$statement}";
}
}
else if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
{
    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
    $count=count($str_explode);
    $dept = $str_explode[$count-2];
    $temp = $str_explode[$count-4];
    if($dept != '0' && $temp != '0'){
	if($suid == $uid)
	{
      $statement = "`tbl_project` where status=0 and tempid=$temp and deptid=$dept and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	  $statement = "`tbl_project` where status=0 and tempid=$temp and deptid=$dept and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
      // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit}";   
      $sql_query="select * from {$statement}";   
}
if($dept!='0' && $temp=='0'){
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0  and deptid =$dept and `superadminid`=$suid ORDER BY pdate DESC ";
	}
	else
	{
	$statement = "`tbl_project` where status=0  and deptid =$dept and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC ";
	}
    // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit} ";
    $sql_query="select * from {$statement}";
}
if($dept=='0' && $temp!='0'){
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0  and tempid=$temp and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	 $statement = "`tbl_project` where status=0  and tempid=$temp and `superadminid`=$suid
	 and `uid` = '$uid' ORDER BY pdate DESC";
	}
    // $sql_query="select * from {$statement}  LIMIT {$startpoint} , {$limit} ";
    $sql_query="select * from {$statement}";
}
if($dept=='0' && $temp=='0'){
	if($suid == $uid)
	{
    $statement = "`tbl_project` where status=0 and `superadminid`=$suid ORDER BY pdate DESC";
	}
	else
	{
	 $statement = "`tbl_project` where status=0 and `superadminid`=$suid and `uid` = '$uid' ORDER BY pdate DESC";
	}
     // $sql_query="select * from {$statement} LIMIT {$startpoint} , {$limit} ";
     $sql_query="select * from {$statement}";
}
}
$latest_result=mysqli_query($sql,$sql_query);       
?>  
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
    	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
		<h6><?php echo ARCHIVE ?></h6></div>
<?php 
if($history_right == 1){
?>		
<?php	
if(strpos($_SERVER['REQUEST_URI'],'deleted'))
{
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
	<p>
		<strong><?php echo SUCCESS.":" ?></strong><?php echo AUDITDLTD." !! " ?>
	</p>
	</div>
<?php
}
if(strpos($_SERVER['REQUEST_URI'],'moved'))
{
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
	<p>
		<strong><?php echo SUCCESS.":" ?></strong><?php echo AUDITARCH." !! " ?>
	</p>
	</div>
<?php
}
?>	
	<div class="container mt-3">				
		<form action=<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/history"?> class="mainForm" name="frmaudit" method="post">
			<div class="form-group row noborder">
				<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label float-left"><?php echo SELECTOPTIONS.":" ?></label>
				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left">
					<?php	
					$sql_query="select * from addtemplate where superadminid=$suid";
					$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
					?>
					<select name="drptemplate" style="color:#494949;" id="t1" class="form-control form-control-sm imgopocity">
							<option value="0" selected="selected" style="color:#494949;"><?php echo ALL ?></option>
					<?php
					while($row=mysqli_fetch_array($result))
					{
					$tid=$row['tempid'];
					$templatename=$row['tempname'];
					?>
							<option <?php if(isset($_REQUEST['cmdgo'])){ if( $_REQUEST["drptemplate"] == $tid ){ echo 'selected="selected"';}}
										 else {                                                                                                
												if(strpos($_SERVER['REQUEST_URI'],'limit') && strpos($_SERVER['REQUEST_URI'],'page'))
												 {    
													$str_explode = explode('/',$_SERVER['REQUEST_URI']);
													$count=count($str_explode);
													$temp = $str_explode[$count-6];   
													if($temp==$tid){ echo 'selected="selected"';}
												 }
												 else if(strpos($_SERVER['REQUEST_URI'],'limit'))
												 {    
													$str_explode = explode('/',$_SERVER['REQUEST_URI']);
													$count=count($str_explode);
													$temp = $str_explode[$count-4];   
													if($temp==$tid){echo 'selected="selected"';}
												 }      
												 else if(strpos($_SERVER['REQUEST_URI'],'page'))
												 {    
													$str_explode = explode('/',$_SERVER['REQUEST_URI']);
													$count=count($str_explode);
													$temp = $str_explode[$count-6];   
													if($temp==$tid){echo 'selected="selected"';}
												 }      
											  }
					?>
										value="<?php echo $tid; ?>" style="color:#494949;"> <?php  echo $templatename;?> </option>
					<?php 
					}	
					?>
					</select>
				</div>
				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left mt-sm-0 mt-2">
					<?php	
					$sql_query="select * from adddepartment where superadminid=$suid";
					$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
					?>
					<select name="drpdept"  style="opacity: 0;color:#494949;" id="d1" class="form-control form-control-sm imgopocity">
						<option  value="0" selected="selected" style="color:#494949;"><?php echo ALL ?></option>
					<?php
					while($row=mysqli_fetch_array($result))
					{
					$did=$row['deptid'];
					$departmentname=$row['deptname'];
					?>
							<option  <?php if(isset($_REQUEST['cmdgo'])){ if($_REQUEST['drpdept'] == $did){echo 'selected="selected"'; }}
									else {                                                                                                
										   if(strpos($_SERVER['REQUEST_URI'],'limit') && strpos($_SERVER['REQUEST_URI'],'page'))
											{    
												$str_explode = explode('/',$_SERVER['REQUEST_URI']);
												$count=count($str_explode);
												$dept = $str_explode[$count-4];   
												if($dept==$did){ echo 'selected="selected"';}
											}
											else if(strpos($_SERVER['REQUEST_URI'],'limit'))
											{    
												$str_explode = explode('/',$_SERVER['REQUEST_URI']);
												$count=count($str_explode);
												$dept = $str_explode[$count-2];   
												if($dept==$did){echo 'selected="selected"';}
											}   
											else if(strpos($_SERVER['REQUEST_URI'],'page'))
											{    
												$str_explode = explode('/',$_SERVER['REQUEST_URI']);
												$count=count($str_explode);
												$dept = $str_explode[$count-4];   
												if($dept==$did){echo 'selected="selected"';}
											}
										}
					 ?>
										value="<?php echo $did; ?>" style="color:#494949;" > <?php  echo $departmentname;?> </option>
					<?php 
					}
					?>
					</select>
				</div>
				<div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left mt-sm-0 mt-2">
					<input class="btn btn-success btn-sm " type="submit" name="cmdgo" onchange="load(this.value)" value="<?php echo GO_B ?>" style="margin-left:10px;" />
				</div>
				<div class="fix"></div>
			</div>      
		</form>	 
	</div>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0">
		<div class="border pl-1 pt-2 mb-3">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo AUDITLIST ?></h6>
		</div>
		<div id="" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
				<thead class="text-center">
					<tr>
						<td><?php echo TEMPLATENAME ?></td>
						<td><?php echo DEPTNAME?></td>
						<td><?php echo STATUS ?></td>
						<td><?php echo DATE ?></td>
						<td><?php echo OPTIONS?></td>
					</tr>
				</thead>
				<tbody>
				<?php
				$num=  mysqli_num_rows($latest_result);
				while($row=mysqli_fetch_array($latest_result))
				{
				$status_progress = $row['status_progress'];

				if($status_progress == 1)
				{
					$sp = 'In Progress';
				}
				else
				{
					$sp = 'Completed';
				}
				?>
					<tr>
						<td align="center"><?php echo $row['tempname']; ?></td>
						<td align="center"><?php echo $row['deptname']; ?></td>
						<td align="center"><?php echo $sp; ?></td>
						<td align="center"><?php echo $row['pdate']; ?></td>
						<td align="center">
						<a href=<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['pid']."/pdf";?> data-toggle="tooltip" title=" PDF " ><img class='mr10 p-2' alt='' src='images/icons/color/blue-document-pdf-text.png' /></a>
						<a onclick="return confirm('<?php echo POPUPDLT ?>');" href=<?php echo 'delete_history.php?project_id='.$row['pid'];?> data-toggle="tooltip" title=" Delete ">
						<img class='mr10 p-2' alt='' src='images/uploader/deleteFile.png' /></a></td>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
			<!--<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
			<div id="example_length" class="dataTables_length">
			<label>
				<?php 
				if($num >= 5)
				  {
				  ?>
			<span class="itemsPerPage"><?php echo ITEMSPERPAGE.":" ?></span>
			<select id="sel" name="example_length" size="1" style="opacity: 0;" onchange="load1(this.value)" >
			<?php
					$str_explode = explode('/',$_SERVER['REQUEST_URI']);
				$count=count($str_explode);
					if(strpos($_SERVER['REQUEST_URI'],'page'))
					{        
						$new_limit = $str_explode[$count-8];
					}
					else{
				$new_limit = $str_explode[$count-6];
					}        
			?>
			<option style="color:#494949;" value="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/"."limit/"?>5"<?php if(isset($new_limit) && $new_limit==5) echo "selected='selected' " ?>>5</option>
			<option style="color:#494949;" value="<?php  echo $_SESSION['dname']."/".$_SESSION['uname']."/"."limit/"?>10" <?php if(isset($new_limit) && $new_limit==10) echo 'selected="selected"'  ?>>10</option>
			<option style="color:#494949;" value="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/"."limit/"?>15"<?php if(isset($new_limit) && $new_limit==15) echo 'selected="selected"' ?>>15</option>
			<option style="color:#494949;" value="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/"."limit/"?>20"<?php if(isset($new_limit) && $new_limit==20) echo 'selected="selected"' ?>>20</option>
			<option style="color:#494949;" value="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/"."limit/"?>25"<?php if(isset($new_limit) && $new_limit==25) echo 'selected="selected"' ?>>25</option>
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
			</div>--> 
		</div>	        
	</div>
<?php } else { ?>
<style>
#footer {
    position:fixed;
    bottom:0;
}
</style>
<h5><br><br>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">You Are Not Authorized To Access This Page...!
	</div>
</h5>
<?php } ?>
</div>
<div class="fix"></div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			sDom: 'lfrtip'
        });
    });
</script>
<?php include("footer.php"); ?>