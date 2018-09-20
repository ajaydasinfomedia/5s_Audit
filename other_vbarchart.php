<?php session_start();

if(!isset($_SESSION["uname"]))
{
    header("location:login");
}
        include_once("header.php");
        include_once("left_menu.php");
	include_once("dbconnect.php");               
        ?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        
  
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {          
          var xmlhttp;            
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
				var data1=xmlhttp.responseText;                                                                 
                                  // alert(data1);
                                newfunc(data1);                                
                     }                                        
                }               
                //alert(str1);
                    var dt = document.getElementById("dt");                    
                    var Value =dt.options[dt.selectedIndex].value;
                   // alert(Value);                     
                    
                    var dd = document.getElementById("dd");                    
                    var Value1 =dd.options[dd.selectedIndex].value;
                    //alert(Value1);                     
                    
                    var dy = document.getElementById("dy");                    
                    var Value2 =dy.options[dy.selectedIndex].value;
                    //alert(Value2);                     
                    
		xmlhttp.open("GET","other_static_data.php?one="+Value+"&two="+Value1+"&three="+Value2,true);
		xmlhttp.send();                
      }
      
      function newfunc(str){                          
        splitvar=str.split(",");      
       
  var c=0;
     if(str != 1 && str != 2)
    {                   
        var myCars=new Array();
        for(i=0; i<splitvar.length; i++)
        {                    
            splitvar1=splitvar[i].split("_");                                              
            sp=splitvar1[0];        
         //   alert(sp);            
            sp1=splitvar1[1];            
           // alert(sp1);      
            sp2=parseInt(sp1);
           myCars.push(new Array(sp,(sp2)));              
        }                              
        //alert(myCars);        
//var myCars1=new Array(new Array("year" ,"sales" ),new Array("2008" ,100 ),new Array("2009" ,200 ),new Array("2010" ,300 ),new Array("2011" ,400 ));
//alert(myCars1);       

        var data= google.visualization.arrayToDataTable(myCars);
        var options = {
          title: 'Company Performance/Score',
          hAxis: {title: 'Month', titleTextStyle: {color: 'blue'}}, 
          vAxis:{title:'Score',titleTextStyle: {color: 'blue'}},
          chartArea:{left:60,width:"100%",height:"70%"}
        };
        
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);  
        var elm=document.getElementById("select");
        elm.innerHTML='';
        elm.className='';
    }
    
    else if(str == 2)
          {       
                  str="<strong>FAILURE: </strong> Oops sorry.No data found";                                                       
            var elm=document.getElementById("select");                                                                                                 
            var chart = document.getElementById('chart_div');
            chart.innerHTML='';
             
            elm.className = "nNote nInformation nFailure hideit";        
            elm.innerHTML=str;                                                      
          }                
    else
          {
            str="<strong>INFORMATION: </strong> select template and department to display the graph";            
            var elm=document.getElementById("select");
            elm.className = "nNote nInformation hideit";             
            elm.innerHTML=str;     
          }                
}            
    </script>
  </head>
  <body>
      <div class="content">         
          <div class="title"><h5>Reports</h5></div>
          <div style="margin-top: 25px;">     
           <?php
   $sql_query="select * from addtemplate";
	$res=mysqli_query($sql,$sql_query);   
?>
<select name="drptemp" style="opacity: 0;" id="dt">
<option value="0">Select Template</option>
<?php
while($row=mysqli_fetch_array($res))
{
?>
<option value=<?php echo $row[0] ?>><?php echo $row["tempname"] ?></option>
<?php
}
?>
</select>
                    
           <?php
   $sql_query="select * from adddepartment";
	$res=mysqli_query($sql,$sql_query);   
?>
          
<select name="drpdept" style="opacity: 0;" id="dd">
<option value="0">Select Department</option>
<?php
while($row=mysqli_fetch_array($res))
{
?>
<option value=<?php echo $row[0] ?>><?php echo $row["deptname"] ?></option>
<?php
}
?>
</select>
          
          <select name="drpyear" style="opacity: 0;" id="dy">              
              <option value="6">Last 6 Months Records</option>
              <option value="12">Last 1 Year Records</option>              
          </select>

          <button style="margin-left:30px;" class="greyishBtn" name="go" onClick="drawChart()">Go</button>
          </div>
          <p id="select" style="padding:10px 25px 10px 54px; font-size: 11px " >                   
           </p>
               
           <div id="chart_div" style="width: 700px; height: 550px;">                                                 
           </div>            
</div>
  </body>
</html>

<div class="fix"></div>
</div>
<?php
        include_once("footer.php");
?>
