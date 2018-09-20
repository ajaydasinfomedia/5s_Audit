<?php 
include("database.php");

if(isset($_GET['submit']))
{
		$paysite=$_GET['paysite'];
		$itemname=$_GET['itemname'];
		$quantity=$_GET['quantity'];
		$amount=$_GET['amount'];
		$currency=$_GET['amount_ccode'];
		$ref=$_GET['your-message'];
			$query="insert into tb_directpayment(payprovider,amount,currency,itemname,qty,reference) values('".$paysite."',".$amount.",'".$currency."','".$itemname."',".$quantity.",'".$ref."')";
			mysqli_query($sql,$query);
		$id=mysqli_insert_id($sql);
		//$squery="insert into directpaymentorder(directpayid,status,orderconfirmid) values(".$id.",'pending','')";
		//mysql_query($squery);
?>
<body onLoad="document.forms['BB_BuyButtonForm'].submit()">
<form action="https://sandbox.google.com/checkout/api/checkout/v2/checkoutForm/Merchant/552718732242728" id="BB_BuyButtonForm" method="post" name="BB_BuyButtonForm">
    <input name="item_name_1" type="hidden" value="<?php echo $itemname ?>"/>
    <input name="item_description_1" type="hidden" value="<?php echo $ref ?>"/>
    <input name="item_quantity_1" type="hidden" value="<?php echo $quantity ?>"/>
    <input name="item_price_1" type="hidden" value="<?php echo $amount ?>"/>
    <input name="item_currency_1" type="hidden" value="<?php echo $currency ?>"/>
   
  
<input type="hidden" name="shopping-cart.items.item-1.digital-content.description" value="Congratulations! Your subscription is being set up. Feel free to log onto &lt;a href='http://localhost:8080/MobileEcommerce/site/google_direct_payment.php?module=store&amp;show=order_confirm&id=<?php echo $id ?>'&gt;Go On Your Site&lt;/a&gt;and try it out!">
   <input alt="" src="https://sandbox.google.com/checkout/buttons/buy.gif?merchant_id=552718732242728&amp;w=117&amp;h=48&amp;style=trans&amp;variant=text&amp;loc=en_US" type="image"/>
</form>
</body>
<?php 

//header("location:paypal1.php");
}
?>