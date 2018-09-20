<?php

/**
 * @link: http://www.Awcore.com/dev
 */
  
   function pagination($query, $per_page = 10,$page = 1){  
		include("dbconnect.php");
    	$query = "SELECT COUNT(*) as `num` FROM {$query}";
		$result=mysqli_query($sql,$query);
    	$row = mysqli_fetch_array($result);
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
                                        if(isset($_REQUEST["limit"]))
                                        {
                                              $l=$_REQUEST["limit"];
											  if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/department_add'>$counter</a></span>";	
											  }
											  else{
												 $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/template_view'>$counter</a></span>";	 
											  }
                                        }
                                        else
                                        {          
                                            if(strpos($_SERVER['REQUEST_URI'],'department_add')){
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/department_add'>$counter</a></span>";					                                            
                                            }
                                            else{
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/template_view'>$counter</a></span>";					                                            
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
                                            if(isset($_REQUEST["limit"]))
                                        {
                                                  $l=$_REQUEST["limit"];
												  if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/department_add'>$counter</a></span>";
												  } else{
													 $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/template_view'>$counter</a></span>"; 
												  }
                                        }
                                        else
                                        {
                                             if(strpos($_SERVER['REQUEST_URI'],'department_add')){
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/department_add'>$counter</a></span>";					                                            
                                            }
                                            else{
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/template_view'>$counter</a></span>";					                                            
                                            }
                                        }
    				}
    				$pagination.= "<span class='dot'>...</span>";
                                if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    				$pagination.= "<span class='fg-button ui-button'><a href='5s/".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/department_add'>$lpm1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='5s/".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/department_add'>$lastpage</a></span>";		
                                }
                                else{
                                $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/template_view'>$lpm1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/template_view'>$lastpage</a></span>";		
                                }
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{	
					 if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    				$pagination.= "<span class='fg-button ui-button '><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/1/department_add'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/2/department_add'>2</a></span>";
					 }
					 else
					 {
						$pagination.= "<span class='fg-button ui-button '><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/1/template_view'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/2/template_view'>2</a></span>"; 
					 }
                               $pagination.= "<span class='fg-button'>...</span>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						if(isset($_REQUEST["limit"]))
                                        {
                                                      $l=$_REQUEST["limit"];
													   if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/department_add'>$counter</a></span>";	
													   }
													   else
													   {
													$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/template_view'>$counter</a></span>";	   
													   }
                                        }
                                        else
                                        {	
											if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/department_add'>$counter</a></span>";	
													   }
													   else
													   {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/template_view'>$counter</a></span>";	
													   }
                                        }
    				}
    				$pagination.= "<span class='fg-button'>..</span>";
    				if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/department_add'>$lpm1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/department_add'>$lastpage</a></span>";		
                                }
                                else{
                                $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lpm1/template_view'>$lpm1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/template_view'>$lastpage</a></span>";		
                                }
    			}
    			else
    			{	
					if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/1/department_add'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/2/department_add'>2</a></span>";  
					}
					else{
						$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/1/template_view'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/2/template_view'>2</a></span>";  
					}					
    				$pagination.= "<span class='fg-button'>..</span>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
							if(strpos($_SERVER['REQUEST_URI'],'department_add'))
    						$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/department_add'>$counter</a></span>";	
							else
								$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$counter/template_view'>$counter</a></span>";
								
    				}
    			}
    		}

    		if ($page < $counter - 1){                     
                $nextt=NEXT;
                $lastt=LAST; 
                        if(strpos($_SERVER['REQUEST_URI'],'department_add')){
    			 $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$next/department_add'>$nextt</a></span>";
                                $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/department_add'>$lastt</a></span>";
                        }
                        else{
                        $pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$next/template_view'>$nextt</a></span>";
                                $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/page/$lastpage/template_view'>$lastt</a></span>";
                        }
    		}else{
                    $nextt=NEXT;
                    $lastt=LAST;
    			 $pagination.= "<span class='next fg-button ui-button'><a class='ui-state-disabled'>$nextt</a></span>";
                $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a class='ui-state-disabled'>$lastt</a></span>";
            }
    		
    	}
        ?>
            
<?php
    
        return $pagination;
    } 
?>