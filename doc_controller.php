<?php
// Make a database connection manually as we're outside of Drupals bootstrap.
 
 
  $connection = mysql_connect('localhost', 'root', 'root') 
                or die(mysql_error()); 

            $db = mysql_select_db('gha_two', $connection) 
                or die(mysql_error()); 
                
   // then clear the doc_numbers_temp table
                
                
    

            $query = "DELETE from doc_numbers_temp";
            mysql_query($query) 
                or die(mysql_error()); 
            mysql_close($connection); 


 
 
 
// Redirect this page on completion of script
header('Location: http://gha2.dev/sent-to-doc-controller'); 
 
 
 

 ?>             