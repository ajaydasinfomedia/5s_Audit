<?php 
	error_reporting(0);
	session_start();
	if(!isset($_SESSION['uname'])){	header('location:login');}	
	if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0'){header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");}
	include("header.php"); 
	include("left_menu.php");
	include("dbconnect.php");
	include("function_manage.php");
	$suid=$_SESSION['said'];
	if(strpos($_SERVER['REQUEST_URI'],'page'))
	{
		$str_explode = explode('/',$_SERVER['REQUEST_URI']);
		$count=count($str_explode);                                                
		$page = $str_explode[$count-2];                                               
	}
	else 
	{
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);    
	}
?>
<script>
		jQuery(document).ready(function() {
		jQuery('#department_table').DataTable({
			columnDefs: [ {
						className: 'control',
						orderable: false,
						targets:   [2,3]
					} ],
			"order": [[ 1, "desc" ]],
			"pageLength": 25,
			// "searching": false
			});
		} );
</script>
<script type="text/javascript">    
	function load(s)
    {           
     window.location.href=s+"/department_add";          
    }            
</script>
<?php        
	// if(strpos($_SERVER['REQUEST_URI'],'limit'))
    // {        
    	// $str_explode = explode('/',$_SERVER['REQUEST_URI']);
        // $count=count($str_explode);                                                
        // $limit = $str_explode[$count-2];                                               
    // }
    // else
    // {
    	// $limit=5;
    // }
	// $startpoint = ($page * $limit) - $limit;        
    $statement = "`adddepartment` where superadminid = $suid ORDER BY deptname";        	
?>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6><?php if(strpos($_SERVER['REQUEST_URI'],'update')){echo 'Edit Department';}else{echo ADDDEPT;} ?></h6></div>
<?php
if(strpos($_SERVER['REQUEST_URI'],'deleted'))
{
?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
        <p>
            <strong><?php echo SUCCESS.":" ?></strong><?php echo DEPTDLTD." !! " ?>
        </p>
	</div>
<?php
}
if(strpos($_SERVER['REQUEST_URI'],'dept_save'))
{
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
        <p>
            <strong><?php echo SUCCESS.":" ?></strong><?php echo DEPTSAVED." !! " ?>
        </p>
	</div>
<?php
}
if(strpos($_SERVER['REQUEST_URI'],'dept_update'))
{
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
        <p>
            <strong><?php echo SUCCESS.":" ?></strong><?php echo DEPTUPDATED." !! " ?>
        </p>
	</div>
<?php
}
if(strpos($_SERVER['REQUEST_URI'],'update'))
{
	$str_explode = explode('/',$_SERVER['REQUEST_URI']);
	$count=count($str_explode);
	$deptid = $str_explode[$count-3];
	$sql_query="select `deptname` from adddepartment where deptid=".$deptid." and  superadminid =$suid";
	$result=mysqli_query($sql,$sql_query);
	$row=mysqli_fetch_assoc($result);
	$name=$row["deptname"];	
    $_SESSION["did"]=$deptid;
}	
?>
<?php 
if($department_add_right == 1){
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
    	<div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>  <?php if(strpos($_SERVER['REQUEST_URI'],'update')){echo 'Edit Department';}else{echo ADDDEPT;} ?></h6>
		</div>
		<div class="container my-3">
			<form class="mainForm" id="valid" method="post" action="insert.php" >
				<div class="form-group row noborder">     
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo DEPTNAME.":"?> <span class="req text-danger">*</span> </label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">   
						<input type="text" class="validate[required,custom[onlySHULetterNumber]] form-control form-control-sm" id="req" name="txtdept"  placeholder="enter department name" value="<?php if(strpos($_SERVER['REQUEST_URI'],$deptid)) echo $name; ?>"   style="color:#494949;"/>
					</div>				  
					<div class="clearfix"></div>
				</div>
				<div class="form-group row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
						<?php
						if(strpos($_SERVER['REQUEST_URI'],'update'))   
						{
						?>
							<input class="btn btn-success btn-sm" type="submit" name="edit_dept" value="<?php echo UPDATE ?>" />
							<div class="clearfix"></div> 
						<?php
						}                       
						else
						{
						?>
							<input class="btn btn-success btn-sm" type="submit" name="save_dept"  value="<?php echo SAVE_B ?>"/>
							<div class="clearfix"></div>
						<?php
						}
						?> 
					</div>		
				</div>		
			</form>
		</div>
        <div class="clearfix"></div>
	</div>     
<?php
	// $query = mysqli_query($sql,"SELECT * FROM {$statement}  LIMIT {$startpoint} , {$limit}");
	$query = mysqli_query($sql,"SELECT * FROM {$statement}");
?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
    	<div class="border pl-1 pt-2"><h6><i class="fa fa-bars" aria-hidden="true"></i>  <?php echo DEPTLIST ?></h6></div>
       	<div id="" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
        	<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%"> 
            	<thead class="text-center">
                	<tr>
                        <td><?php echo DEPARTMENT ." ".NAME?></td>
                        <td><?php echo Date ?></td>
                        <td><?php echo OPTIONS ?></td>
                	</tr>
				</thead>
				<tbody>
				<?php	
                $num=  mysqli_num_rows($query);
                while($row=mysqli_fetch_array($query))
                {
                ?>
                    
                        <tr class="odd gradeX text-center">
                            <td><?php echo $row["deptname"]?></td>                
                            <td><?php echo date("Y-m-d",strtotime($row['depttimestamp'])); ?></td>                
                            <td>
								<a href=<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['deptid']."/update/department_add" ?> data-toggle="tooltip" title=" Edit ">
                                  <img class='mr10 p-2' src='images/icons/dark/pencil.png' />
                                </a>
								
                                <a onclick="return confirm('<?php echo POPUPDLT ?>');" href=<?php echo 'delete.php?deptid='.$row[0]; ?> data-toggle="tooltip" title=" Delete ">
                                 <img class='mr10 p-2' src='images/uploader/deleteFile.png' />
                                </a>
                            </td>                
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
						$str_explode = explode('/',$_SERVER['REQUEST_URI']);
						$count=count($str_explode);
						$new_limit = $str_explode[$count-2];
                    ?>
						<span class="itemsPerPage"><?php echo ITEMSPERPAGE.":" ?></span>
						<select id="sel" name="example_length" size="1" style="opacity: 0;" onchange="load(this.value)" >
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
                        <?php echo pagination($statement,$limit,$page);?>
                    </span>
				</div>
			</div>--> 
		</div>
    <div class="clearfix"></div>    
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
</div>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			sDom: 'lfrtip'
        });
    });
</script>
<?php include_once("footer.php");?>