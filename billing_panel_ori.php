<?php 	 
	session_start(); 
	include("dbconnect.php");	 
	if(!isset($_SESSION['uname'])){header('location:login');}	
	if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
	{
		header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
	}
	include("header.php"); 
	include("left_menu.php");
    include_once("function_manage.php");
    $uid=$_SESSION['uid'];
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);   
    if(strpos($_SERVER['REQUEST_URI'],'limit'))
    {        
    	$str_explode = explode('/',$_SERVER['REQUEST_URI']);
        $count=count($str_explode);                                                
        $limit = $str_explode[$count-2];                                               
    }
    else
    {
    	$limit=5;
    }
    $startpoint = ($page * $limit) - $limit;
	$statement = "tbl_plan where uid = $uid ORDER BY createdate DESC";        
?>
<script type="text/javascript">    
	function load(s)
	{ 
		window.location.href=s+"/billingpanel"; 
	} 
	function displayform()
	{ 
		document.location = 'pricing_plans?upgrade=<?php echo $_SESSION['uid'];?>'; 
	}           
</script>
<div class="content">
    <div class="title"><h5><?php echo BILLPANEL ?></h5></div>	
    <form action="cancelsubscr.php" method="post" >
        <div class="nNote nInformation " style="margin-bottom: 0;margin-top: 20px;">
			<p>
				<strong><?php echo INFORMATION.":" ?></strong><?php echo UPGRADEPLAN." "."-"." ".CANCELCURRENTPLAN ?>
			</p>
		</div>
        <input  class="greenBtn" type="submit" name="upgrade" style="margin-left: 300px;margin-top: 10px;" value="<?php echo UPGRADEPLAN?>" onClick="return confirm('Are you sure want to upgrade?');" />	
 	</form>			                					
	<div class="widget" style="margin-top:10px;">  
    	<div class="head"><h5 class="iList"><?php echo ORDERHISTORY ?></h5></div>    
     	<div id="example_wrapper" class="dataTables_wrapper">
    		<table class="tableStatic" width="100%" cellspacing="0" cellspadding="0">
				<thead>
                    <tr>		                            
                        <td style="width: 15%;"><?php echo NOOFUSER ?></td>
                        <td style="width: 10%;"><?php echo PRICE ?></td>
                        <td style="width: 15%;"><?php echo SUBSCRIPTNPERIOD ?></td>								
                        <td style="width: 15%;"><?php echo CREATE." ".DATE ?></td>	
                        <td style="width: 15%;"><?php echo PRODTYPE ?></td>
                        <td style="width: 15%;"><?php echo PLANTYPE ?></td>	
                        <td style="width: 15%;"><?php echo STATUS ?></td>	
                    </tr>
				</thead>
				<?php
					$sql1=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } 
					$query ="select * from {$statement}  LIMIT {$startpoint} , {$limit}";            
					$result=mysqli_query($sql1,$query) or die(mysqli_error($sql1));
					$num=mysqli_num_rows($result);
					while($row=mysqli_fetch_array($result))
					{                             
						$nu=$row["num_of_user"];
						$price=$row["price"];         
						$np=$row["num_of_period"];     
						$cd=$row["createdate"];     
						$ptype=$row["plan_type"];
						$status=$row["active_status"];
						if($status == 1)
						{
							$stat = "Active";
						}
						else
						{
							$stat = "Deactive";
						}
						$planid = $row['plan_id'];
						$sqlplan = "select plan_name from plan_options where plan_id = $planid";
						$rs= mysqli_query($sql1,$sqlplan) or die(mysqli_error($sql1));
						$row = mysqli_fetch_assoc($rs);
					 	$planname = $row['plan_name'];
                ?>
				<tbody>
					<tr>		                             
                        <td align="center"><?php echo $nu; ?></td>
                        <td align="center"><?php echo $price; ?></td>
                        <td align="center"><?php echo $np; ?></td>								
                        <td align="center"><?php echo $cd; ?></td>
                        <td align="center"><?php echo $ptype; ?></td> 
                        <td align="center"><?php echo $planname; ?></td>    
                        <td align="center"><?php echo $stat; ?></td>      
					</tr>
				</tbody>
				<?php
                }
                mysqli_close($sql1) or die(mysqli_error($sql1));
                ?>
			</table>        
			<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">        
				<div id="example_length" class="dataTables_length">
					<label>    
					 <?php 
                    	if($num >= 5)
                      	{
                      ?>
                            <span class="itemsPerPage"><?php echo ITEMSPERPAGE.":" ?></span>
                            <select id="sel" name="example_length" size="1" style="opacity: 0;" onchange="load(this.value)" >
                                <option style="color:#494949;" value="5"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==5) echo "selected='selected' " ?>>5</option>
                                <option style="color:#494949;" value="10"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==10) echo 'selected="selected"'  ?>>10</option>
                                <option style="color:#494949;" value="15"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==15) echo 'selected="selected"' ?>>15</option>
                                <option style="color:#494949;" value="20"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==20) echo 'selected="selected"' ?>>20</option>
                                <option style="color:#494949;" value="25"<?php if(isset($_REQUEST["limit"]) && $_REQUEST["limit"]==25) echo 'selected="selected"' ?>>25</option>
                            </select>
					<?php
                     	}
                    ?>
					</label>
    			</div>
				<div id="example_paginate" class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers">
                    <span>
                         <?php
                        echo pagination($statement,$limit,$page);
                         ?>
                    </span>
				</div>
			</div>     
		</div>  
	</div>		
</div>
</div>		
<?php include("footer.php");?>