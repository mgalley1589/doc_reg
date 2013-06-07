<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <style type="text/css">
    div.error {display:none;}
    </style>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
      <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
  <script>
 
  $(function() {
    $( "#dp1" ).datepicker({dateFormat: 'yy-mm-dd'});
     $( "#dp2" ).datepicker({dateFormat: 'yy-mm-dd'});
  });
  
</script>
  </head>
  <body<?php print phptemplate_body_class($left, $right); ?>>

<!-- Layout -->
<?php 
// Function to call Login bar if user is authorised to access doc reg through LDAP
//if (function_exists('garland_admin_login_line')) print garland_admin_login_line();
 ?>
 
 
  <div id="header-top">
    <div id="header-container">
    
    
    <h1>Doc Reg - GHA Livigunn</h1>
   <?php
   global $user;
   ?>
    
    <?php if ($user->uid) {
    echo "<span class='account-meta'>Welcome, $user->name | <a href='/help'>Help</a> | <a href='/logout'>Logout</a></span>";
    }
    else {
    
   echo "<span class='account-meta'><a href='/user/login'>Login</a> | <a href='/help'>Help</a></span>"; 
   }
   ?>
    <br/>
    
    
<?php include('menu.tpl.php');?>
    
  <!--  <a href="/node/add/project" class="normalTip" title="Add a New project" style="position:absolute;margin-left: 690px; margin-top:10px;"><img src="themes/garland/images/newproject.png"/></a>&nbsp; <a href="/help" class="normalTip" title="Get Help" style="position:absolute;margin-left: 800px; margin-top:10px;"><img src="themes/garland/images/helpbtn.png"/></a>-->  
    </div> <!--END HEADER CONTAINER-->
</div>
 

 


         

    <div id="wrapper">
    <div id="container">

      <div id="header">
        
    

      </div> <!-- /header -->
      
      <div id="main-container">

              <div class="main-center-container"> 
          
      
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php //if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <div class="title-wrapper" style="margin-left:-20px;">
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title . "</h2>"; endif; ?>
        </div>
         <div class="header-blocks"><?php print $header; ?></div>	
          <?php //if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php // if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block" style="margin-top:-20px;">
            <?php 
            // Get some useful variables
            $sql = "SELECT title FROM {node} WHERE nid=%d";
            $project_title = db_result(db_query($sql, $_GET['nid']));
            
            $sql = "SELECT field_project_id_value FROM {content_type_project} WHERE nid=%d";
            $project_id = db_result(db_query($sql, $_GET['nid']));

            $sql = "SELECT field_project_manager_uid FROM {content_type_project} WHERE nid=%d";
            $project_manager = db_result(db_query($sql, $_GET['nid']));

            $sql = "SELECT name FROM {users} WHERE uid=%d";
            $project_manager_name = db_result(db_query($sql, $project_manager));

            $sql = "SELECT field_project_issue_office_value FROM {content_type_project} WHERE nid=%d";
            $project_issuing_office = db_result(db_query($sql, $_GET['nid']));

            ?>


            <div class="project-report-data">
              <span><label><strong>Project Code: </strong></label> <?php print $project_id;?></span><br/>
              <span><label><strong>Project Title: </strong></label> <?php print $project_title;?></span><br/>
              <span><label><strong>Project Manager: </strong></label> <?php print $project_manager_name;?></span>
            </div>

            <div class="project-report-data">
              <span><label><strong>Issuing Office Address</strong></label></span><br/>
              <?php
              $sql = "SELECT * FROM {content_type_office} WHERE nid=%d";
              $result = db_query($sql, $project_issuing_office);
              while ($row = db_fetch_array($result)) {
                
                if($row['field_office_al1_value']) {
                  echo $row['field_office_al1_value'] . "<br/>";
                }
                if($row['field_office_al2_value']) {
                  echo $row['field_office_al2_value'] . "<br/>";
                }
                if($row['field_office_al3_value']) {
                  echo $row['field_office_al3_value'] . "<br/>";
                }
                if($row['field_office_al4_value']) {
                  echo $row['field_office_al4_value'] . "<br/>";
                }
                if($row['field_office_al5_value']) {
                  echo $row['field_office_al5_value'] . "<br/>";
                }
                if($row['field_office_postcode_value']) {
                  echo $row['field_office_postcode_value'] . "<br/>";
                }
                if($row['field_office_phone_value']) {
                  echo $row['field_office_phone_value'];
                }
              }
              ?>
            </div>
            <div class="project-report-data" style="background:none; border:none; width:auto">
              <img src="http://www.ghalivigunn.com/images/site_bits/logo.jpg"/>
            </div>
            <div style="clear:both; height:50px;"></div>
         <form action="/generate-transmittal-report" method="get" id="transmittal-report" style="width:565px; float:left;">
           <input type="hidden" value="<?php echo $_GET['nid'];?>" name="nid"/>
        <label><strong>Date From: </strong></label><input type="text" name="from-date" id="dp1"/> 


        <label><strong>Date To: </strong></label><input type="text" name="to-date" id="dp2"/> <input type="submit" name="specific_dates" value="Generate Report"/>
      

        </form>
        
            <form id="clear-reports" method="post" action="/generate-transmittal-report?nid=<?php echo $_GET['nid'];?>" style="width:150px; float:left;">
              <input type="submit" value="Reset Report"/>
            </form>
            
            <div style="clear:both;"></div>
            
           

        <div id="transmittal-report-results">
          <h2 style="width:97%; background-color:#e4e4e4; padding:10px; border:1px solid #444; margin-bottom:20px;">Document Transmittal <?php if($_GET['from-date']) { print "&nbsp; &nbsp;( Date Range: " . $_GET['from-date'] . "&nbsp; - &nbsp;" . $_GET['to-date'] . ")";} ?></h2>
   <table border=1 style="width:300px; float:left;">
        <tbody>
          <tr>
            <th>Document Number</th>
            <th>Document Title</th>
          </tr>
 <?php 
 // Pull all numbers issued under this project from the database and write them to an array
 //Start the array
 $numbers_for_issue = array();
 $pid = $_GET[nid];
 if ($_GET['from-date']) {
   $from_date = $_GET['from-date'];
   $to_date = $_GET['to-date'];
 }
 $sql = "SELECT * FROM content_type_issued WHERE field_issued_project_id_nid=%d";
 $result = db_query($sql, $pid);
   while ($row = db_fetch_array($result)) { ?>
          <tr>
           <?php 
            // Show the document number
            echo "<td><a href='/node/$row[nid]'>$row[field_issued_doc_no_value]</a></td>";
            // show the document title
            echo "<td>$row[field_issued_doc_description_value]</td>";
            $numbers_for_issue[] .=$row[field_issued_doc_no_value];   
   } ?>
   </tr>
  </tbody>
</table>
          
          
          
          
          <?php
          // get the user generated project ID.
          $sql = "SELECT field_project_id_value from content_type_project WHERE nid=%d";
          $project_id = db_result(db_query($sql, $pid));
          
          // Get all the forms issued under the project
if ($_GET['from-date']) {
  $sql = "SELECT * FROM gha.doc_issue_form WHERE project_id='%s' AND completed='1' AND date between '$from_date' AND '$to_date' ORDER BY ifid ASC";
 } else {
   $sql = "SELECT * FROM gha.doc_issue_form WHERE project_id='%s' AND completed='1' ORDER BY ifid ASC";
 }
  $result = db_query($sql, $project_id);
  /*
  $result_check = db_fetch_array($result);
  if (!$result_check) {
    print "<h3 style='color:red; font-weight:bold;'>There were no documents issued during this date range</h3>";
  } else {*/
            while ($row = db_fetch_array($result)) {
              if(!$row['date']) {
                print "<h3 style='color:red; font-weight:bold'>There are no issue forms in that date range.</h3>";;
              }
              // reset the numbers array
              reset($numbers_for_issue);
                // print the dates and revisions  
              echo "<div class='revision-info'>";
              echo "<table>";
              echo "<tbody>";
              echo "<tr>";
              echo "<th>";
              echo date('d/m/y', strtotime($row['date']));
              echo "</th>";
              echo "</tr>";

             // for each issue form, select all numbers and order them alphabetically 
            $sql = "SELECT * FROM gha.doc_issue_form_numbers WHERE ifid=%d";
            $r = db_query($sql, $row['ifid']);
            while ($rows = db_fetch_array($r)) {             
              if (pos($numbers_for_issue) == $rows['doc_number']) {  
              
                  echo "<tr>";
                  echo "<td>" . $rows['revision'] . "</td>";
                  echo "</tr>";
                  next($numbers_for_issue);
             } else if (pos($numbers_for_issue) != $rows['doc_number']) {
                  echo "<tr>";
                  echo "<td>";
                  echo "<span style='color:white;'>A</span>"; //echo a blank space so the next revision is printed correctly
                  echo "</td>";
                  echo "</tr>";
                  next($numbers_for_issue);
             }
           
          }
          
          
          
          
           echo "</tbody>";
            echo "</table>";
            echo "</div>";
          }
          ?>
          <div style="clear:both;"></div>
          <table style="width:auto;">
            <tr>
              <td style="width:290px !important;">Document Status</td>
              <?php
              $sql = "SELECT * FROM gha.doc_issue_form WHERE project_id='%s' AND completed='1' ORDER BY ifid ASC";
          $result = db_query($sql, $project_id);
          while ($row = db_fetch_array($result)) {
            echo "<td style='width:40px !important;'>";
            echo $row['document_status'];
            echo "</td>";
          }
          ?>
          </tr>
          </table>
          <table style="margin-top:-18px;">
            <tr>
              <td><strong>1:</strong>Coding/Comment</td>
              <td><strong>2:</strong>Preliminary</td>
              <td><strong>3:</strong>Approval</td>
              <td><strong>4:</strong>Information</td>
              <td><strong>5:</strong>Tender</td>
              <td><strong>6:</strong>Construction</td>
              <td><strong>7:</strong>Asbuilt</td>
              <td><strong>8:</strong>Withdrawn</td>
                       
            </tr>
            
          </table>
<table><tr><td>Distribution</td></tr></table>
<table style="width:290px !important; float:left;">
  <tr>
    <td>Company</td>
    <td>Name</td>
  </tr>
  
  <?php
  $recipients = array();
  $sql = "SELECT * FROM gha.doc_issue_form INNER JOIN gha.doc_issue_form_recipient ON doc_issue_form.ifid=doc_issue_form_recipient.ifid WHERE doc_issue_form.project_id='%s'";
  $result = db_query($sql, $project_id);
  while ($rows = db_fetch_array($result)) {
      $recipients[] .=$rows['recipient_name'];
    }
    // Remove duplicates
  $rec = array_unique($recipients);
  
  // loop through the array to print all the names in there
  foreach($rec as $recipient) {
    if ($recipient) {
    echo "<tr>";
    echo "<td>Company Name</td>";
    echo "<td>";
    echo $recipient;
    echo "</td>";
    echo "</tr>";
  } else {}
  }
  
  ?>
  
  
  <?php
          // Get all the forms issued from a project
          $sql = "SELECT * FROM gha.doc_issue_form WHERE project_id='%s' ORDER BY ifid ASC";
          $result = db_query($sql, $project_id);
          while ($row = db_fetch_array($result)) {
            echo "<div class='revision-info'>";
            echo "<table style='width:48px; float:left'>";
            echo "<tbody>";
            echo "<tr>";
            echo "<th>";
            echo "Dist";
            echo "</th>";
            echo "</tr>";
            // reset numbers issue array
            reset($rec);
            // loop counter
            //$loop_limit = count($rec);
            // set $i;
           // $i = 0;
            // Now - for each issued form id, we look up the numbers issued on that form
            $sql1 = "SELECT * FROM gha.doc_issue_form_recipient WHERE ifid=%d";
            $r = db_query($sql1, $row['ifid']);
            while ($rows = db_fetch_array($r)) {
              
            if($rows['recipient_name']){
             
            // for each number check if it is inline with the array.
               if (pos($rec) == $rows['recipient_name']) {   
                 // build the shortcode
                 if ($rows['hard'] || $rows['cd']) {
                   if ($rows['hard'] >= 1) {
                   $hard_copies = $rows['hard'] .'h';
                 } else {
                   $hard_copies = 'h';
                 }}
                 if ($rows['dwg']) {
                   $dwg = 'D';
                 } else {
                   $dwg = '';
                 }
                 if($rows['word'] || $rows['excel'] || $rows['dwf'] || $rows['zip']) {
                   $elec = 'e';
                 } else {
                   $elec = '';
                 }
                 if($rows['pdf']) {
                   $pdf = 'P';
                 } else {
                   $pdf = '';
                 }
                 //build the shortcode 
                
                 $shortcode = $hard_copies . $dwg . $elec . $pdf;
                 
                  echo "<tr>";
                  echo "<td style='font-size:10px; line-height:10px; padding:6px;'>";
                  echo $shortcode;
                  echo "</td>";
                  echo "</tr>";
                  next($rec);
             } else {
                echo "<tr>";
                  echo "<td>";
                  echo "&nbsp;"; //echo a blank space so the next revision is printed correctly
                  echo "</td>";
                  echo "</tr>";
                  next($rec);
             } }
           else {}
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
            } 
           ?>
  
  
  
</table>
        
          
        
       
   





         

        </div>

          </div>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->
      </div>

      <?php //if ($right): ?>
            </div>
    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>