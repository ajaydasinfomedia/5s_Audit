<?php
	
	session_start();
	$id=$_SESSION['uid'];
	$superid=$_SESSION['said'];		
	include("dbconnect.php");
	error_reporting(E_ERROR | E_WARNING | E_PARSE);
	$s_query="select `pid` from tbl_project";
	$rs=mysqli_query($sql,$s_query);
	$r=mysqli_fetch_assoc($rs);
	$t_pid=$r['pid'];
	$t_pid = $_REQUEST['txthid'];
	if(isset($_REQUEST["cmdsave"]))//save questionnair
	{	
		
		$i=1;
		for($qaid=1;$qaid<26;$qaid++)
		{		
	
			if(isset($_FILES['img'.$i]['name']))
			{
				 $image=$_FILES['img'.$i];
				 $filepath = '/var/www/html/5s/images/review_image/'.$superid;
				 var_dump($filepath);
					if (!file_exists($filepath)) {
						var_dump("hii");
						mkdir($filepath, 0777, true);
					}
					var_dump($_FILES['img'.$i]['name']);
					$image['name']=time().$i;
					$finalpath=$filepath.'/'.$image;
					 if(move_uploaded_file($_FILES['img'.$i]['tmp_name'], $finalpath))
					{
						var_dump("moe");
						die;
					}	
						
					
					
			}
			var_dump("no move");
			die;
			
			$sqlq= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, `status`, `uid`, `TIMESTAMP`,`superadminid`,`qimage`,`qcomment`) VALUES 
					('', '$t_pid', '".$_SESSION['qid']."', '$qaid', '".$_REQUEST["$i"]."','".$_REQUEST["status1"]."', '$id', CURRENT_TIMESTAMP,'$superid','".$_REQUEST['img'.$i]."','".$_REQUEST['comment'.$i]."')";
	 		$result=mysqli_query($sql,$sqlq);
			if(!$result){echo "could not insert".mysqli_error($sql);}
			
	   		$i++;
			$s="update tbl_project set `notes` = '".trim($_REQUEST["txtnote"])."' where pid='$t_pid'";
			$r=mysqli_query($sql,$s);
			
			if($_REQUEST["status1"] == 'In Progress')
			{
				$s="update tbl_project set `status_progress` = '1' where pid='$t_pid'";
				$r=mysqli_query($sql,$s);
			}
			if($_REQUEST["status1"] == 'Completed')
			{
				$s="update tbl_project set `status_progress` = '0' where pid='$t_pid'";
				$r=mysqli_query($sql,$s);
			}
			header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/"."created/manage_audit");
		}
	}
	if(isset($_REQUEST["cmdupdate"]))//update questionnair
	{
	    $sql_query= " select * from tbl_project_review where pid = '".$_SESSION['pid']."' ";
		$result=mysqli_query($sql,$sql_query);
		$j=1;
		$prid= array();
		while($row=mysqli_fetch_array($result))
		{
		 $prid[$j]=$row['prjid'];
		 $j++;
		}
		if($_REQUEST["txtnote"] != '')
		{
		$s="update tbl_project set `notes` = '".trim($_REQUEST["txtnote"])."' where pid='".$_SESSION['pid']."'";
			$r=mysqli_query($sql,$s);
		}		
		for($i=1;$i<=25;$i++)
		{	
			$s =" update tbl_project_review set answer = '".$_REQUEST["$i"]."', status = '".$_REQUEST["status1"]."' where prjid = '".$prid[$i]."'";
			$result=mysqli_query($sql,$s);
			if(!$result){echo "could not update".mysqli_error($sql);}		
			if($_REQUEST["status1"] == 'In Progress')
			{
				$s="update tbl_project set `status_progress` = '1' where pid='".$_SESSION['pid']."'";
				$r=mysqli_query($sql,$s);
			}
			if($_REQUEST["status1"] == 'Completed')
			{
				$s="update tbl_project set `status_progress` = '0' where pid='".$_SESSION['pid']."'";
				$r=mysqli_query($sql,$s);
			}
			header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/"."updated/manage_audit"); 
	    }	
   }
	unset($_SESSION['qid']);
	unset($_SESSION['deptname']);
	unset($_SESSION['date']);
	unset($_SESSION['aname']);
	unset($_SESSION['pid']);
?>