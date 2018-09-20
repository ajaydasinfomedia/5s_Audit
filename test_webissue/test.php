<?php
    ini_set('display_errors', 1);

    ini_set('error_reporting', E_ALL);
echo "hi";
    sdfdsf
    exit();
    /*-
    require_once("dbconnect.php");
    $uid=$_REQUEST['said'];
    $stepid=$_REQUEST['stepid'];
    $date=date('Y-m-d H:i:s');
    $date=time();
    
    
    //$path = "../wi_uploaded_images/".$uid;
    if(!file_exists("../wi_uploaded_images/".$uid))
    {
        mkdir("../wi_uploaded_images/".$uid);
        mkdir("../wi_uploaded_images/".$uid."/".$stepid);
        mkdir("../wi_uploaded_images/".$uid."/".$stepid."/thumb");
        mkdir("../wi_uploaded_images/".$uid."/".$stepid."/original");
        mkdir("../wi_uploaded_images/".$uid."/".$stepid."/edit");
        
    }
    else if(!file_exists("../wi_uploaded_images/".$uid."/".$stepid))
    {
        mkdir("../wi_uploaded_images/".$uid."/".$stepid);
        mkdir("../wi_uploaded_images/".$uid."/".$stepid."/thumb");
        mkdir("../wi_uploaded_images/".$uid."/".$stepid."/original");
        mkdir("../wi_uploaded_images/".$uid."/".$stepid."/edit");
    }
    
    echo $path_original = "../wi_uploaded_images/".$uid."/".$stepid."/original";
    $path_thumb = "../wi_uploaded_images/".$uid."/".$stepid."/thumb";
    $path_edit = "../wi_uploaded_images/".$uid."/".$stepid."/edit";
    
    echo "hello";
    $file_name = $date;
    exit();
    var_dump($_FILES);
    exit();
   echo $file = basename($_FILES['userfile1']['name']);
    
    echo $ext=explode(".",$file);
    $newname = $file_name.".".$ext[count($ext)-1];
    $uploadfile = $path_original . $newname;
    $storefile=$path_original . $newname;
   echo $path_thumb = $path_thumb.$newname
    
	if (move_uploaded_file($_FILES['userfile1']['tmp_name'], $uploadfile)) {
     	echo "yes";
        //make_thumb($uploadfile,$path_thumb);
        //upload_image($uploadfile,$uploadfile,$deg);
    }
*/
?>