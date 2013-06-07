<?php
session_start();
session_save_path('/home/mjg1989/public_html/dev/gha/sessions');
ini_set('session.gc_probability', 1);
include('dbConnect.php');

$number = $_POST['manual_number_assign'];
$returnUrl = $_POST['return_url'];
$pid = $_GET['nid'];
if ($_POST['manual_number_title_assign']) {
	$title = $_POST['manual_number_title_assign'];
} else {
$title = 'Spare';
}
$redirect_url = $_POST['current_url'];


if($_POST['add_number']) {
	// This will submit a manual number
	

	/*
$number = $_POST['manualNumber'];
$returnUrl = $_POST['returnUrl'];
$pid = $_POST['manualPID'];
*/

//$result = array();
//Check if the number exists
/*
$number = 'LS-1105';
$pid = 167587654;
*/
//unset ($result);

$numberCheckSql = "SELECT number FROM doc_numbers WHERE number='$number' AND pid=$pid";
//$numberCheckSql = "SELECT number FROM doc_numbers WHERE pid=$pid";

		$result = mysql_query($numberCheckSql);
		$num_rows = mysql_num_rows($result);
	
		
		
		if($num_rows > 0 ) {
			//if($result != NULL) {
			// redirect back - Number can't be added
		header("Location: http://gha.dev.centralstep.com/project/$returnUrl?s=n");
		} else {
			// add number to the database and redirect back
			$sql = "INSERT into doc_numbers VALUES (0, '$title', '$number', $pid, 0)";
			//echo $sql;
			
    mysql_query($sql) or die (mysql_error($sql));
//redirect back to the page with a success message
			header ("Location: http://gha.dev.centralstep.com/project/$returnUrl?s=y");
		
			
		}


/*		
		
		
		if($result != null) {
	
	while ($row = mysql_fetch_array($result)) {
		
		$sql = "INSERT into doc_numbers VALUES (0, '$title', '$number', $pid, 0)";
    mysql_query($sql);
		

	
	header ("Location: http://gha.dev.green-kiwi.co.uk/project/$returnUrl?&s=y");
	}
		} else {
		header("Location: http://gha.dev.green-kiwi.co.uk/project/$returnUrl?s=n");
		}
		
	
	
	
		/*
//print_r($result);
		//exit();
		$num_rows = mysql_num_rows($result);
		
	
if ($num_rows > 0) {
		//redirect back to the page with a result that has incremented by one.
		header("Location: http://gha.dev.green-kiwi.co.uk/project/$returnUrl?&s=n");
				} else {
				//insert into the database
	$sql = "INSERT into doc_numbers VALUES (0, '$title', '$number', $pid, 0)";
    mysql_query($sql);
//redirect back to the page with a success message
			header ("Location: http://gha.dev.green-kiwi.co.uk/project/$returnUrl?&s=y");
}
			*/	
	
} else {
  
	//This will submit a document instruction form


/*

if(!isset($_SESSION['doc_instruction']))
    {
    $_SESSION['doc_instruction'] = array();
    }
$doc_instruction = & $_SESSION['doc_instruction'];



$doc_instruction['nid'] = $_POST['nid'];
$doc_instruction['issue'] = $_POST['issue'];
$doc_instruction['project_id'] = $_POST['project_id'];
$doc_instruction['project_title'] = $_POST['project_title'];
$doc_instruction['project_manager'] = $_POST['project_manager'];

*/

//include('dbConnect.php');
// Save all the data to the database

$sql = "INSERT into di_variables VALUES(0, 'nid', '$_POST[nid]', 0)";
mysql_query($sql) or die(mysql_error());

$sql = "INSERT into di_variables VALUES(0, 'project_id', '$_POST[project_id]', 0)";
mysql_query($sql);


$sql = "INSERT into di_variables VALUES(0, 'project_title', '$_POST[project_title]', 0)";
mysql_query($sql);


$sql = "INSERT into di_variables VALUES(0, 'project_manager', '$_POST[project_manager]', 0)";
mysql_query($sql);

// issue array needs to be imploded

$numbers_for_issue = implode('~', $_POST['issue']);


$sql = "INSERT into di_variables VALUES(0, 'numbers_for_issue', '$numbers_for_issue', 0)";
mysql_query($sql);

 	header ("Location: http://gha.dev.centralstep.com/doc-issue-instruction?r=$redirect_url&pid=$_GET[nid]");
	}

?>		
				


