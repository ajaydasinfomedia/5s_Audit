<?php 	 
   session_start(); 
   include("dbconnect.php");
   $id=$_SESSION['uid'];
      $suid=$_SESSION['said']; 
   if($_SESSION['role'] == 'admin' && $_SESSION['status'] == '0')
   			 {
   			  header("Location:".$_SESSION['dname']."/".$_SESSION['uname']."/newplan/".$_SESSION['uid']."/recuringpage");
   			 }
   if(!isset($_SESSION['uname'])){	header('location:login');}	
   include("header.php"); 
   include("left_menu.php");
   ?>
<script type="text/javascript" language="javascript">
   function displayclass()
   {
   var a= document.referrer;
   var b= window.location;
   var pathArray = window.location.pathname.split( '/' );
   pathArray.reverse();
   var c = pathArray[0];
   var d = pathArray[1];
   var url =c + d + window.location.search ;
   if(typeof(url) != "undefined" && url !== null && url == 'userlistno'  ) 
   {		
   	 document.getElementById("client").className = " activeTab";
   	 document.getElementById("tab2").style.display="block";    
   	 document.getElementById("own").className = "";
   	 document.getElementById("tab1").style.display="none"; 
   }
   if(typeof(url) != "undefined" && url !== null && url == 'userlistupdated'  ) 
   {		
   	 document.getElementById("own").className = " activeTab";
   	 document.getElementById("tab1").style.display="block";    
   	 document.getElementById("client").className = "";
   	 document.getElementById("tab2").style.display="none"; 
   }
   if(typeof(url) != "undefined" && url !== null && url == 'userlistnotallow'  ) 
   {		
   	 document.getElementById("client").className = " activeTab";
   	 document.getElementById("tab2").style.display="block";    
   	 document.getElementById("own").className = "";
   	 document.getElementById("tab1").style.display="none"; 
   }
   }
   window.onload = displayclass;
</script>
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3">
   <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
      <h6><?php echo USERMGT ?></h6>
   </div>
   <?php 
      if($_SESSION['role'] == "admin"){
      	$link2=mysqli_connect("localhost","root","") or die('Could not connect: ');	
      	mysqli_select_db($link2,"5s_web") or die ('Can\'t use foo : ' . mysqli_error($link2));
      	$sql1 = "select * from tbl_plan where plan_type like '5s' and uid = ".$_SESSION['said']." and active_status = 1"; 
      	$rs = mysqli_query($link2,$sql1) or die(mysqli_error($link2));
      	while($row = mysqli_fetch_array($rs))
      	{
      		$no = $row['num_of_user'];	
      	}
      	$sql_login="select * from tbl_login_relation where superadminid = ".$_SESSION['said']." 
      	and status IN('0','1') and producttype like '5s'";  
       	$result=mysqli_query($link2,$sql_login) or die(mysqli_query($link2));
      	$num=mysqli_num_rows($result);
      	
      	// var_dump($no);
      	// var_dump($num);exit;
      	
      ?>
   <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 my-4 px-0">
      <div class="border mt-2">
         <ul class="nav nav-tabs">
            <li id="own" class="nav-item"><a class="nav-link active" data-toggle="tab"href="#tab1"> <?php echo VUSER ?></a>
            </li>
         <?php if($num < $no)
               { ?> 
            <li id="client"class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab2"> <?php echo AUSER ?></a>
            </li>
            <?php } ?>
         </ul>
         <div class="tab-content">
            <div id="tab1" class="container tab-pane active mt-5" >
               <?php	
                  if(strpos($_SERVER['REQUEST_URI'],'yes'))
                  {
                  ?>
               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
                  <p>
                     <strong><?php echo SUCCESS.":" ?></strong><?php echo NEWUSERADD." !! " ?>
                  </p>
               </div>
               <?php
                  }
                  if(strpos($_SERVER['REQUEST_URI'],'activated'))
                  {
                  ?>
               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
                  <p>
                     <strong><?php echo SUCCESS.":" ?></strong><?php echo USERACTIVATED."!!" ?>
                  </p>
               </div>
               <?php
                  }
                  if(strpos($_SERVER['REQUEST_URI'],'updated'))
                  {
                  ?>
               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
                  <p>
                     <strong><?php echo SUCCESS.":" ?></strong><?php echo USERINFOUPDATED." !! " ?>
                  </p>
               </div>
               <?php
                  }
                  if(strpos($_SERVER['REQUEST_URI'],'stauschanged'))
                  {
                  ?>
               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nSuccess hideit">
                  <p>
                     <strong><?php echo SUCCESS.":" ?></strong><?php echo STATUSCHANGED." !! " ?>
                  </p>
               </div>
               <?php
                  }
                  if(strpos($_SERVER['REQUEST_URI'],'not_eligible'))
                  			{
                  			?>
               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nFailure hideit">
                  <p>
                     <strong><?php echo FAILURE.":" ?></strong><?php echo SIGNUPFORNEWUSER."!!" ?>							
                  </p>
               </div>
               <?php	
                  }
                  ?>
                <div class="border pl-1 pt-2">
					<h6> <i class="fa fa-bars" aria-hidden="true"></i> <?php echo USERLIST ?></h6>
                </div>
                <div id="" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 mt-3">
                     <table class="table table-striped table-bordered table-hover" id="dataTables-example" width="100%">
                        <thead class="text-center" >
                           <tr>
                              <td><?php echo FIRST." ".NAME ?></td>
                              <td><?php echo LAST." ".NAME ?></td>
                              <td><?php echo EMAIL." ".ID ?></td>
                              <td><?php echo ROLE ?></td>
                              <td><?php echo CREATE." ".DATE ?></td>
                              <td><?php echo STATUS ?></td>
                              <td><?php echo OPTIONS?></td>
                           </tr>
                        </thead>
						<tbody>
                        <?php
                           $sql=mysqli_connect("localhost","root","") or die('Could not connect: ');	
                            mysqli_select_db($sql,"5s_web") or die ('Can\'t use foo : ' . mysqli_error($sql));	
                            
                           $sql_query= "select l.*,r.status as rstatus from tbl_login as l,tbl_login_relation as r where l.role='auditor' and l.superadminid = $suid and l.uid=r.uid 
                           and r.status IN(0,1) and r.producttype  like '5s'";
                           // echo $sql_query;die;
                           $result=mysqli_query($sql,$sql_query) or die(mysqli_error($sql));
                           while($row=mysqli_fetch_array($result))
                           {
                           $status= $row['rstatus'];
                           if($status == 1)
                           {
                           $stat = "Deactive";
                           }
                           else if($status == 0)
                           {
                           $stat = "Active";
                           }
                           
                           ?>
                        
                           <tr>
                              <td align="center"><?php echo $row['firstname']; ?></td>
                              <td align="center"><?php echo $row['lastname']; ?></td>
                              <td align="center"><?php echo $row['email']; ?></td>
                              <td align="center"><?php echo $row['role']; ?></td>
                              <td align="center"><?php echo $row['createdate']; ?></td>
                              <?php
                                 if($status == 0)
                                 {
                                 ?>	
                              <td align="center"><a href='<?php  echo 'statuschange.php?uid='.$row['uid'].'&status='.$stat; ?>' > <?php echo $stat; ?></a></td>
                              <?php
                                 }
                                 else
                                 {
                                 ?>
                              <td align="center">Deactive</td>
                              <?php
                                 }
                                 ?>
                              <td align="center">
							  <a href='<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/".$row['uid']."/update_userlist"; ?>' data-toggle="tooltip" title=" Edit ">
                                 <img class='mr10 p-2' alt='' src='images/icons/dark/pencil.png' /></a>
                              <a onclick="return confirm('Are you sure want to delete?');" href='<?php  echo 'statuschange.php?uid='.$row['uid'].'&status_del='.'2'; ?>' data-toggle="tooltip" title=" Delete "><img class="mr10 p-2" alt="" src="images/uploader/deleteFile.png"></a></td>
                           </tr>
                        
                        <?php
                           }
                           ?>
						</tbody>
                    </table>
					
                </div>
            </div>
            <div id="tab2" class="tab_content container tab-pane fade mt-5" >
               <?php	
                  if(strpos($_SERVER['REQUEST_URI'],'notallow'))
                  	{
                  	?>
               <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 nNote nFailure hideit">
                  <p>
                     <strong><?php echo FAILURE.":" ?></strong>							
                     <?php echo UNMEIDUNIQUE."!!"?>
                  </p>
               </div>
               <?php	
                  }
                  ?>
               <form action="addnewuser.php" name="frmulist" 
                  method="post" class="mainForm" id="valid" >
                  <fieldset>
                     <input type="hidden" name="txtusername" placeholder="enter username" 
                        style="color:#494949;" class="validate[required,custom[onlyLetterNumber]]" id="un"/>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo FIRST." ".NAME.":" ?> <span class="req text-danger">*</span></label>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <input name="firstname" type="text" placeholder="enter first name" style="color:#494949;" id="fnm"
                              class="validate[required,custom[onlyLetterSp]] form-control form-control-sm"  />
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo LAST." ".NAME.":" ?></label>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <input name="lastname" type="text" placeholder="enter last name" id="lnm" class="validate[custom[onlyLetterSp]] form-control form-control-sm"  style="color:#494949;"  />
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo EMAIL." ".ID.":" ?> <span class="req text-danger">*</span> </label>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <input type="text" name="txtemailid" placeholder="enter email id" style="color:#494949;" id="eid" class="validate[required,custom[email]] form-control form-control-sm"/>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo PASSWORD.":"?> <span class="req text-danger">*</span></label>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <input placeholder="enter password" type="password" name="txtpassword"  style="color:#494949;" id="password" class="validate[required] form-control form-control-sm"/>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo CONFIRMPASS.":"?> <span class="req text-danger">*</span></label>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <input type="password" name="txtcpassword" placeholder="re-enter password" style="color:#494949;"
                              id="password2" class="validate[required,equals[password]] form-control form-control-sm"/>
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group row">
                        <label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo ROLE.":"?> <span class="req text-danger">*</span></label>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <div class="form-check form-check-inline">
								
									<input type="radio" class="form-check-input imgopocity" name="role" value="0" checked />Active
								
                           </div>
                          <div class="form-check form-check-inline">
								
									<input type="radio" class="form-check-input imgopocity" name="role" value="1"/>Deactive
								
                           </div>
                        </div>
                        <div class="clearfix"></div>
                     </div>
					 <div class="form-group row">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
							<input class="btn btn-success btn-sm" type="submit" value="<?php echo SAVE_B ?>" name="cmdsave">
						</div>
					 </div>
                  </fieldset>
               </form>
            </div>
         </div>
         </div>
         <div class="clearfix"></div>
      
      </div>
      <?php } else { ?>
      <br><br>
      <h5>
         <div class="well" style="background-color:rgb(217,83,79); text-align:center; color:white; height: 30px;padding-top: 10px;">You Are Not Authorized To Access This Page...!</div>
      </h5>
      <?php } ?>
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
<?php mysqli_close($sql) or die(mysqli_error($sql)); include("footer.php");?>