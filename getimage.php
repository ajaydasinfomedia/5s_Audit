<?php 
session_start();
$data=$_GET['q'];
?>
<?php 
if($_SESSION['images'][$data] != null)
{
?><img src="http://5s.niftysol.com/<?php echo $_SESSION['images'][$data];?>"style="padding-top:10px;;max-width:200px;max-height:200px;float:left;">

<?php 
exit;
} 
else
{
	exit;
}