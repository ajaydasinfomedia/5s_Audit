<?php 
session_start();        
include("header.php");

if(!isset($_SESSION["uname"]))
{
    header("location:login");
}
        include("left_menu.php");
	include("dbconnect.php");  
	
	
	 if(strpos($_SERVER['REQUEST_URI'],"questions") || strpos($_SERVER['REQUEST_URI'],"question_update"))
	{
	$str_explode = explode('/',$_SERVER['REQUEST_URI']);
	$count=count($str_explode);
	$qid = $str_explode[$count-3];
	
	$sql1 = "select * from tbl_questionnair where qid =".$qid;
	$rs = mysqli_query($sql,$sql1) or die(mysqli_error($sql));
	while($r = mysqli_fetch_array($rs))
	{
		$lang = $r['title'];	
	}
	     mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));
 $sql_query="select * from tbl_questionanswer where qid=".$qid."";
		$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));  

	}             
?>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3"> 
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
		<h6><?php echo VIEWQUES ?></h6>
	</div>
    <?php
	if(strpos($_SERVER['REQUEST_URI'],'question_update'))
{
?>	
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
	<p>
		<strong><?php echo SUCCESS.":" ?></strong>
			<?php echo QUESUPDATED."!!" ?>
	</p>
	</div>
<?php
}
                  
?>
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0">
	<div class="border pl-1 pt-2">
		<h6><i class="fa fa-bars" aria-hidden="true"></i> <?php echo QLIST."-" ?> <?php echo $lang; ?></h6>
    </div>
    <div id="" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 mt-3">
		<table  class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
            <thead class="text-center">
                <tr>
                    <td><?php echo CHECKITEM ?></td>
                    <td><?php echo DESCRIPTION ?></td>                    
                    <td><?php echo EDIT ?></td>
                </tr>
			</thead>
			<tbody class="text-center">
			<?php

				while($row=mysqli_fetch_array($result))
					{
					$qaid = $row['qaid'];    
						$checkitem = $row["checkitem"];
						$desc = $row["description"];
			?>
				<tr>              
					<td align="center"><?php echo $checkitem; ?></td>           
					<td align="center"><?php echo $desc; ?></td>           
					<td align="center"><a href='<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/$qid/$qaid/edit_question"; ?>'>
						   <img class='mr10' alt='' src='images/icons/dark/pencil.png' /></a></td>	
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
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true,
			sDom: 'lfrtip',
        });
    });
</script>
<?php
        include("footer.php");
?>
