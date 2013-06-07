<?php

// connect to the DB
 include('dbConnect.php');


// Count the numbers in the array & get the project ID

$items = count ($_POST['number'][0]);
$pid = $_POST['projectID'];
$tid = $_POST['numberTemplateID'];
$rid = $_POST['rangeID'];
$last_issued = $_POST['rangeStart'];

// save a record of the last issued number
$sql1 = "INSERT into last_issued VALUES(0, $pid, $tid, $rid, '$last_issued')";
mysql_query($sql1);



// Set a counter
$i = 0;

// while the counter is less than the number of items in the array we'll loop through and insert each one into the DB
while ($i < $items) {

	$number = $_POST['number'][0][$i];
	$title = $_POST['docTitle'][0][$i];
	
	$sql = "INSERT into doc_numbers VALUES (0,'$title', '$number', $pid, 0)";
	

	mysql_query($sql);

$i++;

}


//we'll then go back to the Project Page
header ("Location: http://gha.dev.green-kiwi.co.uk/node/$pid?s=y");


?>