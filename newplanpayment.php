<?php
	session_start();
	if(isset($_REQUEST['cmdproceed']))
	{
		$sqlnew=mysqli_connect("localhost","root","") or die('Could not connect: 1 ' );	
		$db_selected =mysqli_select_db($sqlnew,"5s_web") or  die ('Can\'t use foo : ' . mysqli_error($sqlnew));
		$sqlplan = "select plan_id from plan_options where plan_name ='".$_REQUEST['plan_name']."' ";
		$res = mysqli_query($sqlnew,$sqlplan) or die(mysqli_error($sqlnew));
		$row = mysqli_fetch_assoc($res);
		$plan_id = $row['plan_id'];
		$fname = $_POST['txtpfirstname'];
		$lname = $_POST['txtplastname'];
		$uid = $_SESSION['uid'];
		$fromemail=$_POST['txtpemail'];
		$price=$_POST['amount'];
		if($price == 0){$amt = 35;}
		else{$amt = $price;}
		$no_of_time_period=$_POST['no_of_time_period'];
		$supdate = "update tbl_login set  firstname = '$fname',lastname= '$lname' where uid =". $uid;
		mysqli_query($supdate) or die(mysqli_error($sqlnew));
		if($price == 0)
		{
			 $expdate = date( 'Y-m-d', strtotime( '+1 year  + 31 days' ) );
		}
		else 
		{
			$expdate = date( 'Y-m-d', strtotime( '+1 year' ) );
		}	
		$s= "INSERT INTO `tbl_plan` (`planid` ,`uid` ,`num_of_user` ,`price`,`num_of_period`,`plan_type`,`payment_type`,`coupon_code`,`createdate`,`exp_date`,`plan_id`)
	    	VALUES ('', ".$_SESSION['uid'].", ".$_POST['user'].", ".$price.",".$no_of_time_period.",'5s','".$_REQUEST['paymenttype']."','".$_REQUEST['coupncode']."',CURDATE(), '$expdate','".$plan_id."')";
		$r=mysqli_query($sqlnew,$s) or die(mysqli_error($sqlnew));
		$planid = mysqli_insert_id($sqlnew);
		$id = $_SESSION['uid'];
		$squery = "insert into tbl_login_relation (`id`,`uid`,`superadminid`,`status`,`applogin_status`,`producttype`,`createdate`)values ('','$id','$id','0','0','5s','".date('Y-m-d')."') ";
		mysqli_query($sqlnew,$squery) or die(mysqli_error($sqlnew));
		mysqli_close($sqlnew);
?>
    <body onLoad="document.forms['recuring_payment'].submit()">
    <!--<form name="recuring_payment" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">-->
    <form name="recuring_payment" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="notify_url" value="http://5s.niftysol.com/newplanlistner.php">
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
    <!--Regular Payment Details-->
    <input type="hidden" name="a3" value="<?php echo $amt;?>">
    <input type="hidden" name="p3" value="1">
    <input type="hidden" name="t3" value="M">
    <input type="hidden" name="item_number" value="<?php echo $id."_".$planid;?>">
    <input type="hidden" name="item_name" value="5s">
    
    <!--For 12 Installments-->
    <input type="hidden" name="src" value="1">
    <input type="hidden" name="srt" value="12">
    <input type="hidden" name="sra" value="1">
    
    <input name="cbt" value="Please Click On This Button To Complete The Transaction" type="hidden">
    <input type="hidden" name="rm" value="2">
     <input type="hidden" name="return" value = "http://5s.niftysol.com/logout" >
     
    </form>
    </body>
<?php
	}
?>