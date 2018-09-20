<?php 	 
	 session_start(); 
	 include("dbconnect.php");
	 $uid=$_SESSION['uid'];
         $suid=$_SESSION['said']; 
         $dbnm=$_SESSION['dbname'];
	 if(!isset($_SESSION['uname'])){	header('location:login');}	
	 if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
					 {
					  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
					 }
	 include("header.php"); 
	 include("left_menu.php");
?>

 <!-- Content -->
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
    	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
			<h6> <?php echo STATISTICS ?></h6>
		</div>					
		
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
		<div class="border pl-1 pt-2">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo AUDITORLIST ?></h6>
		</div>
		<div id="" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 my-3">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
				<thead class="text-center">
					<tr>
						<td><?php echo AUDITOR ?></td>
						<td><?php echo TOTNOAUDIT ?></td>
						<td><?php echo NOOFINPROG ?></td>
						<td><?php echo NOOFCOMPLTED ?></td>
						<td><?php echo STATUS ?></td>                                
					</tr>
				</thead>
				<tbody>
					<?php
					// SECOND DBCONNECT
					// Because we use coomon table(tbl_language)

					$sql1=mysqli_connect("localhost","root","") or die('Could not connect: 2');	
					mysqli_select_db($sql1,"5s_web") or die ('Can\'t use foo : ' . mysqli_error($sql1));
							 
					$sql_query= "select l.*,r.status as rstatus from tbl_login as l,tbl_login_relation as r where l.role='auditor' and l.superadminid = $suid 
								 and l.uid = r.uid and r.producttype  like '5s'";
					$result=mysqli_query($sql1,$sql_query) or die(mysqli_error($sql1));

					$arr1=array();
					$arr=array();

					while($row=mysqli_fetch_array($result))
					{               
						 $arr=$row["firstname"]." ".$row["lastname"];         
						 $arr1=$row["uid"]; 
						 $status=$row["rstatus"];
					if($status == 1)
					{
						$stat = "Active";
					}
					else
					{
						$stat = "Deactive";
					}
						 //echo $arr1;
						 //echo $arr;
						 
						 
					$sql=mysqli_connect("localhost","root","") or die('Could not connect: 1');	
					mysqli_select_db($sql,$dbnm) or die ('Can\'t use foo : ' . mysqli_error($sql));


					$query="SELECT * FROM `tbl_project` WHERE `superadminid`='$suid' and `uid` = '$arr1' and `status`=1";
					$res=mysqli_query($sql,$query) or die(mysqli_error($sql));
					$tot_audit=mysqli_num_rows($res);

					$query1="SELECT * FROM `tbl_project` WHERE `superadminid`='$suid' and `uid` = '$arr1' and `status`=1 and `status_progress`=1 ";
					$res1=mysqli_query($sql,$query1) or die(mysqli_error($sql));
					$tot_ip=mysqli_num_rows($res1);

					$query2="SELECT * FROM `tbl_project` WHERE `superadminid`='$suid' and `uid` = '$arr1' and `status`=1 and `status_progress`=0 ";
					$res2=mysqli_query($sql,$query2) or die(mysqli_error($sql));
					$tot_comp=mysqli_num_rows($res2);
					mysqli_close($sql) or die(mysqli_error($sql));
					?>
					<tr>
						<td align="center"><?php echo $arr ?></td>
						<td align="center"><?php echo $tot_audit ?></td>
						<td align="center"><?php echo $tot_ip ?></td> 
						<td align="center"><?php echo $tot_comp ?></td> 
						<td align="center"><?php echo $stat ?></td>
					</tr>
				<?php
				}
				?>	 
				</tbody>	
			</table>     
		</div>
	</div>
</div>   
 <div class="fix"></div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			sDom: 'lfrtip',
        });
    });
</script>
<?php include("footer.php");
mysqli_close($sql1) or die(mysqli_error()); ?> 