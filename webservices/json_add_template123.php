<?php
   include("dbconnect.php");     
   if(isset($_REQUEST["superadminid"]))
   {
	 $sid=$_REQUEST["superadminid"];
  	 $sql_query= "select * from tbl_login_relation where uid = '$sid'";
  	 $rs=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
  	 while($row=mysqli_fetch_array($rs))
 	 {
   		$dbname= $row['dbname'];
  	 }
			$sql=mysqli_connect("localhost","root","",$dbname);
       
      $query="select * from addtemplate where superadminid='$sid' ";
        $result=  mysqli_query($sql,$query) or die(mysqli_error($sql));
        $no=  mysqli_num_rows($result);
        if($no=='0')
        {
            //$logs=array("template_id"=>"");           
        }
        else
        {
            while($row=mysqli_fetch_array($result))
            { 
                
	 $folder="own_logo/";	          
         $upload_path =$folder ;
         $alogo = $row["auditorclogo"];
         $clogo=$row["clientclogo"];

$path = $upload_path.$alogo;
$path1= $upload_path.$clogo;

//$path = str_replace("/","",$relative_path);
$hh=$_SERVER['HTTP_HOST'];
$url='http://'.$hh.'/';


if($alogo != '')
{
$path_new = $url.$path;
}
else
{
$path_new = '';
}
if($clogo != '')
{
$path_new1= $url.$path1; 
}
else
{
$path_new1 = '';
}

                $logs[]=array("template_id"=>$row["tempid"],"template_name"=>$row["tempname"],
                "auditor_cname"=>$row["auditorcname"],"auditor_clogo"=>$path_new,"auditorlogo"=>$alogo,
                "client_cname"=>$row["clientcname"],"client_clogo"=>$path_new1,"clientlogo"=>$clogo,
                "template_type"=>$row["temptype"],"modified_date"=>$row["modified_date"],
				"template_timestamp"=>$row["temptimestamp"],
                 "user_id"=>$row["uid"],"super-admin_id"=>$row["superadminid"]);                
            }
        }                
    }
    else
    {
        //$logs=array("template_id"=>0);       
    }
     echo json_encode($logs);
?>