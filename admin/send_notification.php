<?php
    session_start();
	$sql=mysqli_connect("localhost","root","","notification_center");
	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//$sql=mysql_connect("localhost","root","Bigyear2012") or die(mysql_error());
//mysql_select_db("notification_center",$sql) or die(mysql_error());	


$query = "select * from products where id = ".$_REQUEST['drptitle'];
$rs = mysqli_query($sql,$query) or die(mysqli_error($sql));
while($row = mysqli_fetch_array($rs))
{
	$tblname = $row['table_name'];
	$cert = $row['pn_cert'];
}





 //$apnsHost = 'gateway.sandbox.push.apple.com';
    
    $apnsHost = 'gateway.push.apple.com';
    
    
    
    $apnsPort = 2195;
    $apnsCert = "cert/".$cert;
    //$apnsCert = 'apns-dev-cert.pem';
    
    $deviceToken="7ae892055f71f328a7add43feb4835eb2261c3b507eb528b2bc06fa4653a9d75";
    //$alert_message="this is satish test";
     $alert_message= $_REQUEST['txtmsg'];
    
    $payload['aps'] = array('alert' => $alert_message, 'badge' => 0, 'sound' => 'default');
    
     $payload = json_encode($payload);
    
    
    
    $streamContext = stream_context_create();
    
    
    
     stream_context_set_option($streamContext, 'ssl', 'local_cert', $apnsCert);
    
    //echo stream_context_set_option($streamContext, 'ssl', 'passphrase', '1234');
    
    
    
 echo  $query_token = "select * from $tblname WHERE `status`=1" ;
    
    $result_token = mysqli_query($sql,$query_token) or die(mysqli_error($sql));
    
    while ($row1 = mysqli_fetch_array($result_token)) {
        
        //echo $row['fixtures_matchid']."<hr>";
        
       // echo "<hr>".$row1['token'];
       echo $deviceToken = $row1['token'];
       // $deviceTokenrow1['token'];
        
        

        
     
        
        
        try {
            
           // echo "Trying to open connection";
            
            
            
            $apnsConnection = stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 60, STREAM_CLIENT_CONNECT, $streamContext);
            
            
            
            if ($apnsConnection == false) {
                
                echo "Failed to connect {$error} {$errorString}\n";
                
                print "Failed to connect {$error} {$errorString}\n";
                
                return;
                
            }
            
            
            //echo "construct apnsMessage";
            
            $apnsMessage = chr(0) . chr(0) . chr(32) . pack('H*', str_replace(' ', '', $deviceToken)) . chr(0) . chr(strlen($payload)) . $payload;
            
            echo "Message: $apnsMessage<br />\n";
            
            
            
            fwrite($apnsConnection, $apnsMessage);
            
            $query_update_status = "UPDATE $tblname SET  `status` =  '0' WHERE `id` = ".$row1['id'];
            $result_query_update_status = mysqli_query($sql,$query_update_status);
            
            @socket_close($apnsConnection);
          
            fclose($apnsConnection);
              
        }
        
        catch(Exception $e) {
            
            echo 'Caught exception: '. $e->getMessage(). "\n";
            
        }
        
        
        
        
        
    }
	
  mysqli_close($sql);  
  header("location:admin_notification.php?send");
?>