<?php

// We're saving the progress

// Connect to the database.

include('dbConnect.php');



//check what was submitted

if($_POST['save_progress']) {

// DO THINGS RO SAVE PROGRESS 

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
	header("Location: http://gha.dev.centralstep.com$url&s=y");

		

// save progress and redirect
} elseif ($_POST['mark']) {

// ISSUE FORM (formerly mark.php)


$ifid = $_REQUEST['ifid'];


// Set a time
$time = strtotime("now");
$date = date('d/m/y');

        
// We need the numbers we're issuing from the database.
      //$numbers_query = "SELECT * FROM doc_issue_form_numbers where ifid=$ifid";
      $numbers = mysql_query("SELECT * FROM doc_issue_form_numbers where ifid=$ifid");
      $i=0;
      while ($numbers_data = mysql_fetch_array($numbers)) { 
          $number = $numbers_data['doc_number'];

          $update_status_Sql = "UPDATE doc_numbers SET status=0 WHERE number='$number'";
  
          mysql_query($update_status_Sql)
          or die(mysql_error());
        
          $outcome = mysql_query("SELECT * FROM content_type_issued WHERE field_issued_doc_no_value='$number'");
          if (mysql_num_rows($outcome) > 0) {
              
              // If $outcome returns > 0 then we need to update the current revision.
              
              // Look up the nid and the revision. Then update it. That's all we need to do here.
              
               // Get the nid of the document number
              $result = mysql_query("SELECT nid FROM content_type_issued WHERE field_issued_doc_no_value='$number'");
              $nid = mysql_result($result, 0);


              
              // Get the current Revision of this document with the revision table.
              $result2 = mysql_query("SELECT field_issued_revision_value FROM content_field_issued_revision WHERE nid=$nid ORDER BY timestamp DESC");
              $rev = mysql_result($result2, 0);
                // Increment it by one to the next.
                $newRev = ++$rev;
              $result3 = mysql_query("SELECT delta FROM content_field_issued_revision WHERE nid=$nid");
              $outcome3 = mysql_result($result3,0);
              $delta = ++$outcome3;

         

                // Insert the new revision into the database.
                $vid = rand(5000,10000000);
                $update = "INSERT INTO `content_field_issued_revision` (`vid`,`nid`,`delta`,`field_issued_revision_value`, `date`, `ifid`, `timestamp`)
VALUES
	($vid,$nid,$delta,'$newRev', '$date', $ifid, $time)";
	 mysql_query($update);        
          } 

          else {

          	// if the $outcome < 0 then we know that the number has not previously been issued and this is the first revision.
          	// So we create the new number.
          	 $title = $numbers_data['doc_title'];
          	 //$new_revision = $_REQUEST["revision_$i"];
             // default assignment is A
             $new_revision = 'A';
            // if the number does not already exist we will need to create it.
            $nid = rand(250, 1000000);
            $vid = rand(250, 1000000);
            // node table insert      
            $query_two = "INSERT INTO `node` (`nid`,`vid`,`type`,`language`,`title`,`uid`,`status`,`created`,`changed`,`comment`,`promote`,`moderate`,`sticky`,`tnid`,`translate`)
            VALUES
            ($nid,$vid,'issued','','$title',1,1,'$time','$time',2,1,0,0,0,0)";
            mysql_query($query_two)
            or die(mysql_error());
	
          //node_revision table insert
	$query_three = "INSERT INTO `node_revisions` (`nid`,`vid`,`uid`,`title`,`body`,`teaser`,`log`,`timestamp`,`format`)
VALUES
	($nid,$vid,1,'$title','','','','$time',0)";
	mysql_query($query_three)
	or die(mysql_error());
	
	// we need a project ID and a random FID.
	$project_id_query = "SELECT project_id FROM doc_issue_form where ifid=$ifid";
	$project_id = mysql_query($project_id_query);
	$project_id_result = mysql_result($project_id,0);

	$project_id_query_two = "SELECT nid FROM content_type_project where field_project_id_value='$project_id_result'";
	$pnid = mysql_query($project_id_query_two);
	$pnid2 = mysql_result($pnid,0);
	$fid = rand(250, 1000000);
	
	$doc_number = $numbers_data['doc_number'];

	//content_type_issue table insert
	$query_four = "INSERT INTO `content_type_issued` (`vid`,`nid`,`field_issued_project_id_nid`,`field_issued_doc_description_value`,`field_issued_doc_no_value`,`field_issued_status_value`)
VALUES
	($vid, $nid, $pnid2, '$title','$doc_number', 'issued')";
	mysql_query($query_four)
	or die(mysql_error());
	
//Update the doc_numbers table to set the status to 0 if it the doc number is issued
	$query_update = "UPDATE doc_numbers SET status=0 WHERE number='$doc_number'";
	mysql_query($query_update)
	or die(mysql_error());

	$date = date('d/m/y');
	
	$query_five = "INSERT INTO `content_field_issued_revision` (`vid`,`nid`,`delta`,`field_issued_revision_value`, `date`, `ifid`, `timestamp`)
VALUES
	($vid,$nid,0,'$new_revision', '$date', $ifid, $time)";
	mysql_query($query_five)
	or die(mysql_error());
	$i++;

          }
          
      
    }
          
 

// Mark the issue form as completed. Do this last incase of errors.
$sql = "UPDATE doc_issue_form SET completed=1 WHERE ifid=$ifid";
mysql_query($sql);

// Redirect back to whence we came
	


$url = $_REQUEST['returnUrl'];
header("Location: http://gha.dev.centralstep.com/doc_controller?m=y&ifid=$ifid");
  




//issue form and redirect
}

?>
