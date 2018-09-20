<style>
   .ui-dialog-content label
   {
   float:left!important;
   width:100%!important;
   padding-top:10px!important;
   text-align:left!important;
   }
   .popupdata
   {
	 width:600px%!important;
	 
   }
   .popupdata #uniform-undefined
   {
   width:100%!important;
   }
   .qcomment
   {
   margin-bottom:15px;
   width:100%;
   height:250px;
   border:1px solid #e7e7e7;
   }
   .radio
   { 
   padding-right:2px; 
   }
   div.radio {
   width: 22px;
   height: 18px;
   position: relative;
   float: left;
   margin-top: 5px;
   }
   div.radio input {
   opacity: 0;
   filter: alpha(opacity:0);
   text-align: center;
   display: inline-block;
   background: none;
   width: 18px;
   height: 18px;
   }
</style>
<?php 
   error_reporting(0);
   session_start();
   if(!isset($_SESSION['uname'])){header('location:login');}
   include("header.php");
   include("left_menu.php");
   include("dbconnect.php");
   if(strpos($_SERVER['REQUEST_URI'],"questionnairy"))
   {
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
   		$_SESSION['images']=$imageold;
   		$s="select * from tbl_project where pid = '".$pid."' ";
   		$rs=mysqli_query($sql,$s);
   		
   		while($r=mysqli_fetch_array($rs))
   		{
   			
   			$note =$r['notes'];
   			 $status=$r['status_progress'];
   		}
   	}

   ?>
<script type="text/javascript" language="javascript">
   function calculateTotal() 
   {
      var x = document.getElementsByTagName("input");

      var i, total = 0;
      for(i=0; i < x.length; i++)
      {
          if (x[i].checked && x[i].type == "radio" && x[i].id == "total" )
   	   {
             total += parseInt(x[i].value,10);
   		  	  document.getElementById("gtotal").value=total; 	  
   	   }
   		var j=0, subtotal = 0;
   		s1=0, s2=0, s3=0, s4=0, s5=0;
   		while(j<=35 && j<x.length)
   		{
   		if(x[j].checked &&  x[j].id == "total" )
   		 {
   					subtotal += parseInt(x[j].value,10);
   					document.getElementById("total_5").value=subtotal;	
   		
   					if( x[j].value == '0'  && x[j].name == "1"){s1+=0;}	
   					if( x[j].value == '1'  && x[j].name == "1"){s2+=1;}	
   					if( x[j].value == '2'  && x[j].name == "1"){s3+=2;}	
   					if( x[j].value == '3'  && x[j].name == "1"){s4+=3;}	
   					if( x[j].value == '4'  && x[j].name == "1"){s5+=4;}	
   					
   					if( x[j].value == '0'  && x[j].name == "2"){s1+=0;}	
   					if( x[j].value == '1'  && x[j].name == "2"){s2+=1;}	
   					if( x[j].value == '2'  && x[j].name == "2"){s3+=2;}	
   					if( x[j].value == '3'  && x[j].name == "2"){s4+=3;}	
   					if( x[j].value == '4'  && x[j].name == "2"){s5+=4;}		
   			
   					if( x[j].value == '0'  && x[j].name == "3"){s1+=0;}	
   					if( x[j].value == '1'  && x[j].name == "3"){s2+=1;}	
   					if( x[j].value == '2'  && x[j].name == "3"){s3+=2;}	
   					if( x[j].value == '3'  && x[j].name == "3"){s4+=3;}	
   					if( x[j].value == '4'  && x[j].name == "3"){s5+=4;}		
   					
   					if( x[j].value == '0'  && x[j].name == "4"){s1+=0;}	
   					if( x[j].value == '1'  && x[j].name == "4"){s2+=1;}	
   					if( x[j].value == '2'  && x[j].name == "4"){s3+=2;}	
   					if( x[j].value == '3'  && x[j].name == "4"){s4+=3;}	
   					if( x[j].value == '4'  && x[j].name == "4"){s5+=4;}		
   						
   					if( x[j].value == '0'  && x[j].name == "5"){s1+=0;}	
   					if( x[j].value == '1'  && x[j].name == "5"){s2+=1;}	
   					if( x[j].value == '2'  && x[j].name == "5"){s3+=2;}	
   					if( x[j].value == '3'  && x[j].name == "5"){s4+=3;}	
   					if( x[j].value == '4'  && x[j].name == "5"){s5+=4;}	
   					
   					document.getElementById('st1_5').value=s1;
   					document.getElementById('st2_5').value=s2;
   					document.getElementById('st3_5').value=s3;
   					document.getElementById('st4_5').value=s4;
   					document.getElementById('st5_5').value=s5;
   			}		
   		j++;
   		}	
   		s1=0, s2=0, s3=0, s4=0, s5=0;
   		k=42,subtotal=0;
   		while(k<=82 && k<x.length)
   		{
   		if(x[k].checked  && x[k].id == "total" )
   		{
   			subtotal += parseInt(x[k].value,10);
   			document.getElementById("total_10").value=subtotal;	
   	
   					if( x[k].value == '0'  && x[k].name == "6"){s1+=0;}	
   					if( x[k].value == '1'  && x[k].name == "6"){s2+=1;}	
   					if( x[k].value == '2'  && x[k].name == "6"){s3+=2;}	
   					if( x[k].value == '3'  && x[k].name == "6"){s4+=3;}	
   					if( x[k].value == '4'  && x[k].name == "6"){s5+=4;}
   		
   					if( x[k].value == '0'  && x[k].name == "7"){s1+=0;}	
   					if( x[k].value == '1'  && x[k].name == "7"){s2+=1;}	
   					if( x[k].value == '2'  && x[k].name == "7"){s3+=2;}	
   					if( x[k].value == '3'  && x[k].name == "7"){s4+=3;}	
   					if( x[k].value == '4'  && x[k].name == "7"){s5+=4;}
   	
   					if( x[k].value == '0'  && x[k].name == "8"){s1+=0;}	
   					if( x[k].value == '1'  && x[k].name == "8"){s2+=1;}	
   					if( x[k].value == '2'  && x[k].name == "8"){s3+=2;}	
   					if( x[k].value == '3'  && x[k].name == "8"){s4+=3;}	
   					if( x[k].value == '4'  && x[k].name == "8"){s5+=4;}
   
   					if( x[k].value == '0'  && x[k].name == "9"){s1+=0;}	
   					if( x[k].value == '1'  && x[k].name == "9"){s2+=1;}	
   					if( x[k].value == '2'  && x[k].name == "9"){s3+=2;}	
   					if( x[k].value == '3'  && x[k].name == "9"){s4+=3;}	
   					if( x[k].value == '4'  && x[k].name == "9"){s5+=4;}
   
   					if( x[k].value == '0'  && x[k].name == "10"){s1+=0;}	
   					if( x[k].value == '1'  && x[k].name == "10"){s2+=1;}	
   					if( x[k].value == '2'  && x[k].name == "10"){s3+=2;}	
   					if( x[k].value == '3'  && x[k].name == "10"){s4+=3;}	
   					if( x[k].value == '4'  && x[k].name == "10"){s5+=4;}
   					
   					document.getElementById('st1_10').value=s1;
   					document.getElementById('st2_10').value=s2;
   					document.getElementById('st3_10').value=s3;
   					document.getElementById('st4_10').value=s4;
   					document.getElementById('st5_10').value=s5;	
   			}		
   		k++;
   		}
   			
   		s1=0, s2=0, s3=0, s4=0, s5=0;		
   		p=83,subtotal=0;
   		while(p<=123 && p<x.length)
   		{
   		if(x[p].checked  && x[p].id == "total" )
   		{
   			subtotal += parseInt(x[p].value,10);
   			document.getElementById("total_15").value=subtotal;	
   		
   					if( x[p].value == '0'  && x[p].name == "11"){s1+=0;}	
   					if( x[p].value == '1'  && x[p].name == "11"){s2+=1;}	
   					if( x[p].value == '2'  && x[p].name == "11"){s3+=2;}	
   					if( x[p].value == '3'  && x[p].name == "11"){s4+=3;}	
   					if( x[p].value == '4'  && x[p].name == "11"){s5+=4;}
   					
   					if( x[p].value == '0'  && x[p].name == "12"){s1+=0;}	
   					if( x[p].value == '1'  && x[p].name == "12"){s2+=1;}	
   					if( x[p].value == '2'  && x[p].name == "12"){s3+=2;}	
   					if( x[p].value == '3'  && x[p].name == "12"){s4+=3;}	
   					if( x[p].value == '4'  && x[p].name == "12"){s5+=4;}	
   		
   					if( x[p].value == '0'  && x[p].name == "13"){s1+=0;}	
   					if( x[p].value == '1'  && x[p].name == "13"){s2+=1;}	
   					if( x[p].value == '2'  && x[p].name == "13"){s3+=2;}	
   					if( x[p].value == '3'  && x[p].name == "13"){s4+=3;}	
   					if( x[p].value == '4'  && x[p].name == "13"){s5+=4;}			
   					
   					if( x[p].value == '0'  && x[p].name == "14"){s1+=0;}	
   					if( x[p].value == '1'  && x[p].name == "14"){s2+=1;}	
   					if( x[p].value == '2'  && x[p].name == "14"){s3+=2;}	
   					if( x[p].value == '3'  && x[p].name == "14"){s4+=3;}	
   					if( x[p].value == '4'  && x[p].name == "14"){s5+=4;}		
   					
   					if( x[p].value == '0'  && x[p].name == "15"){s1+=0;}	
   					if( x[p].value == '1'  && x[p].name == "15"){s2+=1;}	
   					if( x[p].value == '2'  && x[p].name == "15"){s3+=2;}	
   					if( x[p].value == '3'  && x[p].name == "15"){s4+=3;}	
   					if( x[p].value == '4'  && x[p].name == "15"){s5+=4;}	
   							
   					document.getElementById('st1_15').value=s1;
   					document.getElementById('st2_15').value=s2;
   					document.getElementById('st3_15').value=s3;
   					document.getElementById('st4_15').value=s4;
   					document.getElementById('st5_15').value=s5;
   			}			
   		p++;
   		}
   		s1=0, s2=0, s3=0, s4=0, s5=0;
   		q=124,subtotal=0;
   		while(q<=164 && q<x.length)
   		{
   		if(x[q].checked  && x[q].id == "total" )
   		{
   			subtotal += parseInt(x[q].value,10);
   			document.getElementById("total_20").value=subtotal;	
   	
   					if( x[q].value == '0'  && x[q].name == "16"){s1+=0;}	
   					if( x[q].value == '1'  && x[q].name == "16"){s2+=1;}	
   					if( x[q].value == '2'  && x[q].name == "16"){s3+=2;}	
   					if( x[q].value == '3'  && x[q].name == "16"){s4+=3;}	
   					if( x[q].value == '4'  && x[q].name == "16"){s5+=4;}
   			
   					if( x[q].value == '0'  && x[q].name == "17"){s1+=0;}	
   					if( x[q].value == '1'  && x[q].name == "17"){s2+=1;}	
   					if( x[q].value == '2'  && x[q].name == "17"){s3+=2;}	
   					if( x[q].value == '3'  && x[q].name == "17"){s4+=3;}	
   					if( x[q].value == '4'  && x[q].name == "17"){s5+=4;}	
   					
   					if( x[q].value == '0'  && x[q].name == "18"){s1+=0;}	
   					if( x[q].value == '1'  && x[q].name == "18"){s2+=1;}	
   					if( x[q].value == '2'  && x[q].name == "18"){s3+=2;}	
   					if( x[q].value == '3'  && x[q].name == "18"){s4+=3;}	
   					if( x[q].value == '4'  && x[q].name == "18"){s5+=4;}
   					
   					if( x[q].value == '0'  && x[q].name == "19"){s1+=0;}	
   					if( x[q].value == '1'  && x[q].name == "19"){s2+=1;}	
   					if( x[q].value == '2'  && x[q].name == "19"){s3+=2;}	
   					if( x[q].value == '3'  && x[q].name == "19"){s4+=3;}	
   					if( x[q].value == '4'  && x[q].name == "19"){s5+=4;}
   					
   					if( x[q].value == '0'  && x[q].name == "20"){s1+=0;}	
   					if( x[q].value == '1'  && x[q].name == "20"){s2+=1;}	
   					if( x[q].value == '2'  && x[q].name == "20"){s3+=2;}	
   					if( x[q].value == '3'  && x[q].name == "20"){s4+=3;}	
   					if( x[q].value == '4'  && x[q].name == "20"){s5+=4;}
   					
   					document.getElementById('st1_20').value=s1;
   					document.getElementById('st2_20').value=s2;
   					document.getElementById('st3_20').value=s3;
   					document.getElementById('st4_20').value=s4;
   					document.getElementById('st5_20').value=s5;
   			}	
   		q++;
   		}			
   		s1=0, s2=0, s3=0, s4=0, s5=0;	
   		r=165,subtotal=0;
   		while(r<=213 && r<x.length)
   		{
   		if(x[r].checked  && x[r].id == "total" )
   		{
   			subtotal += parseInt(x[r].value,10);
   			document.getElementById("total_25").value=subtotal;	
   		
   					if( x[r].value == '0'  && x[r].name == "21"){s1+=0;}	
   					if( x[r].value == '1'  && x[r].name == "21"){s2+=1;}	
   					if( x[r].value == '2'  && x[r].name == "21"){s3+=2;}	
   					if( x[r].value == '3'  && x[r].name == "21"){s4+=3;}	
   					if( x[r].value == '4'  && x[r].name == "21"){s5+=4;}
   					
   					if( x[r].value == '0'  && x[r].name == "22"){s1+=0;}	
   					if( x[r].value == '1'  && x[r].name == "22"){s2+=1;}	
   					if( x[r].value == '2'  && x[r].name == "22"){s3+=2;}	
   					if( x[r].value == '3'  && x[r].name == "22"){s4+=3;}	
   					if( x[r].value == '4'  && x[r].name == "22"){s5+=4;}
   					
   					if( x[r].value == '0'  && x[r].name == "23"){s1+=0;}	
   					if( x[r].value == '1'  && x[r].name == "23"){s2+=1;}	
   					if( x[r].value == '2'  && x[r].name == "23"){s3+=2;}	
   					if( x[r].value == '3'  && x[r].name == "23"){s4+=3;}	
   					if( x[r].value == '4'  && x[r].name == "23"){s5+=4;}
   				
   					if( x[r].value == '0'  && x[r].name == "24"){s1+=0;}	
   					if( x[r].value == '1'  && x[r].name == "24"){s2+=1;}	
   					if( x[r].value == '2'  && x[r].name == "24"){s3+=2;}	
   					if( x[r].value == '3'  && x[r].name == "24"){s4+=3;}	
   					if( x[r].value == '4'  && x[r].name == "24"){s5+=4;}
   					
   					if( x[r].value == '0'  && x[r].name == "25"){s1+=0;}	
   					if( x[r].value == '1'  && x[r].name == "25"){s2+=1;}	
   					if( x[r].value == '2'  && x[r].name == "25"){s3+=2;}	
   					if( x[r].value == '3'  && x[r].name == "25"){s4+=3;}	
   					if( x[r].value == '4'  && x[r].name == "25"){s5+=4;}
   							
   					document.getElementById('st1_25').value=s1;
   					document.getElementById('st2_25').value=s2;
   					document.getElementById('st3_25').value=s3;
   					document.getElementById('st4_25').value=s4;
   					document.getElementById('st5_25').value=s5;	
   			}	
   		r++;
   		}			  		   
      }	   
	}
   window.onload = calculateTotal;
</script>

<!-- small view in -->
<div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9 float-right mt-1 mt-sm-4 dashboar px-0 px-sm-3 creataudittables4">
	 <form action="upload.php" method="post"  name="myform" enctype="multipart/form-data" id='myform' class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 uploadform px-0">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
         <h6><?php echo CREATEAUDIT ?></h6>
      </div>
	  
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
         <div class="border pl-1 pt-2">
            <h6><i class="fa fa-bars" aria-hidden="true"></i> <?php echo SQUES ?></h6>
         </div>
         <input type="hidden" value="<?php echo $pid;?>" name="txthid" />
		<!--- small size in 5s question -->	 
		 
		<div id="CRZNaN" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 resize border px-0">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
				<div id="loading" ></div> 
                  <?php
                     $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                     $count=count($str_explode);
                     $qid = $str_explode[$count-3];
                     mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));
                     $sqlq="select * from tbl_questionanswer where superadminid = '".$_SESSION['said']."' and qid = $qid  ";
                     $result=mysqli_query($sql,$sqlq);
                     
                     $i=1;
                     $s_no = 0;
                     while($row=mysqli_fetch_array($result))
                     {
                     $id=$row['queid'];
                     ?>
                  <?php 
                     if($i == 1 || $i == 6 || $i == 11 || $i == 16 || $i == 21)
                     {
                     	$s_no++;
                     ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center px-0">
					<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0 mt-3">
						<div  class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left border border-bottom-0 py-3 px-0" style="font-weight: bold;"><?php echo $s_no."S"; ?>
						<hr class="d-sm-none">
						</div>
						<div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11 float-left border border-left-0 border-right-0 px-0">
							 <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 float-left border border-bottom-0 py-4" style="font-weight: bold;"><span><?php echo CHECKITEM ?></span></div>
							 <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 float-left border border-bottom-0 py-3" style="font-weight: bold;"><span><?php echo DESCRIPTION ?></span></div>
							 <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left border border-bottom-0 py-1" style="font-weight: bold;">
								<?php echo SCORE ?>
								<p class="">
								   <img src="images/0.png">
								   <img src="images/1.png">
								   <img src="images/2.png">
								   <img src="images/3.png">
								   <img src="images/4.png">
								</p>
							 </div>
							 <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 float-left border border-bottom-0  border-right-0 py-2" style="font-weight: bold;" class="px-1"><span><?php echo "Comment/ Image"; ?></span></div>
							 <div class="clearfix"></div>
						</div>
						
					</div>
					<div class="clearfix"></div>
                </div>
               <?php
                  }
                  ?>
				
				  
					  <?php
						 if($i == 1)
						 {
							$s_name = "SORT";
						 }else if($i == 6)
						 {
							$s_name = "SETINORDER";
						 }else if($i == 11)
						 {
							$s_name = "SHINE";
						 }else if($i == 16)
						 {
							$s_name = "STANDARDISE";
						 }else if($i == 21)
						 {
							$s_name = "SUSTAIN";
						 }
						 
						 if($i == 1 || $i == 6 || $i == 11 || $i == 16 || $i == 21)
						 {
						 ?>
					  <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1 float-left p-3  text-center h-0 h-sm-75 wordwrap"><b><?php echo $s_name; ?></b>
					 
					  </div>
					  
					  <?php } ?>
					 
					  <div class="col-12 col-sm-11 col-md-11 col-lg-11 col-xl-11 float-right text-center px-0 border">
						  <div  class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 float-left text-center py-2 border border-bottom-0" ><span class=""><?php echo $row['checkitem']; ?></span></div>
						  <div class="col-12 col-sm-5 col-md-5 col-lg-5 col-xl-5 float-left text-center py-2 border border-bottom-0" ><span><?php echo $row['description'];?></span></div>
						  <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 float-left text-center pr-0 px-4 py-2 pt-3 border border-bottom-0">
							 <input type="radio" id="total" name="<?php echo $i; ?>" value="0" onClick="return calculateTotal();" class=" imgopocity"
								<?php if(isset($flagt)){if($a[$i]=='0') {echo 'checked="checked"';}} ?> checked="checked" >
							 <input type="radio" id="total" name="<?php echo $i; ?>" value="1" onClick="return calculateTotal();" class=" imgopocity"    
								<?php if(isset($flagt)){if($a[$i]=='1') {echo 'checked="checked"';}} ?>>
							 <input type="radio" id="total" name="<?php echo $i; ?>" value="2" onclick="return calculateTotal();" class=" imgopocity"
								<?php if(isset($flagt)){if($a[$i]=='2') {echo 'checked="checked"';}} ?>>
							 <input type="radio" id="total" name="<?php echo $i; ?>" value="3" onClick="return calculateTotal();" class=" imgopocity"
								<?php if(isset($flagt)){if($a[$i]=='3') {echo 'checked="checked"';}} ?>>
							 <input type="radio" id="total" name="<?php echo $i; ?>" value="4" onClick="return calculateTotal();" class=" imgopocity"
								<?php if(isset($flagt)){if($a[$i]=='4') {echo 'checked="checked"';}} ?>>
						  </div>
						<!--comment images dialogbox -->  
						  <div  title="Image/Comment" class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 dialog-message<?php echo $i;?> creataudittables">
							 <textarea name="comment<?php echo $i; ?>" id="<?php echo $i; ?>" class="qcomment comment<?php echo $i; ?>" onkeypress="changeclr(id);"><?php if(isset($flagt)){ echo $comment[$i];} ?></textarea>
							 <input type="file" name="img<?php echo $i; ?>"  class="qimage img<?php echo $i; ?> imgopocity" onchange="readURL<?php echo $i; ?>(this);">
							 <div class='col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 viewimage' style="display:none;"></div>
							 <?php if(isset($flagt)) { 
								if($imageold[$i] != ' ' && $imageold[$i] != null )
								{
									?>
							 <div style="float:left;width:50%;">
								<label >Current Image</label>
								<div id="txtHint<?php echo $i;?>">
								</div>
							 </div>
							 <?php 
								}
								}
								?>
							 <div style="float:left;width:50%;">
								<label class="blahlabel<?php echo $i; ?>"style="display:none;text-align:left;">Preview Image</label>
								<img id="blah<?php echo $i; ?>" src="#" alt="" style="padding-top:10px; display:none;"  />
							 </div>
						  </div>
						 <!-- end comment images dialogbox -->
						  <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 float-left text-center last<?php echo $i; ?> py-2 border border-bottom-0 border-right-0 pt-3" ><span>
							 <?php if(isset($flagt)) { 
								if($comment[$i] != '' || ($imageold[$i] != ' ' && $imageold[$i] != null ))	{?>
							 <input type="button" id="opener" imgold="<?php echo $i; ?>" class="assign opener<?php echo $i; ?> btn btn-success btn-sm seaBtn" value="Edit" >
							 <?php } 
								else
									{ ?>
							 <input type="button" id="opener" imgold="<?php echo $i; ?>" class="assign opener<?php echo $i; ?> btn btn-success btn-sm blueBtn" value="Add" >
							 <?php } } 
								else
									{ ?>
							 <input type="button" id="opener" imgold="<?php echo $i; ?>" class="assign opener<?php echo $i; ?> btn btn-success btn-sm blueBtn" value="Add" >
							 <?php } ?>
							 </span>
						  </div>
						</div>
				   
               <script>
                  // $(function() {
                  $('body').ready(function () {
                  $( ".dialog-message<?php echo $i; ?>" ).dialog({
                  	autoOpen: false,
                  	modal: true,
                  	buttons: {
                  		Ok: function() {
                  			$( this ).dialog( "close" );
                  		}
                  	}
                  });
                  
                  $( ".opener<?php echo $i; ?>" ).click(function() {
                   // alert('hello');
                  	$( ".dialog-message<?php echo $i; ?>" ).dialog( "open" );
                  	// return false;
                  });
                  $( ".ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-draggable.ui-resizable" ).addClass( "popupdata" );
                   
                  
                  	 $(".dialog-message<?php echo $i; ?>").closest(".popupdata").addClass(" popup<?php echo $i;?>");
                  
                   
                  $(".popup<?php echo $i; ?>").appendTo(".last<?php echo $i; ?>");
                  });	
               </script>
               <script>
                  function readURL<?php echo $i; ?>(input) {
                  		var url = input.value;
                  		var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                  		if($.inArray(ext, ['gif','png','jpg','jpeg','dwg']) == -1)
                  		{
                  			
                  			alert('invalid extension! , '+ext+' file not allowed');
                  			$(".filename").html("No file selected");
                  			return false;
                  		}else{				
                  		if (input.files && input.files[0]) {
                  			var reader = new FileReader();
                  
                  			reader.onload = function (e) {
                  				$('#blah<?php echo $i; ?>')
                  					.attr('src', e.target.result)
                  					.width(200)
                  					.height(200);
                  			};
                  
                  			reader.readAsDataURL(input.files[0]);
                  			 $('#blah<?php echo $i; ?>').css("display","block");
                  			  $('.blahlabel<?php echo $i; ?>').css("display","block");
                  			  $(".opener<?php echo $i; ?>").removeClass( "blueBtn" ).addClass(" seaBtn").val('Edit');
                  			
                  		}
                  		}
                  	}
               </script>
               <?php
                  if($i==5 || $i==10 || $i==15 || $i==20 || $i==25)
                  {
                  ?>
				   <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right px-0 py-3">
					  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-left"><label class="float-right"><?php echo SUBTOTAL ?></label></div>
					  <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 float-right px-0 px-sm-3">
						 <input type="text" id="st1_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
						 <input type="text" id="st2_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
						 <input type="text" id="st3_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
						 <input type="text" id="st4_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
						 <input type="text" id="st5_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />														
					  </div>
					  <div class="clearfix"></div>
				   </div>
				    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border px-0">
						 <div style="float: right;margin-right: 25px;">
							<label style="font-size:18px;margin-right: 5px;" ><?php echo TOTAL ?></label>
							<input readonly="yes"  type="text" id="total_<?php echo $id?>" size="1" name="stotal" class="quetotal">
						 </div>
					 </div>
					 <div class="clearfix"></div>
				
               <?php		
                  }
                  $i++;
                  }
                  ?>	
                </div>
            </div>
		<div class="clearfix"></div>
     </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 bg-dark pb-1 pt-2  text-white">
         <h6><?php echo SAUDITSCORE ?></h6>
      </div>
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 border my-4 px-0">
			<div class="border pl-1 pt-2">
				<h6><i class="fa fa-bars" aria-hidden="true"></i> <?php echo SAUDIT ?></h6>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="float-right">
					<label style="font-size: 20px;margin-right: 5px;"><?php echo GRANDTOTAL ?></label>
					<input readonly="yes" type="text" id="gtotal" size="1" class="quegrandtotal" />	
				</div>   
				<div class="clearfix"></div>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4">
				<div class="form-group row noborder">
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITSTATUS.":" ?> </label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
						<div class="form-check-inline">
							<input type="radio" value="In_Progress" name="status1" checked="checked" class="form-check-input imgopocity">
							<label style="float: left;margin-top: 8px;margin-right: 20px;"><?php echo INPROG ?></label>
							<input type="radio"  value="Completed" <?php if($status=='Completed' || $status=='0') {echo 'checked="checked"';}?>  name="status1" class="form-check-input imgopocity" >
							<label style="float: left;margin-top: 8px;"><?php echo COMPLETED?></label>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="form-group row noborder">     
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo DEPTNAME.":" ?> </label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
						<input type="text" value="<?php echo $_SESSION['deptname']; ?>"  size="64" class="inputtextbox form-control form-control-sm" readonly="yes" >
					</div>	
				   <div class="clearfix"></div>
				</div>
				<div class="form-group row noborder">     
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDIT." ".DATE.":" ?> </label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
					  <input type="text" value="<?php echo $_SESSION['date']; ?>" size="64" class="inputtextbox form-control form-control-sm" readonly="yes"></td>
				  </div>	
				   <div class="clearfix"></div>
				</div>
				<div class="form-group row noborder">     
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo AUDITORNAME.":" ?> </label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
					   <input type="text" value="<?php echo $_SESSION['aname']; ?>"  size="64" class="inputtextbox form-control form-control-sm"  readonly="yes">
					</div>	
				   <div class="clearfix"></div>
				</div>
				<div class="form-group row noborder">     
					<label class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-form-label"><?php echo NOTES_MSG.":" ?> </label>
					<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
						<textarea class="auto form-control" id="quetextarea" name="txtnote" cols="64" rows="8"><?php if(strpos($_SERVER['REQUEST_URI'],$pid)){echo $note;}?></textarea></td>
				  </div>	
				   <div class="clearfix"></div>
				</div>
			</div>
			<div class="clearfix"></div>
        </div>
      
         <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <?php if(strpos($_SERVER['REQUEST_URI'],'new'))
               {	
               $_SESSION['check']=1;
               $_SESSION['firsttime']=0;
                		?>
            <input class="greenBtn ui-state-default btn btn-success btn-sm" type="submit" value="<?php echo SAVE_B ?>"  name="cmdsave"  >	
            <?php
               }
               else
               {  
               $_SESSION['check']=0;
               ?>		
            <input class="btn btn-success btn-sm greenBtn ui-state-default " type="submit" value="<?php echo UPDATE ?>" name="cmdupdate"  >
            <?php
               }
               ?>
         </div>
     
      <input type="hidden" name="oldimg" id="oldimg"> 
   </form>
</div>

<div class="clearfix"></div>

</div>
</div>
<?php include("footer.php"); ?>
<script>
   function changeclr(id)
   {
   
   $(".opener"+id).removeClass( "blueBtn" ).addClass(" seaBtn").val('Edit');
   
   }
</script>
<script type="text/javascript" >
   $(document).ready(function() {
   	
   	$('.assign').click(function(){
   		var t=$(this).attr("imgold");
   		//alert(t);
   		$("#oldimg").val(t);
   		getimage();
   	});
   	
   $('.ui-state-default').click(function() {
   	
   $('.greenBtn').addClass(' beforeresponse'); 
   $('.greenBtn').removeClass('ui-state-default'); 
   $("#loading").html('<img src="images/loaders/loader8.gif">');
   $(".uploadform").ajaxForm({
   target: '.viewimage',
   success: function(data) {
   	
   	$('.greenBtn').removeClass('beforeresponse'); 
   	$('.greenBtn').addClass(' ui-state-default');
            if (data == 1)
   		 {
           window.location = "<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/"."updated/manage_audit"?>";
   		 }
   		 else if (data == 2)
   		 {
           window.location = "<?php echo $_SESSION['dname']."/".$_SESSION['uname']."/"."created/manage_audit"?>";
   		 }
   		 else
   		 {
   		 $("#loading").html('');
   		 }
           }
   }).submit();
   
   });
   
   });
</script>
<style>
   .beforeresponse
   {
   display:none;
   }
   #loading
   {
   display: block;
   height: auto;
   left:50%;
   outline: 0 none;
   position: fixed;
   top: 50%;
   z-index: 1002;
   }
</style>
<script>
   function getimage() {
   		var str =$('#oldimg').val();
          if (window.XMLHttpRequest) {
               // code for IE7+, Firefox, Chrome, Opera, Safari
               xmlhttp = new XMLHttpRequest();
			  
           } else {
               // code for IE6, IE5
               xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			    
           }
           xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				  
                   document.getElementById("txtHint"+str).innerHTML = xmlhttp.responseText;
               }
           };
           xmlhttp.open("GET","getimage.php?q="+str,true);
           xmlhttp.send();
       
   }
</script>