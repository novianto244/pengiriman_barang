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
?>