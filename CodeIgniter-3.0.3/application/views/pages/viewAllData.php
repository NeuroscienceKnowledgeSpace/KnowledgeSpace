
<div class="container">
<!--  <h2>Data</h2> -->
 <ul class="nav nav-tabs">
<!--     <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
<?php

    //var_dump(array_keys($result));
    //echo "-------page:".$pageName;
    //echo "-------result size:".count($result);
    //echo "--------description size:".count($description); 
    $count = 0;
    foreach($ks_selected_sources as $source)
    {

        if(strcmp($selectedSourceID, "0")==0 && $count ==  0)
            echo "\n<li class=\"active\"><a data-toggle=\"tab\" href=\"#menu".$count."\">".$sourceNameArray[$source]."</a></li>";
        else if(strcmp($source, $selectedSourceID)==0 )
            echo "\n<li class=\"active\"><a data-toggle=\"tab\" href=\"#menu".$count."\">".$sourceNameArray[$source]."</a></li>";
        else
            echo "\n<li><a data-toggle=\"tab\" href=\"#menu".$count."\">".$sourceNameArray[$source]."</a></li>";
            
        $count++;
    }
    
 


?>



  </ul>

  <div class="tab-content">
   <!--  <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>  -->
<?php

    $selectedIndex = 0;
    $count = 0;
     foreach ($ks_selected_sources as $source) 
    {
            $pageID = 1;
            if(strcmp($selectedSourceID,$source )==0)
            {
                $pageID = $selectedPageID;
            }
            
            
            $startItem = ($pageID-1)*20+1;
            $endItem = $startItem+19;
            if($endItem > $result[$source]->result->resultCount)
                $endItem = $result[$source]->result->resultCount;
            /*if($count == 0)
            {
                echo "\n<div id=\"menu".$count."\" class=\"tab-pane fade in active\">";
                echo "\n<p>".$description[$source]."</p>";
                echo "\n<p>".$source."</p>";
                echo "Displaying results ".$startItem." - ".$endItem." out of ".$result[$source]->result->resultCount." total results.";

                echo "\n</div>";
                
            }
            else
            {*/
                if(strcmp($selectedSourceID, "0")==0 && $count ==  0)
                    echo "\n<div id=\"menu".$count."\" class=\"tab-pane fade in active\">";
                else if(strcmp($source, $selectedSourceID)==0 )
                    echo "\n<div id=\"menu".$count."\" class=\"tab-pane fade in active\">";
                else
                    echo "\n<div id=\"menu".$count."\" class=\"tab-pane fade\">";
                
                //echo "\n<p>".$source."</p>";
                echo "\n<p>".$description[$source]."</p>";
                //echo "\n<p>SourceID:".$source."-------selectedSourceID:". $selectedSourceID."</p>";
                echo "Displaying results ".$startItem." - ".$endItem." out of ".$result[$source]->result->resultCount." total results.";
            /////////////////////////////Navigation bar/////////////////////////////////////
            
                
            $nav = "";
            $nav = $nav. "\n<div class=\"row\">";
            $nav = $nav. "\n<div class=\"col-md-12\">";

            $resultObj = $result[$source];
            $sourceID = $source;
            $term = $pageName;
            $resultCount = $resultObj->result->resultCount;
            $num = intval($resultCount/20);
            if($num > 0)
            {
                $remaining = $resultCount%20;
                if($remaining > 0)
                    $num = $num+1;
            }
            //echo "NUMBER OF Pages:".$num;
            $nav = $nav. "\n<center><ul class=\"pagination\">";
            
            if(($pageID-1) > 0)
            {
                
                /*$nav = $nav. "\n<li><a href=\"/SciCrunchKS/index.php/Results/view/"
                .$sourceID."/".$term."/".($pageID-1).
                "\">&laquo;</a></li>"; */

                $nav = $nav. "\n<li><a href=\"#\" onclick=\"loadNewPage('".$sourceID."','".$term."','".($pageID-1)."');\">&laquo;</a></li>";  
            }
            else 
            {
               $nav = $nav. "\n<li class=\"disabled\"><a href=\"#\">&laquo;</a></li>";
            }
            
            $interval = 7;

            $startPage= 1;
            if($pageID-$interval > 0)
            {
                $startPage = $pageID - $interval;
            }
            
            if(($startPage + (2*$interval)) < $num)
            {
                $num = ($startPage + (2*$interval));
            }
            
            
            for($i=$startPage;$i<=$num;$i++)
            {
                if($i == $pageID)
                    $nav = $nav. "\n<li class=\"disabled\"><a href=\"#\">".$i."</a></li>";
                else
                {
                    /*$nav = $nav. "\n<li><a href=\"/SciCrunchKS/index.php/Results/view/"
                    .$sourceID."/".$term."/".$i
                        ."\">".$i."</a></li>"; */
                    /*$nav = $nav. "\n<li><a href=\"#\" onclick=\"loadNewPage('".$sourceID+"','".$term.
                        "','".($pageID-1)."');\">".$i."</a></li>";  */
                    
                    $nav = $nav. "\n<li><a href=\"#\" onclick=\"loadNewPage('".$sourceID."','".$term."','".$i."');\">".$i."</a></li>";
                    
                }   
            }
            
            
            if(($pageID+1) <= $num)
            {
                /* $nav = $nav. "\n<li><a href=\"/SciCrunchKS/index.php/Results/view/"
                .$sourceID."/".$term."/".($pageID+1).
                "\">&raquo;</a></li>";*/
                
                $nav = $nav. "\n<li><a href=\"#\" onclick=\"loadNewPage('".$sourceID."','".$term."','".($pageID+1)."');\">&raquo;</a></li>"; 
            
            }
            else
            {
                $nav = $nav. "\n<li class=\"disabled\"><a href=\"#\">&raquo;</a></li>";
            
            }    
            $nav = $nav. "\n</ul></center>";

            $nav = $nav. "\n</div></div>";
                
            echo $nav;    
            //////////////////////End navigation bar/////////////////////////////////
            
            //////////////////////////Data///////////////////////////////////////////
            echo "\n<div class=\"row\">";
            echo "\n<div class=\"col-md-12\">";
             
 
            echo "\n<table class=\"sortable-theme-bootstrap\" data-sortable>";   
            echo "\n<thead>";
            echo "\n<tr>";

                    $result2 = $resultObj->result;
                    foreach($result2->result as $row )
                    {
                        foreach($row as $key => $val)
                        {
                            echo "<th>". $key. "</th>";
                            
                        }
                        break;
                    }

               

                echo "\n</tr>";
                echo "\n</thead>";
                
                    foreach($result2->result as $row )
                    {
                        echo "<tr>\n";
                        foreach($row as $key => $val)
                        {
                            if(strcmp($key, "Image Description")==0 || strcmp($key, "Technical Details")==0 || strcmp($key, "Cellular Component")==0 || strcmp($key, "Biological Process")==0)
                            {
                                if(strlen($val) > 100)
                                    $val = substr($val, 0, 100)."...";
                            }
                            echo "<td>". $val. "</td>";
                            
                        }
                       
                        
                        echo "</tr>\n";
                    }
                
                
                
                
        echo "\n</thead>";
        echo "\n</table>";
             
        echo "\n</div>";
        echo "\n</div>";
            
           ////////////////////////////////End data//////////////////////////////
            
            //echo "-------Debug------";
            echo $nav;
            //echo "-------End Debug------";
            
                echo "\n</div>";
                
            //}
            $count++;
       
   } 
     
     

    

?>

  </div>
</div>