<?php 
session_start();
include("dbconnect.php");
if(isset($_POST['cmdsend']))
{

$to = $_POST['txttoemail'];
     $from =  $_POST['txtemail'];
     $subject =$_POST['txtsub'];
$message = $_POST['txtfield'];
$headers  = "From: $from \r\n";
    $headers .= "Content-type: text/html\r\n";
	$headers .= "Reply-To: sales@niftysol.com \r\n";
   mail($to, $subject, $message, $headers);
header("location:mailsent/mail");
}
?>