<?php
session_start();
include("header.php");
if(!isset($_SESSION["uname"]))
{
    header("location:login");
}
        
        include("left_menu.php");
	include("dbconnect.php");
	
	
	
	
	$str_explode = explode('/',$_SERVER['REQUEST_URI']);
	$count=count($str_explode);
	$qaid = $str_explode[$count-2];
	$qid = $str_explode[$count-3];
	
	
	
        ?>
		  
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3"> 
	<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white"><h6><?php echo EDITQUES ?></h6>
	</div>
	<div class="container my-3">
		<form class="mainForm" method="post" action="insert.php">
			<?php
			 mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));
				 $sql_query="select * from tbl_questionanswer where qaid=".$qaid;
					$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));     
				
				while($row=mysqli_fetch_array($result))
					{
					 $name=$row["checkitem"];
					 $desc=$row["description"];			               
					}                
			?>
            <fieldset>
				<input type="hidden" name="txtqid" value="<?php echo $qid; ?>">
				<input type="hidden" name="txtid" value="<?php echo $qaid; ?>">
				<div class="form-group row">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CHECKITEM.":" ?></label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<textarea rows="2" cols="" class="form-control form-control-sm auto" name="txtcheckitem" style="color:#494949;"><?php echo $name ?></textarea>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group row">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo DESCRIPTION.":" ?></label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<textarea rows="2" cols="" class="form-control form-control-sm auto" name="txtdesc" style="color:#494949;"><?php echo $desc ?></textarea>
					</div>
					<div class="clearfix"></div>
				</div>
			
                <div class="form-group row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">  
						<input class="btn btn-success btn-sm" type="submit"name="edit_audit" value="<?php echo SAVE_B ?>" />
                    </div>
				</div>
 
            </fieldset>

		</form>
        </div>
    </div>
		       
<div class="clearfix"></div>
</div>
<?php
        include("footer.php");
?>
