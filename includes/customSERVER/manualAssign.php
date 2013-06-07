<?php

// Connect to the Database
include('dbConnect.php');

//

$number = $_POST['manualNumber'];
$returnUrl = $_POST['returnUrl'];
$pid = $_POST['manualPID'];

if ($_POST['manualTitle']) {
$title = $_POST['manualTitle']; } else {

$title = 'Spare';

}


//Check if the number exists

$numberCheckSql = "SELECT number FROM doc_numbers WHERE number='$number'";
				$result = mysql_query($numberCheckSql);
				$num_rows = mysql_num_rows($result);
			

				
				if ($num_rows > 0) {
					
				
				//redirect back to the page with a result that has incremented by one.
				
				header ("Location: http://gha.dev$returnUrl&s=n&n=$number");
				
				
				} else {
				
				//insert into the database
				
	$sql = "INSERT into doc_numbers VALUES (0, '$title', '$number', $pid)";
mysql_query($sql);


				
				
				
				//redirect back to the page with a success message
				
				header ("Location: http://gha.dev$returnUrl&s=y");

				
				}
				
				
				?>
				
				


