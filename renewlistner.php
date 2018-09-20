<?php
	$request = "cmd=_notify-validate"; 
	$varvalue = "";
	foreach ($_POST as $varname => $varvalue)
	{
		$email .= "$varname: $varvalue\n";  	
		if(function_exists('get_magic_quotes_gpc') and get_magic_quotes_gpc())
		{  
			$varvalue = urlencode(stripslashes($varvalue)); 
		}
		else 
		{ 
			$value = urlencode($value); 
		} 
		$request .= "&$varname=$varvalue"; 
		$varvalue.=$email;
		$sbcid = $_POST['subscr_id'];
		$itemnumber = $_POST['item_number'];
		$itemname = $_POST['item_name'];
		$txn_id = $_POST['txn_id'];
		$username = $_POST['username'];
	} 
	$strexp = explode("_",$itemnumber);	
	$id = $strexp[0];
	$planid = $strexp[1];	 
	$ch = curl_init();
	//curl_setopt($ch,CURLOPT_URL,"https://www.sandbox.paypal.com/cgi-bin/webscr");
	curl_setopt($ch,CURLOPT_URL,"https://www.paypal.com");
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$request);
	curl_setopt($ch,CURLOPT_FOLLOWLOCATION,false);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($ch);
	curl_close($ch);
	switch($result)
	{
		case "VERIFIED":
 		include("dbconnect.php");   
		if($itemname != '' && $itemname == '5s - upgrade')
		{
 			$squery = "update tbl_login set status = '1',payment_status = '1' where uid =". $id;
			mysqli_query($sql,$squery) ;
	 		$chkentry ="update tbl_plan set active_status = 0 where uid ='".$id."' and plan_type like '5s' ";
			mysqli_query($sql,$chkentry);	
	 		$chkentry1 ="update tbl_plan set active_status = 1,subscr_id = '$sbcid'  where planid ='".$planid."'  ";
			mysqli_query($sql,$chkentry1);
		} 
	 	if(strpos($varvalue , 'txn_type: subscr_cancel'))
	 	{
	 		$yesterdate = date("Y-m-d", strtotime("-1 day"));
			$utbl_plan ="update tbl_plan set active_status = 0, exp_date = '".$yesterdate."' where uid = ".$id." and subscr_id ='".$sbcid."' ";
			mysqli_query($sql,$utbl_plan);
			$sqlq = "update tbl_login_relation set status = 0 where superadminid =$id ";
			mysqli_query($sql,$sqlq);
	 	}
		$sqlchecksubscr = "select `subscr_id` from tbl_plan where planid =".$planid;
		$rssubscr = mysqli_query($sql,$sqlchecksubscr);
		$row = mysqli_fetch_assoc($res);
		$id1 =  $id.'_5sdb';
		$subscr_id = $row['subscr_id'];										
		if($subscr_id == '' )
		{ 
	 		$expdate = date( 'Y-m-d', strtotime( '+1 year' ) );	 
			$sqlq = "update tbl_login set status = 0 where superadminid 	 ='".$id."' and role LIKE 'auditor' ";
			mysqli_query($sql,$sqlq);		
			$chkentry ="update tbl_plan set active_status = 0 where  uid='".$id."' and plan_type like '5s'";
			mysqli_query($sql,$chkentry);
			$chkentry1 ="update tbl_plan set active_status = 1,subscr_id = '$sbcid',`exp_date` = '".$expdate."' where planid =".$planid;
			mysqli_query($sql,$chkentry1);
		} 
		$sqlemail = "select `email` from tbl_login where uid =". $id;
		$res = mysqli_query($sql,$sqlemail) or die(mysqli_error($sql));
		$row = mysqli_fetch_assoc($res);
		$email = $row['email'];	 
		$to = $email;
    	$from = "sales@niftysol.com";
    	$subject = "Thank You";
    	$message = "<html>  <body bgcolor='#DCEEFC'>    <center> <b>Thankyou for Renewal....</b> </center></body></html>" ;
		$headers  = "From: $from\r\n";
		$headers .= "Content-type: text/html\r\n";
		mail($to, $subject, $message, $headers);
		break;
	case "INVALID":
		break;
	default:
}
?>