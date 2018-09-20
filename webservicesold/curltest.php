<?php
$url = 'https://crm.zoho.com/crm/private/xml/Leads/insertRecords';

    $strleads = '<Leads>
    <row no="1">
    <FL val="Lead Source">ISO</FL>
    <FL val="Company">'.$dname.'</FL>
    <FL val="First Name">Hannah</FL>
    <FL val="Last Name">Smith</FL>
    <FL val="Email">testing@testing.com</FL>
    <FL val="Phone">1234567890</FL>
    <FL val="Description">daadasdad</FL>
    </row>
    </Leads>';
    
     $strdata="newFormat=1&authtoken=8e57e7b52ee97bc7e17056321aac34fe&scope=crmapi&xmlData=".$strleads;

//url-ify the data for the POST
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, 4);
curl_setopt($ch,CURLOPT_POSTFIELDS, $strdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); 
//execute post
 curl_exec($ch);

//close connection
curl_close($ch);
 
?>
