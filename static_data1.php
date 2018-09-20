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
		$interval_time = "-".$_REQUEST["three"];
	   $today_date = date("Y-m-d");
	   $interval_date = date("Y-m-d", strtotime($interval_time." month", strtotime($today_date)));
	   // var_dump($interval_time);
	   // var_dump($today_date);
	   // var_dump($interval_date);die;
       $record=$_REQUEST["three"];       
       if($suid == $uid)
{
      // $query="select distinct last_day(tp.pdate)as lastday,tp.pdate,
                // YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day,
       // sum(tpr.answer) AS ans from tbl_project AS tp,
       // tbl_project_review AS tpr where tp.tempid=".$_REQUEST["one"]." 
       // and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.status=1 and
               // tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC";
				
				// $query="select distinct last_day(tp.pdate)as lastday,tp.pdate,
                // YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day,
       // tpr.* from tbl_project AS tp inner join 
       // tbl_project_review AS tpr on tp.pid=tpr.pid where tp.tempid=".$_REQUEST["one"]." 
       // and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.status=1 order by tp.pdate DESC";
	   
	   // $query="select distinct last_day(tp.pdate)as lastday,tp.pid,tp.pdate,tp.tempid as template_id,tp.deptid as department_id,
                // YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day from tbl_project AS tp where tp.tempid=".$_REQUEST["one"]." 
       // and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.status=1 order by tp.pdate DESC";
	   
	   $query="select distinct last_day(tp.pdate)as lastday,tp.pid,tp.pdate,tp.tempid as template_id,tp.deptid as department_id,
                YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day from tbl_project AS tp where (tp.pdate BETWEEN '".$interval_date."' AND '".$today_date."') AND tp.tempid=".$_REQUEST["one"]." 
       and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.status=1 order by tp.pdate DESC";
	   
}
else
{    
    // $query="select distinct last_day(tp.pdate)as lastday,tp.pdate,
                // YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day,
       // sum(tpr.answer) AS ans from tbl_project AS tp,
       // tbl_project_review AS tpr where tp.tempid=".$_REQUEST["one"]." 
       // and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.uid=$uid and tp.status=1 and
               // tp.pid=tpr.pid group by tp.pid order by tp.pdate DESC";

			$query="select distinct last_day(tp.pdate)as lastday,tp.pid,tp.pdate,tp.tempid as template_id,tp.deptid as department_id,
                YEAR(tp.pdate)as year,MONTH(tp.pdate)as month,DAY(tp.pdate)as day from tbl_project AS tp where (tp.pdate BETWEEN '".$interval_date."' AND '".$today_date."') AND tp.tempid=".$_REQUEST["one"]." 
       and tp.deptid=".$_REQUEST["two"]." and tp.superadminid=$suid and tp.uid=$uid and tp.status=1 order by tp.pdate DESC";
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
       // echo $ms.",";                     
       $chart_array[] = ['Month','1S','2S','3S','4S','5S'];
		$chart_index = 1;
       while($row=mysqli_fetch_array($res))
       {      
			                      
           $m=$row["pdate"];          
           $month = date("M",strtotime($m))."-".date("y",strtotime($m));
		  
		   
		   $query1="select tpr.answer,tpr.queid from tbl_project_review AS tpr where pid=".$row['pid'];
		   $result=mysqli_query($sql,$query1);
		  
		   $i = 0;
		   $s = 1;
		   $total = 0;
		   
		   if(mysqli_num_rows($result)!=0)
		   {
			   $chart_array[$chart_index] = [$month];
		   }
		   while($row1=mysqli_fetch_array($result))
		   {
			   
			   // $chart_array[$chart_index] = $month;
			    // print_r($row1);
				$total = $total + $row1['answer'];
				$i++;
				if($i == 5 || $i == 10 || $i == 15 || $i == 20 || $i == 25)
				{
					array_splice( $chart_array[$chart_index],$s, 0, $total );
					$total = 0;
					$s++;
				}
				// print_r($chart_array);die;
		   }
		   // print_r($chart_array);
		   
		if(mysqli_num_rows($result)!=0)
		   {   
		$chart_index++;
		   }
       }
		// print_r($chart_array);	   
        echo json_encode($chart_array);                       
    }        
?>
    
