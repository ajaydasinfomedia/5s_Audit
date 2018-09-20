<?php 	 
	session_start(); 
	include("sadmin_dbconnect.php");	 
	if(!isset($_SESSION['uname'])){header('location:admin/index.php');}	
	include("admin_header.php"); 
	include("admin_left_menu.php");
?>
<div class="content">
	<div class="title"><h5>User Management</h5></div>					                		
<?php
if(isset($_REQUEST["status"]))
{
?>	
	<div class="nNote nSuccess hideit"><p><strong>Success:</strong>Status changed!!</p></div>
<?php
}
?>
	<div class="table">
    	<div class="head"><h5 class="iFrames">User Listing</h5></div>
        	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
				<thead>
					<tr>
					<th>UserId</th><th>SuperUserId</th><th>Username</th><th>FirstName</th><th>CreateDate</th><th>Product</th><th>Status</th>
					</tr>
				</thead>
                <tbody>
<?php
$query = "SELECT l.*,lr.status as stat,lr.producttype as pt FROM `tbl_login` as l,`tbl_login_relation` as lr  where l.uid = lr.uid order by l.uid desc";
$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
$num=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result))
{
$status= $row['stat'];
if($status == 1)
{
	$stat = "Deactive";
}
else
{
	$stat = "Active";
}
?>
	<tr class="gradeA">
		<td><?php echo $row['uid'];?></td><td><?php echo $row['superadminid'];?></td><td><?php echo $row['username'];?></td><td><?php echo $row['firstname'];?></td><td><?php echo $row['createdate'];?></td>
        <td><?php echo $row['pt'];?></td>								
		<td><a href='<?php echo 'admin/admin_statuschange.php?uid='.$row['uid'].'&status='.$stat;?>'><?php echo $stat; ?></a></td>				
        <?php /*?><td><a href='<?php echo 'admin/admin_viewdtls.php?uid='.$row['uid']?>'><img src="images/icons/dark/preview.png"></a></td><?php */?>
    <?php /*?>	<td><a href='<?php echo 'admin/admin_purchase_plandtls.php?uid='.$row['uid']?>'><img src="images/icons/dark/preview.png"></a></td><?php */?>
	</tr>
	
<?php
}
?>
</tbody>
</table>     
</div>
</div>
<div class="fix"></div>
</div>
<?php include("admin_footer.php");?>