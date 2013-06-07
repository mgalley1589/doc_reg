<?php

$sql = "SELECT * FROM doc_numbers WHERE pid=167587643";
$result = mysql_query($sql);
echo $result;

while($row = mysql_fetch_array($result)) {

	echo $row['number'];
}

?>