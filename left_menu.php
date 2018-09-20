<?php 
session_start();

error_reporting(0);
	if(isset($_SESSION['uname']) && isset($_SESSION['dname']))
	{
		$flag = $_SESSION['dname']."/".$_SESSION['uname'];
	}
	else
	{
		$flag = '';
	}
?>
<?php 

include('active_user.php');
$user_session_role = $_SESSION['role'];
$active_user_right = getActiveUserRole('Dashboard',$user_session_role);
$template_create_right = getActiveUserRole('Template Create',$user_session_role);
$template_view_right = getActiveUserRole('View Template',$user_session_role);
$department_add_right = getActiveUserRole('Add Department',$user_session_role);
$manage_questionnary_right = getActiveUserRole('Manage Questionnaire',$user_session_role);
$create_audit_right = getActiveUserRole('Create Audit',$user_session_role);
$manage_audit_right = getActiveUserRole('Manage Audit',$user_session_role);
$history_right = getActiveUserRole('Archive',$user_session_role);
$report_right = getActiveUserRole('Reports',$user_session_role);
$accessright_right = getActiveUserRole('Access Rights',$user_session_role);

?>
<!-- Content wrapper -->
<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 wrapper px-sm-0">
	<!-- Left navigation -->
   <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3  float-left my-0 my-sm-4 px-0" >
    
		<div class="col-12 d-none  d-sm-block leftNav px-0 mb-3" id="collapsibleNavbar">  
			<ul id="menu" class="list-group nav flex-column">
			   <?php 
				if($active_user_right == 1)
				{ ?>
				<li class="nav-item border">
					<a class="nav-link pl-3" style="font-size: 16px;" title="" 
					href="<?php if(isset($_SESSION['uname']) && isset($_SESSION['dname'])){ echo $flag."/dashboard"; } ?>" 
					<?php if((strpos($_SERVER['REQUEST_URI'],"dashboard")) || strpos($_SERVER['REQUEST_URI'],$flag."/setreport")){ echo 'id="active"'; }?>>
						<i class="fa fa-home"></i> <span class="pl-1"> <?php echo DASHBOARD ?></span>
					</a>
				</li>
				<?php } ?>
				
				
				<?php 
				if($template_create_right == 1)
				{ ?>
					<li class="nav-item border">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/template_create" ?>" title="" 
							<?php if(strpos($_SERVER['REQUEST_URI'],$flag."/template_create")){ echo 'id="active"'; }?> >
							<i class="fa fa-plus" aria-hidden="true"></i> <span class="pl-1"> <?php echo ADDTEMPLATE ?></span>
						</a>
					</li>
				<?php } ?>
				<?php 
				if($template_view_right == 1)
				{ ?>
					<li class="nav-item border">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/template_view" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"template_view") || strpos($_SERVER['REQUEST_URI'],"update_owntemplate")|| strpos($_SERVER['REQUEST_URI'],"update_clienttemplate"))
							{ echo 'id="active"'; }?>>
							<i class="fa fa-eye" aria-hidden="true"></i> <span class="pl-1">  <?php echo VIEWTEMPLATE ?></span>
						</a>
					</li>
				<?php } ?>
				<?php 
				if($department_add_right == 1)
				{ ?>
					<li class="nav-item border">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/department_add" ?>" title="" 
							<?php if(strpos($_SERVER['REQUEST_URI'],"department_add")){ echo 'id="active"'; }?>>
							<i class="fa fa-plus" aria-hidden="true"></i> <span class="pl-1"><?php echo DEPARTMENT?></span>
						</a>
					</li>
				<?php } ?>
				<?php 
				if($manage_questionnary_right == 1)
				{ ?>
					<li class="nav-item border">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/manage_questionnary" ?>" title=""
						<?php if(strpos($_SERVER['REQUEST_URI'],"manage_questionnary") || strpos($_SERVER['REQUEST_URI'],"view_questionnary") || strpos($_SERVER['REQUEST_URI'],"edit_question"))
							{ echo 'id="active"'; }?>>
							<i class="fa fa-book" aria-hidden="true"></i> <span class="pl-1"><?php echo MANAGEQUES ?></span>
						</a>
					</li>
					<?php } ?>
				
							
				<?php 
				if($create_audit_right == 1)
				{ ?>
				<li class="nav-item border">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/create_audit" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],$flag."/create_audit") || (strpos($_SERVER['REQUEST_URI'],"questionnairy") && strpos($_SERVER['HTTP_REFERER'],$flag."/create_audit")))
						{ echo 'id="active"'; }?>>
						<i class="fa fa-edit" aria-hidden="true"></i> <span class="pl-1"><?php echo CREATEAUDIT ?></span>
					</a>
				</li> 
				<?php } ?>
				<?php 
				if($manage_audit_right == 1)
				{ ?>
				<li class="nav-item border">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/manage_audit" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"manage_audit") || strpos($_SERVER['REQUEST_URI'],"edit_audit") || 
								 (strpos($_SERVER['REQUEST_URI'],"questionnairy") && strpos($_SERVER['HTTP_REFERER'],"edit_audit")))
						{ echo 'id="active"'; }?>>
						<i class="fa fa-book" aria-hidden="true"></i> <span class="pl-1"><?php echo MANAGEAUDIT ?></span>
					</a>
				</li>
				<?php } ?>
				<?php 
				if($history_right == 1)
				{ ?>            
				<li class="nav-item border">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/history" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"history"))	{ echo 'id="active"'; }?>>
						<i class="fa fa-archive" aria-hidden="true"></i> <span class="pl-1"><?php echo ARCHIVE ?></span>
					</a>
				</li>
				<?php } ?>
				<?php 
				if($report_right == 1)
				{ ?>            
				<li class="nav-item border">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/report" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"report")){ echo 'id="active"'; }?>>
						<i class="fa fa-flag" aria-hidden="true"></i> <span class="pl-1"><?php echo REPORTS ?></span>
					</a>
				</li>
				<?php } ?>
				<?php 
				if($accessright_right == 1)
				{ ?>
				<li class="nav-item border">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/accessright" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"accessright")){ echo 'id="active"'; }?>>
						<i class="fa fa-key" aria-hidden="true"></i> <span class="pl-1"><?php echo ACCESSRIGHTS ?></span>
					</a>
				</li>
				<?php } ?>
			</ul>
		</div>  
		<div class="mobile-menu d-block d-sm-none col-md-12 col-sm-4 col-6">
		<div class="row">
			
			<div id="sidebar-wrapper" class="bg-dark">
				<ul class="sidebar-nav px-2">
				<?php 
				if($active_user_right == 1)
				{ ?>
				<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
					<a class="nav-link pl-3" style="font-size: 16px;" title="" 
					href="<?php if(isset($_SESSION['uname']) && isset($_SESSION['dname'])){ echo $flag."/dashboard"; } ?>" 
					<?php if((strpos($_SERVER['REQUEST_URI'],"dashboard")) || strpos($_SERVER['REQUEST_URI'],$flag."/setreport")){ echo 'id="active"'; }?>>
						<i class="fa fa-home text-white"></i> <span class="text-white ml-2"> <?php echo DASHBOARD ?></span>
					</a>
				</li>
				<?php } ?>
				
				
				<?php 
				if($template_create_right == 1)
				{ ?>
					<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/template_create" ?>" title="" 
							<?php if(strpos($_SERVER['REQUEST_URI'],$flag."/template_create")){ echo 'id="active"'; }?> >
							<i class="fa fa-plus text-white" aria-hidden="true"></i> <span class="text-white ml-2"> <?php echo ADDTEMPLATE ?></span>
						</a>
					</li>
				<?php } ?>
				<?php 
				if($template_view_right == 1)
				{ ?>
					<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/template_view" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"template_view") || strpos($_SERVER['REQUEST_URI'],"update_owntemplate")|| strpos($_SERVER['REQUEST_URI'],"update_clienttemplate"))
							{ echo 'id="active"'; }?>>
							<i class="fa fa-eye text-white" aria-hidden="true"></i> <span class="text-white ml-2">  <?php echo VIEWTEMPLATE ?></span>
						</a>
					</li>
				<?php } ?>
				<?php 
				if($department_add_right == 1)
				{ ?>
					<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/department_add" ?>" title="" 
							<?php if(strpos($_SERVER['REQUEST_URI'],"department_add")){ echo 'id="active"'; }?>>
							<i class="fa fa-plus text-white" aria-hidden="true"></i> <span class="text-white ml-2"><?php echo DEPARTMENT?></span>
						</a>
					</li>
				<?php } ?>
				<?php 
				if($manage_questionnary_right == 1)
				{ ?>
					<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
						<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/manage_questionnary" ?>" title=""
						<?php if(strpos($_SERVER['REQUEST_URI'],"manage_questionnary") || strpos($_SERVER['REQUEST_URI'],"view_questionnary") || strpos($_SERVER['REQUEST_URI'],"edit_question"))
							{ echo 'id="active"'; }?>>
							<i class="fa fa-book text-white" aria-hidden="true"></i> <span class="text-white ml-2"><?php echo MANAGEQUES ?></span>
						</a>
					</li>
					<?php } ?>
				
							
				<?php 
				if($create_audit_right == 1)
				{ ?>
				<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/create_audit" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],$flag."/create_audit") || (strpos($_SERVER['REQUEST_URI'],"questionnairy") && strpos($_SERVER['HTTP_REFERER'],$flag."/create_audit")))
						{ echo 'id="active"'; }?>>
						<i class="fa fa-edit text-white" aria-hidden="true"></i> <span class="text-white ml-2"><?php echo CREATEAUDIT ?></span>
					</a>
				</li> 
				<?php } ?>
				<?php 
				if($manage_audit_right == 1)
				{ ?>
				<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/manage_audit" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"manage_audit") || strpos($_SERVER['REQUEST_URI'],"edit_audit") || 
								 (strpos($_SERVER['REQUEST_URI'],"questionnairy") && strpos($_SERVER['HTTP_REFERER'],"edit_audit")))
						{ echo 'id="active"'; }?>>
						<i class="fa fa-book text-white" aria-hidden="true"></i> <span class="text-white ml-2"><?php echo MANAGEAUDIT ?></span>
					</a>
				</li>
				<?php } ?>
				<?php 
				if($history_right == 1)
				{ ?>            
				<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/history" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"history"))	{ echo 'id="active"'; }?>>
						<i class="fa fa-archive text-white" aria-hidden="true"></i> <span class="text-white ml-2"><?php echo ARCHIVE ?></span>
					</a>
				</li>
				<?php } ?>
				<?php 
				if($report_right == 1)
				{ ?>            
				<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/report" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"report")){ echo 'id="active"'; }?>>
						<i class="fa fa-flag text-white" aria-hidden="true"></i> <span class="text-white ml-2"><?php echo REPORTS ?></span>
					</a>
				</li>
				<?php } ?>
				<?php 
				if($accessright_right == 1)
				{ ?>
				<li class="nav-item border border-left-0 border-right-0 border-top-0 border-secondary py-1">
					<a class="nav-link pl-3" style="font-size: 16px;" href="<?php echo $flag."/accessright" ?>" title="" 
						<?php if(strpos($_SERVER['REQUEST_URI'],"accessright")){ echo 'id="active"'; }?>>
						<i class="fa fa-key text-white" aria-hidden="true"></i> <span class="text-white ml-2"><?php echo ACCESSRIGHTS ?></span>
					</a>
				</li>
				<?php } ?>
				</ul>
			</div>
		</div>
    </div>
	<script>
$("#menu-close").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
  });
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
    
  });
</script>
    </div>