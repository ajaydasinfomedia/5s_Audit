
<?php
include("database.php");

if(isset($_GET['submit']))
{

		$paysite=$_GET['paysite'];
		$toemail=$_GET['toemail'];
		$fromemail=$_GET['fromemail'];
		$amount=$_GET['amount'];
		$currency=$_GET['amount_ccode'];
		$bfname=$_GET['bfirstname'];
		$blname=$_GET['blastname'];
		$badd=$_GET['baddress'];
		$bcountry=$_GET['bcountry'];
		$bstate=$_GET['bstate'];
		$bcity=$_GET['bcity'];
		$bzip=$_GET['bzip'];
		$bphone=$_GET['bphone'];
		$sfname=$_GET['sfirstname'];
		$slname=$_GET['slastname'];
		$sadd=$_GET['saddress'];
		$scountry=$_GET['scountry'];
		$sstate=$_GET['sstate'];
		$scity=$_GET['scity'];
		$szip=$_GET['szip'];
		$sphone=$_GET['sphone'];
		$ref=$_GET['your-message'];
		$cardnumber=$_GET['cardnumber'];
		$expdate=$_GET['expdate'];
		
$query="insert into auth_customerinfo values(NULL,'".$paysite."','".$toemail."','".$fromemail."',".$amount.",'".$currency."','".$bfname."','".$blname."','".$badd."','".$bcountry."','".$bstate."','".$bcity."',".$bzip.",'".$bphone."','".$sfname."','".$slname."','".$sadd."','".$scountry."','".$sstate."','".$scity."',".$szip.",'".$sphone."','".$ref."')";
		mysql_query($query);
		
			$id=mysql_insert_id();
		$squery="insert into auth_dir_confirm(mar_id,status,transactionid) values(".$id.",'pending','')";
		mysql_query($squery);
		$id=mysql_insert_id();
		
	
}
?>

<!--
This sample code is designed to connect to Authorize.net using the AIM method.
For API documentation or additional sample code, please visit:
http://developer.authorize.net
-->

<?PHP
$query="SELECT * FROM  transactiondetail";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
$api_login_id=$row['api_login_id'];
$transaction_key=$row['transaction_key'];
// By default, this sample code is designed to post to our test server for
// developer accounts: https://test.authorize.net/gateway/transact.dll
// for real accounts (even in test mode), please make sure that you are
// posting to: https://secure.authorize.net/gateway/transact.dll
$post_url = "https://test.authorize.net/gateway/transact.dll";

$post_values = array(
	
	// the API Login ID and Transaction Key must be replaced with valid values
	"x_login"			=> $api_login_id,
	"x_tran_key"		=> $transaction_key,

	"x_version"			=> "3.1",
	"x_delim_data"		=> "TRUE",
	"x_delim_char"		=> "|",
	"x_relay_response"	=> "FALSE",

	"x_type"			=> "AUTH_CAPTURE",
	"x_method"			=> "CC",
	"x_card_num"		=> $cardnumber,
	"x_exp_date"		=> $expdate,

	"x_amount"			=> $amount,
	"x_description"		=> $ref,

	"x_first_name"		=> $bfname,
	"x_last_name"		=> $blname,
	"x_address"			=> $badd,
	"x_state"			=> $bstate,
	"x_zip"				=> $bzip
	// Additional fields can be added here as outlined in the AIM integration
	// guide at: http://developer.authorize.net
);

// This section takes the input fields and converts them to the proper format
// for an http post.  For example: "x_login=username&x_tran_key=a1B2c3D4"
$post_string = "";

foreach( $post_values as $key => $value )
	{ $post_string .= "$key=" . urlencode( $value ) . "&"; }
$post_string = rtrim( $post_string, "& " );

// The following section provides an example of how to add line item details to
// the post string.  Because line items may consist of multiple values with the
// same key/name, they cannot be simply added into the above array.
//
// This section is commented out by default.
/*
$line_items = array(
	"item1<|>golf balls<|><|>2<|>18.95<|>Y",
	"item2<|>golf bag<|>Wilson golf carry bag, red<|>1<|>39.99<|>Y",
	"item3<|>book<|>Golf for Dummies<|>1<|>21.99<|>Y");
	
foreach( $line_items as $value )
	{ $post_string .= "&x_line_item=" . urlencode( $value ); }
*/

// This sample code uses the CURL library for php to establish a connection,
// submit the post, and record the response.
// If you receive an error, you may want to ensure that you have the curl
// library enabled in your php configuration

	
    $request = curl_init($post_url); // initiate curl object
	curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
	curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
	curl_setopt($request, CURLOPT_POSTFIELDS, $post_string); // use HTTP POST to send form data
	curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment this line if you get no gateway response.
	$post_response = curl_exec($request); // execute curl post and store results in $post_response
	// additional options may be required depending upon your server configuration
	// you can find documentation on curl options at http://www.php.net/curl_setopt
curl_close ($request); // close curl object

// This line takes the response and breaks it into an array using the specified delimiting character
//print_r($post_response);
$response_array = explode($post_values["x_delim_char"],$post_response);
//echo $response_array[0];
// The results are output to the screen in the form of an html numbered list.
echo "<table border=5>";
foreach ($response_array as $value)
{
	//echo "<tr><td>" . $value . "</td></tr>";
}
echo $response_array[3];

//echo "</table>";
// individual elements of the array could be accessed to read certain response
// fields.  For example, response_array[0] would return the Response Code,
// response_array[2] would return the Response Reason Code.
// for a list of response fields, please review the AIM Implementation Guide

if(isset($response_array[6]))
{
	$squery="update auth_dir_confirm set status='Confirm',transactionid='".$response_array[6]."' where confirmid=".$id;
		mysql_query($squery);
}
?>




