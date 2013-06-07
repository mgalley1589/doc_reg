<?php
// Get the form ID from the $_REQUEST array
$ifid = $_REQUEST['ifid'];

//Connect to the database - as out of Drupal Core we don't have bootsrap.
 
include('includes/custom/dbConnect.php');

$query = "UPDATE doc_issue_form SET completed=1 WHERE ifid=$ifid;";
 mysql_query($query) 
 or die(mysql_error()); 
                
                $time = strtotime("now");
         
      
      // We need some more data from the database
      $numbers_query = "SELECT * FROM doc_issue_form_numbers where ifid=$ifid";
      $numbers = mysql_query($numbers_query);
      while ($numbers_data = mysql_fetch_array($numbers)) { 
          
          $nid = rand(250, 1000000);
          $vid = rand(250, 1000000);
    // node table insert      
  	$query_two = "INSERT INTO `node` (`nid`,`vid`,`type`,`language`,`title`,`uid`,`status`,`created`,`changed`,`comment`,`promote`,`moderate`,`sticky`,`tnid`,`translate`)
VALUES
	($nid,$vid,'issued','','123545',1,1,'$time','$time',2,1,0,0,0,0)";
	mysql_query($query_two)
	or die(mysql_error());
	
	//node_revision table insert
	$query_three = "INSERT INTO `node_revisions` (`nid`,`vid`,`uid`,`title`,`body`,`teaser`,`log`,`timestamp`,`format`)
VALUES
	($nid,$vid,1,'12345','','','','$time',0)";
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
	($vid, $nid, $pnid2, 'Marked for Issue','$doc_number', 'issued')";
	
	
	//echo $query_four;
	//exit();
	mysql_query($query_four)
	or die(mysql_error());
	

	
	
	//content_field_issue_revision
	$query_five = "INSERT INTO `content_field_issued_revision` (`vid`,`nid`,`delta`,`field_issued_revision_value`)
VALUES
	($vid,$nid,0,'A')";
	mysql_query($query_five)
	or die(mysql_error());
	

	
	// Finish the While Loop
	} 
	// Redirect back to whence we came
	

$url = $_REQUEST['returnUrl'];

$sql = "UPDATE doc_issue_form SET completed=1 WHERE ifid=$ifid";
mysql_query($sql);

header("Location: http://gha.dev.green-kiwi.co.uk$url&m=y");
  

 ?>             
