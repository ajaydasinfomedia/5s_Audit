<?php
include('mpdf/mpdf.php');
include('fpdf.php');
$mpdf=new mPDF('utf-8', 'Letter','10','dejavusans',0,0,0.01,0.01,0,0);
$mpdf->SetDisplayMode('default');
$mpdf->SetAutoFont(AUTOFONT_ALL);

$html = $_REQUEST['html'];
$mpdf->WriteHTML($html);
$dir=  "pdf/5s/";                       
$name_of_pdf =$dir.$_REQUEST['file'].'.pdf';
echo 'path=>'.'http://5s.niftysol.com/windows_webservice/'.$name_of_pdf; 
if(file_exists($name_of_pdf))
{
	//delete and recreate it
	unlink($name_of_pdf);
	$mpdf->Output($name_of_pdf,'F');
}
else
{
	$mpdf->Output($name_of_pdf,'F');
}
$mpdf->PrintBodyBackgrounds();
$pdf = $_SERVER["DOCUMENT_ROOT"].'/windows_webservice/'.$name_of_pdf;
$url = 'http://5s.niftysol.com/windows_webservice/mail/curlemail.php';
$strdata="emails=".$_REQUEST['email']."&content=Please Find Attached Pdf Report&subject=Your 5s Audit Report&pdf=".$pdf;
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch,CURLOPT_POST, 4);
curl_setopt($ch,CURLOPT_POSTFIELDS, $strdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
$result = curl_exec($ch);
curl_close($ch);
?>