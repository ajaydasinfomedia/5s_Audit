<?php
session_start(); 


if(isset($_SESSION['role']) &&  $_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
{
	header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
}
if(!isset($_SESSION["uname"]) or @$_SESSION["expired"]=='yes')
{
	session_destroy();
   	header("location:http://5s.niftysol.com/login");
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
<style>
.checker{ float:none !important; }
</style>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
<?php
if(strpos($_SERVER['REQUEST_URI'],'success'))
{
?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit"><p><strong><?php echo SUCCESS.":" ?></strong><?php echo TYFORRENEW." !! " ?></p></div>
<?php
}
if(strpos($_SERVER['REQUEST_URI'],'updatedprofile'))	
{
?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit"><p><strong><?php echo SUCCESS.":" ?></strong><?php echo ADMININFOUPDATED." !! " ?></p></div>
<?php
}

?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
		<h6> <?php echo ACCESSRIGHTS ?></h6>
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
		if($accessright_right == 1){
		?>	
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
    	<div class="border pl-1 pt-2">
			<h6><i class="fa fa-bars" aria-hidden="true"></i> <?php echo ACCESSRIGHTS ?></h6>
		</div>
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
			<table  class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
				<thead class="text-center">
					<tr>
						<td style="width: 33%;">
							<?php echo MENUNAME ?>
						</td>
						<td style="width: 33%;">
							<?php echo AUDITORRIGHT ?>
						</td>
					</tr>
				</thead>
					<?php
					include("dbconnect.php");
					$sql_query="SELECT * FROM `access_rights`";
					$result=mysqli_query($sql,$sql_query);
					while($row=mysqli_fetch_array($result))
					{
					?>
				<tbody>
					<tr>
						<td align="center"><?php echo $row['module_name']; ?></td>
						
						<td align="center">
							<input type="checkbox" name="rights_check" class="auditor" <?php if($row['auditor'] == 1){ echo "checked"; } ?> check_url="<?php echo "update_rights.php"; ?>" auditor_id="<?php echo $row['id']; ?>">
						</td>
					</tr>
				</tbody>
					<?php
					}
					?>
			</table>
		</div>
	</div>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
		<p id="select" style="padding:10px 25px 10px 54px; font-size: 11px; cursor: auto;" ></p>
	</div>
	<div id="chart_div" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="width: 700px; height: 550px;"></div>
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
<?php include("footer.php"); ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
$(document).ready(function(){
	 $('input.admin[type="checkbox"]').click(function(){
		 if($(this).prop("checked") == true)
		 {
			var admin_id = $(this).attr('admin_id');
			var value = 1;
			var admin = "admin";
			var url = $(this).attr('check_url');
			
			$.ajax({
				type: 'GET',
				url: url,
				data : {admin_id:admin_id,value:value,admin:admin},
				success: function (response)
					 {	},
				});
		 }
		 else if($(this).prop("checked") == false)
		 {
			 var admin_id = $(this).attr('admin_id');
			 var value = 0;
			 var admin = "admin";
			 var url = $(this).attr('check_url');
			 
			 $.ajax({
				type: 'GET',
				url: url,
				data : {admin_id:admin_id,value:value,admin:admin},
				success: function (response)
					 {  },
				});
		 }
	});
});
</script>

<script>
$(document).ready(function(){
	 $('input.auditor[type="checkbox"]').click(function(){
		 if($(this).prop("checked") == true)
		 {
			var auditor_id = $(this).attr('auditor_id');
			var value = 1;
			var auditor = "auditor";
			var url = $(this).attr('check_url');
			
			$.ajax({
				type: 'GET',
				url: url,
				data : {auditor_id:auditor_id,value:value,auditor:auditor},
				success: function (response)
					 { 	},
				});
		 }
		 else if($(this).prop("checked") == false)
		 {
			 var auditor_id = $(this).attr('auditor_id');
			 var value = 0;
			 var auditor = "auditor";
			 var url = $(this).attr('check_url');
			 
			 $.ajax({
				type: 'GET',
				url: url,
				data : {auditor_id:auditor_id,value:value,auditor:auditor},
				success: function (response)
					 {  },
				});
		 }
	});
});
</script>

