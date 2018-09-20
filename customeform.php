<?php session_start();
include("dbconnect.php");
include("header.php"); 
	 
$sqlq="select * from plan_options where plan_name  LIKE 'custom' and plan_type ='5s' ORDER BY price  ";
$rs=mysqli_query($sql,$sqlq);
//$a=array();
$i=1;
while($row=mysqli_fetch_array($rs))
{
	$c[$i] = $row['plan_name'];
	$a[$i] = $row['total_user'];
	$b[$i] = $row['price'];
	$i++;
 }
?>
<script type="text/javascript" language="javascript">
function valid()
{
	if( document.frmpayment.paysitecustome.value == '' )
	{
		return false;
	}
}
function showUser(str,str1)
{
		if (str=="")
 		 {
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
/*		alert(xmlhttp.readyState);
		alert(xmlhttp.status);*/
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	  {
		/*  alert(xmlhttp.responseText);*/
		  	if(xmlhttp.responseText == '-1')
			{
				msg=" <?php echo "<strong>".FAILURE.":"."</strong>"." "."Coupon Code already expired or wrong" ?>";
            	var elm=document.getElementById("select");
            	elm.className = "nNote nFailure hideit";        
            	elm.innerHTML=msg;                         
			}
			document.getElementById("txtamt").value = "$"+xmlhttp.responseText;
    	document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    	  }
 	   }
		xmlhttp.open("GET","checkcoupon.php?p="+str+"&q="+str1,true);
		xmlhttp.send();
		
}
</script>
<div class="wrapper" style="padding-bottom: 5%;">
  <p id="select" style="padding:10px 25px 10px 54px; font-size: 11px;" >                   
    </p>
<form method="post" action="recuringpage_custome.php" name="frmpayment" class="mainForm" id="valid" onsubmit="return valid()">
<div class="widget first">
<div class="head">
<h5 class="iFrames">Select Your Choice</h5>
</div>
<table class="tableStatic" width="100%" cellspacing="0" cellpadding="0">
<thead>
<tr>
<td >Features</td>
<td ><?php echo $c[1]; ?></td>
</tr>
</thead>
<tbody>
<tr>
<td>User</td>
<td><input name="txtuser" type="text" value="<?php echo $a[1]; ?>" readonly="yes" style="color:#494949;"/></td>
</tr>

<tr>
<td>Price</td>
<td><input name="txtprice" type="text" id="txtamt" value="<?php echo '$'.$b[1]; ?>" readonly="yes" style="color:#494949;"/></td>
</tr>
<tr>
<td>Period</td>
<td><input name="txtperiod" type="text"  value="Monthly" readonly="yes" style="color:#494949;"/></td>
</tr>

<tr>
<td>Coupon Code</td>
<td><input name="cc" type="text"  style="color:#494949;width:66%;"/>
<input class="greenBtn" type="button" value="Apply" name="cmdcc" onclick="showUser(cc.value,txtprice.value)"></td>
</tr>

<tr>
<td>Payment Method</td>

<td> <?php  

                        $res=mysqli_query($sql,"SELECT * FROM tb_provider where status=1 order by provider_id"); 
						echo "<select name='paysitecustom' style='color:#494949;'>"; 
						echo "<option  value=''  style='color:#494949;'>Select Method</option>";
							while($row=mysqli_fetch_assoc($res)) { 

									if($row[provider]=="Paypal")
									{
   								echo "<option  value=$row[provider]>$row[provider]</option>"; 
									}
									else if($row[provider]=="Authorize.Net")
									{
									echo "<option  value=$row[provider]>$row[provider]</option>"; 
									}
									else if($row[provider]=="GoogleCheckout")
									{
									echo "<option  value=$row[provider]>$row[provider]</option>"; 
									}
									else
									{
									echo "<option  value=$row[provider]>$row[provider]</option>"; 
									}
										} 
								echo "</select>";	
								?>
</td>
</tr>
<tr>
<td></td>
<td><input class="greenBtn" type="submit" value="Buy"  name="cmdcustom" ></td>
</tr>
</tbody>
</table>
</div>
</form>
</div>
<div class="fix"></div>
</div>
<?php
 include("footer.php");?>
