<?php
session_start();
include("dbconnect.php");
if(isset($_REQUEST['cmdproceed']))
{
	$fromemail=$_POST['txtpemail'];
	$toemail=$_POST['txttoemail'];
	$amount=$_POST['amount'];
	$amt= substr($amount,1);
	$no_of_time_period=$_POST['no_of_time_period'];
	$sqlplan = "select plan_id from plan_options where plan_name LIKE 'custome' and plan_type LIKE '5s' ";
	$res = mysqli_query($sql,$sqlplan) or die(mysqli_error($sql));
	$row = mysqli_fetch_assoc($res);
	$plan_id = $row['plan_id'];
	$sql_query="select * from tbl_login where email = '".$fromemail."' or displayname = '".$_POST['txtdispname']."'";  
    $result=mysqli_query($sql,$sql_query) or die(mysqli_query($sql));      
    $no=mysqli_num_rows($result); 
    if($no > 0)
    {
		header("location:no/recuringpage_custome");
    }
	else
	{
		$sql1="insert into tbl_login (role,displayname,username,email,password,firstname,lastname,createdate,status,payment_status)
		   values('admin',  '".$_POST['txtdispname']."', '".$fromemail."', '".$fromemail."', '".md5($_POST['txtpass'])."',
	 		'".$_POST['txtpfirstname']."','".$_POST['txtplastname']."','".date('Y-m-d')."','0','0')";
		$rs=mysqli_query($sql,$sql1) or die(mysqli_error($sql));
		$id=mysqli_insert_id($sql);
		if(isset($price) && $price == 1)
		{
			$expdate = date( 'Y-m-d', strtotime( '+1 year  + 7 days' ) );
		}
		else 
		{
			$expdate = date( 'Y-m-d', strtotime( '+1 year' ) );
		}
 		$s= "INSERT INTO `tbl_plan` (`planid` ,`uid` ,`num_of_user` ,`price`,`num_of_period` ,`plan_type`,`payment_type`,`coupon_code`,`createdate`,`exp_date`,`plan_id`)
	    		VALUES ('', ".$id.", ".$_POST['user'].", ".$amt.",".$no_of_time_period.",'5s','".$_SESSION['payment_type']."','".$_SESSION['coupon_code']."',
		 		CURDATE(), '$expdate','".$plan_id."')";
		$r=mysqli_query($s) or die(mysqli_error($sql));
		$planid = mysqli_insert_id($sql);
	
		$ch1 = curl_init();
		curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/insert.php");
		curl_setopt($ch1,CURLOPT_POST,true);
		$data = array('name' => $_POST['fpname'] , 'email' => $fromemail ,'password' => $_POST['txtpass'] );
		curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
		curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch1);
		curl_close($ch1);
}
?>
<body onLoad="document.forms['recuring_payment'].submit()">
<!--<form name="recuring_payment" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">-->
<form name="recuring_payment" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="notify_url" value="http://5s.niftysol.com/customlistner.php">
<input type="hidden" name="cmd" value="_xclick-subscriptions">

<input type="hidden" name="business" value="dpatelmatri@gmail.com">
<!--<input type="hidden" name="business" value="<?php //echo $toemail; ?>">-->

<!--Regular Payment Details-->
<input type="hidden" name="a3" value="<?php echo $amt;?>">
<input type="hidden" name="p3" value="1">
<input type="hidden" name="t3" value="M">
<input type="hidden" name="item_number" value="<?php echo $id."_".$planid; ?>">

<!--For 12 Installments-->
<input type="hidden" name="src" value="1">
<input type="hidden" name="srt" value="12">
<input type="hidden" name="sra" value="1">

<input name="cbt" value="Please Click On This Button To Complete The Transaction" type="hidden">
<input type="hidden" name="rm" value="2">
 <input type="hidden" name="return" value = "http://5s.niftysol.com/login" >
</form>
</body>
<?php
}
?>