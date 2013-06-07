<?php
// See what's in the array - Comment out for production.
/*
 echo "<pre>"; 
print_r($_POST);
echo "</pre>";
exit();
 */


//Connect to the database - as out of Drupal Core we don't have bootsrap. 
include('includes/custom/dbConnect.php');


// Get the form ID from the $_REQUEST array
$ifid = $_REQUEST['ifid'];

      
 

// Mark the issue form as completed. Do this last incase of errors.
$sql = "UPDATE doc_issue_form SET rejected=1 WHERE ifid=$ifid";
mysql_query($sql);

// Redirect back to whence we came
	

$url = $_REQUEST['returnUrl'];
header("Location: http://gha.dev.centralstep.com$url&r=y");
  

 ?>             
