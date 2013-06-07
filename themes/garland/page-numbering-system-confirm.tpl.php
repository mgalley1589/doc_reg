<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <style type="text/css">
      
      ul.tabs {display:none;}
    </style>
    <?php print $scripts ?>
    
   
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
  </head>
  <body<?php print phptemplate_body_class($left, $right); ?>>

<!-- Layout -->
<?php 
// Function to call Login bar if user is authorised to access doc reg through LDAP
//if (function_exists('garland_admin_login_line')) print garland_admin_login_line();
 ?>
 
  <?php  
  // Explode the URL to make all arguments availiable to theme
  $pageurl =  url($_GET['q']);
  $project = explode('/', $pageurl);
                 
  ?>
            
 
<div id="header-top">
    <div id="header-container">
    
    
    <h1>Doc Reg - GHA Livigunn</h1>
   
    
    <span class="account-meta">Welcome, <?php echo $username = $user->name;?> | <a href="/help">Help</a> | <a href="/logout">Logout</a></span>
    <br/>
    
    
    
   <?php 
   
   //Dynamically highlights current page
  $pageurl =  url($_GET['q']);
  
  if ($project[1] == 'project')
    {$current = 'one';}
  elseif ($pageurl == '/projects')
    {$current = 'two';}
  elseif ($pageurl == '/docs')
    {$current = 'three';}
  elseif ($pageurl == '/number_templates')
    {$current = 'four';}    
  elseif ($pageurl == '/reports')
    {$current = 'five';}
  elseif ($pageurl == '/admin')
    {$current = 'six';}
  ?>
    
    
    
    

   <style type="text/css">
ul.main-contextual-links li a.<?php echo $current; ?> {
display:inline; background-color:#e5e5e5; padding:5px 7px; color:green; text-decoratione:none;
}
</style>
    
   
           


  <ul class="main-contextual-links">
      
      <ul class="main-contextual-links">
      <li><a href="/dashboard" class="one">Dashboard</a></li>
      <!--<li><a href="/projects" class="two">Projects</a></li>
      <li><a href="/docs" class="three">Docs</a></li>-->
      <?php if ($user->uid = 1) { // Print the Admin only Options
      ?>
      <li><a href="/number_templates_list" class="four">Number Templates</a></li>
      <li><a href="/reports" class="five">Reports</a></li>
      <li><a href="/admin" class="six">Admin</a></li>
      <?php } else {} ?>
    <br/><br/>
      
      
      <li><a href="/project/<?php echo $project[2];?>" class="one">Overview</a></li>
      <li><a href="/numbering_system/template_id/<?php echo $result; ?>" class="two">Assign Doc #s</a></li>
      </ul>
  <!--  <a href="/node/add/project" class="normalTip" title="Add a New project" style="position:absolute;margin-left: 690px; margin-top:10px;"><img src="themes/garland/images/newproject.png"/></a>&nbsp; <a href="/help" class="normalTip" title="Get Help" style="position:absolute;margin-left: 800px; margin-top:10px;"><img src="themes/garland/images/helpbtn.png"/></a>-->  
    </div> <!--END HEADER CONTAINER-->
 <div class="header-blocks"><?php print $header; ?></div></div>
 
      

         

    <div id="wrapper" style="margin-top:6px;" >
    <div id="container">

      <div id="header">
        
    

      </div> <!-- /header -->
      
      <div id="main-container">

              <div class="main-center-container"> 
          
          <?php //print $breadcrumb; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <?php print $messages ?>
        <div class="title-wrapper" style="margin:0 0 40px -20px; padding:0 0 0 10px;">
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>  
        

        </div>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php //if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php //if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block">
     
              
              <?php 
              
              /*
              echo "<pre>";
              print_r($_POST);
              echo "</pre>";
              exit();
  */
              
 $projectID = $_POST['nodeID'];
 $docTitle = $_POST['docTitle'];
 $docsRequired = $_POST['docsRequired'];
 $tid = $_POST['templateID'];
 $seperator = $_POST['seperator'];
              
  
   // Loop through all the possible sections and apply the value to a variable if it has one
              
 // Section A
if ($_POST['sectionA']) {
    $sectionA = $_POST['sectionA'];
//Look up the values in the database                
    $sql = "SELECT value FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
    $a = db_result(db_query($sql, $sectionA, $tid));
    $sql = "SELECT nrid FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
$anrid = db_result(db_query($sql, $sectionA, $tid));
    

}


 // Section B
if ($_POST['sectionB']) {
    $sectionB = $_POST['sectionB'];
//Look up the values in the database                
    $sql = "SELECT value FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
    $b = db_result(db_query($sql, $sectionB, $tid));
   $sql = "SELECT nrid FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
$bnrid = db_result(db_query($sql, $sectionB, $tid));
}

//Section C
if ($_POST['sectionC']) {
    $sectionC = $_POST['sectionC'];
//Look up the values in the database                
    $sql = "SELECT value FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
    $c = db_result(db_query($sql, $sectionC, $tid));
    
    $sql = "SELECT nrid FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
$cnrid = db_result(db_query($sql, $sectionC, $tid));

}


 // Section D
if ($_POST['sectionD']) {
    $sectionD = $_POST['sectionD'];
//Look up the values in the database                
    $sql = "SELECT value FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
    $d = db_result(db_query($sql, $sectionD, $tid));
    
    $sql = "SELECT nrid FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
$dnrid = db_result(db_query($sql, $sectionD, $tid));
    
}
              
 // Section E
if ($_POST['sectionE']) {
    $sectionE = $_POST['sectionE'];
//Look up the values in the database                
    $sql = "SELECT value FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
    $e = db_result(db_query($sql, $sectionE, $tid));
    $sql = "SELECT nrid FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
$enrid = db_result(db_query($sql, $sectionE, $tid));
}

 // Section F
if ($_POST['sectionF']) {
    $sectionF = $_POST['sectionF'];
//Look up the values in the database                
    $sql = "SELECT value FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
    $f = db_result(db_query($sql, $sectionF, $tid));
    $sql = "SELECT nrid FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
$fnrid = db_result(db_query($sql, $sectionF, $tid));
    
}

 // Section G
if ($_POST['sectionG']) {
    $sectionG = $_POST['sectionG'];
//Look up the values in the database                
    $sql = "SELECT value FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
    $g = db_result(db_query($sql, $sectionG, $tid));
    $sql = "SELECT nrid FROM {number_templates_elements_values} WHERE title='%s' AND ntid=%d";
$gnrid = db_result(db_query($sql, $sectionG, $tid));
}


// Give the $rid a value so we can save the last_issued table data
if($anrid){
$rid = $anrid;
}
if($bnrid){
$rid = $bnrid;
}
if($cnrid) {
	$rid = $cnrid;
}
if($dnrid) {
	$rid = $dnrid;
}
if ($enrid) {
	$rid = $enrid;
}
if ($fnrid) {
	$rid = $fnrid;
}
if ($gnrid) {
	$rid = $gnrid;
}



// Once we have the values we need to know which one has the range attached to it.

// Section A Range check
$sql = "SELECT number FROM {last_issued} WHERE rid=%d ORDER BY ID DESC";
$result = db_result(db_query($sql, $anrid));
if (db_affected_rows($result) > 0) {
$aid = $result;	
} else {
$sql = "SELECT rangeStart FROM {number_templates_ranges} WHERE nrid=%d";
$aid = db_result(db_query($sql, $anrid));
}

// Section B Range check
$sql = "SELECT number FROM {last_issued} WHERE rid=%d ORDER BY ID DESC";
$result = db_result(db_query($sql, $bnrid));
if (db_affected_rows($result) > 0) {
$bid = $result;	
} else {
$sql = "SELECT rangeStart FROM {number_templates_ranges} WHERE nrid=%d";
$bid = db_result(db_query($sql, $bnrid));
}

// Section C Range check

$sql = "SELECT number FROM {last_issued} WHERE rid=%d ORDER BY ID DESC";
$result = db_result(db_query($sql, $cnrid));
if (db_affected_rows($result) > 0) {
$cid = $result;	
} else {
$sql = "SELECT rangeStart FROM {number_templates_ranges} WHERE nrid=%d";
$cid = db_result(db_query($sql, $cnrid));
}


// Section D Range check
$sql = "SELECT number FROM {last_issued} WHERE rid=%d ORDER BY ID DESC";
$result = db_result(db_query($sql, $dnrid));
if (db_affected_rows($result) > 0) {
$did = $result;	
} else {
$sql = "SELECT rangeStart FROM {number_templates_ranges} WHERE nrid=%d";
$did = db_result(db_query($sql, $dnrid));
}



// Section E Range check
$sql = "SELECT number FROM {last_issued} WHERE rid=%d ORDER BY ID DESC";
$result = db_result(db_query($sql, $enrid));
if (db_affected_rows($result) > 0) {
$eid = $result;	
} else {
$sql = "SELECT rangeStart FROM {number_templates_ranges} WHERE nrid=%d";
$eid = db_result(db_query($sql, $enrid));
}



// Section F Range check
$sql = "SELECT number FROM {last_issued} WHERE rid=%d ORDER BY ID DESC";
$result = db_result(db_query($sql, $fnrid));
if (db_affected_rows($result) > 0) {
$fid = $result;	
} else {
$sql = "SELECT rangeStart FROM {number_templates_ranges} WHERE nrid=%d";
$fid = db_result(db_query($sql, $fnrid));
}

// Section G Range check
$sql = "SELECT number FROM {last_issued} WHERE rid=%d ORDER BY ID DESC";
$result = db_result(db_query($sql, $gnrid));
if (db_affected_rows($result) > 0) {
$gid = $result;	
} else {
$sql = "SELECT rangeStart FROM {number_templates_ranges} WHERE nrid=%d";
$gid = db_result(db_query($sql, $gnrid));
}


// assign $rangeStart based on which of the range check queries returned true.

  ?>
      
              
 

         <form id="submitDocNumsSave" method="post" action="/includes/custom/assignDocNos.php">     
              <table id="assignDocNoConfirm" />
              <thead>
              <tr>
              	<th><strong>Doc Number</strong></th>
              	<th><strong>Doc Title</strong></th>
              	</tr>
              </thead>
              
              <?php
              


// Now we assemble the number stub - this is prior to adding the auto increment ID to it.
// We check each possible section to see if we have set it as a number range. If we have we assign it to the $rangeStart variable.

if ($aid){
$rangeStart = $aid;
} 
elseif($bid){
 $rangeStart = $bid;
}
elseif($cid){
    $rangeStart = $cid;
}
elseif($did){
    $rangeStart = $did;
}
elseif($eid){
    $rangeStart = $eid;
}
elseif($fid){
    $rangeStart = $fid;
}
elseif($gid){
    $rangeStart = $gid;
};
              
			  
    
//  Check which is set and replace the value with the incrementing range.
if($aid){
 $a = $aid;
}
elseif($bid){
    $b = $bid;
}
elseif($cid){
    $c = $cid;
}
elseif($did){
    $d = $did;
}
elseif($eid){
    $e = $eid;
}
elseif($fid){
    $f = $fid;
}
elseif($gid){
    $g = $gid;
}




        
// Now we generate the numbers.  
$no = $_POST['docsRequired'];
$torange = $rangeStart + $no;
 if ($_POST['docTitle']) {
    $docTitle = $_POST['docTitle']; 
} else { 
    $docTitle = 'Spare';
} 


 while ($rangeStart != $torange) { 
    
     
     // Now we can assemble the number based on the above
if($a){
    $number = $a;
}
if($b){
    $number = $a.$seperator. $b;
}
if($c){
    $number = $a. $seperator.$b.$seperator.$c ;
}
if($d){
     $number = $a.$seperator.$b.$seperator.$c.$seperator.$d;
}
if($e){
          $number = $a .$seperator .$b.$seperator.$c.$seperator.$d.$seperator.$e;
}
if($f){
      $number = $a.$seperator.$b.$seperator.$c. $seperator.$d.$seperator .$e .$seperator .$f;
}
if($g){
      $number = $a .$seperator.$b.$seperator.$c. $seperator.$d.$seperator .$e .$seperator .$f .$seperator .$g;
}


/*

// Check the number doesn't already exist.
$sql = "SELECT number FROM doc_numbers WHERE number='%s'";
$return = db_query($sql, $number);
if(db_affected_rows($result) > 0) {
  //in here we need to increment the number by one
  echo "<tr>";				
echo "<td>";
echo "It already exists";
echo "</td>";
echo "<td>";
echo "<input type='hidden' name='number[0][$i]' value='$number'/>";
echo "<input type='text' name='docTitle[0][$i]' value='$docTitle'/>";
echo "<input type='hidden' name='projectID' value='$projectID'/>";
echo "</td>";
} else {*/
  // if it doesn't exist we can just enter the number
echo "<tr>";				
echo "<td>";
echo $number;
echo "</td>";
echo "<td>";
echo "<input type='hidden' name='number[0][$i]' value='$number'/>";
echo "<input type='text' name='docTitle[0][$i]' value='$docTitle'/>";
echo "<input type='hidden' name='projectID' value='$projectID'/>";
echo "</td>";
//}
 if($aid){                                                              
    $a++;                                                                           
 }
if($bid){
     $b++;
 }
if($cid){
     $c++;
 }
if($did){
     $d++;
 }
if($eid){
     $e++;
 }
if($fid){
     $f++;
 }
 $rangeStart++;
 }
   
    
		 
                                                                            
				// Check if the number already exists.
				/*
				$numberCheckSql = "SELECT number FROM {doc_numbers} WHERE number='%s'";
				$numberCheck = db_result(db_query($numberCheckSql, $number));
				 
				 if (db_affected_rows($numberCheck > 0)) {
				 
				 $newNumber = $_POST['sectionAvalue'] . $seperator . $startRange++;
				 //$newNumber = $startRange++ . $seperator . $_POST['sectionBvalue'] . $seperator . $_POST['sectionAvalue'];
				 
				 echo "<label>";
               echo $number;
               echo "</label>&nbsp; &nbsp; ";
               echo "</td>";
               echo "<td>";
               echo "<input type='hidden' name='number[0][$i]' value='$number'/>";
               echo "<input type='text' name='docTitle[0][$i]' value='$docTitle'/>";
               echo "<input type='hidden' name='projectID' value='$projectID'/>";
               echo "</td>";
               
				 
				 
				 } 
                                 /*else {*/
				               
               
             
               
               /*}*/
                                 
                           
              
//$rangeStart++;

//}
              
?>

</table>
<!-- hidden fields to pass to the data to save -->
<input type="hidden" name="rangeStart" value="<?php echo $rangeStart;?>"/>
<input type="hidden" name="numberTemplateID" value="<?php echo $tid;?>" />
<input type="hidden" name="rangeID" value="<?php echo $rid;?>"/>
<input type="submit" value="Save Doc Nos" class="btn primary"style="float:right;"/>
</form>
              
              
        <?php
        /*
$sql = "INSERT into {doc_numbers} VALUES (0, '%s', '%s', %d)";
db_query($sql, $default_title, $number, $pid);
*/
       ?>
            <?php print $content ?>
            
         
       
           
          </div>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      
        </div>
    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>
