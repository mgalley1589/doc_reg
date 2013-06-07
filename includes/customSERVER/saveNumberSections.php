<?php

// Call the DB connection script
include('dbConnect.php');

// Get the NTID
$ntid = $_POST['ntid'];
                
// SECTION A - Get the Values
// Count array values so we know how many loops to make.
$a = count($_POST['sectionA']);

// Set a counter
$i = 0;

while ($i < $a) {  
// Get the variables from the loop array to prevent errors in the SQL statements
	$section = $_POST['sectionA'][0]['section'];
	$sectionTitle = $_POST['sectionA'][$i]['title'];
	$sectionValue = $_POST['sectionA'][$i]['value'];
	$sectionRange = $_POST['sectionA'][$i]['range'];
	
// only do the isnerts if the data set has values otherwise we will get false values in the database. We can determine thsi by checking the first value
if ($sectionTitle) {

// Insert into the database
     $sql = "INSERT INTO number_templates_elements VALUES ($ntid, 0, '$section') ";
     //echo $sql ."<br>";
    // exit();
     mysql_query($sql);
     
    //mysql_query($sql);
            
// Insert into the database            
    $sql2 = "INSERT INTO number_templates_elements_values VALUES (last_insert_id(), 0, '$sectionTitle', '$sectionValue', '$sectionRange', '$ntid')";
    
   // echo $sql2 . "<br>";
    
    mysql_query($sql2);
}

//Increment the counter  
  $i++;
  
}
    
    
    
    
// Section B
// Count array values so we know how many loops to make.
$b = count($_POST['sectionB']);

// Set a counter
$i = 0;

while ($i < $b) {  
// Get the variables from the loop array to prevent errors in the SQL statements
	$section = $_POST['sectionB'][0]['section'];
	$sectionTitle = $_POST['sectionB'][$i]['title'];
	$sectionValue = $_POST['sectionB'][$i]['value'];
	$sectionRange = $_POST['sectionB'][$i]['range'];
	
// only do the isnerts if the data set has values otherwise we will get false values in the database. We can determine thsi by checking the first value
if ($sectionTitle) {

// Insert into the database
     $sql = "INSERT INTO number_templates_elements VALUES ($ntid, 0, '$section') ";
     //echo $sql ."<br>";
    // exit();
     mysql_query($sql);
     
    //mysql_query($sql);
            
// Insert into the database            
    $sql2 = "INSERT INTO number_templates_elements_values VALUES (last_insert_id(), 0, '$sectionTitle', '$sectionValue', '$sectionRange', '$ntid')";
    
   // echo $sql2 . "<br>";
    
    mysql_query($sql2);
}

//Increment the counter  
  $i++;
  
}


// SECTION C

// Count array values so we know how many loops to make.
$c = count($_POST['sectionC']);

// Set a counter
$i = 0;

while ($i < $c) {  
// Get the variables from the loop array to prevent errors in the SQL statements
	$section = $_POST['sectionC'][0]['section'];
	$sectionTitle = $_POST['sectionC'][$i]['title'];
	$sectionValue = $_POST['sectionC'][$i]['value'];
	$sectionRange = $_POST['sectionC'][$i]['range'];
	
// only do the isnerts if the data set has values otherwise we will get false values in the database. We can determine thsi by checking the first value
if ($sectionTitle) {

// Insert into the database
     $sql = "INSERT INTO number_templates_elements VALUES ($ntid, 0, '$section') ";
     //echo $sql ."<br>";
    // exit();
     mysql_query($sql);
     
    //mysql_query($sql);
            
// Insert into the database            
    $sql2 = "INSERT INTO number_templates_elements_values VALUES (last_insert_id(), 0, '$sectionTitle', '$sectionValue', '$sectionRange', '$ntid')";
    
   // echo $sql2 . "<br>";
    
    mysql_query($sql2);
}

//Increment the counter  
  $i++;
  
}


// SECTION D

// Count array values so we know how many loops to make.
$d = count($_POST['sectionD']);

// Set a counter
$i = 0;

while ($i < $d) {  
// Get the variables from the loop array to prevent errors in the SQL statements
	$section = $_POST['sectionD'][$i]['section'];
	$sectionTitle = $_POST['sectionD'][$i]['title'];
	$sectionValue = $_POST['sectionD'][$i]['value'];
	$sectionRange = $_POST['sectionD'][$i]['range'];
	
// only do the isnerts if the data set has values otherwise we will get false values in the database. We can determine thsi by checking the first value
if ($sectionTitle) {

// Insert into the database
     $sql = "INSERT INTO number_templates_elements VALUES ($ntid, 0, '$section') ";
     //echo $sql ."<br>";
    // exit();
     mysql_query($sql);
     
    //mysql_query($sql);
            
// Insert into the database            
    $sql2 = "INSERT INTO number_templates_elements_values VALUES (last_insert_id(), 0, '$sectionTitle', '$sectionValue', '$sectionRange', '$ntid')";
    
   // echo $sql2 . "<br>";
    
    mysql_query($sql2);
}

//Increment the counter  
  $i++;
  
}


// SECTION E

// Count array values so we know how many loops to make.
$e = count($_POST['sectionE']);

// Set a counter
$i = 0;

while ($i < $e) {  
// Get the variables from the loop array to prevent errors in the SQL statements
	$section = $_POST['sectionE'][$i]['section'];
	$sectionTitle = $_POST['sectionE'][$i]['title'];
	$sectionValue = $_POST['sectionE'][$i]['value'];
	$sectionRange = $_POST['sectionE'][$i]['range'];
	
// only do the isnerts if the data set has values otherwise we will get false values in the database. We can determine thsi by checking the first value
if ($sectionTitle) {

// Insert into the database
     $sql = "INSERT INTO number_templates_elements VALUES ($ntid, 0, '$section') ";
     //echo $sql ."<br>";
    // exit();
     mysql_query($sql);
     
    //mysql_query($sql);
            
// Insert into the database            
    $sql2 = "INSERT INTO number_templates_elements_values VALUES (last_insert_id(), 0, '$sectionTitle', '$sectionValue', '$sectionRange', '$ntid')";
    
   // echo $sql2 . "<br>";
    
    mysql_query($sql2);
}

//Increment the counter  
  $i++;
  
}


// SECTION F
// Count array values so we know how many loops to make.
$f = count($_POST['sectionF']);

// Set a counter
$i = 0;

while ($i < $f) {  
// Get the variables from the loop array to prevent errors in the SQL statements
	$section = $_POST['sectionF'][$i]['section'];
	$sectionTitle = $_POST['sectionF'][$i]['title'];
	$sectionValue = $_POST['sectionF'][$i]['value'];
	$sectionRange = $_POST['sectionF'][$i]['range'];
	
// only do the isnerts if the data set has values otherwise we will get false values in the database. We can determine thsi by checking the first value
if ($sectionTitle) {

// Insert into the database
     $sql = "INSERT INTO number_templates_elements VALUES ($ntid, 0, '$section') ";
     //echo $sql ."<br>";
    // exit();
     mysql_query($sql);
     
    //mysql_query($sql);
            
// Insert into the database            
    $sql2 = "INSERT INTO number_templates_elements_values VALUES (last_insert_id(), 0, '$sectionTitle', '$sectionValue', '$sectionRange', '$ntid')";
    
   // echo $sql2 . "<br>";
    
    mysql_query($sql2);
}

//Increment the counter  
  $i++;
  
}


//SECTION G
// Count array values so we know how many loops to make.
$g = count($_POST['sectionG']);

// Set a counter
$i = 0;

while ($i < $g) {  
// Get the variables from the loop array to prevent errors in the SQL statements
	$section = $_POST['sectionG'][$i]['section'];
	$sectionTitle = $_POST['sectionG'][$i]['title'];
	$sectionValue = $_POST['sectionG'][$i]['value'];
	$sectionRange = $_POST['sectionG'][$i]['range'];
	
// only do the isnerts if the data set has values otherwise we will get false values in the database. We can determine thsi by checking the first value
if ($sectionTitle) {

// Insert into the database
     $sql = "INSERT INTO number_templates_elements VALUES ($ntid, 0, '$section') ";
     //echo $sql ."<br>";
    // exit();
     mysql_query($sql);
     
    //mysql_query($sql);
            
// Insert into the database            
    $sql2 = "INSERT INTO number_templates_elements_values VALUES (last_insert_id(), 0, '$sectionTitle', '$sectionValue', '$sectionRange', '$ntid')";
    
   // echo $sql2 . "<br>";
    
    mysql_query($sql2);
}

//Increment the counter  
  $i++;
  
}


// i think we're done :)

// Sent them to a confirmation page
header ('Location: http://gha.dev.green-kiwi.co.uk/number-template-saved');

?>