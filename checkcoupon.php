<?php
include_once('dbconnect.php');
if(isset($_GET['p']) && isset($_GET['q']))
{
	$sqlcc = "select * from coupon_mgt where coupon_code = '".$_GET["p"]."' ";
	$rscc = mysqli_query($sql,$sqlcc) or die(mysqli_error($sql)); 
	while($row = mysqli_fetch_array($rscc))
	{
		$amtcc = $row['amount'];
		$expdate = $row['validity'];
		$prodtype = $row['prod_type'];
		$amttype = $row['type'];
	}
$val = $_REQUEST['q'];
$amt = substr($val,1 );
//$amt =$val;
	 			 $todays_date = date("Y-m-d");
				 $exp_date = $expdate;
				 $today = strtotime($todays_date); 
				 $expiration_date = strtotime($exp_date);
				 if ($expiration_date > $today && $prodtype == '5s' || $prodtype == 'All') 
				 { 
						if($amttype == 'amount')
						{
							$netamt = $amt - $amtcc ;
						}
						else
						{
							$netamt =$amt - ($amt * ($amtcc * 1 /100));
						}
				 } 
				 else  
				 {
					 $netamt = -1;
				 }
echo $netamt;
}
?>