<?php

// Grab Variables from $_POST super global
//Connect to the database - as out of Drupal Core we're not bootstrapped
include('includes/custom/dbConnect.php');
/*
Matts Testing
*/
/*

echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
exit();
*/

// Get some variables
$generated_by = $_POST['generated_by'];
$date = $_POST['date'];
$project_id = $_POST['project_id'];
$project_title = $_POST['project_title'];
$project_manager = $_POST['project_manager'];
$issue_description = $_POST['issue_description'];
$special_issue_instructions = $_POST['special_issue_instructions'];
$doc_title = $_POST['doc_title'];
$redirect_url = $_POST['redirect_url'];
$document_status = $_POST['document_status'];
//$revisions = $_POST['revision'];
$maxno = $_POST['maxno'];
$rec_count = $_POST['rec_count'];
// Insert Query into doc_issue_form
	$query_one = "INSERT INTO `doc_issue_form` (`ifid`, `generated_by`, `date`, `document_status`, `project_id`,`project_lead`,`issue_description`,`special_issue_instruction`,`completed`, `rejected`)
VALUES
	(0, '$generated_by', CURDATE(), '$document_status', '$project_id', '$project_manager', '$issue_description', '$special_issue_instructions', 0, 0)";


// Execute SQL Statement. If Fail, Echo Error
     mysql_query($query_one) 
     or die(mysql_error()); 

// Get the last auto increment
 	$ifid = mysql_insert_id($connection);
    
     //  While Loop to add the relevant numbers into the DB
   // Really bad way of doing this, but more elegant solutions don't seem to work everytime...
   $i = 0;
   $it = 0;
   while ($i < $maxno) {
   	
	$doc_title = $_REQUEST['doc_title'][$i];
	$number = $_REQUEST["doc_number_$i"];
	$rev = $_REQUEST["revision_$i"];
	$changes = $_REQUEST["summary_of_changes_$i"];
	
   	
	$query_two = "INSERT into`doc_issue_form_numbers` (`ifid`, `doc_title`, `doc_number`,`revision`,`summary_of_changes`,`issued`)
VALUES ($ifid, '$doc_title', '$number', '$rev', '$changes', 0)";


mysql_query($query_two)
or die(mysql_error());

// Update the status in the doc_numbers table.
$query_six = "UPDATE `doc_numbers` SET status=1 WHERE number='$number'";
mysql_query($query_six)
or die(mysql_error());
	$i++;

   }

   /*
   echo "<pre>";
   print_r($_REQUEST);
   echo "</pre>";
      exit();
   */

  $i = 0;
      while ($i < $rec_count)
   {
   		$recipient = $_REQUEST["recipients$i"];
		  	
 
		if (isset($_POST["word$i"])) {
     		$word = 1;
      	} else {
      		$word = 0;
      	}
      	if (isset($_POST["excel$i"])) {
     		$excel = 1;
      	} else {
      		$excel = 0;
      	}
      if (isset($_POST["pdf$i"])) {
     		$pdf = 1;
      	} else {
      		$pdf = 0; 
      	}
      if (isset($_POST["dwf$i"])) {
     		$dwf = 1;
      	} else {
      		$dwf = 0;
        }
      if (isset($_POST["dwg$i"])) {
     		$dwg = 1;
      	} else {
      		$dwg = 0;
        }
      if (isset($_POST["hard$i"])) {
     		$hard = $_POST["hard$i"];
      	} else {
      		$hard = 0;
        }
      if (isset($_POST["zip$i"])) {
     		$zip = 1;
      	} else {
      		$zip = 0;
        }
      if (isset($_POST["cd$i"])) {
     		$disk = 1;
      	} else {
      		$disk = 0;
        }
	 
	 
	 /*
    if (isset($_POST['word'][$i])) {
        $word = 1;
        } else {
          $word = 0;
        }
        if (isset($_POST['excel'][$i])) {
        $excel = 1;
        } else {
          $excel = 0;
        }
      if (isset($_POST['pdf'][$i])) {
        $pdf = 1;
        } else {
          $pdf = 0; 
        }
      if (isset($_POST['dwf'][$i])) {
        $dwf = 1;
        } else {
          $dwf = 0;
        }
      if (isset($_POST['dwg'][$i])) {
        $dwg = 1;
        } else {
          $dwg = 0;
        }
      if (isset($_POST['hard'][$i])) {
        $hard = 1;
        } else {
          $hard = 0;
        }
      if (isset($_POST['zip'][$i])) {
        $zip = 1;
        } else {
          $zip = 0;
        }
      if (isset($_POST['cd'][$i])) {
        $disk = 1;
        } else {
          $disk = 0;
        }
   */
	 //$pdf2 = $_POST["pdf2_$i"];
	 //$disc = $_POST["disc_$i"];
	
$query_two = "INSERT into`doc_issue_form_recipient` (`ifid`, `recipient_name`,`word`,`excel`,`pdf`,`dwf`,`dwg`,`hard`,`zip`,`cd`)
VALUES ($ifid, '$recipient','$word', '$excel', '$pdf', '$dwf','$dwg', '$hard', '$zip', '$disk')";
mysql_query($query_two)
or die(mysql_error());
	
	/* We no longer need this as all numbers are to remain in the project
	// Now we need to delete the number as available for issue
	$query_three = "DELETE FROM doc_numbers WHERE number='$number'";
	mysql_query($query_three)
	or die(mysql_error());
	//)
	*/
  
  $i++;

 }
 
// We're done. Sent them to the confirmation form.
header("Location: http://gha.dev.centralstep.com$redirect_url?dis=y&ifid=$ifid");
 ?>             
