<?php   
session_start();
include_once("dbconnect.php");  
$suid=$_SESSION['said'];
$uid=$_SESSION['uid'];

$first_day=date('Y-m-d',(strtotime('this month',strtotime(date('Y-m-01')))));
//echo $first_day;

if(isset($_REQUEST["one"]) && $_REQUEST["one"]==0)
{
   echo "1";   
}
else if(isset($_REQUEST["one"]) && isset($_REQUEST["two"]) && isset($_REQUEST["three"]))
    {    
       $record=$_REQUEST["three"];       
       if($suid == $uid)
{
      // $query="select distinct last_day(tp.pdate)as lastday,tp.pdate,
                // YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day,
       // sum(tpr.answer) AS ans from tbl_project AS tp,
       // tbl_project_review AS tpr where tp.pdate < subdate('$first_day' , INTERVAL '0' MONTH)
           // and tp.pdate > subdate('$first_day', INTERVAL '$record' MONTH)
         // and tp.tempid=".$_REQUEST["one"]." 
       // and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.status=1 and
               // tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC";
		$query="select distinct last_day(tp.pdate)as lastday,tp.pdate,
                YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day,
       sum(tpr.answer) AS ans from tbl_project AS tp,
       tbl_project_review AS tpr where tp.tempid=".$_REQUEST["one"]." 
       and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.status=1 and
               tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC";
}
else
{    
    // $query="select distinct last_day(tp.pdate)as lastday,tp.pdate,
                // YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day,
       // sum(tpr.answer) AS ans from tbl_project AS tp,
       // tbl_project_review AS tpr where tp.pdate < subdate('$first_day' , INTERVAL '0' MONTH)
        // and tp.pdate > subdate('$first_day', INTERVAL '$record' MONTH)
        // and tp.tempid=".$_REQUEST["one"]." 
       // and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.uid=$uid and tp.status=1 and
               // tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC"; 
	$query="select distinct last_day(tp.pdate)as lastday,tp.pdate,
                YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day,
       sum(tpr.answer) AS ans from tbl_project AS tp,
       tbl_project_review AS tpr where tp.tempid=".$_REQUEST["one"]." 
       and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.uid=$uid and tp.status=1 and
               tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC";
}
     
            //echo $query;
			$res=mysqli_query($sql,$query);                              
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
           //$y=$row["extract_year"];
          // $yy=$y.ToString("yy");
           $month = date("M",strtotime($m))."-".date("y",strtotime($m));       
           //$month .= date("y",strtotime($m));           
              $final .= $month."_".$score.",";                                                                                        
       }                                    
        echo substr($final, 0,-1);                       
    }        
?>
    
