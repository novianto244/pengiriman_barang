<?php
    function build_table($tbl_id, $arrayhead){
        echo '<div class="datatable-container">';
        echo '<table class="table stripe" id="'.$tbl_id.'" width="1250px;" style="table-layout: fixed;">';
        echo '<thead>';
        echo '<tr style="text-align:center;">';
                foreach($arrayhead as $key){
                    echo '<th>' . htmlspecialchars($key) . '</th>';
                }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
    }

    function build_table_input($table_id, $arrayhead, $array_input){
        echo '<div class="datatable-container" style="margin-top:15px;">';
        echo '<table class="table stripe" id="'.$table_id.'" width="1250px;" style="table-layout: fixed;">';
        echo '<thead>';
        echo '<tr style="text-align:center;">';
                foreach($arrayhead as $key){
                    echo '<th>' . htmlspecialchars($key) . '</th>';
                }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '</tbody>';
        echo '<thead>';
        echo '<tr>';
                foreach($array_input as $arrays){
                    if(in_array('input', $arrays, true)){
                        echo '<th>';
                            echo '<input autocomplete="off" class="form-control form-control-sm"';                           
                                foreach($arrays as $key => $value){
                                echo htmlspecialchars($key) . '=' . '"'. $value . '"';    
                                }                                            
                            echo '>';                  
                        echo '</th>';
                    }elseif(in_array('date', $arrays, true)){
                        echo '<th>';
                            echo '<input autocomplete="off" class="form-control form-control-sm datepicker" placeholder="yyyy-mm-dd"';                           
                                foreach($arrays as $key => $value){
                                echo htmlspecialchars($key) . '=' . '"'. $value . '"';    
                                }                                            
                            echo '>';                  
                        echo '</th>';  
                    }elseif(in_array('blank', $arrays, true)){
                        echo '<th>';
                            echo '<input autocomplete="off" class="form-control form-control-sm" type="hidden"';                           
                                foreach($arrays as $key => $value){
                                echo htmlspecialchars($key) . '=' . '"'. $value . '"';    
                                }                                            
                            echo '>';                  
                        echo '</th>';  
                    }elseif(in_array('save', $arrays, true)){
                        echo '<th>';
                            echo '<button style="padding-left:10px; padding-right:10px; font-size:12px;" ';                           
                                foreach($arrays as $key => $value){
                                echo htmlspecialchars($key) . '=' . '"'. $value . '"';    
                                }                       
                            echo '>';   
                            echo '<i class="fa fa-save" style="margin-right:-15px;"></i>Save';      
                            echo '</button>';               
                        echo '</th>';
                    }elseif(in_array('reset', $arrays, true)){
                        echo '<th>';
                            echo '<button style="margin-left:2px; padding-left:7px; padding-right:7px; font-size:12px;"';                           
                                foreach($arrays as $key => $value){
                                echo htmlspecialchars($key) . '=' . '"'. $value . '"';    
                                }                       
                            echo '>';   
                            echo '<i class="fa fa-eraser" style="margin-right:-15px;"></i>Reset';    
                            echo '</button>';      
                    }
                }
        echo '</tr>';
        echo '</thead>';
        echo '</table>';
        echo '</div>';
    }

?>