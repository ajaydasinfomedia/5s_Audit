<?PHP 
$path="csv_file/sadas_das_1348123170.csv";
$file_handle = fopen($path, "r");
while (!feof($file_handle) ) 
{
$line_of_text = fgetcsv($file_handle, 1024, "|");
$record = $line_of_text[0] . $line_of_text[1]. $line_of_text[2]  . $line_of_text[3] . "<BR>";
$checkfirst =  $line_of_text[0];
$answer = $line_of_text[3];
$notes =  $line_of_text[1];
$sqlconnect=mysqli_connect("localhost","root","","1_5sdb");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

if($checkfirst == 'NO')
{
}
if($checkfirst == 'Audit')
{
$sql_insert = "INSERT INTO `tbl_project` (`pid`, `tempid`, `tempname`, `deptid`, `deptname`, `qid`, `title`, `pdate`, `auditorcname`, `auditorclogo`, `clientcname`, `clientclogo`, `temptype`, `uid`, `superadminid`, `timestamp`, `status`, `notes`, `auditedby`, `status_progress`, `sync_status`, `tstamp`) VALUES ('', '101', 'ptemplate', '100', 'pdept', '1', '5s audit', '2012-09-19', 'ptechnology', 'sunset.jpg', 'dtechnology', 'winter.jpg', 'c', '101', '101', '', '1', '', '', '1', '1', '1')";
	$rs = mysqli_query($sqlconnect,$sql_insert) or die(mysqli_error($sqlconnect));
	$pid = mysqli_insert_id($sqlconnect);
}
if( $checkfirst >= '1' && $checkfirst <= '25' )
{
$sql= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, `status`, `uid`, `TIMESTAMP`,`superadminid`) VALUES ('', '".$pid."', '1', '".$checkfirst."', '".$answer."','In Progress', 
'101', CURRENT_TIMESTAMP,'101')";
mysqli_query($sqlconnect,$sql) or die(mysqli_error($sqlconnect));			
}
if($checkfirst == 'Notes:')
{
	$sql_update = "update tbl_project set notes = '".$notes."',auditedby = '".$answer."' where pid = ".$pid."";
	mysqli_query($sqlconnect,$sql_update) or die(mysqli_error($sqlconnect));
}
mysqli_close($sqlconnect) or die(mysqli_error());
}
fclose($file_handle);
?>