<?php

/*var_dump($_REQUEST);
exit;*/
include("dbconnect.php");  
   $suid=$_REQUEST["superadminid"];
   $uid=$_REQUEST["uid"];
   
   $sql_query= "select * from tbl_login_relation where uid = '$suid' and dbname like '%_5sdb%'";
   $rs=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
   while($row=mysqli_fetch_array($rs))
   {
   	$dbname= $row['dbname'];
   }
			$sql=mysqli_connect("localhost","root","",$dbname);
	
$answer = array();
$answer = explode(',',$_REQUEST['answer']);


/* $answer[0]='1';$answer[1]='2';$answer[2]='3';$answer[3]='4';$answer[4]='2';$answer[5]='4';$answer[6]='3';$answer[7]='4';
		 $answer[8]='1';$answer[9]='0';$answer[10]='1';$answer[11]='2';$answer[12]='3';$answer[13]='4';$answer[14]='4';
		 $answer[15]='1';$answer[16]='2';$answer[17]='4';$answer[18]='4';$answer[19]='4';$answer[20]='2';$answer[21]='2';
		 $answer[22]='3';$answer[23]='4';$answer[24]='4';*/
		 
		 
		  
$query="select * from tbl_project_review where pid='".$_REQUEST["pid"]."' ";
        $res=mysqli_query($sql,$query) or die(mysqli_error($sql));
        $no=mysqli_num_rows($res);
		
        if($no != 0 )
		{
            $query="delete from tbl_project_review where pid=".$_REQUEST["pid"]." ";
           $res=mysqli_query($sql,$query) or die(mysqli_error($sql));
        }	
		 $filepath ='/var/www/html/5s/images/review_image/'.$suid;
		 if (!file_exists($filepath)) {
				mkdir($filepath, 0777, true);
			}
			
		 
		//count($answer)
		$image_upload_path=$filepath.'/';
		
		$sql_data_name_str="SELECT * FROM `tbl_project_review`";
	$get_result=mysqli_query($sql,$sql_data_name_str);
	$fieldinfo=mysqli_fetch_fields($get_result);
	$all_field=array();
	 foreach ($fieldinfo as $val){
		$all_field[]=$val->name;
    }
	$flag=0;
	if(in_array('qimage',$all_field) && in_array('qcomment',$all_field)){
		$flag=1;
	}else{
		$flag=0;
	}

for($i=1;$i<=25;$i++)
{
	$j= $i-1;
 if($flag == 1){
			if(isset($_REQUEST["comment_$i"])){$comment_store=$_REQUEST["comment_$i"];}else{$comment_store=null;}
			if(isset($_FILES["userfile_$i"]["name"])){$path_parts = pathinfo($_FILES["userfile_$i"]["name"]);
			$photo_name = time().'_'.$i.'.'.$path_parts['extension'];
			$database_name='images/review_image/'.$suid.'/'.$photo_name;
							 move_uploaded_file($_FILES["userfile_$i"]["tmp_name"],$image_upload_path.$photo_name);			
				}else{$database_name=null;}
 $sqlq= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, `status`, `uid`, `TIMESTAMP`,`superadminid`,`qimage`,`qcomment`) 
 VALUES ('', '".$_REQUEST['pid']."', '".$_REQUEST['qid']."', '$i', '".$answer[$j]."','".$_REQUEST['status']."', 
'$uid', CURRENT_TIMESTAMP,'$suid','$database_name','$comment_store')";
		}else if($flag == 0){
			$sqlq= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, `status`, `uid`, `TIMESTAMP`,`superadminid`) 
 VALUES ('', '".$_REQUEST['pid']."', '".$_REQUEST['qid']."', '$i', '".$answer[$j]."','".$_REQUEST['status']."', 
'$uid', CURRENT_TIMESTAMP,'$suid')";
		}
mysqli_query($sql,$sqlq) or die(mysqli_error($sql));			
}		 		  
?>