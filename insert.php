<?php session_start();
   error_reporting(E_ALL);
ini_set("display_errors", 1);
      include("dbconnect.php");
	  // $db = "SELECT DB_NAME() AS [Current Database]; ";
	  // $database = mysqli_query($sql,$db);
	  // var_dump($_SESSION['dbname']);exit;
      $uid=$_SESSION['uid'];     
      $suid=$_SESSION['said'];
              
        if(isset($_REQUEST["save_dept"]))
        {
           $query="INSERT INTO `adddepartment`(`deptid`,`deptname`,`depttimestamp`,`uid`,`superadminid`)
                    VALUES (NULL , '".$_REQUEST["txtdept"]."',CURRENT_TIMESTAMP , '$uid', '$suid')";
            mysqli_query($sql,$query);
            header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/dept_save/department_add");
        }
        
         if(isset($_REQUEST["save_title"]))
        {		
			$selectlid = "select * from tbl_questionnair where qid =".$_REQUEST['select2'];		
			$res = mysqli_query($sql,$selectlid) or die(mysqli_error($sql));
			while($rows = mysqli_fetch_array($res))
			{
				$lid = $rows['lid'];	
			}

				
			$query="insert into  tbl_questionnair(`qid`,`title`,`uid`,`lid`,`superadminid`,`timestamp`,`status`)
							values( '','".$_REQUEST["txttitle"]."', '$uid','$lid', '$suid', CURRENT_TIMESTAMP,'0')";                          
            mysqli_query($sql,$query) or die(mysqli_error($sql));
            $last_id=mysqli_insert_id($sql) ;  
		          
			$query2="INSERT INTO `tbl_questionanswer`(`qid`,`checkitem`,`description`,`uid`,`timestamp`,`superadminid`,`queid`)
                select $last_id,checkitem,description,uid,timestamp,superadminid,queid from tbl_questionanswer 
                where qid=".$_REQUEST['select2'];
			
			//mysqli_query($sql,$query2) or die(mysqli_error($sql));
			$inserted = mysqli_query($sql,$query2) or die(mysqli_error($sql));
			
			$inserted_no =  mysqli_affected_rows($sql);
			
			if($inserted_no < 25)
			{	
			 
				$delete_query = "Delete tbl_questionnair, tbl_questionanswer from tbl_questionnair join tbl_questionanswer on tbl_questionanswer.qid = tbl_questionnair.qid where tbl_questionnair.qid = $last_id";
			
				mysqli_query($sql,$delete_query) or die(mysqli_error($sql));
				
				header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/questionnair_save/manage_questionnary?msg=no_data");
			}
			else
			{
				header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/questionnair_save/manage_questionnary");
			}
        }        
        
        if(isset($_REQUEST["cmd_go"]))
        {
		 
             $query="select * from tbl_settings where `key`='chart_default' and `uid` ='$uid' ";
        		 $result=mysqli_query($sql,$query) or die(mysqli_error($sql));
                 $no=  mysqli_num_rows($result);
                    if($no > 0)
                    {         
                   $query1="UPDATE `tbl_settings` SET `value` ='".$_REQUEST["drptemp"].",".$_REQUEST["drpdept"].",".$_REQUEST["drpyear"]."'
                        where  uid=$uid and `key`='chart_default'";                                    
               mysqli_query($sql,$query1) or die(mysqli_error($sql));                              
               header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/chart_update/settings");
                    }
            else
            {                             
              $query1="INSERT INTO `tbl_settings`(`sid`,`key`,`value`,`superadminid`,`uid`) VALUES (NULL,'chart_default','".$_REQUEST["drptemp"].",".$_REQUEST["drpdept"].",".$_REQUEST["drpyear"]."',$suid,$uid)";                 
                mysqli_query($sql,$query1) or die(mysqli_error($sql));               
              header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/chart_save/settings");
            }            
        }
        
        if(isset($_REQUEST["cmd_set"]))
        {
                   $query1="UPDATE `tbl_settings` SET `value` ='".$_REQUEST["drplang"]."'
                        where `superadminid` ='$suid' and uid=$uid and `key`='default_language'";                       
                        mysqli_query($sql,$query1) or die(mysqli_error($sql));               
                       header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/lang_update/settings"); 
        }
	
		 if(isset($_REQUEST['cmdsetlangquestion']))
        {
                     $query1="UPDATE `tbl_settings` SET `value` = '".$_REQUEST["drplang1"]."' where  uid=$uid and `superadminid` =$suid and `key`='default_language_question'";                       
                         mysqli_query($sql,$query1) or die(mysqli_error($sql));               
                         header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/lang_question_update/settings");		
		}
		
        if(isset($_REQUEST["edit_dept"]))
        {              
             $id=$_SESSION["did"]; 
             $query="UPDATE `adddepartment` SET `deptname` = '".$_REQUEST["txtdept"]."' where `deptid` = '$id' ";      
            mysqli_query($sql,$query);
              header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/dept_update/department_add");               
      }
	  
      if(isset($_REQUEST["edit_audit"]))
        {  
 mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));
       $query="UPDATE tbl_questionanswer SET checkitem = '".addslashes($_REQUEST["txtcheckitem"])."',
			  		description = '".addslashes($_REQUEST["txtdesc"])."' WHERE `qaid` = ".$_REQUEST["txtid"]." ";   
            mysqli_query($sql,$query) or die(mysqli_error($sql));	
			
			$sqlupdatelang = "UPDATE tbl_questionnair SET `modified_date` = CURRENT_TIMESTAMP WHERE `qid` = ".$_REQUEST["txtqid"]."";
			 mysqli_query($sql,$sqlupdatelang) or die(mysqli_error($sql)); 
		header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/".$_REQUEST["txtqid"]."/question_update/view_questionnary");                
      }
	  
	  
	  
	if(isset($_REQUEST['cmddownloadbackupmedium']))  
	{
		 $sql1=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
		 
	 
		$currentmonth = date("m");
		$selectedmonth = $_REQUEST['drpmonth'];
		if($currentmonth >= $selectedmonth)
		{
			$resyear = date("Y");
		}
		else
		{
			$resyear = date("Y",strtotime("-1 year"));
		}
	

		$query_dt = "select  * from tbl_dbbackup where uid = $uid and btype = '5s' and  MONTH(bdate) ='".$_REQUEST['drpmonth']."' and
		YEAR(bdate) ='".$resyear."'";
		$recordset = mysqli_query($sql1,$query_dt) or die(mysqli_error($sql1));
		$num = mysqli_num_rows($recordset);
		
			if($num == 0)
			{
				header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/notexist/settings"); 
			}
			else
			{
		while($row = mysqli_fetch_array($recordset))
		{
			$file_path = $row['file_path'];		
		}
		header("Pragma: public");
		header("Cache-Control: private",false); 
		header("Expires: 0");
		header('Content-Encoding: UTF-8');
		header('Content-type: text/sql; charset=UTF-8');
		header("Content-type: application/sql");
		header("Content-Disposition: attachment; filename=$file_path;");
		header("Content-Length: ".filesize($file_path));
	readfile("$file_path");
exit();	
			}
mysqli_close($sql1) or die(mysqli_error($sql1));
	}
		if(isset($_REQUEST['cmddownloadbackuplarge']))
		{
			
			 $sql1=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
	 
			$dt = date("Y-m-d", strtotime($_REQUEST['txtdate']));
			
			$query_date = "select  * from tbl_dbbackup where uid = $uid and btype = '5s' and  bdate = '$dt'";
			$recordset1 = mysqli_query($sql1,$query_date) or die(mysqli_error($sql1));
			$num1 = mysqli_num_rows($recordset1);
			if($num1 == 0)
			{
				header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/notexist/settings");
			}
			else
			{
			while($r = mysqli_fetch_array($recordset1))
			{
					$file_path = $r['file_path'];		
			}
			
		header("Pragma: public");
		header("Cache-Control: private",false); 
		header("Expires: 0");
		header('Content-Encoding: UTF-8');
		header('Content-type: text/sql; charset=UTF-8');
		header("Content-type: application/sql");
		header("Content-Disposition: attachment; filename=$file_path;");
		header("Content-Length: ".filesize($file_path));
		readfile("$file_path");
exit();	
			}
			mysqli_close($sql1) or die(mysqli_error($sql1));
		}
		
		
			  
	
	  
if(isset($_REQUEST['cmdcreatecsvtab']) ) 
{
	 $random_name=date(mktime());
	 $filename= $random_name."Search_Export.tsv";
	 $path = "csv_file/".$filename;			  

$sd = date("Y-m-d", strtotime($_REQUEST['txtstartdate']));
$ed = date("Y-m-d", strtotime($_REQUEST['txtenddate']));
$query = "SELECT * FROM  tbl_project  where pdate  >= '".$sd."' and  pdate<='".$ed."' and status = '1'
and superadminid ='".$_SESSION['said']."' ";
$result = mysqli_query($sql,$query) or die(mysqli_error($sql));
$no = mysqli_num_rows($result);
if($no == 0)
{
	header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/no_record/report"); 
}
else
{
header('Content-Encoding: UTF-8');
header('Content-type: text/xls; charset=UTF-8');
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$path");
header("Pragma: no-cache");
header("Expires: 0");
$fp = fopen($path,'w');
$titlehead =  "NO\tCHECK ITEM\tDESCRIPTION\tSCORE \n";
fwrite($fp,$titlehead);
while($row = mysqli_fetch_array($result))
{
$notess = $row['notes'];
$auditedby = $row['auditedby'];
$proid = $row['pid'];
$queid = $row['qid'];
mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));
$sql_qa = "SELECT q.`checkitem`,q.`description`,a.queid , a.answer FROM `tbl_questionanswer` as q, tbl_project_review as a where a.`qid` = q.`qid` 
					and a.`queid` = q.`queid`  and a.pid=".$proid;
					addslashes($sql_qa);
	$rs = mysqli_query($sql,$sql_qa) or die(mysqli_error($sql));
	$titleaudit = "\nAudit\n";
	fwrite($fp,$titleaudit);
		while($r = mysqli_fetch_array($rs))
		{
			$checkitem = $r['checkitem'];
			$desc = $r['description'];
			$score = $r['answer'];
			$queid = $r['queid'];
			$c_i = addslashes($checkitem);
			$de = addslashes($desc);
			$titleArray = $queid."\t".$checkitem. "\t". $desc. "\t". $score. " \n";
			fwrite($fp,$titleArray);	
		}
		$titlenote = "Notes:"."\t".$notess."\t"."Audited By:"."\t".$auditedby."\n";
		fwrite($fp,$titlenote);	
}
fclose($fp);
readfile($path);

}
unlink($path);
}   
	  
if(isset($_REQUEST['cmdcreatecsvpipe'])) 
{
	 $random_name=date(mktime());
	 $filename= $random_name."Search_Export.csv";
	 $path = "csv_file/".$filename;			  

$sd = date("Y-m-d", strtotime($_REQUEST['txtstartdate']));
$ed = date("Y-m-d", strtotime($_REQUEST['txtenddate']));
$query = "SELECT * FROM  tbl_project  where pdate  >= '".$sd."' and  pdate<='".$ed."' and status = '1'
and superadminid ='".$_SESSION['said']."' ";
$result = mysqli_query($sql,$query) or die(mysqli_error($sql));
$no = mysqli_num_rows($result);
if($no == 0)
{
	header("location:".$_SESSION['dname']."/".$_SESSION['uname']."/no_record/report"); 
}
else
{
header('Content-Encoding: UTF-8');
header('Content-type: text/xls; charset=UTF-8');
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$path");
header("Pragma: no-cache");
header("Expires: 0");
$fp = fopen($path,'w');
$titlehead =  "NO|CHECK ITEM|DESCRIPTION|SCORE \n";
fwrite($fp,$titlehead);
while($row = mysqli_fetch_array($result))
{
$notess = $row['notes'];
$auditedby = $row['auditedby'];
$proid = $row['pid'];
$queid = $row['qid'];
mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));
$sql_qa = "SELECT q.`checkitem`,q.`description`,a.queid , a.answer FROM `tbl_questionanswer` as q, tbl_project_review as a where a.`qid` = q.`qid` 
					and a.`queid` = q.`queid`  and a.pid=".$proid;
					addslashes($sql_qa);
	$rs = mysqli_query($sql,$sql_qa) or die(mysqli_error($sql));
	$titleaudit = "\nAudit\n";
	fwrite($fp,$titleaudit);
		while($r = mysqli_fetch_array($rs))
		{
			$checkitem = $r['checkitem'];
			$desc = $r['description'];
			$score = $r['answer'];
			$queid = $r['queid'];
			$c_i = addslashes($checkitem);
			$de = addslashes($desc);
			$titleArray = $queid."|".$c_i."|".$de."|".$score."\n";
			fwrite($fp,$titleArray);
		}
		$titlenote = "Notes:"."|".$notess."|"."Audited By:"."|".$auditedby."\n";
	 	fwrite($fp,$titlenote);	
}
fclose($fp);
readfile($path);

}
unlink($path);
} 
      
if(isset($_REQUEST['cmdimport']))
{
	  $t = $_REQUEST['drptemp1'];
	  $d = $_REQUEST['drpdept1'];
    $f = $_FILES['importcsv']['name'];
    $path = "csv_file/".$f;  
  move_uploaded_file($_FILES ['importcsv']['tmp_name'], $path);              
  $sqltemp = "select * from addtemplate where tempid = ".$t;
  $rstemp = mysqli_query($sql,$sqltemp) or die(mysqli_error($sql));
	  while($row = mysqli_fetch_array($rstemp))
	  {
	  	$templatename = $row['tempname'];
		$auditorcname = $row['auditorcname'];
		$auditorclogo = $row['auditorclogo'];
		$clientcname = $row['clientcname'];
		$clientclogo = $row['clientclogo'];
		$temptype =$row['temptype'];
		$userid = $row['uid'];
		$superadminid = $row['superadminid'];
	  }
	  $sqldept = "select * from adddepartment where deptid = ".$d;
	  $rsdept = mysqli_query($sql,$sqldept) or die(mysqli_error($sql));
	  while($row = mysqli_fetch_array($rsdept))
	  {
	  $departmentname = $row['deptname'];
	  }
	$ext = end(explode('.', $f));  
if($ext == 'csv')
{	  
$file_handle = fopen($path, "r") or die("can't open file".mysqli_error($sql));
	while (!feof($file_handle) ) 
	{
	$line_of_text = fgetcsv($file_handle, 1024, "|");
	//$record = $line_of_text[0] . $line_of_text[1].$line_of_text[2] .$line_of_text[3] . "<BR>";
	$checkfirst =  $line_of_text[0];
	if($checkfirst == 'NO')
	{
	}
	if($checkfirst == 'Audit')
	{
            $dt = date("Y-m-d");
			mysqli_query($sql,'set names "utf8"');
	 $sql_insert = "INSERT INTO `tbl_project` (`pid`, `tempid`, `tempname`, `deptid`, 
            `deptname`, `qid`, `title`, `pdate`,`auditorcname`, `auditorclogo`, `clientcname`, 
            `clientclogo`, `temptype`, `uid`, `superadminid`, `status`,`status_progress`)
            VALUES ('', '$t', '".$templatename."', '".$d."', '".$departmentname."', '1', '5s audit',            
'".$dt."', '".$auditorcname."', '".$auditorclogo."', '".$clientcname."', '".$clientclogo."', 
    '".$temptype."', '".$userid."', '".$superadminid."', '1', '1')";
	mysqli_query($sql,$sql_insert) or die(mysqli_error());
	$pid = mysqli_insert_id();
	}
	if( $checkfirst >= '1' && $checkfirst <= '25' )
	{
		$answer = $line_of_text[3];
		mysqli_query($sql,'set names "utf8"');
 $sqlq= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, 
            `status`, `uid`, `TIMESTAMP`,`superadminid`) VALUES ('', '".$pid."', '1', 
                '".$checkfirst."', '".$answer."','In Progress', 
'".$userid."', CURRENT_TIMESTAMP,'".$superadminid."')";
	mysqli_query($sql,$sqlq) or die(mysqli_error($sql));			
	}
	if($checkfirst == 'Notes:')
	{
		$answer = $line_of_text[3];
		$notes =  $line_of_text[1];
		$sql_update = "update tbl_project set notes = '".$notes."',auditedby = '".$answer."' where pid = ".$pid."";
		mysqli_query($sql,$sql_update) or die(mysqli_error($sql));
	}
	}
	fclose($file_handle);
	unlink($path);
        header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/imported/settings");  
}	
if($ext == 'tsv')
{	  
$file_handle = fopen($path, "r") or die("can't open file".mysqli_error($sql));
	while (!feof($file_handle) ) 
	{
	$line_of_text = fgetcsv($file_handle, 1024, "\t");
	//$record = $line_of_text[0] . $line_of_text[1].$line_of_text[2] .$line_of_text[3] . "<BR>";
	$checkfirst =  $line_of_text[0];
	if($checkfirst == 'NO')
	{
	}
	if($checkfirst == 'Audit')
	{
            $dt = date("Y-m-d");
			mysqli_query($sql,'set names "utf8"');
	 $sql_insert = "INSERT INTO `tbl_project` (`pid`, `tempid`, `tempname`, `deptid`, 
            `deptname`, `qid`, `title`, `pdate`,`auditorcname`, `auditorclogo`, `clientcname`, 
            `clientclogo`, `temptype`, `uid`, `superadminid`, `status`,`status_progress`)
            VALUES ('', '$t', '".$templatename."', '".$d."', '".$departmentname."', '1', '5s audit',            
'".$dt."', '".$auditorcname."', '".$auditorclogo."', '".$clientcname."', '".$clientclogo."', 
    '".$temptype."', '".$userid."', '".$superadminid."', '1', '1')";
	mysqli_query($sql,$sql_insert) or die(mysqli_error($sql));
	$pid = mysqli_insert_id($sql);
	}
	if( $checkfirst >= '1' && $checkfirst <= '25' )
	{
		$answer = $line_of_text[3];
		mysqli_query($sql,'set names "utf8"');
 $sqlq= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, 
            `status`, `uid`, `TIMESTAMP`,`superadminid`) VALUES ('', '".$pid."', '1', 
                '".$checkfirst."', '".$answer."','In Progress', 
'".$userid."', CURRENT_TIMESTAMP,'".$superadminid."')";
	mysqli_query($sql,$sqlq) or die(mysqli_error($sql));			
	}
	if($checkfirst == 'Notes:')
	{
		$answer = $line_of_text[3];
		$notes =  $line_of_text[1];
		$sql_update = "update tbl_project set notes = '".$notes."',auditedby = '".$answer."' where pid = ".$pid."";
		mysqli_query($sql,$sql_update) or die(mysqli_error($sql));
	}
	}
	fclose($file_handle);
	unlink($path);
        header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/imported/settings");  
}
  
if($ext != 'csv' && $ext != 'tsv')
 {
      unlink($path);
      header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/errmsg/settings");
}



}  
?>