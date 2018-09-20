<?php   
session_start();
include_once("dbconnect.php");  
$suid=$_SESSION['said'];
$uid=$_SESSION['uid'];
$first_day=date('Y-m-d',(strtotime('this month',strtotime(date('Y-m-01')))));

if($suid==$uid){
$query="select * from tbl_settings where `key` = 'chart_default' and `superadminid`=$suid and uid=$suid ";
}
else{
    $query="select * from tbl_settings where `key` = 'chart_default' and `superadminid`=$suid and uid=$uid  ";
}
$result=mysqli_query($sql,$query);

if(mysqli_num_rows($result)==0)
            {
                echo "1";    
                die;
            }
while($row=mysqli_fetch_array($result))
    {
        $val=$row["value"];
        $split=explode(",",$val);        
        $s1=$split[0];
    $s2=$split[1];
    $s3=$split[2];
    }
if($s1==0 || $s2==0 || $s3==0 )
{    
   echo "1";   
}
else 
    {             
    if($suid == $uid)
{
       $query="select distinct last_day(tp.pdate)as lastday,tp.pdate,YEAR(tp.pdate)as year,
                MONTH(tp.pdate)as month,DAY(tp.pdate)as day,sum(tpr.answer) AS ans
                from tbl_project AS tp,tbl_project_review AS tpr
       where tp.pdate < subdate('$first_day' , INTERVAL '0' MONTH)
           and tp.pdate > subdate('$first_day', INTERVAL '$s3' MONTH)
        and tp.tempid=$s1 and tp.deptid=$s2 
        and tp.status=1 and tp.superadminid='$suid' and tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC";        
}
else{
    $query="select distinct last_day(tp.pdate)as lastday,tp.pdate,YEAR(tp.pdate)as year,
                MONTH(tp.pdate)as month,DAY(tp.pdate)as day,sum(tpr.answer) AS ans
                from tbl_project AS tp,tbl_project_review AS tpr
       where tp.pdate < subdate('$first_day' , INTERVAL '0' MONTH)
           and tp.pdate > subdate('$first_day', INTERVAL '$s3' MONTH)
    and tp.tempid=$s1 and tp.deptid=$s2 
        and tp.status=1 and tp.superadminid='$suid' and tp.uid=$uid and tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC";        
    
}

            $res=mysqli_query($sql,$query) or die(mysqli_error($sql));      
            
            if(mysqli_num_rows($res)==0)
            {
                echo "2";
                die;      //similar to exit
            }
       $ms="Month_Score";              
       $score="";
       $final="";
       $m="";   
       echo $ms.",";               
       
       while($row=mysqli_fetch_array($res))
       {                           
           $score = $row["ans"];                      
           $m=$row["pdate"];                     
           $month = date("M",strtotime($m))."-".date("y",strtotime($m));          
              $final.=$month."_".$score.",";                                                                                                   
       }                                    
        echo substr($final,0,-1);                       
    }          
?>
    