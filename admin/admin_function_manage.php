<?php

/**
 * @link: http://www.Awcore.com/dev
 */
 
   function pagination($query, $per_page = 10,$page = 1, $url = '?'){        
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
        
    	if($lastpage > 1)
    	{       
                    $pagination .= "<span class='class=fg-button'>Page $page of $lastpage</span>";
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
    					$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}limit=$l&page=$counter'>$counter</a></span>";					
                                        }
                                        else
                                        {                                                      
                                            $pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$counter'>$counter</a></span>";					                                                                                        
                                            
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
    					$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}limit=$l&page=$counter'>$counter</a></span>";					
                                        }
                                        else
                                        {                                            
                                            $pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$counter'>$counter</a></span>";					                                                                                                                                    
                                        }
    				}
    				$pagination.= "<span class='dot'>...</span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$lpm1'>$lpm1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$lastpage'>$lastpage</a></span>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<span class='fg-button ui-button '><a href='admin/admin_index.php{$url}page=1'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=2'>2</a></span>";
                               $pagination.= "<span class='fg-button'>...</span>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						if(isset($_REQUEST["limit"]))
                                        {
                                                      $l=$_REQUEST["limit"];
    					$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}limit=$l&page=$counter'>$counter</a></span>";					
                                        }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$counter'>$counter</a></span>";					
                                        }
    				}
    				$pagination.= "<span class='fg-button>..</span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$lpm1'>$lpm1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$lastpage'>$lastpage</a></span>";		
    			}
    			else
    			{
    				$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=1'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=2'>2</a></span>";                                
    				$pagination.= "<span class='fg-button'>..</span>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						if(isset($_REQUEST["limit"]))
                                        {
                                                      $l=$_REQUEST["limit"];
    					$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}limit=$l&page=$counter'>$counter</a></span>";					
                                        }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}page=$counter'>$counter</a></span>";					
                                        }
    				}
    			}
    		}

    		if ($page < $counter - 1){      
                    if(isset($_REQUEST["limit"]))
                                        {
                                              $l=$_REQUEST["limit"];
    					$pagination.= "<span class='fg-button ui-button'><a href='admin/admin_index.php{$url}limit=$l&page=$next'>Next</a></span>";					
                                         $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='admin/admin_index.php{$url}limit=$l&page=$lastpage'>Last</a></span>";
                                        }
                                        else{
    			 $pagination.= "<span class='next fg-button ui-button'><a href='admin/admin_index.php{$url}page=$next'>Next</a></span>";
                                $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='admin/admin_index.php{$url}page=$lastpage'>Last</a></span>";
                                        }
    		}else{                    
    			 $pagination.= "<span class='next fg-button ui-button'><a class='ui-state-disabled'>Next</a></span>";
                $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a class='ui-state-disabled'>Last</a></span>";
            }
    		
    	}
        ?>
            
<?php
    
        return $pagination;
    } 
?>