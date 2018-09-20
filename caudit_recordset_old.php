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
		while($row=mysqli_fetch_array($result))
		{
			 $a[$i]=$row['answer'];
			
			$pid=$row['pid'];
			 $i++;
			  $_SESSION['pid']=$pid;
			  $flagt=1;
		}	
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
		while(j<=25 && j<x.length)
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
		k=26,subtotal=0;
		while(k<=56 && k<x.length)
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
		p=57,subtotal=0;
		while(p<=87 && p<x.length)
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
		q=88,subtotal=0;
		while(q<=118 && q<x.length)
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
		r=119,subtotal=0;
		while(r<=149 && r<x.length)
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
<div class="content">
    <form action="addprojectreview.php" method="post"  name="frm">
    	<div class="title"><h5><?php echo CREATEAUDIT ?></h5></div>
		<div class="widget">
			<div class="head"><h5 class="iFrames"><?php echo SQUES ?></h5></div>
			<input type="hidden" value="<?php echo $pid;?>" name="txthid" />
            <table id="CRZNaN" class="tableStatic resize CRZ" width="100%" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <td style="width: 20%;font-weight: bold;"><?php echo CHECKITEM ?></td>
                        <td style="width: 60%;font-weight: bold;"><?php echo DESCRIPTION ?></td>
                        <td style="width: 18%;font-weight: bold;"><?php echo SCORE ?>
                            <p>
                                <img src="images/0.png">
                                <img src="images/1.png">
                                <img src="images/2.png">
                                <img src="images/3.png">
                                <img src="images/4.png">
                            </p>
                        </td>
                  	</tr>
            	</thead>
				<?php
                $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                $count=count($str_explode);
                $qid = $str_explode[$count-3];
                mysqli_query($sql,"set names 'utf8'") or die(mysqli_error($sql));
                $sqlq="select * from tbl_questionanswer where superadminid = '".$_SESSION['said']."' and qid = $qid  ";
                $result=mysqli_query($sql,$sqlq);
                $i=1;
                while($row=mysqli_fetch_array($result))
                {
                $id=$row['queid'];
                ?>
				<tbody>	
                    <tr>
                        <td align="center" ><?php echo $row['checkitem']; ?></td>
                        <td align="center" ><?php echo $row['description'];?></td>
                        <td align="center" >
                            <input type="radio" id="total" name="<?php echo $i; ?>" value="0" checked="checked" >
                            <input type="radio" id="total" name="<?php echo $i; ?>" value="1" onClick="return calculateTotal();"     
                            <?php if(isset($flagt)){if($a[$i]=='1') {echo 'checked="checked"';}} ?>>
                            <input type="radio" id="total" name="<?php echo $i; ?>" value="2" onclick="return calculateTotal();"
                            <?php if(isset($flagt)){if($a[$i]=='2') {echo 'checked="checked"';}} ?>>
                            <input type="radio" id="total" name="<?php echo $i; ?>" value="3" onClick="return calculateTotal();" 
                            <?php if(isset($flagt)){if($a[$i]=='3') {echo 'checked="checked"';}} ?>>
                            <input type="radio" id="total" name="<?php echo $i; ?>" value="4" onClick="return calculateTotal();"
                            <?php if(isset($flagt)){if($a[$i]=='4') {echo 'checked="checked"';}} ?>>
                        </td>
                    </tr>	
				<?php
               	if($i==5 || $i==10 || $i==15 || $i==20 || $i==25)
                {
                ?>
                 	<tr>
                    	<td style="text-align:right" colspan="2"><label><?php echo SUBTOTAL ?></label></td>
                        <td>
                   			<input type="text" id="st1_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
                            <input type="text" id="st2_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
                            <input type="text" id="st3_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
                            <input type="text" id="st4_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />
                            <input type="text" id="st5_<?php echo $i?>" size="1" readonly="yes"  class="questotal" />														
                    	</td>
                	</tr>
                    <tr>
                    	<td colspan="3">
                        	<div style="float: right;margin-right: 5px;">
                            	<label style="font-size:18px;margin-right: 5px;" ><?php echo TOTAL ?></label>
                                <input readonly="yes"  type="text" id="total_<?php echo $id?>" size="1" name="stotal" class="quetotal">
                            </div>
                     	</td>
                  	</tr>
				</tbody>		
				<?php		
                }
                $i++;
                }
                ?>	
			</table>
            <div class="fix"></div>
		</div>
        					
		<div class="title" style="margin-top:35px;"><h5><?php echo SAUDITSCORE ?></h5></div>		
		<div class="widget">
			<div class="head"><h5 class="iFrames"><?php echo SAUDIT ?></h5>
				<div style="float: right;">
					<label style="font-size: 20px;margin-right: 5px;"><?php echo GRANDTOTAL ?></label>
					<input readonly="yes" type="text" id="gtotal" size="1" class="quegrandtotal" />					
				</div>
			</div>
			<table id="CRZNaN" class="tableStatic resize CRZ" width="100%" cellspacing="0" cellpadding="0">
				<tbody>
				<tr>
					<td class="quesetlabel"><?php echo AUDITSTATUS.":" ?></td>
					<td>
						<input type="radio" value="In_Progress" name="status1" checked="checked">
						<label style="float: left;margin-top: 3px;margin-right: 20px;"><?php echo INPROG ?></label>
						<input type="radio"  value="Completed" <?php if($status=='Completed' || $status=='0') {echo 'checked="checked"';}?>  name="status1" >
						<label style="float: left;margin-top: 3px;"><?php echo COMPLETED?></label>	
					</td>
				</tr>
				<tr>
					<td class="quesetlabel"><?php echo DEPTNAME.":" ?></td> 
					<td><input type="text" value="<?php echo $_SESSION['deptname']; ?>"  size="64" class="inputtextbox" readonly="yes" ></td>
				</tr>
				<tr>
					<td class="quesetlabel"><?php echo AUDIT." ".DATE.":" ?></td>
					<td><input type="text" value="<?php echo $_SESSION['date']; ?>" size="64" class="inputtextbox" readonly="yes"></td>
				</tr>
				<tr>
					<td class="quesetlabel"><?php echo AUDITORNAME.":" ?></td>
					<td><input type="text" value="<?php echo $_SESSION['aname']; ?>"  size="64" class="inputtextbox"  readonly="yes"></td>
				</tr>
				<tr>
					<td class="quesetlabel"><?php echo NOTES_MSG.":" ?></td>
					<td><textarea class="auto" id="quetextarea" name="txtnote" cols="64" rows="8"><?php if(strpos($_SERVER['REQUEST_URI'],$pid)){echo $note;}?></textarea></td>
				</tr>
			</tbody>
		</table>
			
            <div class="fix"></div>
	  </div>
      <?php if(strpos($_SERVER['REQUEST_URI'],'new'))
			{	
    		?>		
				<input class="greenBtn " type="submit" value="<?php echo SAVE_B ?>" style="float: left; margin: 10px  365px;" name="cmdsave" >	
			<?php
			}
			else
			{   
			?>		
				<input class="greenBtn " type="submit" value="<?php echo UPDATE ?>" style="float: left; margin: 10px  365px;" name="cmdupdate" >
			<?php
            }
            ?>
	</form>
</div> 
<div class="fix"></div>
</div>
<?php include("footer.php"); ?>