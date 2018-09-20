<?php
	 session_start(); 
	 if(!isset($_SESSION['uname'])){	header('location:login');}	
	 include("header.php"); 
	 include("left_menu.php");
     include("dbconnect.php");
     // include_once("function_manage.php");
     // include_once("function1.php");
     $uid=$_SESSION['uid'];
// if(strpos($_SERVER['REQUEST_URI'],'page')){
// $str_explode = explode('/',$_SERVER['REQUEST_URI']);
// $count=count($str_explode);                                                
// $page = $str_explode[$count-2];                                               
// }
 // else {
// $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);    
// }         
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

// if(strpos($_SERVER['REQUEST_URI'],'pg')){
// $str_explode = explode('/',$_SERVER['REQUEST_URI']);
  // $count=count($str_explode);                                                
   // $pg = $str_explode[$count-2];                                               
// }
 // else {
// $pg = (int) (!isset($_GET["pg"]) ? 1 : $_GET["pg"]);    
// }        
        
// if(strpos($_SERVER['REQUEST_URI'],'limit1'))
        // {        
            // $str_explode = explode('/',$_SERVER['REQUEST_URI']);
            // $count=count($str_explode);                                                
            // $limit1 = $str_explode[$count-2];                                               
        // }
        // else
        // {
            // $limit1=5;
        // }
    	// $startpoint1 = ($pg * $limit1) - $limit1;
        //to make pagination       
		
        $statement = " `addtemplate` WHERE temptype = 'o' and uid= $uid ORDER BY tempname  ";
        $statement1= "`addtemplate` where temptype= 'c' and uid= $uid ORDER BY tempname";	
?>
<script>
		// jQuery(document).ready(function() {
		// jQuery('#template_table').DataTable({
			// columnDefs: [ {
						// className: 'control',
						// orderable: false,
						// targets:   [3,4]
					// } ],
			// "order": [[ 2, "desc" ]],
			// "pageLength": 25,
			// "searching": false
			// });
			
		// jQuery('#company_template').DataTable({
			// columnDefs: [ {
						// className: 'control',
						// orderable: false,
						// targets:   [4,5]
					// } ],
			// "order": [[ 3, "desc" ]],
			// "pageLength": 25,
			// "searching": false
			// });
		// } );
</script>
	<script type="text/javascript" language="javascript">

    // function load(s)
    // {                 
     // window.location.href=s+"/template_view";          
    // }            
    // function load1(s1)
    // {                       
     // window.location.href=s1+"/template_view";          
    // }
	// function displayclass()
	// {
	// var a= document.referrer;
	// var b= window.location;

	// var pathArray = window.location.pathname.split( '/' );
	// pathArray.reverse();
	// var c = pathArray[0];
	// var d = pathArray[1];
	// var e = pathArray[2];
	// var url =c + d + e +window.location.search ;

// if(typeof(url) != "undefined" && url !== null && url == 'template_viewtclienttempcreated'  ) 
// {		
		 // document.getElementById("client").className = " activeTab";
		 // document.getElementById("tab4").style.display="block";    
		 // document.getElementById("own").className = "";
		 // document.getElementById("tab3").style.display="none"; 
// }
// if(typeof(url) != "undefined" && url !== null && url == 'template_viewtowntempcreated' )
// {
	 	 // document.getElementById("own").className = "activeTab";
		 // document.getElementById("tab3").style.display="block"; 
		 // document.getElementById("client").className = ""; 
         // document.getElementById("tab4").style.display="none"; 	
// }
	
// if(typeof(url) != "undefined" && url !== null && url == 'template_viewdeleteddclient'  ) 
// {		
		 // document.getElementById("client").className = " activeTab";
		 // document.getElementById("tab4").style.display="block";    
		 // document.getElementById("own").className = "";
		 // document.getElementById("tab3").style.display="none"; 
// }	
// if(typeof(url) != "undefined" && url !== null && url == 'template_viewdeleteddown' )
// {
	 	 // document.getElementById("own").className = "activeTab";
		 // document.getElementById("tab3").style.display="block"; 
		 // document.getElementById("client").className = ""; 
         // document.getElementById("tab4").style.display="none"; 	
// }

// if(typeof(url) != "undefined" && url !== null && url == 'template_viewupdatedclienttempupdated'  ) 
// {		
		 // document.getElementById("client").className = " activeTab";
		 // document.getElementById("tab4").style.display="block";    
		 // document.getElementById("own").className = "";
		 // document.getElementById("tab3").style.display="none"; 
// }	
// if(typeof(url) != "undefined" && url !== null && url == 'template_viewupdatedowntempupdated' )
// {
	 	 // document.getElementById("own").className = "activeTab";
		 // document.getElementById("tab3").style.display="block"; 
		 // document.getElementById("client").className = ""; 
         // document.getElementById("tab4").style.display="none"; 	
// }

// if(typeof(url) != "undefined" && url !== null &&  url.indexOf("pg")!= -1 || url.indexOf("limit1")!= -1 )
// {
	 	 // document.getElementById("client").className = "activeTab";
		 // document.getElementById("tab4").style.display="block"; 
		 // document.getElementById("own").className = ""; 
         // document.getElementById("tab3").style.display="none"; 	
// }

// var h = a.replace(/^.*\/|\.[^.]*$/g, '');
// if( h == 'edit_clienttemplate' || h == 'delete_template_client'  )
	// {	
     	 // document.getElementById("client").className = " activeTab";
	   	 // document.getElementById("tab4").style.display="block";	   
	     // document.getElementById("own").className = "";
	     // document.getElementById("tab3").style.display="none"; 
	// }
// if(h == 'edit_owntemplate' || h == 'delete_template_own')
	// {
	 	// document.getElementById("own").className = "activeTab";
	    // document.getElementById("tab3").style.display="block"; 
		// document.getElementById("client").className = ""; 
		// document.getElementById("tab4").style.display="none"; 	
	// }                
// }
// window.onload = displayclass;
	</script>

<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
		<h6><?php echo VIEWTEMPLATE ?></h6>
	</div>	
	<?php	
	if(strpos($_SERVER['REQUEST_URI'],'dclient'))
	{
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?></strong>
				<?php echo TEMPLATEDLTD." !! " ?>
		</p>
	</div>
	<?php
	}
	if(strpos($_SERVER['REQUEST_URI'],'down'))
	{
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?></strong>
				<?php echo TEMPLATEDLTD." !! " ?>
		</p>
	</div>
	<?php
	}
	if(strpos($_SERVER['REQUEST_URI'],'town'))
	{
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?></strong>
				<?php echo TEMPLATECREATED." !! " ?>
		</p>
	</div>
	<?php
	}
	if(strpos($_SERVER['REQUEST_URI'],'tclient'))
	{
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?></strong>
				<?php echo TEMPLATECREATED." !! " ?>
		</p>
	</div>
	<?php
	}
	if(strpos($_SERVER['REQUEST_URI'],'tempupdated'))
	{
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?></strong>
				<?php echo TEMPLATEUPDATED." !! " ?>
		</p>
	</div>
	<?php
	}
	?>
	<?php 
	if($template_view_right == 1){
	?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0">
		<div class="border mt-2">
			<ul class="nav nav-tabs">
				<li class="nav-item" id="own" >
				<a class="nav-link active" data-toggle="tab" href="#tab3"><?php echo VIEWOWNCOMP ?></a>
				</li>
				<li class="nav-item" id="client" >
				<a class="nav-link" data-toggle="tab" href="#tab4"><?php echo VIEWCLIENTCOMP ?></a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="tab3" class="container tab-pane active mt-5">
					<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">            
						<div class="border pl-1 pt-2 mb-3">
							<h6><i class="fa fa-bars" aria-hidden="true"></i> <?php echo TEMPLATELIST ?></h6>
						</div>
					
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                        <table width="100%" class="table table-striped table-bordered table-hover dataTables-example" id="dataTables-example">
							<thead class="text-center">
								<tr>
									<td><?php echo TEMPLATENAME ?></td>
									<td><?php echo AUDITORCOMPNAME ?></td>
									<td><?php echo Date ?></td>
									<td><?php echo OPTIONS?></td>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
								// $sql_query= "select * from {$statement}  LIMIT {$startpoint} , {$limit}";
								$sql_query= "select * from {$statement}";
								$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
								$num=  mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result))
								{
								$temp_type=$row['temptype'];
								?>
								<tr class="odd gradeX">
									<td align="center"><?php echo $row['tempname']; ?></td>
									<td align="center"><?php echo $row['auditorcname']; ?></td>
									<td align="center"><?php echo date("Y-m-d",strtotime($row['temptimestamp'])); ?></td>
									<td align="center">
									<a href=<?php if($temp_type == 'o') 
									{echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['tempid']."/update_owntemplate";}
									else{echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['tempid']."/update_clienttemplate";}?> data-toggle="tooltip" title=" Edit "><img class='mr10 p-2' alt='' src='images/icons/dark/pencil.png' /></a>
									<a onclick="return confirm('<?php echo POPUPDLT ?>');"  href=<?php if($temp_type == 'o') { echo 'delete_template_own.php?sid='.$row['tempid'];}
									else{echo 'delete_template_client.php?sid='.$row['tempid'];}?> data-toggle="tooltip" title=" Delete "><img class='mr10 p-2' alt='' src='images/uploader/deleteFile.png' /></a>
									</td>
								</tr>

								<?php
								}
								?>
							</tbody>
						</table>
						</div>  
					</div>  
				</div>
				<div id="tab4" class="container tab-pane fade mt-5" >
				    <div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
						<div class="border pl-1 pt-2 mb-3">
							<h6><i class="fa fa-bars" aria-hidden="true"></i> <?php echo TEMPLATELIST ?></h6>
						</div>
						    <div class="col-12 col-sm-12 col-md-12 col-xl-12 col-lg-12 px-0">
							<table class="table table-striped table-bordered table-hover dataTables-example" id="dataTables-example1" width="100%">
								<thead class="text-center">
									<tr>
										<td><?php echo TEMPLATENAME?></td>
										<td><?php echo AUDITORCOMPNAME ?></td>
										<td><?php echo CLIENTCOMPNAME ?></td>
										<td><?php echo DATE ?></td>
										<td><?php echo OPTIONS ?></td>
									</tr>
								</thead>
								<tbody>
								<?php
								// $sql_query= "select * from {$statement1}  LIMIT {$startpoint1} , {$limit1} ";
								$sql_query= "select * from {$statement1}";
								$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
								$num=  mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result))
								{
								$ttype=$row['temptype'];
								?>

									<tr class="odd gradeX">
										<td align="center"><?php echo $row['tempname']; ?></td>
										<td align="center"><?php echo $row['auditorcname']; ?></td>
										<td align="center"><?php echo $row['clientcname']; ?></td>
										<td align="center"><?php echo date("Y-m-d",strtotime($row['temptimestamp'])); ?></td>
										<td align="center">
									    <a href=<?php if($ttype == 'o') 
										{echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['tempid']."/update_owntemplate";}
										 else{echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['tempid']."/update_clienttemplate";}?> data-toggle="tooltip" title=" Edit "><img class='mr10 p-2' alt='' src='images/icons/dark/pencil.png' /></a>
										 
										 <a onclick="return confirm('<?php echo POPUPDLT ?>');" href=<?php if($ttype == 'o') { echo 'delete_template_own.php?sid='.$row['tempid'];}
										else{echo 'delete_template_client.php?sid='.$row['tempid'];}?> data-toggle="tooltip" title=" Delete "><img class='mr10 p-2' alt='' src='images/uploader/deleteFile.png' /></a>
										
										</td>
									</tr>
								<?php
								}
								?>
								</tbody>
							</table>
						    </div>
					</div>

				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
		<?php } else { ?>
		<style>
		#footer {
			position:fixed;
			bottom:0;
		}
		</style>
		<h5>
		<br><br>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">
				You Are Not Authorized To Access This Page...!
			</div>
		</h5>
	<?php } ?>
	<div class="clearfix"></div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('.dataTables-example').DataTable({
            responsive: true,
			sDom: 'lfrtip',
        });
    });
</script>
<?php include("footer.php"); ?>