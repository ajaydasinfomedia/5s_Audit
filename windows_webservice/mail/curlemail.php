<?php
	require_once('class.phpmailer.php');
	$mail = new PHPMailer(); // defaults to using php "mail()"
	$body = $_REQUEST['content'];
	$mail->SetFrom('noreply@niftysol.com', 'Niftysol');
	$mail->AddReplyTo("sales@niftysol.com","Niftysol");
	$mail->Subject = $_REQUEST['subject'];
	$mail->MsgHTML($body);
	$mail->AddAttachment($_REQUEST['pdf']);
	$str = '';
	$pos = strpos($_REQUEST['emails'],',');
	if($pos === FALSE)
	{
		$mail->AddAddress($_REQUEST['emails']);
		$mail->Send();
	}
	else
	{
		$ar = explode(',',$_REQUEST['emails']);
		for($i=0;$i<count($ar);$i++)
		{
			$mail->ClearAddresses();
			$mail->AddAddress($ar[$i]);
			$mail->Send();
		}
	}
?>