<?php

/**
 * @link: http://www.Awcore.com/dev
 */
 
   function pagination1($query, $per_page = 10,$pg = 1){  
		include("dbconnect.php");
    	$query = "SELECT COUNT(*) as `num` FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($sql,$query));
    	$total = $row['num'];
        $adjacents = "2"; 

    	$pg = ($pg == 0 ? 1 : $pg);  
    	$start = ($pg - 1) * $per_page;								
		
    	$prev = $pg - 1;							
    	$next = $pg + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
        $Pagee=PAGE;
        $off=OF;
    	if($lastpage > 1)
    	{       
                    $pagination .= "<span class='fg-button'>$Pagee $pg $off $lastpage</span>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $pg)
    					$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    				else
                                    if(isset($_REQUEST["limit1"]))
                                        {
                                              $l=$_REQUEST["limit1"];
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($pg < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $pg)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						
                                            if(isset($_REQUEST["limit1"]))
                                        {
                                              $l=$_REQUEST["limit1"];
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
    				}
    				$pagination.= "<span class='dot'>...</span>";
    				 $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$lpm1/template_view'>$lpm1</a></span>";
    				 $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$lastpage/template_view'>$lastpage</a></span>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $pg && $pg > ($adjacents * 2))
    			{
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/1/template_view'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/2/template_view'>2</a></span>";
                               $pagination.= "<span class='fg-button'>...</span>";
    				for ($counter = $pg - $adjacents; $counter <= $pg + $adjacents; $counter++)
    				{
    					if ($counter == $pg)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						if(isset($_REQUEST["limit1"]))
                                        {
                                              $l=$_REQUEST["limit1"];
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
    				}
    				$pagination.= "<span class='fg-button'>..</span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$lpm1/template_view'>$lpm1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$lastpage/template_view'>$lastpage</a></span>";		
    			}
    			else
    			{
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/1/template_view'>1</a></span>";
    				$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/2/template_view'>2</a></span>";                                
    				$pagination.= "<span class='fg-button'>..</span>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $pg)
    						$pagination.= "<span class='fg-button ui-button'><a class='ui-state-disabled'>$counter</a></span>";
    					else
    						if(isset($_REQUEST["limit1"]))
                                        {
                                              $l=$_REQUEST["limit1"];
    					$pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
                                        else
                                        {
                                            $pagination.= "<span class='fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$counter/template_view'>$counter</a></span>";					
                                        }
    				}
    			}
    		}
    		
    		if ($pg < $counter - 1){ 
                    $nextt=NEXT;
                    $lastt=LAST; 
    			$pagination.= "<span class='next fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$next/template_view'>$nextt</a></span>";
                $pagination.= "<span class='last ui-corner-tr ui-corner-br fg-button ui-button'><a href='".$_SESSION['dname']."/".$_SESSION['uname']."/pg/$lastpage/template_view'>$lastt</a></span>";
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