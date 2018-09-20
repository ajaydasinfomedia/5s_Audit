<?php  
	include("dbconnect.php");
	include("language/language.php");  
    if(isset($_SESSION['dbname']) )
	{
    	$query="SELECT `value` FROM `tbl_settings` WHERE `key` = 'default_language' AND `uid` =".$_SESSION['uid'];
    	$result=mysqli_query($sql,$query) or die("this".mysqli_error($sql));
		$row = mysqli_fetch_assoc($result);
		$value=$row["value"];
		$sql=mysqli_connect("localhost","root","","5s_web");
		if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 		
		
		$sql_query="select `title` from tbl_language where lid= '".$value."'";
		$result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
		$row = mysqli_fetch_assoc($result);
		$val=$row["title"];
  
    	$sel='language/'.$val.'.ini';   
		mysqli_close($sql) or die(mysqli_error($sql));             
    	loadLanguage($sel);    
	}
	else
	{
		$sel='language/english.ini';  
		loadLanguage($sel); 
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<?php $base_path = "http://" . $_SERVER['SERVER_NAME']."/5s/";?>
<base href="<?php echo $base_path;?>"/>
<title>5s audit system</title>
<!-- bootstarp 4 css -->

<link rel="stylesheet" href="css/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" href="css/own.css">

<!--end bootstarp 4 css 
<link href="css/main.css" rel="stylesheet" type="text/css" />-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- 
<link href="css/dataTables.responsive.css" rel="stylesheet" type="text/css" />
<link href="css/mystyles.css" rel="stylesheet" type="text/css" />
<link href="css/stylesheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />-->
<link href="css/quepage.css" rel="stylesheet" type="text/css" />

<!-- DataTables Responsive CSS -->
<link href="js/plugins/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<link href="js/plugins/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
  
<!-- FullCalendar -->
<link href="js/plugins/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="js/plugins/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print"> 
	
	
	
<!-- bootstarp 4 js -->
<script src="js/plugins/bootstrap4/jquery-1.12.1.min.js"></script> 
<script src="js/plugins/bootstrap4/bootstrap.min.js"></script>
<script src="js/plugins/bootstrap4/popper.min.js"></script>


<!-- end bootstarp 4 js 
<script type="text/javascript" src="js/dist/jquery.min.js"></script>
<!-- -->
<script type="text/javascript" src="js/jquery.form.js"></script> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>




<script type="text/javascript" src="js/plugins/spinner/ui.spinner.js"></script>
<script type="text/javascript" src="js/plugins/flot/excanvas.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<!--<script type="text/javascript" src="js/plugins/tables/jquery.dataTables.js"></script>

<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>-->

<script src="js/plugins/datatables/js/jquery.dataTables.min.js"></script>
<script src="js/plugins/datatables-plugins/dataTables.bootstrap.min.js"></script> 
<script src="js/plugins/datatables-responsive/dataTables.responsive.js"></script>
<script src="js/plugins/datatables-plugins/dataTables.bootstrap.min.js"></script> 
<!-- FullCalendar -->
<script type="text/javascript" src="js/plugins/other/calendar.min.js"></script>

<!-- Custom Theme Scripts 
<script src="js/plugins/build/js/custom.min.js"></script>	-->
<!--
<script type="text/javascript" src="js/plugins/datatables/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="js/plugins/datatables/dataTables.editor.min.js"></script>
<script type="text/javascript" src="js/plugins/datatables/dataTables.responsive.js"></script>
-->
<!-- FullCalendar -->
<script src="js/plugins/moment/min/moment.min.js"></script>
<script src="js/plugins/fullcalendar/dist/fullcalendar.min.js"></script>


<!---->
<script type="text/javascript" src="js/plugins/tables/colResizable.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/forms.js"></script>
<script type="text/javascript" src="js/plugins/forms/autogrowtextarea.js"></script>
<script type="text/javascript" src="js/plugins/forms/autotab.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.validationEngine-en.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.dualListBox.js"></script>
<script type="text/javascript" src="js/plugins/forms/chosen.jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.inputlimiter.min.js"></script>
<script type="text/javascript" src="js/plugins/forms/jquery.tagsinput.min.js"></script>

<script type="text/javascript" src="js/plugins/uploader/plupload.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html5.js"></script>
<script type="text/javascript" src="js/plugins/uploader/plupload.html4.js"></script>
<script type="text/javascript" src="js/plugins/wizards/jquery.form.wizard.js"></script>
<script type="text/javascript" src="js/plugins/wizards/jquery.validate.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.ToTop.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.listnav.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/plugins/spinner/jquery.mousewheel.js"></script>
<script type="text/javascript" src="js/plugins/other/elfinder.min.js"></script>
<script type="text/javascript" src="js/plugins/wysiwyg/jquery.wysiwyg.js"></script> 
<script type="text/javascript" src="js/plugins/wysiwyg/wysiwyg.image.js"></script>
<script type="text/javascript" src="js/plugins/wysiwyg/wysiwyg.link.js"></script>
<script type="text/javascript" src="js/plugins/wysiwyg/wysiwyg.table.js"></script>
<script type="text/javascript" src="js/plugins/uploader/jquery.plupload.queue.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.progress.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.alerts.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.breadcrumbs.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.collapsible.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.sourcerer.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="js/plugins/ui/jquery.prettyPhoto.js"></script>



</head>
<link rel="icon" type="image/jpg" href="images/favicon.ico"/>
<body style="color:#494949;">
<!-- Top navigation bar -->
<div id="header-top" style="border-top: 5px solid #970606; height: 5px;width: 100%;position: fixed; top: 0;float: left; z-index: 10000;"></div>
<div class="header_fix" style="position: fixed;float: left;width: 100%;background-color: white;border: wheat;z-index: 9999;">	
	<div class="container">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 wrapper mt-1" style="z-index: 100000; top: 0; padding: 4px 0px 0px 8px; width: 100%;">
			<img  width="125" height="29" alt="Quickr" src="images/logo.png" />
			
			<a id="menu-toggle" class="toggle menuch float-right d-block d-sm-none">
							<img src="images/toggle_menu.png" class="bg-dark" />	
					</a>
				
		</div>
	</div>	
</div>	
<div id="topNav" style="margin-top: 40px;">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark w-100 " style="position: absolute">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 px-sm-4 wrapper ">
            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-left text-white pl-0 py-2">
            	<a href="<?php if(isset($_SESSION['uname']) && isset($_SESSION['dname'])){echo "5s/".$_SESSION['dname']."/".$_SESSION['uname']."/dashboard"; } ?>" title="">
				<img src="images/userPic.png" alt="" /></a><span class="p-2"><?php echo WELCOME ?>
				<?php if(isset($_SESSION['uname'])){ echo $_SESSION['uname'];} ?> </span>
			
			</div>
            <?php 
            if(isset($_SESSION['uid']))
            {
            ?>
            <div class=" px-0 float-left float-sm-right">
                <ul class="nav text-white">
                    <?php
                       if(!strpos($_SERVER['REQUEST_URI'],'pricing_plans'))
                                if(!strpos($_SERVER['REQUEST_URI'],'recuringpage'))
                {        
                           ?>                        
                    <li class="nav-item"><a class="nav-link" href=<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/editprofile"; ?>>
					<img src="images/icons/topnav/profile.png" alt="" /><span class="text-white pl-2"><?php echo PROFILE ?>
					</span></a></li>
                    <li class="nav-item"><a class="nav-link" href=<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/settings" ?>>
					<img alt="" src="images/icons/topnav/settings.png"><span class="text-white pl-2"><?php echo SETTINGS ?>
					</span></a></li>
                    <?php
                }
                ?>
                    <li class="nav-item"><a class="nav-link" href=<?php echo "logout" ?> title="">
					<img src="images/icons/topnav/logout.png" alt="" />
					<span class="text-white pl-2"><?php echo LOGOUT ?></span></a></li>
                </ul>
            </div>
            <?php
            }  
			else
			{                          
            ?>	
			<div class="float-right">
                <ul class="nav text-white">
					<li class="nav-item"><a class="nav-link" href="login"><img src="images/icons/topnav/profile.png" alt="" /><span class="text-white"> Login</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="pricing_plans"><img src="images/icons/topnav/register.png" alt="" /><span class="text-white"> Sign up</span></a></li>
				</ul>
            </div>
			<?php
			}
			?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- Header -->
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5 mt-sm-5 mt-md-3 wrapper">
    <div class="float-none float-sm-left  mt-sm-3" align="center"><a href="#" title="">
	<img src="images/logo_final-1.png" alt="" /></a>
	</div>
            <?php 
            if(isset($_SESSION['said']) && $_SESSION['said']==$_SESSION['uid'])
            {             
                 if(!strpos($_SERVER['REQUEST_URI'],'pricing_plans'))
                          if(!strpos($_SERVER['REQUEST_URI'],'recuringpage'))
                {                                    
            ?>
    <div class="float-none float-sm-right mb-1 middleNav" align="center">
    	<ul class="nav mt-5">            
            <li class="iStat nav-item ml-1 ml-sm-3 "><a class="nav-link p-0" href="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/statistics";?>" title=""><span><?php echo STATISTICS ?></span></a></li>
            <li class="iUser nav-item ml-1 ml-sm-3"><a class="nav-link p-0" href="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/userlist";?>" title=""><span><?php echo USER." ".LIST_NEW ?></span></a></li>
            <li class="iOrders nav-item ml-1 ml-sm-3"><a class="nav-link p-0" href="<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/billingpanel";?>" title=""><span><?php echo BILLING." ".PANEL ?></span></a></li>
        </ul>
    </div>
            <?php
            }
            }
            ?>
    <div class="clearfix"></div>
</div>