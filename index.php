<?php 
session_start();
	
if(isset($_SESSION['role']) &&  $_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
{
	header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
}

if(!isset($_SESSION["uname"]) or @$_SESSION["expired"]=='yes' )
{	
	
	session_destroy();
   	header("location:http://".$_SERVER['HTTP_HOST']."/5s/login");
}

include("dbconnect.php");
include("header.php");
include("left_menu.php");
include("dbconnect.php");
if(isset($_SESSION['uid']) && isset($_SESSION['said']))
{
	if($_SESSION['said'] == $_SESSION['uid'])
	{
		$string = "`superadminid` = ".$_SESSION['said']."";
	}
	else
	{
		$string = "`uid` = ".$_SESSION['uid']."";
	}
}
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);
function drawChart()
{
	var xmlhttp;
	if(window.XMLHttpRequest)
  	{
  		xmlhttp=new XMLHttpRequest();
  	}
	else
	{
 		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 	}
	xmlhttp.onreadystatechange=function()
  	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
       	{
			var data1=xmlhttp.responseText;
			
			newfunc(data1);
			
        }
	}
	
	xmlhttp.open("GET","other_static_data.php",true);
	xmlhttp.send();
}
function newfunc(str)
{    
	splitvar=str.split(",");
  	var c=0;
	
	if(str != 1 && str != 2)
    { 
		var myCars=new Array();
		for(i=0; i<splitvar.length; i++)
        {
			splitvar1=splitvar[i].split("_");
            sp=splitvar1[0];
            sp1=splitvar1[1];
            sp2=parseInt(sp1);
          	myCars.push(new Array(sp,(sp2)));
        }
        var data= google.visualization.arrayToDataTable(myCars);
        var options = 
		{
        	title: 'Company Performance/Score',
          	hAxis: {title: 'Month', minValue: 0, maxValue: 100, titleTextStyle: {color: 'green',fontName:'Arial',fontSize:'18'},
					textStyle:{color: 'green', fontName: 'Arial', fontSize: '12'}},
          	vAxis:{title:'Score', minValue: 0, maxValue: 100,titleTextStyle: {color: 'green',fontName:'Arial',fontSize:'18'},
					textStyle:{color: 'green', fontName: 'Arial', fontSize: '12'}},
          	chartArea:{left:50,width:"100%",height:"70%"},
          	colors:['green']
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
        var elm=document.getElementById("select");
        elm.innerHTML='';elm.className='';
    }
    else if(str == 2)
    {
		
		str="<?php echo "<strong>".FAILURE.":"."</strong>"." ".DATANOTFOUND ?>";
        var elm=document.getElementById("select");
		
        var chart = document.getElementById('chart_div');
        chart.innerHTML='';
        elm.className = "nNote nFailure hideit";
        elm.innerHTML=str;chart.style.height=0;chart.style.width=0;
	}
   	else
    {
    	str="<?php echo "<strong>".INFORMATION.":"."</strong>"." ".SELECTTEMPDEPTTODISPCHART ?>";
        var elm=document.getElementById("select");
        elm.className = "nNote nInformation hideit";
        elm.innerHTML=str;
        var chart = document.getElementById('chart_div');
        chart.style.height=0;chart.style.width=0;chart.innerHTML='';chart.className='';
	}
    window.onload=drawChart;
}
</script> 
	<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
	<?php
	if(strpos($_SERVER['REQUEST_URI'],'success'))
	{
	?>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-0 nNote nSuccess hideit"><p><strong><?php echo SUCCESS.":" ?></strong><?php echo TYFORRENEW." !! " ?></p></div>
	<?php
	}
	if(strpos($_SERVER['REQUEST_URI'],'updatedprofile'))	
	{
	?>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-0 nNote nSuccess hideit"><p><strong><?php echo SUCCESS.":" ?></strong><?php echo ADMININFOUPDATED." !! " ?></p></div>
	<?php
	}
	?>

		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
			<h6><?php echo DASHBOARD ?></h6>
		</div>

		<div class="row mt-4">
			<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 float-left">
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 border text-danger text-center text-white float-left h4 p-2 mt-2">
					<span class="">
					<a class="" title="">
						<?php
						$query="SELECT * FROM `tbl_project` WHERE ".$string." and `status`=1 ";
						$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
						$tot_audit=mysqli_num_rows($result);
						echo $tot_audit;
						?>
					</a>
					</span>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-left">
					<span class="" style="color:#494949;"><?php echo TOTNOAUDIT?></span>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 float-left">
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6  bg-primary text-center text-white float-left h4 p-2 mt-2">
					<span class="">
					<a class="" title="">
						<?php
						$query="SELECT * FROM `tbl_project` WHERE ".$string." and `status`=1 and `status_progress`=1 ";
						$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
						$tot_ip=mysqli_num_rows($result);
						echo $tot_ip;  
						?>
					</a>
					</span>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-left">
					<span class="" style="color:#494949;"><?php echo NOOFINPROG ?></span>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 float-left">
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6  bg-success text-center text-white float-left h4 p-2 mt-2">
					<span class="">
					<a class="" title="">
						<?php
						$query="SELECT * FROM `tbl_project` WHERE ".$string." and `status`=1 and `status_progress`=0 ";
						$result=mysqli_query($sql,$query) or die(mysqli_error($sql));
						$tot_comp=mysqli_num_rows($result);
						echo $tot_comp;
						?>
					</a>
					</span>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-left">
					<span class="" style="color:#494949;"><?php echo NOOFCOMPLTED ?></span>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-3 float-left">
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6  bg-danger text-center text-white float-left h4 p-2 mt-2">
					<span class="">
					<a class="" title="">
						<?php
						$sql_active_auditor=mysqli_connect("localhost","root","","5s_web");
				if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

						$query1="select l.*,r.status  from tbl_login as l,tbl_login_relation as r where l.role='auditor' and l.superadminid = ".$_SESSION['said']." 
								and l.uid=r.uid and r.status = 1";
						$result=mysqli_query($sql_active_auditor,$query1) or die(mysqli_error($sql_active_auditor));
						$num0fuser=mysqli_num_rows($result);
						echo $num0fuser;
						mysqli_close($sql_active_auditor) or die(mysqli_error($sql_active_auditor));  
						?>
					</a>
					</span>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-left">
					<span class="" style="color:#494949;"><?php echo NOOFACTAUDITOR ?></span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	
	<?php 
	if($active_user_right == 1){
	?>
		
			<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
				<div class="border pl-1 pt-2 mb-2">
					<h6><i class="fa fa-bars" aria-hidden="true"></i> <?php echo LATESTAUDITLIST ?></h6>
				</div>
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
						<thead class="text-center">
							<tr>
								<td><?php echo TEMPLATENAME ?></td>
								<td><?php echo DEPTNAME ?></td>
								<td><?php echo STATUS ?></td>
								<td><?php echo DATE ?></td>
								<td><?php echo OPTIONS ?></td>
								<!--<td><?php echo VIEWPDF?></td>
								<td><?php echo ARCHIVE ?></td> -->
							</tr>
						</thead>
							
						<tbody>
						<?php
							include("dbconnect.php");
							$sql_query="SELECT * FROM `tbl_project` WHERE ".$string." and STATUS =1 ORDER BY pdate DESC LIMIT 10 ";
							$result=mysqli_query($sql,$sql_query);
							while($row=mysqli_fetch_array($result))
							{
								$status_progress = $row['status_progress'];
								if($status_progress == 1)
									{ $sp = 'In Progress'; }
								else
									{ $sp = 'Completed'; }
							?>
							<tr class="odd gradeX">
								<td align="center"><?php echo $row['tempname']; ?></td>
								<td align="center"><?php echo $row['deptname']; ?></td>
								<td align="center"><?php echo $sp; ?></td>
								<td align="center"><?php echo $row['pdate']; ?></td>
								<td align="center">
									<a href=<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['pid']."/edit_audit";?> data-toggle="tooltip" title=" Edit " >
										<img class='mr10 p-2' alt='' src='images/icons/dark/pencil.png' />
									</a>
							
									<a href=<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['pid']."/pdf";?> data-toggle="tooltip" title=" PDF ">
										<img class='mr10 p-2' alt='' src='images/icons/color/blue-document-pdf-text.png' />
									</a>
								
								<?php if($status_progress == 0) { ?>
								
									<a onclick="return confirm('<?php echo POPUPMOVE ?>');" href=<?php echo 'movehistory.php?project_id='.$row['pid'];?> data-toggle="tooltip" title=" ARCHIVE "> 
										<img class='mr10 p-2' alt='' src='images/icons/dark/archive.png' />
									</a>
								
								<?php } 
								else { ?>
								 <?php } ?>
								</td>
							</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
				
			</div>
		
		
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border px-0 mt-4">
			<div class="border pl-1 pt-2 mb-2">
				<h6><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo SCHEDULE ?></h6>
			</div>
			<div id="calendar"></div>
		</div>
		
	<?php } else { ?>
		<style>
			#footer {
				position:fixed;
				bottom:0;
			}
		</style>
		<br><br>
		<h5>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">
			You Are Not Authorized To Access This Page...!
			</div>
		</h5>
		<?php } ?>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 mt-3">
		<p id="select" style="padding:10px 25px 10px 54px; font-size: 11px; cursor: auto;" ></p>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="chart_div" style="width: 700px; height: 550px;"></div>
	</div>
	<div class="clearfix"></div>
</div>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			paging: false,
			lengthChange: false,
			ordering: false,
			searching: false,
			info: false,
			autoWidth: true,
			sDom: 'lfrtip'
        });
    });
</script>
<?php include("footer.php"); ?>