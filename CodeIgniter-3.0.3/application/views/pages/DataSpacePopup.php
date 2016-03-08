
    
   

<?php
        //Retrieving cookies for selected categories
        $ks_selected_json = "";
        
        
        
        if(isset($_COOKIE['ks_selected_sources']))
        {
            $ks_selected_json = $_COOKIE['ks_selected_sources'];
        }
        else
        {
            if(isset($ks_selected_sources))
                $ks_selected_json = $ks_selected_sources;
        }

        $ks_selected_sources = explode(",", $ks_selected_json);
                        
?>
   
    
           
       <?php 

       /*if(!is_null($curie))
       {
           echo "<script type=\"text/javascript\"> setCookie('curie','".$curie."',365);</script>";

       }
       
       if(!is_null($pageName))
       {
           echo "<script type=\"text/javascript\"> setCookie('pageName','".$pageName."',365);</script>";

       }*/
       
       
       
       $buttonCount = 0;
       
        $categories_string = "";
        
        if(isset($_COOKIE['ks_selected_categories']))
        {
            $categories_string=$_COOKIE['ks_selected_categories'];                        
               
        }
        else {
            if(isset($ks_selected_categories))
            {
                $categories_string=$ks_selected_categories;
            }
        }
        $ks_selected_categories = explode(",", $categories_string);    
        $neuroElectroCount = 0;
        //var_dump($ks_selected_categories);
        if( 
                (isset($ks_selected_categories)&& in_array("Physiology", $ks_selected_categories ) 
           && isset($ks_selected_sources) && in_array("nlx_151885-1", $ks_selected_sources))    
                )
        {
            $buttonCount++;
            //echo $neuroElectroResult;
            
            if(!is_null($neuroElectroResult) && $neuroElectroResult->result->resultCount > 0)
            {
               $neuroElectroCount = $neuroElectroResult->result->resultCount;

               echo "<script type=\"text/javascript\"> setCookie('Physiology_count','".$neuroElectroResult->result->resultCount."',365);</script>";
            }
            else
            {

              echo "<script type=\"text/javascript\"> setCookie('Physiology_count','0',365);</script>";
              
            }

        }
?>
   

        <?php
	
        if(
                (isset($ks_selected_categories)&& in_array("Expression", $ks_selected_categories ) 
                && isset($ks_selected_sources) && in_array("nif-0000-00130-1", $ks_selected_sources))
                )
        {
            $buttonCount++;
            
            $genSatCount = 0;
            if(!is_null($genSatResult) && $genSatResult->result->resultCount> 0)
            {
                $genSatCount = $genSatResult->result->resultCount;
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal2\">Expression (".$genSatResult->result->resultCount.")";
                echo "<script type=\"text/javascript\"> setCookie('Expression_count','".$genSatResult->result->resultCount."',365);</script>";
            }
            else
            {
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal2\" disabled>Expression (0)";
                echo "<script type=\"text/javascript\"> setCookie('Expression_count','0',365);</script>";
            }

        }
?>
    

    
    <!-- <button style="height:30px;width:120px" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal5">Models -->
        <?php
	$modelCount = 0;
        $neuroMLCount = 0;
        $modelDBCount = 0;
        $brainModelCount =0;
        
        
        
        if(!is_null($neuroMLResult) && isset($ks_selected_sources) && in_array("scr_013705-1",$ks_selected_sources))
        {
            $neuroMLCount = $neuroMLResult->result->resultCount;
            $modelCount = $neuroMLResult->result->resultCount;
        }
        if(!is_null($modelDBResult) && isset($ks_selected_sources) && in_array("nif-0000-00004-1",$ks_selected_sources))
        {
            $modelDBCount = $modelDBResult->result->resultCount;
            $modelCount = $modelCount+$modelDBResult->result->resultCount;
            
        }
        if(!is_null($brainModelResult) && isset($ks_selected_sources) && in_array("nlx_152590-1",$ks_selected_sources))
        {
            $brainModelCount = $brainModelResult->result->resultCount;
            $modelCount = $modelCount+$brainModelResult->result->resultCount;
            
        }
        
        
        if(
                (isset($ks_selected_categories)&& in_array("Models", $ks_selected_categories )) )
        {
            if(isset($ks_selected_sources)  )
            {
                if(
                        in_array("scr_013705-1", $ks_selected_sources) ||
                        in_array("nif-0000-00004-1", $ks_selected_sources) ||
                        in_array("nlx_152590-1", $ks_selected_sources))
                {
            $buttonCount++;
           
            if($modelCount > 0)
            {
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal5\">Models (".$modelCount.")";
                echo "<script type=\"text/javascript\"> setCookie('Models_count','".$modelCount."',365);</script>";
                
            }
            else
            {
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal5\" disabled>Models (".$modelCount.")";
                echo "<script type=\"text/javascript\"> setCookie('Models_count','".$modelCount."',365);</script>";
                
            }

            
                }
            
            }
        }
?> 
    
  

<?php
    $newRow = false;
    if($buttonCount ==3 && $newRow == false)
    {
        $newRow = true;

    }
?>

        <?php
	

        
        if(isset($ks_selected_categories)&& in_array("Anatomy", $ks_selected_categories ) &&
                isset($ks_selected_sources) && in_array("nif-0000-00054-1", $ks_selected_sources) 
                )
        {
            $buttonCount++;
            
            $neuronDBCount = 0;
            if(!is_null($neuronDBResult) && $neuronDBResult->result->resultCount > 0)
            {
                $neuronDBCount = $neuronDBResult->result->resultCount;
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal3\">Anatomy (".$neuronDBResult->result->resultCount.")";
                echo "<script type=\"text/javascript\"> setCookie('Anatomy_count','".$neuronDBResult->result->resultCount."',365);</script>";

            }
            else 
            {
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal3\" disabled>Anatomy (0)";
                echo "<script type=\"text/javascript\"> setCookie('Anatomy_count','0',365);</script>";
                
            }

        }
?>
    
    
<?php
    $newRow = false;
    if($buttonCount ==3 && $newRow == false)
    {
        $newRow = true;

    }
?>    
    <!-- <button style="height:30px;width:120px" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal4">Morphology -->
        <?php
	$neuroMorphoCount = 0;
        if(isset($ks_selected_categories)&& in_array("Morphology", $ks_selected_categories ) 
                && isset($ks_selected_sources) && in_array("nif-0000-00006-1", $ks_selected_sources))
        {
            $buttonCount++;
            
            if(!is_null($neuroMorphoResult) && $neuroMorphoResult->result->resultCount > 0)
            {
                $neuroMorphoCount = $neuroMorphoResult->result->resultCount;
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal4\">Morphology (".$neuroMorphoResult->result->resultCount.")";
                echo "<script type=\"text/javascript\"> setCookie('Morphology_count','".$neuroMorphoResult->result->resultCount."',365);</script>";
            }
            else
            {
                //echo "<button style=\"height:30px;width:120px\" type=\"button\" class=\"btn btn-info btn-sm\" data-toggle=\"modal\" data-target=\"#myModal4\" disabled>Morphology (0)";
                echo "<script type=\"text/javascript\"> setCookie('Morphology_count','0',365);</script>";
                
            }

        }
?>
<?php
    $newRow = false;
    if($buttonCount ==3 && $newRow == false)
    {
        $newRow = true;

    }
?>
<?php
    if($buttonCount >= 3)
    {
       
    }
?>


    
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Physiology</h4>
        </div>
        <div class="modal-body">
                   
            <p>
 <?php
 
           if($neuroElectroCount > 0)
           {    
 
                echo "<div class=\"row\">\n";
                echo "<div class=\"col-md-3\">\n";
                //echo "<a href=\"https://neuinfo.org/mynif/search.php?list=cover&q=neocortex%20pyramidal%20neuron&t=indexable&nif=nlx_151885-1\" target=\"_blank\">NeuroElectro:EPhysData (".$neuroElectroCount.")</a>\n";
                echo "<a href=\"/SciCrunchKS/index.php/Results/view/nlx_151885-1/".$pageName."/1\" target=\"_blank\">NeuroElectro:EPhysData (".$neuroElectroCount.")</a>\n";
                echo "</div>\n";
                echo "<div class=\"col-md-9\">\n";
                echo "is a database of elecrophysiological properties text-mined from the biomedical literature as a function of neuron type.\n";
                echo "</div>\n";
                echo "</div>\n";
                    
           }
            
?>
<!--                
            <div class="row"  style="background: #b8d1f3">
                            <div class="col-md-3">
                                <a href="NIFResultServlet?dataSource=nif-0000-00508-4&searchTerm=primary%20visual%20area" target="_blank">ABA Mouse Brain:CellType EphysData (35)</a>
                            </div>
                            <div class="col-md-9">
                                The <a href="http://celltypes.brain-map.org/" target="_blank">cell type view</a> provides a database of neuronal cell types based on multimodal characterization of single cells to enable data-driven approaches to classification. For more details about the experiments, please refer to the <a href="http://help.brain-map.org/download/attachments/8323525/EphysOverview.pdf" target="_blank">technical white paper</a>.
                            </div>
            </div>  -->
            </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  



  <!-- Modal -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Expression</h4>
        </div>
        <div class="modal-body">
            
            <div class="row">
                <div class="col-md-12">
                    
                    <?php
                    if($genSatCount > 0)
                    {
                        if(in_array("nif-0000-00130-1", $ks_selected_sources))
                        {
                            echo "<div class=\"row\" >\n";
                        

                            echo "   <div class=\"col-md-3\">\n";
                            //echo "       <a href=\"https://neuinfo.org/mynif/search.php?q=neocortex%20pyramidal&t=indexable&nif=nif-0000-00130-1&b=0&r=20\" target=\"_blank\">GENSAT:GeneExpression (".$genSatCount.")</a>\n";
                            echo "       <a href=\"/SciCrunchKS/index.php/Results/view/nif-0000-00130-1/".$pageName."/1\" target=\"_blank\">GENSAT:GeneExpression (".$genSatCount.")</a>\n";
                            echo "   </div>\n";
                            echo "   <div class=\"col-md-9\">\n";
                            echo "        contains gene expression data and maps of the mouse brain and spinal cord. ";
                            echo "   </div>";
                            echo "</div>";
                            
                        }
                    }
                    ?>
		</div>    
            </div>
           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="myModal3" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Anatomy</h4>
        </div>
        <div class="modal-body">
            
            <?php
            
            if($neuronDBCount > 0)
            {
                if(isset($ks_selected_sources) && in_array("nif-0000-00054-1", $ks_selected_sources))
                {
                    echo "<div class=\"row\">";
                    echo "   <div class=\"col-md-3\">";
                    //echo "      <a href=\"https://neuinfo.org/mynif/search.php?q=neocortex%20pyramidal&t=indexable&nif=nif-0000-00054-3\" target=\"_blank\">NeuronDB:Transmitters (".$neuronDBCount.")</a>";
                    echo "      <a href=\"/SciCrunchKS/index.php/Results/view/nif-0000-00054-1/".$pageName."/1\" target=\"_blank\">NeuronDB:Currents (".$neuronDBCount.")</a>";
                    echo "   </div>";
                    echo "    <div class=\"col-md-9\">";
                    echo "        at <a href=\"http://senselab.med.yale.edu/\" target=\"_blank\">  SenseLab </a>provides data about neurotransmitter properties for submitted neurons. ";
                    echo "    </div>";
                    echo "</div>";
                }  
            
            }
            ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="myModal4" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Morphology</h4>
        </div>
        <div class="modal-body">
            
            <?php
            
            if($neuroMorphoCount > 0)
            {
            echo "<div class=\"row\">";
            echo "   <div class=\"col-md-3\">";
            //echo "        <a href=\"https://neuinfo.org/mynif/search.php?q=pyramidal%20neocortex&t=indexable&list=cover&nif=nif-0000-00006-1\" target=\"_blank\">NeuroMorpho:ModelImage (".$neuroMorphoCount.")</a>";
            echo "        <a href=\"/SciCrunchKS/index.php/Results/view/nif-0000-00006-1/".$pageName."/1\" target=\"_blank\">NeuroMorpho:ModelImage (".$neuroMorphoCount.")</a>";
            echo "   </div>";
            echo "    <div class=\"col-md-9\">";
            echo "        contains a curated repository of digitally reconstructed neurons.";
            echo "    </div>";
            echo "</div>";
            }
                    
            ?>        
            
            
            <!-- 
            <div class="row" style="background: #b8d1f3">
               <div class="col-md-3">
                    <a href="https://neuinfo.org/mynif/search.php?q=apical%20spiny%20dendrite&t=indexable&nif=nif-0000-00508-5&b=0&r=20" target="_blank">ABA Mouse Brain:CellType MorphoData (36)</a>
               </div>
                <div class="col-md-9">
                    The <a href="http://celltypes.brain-map.org/" target="_blank">cell type view</a> provides a database of neuronal cell types based on multimodal characterization of single cells to enable data-driven approaches to classification. For more details about the experiments, please refer to the <a href="http://help.brain-map.org/download/attachments/8323525/MorphOverview.pdf" target="_blank">technical white paper</a>.
                </div>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>




<!-- Modal -->
  <div class="modal fade" id="myModal5" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Models</h4>
        </div>
        <div class="modal-body">
<?php
        //Retrieving cookies for selected categories
       /* $ks_selected_json = "";
        if(isset($_COOKIE['ks_selected_sources']))
        {
            $ks_selected_json = $_COOKIE['ks_selected_sources'];
        }
        $ks_selected_sources = explode(",", $ks_selected_json); */
                        
?>                   
            
            <?php
            
            
            if($neuroMLCount > 0 && isset($ks_selected_sources) && in_array("scr_013705-1",$ks_selected_sources))
            {
                echo "<div class=\"row\">";
                echo "    <div class=\"col-md-4\">";
                //echo "       <a href=\"https://neuinfo.org/mynif/search.php?list=cover&q=neocortical%20pyramidal%20cell&t=indexable&nif=scr_013705-1\" target=\"_blank\">NeuroML database:Models (".$neuroMLCount.")</a>";
                echo "       <a href=\"/SciCrunchKS/index.php/Results/view/scr_013705-1/".$pageName."/1\" target=\"_blank\">NeuroML database:Models (".$neuroMLCount.")</a>";
                echo "    </div>";

                echo "    <div class=\"col-md-8\">";
                echo "       is a curated relational database that provides for the storage and retrieval of computational neuroscience model.";
                echo "    </div>";
                echo "</div>";
            }
                    
            ?>
            
            <?php
            
            if($modelDBCount > 0 && isset($ks_selected_sources) && in_array("nif-0000-00004-1",$ks_selected_sources))
            {
            echo "<div class=\"row\"  style=\"background: #b8d1f3\">";
            echo "    <div class=\"col-md-4\">";
            //echo "      <a href=\"https://neuinfo.org/mynif/search.php?list=cover&q=neocortical%20pyramidal%20cell&t=indexable&nif=nif-0000-00004-1\" target=\"_blank\">ModelDB:Models (".$modelDBCount.")</a>";
            echo "      <a href=\"/SciCrunchKS/index.php/Results/view/nif-0000-00004-1/".$pageName."/1\" target=\"_blank\">ModelDB:Models (".$modelDBCount.")</a>";            
            echo "    </div>";
            echo "    <div class=\"col-md-8\">";
            echo "      provides high quality computational neuroscience models. ModelDB is tightly coupled with <a href=\"http://senselab.med.yale.edu/neurondb/\" target=\"_blank\">NeuronDB</a>."; 
            echo "    </div>";
            echo "</div>";
            }
            ?>
            
            <?php
            if($brainModelCount >0 && isset($ks_selected_sources) && in_array("nlx_152590-1",$ks_selected_sources))
            {
                echo "<div class=\"row\">";
                echo "    <div class=\"col-md-4\">";
                //echo "      <a href=\"https://neuinfo.org/mynif/search.php?q=Pyramidal%20cell&t=indexable&list=cover&nif=nlx_152590-1\" target=\"_blank\">Open Source Brain:models (10)</a>";
                echo "      <a href=\"/SciCrunchKS/index.php/Results/view/nlx_152590-1/".$pageName."/1\" target=\"_blank\">Open Source Brain:models (".$brainModelCount.")</a>";
                echo "    </div>";
                echo "    <div class=\"col-md-8\">";
                echo "      provides annotated computational models."; 
                echo "    </div>";
                echo "</div>";
            }
            ?>
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>   














        





          