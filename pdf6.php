<?php
session_start();
if(!isset($_SESSION['uname'])){	header('location:login');}	
include("dbconnect.php");
include("language/language.php");   
include("mpdf/mpdf.php");
$uid=$_SESSION['uid'];
$suid=$_SESSION['said'];

	$str_explode = explode('/',$_SERVER['REQUEST_URI']);
	$count=count($str_explode);
	$pid = $str_explode[$count-2];
        
          $query2="select tp.pid,ad.deptname,tpr.answer,tq.* from tbl_questionanswer AS tq,
                  tbl_project_review as tpr,tbl_project AS tp,adddepartment AS ad,tbl_questionnair AS tque where tp.pid=tpr.pid and
                 tpr.pid='$pid' and tpr.qid=tque.qid and tq.`superadminid`=tq.uid and tq.`superadminid`=tpr.`superadminid` and
                  tp.qid=tq.qid and tpr.queid=tq.queid and ad.deptid=tp.deptid ";
                            $res2=mysqli_query($sql,$query2) or die(error());
                                $row2=mysqli_fetch_array($res2);   
                        while($row2=mysqli_fetch_array($res2)){
                            $pid1=$row2["pid"];
                        }
                                        
    $query1="select * from tbl_project where pid='$pid1'";
        $res1=mysqli_query($sql,$query1) or die(error());
    $row1=mysqli_fetch_array($res1);   
       $qid=$row1["qid"];
       
       $query2="select * from tbl_questionnair where qid=$qid";
                 $res2=mysqli_query($sql,$query2) or die(error());
    $row2=mysqli_fetch_array($res2);          
       
       $lid=$row2["lid"];
          
       if($lid=='4'){
           $sel='language/french.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='12'){
           $sel='language/russian.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='7'){
           $sel='language/italy.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='1'){
           $sel='language/chinese.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='8'){
           $sel='language/japanese.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='5'){
           $sel='language/german.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='14'){
           $sel='language/swedish.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='13'){
           $sel='language/spanish.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='2'){
           $sel='language/danish.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='3'){
           $sel='language/duch.ini';  
                loadLanguage($sel); 
       }
       elseif($lid=='11'){
           $sel='language/portugal.ini';  
                loadLanguage($sel); 
       }              
       elseif($lid=='6'){
           $sel='language/greek.ini';  
                loadLanguage($sel); 
       }
       else{
           $sel='language/english.ini';  
                loadLanguage($sel); 
       }
       
//$mpdf=new mPDF('en-x','Letter','12','Times',5,5,50,0,5,5); 
$mpdf=new mPDF('','Letter','10','dejavusans',0,0,0,0,0,0);
$footer='';
$mpdf->SetDisplayMode('default');
//$mpdf->SetAutoFont(AUTOFONT_ALL);
$mpdf->autoScriptToLang = true;
$mpdf->autoLangToFont = true;

$header='<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8">';

    if($lid=='1'){
    $header.='<body style="font-family:BIG5; width:100%;margin:0;">';
    }   
    elseif($lid=='8'){
        $header.='<body style="font-family:sjis; width:100%;margin:0;">';
    }
    else{
        $header.='<body style="width:100%;margin:0;">';
    }
    
$header.='<div style="float: left;width:100%;">
<div style="float:left; width:100%; background-color: #2e3a47;"><h1 style=" 
font-size:40px;margin:0; text-align:center;color:white;">5S Audit</h1></div>
<div style="float:left; width:100%; background-color:#4d5966; color:white;">
<div style="width:50%; float:left; ">';


/* $query="select tp.pid,tp.deptid,tp.tempid,tp.pdate,tp.auditedby,ad.deptname as deptname,at.tempname as tempname,at.auditorcname,tpr.answer,tq.* from tbl_questionanswer AS tq,
         tbl_project_review as tpr,tbl_project AS tp,adddepartment AS ad,addtemplate AS at where tp.pid=tpr.pid 
         and tpr.pid='$pid' and tq.qid=tpr.qid and tq.`superadminid`=tq.uid and tq.`superadminid`=tpr.`superadminid` and
          tp.deptid=ad.deptid  and at.tempid=tp.tempid ";   
	*/	  

                    $result=mysqli_query($sql,$query1) or die(mysqli_error($sql));
                    
					while($row=mysqli_fetch_array($result))
                     {
						 
                         $deptname=$row["deptname"];
                         $tname=$row["tempname"];
                         $auditorcname=$row["auditorcname"];
                         $date=$row["pdate"];
                         $pid=$row["pid"];
                         $aname=$row["auditedby"];
						 
					}   
					 
                    $header.='<h3 style="font-size: 20px;margin:5px 14px;font-weight:lighter;">';
                  
					$header.=DEPTNAME.":";                                                  
                    $header.=$deptname.'</h3><h3 style="font-size: 20px;margin:5px 14px;font-weight:lighter;">';
                    
                    $header.=COMPANY." ".NAME.":";                    
                    $header.=$auditorcname.'</h3></div><div style="width:50%; float:right;text-align:right;">
                              <h3 style="font-size:20px; margin:5px 14px; font-weight:lighter;">';
                    
                    $header.=DATE.":";
                    $header.=$date.'</h3><h3 style="font-size:20px; margin:5px 14px;font-weight:lighter;">';
                    
                    $header.=AUDITORNAME.":";
                    $header.=$aname.'</h3></div></div>';                                                                                                     
                //echo $header;
					$mpdf->SetHTMLHeader($header);
            
                    $sum=0;
                    $sum1=0;
                    $sum2=0;
                    $sum3=0;
                    $sum4=0;
                    $sum_final=0;                    
                    $i=0;
                                 
                    mysqli_query($sql,"set names 'utf8'");                                        
                    
            $query="select tp.pid,ad.deptname,tpr.answer,tq.* from tbl_questionanswer AS tq,
                  tbl_project_review as tpr,tbl_project AS tp,adddepartment AS ad,tbl_questionnair AS tque where tp.pid=tpr.pid and
                 tpr.pid='$pid' and tpr.qid=tque.qid and tq.`superadminid`=tq.uid and tq.`superadminid`=tpr.`superadminid` and
                  tp.qid=tq.qid and tpr.queid=tq.queid and ad.deptid=tp.deptid ";     
             
                                 $result=mysqli_query($sql,$query) or die(mysqli_error($sql)); 
                                                                                          
        while($row=mysqli_fetch_array($result))
        {                           
            if($i==0)
                    {
                        $html.=$header;
                    }
             if($i==5  || $i==10 || $i==15 || $i==20 )
                    {                                  
                 $html.='<tr style="width:10px;height:10px;">
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;"></td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;"></td>                                                                
                        <td style="text-align:right; padding:2px; font-size:18px;font-weight:bold; color:#303d4d;font-size:17px;border:1px solid #000000;padding:0 8px;">';
                 $html.=SUBTOTAL;
				 
                 $html.='</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum1.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum2.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum3.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum4.'</td>       
                        </tr>
                        </table>
                        </div>                                                
                                           
                       <div style="float:right;width:10%; position: absolute; bottom:0; right:0;">
                       <h2 style="border-left:0; text-align:center;font-size: 24px; font-weight: bold;
 border: 1px solid black;margin-left:4px;margin-top:0; padding:15px; background-color: #4d5966;color: white;">';
                       $html.=$sum_final;
                       $html.='</h2>
                       </div>';
                
                        $sum=0;
                        $sum1=0;
                        $sum2=0;
                        $sum3=0;
                        $sum4=0;             
                        $html.='</div>';                                                      
                    }
                                         
                    if($i==15)
                    {
                        $html.='<div style="float:left;width:100%;">';
                        $html.='<div style="text-align:center; margin-top:4px;">
			<span style="margin-left:10px;font-size: 23px;"> 0=';
        $html.=VERYBAD;
        $html.='</span>
			<span style="margin-left:10px;font-size: 23px;"> 1=';
        $html.=BAD;
        $html.='</span>                        
			<span style="margin-left:10px;font-size: 23px;"> 2=';
        $html.=AVERAGE;
        $html.='</span>
			<span style="margin-left:10px;font-size: 23px;"> 3=';
        $html.=GOOD;
        $html.='</span>
			<span style="margin-left:10px;font-size: 23px;"> 4=';
        $html.=VERYGOOD;
        $html.='</span>';
                        $html.='</div>';
                        $html.='</div>';

                         $html.='</div><pagebreak />';
                           $html.=$header;
                    }                     
                                                                              
              if($i==0 || $i==5 || $i==10 || $i==15 || $i==20)
                    {                                                                                                                                                                              
                    $html.='<div  style="float:left; width: 100%; position:relative; ">';               
                    $html.='<div  style="margin-top:0; float:left; width:90%; ">';   
                                        
                         if($lid=='1'){
  $html.='<table  style="font-family:BIG5; margin-left:4px; margin-top:0;height:150px; border-collapse:collapse;width:100%;border:2px solid black;">';
                        }             
                        elseif($lid=='8'){
$html.='<table  style="font-family:sjis; margin-left:4px; margin-top:0;height:150px; border-collapse:collapse;width:100%;border:2px solid black;">';                            
                        }
                        else{
  $html.='<table  style="margin-left:4px; margin-top:0;height:150px; border-collapse:collapse;width:100%;border:2px solid black;">';
                        }
                   $html.='<tr>';
                        if($i==0)
                            {                                
                            $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d; border: 1px solid #000000;padding: 0 8px;">1S</th>';                            
                            }                           
                          else if($i==5)
                          {                              
                           $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;border: 1px solid #000000;padding: 0 8px;">2S</th>';                           
                          }                          
                            else if($i==10)
                          {                              
                            $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;
                                border: 1px solid #000000;padding: 0 8px;">3S</th>';                           
                          }                          
                            else if($i==15)
                          {                             
                           $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;
                               border: 1px solid #000000;padding: 0 8px;">4S</th>';                            
                          }                         
                            else if($i==20)
                          {                              
                           $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;
                               border: 1px solid #000000;padding: 0 8px;">5S</th>';                            
                          }
                          
                          
                          if($lid=='8'){                          
                        $html.='<th rowspan="2" style="width:5%; word-wrap:break-word;  background-color: #9cabb2;font-weight: bold;font-size: 20px;color: #303d4d;border: 1px solid #000000;">';
                        $html.='#';
                        $html.='</th>';
                          }
                          else{
                        $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;border: 1px solid #000000;padding: 0 8px;">';
                        $html.='#';
                        $html.='</th>';
                          }
                            
                         if($lid=='8'){                       
                       $html.='<th rowspan="2" style="width:15%; word-wrap:break-word;  background-color: #9cabb2;font-weight: bold;font-size: 20px;color: #303d4d;border: 1px solid #000000;">';
                        $html.=CHECKITEM;
                        $html.='</th> ';
                         }
                         else{
                        $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;border: 1px solid #000000;padding: 0 8px;">';
                        $html.=CHECKITEM;
                        $html.='</th> ';
                         }
                         if($lid=='8'){  
                       $html.='<th rowspan="2" style="width:50%; word-wrap:break-word;background-color: #9cabb2;font-weight: bold;font-size: 20px;text-align: center;color: #303d4d;border: 1px solid #000000;">';
                        $html.=DESCRIPTION;
                        $html.='</th>';
                         }
                         else{
                        $html.='<th rowspan="2" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;border: 1px solid #000000;padding: 0 8px;">';
                        $html.=DESCRIPTION;
                        $html.='</th>';
                         }
                         if($lid=='8'){
                             $html.='<th colspan="5" style="background-color: #9cabb2;font-weight: bold;font-size: 20px;text-align: center;color: #303d4d;border: 1px solid #000000;">';
                        $html.=SCORE;
                        $html.='</th>';
                         $html.='</tr><tr>
                            <td style="text-align:center;width:25px;font-size:15px;font-weight:bold;border:1px solid #000000;padding:0 8px;">0</td>
                            <td style="text-align:center;width:25px;font-size:15px;font-weight:bold;border:1px solid #000000;padding:0 8px;">1</td>                      
                            <td style="text-align:center;width:25px;font-size:15px;font-weight:bold;border:1px solid #000000;padding:0 8px;">2</td>
                            <td style="text-align:center;width:25px;font-size:15px;font-weight:bold;border:1px solid #000000;padding:0 8px;">3</td>
                            <td style="text-align:center;width:25px;font-size:15px;font-weight:bold;border:1px solid #000000;padding:0 8px;">4</td>                            
                       </tr>';
                         }
                         else{
                           $html.='<th colspan="5" style="background-color: #9cabb2;font-weight: bold;font-size: 24px;text-align: center;color: #303d4d;border: 1px solid #000000;">';
                        $html.=SCORE;
                        $html.='</th>';
                         
                           $html.='</tr><tr>
                            <td style="text-align:center;width:25px;font-size:17px;font-weight:bold;border:1px solid #000000;padding:0 8px;">0</td>
                            <td style="text-align:center;width:25px;font-size:17px;font-weight:bold;border:1px solid #000000;padding:0 8px;">1</td>                      
                            <td style="text-align:center;width:25px;font-size:17px;font-weight:bold;border:1px solid #000000;padding:0 8px;">2</td>
                            <td style="text-align:center;width:25px;font-size:17px;font-weight:bold;border:1px solid #000000;padding:0 8px;">3</td>
                            <td style="text-align:center;width:25px;font-size:17px;font-weight:bold;border:1px solid #000000;padding:0 8px;">4</td>                            
                       </tr>';
                         }
                        if($i < 5 )
                        {                        
                        $html.='<tr>
                        <td rowspan="7" style="margin-top: 0px;padding:0 15px; width:30px; height:50px; vertical-align:top; color: #303d4d;font-size:17px;font-weight:bold;">';
                        if (defined('S1')) {
                          $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';                        
                            //echo S1;                        
                        $html.=S1.'</h5>';
                            }
                            if (defined('O1')) {
                            $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                        $html.=O1.'</h5>';
                            }
                            if (defined('R1')) {
                            $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                        $html.=R1.'</h5>';
                            }
                            if (defined('T1')) {
                         $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                        $html.=T1.'</h5>';
                            }
                            $html.='</td>
                        </tr>';  
                        }
                        else if($i < 10 )
                        {                        
                         $html.='<tr>
                          <td rowspan="7" rowspan="7" style="margin-top: 0px;padding:0 15px; width:30px; height:50px; vertical-align:top; color: #303d4d;font-size:17px;font-weight:bold;">';
                         if (defined('S2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=S2.'</h5>';
                         }
                         if (defined('E2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=E2.'</h5>';
                             }
                             if (defined('T2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=T2.'</h5>';
                             }
                             if (defined('I2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=I2.'</h5>';
                             }
                             if (defined('N2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=N2.'</h5>';
                             }
                             if (defined('O2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=O2.'</h5>';
                             }
                             if (defined('R2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=R2.'</h5>';
                             }
                             if (defined('D2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=D2.'</h5>';
                             }
                         if (defined('E2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=E2.'</h5>';
                             }
                             if (defined('R_2')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=R_2.'</h5>';
                             }
                             
                             $html.='</td>
                       </tr>';                        
                        }
                        else if($i < 15)
                        {                            
                         $html.='<tr>
                           <td rowspan="7" rowspan="7" style="margin-top: 0px;padding:0 15px; width:30px; height:50px; vertical-align:top; color: #303d4d;font-size:17px;font-weight:bold;" >';
                         if (defined('S3')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=S3.'</h5>';
                             }
                             if (defined('H3')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=H3.'</h5>';
                             }
                             if (defined('I3')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=I3.'</h5>';
                             }
                             if (defined('N3')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=N3.'</h5>';
                             }
                             if (defined('E3')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=E3.'</h5>';
                             }
                              $html.='</td>
                           </tr>';                        
                        }
                        else if($i < 20)
                        {                            
                              $html.='<tr>
                            <td rowspan="7" rowspan="7" style="margin-top: 0px;padding:0 15px; width:30px; height:50px; vertical-align:top; color: #303d4d;font-size:17px;font-weight:bold;">';                              
                            if (defined('S4')) {
                             $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=S4.'</h5>';
                            }
                            if (defined('T4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=T4.'</h5>';
                                  }
                                  if (defined('A4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=A4.'</h5>';
                                  }
                                  if (defined('N4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=N4.'</h5>';
                                  }
                                  if (defined('D4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=D4.'</h5>';
                                  }
                                  if (defined('A_4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=A_4.'</h5>';
                                  }
                                  if (defined('R4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=R4.'</h5>';
                                  }
                                  if (defined('D_4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=D_4.'</h5>';
                                  }
                                  if (defined('I4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=I4.'</h5>';
                                  }
                                  if (defined('S_4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=S_4.'</h5>';
                                  }
                                  if (defined('E4')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                              $html.=E4.'</h5>';
                                  }
                                $html.='</td>
                            </tr>';
                        }
                        else if($i < 25)
                        {                            
                         $html.='<tr>
                            <td rowspan="7" rowspan="7" style="margin-top: 0px;padding:0 15px; width:30px; height:50px; vertical-align:top; color: #303d4d;font-size:17px;font-weight:bold;">';
                        if (defined('S5')) {                         
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=S5.'</h5>';
                        }
                        if (defined('U5')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=U5.'</h5>';
                             }
                             if (defined('S_5')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=S_5.'</h5>';
                             }
                             if (defined('T5')) {
                                $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=T5.'</h5>';
                             }
                             if (defined('A5')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=A5.'</h5>';
                             }
                             if (defined('I5')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=I5.'</h5>';
                             }
                             if (defined('N5')) {
                              $html.='<h5 style="font-size:20px;font-weight:bold;margin:0;text-transform:capitalize;">';
                         $html.=N5.'</h5>';
                             }
                                $html.='</td>
                        </tr>';                        
                        }                      
                    }                
                  
                    
                    $html.='<tr>
                         <td style="text-align:center;width:25px;font-size:15px;border:1px solid #000000;padding:0 8px;">'.$row[queid].'</td>';                                                                                        
                    
          if($lid=='1')
                    {                    
                                   $html.='<td style="font-family:BIG5; width:150px;font-size:15px;border:1px solid #000000;padding:0 8px;">'.$row[checkitem].'</td>
                                    <td style="font-family:BIG5; width: 373px; margin:3px; padding:5px;font-size:15px;border:1px solid #000000;padding:0 8px;">'.$row[description].'</td>';
                    }  
         elseif($lid=='8'){
                    $html.='<td style="font-family:sjis; width:15%; word-wrap:break-word;font-size:13px;border:1px solid #000000;padding:0 8px;">'.$row[checkitem].'</td>
                             <td style="font-family:sjis; width:50%; word-wrap:break-word; margin:3px; padding:5px;font-size:13px;border:1px solid #000000;padding:0 8px;">'.$row[description].'</td>';
         }
               else{  
                   $html.='<td style=" width:150px;font-size:15px;border:1px solid #000000;padding:0 8px;">'.$row[checkitem].'</td>
                      <td style="width:373px; margin:3px; padding:5px;font-size:15px;border:1px solid #000000;padding:0 8px;">'.$row[description].'</td>';
               }
               
                 
                                  $html.='<td style="width: 30px;font-size:15px;border:1px solid #000000;padding:0 8px;">';
                                  
                                  if($i >= 0){
                                    if($row[answer] == 0)
                                    {
                                        $sum+=0;
                                        $html.='<img src="http://166.78.47.59/5s/images/icons/dark/accept.jpg" style="height:30px;width:25px;">';                                                                                                                                                                                     
                                    }
                                    $html.='</td>';
                                       
                                    $html.='<td style="width: 30px;font-size:17px;border:1px solid #000000;padding:0 8px;">';
                                    if($row[answer] == 1)
                                    {                                                                                                                            
                                        $sum1+=1;
                                        $html.='<img src="http://166.78.47.59/5s/images/icons/dark/accept.jpg" style="height:30px;width:25px;">';
                                    }
                                    $html.="</td>";
                                    
                                    $html.='<td style="width:30px;font-size:17px;border:1px solid #000000;padding:0 8px;">';
                                    if($row[answer] == 2)
                                    {
                                        $sum2+=2;
                                        $html.='<img src="http://166.78.47.59/5s/images/icons/dark/accept.jpg" style="height:30px;width:25px;">';                                        
                                    } 
                                    $html.="</td>";
                                    
                                    $html.='<td style="width:30px;font-size:17px;border:1px solid #000000;padding:0 8px;">';
                                    if($row[answer] == 3)
                                    {
                                        $sum3+=3;
                                        $html.='<img src="http://166.78.47.59/5s/images/icons/dark/accept.jpg" style="height:30px;width:25px;">';
                                    }
                                    $html.="</td>";
                                    
                                    $html.='<td style="width:30px;font-size:17px;border:1px solid #000000;padding:0 8px;">';
                                    if($row[answer] == 4)
                                    {
                                       $sum4+=4;
                                        $html.='<img src="http://166.78.47.59/5s/images/icons/dark/accept.jpg" style="height:30px;width:25px;">';
                                    }
                                  }
                                    $html.='</td>
                                    </tr>';  
                    
                                    $sum_final=$sum+$sum1+$sum2+$sum3+$sum4;
                                    
                                    
                                              
                              
                     if($i==24)
                    {                                  
                 $html.='<tr style="width:10px;height:10px;">
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;"></td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;"></td>                                                                
                        <td style="text-align:right; padding:2px; font-size:18px;font-weight:bold; color:#303d4d;font-size:17px;border:1px solid #000000;padding:0 8px;">';
                  $html.=SUBTOTAL;
                  $html.='</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum1.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum2.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum3.'</td>
                        <td style="text-align:center; width:25px;font-size:17px;border:1px solid #000000;padding:0 8px;">'.$sum4.'</td>       
                        </tr>
                        </table>
                        </div>                                                
                                           
                       <div style="float:right;width:10%; position: absolute; bottom:0; right:0;">
                       <h2 style="text-align:center;font-size: 26px; font-weight: bold;
    border: 1px solid black;margin-left:4px;margin-top:0; margin-bottom:0px;padding:15px; background-color: #4d5966;color: white;">';
                       $html.=$sum_final;
                       $html.='</h2>
                       </div>';
                
//                        $sum=0;
//                        $sum1=0;
//                        $sum2=0;
//                        $sum3=0;
//                        $sum4=0;             
                        $html.='</div>';                                                      
                    }   
                    echo $i;
                     $i++;
                                                                                      
        }             
               
            $sqlq="select * from tbl_project where pid='$pid'";
        
	$result=mysqli_query($sql,$sqlq) or die(mysqli_error($sql));		
	while($row=mysqli_fetch_array($result))
	{	
		$tid=$row['tempid'];
		$did=$row['deptid'];
		$dt=$row['pdate'];
	}  
        $html= $html .'<div style="float:left;width:100%; margin-top:7px;">';
	$html= $html .'<div style="margin:0px auto;width:100%;">';
		$html= $html .'<div style="float:left;width:100%;">';//f_bottom open
			$html= $html .'	<div style="float:left;width:50%;">';	//f_left open
                                                
 $sqlq="select * from tbl_project  where pid='$pid'";
                        
				$result=mysqli_query($sql,$sqlq) or die(mysqli_error($sql));		
				while($row=mysqli_fetch_array($result))
				{
					$pid=$row['pid'];
					$aclogo=$row['auditorclogo'];
					$cclogo=$row['clientclogo'];
					$note=$row['notes'];
				}				
                        $path="http://".$_SERVER["HTTP_HOST"]."/own_logo/".$aclogo;
                        $folder= "http://".$_SERVER["HTTP_HOST"]."/own_logo/"; 
			$path1=$folder.$cclogo;		
                        
			$html= $html .'<div  style="float: left; margin-left:4px;">';
			if($aclogo != '')
			{                                 
                            $data = getimagesize($path);
$width = $data[0];
$height = $data[1];



 $actualWidth = $width;
 $actualHeight = $height;
 $imgRatio = $actualWidth/$actualHeight;
 $maxRatio = 100.0/100.0;

if($imgRatio!=$maxRatio){
if($imgRatio < $maxRatio){
$imgRatio = 100.0 / $actualHeight;
$actualWidth2 = $imgRatio * $actualWidth;
$actualHeight2 = 100.0;
}
else{
$imgRatio = 100.0 / $actualWidth;
$actualHeight2 = $imgRatio * $actualHeight;
$actualWidth2 = 100.0;
}
}

				// $html= $html .'<img id="img1" src="'.$path.'" width="'.$actualWidth2.'" height="'.$actualHeight2.'" />';
				$html= $html .'<img id="img1" src="'.$path.'" width="80px" height="80px" />';
			}
                        
			if($cclogo != '')
			{
                            
 list($width1, $height1) = getimagesize($path1);
	 
 $actualWidth1 = $width1;
 $actualHeight1 = $height1;
 $imgRatio1 = $actualWidth1/$actualHeight1;
 $maxRatio1 = 100.0/100.0;

if($imgRatio1!=$maxRatio1){
if($imgRatio1 < $maxRatio1){
$imgRatio1 = 100.0 / $actualHeight1;
$actualWidth3 = $imgRatio1 * $actualWidth1;
$actualHeight3 = 100.0;
}
else{
$imgRatio1 = 100.0 / $actualWidth1;
$actualHeight3 = $imgRatio1 * $actualHeight1;
$actualWidth3 = 100.0;
}
}
				// $html= $html .'<img id="img2" name="cimg" style="margin-left:50px;" src="'.$path1.'" width="'.$actualWidth3.'" height="'.$actualHeight3.'" />';
				$html= $html .'<img id="img2" name="cimg" style="margin-left:50px;" src="'.$path1.'" width="80px" height="80px" />';
			}
                        
			$html.='</div>';
		$html= $html .'</div>';//f_left close
		
		$html= $html .'<div style="float:right;width:50%;">'; //f_right open                
$sqlq="select SUM(answer) AS OrderTotal from tbl_project_review where pid='$pid'";
                
			$rs=mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
			while($row=mysqli_fetch_array($rs))
			{
				$ans=$row['OrderTotal'];
			}
                        
			$html.='<img name="btm" src="http://166.78.47.59/5s/images/box.jpg"/>';
                        
                        if($lid=='1' || $lid=='8'){                        
                        $html.='<div style="color: #303D4D;float: left;width:38%; margin-top:-80px;margin-left:20px;
                                        font-size: 28px; text-align: center;">';
                        }
                        elseif ($lid=='20' || $lid=='2' || $lid=='4'  || $lid=='12'  || $lid=='14'  || $lid=='11') {
                            $html.='<div style="color: #303D4D;float: left;width:38%; margin-top:-95px;margin-left:20px;
                                        font-size: 28px; text-align: center;">';
                        }
                        else{
                            $html.='<div style="color: #303D4D;float: left;width:38%; margin-top:-115px;margin-left:20px;
                                        font-size: 28px; text-align: center;">';
                        }
			$html.= GRANDTOTAL." ".SCORE;
			$html.= '</div>';
			$html.='<div style="color: #303D4D;float:left;width:62%;font-size: 48px;margin-top:-95px; margin-left:160px; text-align: center;">';
			$html.= $ans;	
			$html.='</div>';
		$html= $html .'</div>';//f_right close
	
	$html= $html .'</div>';//f_bottom close
        
            $sqlq="select * from tbl_project AS tp,tbl_questionnair AS tque,tbl_questionanswer AS tq where tp.tempid='$tid'
  and tp.deptid='$did' and tp.pdate<'$dt' and tp.qid=tq.qid and tp.qid='$qid' ORDER BY `pdate` ASC";
                 
	 $rs=mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
	 while($row=mysqli_fetch_array($rs))
	 {
		$new_pid= $row['pid'];
	 }	
	 if(isset($new_pid) )
	 {             
                 $sqlq="select SUM(answer) AS OrderTotal from tbl_project_review where pid='$new_pid' ";
             
		$rs=mysqli_query($sql,$sqlq) or die(mysqli_error($sql));
		while($row=mysqli_fetch_array($rs))
		{	
			$a=$row['OrderTotal'];
		}
	}	
	if(isset($a))
	{
		$diff = $a - $ans;
		$avg = ($a + $ans) / 2;
		$divide = $diff / $avg ;
		$percentchange =$divide * 100;
		$absolute_pchange= abs($percentchange);
		$abs_pchange=round($absolute_pchange,2);
	}
      
	$html= $html .'<div style="float:right;width:50%;">';
		if(isset($new_pid))
		{	 
			$html= $html .'<div style="color:#303D4D;float:left;font-size:16px;width: 50%;">';
			$html.=PREVIOUSTOTAL.":";
			$html.= $a;
			$html.='</div>';
		}
		if(isset($a))
		{   
			$html= $html .'<div style="color:#303D4D;float:left;font-size:16px;">';
			$html.= PERCENTCHANGE.":";
			$html.= $abs_pchange;
			$html.='%  </div>';
		}
	$html= $html .'</div>';

	$html= $html .'<div style="float:left;width:100%; margin-top:0;margin-left:4px;">';
		$html= $html .'<span style="font-weight:bold;font-size: 25px;">';
               $html.= NOTES_MSG.":".'</span>';
	$html= $html .'</div>';
	$html= $html .'<div style="float:left;width:100%;margin-left:4px;" >';
		$html= $html .'<textarea rows="8" cols="110" style="border:3px grey solid;">';
		$html.= $note;
		$html.='</textarea>';
	$html= $html .'</div>';
	
	$html= $html .'<div style="float:left;width:100%;">';
	$html= $html .'	<div style="text-align:center; margin-top:4px;">
			<span style="margin-left:10px;font-size: 23px;"> 0=';
        $html.=VERYBAD;
        $html.='</span>
			<span style="margin-left:10px;font-size: 23px;"> 1=';
        $html.=BAD;
        $html.='</span>                        
			<span style="margin-left:10px;font-size: 23px;"> 2=';
        $html.=AVERAGE;
        $html.='</span>
			<span style="margin-left:10px;font-size: 23px;"> 3=';
        $html.=GOOD;
        $html.='</span>
			<span style="margin-left:10px;font-size: 23px;"> 4=';
        $html.=VERYGOOD;
        $html.='</span>';
		$html= $html .'</div>';
	$html= $html .'</div>';

	$html= $html .'</div>';
	$html= $html .'</div>';

$footer='</body></html>';
 //echo $html;exit;
$mpdf->SetHTMLFooter($footer);              

  $mail_html= $html;
 //echo $mail_html;
 //exit;
//$mpdf->WriteHTML(utf8_encode($mail_html));
$mpdf->WriteHTML($mail_html);

            $dir="pdfs";                       
            $name_of_pdf =$dir.'/'.$pid.'.pdf';
            if(file_exists($dir))
            {
                if(file_exists($name_of_pdf))
		{
			//delete and recreate it
			unlink($name_of_pdf);
			$mpdf->Output($name_of_pdf,'D');
		}
		else
		{
			$mpdf->Output($name_of_pdf,'D');
		}
            }
            else
	{
		mkdir($dir);
		$mpdf->Output($name_of_pdf,'D');
	}                
?>
<script>
//window.open("www.google.com");
window.open("<?php echo "pdfs".'/'.$pid.'.pdf' ?>");
window.location="<?php echo $_SERVER['HTTP_REFERER']; ?>";
</script>