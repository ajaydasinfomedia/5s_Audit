<?php
	$fromemail=$_POST['txtpemail'];
	$price= $_POST['amount'];
	if($price == 0)
	{
	$amt = 35;
	}
	else
	{
		$amt = $price;
	}
	$no_of_time_period=$_POST['no_of_time_period'];
	$sqlnew=mysqli_connect("localhost","root","","5s_web") or die('Could not connect: 1 ');	
	
	$fname = $_POST['txtpfirstname'];
	$lname = $_POST['txtplastname'];
	$pwd = $_POST['txtpass'];
	$uid = $_SESSION['uid'];
	 $supdate = "update tbl_login set  firstname = '$fname',lastname= '$lname' where uid =".$uid;
	mysqli_query($sqlnew,$supdate);
	$selectplanid = "select `planid` from tbl_plan where uid =".$uid." and plan_type like '5s' ";
	mysqli_query($sqlnew,$selectplanid);
	$row=mysqli_fetch_assoc($rs);
	$planid = $row['planid'];
	mysqli_close($sqlnew);
?>
    <body onLoad="document.forms['recuring_payment'].submit()">
    <!--<form name="recuring_payment" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">-->
    <form name="recuring_payment" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="notify_url" value="http://5s.niftysol.com/listner_leave.php">
    <input type="hidden" name="cmd" value="_xclick-subscriptions">
    <!--<input type="hidden" name="business" value="sunil_1344255754_biz@dasinfomedia.com">-->
    <input type="hidden" name="business" value="dpatelmatri@gmail.com">
<?php 
    if($price == 0)
    {
?>
    <!--Trial Payment Details-->
    <input type="hidden" name="a1" value="<?php echo $price;?>">
    <input type="hidden" name="p1" value="31">
    <input type="hidden" name="t1" value="D">
<?php 
    } 
?>
    <input type="hidden" name="item_name" value="5s">
    <!--Regular Payment Details-->
    <input type="hidden" name="a3" value="<?php  echo $amt;?>">
    <input type="hidden" name="p3" value="1">
    <input type="hidden" name="t3" value="M">
    <input type="hidden" name="item_number" value="<?php echo $uid."_".$planid;?>">
    
    <!--For 12 Installments-->
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="srt" value="12">
    <input type="hidden" name="sra" value="1">
    
    <input name="cbt" value="Please Click On This Button To Complete The Transaction" type="hidden">
    <input type="hidden" name="rm" value="2">
    <input type="hidden" name="return" value = "http://5s.niftysol.com/logout" >
    </form>
    </body>