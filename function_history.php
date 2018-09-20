<?php

/**
 * @link: http://www.Awcore.com/dev
 */
 
   function pagination($query, $per_page = 10,$page = 1){ 
		include("dbconnect.php");
    	$query = "SELECT COUNT(*) as `num` FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($sql,$query));
    	$total = $row['num'];
        $adjacents = "2"; 

    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	         
    	$pagination = "";
        $Pagee=PAGE;
        $nextt=NEXT;
        $lastt=LAST; 
        $off=OF;
        
    	if($lastpage > 1)
    	{       
                    $pagination .= "<span class='class=fg-button'>$Pagee $page $off $lastpage</span>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    				else                                                                                        
                                        if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept') && strpos($_SERVER['REQUEST_URI'],'limit') )
                                        {                                            
                                             $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    if(strpos($_SERVER['REQUEST_URI'],'page')){
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
                                                    $l = $str_explode[$count-8];                                                    
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					
                                        }                                    
                                        else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					                                                                                                       
                                                    }
                                                    else{
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/history'>$counter</a></span>";					
                                        }
                                        }  
                                        
                                        
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
                                           if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept') && strpos($_SERVER['REQUEST_URI'],'limit') )
                                        {                                            
                                             $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    if(strpos($_SERVER['REQUEST_URI'],'page')){
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
                                                    $l = $str_explode[$count-8];                                                    
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }   
                                                    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					
                                        }       
                                        else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/history'>$counter</a></span>";					
                                        }
                                        }
    				}
    				$pagination.= "<span class='dot'>...</span>";
if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lpm1/history'>$lpm1</a></span>";					                                                                                                       
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lastpage/history'>$lastpage</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/history'>$lpm1</a></span>";					
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/history'>$lastpage</a></span>";					
                                        }    				
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<span class='fg-button ui-button '><a href='{$url}page=1'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='{$url}page=2'>2</a></span>";
                               $pagination.= "<span class='fg-button'>...</span>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept') && strpos($_SERVER['REQUEST_URI'],'limit') )
                                        {                                            
                                             $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    if(strpos($_SERVER['REQUEST_URI'],'page')){
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
                                                    $l = $str_explode[$count-8];                                                    
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					
                                        }  
                                        else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/history'>$counter</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='5s/".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/history'>$counter</a></span>";					
                                        }
                                        }
    				}
    				$pagination.= "<span class='fg-button>..</span>";
if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lpm1/history'>$lpm1</a></span>";					                                                                                                       
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lastpage/history'>$lastpage</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/history'>$lpm1</a></span>";					
$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/history'>$lastpage</a></span>";					
                                        }     				
    			}
    			else
    			{
    				$pagination.= "<span class='fg-button ui-button'><a href='{$url}page=1'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='{$url}page=2''>2</a></span>";                                
    				$pagination.= "<span class='fg-button'>..</span>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						$pagination.= "<span class='fg-button ui-button'><a href='{$url}limit=$l&page=$counter'>$counter</a></span>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
                    if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept') && strpos($_SERVER['REQUEST_URI'],'limit') )
                                        {                                            
                                             $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    if(strpos($_SERVER['REQUEST_URI'],'page')){
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
                                                    $l = $str_explode[$count-8];                                                    
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$next/history'>$nextt</a></span>";					
                                        $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$lastpage/history'>$lastt</a></span>";					                                        
                                        }
                    else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$next/history'>$nextt</a></span>";					
                                            $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lastpage/history'>$lastt</a></span>";
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$next/history'>$nextt</a></span>";					                                                                                                       
                                                    $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$last_page/history'>$lastt</a></span>";
                                                    }
                                            else{
                                           $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$next/history'>$nextt</a></span>";
                                           $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/history'>$lastt</a></span>";
                                        }
                                        }      			
    		}else{
    			$pagination.= "<span class='next fg-button ui-button'><a class='ui-state-disabled'>$nextt</a></span>";
                $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a class='ui-state-disabled'>$lastt</a></span>";
            }
    		
    	}
        ?>
            
<?php
    
        return $pagination;
    } 
?>