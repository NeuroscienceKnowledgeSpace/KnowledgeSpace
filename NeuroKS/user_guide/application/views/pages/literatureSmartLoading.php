<script src="/<?php  echo $config_array->local_context_name; ?>/application/views/js/highcharts.js"></script>
<script src="/<?php echo $config_array->local_context_name; ?>/application/views/js/exporting.js"></script>  
 
<div id="literature-loading">
    <!--javascript highchart here -->
</div>
<div id="literature-outter" class="panel panel-grey">
    <div class="panel-heading">
             <!--       Literature
                <ul class="list-inline panel-actions">
                        <li><a href="#" id="literature-fullscreen" role="button" title="Toggle fullscreen"><i class="glyphicon glyphicon-resize-full"></i></a></li>
                </ul> -->
             
	<h3 class="panel-title">
        <a class="pull-right" href="#" id="literature-fullscreen" role="button" title="Toggle fullscreen" onclick="return ksTrackEvent('Link', 'Expand', 'Expand literature panel');">
        <i class="glyphicon glyphicon-zoom-in"></i></a>Literature</h3>
								
    </div>
  <!--  <div class="panel-body" style="min-height: 385; max-height: 385;overflow-y: scroll">
   -->        
    <div id="literature-panel" class="panel-body" style="min-height: 65%; max-height: 65%;overflow-y: scroll">
        
        
<div class="tab-v1">
    <ul class="nav nav-tabs">
	<li id="litTab1" class="active"><a href="#litContent1" data-toggle="tab" onclick="updateLitTab(1);">Most recent</a></li>
	<li id="litTab2"><a href="#litContent2" data-toggle="tab" onclick="updateLitTab(2);">Year graph</a></li>
							
    </ul>
    <div class="tab-content">
	<!-- <div id="litContent1" class="tab-pane fade in active" id="home-1"> -->
        <div id="litContent1" class="tab-pane fade in active">    
        <?php
        if($latestResult->response->numFound == 0 )
        {
            echo "<div class=\"row\">";
            echo "No publications found!";
            echo "</div><br/>";
        }
        
        
        foreach($latestResult->response->docs as $row )
        {
            echo "<div class=\"row\">";
            echo "  <div class=\"col-md-12\">";
            
            echo "<u><a  style=\"font-size:16\"  target=\"_blank\" href=\"http://www.ncbi.nlm.nih.gov/pubmed?term=". 
                    $row->pmid."\">".$row->title."</a></u><br/>";
            
            echo "<span style=\"color:green\">";   
            if(count($row->author) > 0)
                echo $row->author[0]." - ";
            echo $row->journal."<br/>";
            echo "</span>";
            
            echo "<span style=\"color:green\">";   
            echo $row->month."-".$row->day."-".$row->year."<br/>";
            echo "</span>";
            //echo $row->abstract."<br/>";
            echo "<span style=\"color:brown\">";   
            echo "PMID:".$row->pmid;
            echo "</span>";
            echo "  </div>";
            echo "</div><br/>";

        }
        if($latestResult->response->numFound > 0 )
        {
            echo "<div class=\"row\">";

            echo "<center><a  style=\"font-size:16\"  target=\"_blank\" href=\"/".$config_array->local_context_name."/index.php/LatestPublications/view/".$title."/1\">See more</a></center>";

            echo "</div><br/>";
        }
?>  
        </div>
        
<?php
    if($latestResult->response->numFound > 0 )
    {
?>
        
	<!-- <div id="litContent2" class="tab-pane fade in" id="profile-1"> -->
	<div id="litContent2" class="tab-pane fade in">							
           <!-- <div id="container" style="min-width: 40%; height: 340px; margin: 0 auto"></div> -->
           <div id="litContent2Row" class="row">
               <!-- <div class="col-md-12"> -->
               <center><img src="/img/loading_spinner.gif" alt="Loading" height="150" width="150"></center>
                <!-- <div id="container" style="min-width: auto; height: 50%; margin: 0 auto"></div>   -->  
              <!--  </div> -->
           </div>
	</div>
<?php } ?>
							
    </div>
    </div>
    <!-- End Tab v1 -->
    </div>
 </div>

    
                <script type="text/javascript">
                //var litURL = "http://localhost/NeuroKS/index.php/LiteratureOnly/view/<?php echo $curie; ?>";
                var litURL = "/NeuroKS/index.php/LiteratureOnly/view/<?php echo $curie; ?>";

                //alert(litURL);
                loadLiteratureJS(litURL,"<?php echo $config_array->local_context_name; ?>","<?php echo $title;  ?>");
                
                </script>
                
