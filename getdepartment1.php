<?php
	session_start();	
	include('dbconnect.php');

	$sqlq="select  DISTINCT deptname,deptid from tbl_project where tempid='".$_GET["c"]."' and superadminid = '".$_SESSION['said']."' and status = 1 ";
	$result = mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
	$num = mysqli_num_rows($result);
?>
<style>
    .bimg{
        background: url('../images/forms/select_right.png') no-repeat scroll right center transparent;
        position: relative;
        z-index: 1000;
    }
</style>
<div  style="position: relative;width: 190px;">
	<span id="dname1" style="background: url('../images/forms/select_right.png') no-repeat scroll right center transparent;cursor: pointer;font-size: 11px;
    						height: 26px;line-height: 26px;position: absolute;right: -1px;top: 0;width: 190px; border: 1px solid #d5d5d5;">Select Department</span>
    <select  name="drpdept"  style="position: relative;width: 190px;" id="dd1" onchange="return show1(this.value)" class="form-control form-control-sm imgopocity">
		<option  value="0" style="color:#494949;" >Select Department</option>
  		<?php 
  	 	while($row=mysqli_fetch_array($result)) 
  		{ 
  		?>
 			<option  value ="<?php echo $row['deptid']; ?>" style="color:#494949;"><?php echo $row['deptname'];?></option>
		<?php 
        } 
        ?>
 	</select>
</div>