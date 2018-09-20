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
                                                    //echo $l;
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					
                                        }                                    
                                        else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					                                                                                                       
                                                    }
                                                    else{
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/manage_audit'>$counter</a></span>";					
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
                                                    //echo $l;
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }   
                                                    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					
                                        }
                                        else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/manage_audit'>$counter</a></span>";					
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
       $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lpm1/manage_audit'>$lpm1</a></span>";					                                                                                                       
       $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lastpage/manage_audit'>$lastpage</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
  $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/manage_audit'>$lpm1</a></span>";					
  $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/manage_audit'>$lastpage</a></span>";					
                                        }    			
                                
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<span class='fg-button ui-button '><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/1/manage_audit'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/2/manage_audit'>2</a></span>";
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
                                                    //echo $l;
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					
                                        }         
                                        else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$counter/manage_audit'>$counter</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/manage_audit'>$counter</a></span>";					
                                        }
                                        }
    				}
    				$pagination.= "<span class='dot'>..</span>";
                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
       $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lpm1/manage_audit'>$lpm1</a></span>";					                                                                                                       
       $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lastpage/manage_audit'>$lastpage</a></span>";					                                                                                                       
                                                    }
                                        else
                                        {
  $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/manage_audit'>$lpm1</a></span>";					
  $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/manage_audit'>$lastpage</a></span>";					
                                        }
    				// $pagination.= "<span class='fg-button ui-button'><a href='{$url}page=$lpm1'>$lpm1</a></span>";
    				// $pagination.= "<span class='fg-button ui-button'><a href='{$url}page=$lastpage'>$lastpage</a></span>";	
						
    			}
    			else
    			{	
					
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/1/manage_audit'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/2/manage_audit'>2</a></span>";                                
    				$pagination.= "<span class='fg-button'>..</span>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/manage_audit'>$counter</a></span>";					
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
                                                    //echo $l;
                                                    }
                                                    else{
                                                        $dept = $str_explode[$count-2];
                                                        $temp = $str_explode[$count-4];
                                                        $l = $str_explode[$count-6];
                                                    }
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$next/manage_audit'>$nextt</a></span>";					
                                        $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/limit/".$l."/temp/".$temp."/dept/".$dept."/page/$lastpage/manage_audit'>$lastt</a></span>";					                                        
                                        }                                    
                                        else
                                        {
                                            if(isset($_REQUEST["drptemplate"]) && isset($_REQUEST["drpdept"])){
                                            $temp=$_REQUEST['drptemplate'];
                                            $dept=$_REQUEST['drpdept'];  
                                            $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$next/manage_audit'>$nextt</a></span>";					
                                            $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lastpage/manage_audit'>$lastt</a></span>";
                                            }
                                            else
                                                if(strpos($_SERVER['REQUEST_URI'],'temp') && strpos($_SERVER['REQUEST_URI'],'dept'))
                                                    {                                                                                                        
                                                    $str_explode = explode('/',$_SERVER['REQUEST_URI']);
                                                    $count=count($str_explode);
                                                    $dept = $str_explode[$count-4];
                                                    $temp = $str_explode[$count-6];
               					    $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$next/manage_audit'>$nextt</a></span>";					                                                                                                       
                                                    $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/temp/".$temp."/dept/".$dept."/page/$lastpage/manage_audit'>$lastt</a></span>";
                                                    }
                                            else{
                                           $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$next/manage_audit'>$nextt</a></span>";
                                           $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/manage_audit'>$lastt</a></span>";
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