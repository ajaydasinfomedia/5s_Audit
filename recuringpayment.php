<?php
	
	$fromemail=$_POST['txtpemail'];
	$phone=$_POST['txtcntrycode']." ".$_POST['txtphone'];
	$price=$_POST['amount'];
	if($price == 0)
	{
		$amt = 35;
	}
	else
	{
		$amt = $price;
	}
	$no_of_time_period=$_POST['no_of_time_period'];
	$sql=mysqli_connect("localhost","root","","5s_web") or die('Could not connect: 1 ');
	
	$sqlplan = "select plan_id from plan_options where plan_name ='".$_REQUEST['plan_name']."' and plan_type like '5s' ";
	
	$res = mysqli_query($sql,$sqlplan) or die(mysqli_error($sql));
	
	$row = mysqli_fetch_assoc($res);
	$plan_id = $row['plan_id'];
	$sql_query="select * from tbl_login where email = '".$fromemail."' or displayname = '".$_POST['txtdispname']."'";  
	
    $result=mysqli_query($sql,$sql_query) or die(mysqli_query($sql));     
	
    $no=mysqli_num_rows($result); 
		
    if($no > 0)
		
    {
		session_start();
		$_SESSION['norecuring']=0;
		header("location:no/recuringpage");
    }
	else
	{	
		// add records to zoho leads
		$url = 'https://crm.zoho.com/crm/private/xml/Leads/insertRecords';
   		$strleads ='<Leads>
    				<row no="1">
    				<FL val="Lead Source">5s</FL>
    				<FL val="Company">'.$_REQUEST['txtdispname'].'</FL>
    				<FL val="First Name">'.$_REQUEST['txtpfirstname'].'</FL>
    				<FL val="Last Name">'.$_REQUEST['txtplastname'].'</FL>
    				<FL val="Email">'.$fromemail.'</FL>
    				<FL val="Phone">'.$phone.'</FL>
    				<FL val="Description">'.$_REQUEST['plan_name'].'</FL>
					<FL val="Lead Owner">satish@dasinfomedia.com</FL>
    				</row>
    				</Leads>';
     	$strdata="newFormat=1&authtoken=8e57e7b52ee97bc7e17056321aac34fe&scope=crmapi&xmlData=".$strleads;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, 4);
		curl_setopt($ch,CURLOPT_POSTFIELDS, $strdata);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$result = curl_exec($ch);
		curl_close($ch);
		//End zoho lead add record
		
		// Entry to table login --new user added	
		$sql1="insert into tbl_login (role,displayname,username,email,phone,password,firstname,lastname,createdate) values('admin',  '".$_POST['txtdispname']."',
			 '".$fromemail."', '".$fromemail."',  '".$phone."', '".md5($_POST['txtpass'])."', '".$_POST['txtpfirstname']."','".$_POST['txtplastname']."','".date('Y-m-d')."')";
		$rs=mysqli_query($sql,$sql1) or die(mysqli_error($sql));
		$id=mysqli_insert_id($sql);
		$sqlupdate = "update tbl_login set superadminid = $id, parent = $id where uid = $id ";
		mysqli_query($sql,$sqlupdate) or die(mysqli_error($sql));
		$squery = "insert into tbl_login_relation (`id`,`uid`,`superadminid`,`status`,`applogin_status`,`producttype`,`createdate`) values ('','$id','$id','0','0','5s','".date('Y-m-d')."') ";
		mysqli_query($sql,$squery) ;
		
		if($price == 0)
		{
			 $expdate = date( 'Y-m-d', strtotime( '+1 year  + 31 days' ) );
		}
		else 
		{
			$expdate = date( 'Y-m-d', strtotime( '+1 year' ) );
		}	
		$s= "INSERT INTO `tbl_plan` (`planid` ,`uid` ,`num_of_user` ,`price`,`num_of_period`,`plan_type`,`payment_type`,`coupon_code`,`createdate`,`exp_date`,`plan_id`)
	    	 VALUES ('', ".$id.", ".$_POST['user'].", ".$price.",".$no_of_time_period.",'5s','".$_REQUEST['paymenttype']."','".$_REQUEST['coupncode']."', CURDATE(), '$expdate','".$plan_id."')";
		$r=mysqli_query($sql,$s) or die(mysqli_error($sql));
		$planid = mysqli_insert_id($sql);
		//End table entry for the new user
		
		//Entry to WP site-- create user in the niftysol.com
		$ch1 = curl_init();
		curl_setopt($ch1,CURLOPT_URL,"http://www.niftysol.com/insert.php");
		curl_setopt($ch1,CURLOPT_POST,true);
		$data = array('name' => $fromemail , 'email' => $fromemail ,'password' => $_POST['txtpass'] );
		curl_setopt($ch1,CURLOPT_POSTFIELDS,$data);
		curl_setopt($ch1,CURLOPT_FOLLOWLOCATION,false);
		curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch1);
		curl_close($ch1);
		//End user entry in niftysol.com
	}
	mysqli_close($sql);
?>
    <body onLoad="document.forms['recuring_payment'].submit()">
    <!--<form name="recuring_payment" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">-->
    <form name="recuring_payment" action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="notify_url" value="http://5s.niftysol.com/listner.php">
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