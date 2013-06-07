<?php
// Redirect this page on completion of script
header('Location: http://gha2.dev/assign-docs');


// First things first - take the numbers out of the post array.


$number_title = $_REQUEST['number_title'];
$project_id = $_REQUEST['project_id'];
$project_title = $_REQUEST['project_title'];
$db_pid = $_REQUEST['db_pid']; 
 
 
 
  $connection = mysql_connect('localhost', 'root', 'root') 
                or die(mysql_error()); 

            $db = mysql_select_db('gha_two', $connection) 
                or die(mysql_error()); 
                
   foreach($_POST['issue'] as $number) {


            $query = "INSERT into doc_numbers_temp (id, pid, number, number_title, project_title, project_id)
				VALUES (0, $db_pid, '$number', '$number_title', '$project_title', '$project_id')";
            mysql_query($query) 
                or die(mysql_error()); 
                }

            mysql_close($connection); 


 
 
 
 
 
 
 
 
// We need to manualy connect to the database because we are using an external PHP file outside Drupal's bootstrap

//mysql_connect('localhost', 'root', 'root');

// Select the GHA database

//mysql_select_db('gha2');
  

// Now we start our for loop on the post array for numbers that are for issue  
//foreach($_POST['issue'] as $number) {
   
  /*$query = "INSERT into doc_numbers_temp (id, pid, number, number_title, project_title, project_id)
				VALUES (0, 2, 'test-100', 'title', 'water pipe', 'test')";
  mysql_query($query);
   
  // }
// Close the SQL connection so Drupal doesn't get confused - not likely to happen but better safe than sorry
  // mysql_close()

   
   
  
  /*
  echo "<div class='number-for-issue-container'>";
  	echo "<span class='doc-num-for-issue'> <strong>Doc Number:</strong> $number </span>";
  	echo "<br/>";
  	echo "<span class='doc-num-for-issue'> <strong>Doc Title:</strong> $number_title </span>";
  	echo "<br/>";
  	echo "<span class='doc-num-for-issue'> <strong>Project Title:</strong> $project_id </span>";
  	echo "<br/>";
  	echo "<span class='doc-num-for-issue'> <strong>Project ID:</strong> $project_title </span>";
  	echo "<br/>";
  	echo "<a href='/node/add/issued?destination=includes/custom/doc_controller.php?edit[title]=$number_title&edit[field_issued_doc_no][0][value]=$number&edit[field_issued_project_id][0][nid][nid]=$project_title'>Assign document</a>";  
    	  echo "</div>";
  	  
 */
   // }
 ?>             