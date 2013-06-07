<?php
////Starting over on number template system
$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='A'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections'>";
    echo "<lable><strong>Section A</strong></label><br/><br/>";
    echo "<select>";
   
    while ($rows = db_fetch_array($result)) {
      
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $result = db_result(db_query($sql,$eid));
        echo "<option>" . $result . "</option>";
    
}
echo "<select>";
echo "</div>";
}









?>
