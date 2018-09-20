<?php session_start();
if(!isset($_SESSION["uname"])){header("location:login");}
	 if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
					 {
					  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
					 }
				
include_once("header.php");
include_once("left_menu.php");
include("dbconnect.php"); 
             
$uid=$_SESSION['uid'];     
$suid=$_SESSION['said'];                

   if($suid==$uid){
	 
         $query="select * from tbl_settings where `key`='chart_default' and `superadminid` ='$suid' AND `uid` =$suid  ";
        }
        else {     
             $query="select * from tbl_settings where `key`='chart_default' and `superadminid` ='$suid'
                    and uid=$uid ";
        }
$result=mysqli_query($sql,$query) or die(mysqli_error($sql));

$num = mysqli_num_rows($result);
while($row=mysqli_fetch_array($result)){
                            $val=$row["value"];
                            $split=explode(",",$val);        
                            $s1=$split[0];
                            $s2=$split[1];
                            $s3=$split[2];
                        }        
         if($suid==$uid){
                            $query="select * from tbl_settings where `key`='default_language' and `superadminid` ='$suid' AND `uid` =$suid";
                        }
                        else{
                            $query="SELECT * FROM tbl_settings WHERE `key` = 'default_language'AND `superadminid` = '$suid' AND `uid` =$uid";
                        }
    $result=mysqli_query($sql,$query);

    while($row=mysqli_fetch_array($result)){
    $val1=$row["value"];
	
    }   

  if($suid==$uid){
                            $query="select * from tbl_settings where `key`='default_language_question' and `superadminid` ='$suid' ";
                        }
                        else{
                            $query="SELECT * FROM tbl_settings WHERE `key` = 'default_language_question' AND `superadminid` = '$suid' AND `uid` =$uid";
                        }
                        
    $result=mysqli_query($sql,$query);
	
    while($row=mysqli_fetch_array($result)){
     $keyval1=$row["value"];
    }           				                    
?>   
<script type="text/javascript" language="javascript">
function valid()
{
	if( document.frmsetting.drptemp1.value == 0 || document.frmsetting.drpdept1.value == 0 
	||  document.frmsetting.importcsv.value == '')
	{
		return false;
	}
}
function show(s){
     var theContents = document.getElementById('dd')[document.getElementById('dd').selectedIndex].innerHTML;
                               // alert(theContents);
                                
            var span=document.getElementById('dname').innerHTML=theContents;
		//alert(span);	
}
function showdepartment(str)
{		//
	if (str=="")
 		 {
		 	document.getElementById("deptdiv").innerHTML="";
 			return;
 		 }
	if (window.XMLHttpRequest)
  			{// code for IE7+, Firefox, Chrome, Opera, Safari
  				xmlhttp=new XMLHttpRequest();
  			}
	else
  		{// code for IE6, IE5
 			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		}
	xmlhttp.onreadystatechange=function()
  		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	  {
				str = xmlhttp.responseText;
				if(document.frmsetting.tempdeptname){
					document.getElementById('hidetext').style.display='none';
					}
				
					document.getElementById('deptdiv').innerHTML=str;
			
                        
    	  }
 	   }
	 
		xmlhttp.open("GET","getdepartment.php?c="+str,true);
		xmlhttp.send();
}
</script>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">                   
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6> <?php echo SETTINGS ?></h6>
		</div>
	<?php
	if(strpos($_SERVER['REQUEST_URI'],'chart_save'))
	   {
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?> </strong>
			<?php echo CHARTSAVED." !! " ?>
		</p>
	</div>
	<?php
	   }
	if(strpos($_SERVER['REQUEST_URI'],'chart_update'))
	   {
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?> </strong> <?php echo CHARTUPDATED." !! " ?>
		</p>
		</div>
	<?php
		}
	if(strpos($_SERVER['REQUEST_URI'],'lang_save'))
		{
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?> </strong><?php echo LANSAVED." !! " ?>
		</p>
		</div>
	<?php
		  }    
	if(strpos($_SERVER['REQUEST_URI'],'lang_update'))
		  {
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?> </strong><?php echo LANUPDATED." !! " ?>
		</p>
	</div>
	<?php
		  }
	if(strpos($_SERVER['REQUEST_URI'],'lang_question_update'))
	 {
	?>	
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
		<p>
			<strong><?php echo SUCCESS.":" ?> </strong> <?php echo LANQUPDATED." !! " ?>
		</p>
		</div>
	<?php
	 }
	?>
	<?php
	if(strpos($_SERVER['REQUEST_URI'],'imported'))
	  {
	?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
	<p>
		<strong><?php echo SUCCESS.":" ?> </strong> <?php echo AUDITSIMPORTED." !! " ?>
	</p>
	</div>
	<?php
	   }
	if(strpos($_SERVER['REQUEST_URI'],'errmsg'))
		{
	?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nFailure hideit">
	<p>
		<strong><?php echo FAILURE.":" ?></strong> <?php echo PLIMPORTFILEWITHCSVEXT." !! " ?>													
	</p>		
	</div>  
	<?php	
	}
	if(strpos($_SERVER['REQUEST_URI'],'notexist'))
	 {
	?>
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nFailure hideit">
	<p>
	<strong><?php echo FAILURE.":" ?></strong> <?php echo NOBACKUPTODOWNLOAD."!!" ?>
	</p>		
	</div>  
	<?php	
	}
	?>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
		 <div class="border pl-1 pt-2">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo DASHBOARDCHARTSET ?></h6>
		 </div>
	</div>
	<div class="container mt-3">  
		<form  method="post" action="insert.php" enctype="multipart/form-data" class="mainForm" id="valid" name="frmsetting">
			<?php
			$sql_query="select * from addtemplate where `superadminid` ='$suid'";
			$res=mysqli_query($sql,$sql_query);           
			?>
		<div class="form-group row">
			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left mb-2">
				<select name="drptemp" id="dt"  onChange="return showdepartment(this.value);" class="form-control form-control-sm imgopocity" >
					<option value="0" style="color:#494949;"><?php echo SELECTTEMPLATE ?></option>
					<?php
					while($row=mysqli_fetch_array($res))
					{
					?>
					<option <?php if(isset($s1) && $row[0]==$s1){echo 'selected="selected"';} ?> value=<?php echo $row[0]?> style="color:#494949;">
					<?php echo $row["tempname"] ?></option>
					<?php
					}
					?>
				</select>
			</div>
			<div id="deptdiv" class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left pl-3 pl-sm-0 my-2 my-sm-0"></div>
			<?php
			$query="select * from tbl_settings where `key`='chart_default'  and `uid` = $uid ";
			$result=mysqli_query($sql,$query) or die(mysqli_error($sql));

			$num = mysqli_num_rows($result);
			while($row=mysqli_fetch_array($result)){
										$val=$row["value"];
										$split=explode(",",$val);        
										$splitdeptid=$split[1];			
			}    
			if(isset( $splitdeptid) && $splitdeptid != '')
			{		
			$sql_query="select * from adddepartment where  deptid =". $splitdeptid;
			$res=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));   
			$number = mysqli_num_rows($res); 
			$dname = '';
			while($row=mysqli_fetch_array($res))
			{   
			$dname = $row['deptname'];
			}
			?>
		</div>
		<div class="form-group row">
			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left">
				<input type="text" name="tempdeptname" value=" <?php if(isset($s2) && $s2 != ''){echo $dname;} ?> " readonly="readonly"
				style="color:#494949;width: 190px;float: left; padding: 6px;background: url('../images/chosenSelect.png') repeat-x scroll 0 0 transparent;" id="hidetext">
			</div>
			<?php
			}
			  
			?> 
			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left mt-sm-0 mt-2">
				<select name="drpyear" id="dy" class="form-control form-control-sm imgopocity">              
					<option <?php if(isset($s3) && $s3==6){echo 'selected="selected"';} ?> style="color:#494949;"  value="6"><?php echo LASTMREC ?></option>
					<option <?php if(isset($s3) && $s3==12){echo 'selected="selected"';} ?> style="color:#494949;"  value="12"><?php echo LASTYREC ?></option>              
				</select>
			</div>
			<div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left mt-sm-0 mt-2">
				<input class="btn btn-success btn-sm" type="submit" name="cmd_go" value="<?php echo SET_B ?>"/>
			</div>
		</div>
		</form>
	</div>
<?php
  $sql=mysqli_connect("localhost","root","","5s_web") or die('Could not connect: ' . mysqli_error($sql));
           
  $sql_query="select * from tbl_language";
  $res=mysqli_query($sql,$sql_query);   
?>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
		<div class="border pl-1 pt-2">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo LANSET ?></h5>
		</div>
	</div>
	<div class="container mt-3">  
		<form  method="post" action="insert.php" enctype="multipart/form-data" class="mainForm" id="valid" name="frmsetting">
			<div class="form-group row noborder">
				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left">
					<select name="drplang" style="opacity: 0;" id="dl" class="form-control form-control-sm imgopocity" >
					<option <?php if(isset($val1) && $row['lid']==$val1){echo 'selected="selected"';} ?>  value="0" style="color:#494949;"><?php echo SELECTLAN ?></option>
					<?php
					while($row=mysqli_fetch_array($res))
					{
						
					?>
					<option <?php if(isset($val1)&& $row['lid']==$val1){echo 'selected="selected"';} ?> value=<?php echo $row['lid'] ?> style="color:#494949;">
					<?php echo $row["title"] ?></option>
					<?php
					}
					mysqli_close($sql) or die(mysqli_error());
					?>
					</select>  
				</div>
				<div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left mt-sm-0 mt-2">
					<input class="btn btn-success btn-sm" type="submit" name="cmd_set" value="<?php echo SET_B ?>"/> 
				</div>
			</div>
		</form>	
	</div>
	<?php
	$sql1=mysqli_connect("localhost","root","","5s_web") or die('Could not connect: ');
		   
	$sql_query="select * from tbl_language";
	$res=mysqli_query($sql1,$sql_query);   
	?>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
		<div class="border pl-1 pt-2">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?PHP echo LANQSET ?></h5>
		</div>
	</div>	  
	<div class="container mt-3">  
		<form  method="post" action="insert.php" enctype="multipart/form-data" class="mainForm" id="valid" name="frmsetting">
			<div class="form-group row noborder">
				<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left">
					<select name="drplang1" style="opacity: 0;" id="d2" class="form-control form-control-sm imgopocity">
						<option <?php if(isset($keyval1) && $row['lid']==$keyval1){echo 'selected="selected"';} ?>  value="0" style="color:#494949;"><?php echo SELECTLAN ?></option>
						<?php
						while($row=mysqli_fetch_array($res))
						{
							// var_dump($keyval1);
							// var_dump($row['lid']);exit;
							
						?>
						<option <?php if(isset($keyval1)&& $row['lid']==$keyval1){echo 'selected="selected"';} ?> value=<?php echo $row['lid'] ?> style="color:#494949;">
						<?php echo $row["title"] ?></option>
						<?php
						}
						mysqli_close($sql1) or die(mysqli_error($sql1));
						?>
					</select>
				</div>
				<div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left mt-sm-0 mt-2">
					<input class="btn btn-success btn-sm" type="submit" name="cmdsetlangquestion" value="<?php echo SET_B ?>"/>
				</div>
			</div>
		</form>
	</div>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
		<div class="border pl-1 pt-2">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo IMPORTAUDIT ?></h6>
		</div>
	</div>	  
	<div class="container mt-3">  
		<form  method="post" action="insert.php" enctype="multipart/form-data" class="mainForm" id="valid" name="frmsetting">
			<div class="form-group row noborder"> 
			<?php
				include("dbconnect.php");  
				$sql_query="select * from addtemplate where `superadminid` ='$suid'";
				$res=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));           
			?>
				<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">
					<select name="drptemp1" style="opacity: 0;"  id="selectReq1"  class="validate[required] form-control form-control-sm imgopocity">
						<option value="0"><?php echo SELECTTEMPLATE ?></option>
						<?php
						while($row=mysqli_fetch_array($res))
						{
						$tid=$row['tempid'];
						$templatename=$row['tempname'];
						?>
						<option value=<?php echo $tid;?> style="color:#494949;"><?php echo $templatename; ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<?php
					$sql_query="select * from adddepartment where `superadminid` ='$suid'";
					$res=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));           
				?> 
			    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left mt-sm-0 mt-2">
					<select name="drpdept1" style="opacity: 0;" id="selectReq2"  class="validate[required] form-control form-control-sm imgopocity">
						<option value="0"><?php echo SELECTDEPT ?></option>
						<?php
						while($row=mysqli_fetch_array($res))
						{    
						$id=$row['deptid'];
						$departmentname=$row['deptname'];
						?>
						<option value=<?php echo $id; ?> style="color:#494949;">
						<?php echo $departmentname;?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left mt-sm-0 mt-2">
					<input type="file" class="form-control-file border imgopocity form-control-sm" name="importcsv" />
				</div>
				<div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left mt-sm-0 mt-2">
					<input  class="btn btn-success btn-sm" type="submit" name="cmdimport" value="<?php echo IMPORT ?>" onClick="return valid()"  /> 
				</div>  
			</div>  
		</form>
	</div>
	<?php
	$sql1=mysqli_connect("localhost","root","","5s_web");	

	$squerypid = "select * from tbl_plan  where uid = $uid and active_status = '1' ";
	$recordset = mysqli_query($sql1,$squerypid) or die(mysqli_error($sql1));
	while($row = mysqli_fetch_array($recordset))
	 {
		$plan_id = $row['plan_id'];
		$sqlplan = "select plan_name from plan_options where plan_id = $plan_id";
		$rs= mysqli_query($sql1,$sqlplan) or die(mysqli_error($sql1));
		$row = mysqli_fetch_assoc($rs);
		$planname = $row['plan_name'];
	 }
	mysqli_close($sql1) or die(mysqli_error($sql1));
	if($planname == 'Medium' || $planname == 'large' || $planname == 'custome')
	  {
	?>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
		 <div class="border pl-1 pt-2">
				<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo DOWNLOADBACKUP ?></h5>
		 </div>
	</div>
	<?php            
	  }
	if($planname == 'Medium')
	 {
		?>
    <div class="container mt-3">  
		<form  method="post" action="insert.php" enctype="multipart/form-data" class="mainForm" id="valid" name="frmsetting">
			<div class="form-group row noborder"> 
				<select name="drpmonth" style="opacity: 0;" >
				 <option value=""><?php echo SELECTMONTH ?></option>
				<?php       
				$monthName = array("January", "February", "March", "April", "May", "June", "July", "August", "September",              

											  "October", "November", "December");

														   

						 for ($i=0; $i < count($monthName); $i++)
								  {
										 $mn = 1 + $i;
										 if($mn <= date("m"))
										 {
											$setname =  $monthName[$i] ." ".date("Y");
										 }
										 else
										 {
											$setname =  $monthName[$i]." ".date("Y",strtotime("-1 year"));
										 }
										 echo "<option value=" . $mn . ">" .  $setname . "</option> \n";
								  }
				
				?>
				 </select>
			</div>
			<input  class="greenBtn" type="submit" name="cmddownloadbackupmedium" value="<?php echo GO_B ?>" style="margin-left:10px;" />  
			<?php
			 }
			 if($planname == 'large' || $planname == 'custome')
			 {
			?>	 
			<div  class="form-group row">
					<label><?php echo DATE.":" ?></label>
					<input  class="datepicker3" type="text" size="10" name="txtdate" style="color:#494949;width:10%;"value="<?php echo date("d-m-Y"); ?>" >
					 <input  class="greenBtn" type="submit" name="cmddownloadbackuplarge" value="<?php echo GO_B ?>" style="margin-left: 10px; " />  
			</div>
       
			<?php
			}
			?>                
		</form>        
	</div>
	<div class="fix"></div>
</div>
<?php include_once("footer.php");?>