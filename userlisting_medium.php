<?php include("header.php"); ?>

 <div class="content" style="margin-left:200px;">
    	<div class="title"><h5>Users with Medium Plan</h5></div>
<div class="widget">	

 <div class="head">
<h5 class="iList">Users</h5>
             </div>
 <?php
 include("dbconnect.php");
         $query = "SELECT l.*, lr.dbname as db FROM `tbl_login` as l, tbl_plan as p,tbl_login_relation as lr WHERE p.plan_id=2 and p.uid = l.`uid` and p.active_status = 1 and lr.`uid` = p.uid and lr.uid = l.`uid` and lr.producttype like '5s'
 " ;
		 $rs = mysqli_query($sql,$query) or die(mysqli_error($sql));
 ?>
 <div id="example_wrapper" class="dataTables_wrapper">

    <table class="tableStatic" width="100%" cellspacing="0" cellspadding="0">
            <thead>
                <tr>
                    <td width="100%" >User Listing</td>                                   
                </tr>
			</thead>
	<tbody>
 
<?php	
$currentyear = date("Y");
$yearfolder = "db_backup/".$currentyear."/";
if(!is_dir($yearfolder))
{
	mkdir($yearfolder,0777);
}
	while($row=mysqli_fetch_array($rs))
	{
		$userid = $row['uid']; 
		$dbname = $row['db'];
		$host = 'localhost';
$user = 'phpuse';
$pass = '';
$name =$dbname;
backup_tables($host,$user,$pass,$name,$userid,$yearfolder);
		$username = $row['username'];
		
?>     <tr>     
		<td align="center"><?php echo  $username ?></td>  	         	
	   </tr>	
<?php	

}	
?>
		
		</tbody>
</table>
</div>

        
    </div>
  </div>  
<div class="fix"></div>
    </div>
<?php

	function backup_tables($host,$user,$pass,$name,$userid,$yearfolder,$tables = "*")
		{
			$link = mysqli_connect('localhost','root','');
			mysqli_select_db($link,$name) or die("this".mysqli_error($link));
			//get all of the tables
			if($tables == "*")
			{
				$tables = array();
				$result = mysqli_query($link,"SHOW TABLES") or die(mysqli_error($link));
				while($row = mysqli_fetch_row($result))
				{
					$tables[] = $row[0];
				}
			}
			else
			{
				$tables = is_array($tables) ? $tables : explode(",",$tables);
			}
			//cycle through
			foreach($tables as $table)
			{
				//$return.= 'DROP TABLE '.$table.';';
				mysqli_query($link,'set names "utf8"');
				$row2 = mysqli_fetch_row(mysqli_query($link,"SHOW CREATE TABLE ".$table));
				$return.= "\n\n".$row2[1].";\n\n";
				$result = mysqli_query($link,"SELECT * FROM ".$table);
				$num_fields = mysqli_num_fields($result);
				for ($i = 0; $i < $num_fields; $i++) 
				{
           			 while($row = mysqli_fetch_row($result)) 
					 {
						 mysqli_query($link,'set names "utf8"');
               			 $return.= 'INSERT INTO '.$table.' VALUES(';
               			 for($j=0; $j<$num_fields; $j++)
						  {
                  			  $row[$j] = addslashes($row[$j]);
                    		  $row[$j] = ereg_replace("\n","\\n",$row[$j]);
                    		  if (isset($row[$j])) 
							  {
                        		$return .= '"' . $row[$j] . '"';
                    		  } 
							  else 
							  {
                        		$return .= '""';
                    		  }
                   			 if ($j<($num_fields-1)) 
							 {
                       			 $return.= ',';
                    		 }
               			 }
                		$return.= ");\n";
           		   }
			}
			$return.="\n\n\n";
		}
mysqli_close($link);
			$currentmonth = date("m"); 
			//$currentdate = date("d");
			$uidfolder = $yearfolder.$userid."/";
			$monthfolder = $uidfolder.$currentmonth."/";
			//$datefolder = $monthfolder.$currentdate."/";
			
			
			if(!is_dir($uidfolder))
			{
			mkdir($uidfolder,0777);
			}
			if(!is_dir($monthfolder))
			{
			mkdir($monthfolder,0777);
			}
			/*if(!is_dir($datefolder))
			{
			mkdir($datefolder,0777);
			}*/
			
			
			$sqlFile =$monthfolder.date(mktime())."dbbackup".".sql";
			$dt = date("Y-m-d");
			include("dbconnect.php");
			$sqlquery ="INSERT INTO `tbl_dbbackup` (`id`, `uid`, `file_path`, `bdate`, `btype` ) 
		 				 VALUES('','$userid','".$sqlFile."','$dt','5s')";
			mysqli_query($sql,$sqlquery) or die(mysqli_error($sql));			 
			umask(0);  
			$handle = fopen($sqlFile,"w+")or die("can't open file".mysqli_error($sql));

		
			if(!is_dir($uidfolder))
			{
				mkdir($uidfolder,0777);
				mkdir($monthfolder,0777);
				//mkdir($datefolder,0777);
				fwrite($handle,$return);
			}
			else
			{
						if(!is_dir($monthfolder))
						{
							mkdir($monthfolder,0777);
							//mkdir($datefolder,0777);
							fwrite($handle,$return);
						}
						else
						{
					/*		if(!is_dir($datefolder))
							{
								mkdir($datefolder,0777);
								fwrite($handle,$return);
							}*/
							fwrite($handle,$return);
						}
				
			}
			
		fclose($handle);
	}



include("footer.php");
?>