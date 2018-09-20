<?php 
session_start();
include("dbconnect.php");
if(!isset($_SESSION["uname"]))
{
    header("location:login");
}


include("header.php"); 
include("left_menu.php");
$suid=$_SESSION['said'];
$uid=$_SESSION['uid'];

?>
<script type="text/javascript" language="javascript">
function displayform()
{
	document.location = '<?Php echo $_SESSION['dname']."/".$_SESSION['uname']."/formrenew" ?>';
}
</script>
 <div class="content">
 	<div class="title"><h5><?php echo RENEW." ".SUBSCRIPTION ?></h5></div>
<?php
if(isset($_SESSION['expired']) && $_SESSION['expired'] == 'yes')
	{
	?>
		<div class="nNote nWarning hideit">
		<p>
			<strong><?php echo WARNING.":" ?></strong>
<?php echo YOUR." ".SUBSCRIPTION." ".HAS." ".EXPIRED." "."."." ".PLEASE." ".CLICK." ".RENEW." ".SUBSCRIPTION." ".BUTTON." ".TO_T." ".RENEW." ".IT_T." ".NOW ?>
		</p>
		</div>
	<?php 
	}
	?>
	<input class="greenBtn" type="submit" name="renew" value="<?php echo RENEW." ".SUBSCRIPTION ?>"
               onclick="displayform()"/>
</div>	
<div class="fix"></div>
        </div>
<?php include("footer.php"); ?>