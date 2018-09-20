<?php
    $medai_type =$_REQUEST['mType'];

    $filepath = "./";
          
    $filepath = $filepath.date('Y')."/".date('m');
    if (!file_exists($filepath)) {
        mkdir($filepath, 0777, true);
    }
    
    // $file_path = "uploads/images/";
    
    // $fileurlpath ='/NiftyChat/uploads/images/';
//echo $fileurlpath;
 
    $name = $_FILES["uploaded_file"]["name"];
		$ext = end((explode(".", $name)));
    $ufilename = $_REQUEST['fname']."_".time().".".$ext;
     $filepath = $filepath ."/". $ufilename;
    
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $filepath))
    {
        $url= "http://".$_SERVER['HTTP_HOST']."/NiftyChat/".$filepath;
        print_r(json_encode(array(array('url'=>$url,'mID'=>$_REQUEST['mID']))));
    }
    else
    {
        echo 0;
    }
	
 ?>