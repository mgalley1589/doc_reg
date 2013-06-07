<?php

// We're saving the progress

// Connect to the database.

include('dbConnect.php');

// how many loops are we making?
$looplimit = count($_POST['issue']);
// set the count
$i = 0;
$array = $_POST['issue'];
foreach($array as $key=>$value) 
    { 
   
   
   $sql = "UPDATE doc_issue_form_numbers SET issued=1 WHERE id=$value";
    mysql_query($sql);
   
   
   } 
	
	
	// We're done - send back to the doc issue form.
	$url = $_REQUEST['returnUrl'];
	header("Location: http://gha.dev.green-kiwi.co.uk$url&s=y");

		
?>
