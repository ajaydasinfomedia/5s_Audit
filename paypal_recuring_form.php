<?php 
	session_start();
	include("livesite_header.php");
	
	//Database error upgrade time. After select static database
	//include("dbconnect.php");
	$sql=mysqli_connect("localhost","phpuser","2RqRzCVf") or die('Could not connect: 1 ');
	mysqli_select_db($sql,"5s_web") or  die ('Can\'t use foo : ' . mysqli_error($sql));
	$sqlq="select * from plan_options where plan_name NOT LIKE 'custom' and plan_type ='5s' ORDER BY price";
	$rs=mysqli_query($sql,$sqlq);
	$i=1;
	
	while($row=mysqli_fetch_array($rs))
	{
		$c[$i] = $row['plan_name'];
		$a[$i] = $row['total_user'];
		$b[$i] = $row['price'];
		$i++;
	}
	//var_dump($c);die;
	//mysqli_close($sql);
?>
    <link type="text/css" rel="stylesheet"  href="common/css/reset.css" >
    <link type="text/css" rel="stylesheet"  href="common/css/layout.css" >
    <link type="text/css" rel="stylesheet"  href="common/css/slider.css" >
	
<style>
body{
	font-family: 'PT Sans Caption' !important;
}
header{
	height:auto !important;
}
.francophil,
html, body, div, span, object, iframe, blockquote, pre, a, abbr, address, cite, code, del, dfn, em, font, img, ins, kbd, q, samp, small, strong, sub, sup, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, header, nav, article, aside, footer, hgroup, section, textarea, input, select
{
    font-family: 'PT Sans Caption' !important;
	font-size: 14px;
	font-weight: normal;
}
.h3, h3 {
    font-size: 24px;
}
.pricing_box_outer{
	margin-top: 80px;
}
article#main_container{
	background: transparent;
}
</style>

	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-39768351-1']);
        _gaq.push(['_trackPageview']);
        (function() 
        {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
	<script type="text/javascript" language="javascript">
function callfunction(planprice,noofuser,planname)
{
   var payment_method=document.getElementById("payment_method"+planprice).value;
   var final_price=document.getElementById("productprice"+planprice).value;
   if(document.getElementById("payment_method"+planprice).value == "")
   {
      alert("Please Select Payment Method");
	  return false;     
   }
	else
	{
	document.getElementById("payment_methodss").value=payment_method;
	document.getElementById("price").value=document.getElementById("productprice"+planprice).value;
	document.getElementById("noofusers").value=noofuser;
	document.getElementById("planname").value=planname;
	document.pricselect.submit();
	}
}
        function displayform()
        {
            document.location = 'mail';
        }
        function showUser(str,str1)
        {
			str1p = str1.substring(1);
            if (str=="")
            {
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
					//alert(xmlhttp.responseText);
					var fvalue=xmlhttp.responseText;
                    if(xmlhttp.responseText == '-1')
                    {	
                        msg=" <?php echo "<strong>".FAILURE.":"."</strong>"." "."Coupon Code already expired or wrong" ?>";
                        var elm=document.getElementById("select");
                        elm.className = "nNote nFailure hideit";        
                        elm.innerHTML=msg;
                        return false;                         
                    }
                    if(str1 == '$15')
                    {
                        msg=" <?php echo "<strong>".SUCCESS.":"."</strong>"." "."Coupon Code applied successful" ?>";
                        var elm=document.getElementById("select");
                        elm.className = "nNote nSuccess hideit";        
                        elm.innerHTML=msg;
                        elm.style.left = "65px";
                        document.getElementById("pricingdisplay"+str1p).innerHTML = xmlhttp.responseText;
                        document.getElementById("productprice"+str1p).value = xmlhttp.responseText;
						document.getElementById("couponcode").value = str;
						var isInt =isFloat(fvalue);
						 if(isInt){
							  document.getElementById("pricingdisplay"+str1p).classList.add('small'); 
							  document.getElementById("dollardisplay"+str1p).classList.add('small');
						 }
                    }
                    if(str1 == '$35')
                    {
                        msg=" <?php echo "<strong>".SUCCESS.":"."</strong>"." "."Coupon Code applied successful" ?>";
                        var elm=document.getElementById("select");
                        elm.className = "nNote nSuccess hideit";        
                        elm.innerHTML=msg;
                        elm.style.left = "65px";
                        document.getElementById("pricingdisplay"+str1p).innerHTML = xmlhttp.responseText;
                        document.getElementById("productprice"+str1p).value = xmlhttp.responseText;
						document.getElementById("couponcode").value = str;
						var isInt =isFloat(fvalue);
						 if(isInt){
							  document.getElementById("pricingdisplay"+str1p).classList.add('small'); 
							  document.getElementById("dollardisplay"+str1p).classList.add('small');
						 }
                    }
                    if(str1 == '$99')
                    {
                        msg=" <?php echo "<strong>".SUCCESS.":"."</strong>"." "."Coupon Code applied successful" ?>";
                        var elm=document.getElementById("select");
                        elm.className = "nNote nSuccess hideit";        
                        elm.innerHTML=msg;
                        elm.style.left = "65px";
                        document.getElementById("pricingdisplay"+str1p).innerHTML = xmlhttp.responseText;
                        document.getElementById("productprice"+str1p).value = xmlhttp.responseText;
						document.getElementById("couponcode").value = str;
						var isInt =isFloat(fvalue);
						 if(isInt){
							  document.getElementById("pricingdisplay"+str1p).classList.add('small'); 
							  document.getElementById("dollardisplay"+str1p).classList.add('small');
						 }
                    }
                    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
              }
           }
            xmlhttp.open("GET","checkcoupon.php?p="+str+"&q="+str1,true);
            xmlhttp.send();		
		}
		function isFloat(n){
			return n != "" && !isNaN(n) && Math.round(n) != n;
		}
</script>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if IE]><link rel="stylesheet" href="http://www.invoicera.com/common/css/ie.css" type="text/css" media="screen, projection" />
    <![endif]-->
    <!--Js That makes charecter close to eachother-->
    <!--<script type="text/javascript" src="common/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="common/js/cufon-yui.js"></script>
    <script type="text/javascript" src="common/js/FrancophilSans_500-FrancophilSans_700.font.js"></script>
    <script type="text/javascript" src="common/js/cufon-fonts.js"></script>-->
    <!--End Js That makes charecter close to eachother-->	
<!--Header Section Ends Here--> 
<p id="select" style="font-size: 11px; padding: 9px 42px; margin-bottom: 40px;"></p>
<!--Content Section Starts Here-->

<article id="main_container">
	<section id="inner_container">
		<div class="pricing_box_outer"> 
      		<!--Pricing Features-->
      		<div class="col1">
        		<div class="head"><h2 class="francophil">Select Your Plan</h2></div>
        		<p id="recurringHelp"><a href="#">User</a></p>
        		<p id="invoiceHelp" class="light"><a href="#">Number of Audits</a></p>
        		<p id="invoiceHelp"><a href="#">Number of Clients</a></p>
        		<p id="invoiceHelp" class="light"><a href="#">Number of Custom Template</a></p>     
         		<p id="recurringHelp"><a href="#">Availablity</a></p>
				<p id="clientHelp" class="light"><a href="#">Database Backup</a></p>
        		<p id="clientHelp" class="light"><a href="#">Backup Audits to web</a></p>
				<p id="clientHelp"><a href="#">Ticket Support</a></p>
				<p id="clientHelp" class="light"><a href="#">Email Support</a></p>
      			<p id="clientHelp"><a href="#">No Niftysol Branding</a></p>
       			<p id="currencyHelp" class="light"><a href="#">Coupon Code</a></p>
        		<p id="autobillHelp"><a href="#">Payment Method</a></p>
				
        	</div>
      <!--pricing box Free plan-->
			<div  class="pricing_box">
			
          		<div class="price"> 
                	<span class="francophil"><?php echo $c[1]; ?></span>
          			<div class="price_inner francophil">
                    	<!--<p><?php echo $b[1]; ?></p>
          				<div style="left: 3px;margin-top: -2px;" class="dollar francophil">$</div>
         				<div style=" font-size:36px;left: 45px;margin-top: -5px;" class="dollar francophil">*</div>-->
                        <span class="price_span dollar <?php if(is_float($b[1])){ echo 'small';}?>" id="dollardisplay<?php echo $b[1] ?>">$</span>
                        <span class="price_span amount <?php if(is_float($b[1])){ echo 'small';}?>" id="pricingdisplay<?php echo $b[1] ?>"><?php echo $b[1]; ?></span>
                        <span class="price_span per_month">*</span>
					
          			</div>
                    <input type="hidden" name="productprice<?php echo $b[1] ?>" id="productprice<?php echo $b[1] ?>" value="<?php echo $b[1] ?>">
      				<p class="signup">
                        <input class="btn1" type="button" name="cmdbuytrial" onclick="callfunction(<?php echo $b[1] ?>,<?php echo $a[1]; ?>,'<?php echo $c[1]; ?>')">
                    </p>
        		</div>
        		<p><span><?php echo $a[1]; ?></span></p>
        		<p class="light">Unlimited</p>
        		<p>Unlimited</p>
        		<p class="light">Unlimited</p>
          		<p>31 days</p>
          		<p class="light"><span class="no"></span></p>
				<p class="light"><span class="yes"></span></p>
          		<p><span class="no"></span></p>
          		<p class="light"><span class="yes"></span></p>
          		<p><span class="no"></span></p>   
          		<p style="padding:8px 0 11px;" class="light">-</p>
					
				<?php  		                
					$res=mysqli_query($sql,"SELECT * FROM tb_provider where status=1 order by provider_id");
					
				?>
				
    			<div>
        			<select style="width:150px; background:#f8f7dc; margin: 10px 2px;" name="payment_method<?php echo $b[1] ?>" id="payment_method<?php echo $b[1] ?>">
						<!--<option value=''>Select Method</option> -->                                               
                        <?php
							while($row=mysqli_fetch_assoc($res))
							{ 
						?>		
								<option value="<?php echo $row['provider'] ?>"><?php echo $row['provider'] ?></option> 
						<?php			
							} 																															
						?>
                  	</select>
    			</div>
         	</div>
		  <!--pricing box Classic plan-->
      <div class="pricing_box classic">
        		<div class="price"> 
                	<span class="classic francophil" ><?php echo $c[2]; ?></span>
         			<div class="price_inner francophil">
                    	<!--<p  id="txtid15"><?php echo $b[2]; ?></p>
              			<div style="left:-5px;" class="dollar francophil">$</div>
            			<div style="left:75px;" class="per_month francophil">/mth</div>-->
                        <span class="price_span dollar <?php if(is_float($b[2])){ echo 'small';}?>" id="dollardisplay<?php echo $b[2] ?>">$</span>
                        <span class="price_span amount <?php if(is_float($b[2])){ echo 'small';}?>" id="pricingdisplay<?php echo $b[2] ?>"><?php echo $b[2]; ?></span>
                        <span class="price_span per_month">/mth</span>
          			</div>
            		<p class="signup">
            			<input type="hidden" name="productprice<?php echo $b[2] ?>" id="productprice<?php echo $b[2] ?>" value="<?php echo $b[2] ?>">
                		<input class="btn1" type="button" name="cmdbuy1" onclick="return callfunction(<?php echo $b[2]; ?>, <?php echo $a[2]; ?>, '<?php echo $c[2]; ?>');">
            		</p>
        		</div>
                <p><span><?php echo $a[2]; ?></span></p>
                <p class="light">Unlimited</p>
                <p>Unlimited</p>
                <p class="light">Unlimited</p> 
                <p>1year</p>
                <p class="light"><span class="no"></span></p>
                <p class="light"><span class="yes"></span></p>
                <p><span class="no"></span></p>
                <p class="light"><span class="yes"></span></p> 
                <p><span class="no"></span></p>
        		<div style="background:#E8F7D1; ">
        			<p class="light" style="float: left; width: 65%;">
						<input type="text" name="cc1" id="cc1" style="color:#494949;width:90%; height:23px;" >
					</p>
					<p class="light" style="float: left; width: 35%;">
	    				<input style="padding:0px;" class="btn2" type="button" onclick="showUser(document.getElementById('cc1').value,'<?php  echo '$'.$b[2] ?>')" name="cmdcc1" value="Apply">
					</p>     
        		</div>
        		<input type="hidden" name="payment_method<?php  echo $b[2] ?>" id="payment_method<?php  echo $b[2] ?>" value="paypal" />
        		<?php  		               
		  			$res=mysqli_query($sql,"SELECT * FROM tb_provider where status=1 order by provider_id"); 
        		?>
				<div>
    				<select style="width:150px;background:#E8F7D1; margin: 10px 2px;" name="payment_method<?php  echo $b[2] ?>" id="payment_method<?php  echo $b[2] ?>">
						<!--<option value=''>Select Method</option>  -->                                              
                        <?php
							while($row=mysqli_fetch_assoc($res))
							{ 
						?>		
								<option value="<?php echo $row['provider'] ?>"><?php echo $row['provider'] ?></option> 
						<?php			
							} 																															
						?>
                    </select>	
             	</div>
         	</div>
      <!--pricing box Preferred plan-->
      <div class="pricing_box preferred">
        		<div class="price">
                	<span class="preferred francophil"><?php echo $c[3]; ?></span>
          			<div class="price_inner francophil">
                    	<!--<p id="txtid35"><?php echo $b[3]; ?></p>
              			<div style="left:5px;" class="dollar francophil">$</div>
            			<div style="left:86px;" class="per_month francophil">/mth</div>-->
                        <span class="price_span dollar <?php if(is_float($b[3])){ echo 'small';}?>" id="dollardisplay<?php echo $b[3] ?>">$</span>
                        <span class="price_span amount <?php if(is_float($b[3])){ echo 'small';}?>" id="pricingdisplay<?php echo $b[3] ?>"><?php echo $b[3]; ?></span>
                        <span class="price_span per_month">/mth</span>
                        
          			</div>
            		<p class="signup">
            			<input type="hidden" name="productprice<?php echo $b[3] ?>" id="productprice<?php echo $b[3] ?>" value="<?php echo $b[3] ?>">
                		<input class="btn1" type="button"  name="cmdbuy2" onclick="return callfunction(<?php echo $b[3]; ?>, <?php echo $a[3]; ?>, '<?php echo $c[3]; ?>');" >
            		</p>
        		</div>
                <p><span><?php echo $a[3]; ?></span></p>
                <p class="light">Unlimited</p>
                <p><span>Unlimited</span></p>
                <p class="light">Unlimited</p>
                <p>1year</p>
                <p class="light">Monthly</p>
                <p class="light"><span class="yes"></span></p>
                <p><span><span class="yes"></span></span></p>
                <p class="light"><span class="yes"></span></p>
                <p><span class="yes"></span></p>
       			<div style="background:#e2efcd; ">
               		<p class="light" style="float: left; width: 65%;">
                		<input type="text" name="cc2" id="cc2" style="color:#494949;width:90%; height:23px;">
                	</p>
                	<p class="light" style="float: left; width: 35%;">
                		<input style="padding:0px;" class="btn2" type="button" value="Apply" name="cmdcc2" onclick="showUser(document.getElementById('cc2').value,'<?php  echo '$'.$b[3] ?>')">
                	</p>
               </div>
               	<input type="hidden" name="payment_method<?php  echo $b[3] ?>" id="payment_method<?php  echo $b[3] ?>" value="paypal" />
       			<?php  					                     
 					$res=mysqli_query($sql,"SELECT * FROM tb_provider where status=1 order by provider_id");
                ?>
 				<div>
    				<select style="width: 150px;background:#e2efcd;margin: 10px 2px;" name="payment_method<?php  echo $b[3] ?>" id="payment_method<?php  echo $b[3] ?>" >
						<!--<option value=''>Select Method</option>-->                                                
                        <?php
							while($row=mysqli_fetch_assoc($res))
							{ 
						?>		
								<option value="<?php echo $row['provider'] ?>"><?php echo $row['provider'] ?></option> 
						<?php			
							} 																															
						?>
                  	</select>
             	</div>
       		</div>
      <!--pricing box Business plan-->
      <div class="pricing_box super">
                <div class="price"> 
                    <span class="business francophil"><?php echo $c[4]; ?></span>
                    <div class="price_inner francophil">
                        <!--<p id="txtid99"><?php echo $b[4]; ?></p>
                        <div style="left:2px;" class="dollar francophil">$</div>
                        <div style="left:88px;" class="per_month francophil">/mth</div>-->
                        <span class="price_span dollar <?php if(is_float($b[4])){ echo 'small';}?>" id="dollardisplay<?php echo $b[4] ?>">$</span>
                        <span class="price_span amount <?php if(is_float($b[4])){ echo 'small';}?>" id="pricingdisplay<?php echo $b[4] ?>"><?php echo $b[4]; ?></span>
                        <span class="price_span per_month">/mth</span>
                    </div>
                    <p class="signup">
                        <input type="hidden" name="productprice<?php echo $b[4] ?>" id="productprice<?php echo $b[4] ?>" value="<?php echo $b[4] ?>">
                        <input class="btn1" type="button"  name="cmdbuy3" onclick="return callfunction(<?php echo $b[4]; ?>, <?php echo $a[4]; ?>, '<?php echo $c[4]; ?>');" >
                    </p>
                </div>
            	<p><span><?php echo $a[4]; ?></span></p>
                <p class="light">Unlimited</p>
                <p>Unlimited</p>
                <p class="light">Unlimited</p>
             	<p>1year</p>
                <p class="light">daily</p>
                <p class="light"><span class="yes"></span></p>
                <p><span class="yes"></span></p>
                <p class="light"><span class="yes"></span></p>
                <p><span class="yes"></span></p>
     			<div style="background:#f7e7d7">
     				<p class="light" style="float: left; width: 65%;">
	 					<input type="text" name="cc3" id="cc3" style="color:#494949;width:90%; height:23px;">
					</p>
					<p class="light" style="float: left; width: 35%;">
						<input style="padding:0px;" class="btn2" type="button" value="Apply" name="cmdcc3" onclick="showUser(document.getElementById('cc3').value,'<?php  echo '$'.$b[4] ?>')">
					</p>
     			</div>
     			<input type="hidden" name="payment_method<?php  echo $b[4] ?>" id="payment_method<?php  echo $b[4] ?>" value="paypal" />
     			<?php  					                     
					$res=mysqli_query($sql,"SELECT * FROM tb_provider where status=1 order by provider_id"); 
      			?>
				<div>
    				<select style="width: 150px; background:#f7e7d7; margin: 10px 2px;" name="payment_method<?php  echo $b[4] ?>" id="payment_method<?php  echo $b[4] ?>" >
						<!--<option value=''>Select Method</option>-->                                                
                        <?php
							while($row=mysqli_fetch_assoc($res))
							{ 
						?>		
								<option value="<?php echo $row['provider'] ?>"> <?php echo $row['provider'] ?> </option> 
						<?php			
							} 																															
						?>
                   </select>
                </div>
         	</div>
      <!--pricing box exclusive plan-->
        <div class="pricing_box exclusive">
                        <div class="price">
                            <span class="exclusive francophil">Custom</span>
                            <div class="price_inner francophil">
                                <span class="price_span dollar" id="dollardisplay">$</span>
                        <span class="price_span amount" id="pricingdisplay">199</span>
                        <span class="price_span per_month">/mth</span>
                            </div>
                            <p class="signup">
                                <input class="btn1" type="button" name="cmdbuy4" onclick="return displayform();">
                            </p>
                        </div>
                        <p><span> >10</span></p>
                        <p class="light">Unlimited</p>
                        <p>Unlimited</p>
                        <p class="light">Unlimited</p>
                        <p>1year</p>
                        <p class="light">daily</p>
                        <p class="light"><span class="yes"></span></p>
                        <p><span class="yes"></span></p>
                        <p class="light"><span class="yes"></span></p>
                        <p><span class="yes"></span></p>        
                        <p style="padding:8px 0 11px;" class="light">-</p>
                        <p>-</p>
                    </div>
    </div>
    <div style="float: left; margin-bottom: 40px; margin-left: 12px; margin-top: -25px; width: 100%; color: #000000; position: relative;"> 
          * This plan will be upgraded to Medium after 31 days, if you do not want to continue you can cancel it from Paypal.
    </div>
 </section>
 </article>
<?php
if(isset($_SESSION['uid']))
{
?>
	<form method="post" action="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/upgrade/".$_SESSION['uid']."/recuringpage" ; ?>" name="pricselect">
<?php
}
else
{
?>
	<form method="post" action="recuringpage" name="pricselect"> 
<?php
}
?>
			<input type="hidden" name="payment_methodss" id="payment_methodss" /><input type="hidden" name="price" id="price" />
  			<input type="hidden" name="noofusers" id="noofusers" /><input type="hidden" name="planname" id="planname" />
  			<input type="hidden" name="couponcode" id="couponcode" value="" /><input type ="hidden" name="pay" id="pay" value="1" />                     
</form>
<?php include("livesite_footer.php");?>
	

