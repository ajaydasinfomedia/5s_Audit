<?php
session_start();
$sql=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$query = "select * from tbl_plan where uid = '".$_SESSION['uid']."' and active_status = 1 and plan_type like '5s'";
$res = mysqli_query($sql,$query) or die(mysqli_error($sql));
while($row = mysqli_fetch_array($res))
{
	$profile_id = $row['subscr_id'];	
}
$action = 'cancel';
change_subscription_status($profile_id,$action);
function change_subscription_status($profile_id, $action) 
{
	$api_request = 'USER=' . urlencode( 'dpatelmatri_api1.gmail.com' )
	                .  '&PWD=' . urlencode( '5BYRRSU58KLWX2JF' )
	                .  '&SIGNATURE=' . urlencode( 'AIByoPnUcl.aOSbJ2-SbYJYy6rDIAtH.tHEzq3EXfCmV4hdI0p.cs9Aj' )
	                .  '&VERSION=76.0'
	                .  '&METHOD=ManageRecurringPaymentsProfileStatus'
	                .  '&PROFILEID=' . urlencode( $profile_id )
	                .  '&ACTION=' . urlencode( $action )
                .  '&NOTE=' . urlencode( 'Profile cancelled at store' );
	    $ch = curl_init();	
	    curl_setopt( $ch, CURLOPT_URL, 'https://api-3t.paypal.com/nvp' ); // For sandbox transactions, change to 'https://api-3t.sandbox.paypal.com/nvp'
	    curl_setopt( $ch, CURLOPT_VERBOSE, 1 );
	    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
	    curl_setopt( $ch, CURLOPT_POST, 1 );
	    curl_setopt( $ch, CURLOPT_POSTFIELDS, $api_request );
		$response = curl_exec( $ch );
	    if( ! $response )
		die( 'Calling PayPal to change_subscription_status failed: ' . curl_error( $ch ) . '(' . curl_errno( $ch ) . ')' );
	    curl_close( $ch );
	    parse_str( $response, $parsed_response ); 
	    return $parsed_response;
}	
header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/pricing_plans?upgrade=".$_SESSION['uid']);	