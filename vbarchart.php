<?php session_start();
if(!isset($_SESSION["uname"])){header("location:login");}
if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
					 {
					  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
					 }
include_once("header.php");
include_once("left_menu.php");
include_once("dbconnect.php");               
$suid=$_SESSION['said'];
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">     
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {          
          var xmlhttp;            
		if (window.XMLHttpRequest)
  			{
  				xmlhttp=new XMLHttpRequest();
  			}
		else
  		{
 			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		}
		xmlhttp.onreadystatechange=function()
  		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {					
						var data1=xmlhttp.responseText;   
                                                //alert(data1);                                               
                        newfunc(data1);                                
                     }                                        
        }               
                    var dt = document.getElementById("dt");                    
                    var Value =dt.options[dt.selectedIndex].value;                     
                                                     
                    var dy = document.getElementById("dy");                    
                    var Value2 =dy.options[dy.selectedIndex].value;         					                     
		
                if(document.getElementById("deptdiv").innerHTML != ""){                                         
                    
                    var dd = document.getElementById("dd");                    
                    var Value1 =dd.options[dd.selectedIndex].value; 
                    
                    xmlhttp.open("GET","static_data.php?one="+Value+"&two="+Value1+"&three="+Value2,true);                
                    xmlhttp.send();
                }
                else{
                    xmlhttp.open("GET","static_data.php?one="+Value+"&three="+Value2,true);                
                    xmlhttp.send();
            }
		      
      }    
function newfunc(str){  
//alert(str);                        
        splitvar=str.split(",");  
		
	//alert(splitvar);                   
    if(str != 1 && str != 2)
    {
        var myCars=new Array();
        for(i=0; i<splitvar.length; i++)
        {                    
            splitvar1=splitvar[i].split("_");                                              
            sp=splitvar1[0];                   
            sp1=splitvar1[1];   
			if(i != 0){	
            sp2=parseInt(sp1);
			}
			else
			{
				sp2=sp1;
			}
			//alert(sp1+" hiii "+sp+" "+sp2);	
           myCars.push(new Array(sp,(sp2))); 
			//alert(myCars);  
        }            
		//alert(myCars);                      
       var data= google.visualization.arrayToDataTable(myCars);
	   //alert('hi');
        var options = {
          title: 'Company Performance/Score',
          hAxis: {title: 'Month', minValue: 0, maxValue: 100, titleTextStyle: {color: 'green',fontName:'Arial',fontSize:'18'},textStyle:{color: 'green', fontName: 'Arial', fontSize: '12'}},
          vAxis:{title:'Score', minValue: 0, maxValue: 100,titleTextStyle: {color: 'green',fontName:'Arial',fontSize:'18'},textStyle:{color: 'green', fontName: 'Arial', fontSize: '12'}},
          chartArea:{left:50,width:"100%",height:"70%"},         	
          colors:['green']
        };       
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));        
        chart.draw(data, options);  
        var elm=document.getElementById("select");
        elm.innerHTML='';
        elm.className='';   
        
         var pos = document.getElementById("chart_div");                    
                             pos.style.position = "relative";
        
    }   
    else if(str == 2)
          {       
            str="<?php echo "<strong>".FAILURE.":"."</strong>"." ".DATANOTFOUND?>";                                                           

            var elm=document.getElementById("select");                                                                                                 
            var chart = document.getElementById('chart_div');
            chart.innerHTML='';
             
            elm.className = "nNote nFailure hideit";        
            elm.innerHTML=str;     

             var pos = document.getElementById("chart_div");                    
                             pos.style.position = "fixed";
          }                      
    else
          {
            str="<?php echo "<strong>".INFORMATION.":"."</strong>"." ".SELTEMPDEPTTODISPCHARTT ?>";                        

            var elm=document.getElementById("select");
            elm.className = "nNote nInformation hideit";             
            elm.innerHTML=str;     
            
             var chart = document.getElementById('chart_div');             
             chart.innerHTML='';
             chart.className='';
             
              var pos = document.getElementById("chart_div");                    
                             pos.style.position = "fixed";                        
          }                   
          window.onload=drawChart;
}            
function valid()
{
	if( document.frmcreatecsv.drptemplate.value == 0 || document.frmcreatecsv.drpdeptment.value == 0)
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
	{		
		if (str=="")
 		 {
		 	document.getElementById("deptdiv").innerHTML="";
 			return;
 		 }
		if (window.XMLHttpRequest)
  			{
  				xmlhttp=new XMLHttpRequest();
  			}
		else
  		{
 			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		}
		xmlhttp.onreadystatechange=function()
  		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	  {
				str = xmlhttp.responseText;
				document.getElementById('deptdiv').innerHTML=str;
    	  }
 	   }
		xmlhttp.open("GET","getdepartment.php?c="+str,true);
		xmlhttp.send();
}

</script> 
                                 <!-- Google stacked barchart script start -->
<script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">     
      // google.load("visualization", "1", {packages:["corechart"]});
	  google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart1);
      function drawChart1() {          
          var xmlhttp;            
		if (window.XMLHttpRequest)
  			{
  				xmlhttp=new XMLHttpRequest();
  			}
		else
  		{
 			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		}
		xmlhttp.onreadystatechange=function()
  		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
                    {					
						var data2=xmlhttp.responseText;   
                                                //alert(data2);                                               
                        newfunc1(jQuery.parseJSON(data2));                                
                     }                                        
        }               
                    var dt = document.getElementById("dt1");                    
                    var Value =dt.options[dt.selectedIndex].value;                     
                                                     
                    var dy = document.getElementById("dy1");                    
                    var Value2 =dy.options[dy.selectedIndex].value;         					                     
		
                if(document.getElementById("deptdiv1").innerHTML != ""){                                         
                    
                    var dd = document.getElementById("dd1"); 
					
                    var Value1 =dd.options[dd.selectedIndex].value; 
                   
                    xmlhttp.open("GET","static_data1.php?one="+Value+"&two="+Value1+"&three="+Value2,true);                
                    xmlhttp.send();
                }
                else{
                    xmlhttp.open("GET","static_data1.php?one="+Value+"&three="+Value2,true);                
                    xmlhttp.send();
            }
		      
      }    
function newfunc1(str){  
//alert(str);                        
        //splitvar=str.split(",");  
		
	//alert(splitvar);                   
    if(str != 1 && str != 2)
    {
        // var myCars=new Array();
        // for(i=0; i<splitvar.length; i++)
        // {                    
            // splitvar1=splitvar[i].split("_");                                              
            // sp=splitvar1[0];                   
            // sp1=splitvar1[1];   
			// if(i != 0){	
            // sp2=parseInt(sp1);
			// }
			// else
			// {
				// sp2=sp1;
			// }
			//alert(sp1+" hiii "+sp+" "+sp2);	
           // myCars.push(new Array(sp,(sp2))); 
			//alert(myCars);  
        // }            
		//alert(myCars);                      
       var data= google.visualization.arrayToDataTable(str);
	   //alert('hi');
        var options = {title: 'Company Performance/Score by section', isStacked:true,
		hAxis: {title: 'Month', minValue: 0, maxValue: 100, titleTextStyle: {color: 'green',fontName:'Arial',fontSize:'18'},textStyle:{fontName: 'Arial', fontSize: '12'}},
        vAxis:{title:'Score', minValue: 0, maxValue: 100,titleTextStyle: {color: 'green',fontName:'Arial',fontSize:'18'},textStyle:{fontName: 'Arial', fontSize: '12'}},
        chartArea:{left:50,right:100,width:"100%",height:"70%"}
		};        
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));        
        chart.draw(data, options);  
        var elm=document.getElementById("select1");
        elm.innerHTML='';
        elm.className='';   
        
         var pos = document.getElementById("chart_div1");                    
                             pos.style.position = "relative";
        
    }   
    else if(str == 2)
          {       
            str="<?php echo "<strong>".FAILURE.":"."</strong>"." ".DATANOTFOUND?>";                                                           

            var elm=document.getElementById("select1");                                                                                                 
            var chart = document.getElementById('chart_div1');
            chart.innerHTML='';
             
            elm.className = "nNote nFailure hideit";        
            elm.innerHTML=str;     

             var pos = document.getElementById("chart_div1");                    
                             pos.style.position = "fixed";
          }                      
    else
          {
            str="<?php echo "<strong>".INFORMATION.":"."</strong>"." ".SELTEMPDEPTTODISPCHARTT ?>";                        

            var elm=document.getElementById("select1");
            elm.className = "nNote nInformation hideit";             
            elm.innerHTML=str;     
            
             var chart = document.getElementById('chart_div1');             
             chart.innerHTML='';
             chart.className='';
             
              var pos = document.getElementById("chart_div1");                    
                             pos.style.position = "fixed";                        
          }                   
          window.onload=drawChart1;
}
function showdepartment1(str)
	{		
		if (str=="")
 		 {
		 	document.getElementById("deptdiv1").innerHTML="";
 			return;
 		 }
		if (window.XMLHttpRequest)
  			{
  				xmlhttp=new XMLHttpRequest();
  			}
		else
  		{
 			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
 		}
		xmlhttp.onreadystatechange=function()
  		{
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	  {
				str = xmlhttp.responseText;
				document.getElementById('deptdiv1').innerHTML=str;
    	  }
 	   }
		xmlhttp.open("GET","getdepartment1.php?c="+str,true);
		xmlhttp.send();
}
function show1(s){
     var theContents = document.getElementById('dd1')[document.getElementById('dd1').selectedIndex].innerHTML;
                               // alert(theContents);
                                
            var span=document.getElementById('dname1').innerHTML=theContents;
		//alert(span);	
}
</script>
                                 <!-- Google stacked barchart script end -->
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6> <?php echo REPORTS ?></h6></div>
<?php 
if($report_right == 1){
?>	

<?php
if(strpos($_SERVER['REQUEST_URI'],'no_record'))
{
?>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nFailure hideit">
<p>
<strong><?php echo FAILURE.":" ?></strong>
<?php echo INSERTAUDITEXPORT."!!" ?>
</p>
</div>
<?php
}
?>   
<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
    <div class="border pl-1 pt-2">
		<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo EXPORTAUDIT ?></h6>
	</div>
	<div class="container mt-3">  
		<form action="insert.php" id="valid" class="mainForm" name="frmcreatecsv"  method="post" >
			<fieldset>    
			<?php
			include("dbconnect.php");  
			$sql_query="select * from addtemplate where `superadminid` ='$suid'";
			$res=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));           
			?>
				<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label float-left"><?php echo SELECT." ".TEMPLATE." "."&"." ".DEPARTMENT.":" ?></label>
					<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left">
						<select name="drptemplate" style="opacity: 0;"  id="selectReq1"  class="validate[required] form-control form-control-sm imgopocity">
						<option value="0"><?php echo SELECT." ".TEMPLATE ?></option>
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
					<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left mt-sm-0 mt-2">
						<?php
						$sql_query="select * from adddepartment where `superadminid` ='$suid'";
						$res=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));           
						?>
          
						<select name="drpdeptment" style="opacity: 0;" id="selectReq2"  class="validate[required] form-control form-control-sm imgopocity">
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
					<div class="fix"></div>
				</div>
				<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo START." ".DATE.":" ?></label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						 <input  class="datepicker form-control form-control-sm" type="text" size="10" name="txtstartdate" style="color:#494949;"
						  value="<?php echo date("d-m-Y"); ?>" >
					</div>
					<div class="fix"></div>
				</div> 
				<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo END." ".DATE.":" ?></label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						 <input  class="datepicker form-control form-control-sm" type="text" size="10" name="txtenddate" style="color:#494949;"
						  value="<?php echo date("d-m-Y"); ?>" >
					</div>
					<div class="fix"></div>
				</div> 
				<div class="form-group row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
						<input class="btn btn-success btn-sm" type="submit" name="cmdcreatecsvtab" value="<?php echo TDR ?>" onClick="return valid()" /> 
						<input class="btn btn-success btn-sm mt-sm-0 mt-3" type="submit" name="cmdcreatecsvpipe" value="<?php echo PDR ?>" onClick="return valid()" />
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>	       
<?php
$sql_query="select * from addtemplate where superadminid =$suid ";
$res=mysqli_query($sql,$sql_query);   
?>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
      <div class="border pl-1 pt-2">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo "Performance chart" ?></h6>
	  </div>
		  
		<div class="form-group row mt-4">  
			<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">
				<select  name="drptemp"  id="dt"  style="color:#494949;"  onChange="return showdepartment(this.value);" class="form-control form-control-sm imgopocity" >
					<option value="0" style="color:#494949;"><?php echo SELECTTEMPLATE ?></option>
					<?php
					while($row=mysqli_fetch_array($res))
					{
					?>
					<option style="color:#494949;" value=<?php echo $row[0] ?>  ><?php echo $row["tempname"] ?></option>
					<?php
					}
					?>
				</select>
			</div>
			<div id="deptdiv" class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left pl-3 pl-sm-0 my-3 mt-sm-0"></div>
			<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left mt-sm-0 mt-1">
				<select name="drpyear"  id="dy" style="color:#494949;" class="form-control form-control-sm imgopocity">              
					<option value="6" style="color:#494949;"><?php echo LASTMREC ?></option>
					<option value="12" style="color:#494949;"><?php echo LASTYREC ?></option>                    
				</select>
			</div>
			<div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left mt-sm-0 mt-1">
				<button id="btn" class="btn btn-success btn-sm" name="go" onClick="drawChart()"><?php echo GO_B ?></button>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<p id="select" style="padding :10px 25px 10px 54px;cursor: auto;" ></p>
			</div>               
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="chart_div"></div>
		</div>
	</div>
						<!-- Google stacked bar chart code Start --> 
		<?php
		$sql_query1="select * from addtemplate where superadminid =$suid ";
		$res1=mysqli_query($sql,$sql_query1);   
		?>
	<div class="container col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 px-0">
		<div class="border pl-1 pt-2">
			<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo "Performance chart by section"; ?></h6>
		</div>
		<div class="form-group row mt-4">  
			<div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left">
				<select  name="drptemp1"  id="dt1"  style="color:#494949;"  onChange="return showdepartment1(this.value);" class="form-control form-control-sm imgopocity" >
					<option value="0" style="color:#494949;"><?php echo SELECTTEMPLATE ?></option>
					<?php
					while($row1=mysqli_fetch_array($res1))
					{
					?>
					<option style="color:#494949;" value=<?php echo $row1[0] ?>  ><?php echo $row1["tempname"] ?></option>
					<?php
					}
					?>
				</select> 
			</div>
			<div id="deptdiv1" class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left pl-sm-0 my-3 mt-sm-0"></div>
			<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 float-left">
				<select name="drpyear1"  id="dy1" style="color:#494949;" class="form-control form-control-sm imgopocity">              
					<option value="6" style="color:#494949;"><?php echo LASTMREC ?></option>
					<option value="12" style="color:#494949;"><?php echo LASTYREC ?></option>                    
				</select>
			</div>
			<div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left mt-sm-0 mt-1">
				<button id="btn" class="btn btn-success btn-sm" name="find" onClick="drawChart1()"><?php echo GO_B ?></button>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<p id="select1" style="padding :10px 25px 10px 54px;cursor: auto;" ></p>
			</div>               
			<div id="chart_div1" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="width: 700px; height: 530px;"></div>
		</div>
	</div>
						<!-- Google stacked bar chart code end -->
		 <?php } else { ?>
		 <style>
		#footer {
			position:fixed;
			bottom:0;
		}
		</style>
		<h5><br><br>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">
			You Are Not Authorized To Access This Page...!
			</div>
		</h5>
		<?php } ?>         
	</div>
<div class="fix"></div>
</div>
<?php include_once("footer.php");?>