<?php

session_start();
include("../dbconnect.php");
if(isset($_REQUEST['cmdsubmit']))
{





/* $paysite=$_POST['paysite'];*/
	$itemname=$_POST['itemname'];
	$quantity=$_POST['quantity'];		
	$unit_price=$_POST['unit_price'];
	 $sub_length=$_POST['sub_length'];
	$time_period='MONTHLY';
	$pay_period_charges=$_POST['pay_period_charges'];
	$your_message=$_POST['your_message'];
	
/*	$_SESSION['femail']=$_POST['txtgemail'];
	$_SESSION['fname']=$_POST['fgname'];
$_SESSION['pwd']=$_POST['txtgpass'];
$_SESSION['disname']= $_POST['txtdisgname'];*/


$_SESSION['no_of_user']=$_POST['userg'];
$_SESSION['price']=$_POST['amountg'];
$_SESSION['no_of_period']=$sub_length;
	
	//echo $_SESSION['femail'];


//echo $pay_period_charges."<br>";
//echo $quantity."<br>";

//$_SESSION['price'] = $unit_price;
$id=1;









//var_dump($_SERVER);
 $parts = pathinfo($_SERVER['HTTP_REFERER']);
$path = $parts ['dirname'];
$path1 = dirname($path);
//$return_path = $path1.'/thank-you.php?msg=yesgoogle';
$notifyurl = $path1.'/listner.php';

	$sql_query="select * from tbl_login where username= '".$_POST['fgname']."' or email = '".$_POST['txtgemail']."'";  
        $result=mysqli_query($sql,$sql_query);
        
        $no=mysqli_num_rows($result);
        if($no > 0)
        {
			header("location:5s/no/recuringpage");
   
        }
		else
		{
		
		
 $sql1="insert into tbl_login (role,displayname,username,email,password,firstname,lastname,createdate,status,payment_status) 				            values('admin','".$_POST['txtdisgname']."', '".$_POST['fgname']."', '".$_POST['txtgemail']."', 
		   '".md5($_POST['txtgpass'])."','".$_POST['txtgfirstname']."','".$_POST['txtglastname']."','".date('Y-m-d')."','0','0')";
	
	

	$rs=mysqli_query($sql,$sql1) or die(mysqli_error($sql));
	$id=mysqli_insert_id($sql);
	
	$_SESSION['id'] = $id;
	
	
?>
<body onLoad="document.forms['Google_recuring_form'].submit()">
<form method="POST" name="Google_recuring_form" action="https://sandbox.google.com/checkout/api/checkout/v2/checkoutForm/Merchant/552718732242728" accept-charset="utf-8">

<input type="hidden" name="shopping-cart.items.item-1.item-name" value="<?php echo $itemname; ?>"/>

<input type="hidden" name="shopping-cart.items.item-1.item-description" value="<?php echo $your_message; ?>"/>

<input type="hidden" name="shopping-cart.items.item-1.unit-price.currency" value="USD"/>

<input type="hidden" name="shopping-cart.items.item-1.unit-price" value="<?php echo $unit_price; ?>"/>

<input type="hidden" name="shopping-cart.items.item-1.quantity" value="<?php echo $quantity; ?>"/>

<input type="hidden" name="shopping-cart.items.item-1.subscription.type" value="google"/>

<input type="hidden" name="shopping-cart.items.item-1.subscription.period" value="<?php echo $time_period; ?>"/>

<input type="hidden" name="shopping-cart.items.item-1.subscription.payments.subscription-payment-1.times" value="<?php echo $sub_length; ?>">

<input type="hidden" name="shopping-cart.items.item-1.subscription.payments.subscription-payment-1.maximum-charge" value="<?php echo $pay_period_charges; ?>">

<input type="hidden" name="shopping-cart.items.item-1.subscription.payments.subscription-payment-1.maximum-charge.currency" value="USD">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.item-name" value="Usage of My Awesome Website for One Month">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.item-description" value="Your flat charge for accessing my website">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.quantity" value="1">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.unit-price" value="<?php echo $pay_period_charges; ?>">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.unit-price.currency" value="USD">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.digital-content.display-disposition" value="OPTIMISTIC">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.digital-content.url" value="http://mywebsite.example.com">

<input type="hidden" name="shopping-cart.items.item-1.subscription.recurrent-item.digital-content.description" value="Head over to the website linked below for pie!">

<input type="hidden" name="shopping-cart.items.item-1.digital-content.display-disposition" value="OPTIMISTIC">

<input type="hidden" name="shopping-cart.items.item-1.digital-content.description"value="Congratulations! Your subscription is being set up. Feel free to log onto &lt;a href='<?php echo $notifyurl; ?>&module=store&amp;show=order_confirm&id=<?php echo $id; ?>'&gt;Go On Your Site&lt;/a&gt;and try it out!">

<input type="hidden" name="shopping-cart.items.item-2.item-name" value="Decoder Ring">

<input type="hidden" name="shopping-cart.items.item-2.item-description" value="One-time charge for the decoder ring you (coincidentally) also ordered from me.">

<input type="hidden" name="shopping-cart.items.item-2.unit-price" value="0.00">

<input type="hidden" name="shopping-cart.items.item-2.unit-price.currency" value="USD">

<input type="hidden" name="shopping-cart.items.item-2.quantity" value="1">

<input type="hidden" name="_charset_"/>
</form>
</body>
 
 
 <?php
}

 }

 ?>