<?php
echo    "<option value=\" \">Please Select</option>";
$numberRangesSQL = "SELECT * FROM number_templates_ranges WHERE ntid=%d";
$result = db_query($numberRangesSQL, $ntid);
while ($row = db_fetch_array($result)) { ?>
 	<option value="<?php echo $row['nrid'];?>"><?php echo $row['title'];?></option>
 	
 	<?php } ?>
 	
