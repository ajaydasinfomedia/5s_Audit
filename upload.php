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
	
	if($_SESSION['check'] == 0)
	{
		if(isset($_REQUEST["cmdupdate"]))//update questionnair
		{
			
			$sql_query= " select * from tbl_project_review where pid = '".$_SESSION['pid']."' ";
			$result=mysqli_query($sql,$sql_query);
			$j=1;
			$prid= array();
			$images= array();
			
			while($row=mysqli_fetch_array($result))
			{
				 $prid[$j]=$row['prjid'];
				 $images[$j]=$row['qimage'];
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
				//var_dump($s);die;
				$result=mysqli_query($sql,$s);
				if(!$result){echo "could not update".mysqli_error($sql);}		
				if($_REQUEST["status1"] == 'In_Progress')
				{
					$s="update tbl_project set `status_progress` = '1' where pid='".$_SESSION['pid']."'";
					$r=mysqli_query($sql,$s);
				}
				if($_REQUEST["status1"] == 'Completed')
				{
					$s="update tbl_project set `status_progress` = '0' where pid='".$_SESSION['pid']."'";
					$r=mysqli_query($sql,$s);
				}
			
			}	
			//header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/"."updated/manage_audit");
			echo "1";	
			exit;
		}
  
	   else
	   {
			//var_dump($_FILES);
			$sql_query= " select * from tbl_project_review where pid = '".$_SESSION['pid']."' ";
			$result=mysqli_query($sql,$sql_query);
			$j=1;
			$prid= array();
			$images= array();
			while($row=mysqli_fetch_array($result))
			{
			 $prid[$j]=$row['prjid'];
			 $images[$j]=$row['qimage'];
			 $j++;
			}
				
				$i=$_REQUEST['oldimg'];
				
				if($_FILES['img'.$i]['name'] != "") 
				{	
					$old[]=$i;
					//var_dump($old);
					//var_dump($i."check");
					$parts = pathinfo($_FILES['img'.$i]['name']);
					$image=$_FILES['img'.$i];
					 $filepath = '/var/www/html/5s/images/review_image/'.$superid;
					 
					// var_dump($filepath);
						if (!file_exists($filepath)) {
							
							mkdir($filepath, 0777, true);
						}
						//var_dump($_FILES['img'.$i]['name']);
						$image['name']=time().$i.'.'.$parts['extension'];
						$ext = strtolower($parts['extension']);
						$valid_ext = array("gif", "png", "jpg", "jpeg","dwg");
						if(in_array($ext, $valid_ext))
						{
						$finalpath=$filepath.'/'.$image['name'];
						$dbpath='images/review_image/'.$superid.'/'.$image['name'];
						 if(move_uploaded_file($_FILES['img'.$i]['tmp_name'], $finalpath))
						{
							//var_dump("moe");
							//die;
						}	
						}	 
						
				}
				else
				{
					$dbpath=$images[$i];
				}
				$s =" update tbl_project_review set answer = '".$_REQUEST["$i"]."', qcomment = '".$_REQUEST['comment'.$i]."', qimage = '".$dbpath."', status = '".$_REQUEST["status1"]."' where prjid = '".$prid[$i]."'";
				
				//var_dump($s);die;
				$result=mysqli_query($sql,$s);
				if(!$result){echo "could not update".mysqli_error($sql);}		
				if($_REQUEST["status1"] == 'In_Progress')
				{
					$s="update tbl_project set `status_progress` = '1' where pid='".$_SESSION['pid']."'";
					$r=mysqli_query($sql,$s);
				}
				if($_REQUEST["status1"] == 'Completed')
				{
					$s="update tbl_project set `status_progress` = '0' where pid='".$_SESSION['pid']."'";
					$r=mysqli_query($sql,$s);
				}
				echo "save comment";
			exit();
		}		
	}
	
	if($_SESSION['check'] == 1)//save questionnair
	{
		
			if($_SESSION['firsttime'] == 0)
			{
				$arrayjid =array();
				for($k=1;$k<26;$k++)
				{
				$sqlq= "INSERT INTO `tbl_project_review` (`prjid`, `pid`, `qid`, `queid`, `answer`, `status`, `uid`, `TIMESTAMP`,`superadminid`) VALUES 
					('', '$t_pid', '".$_SESSION['qid']."', '$k', 0,'In_Progress', '$id', CURRENT_TIMESTAMP,'$superid')";
				$result=mysqli_query($sql,$sqlq);
				$arrayjid[$k]=mysqli_insert_id($sql);
				
				//var_dump($result);
				
				//echo "session";
				//var_dump($_SESSION['qid']);
				if(!$result){echo "could not insert".mysqli_error($sql);}
				}
				
				$_SESSION['arrayjid']=$arrayjid;
				$str_explode = explode('/',$_SERVER['REQUEST_URI']);
				$count=count($str_explode);
				$pid = $str_explode[$count-4];	
				$sql_query= " select * from tbl_project_review where pid = '".$pid."'  
				and superadminid= '".$_SESSION['said']."' ";
				$result=mysqli_query($sql,$sql_query);
				if($result === FALSE)	{ die(mysqli_error($sql)); }
				$i=1;
				$a= array();
				$comment=array();
				$image=array();
				while($row=mysqli_fetch_array($result))
				{
					 $a[$i]=$row['answer'];
					$comment[$i]=$row['qcomment'];
					$imageold[$i]=$row['qimage'];
					$pid=$row['pid'];
					 $i++;
					  $_SESSION['pid']=$pid;
					  $flagt=1;
				}
				
				$_SESSION['firsttime'] =1;
				//var_dump($arrayjid);
				echo "array";
			}

		if(isset($_REQUEST["cmdsave"]))//save questionnair
		{
			$arrayjid=$_SESSION['arrayjid'];
			$sql_query= " select * from tbl_project_review where pid = '".$_SESSION['pid']."' ";
			$result=mysqli_query($sql,$sql_query);
			$j=1;
			$prid= array();
			$images= array();
			while($row=mysqli_fetch_array($result))
			{
			 $prid[$j]=$row['prjid'];
			 $images[$j]=$row['qimage'];
			 $j++;
			}
			if($_REQUEST["txtnote"] != '')
			{
			$s="update tbl_project set `notes` = '".trim($_REQUEST["txtnote"])."' where pid='$t_pid'";
				$r=mysqli_query($sql,$s);
			}		
			for($i=1;$i<=25;$i++)
			{	

				$s =" update tbl_project_review set answer = '".$_REQUEST["$i"]."', status = '".$_REQUEST["status1"]."' where prjid = '".$arrayjid[$i]."'";
				//var_dump($s);die;
				$result=mysqli_query($sql,$s);
				if(!$result){echo "could not update".mysqli_error($sql);}		
				if($_REQUEST["status1"] == 'In_Progress')
				{
					$s="update tbl_project set `status_progress` = '1' where pid='$t_pid'";
					$r=mysqli_query($sql,$s);
				}
				if($_REQUEST["status1"] == 'Completed')
				{
					$s="update tbl_project set `status_progress` = '0' where pid='$t_pid'";
					$r=mysqli_query($sql,$s);
				}
				
			}	
			//header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/"."updated/manage_audit");
			echo "2";	
			exit;
	   }
  
	   else
	   {
			//var_dump($_FILES);
			$arrayjid=$_SESSION['arrayjid'];
			$sql_query= " select * from tbl_project_review where pid = '".$_SESSION['pid']."' ";
			$result=mysqli_query($sql,$sql_query);
			$j=1;
			$prid= array();
			$images= array();
			while($row=mysqli_fetch_array($result))
			{
			 $prid[$j]=$row['prjid'];
			 $images[$j]=$row['qimage'];
			 $j++;
			}
				
				$i=$_REQUEST['oldimg'];
				
				if($_FILES['img'.$i]['name'] != "") 
				{	
					
					//var_dump($old);
					//var_dump($i."check");
					$parts = pathinfo($_FILES['img'.$i]['name']);
					$image=$_FILES['img'.$i];
					 $filepath = '/var/www/html/5s/images/review_image/'.$superid;
					 
					// var_dump($filepath);
						if (!file_exists($filepath)) {
							
							mkdir($filepath, 0777, true);
						}
						//var_dump($_FILES['img'.$i]['name']);
						$image['name']=time().$i.'.'.$parts['extension'];
						$finalpath=$filepath.'/'.$image['name'];
						$dbpath='images/review_image/'.$superid.'/'.$image['name'];
						 if(move_uploaded_file($_FILES['img'.$i]['tmp_name'], $finalpath))
						{
							//var_dump("moe");
							//die;
						}	
							 
						
				}
				else
				{
					$dbpath=null;
				}
				echo "insert ";
				//var_dump($_REQUEST);
				
				echo $s =" update tbl_project_review set answer = '".$_REQUEST["$i"]."', qcomment = '".$_REQUEST['comment'.$i]."', qimage = '".$dbpath."', status = '".$_REQUEST["status1"]."' where prjid = '".$arrayjid[$i]."'";
				
				//var_dump($s);die;
				echo "result is:".$result=mysqli_query($sql,$s);
				
				if(!$result){echo "could not update".mysqli_error($sql);}		
				if($_REQUEST["status1"] == 'In_Progress')
				{
					$s="update tbl_project set `status_progress` = '1' where pid='".$_SESSION['pid']."'";
					$r=mysqli_query($sql,$s);
				}
				if($_REQUEST["status1"] == 'Completed')
				{
					$s="update tbl_project set `status_progress` = '0' where pid='".$_SESSION['pid']."'";
					$r=mysqli_query($sql,$s);
				}
				echo "save comment";
			exit();
		}	
	}
?>