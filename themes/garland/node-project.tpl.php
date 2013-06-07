<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $

?>

<?php
if (arg(0) == 'node' && is_numeric(arg(1))) $pid = arg(1);
?>


<?php
    // set the project bookmark
	// First deleter the current record for the user
    $query = "DELETE FROM {last_viewd_project} WHERE user_id=%d";
  db_query($query,$user->uid);
    
	$query = "INSERT INTO {last_viewd_project} VALUES(0, $user->uid, $node->nid)";
  db_query($query);
    
	?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">


    
   
  
  <div class="content clear-block">
    
        <table border="0" bordercolor="" style="background-color:#ffffff; margin:10px 0 0 -5px;" width="750" cellpadding="0" cellspacing="0">
	<tr>
		<td><span class="project-label">Project ID</span><br/></td>
		<td><span class="project-label">Project Manager</span><br/></td>
		<td><span class="project-label">Client</span><br/></td>
    <!--<td><span class="project-label">Numbering Template</span><br/></td>-->
	</tr>
	<tr>
		<td><?php print $node->field_project_id[0]['view'];?></td>
		<td><?php print $node->field_project_manager[0]['view'];?></td>
		<td><?php print $node->field_project_client[0]['view'];?></td>
    <!--<td><?php print $node->field_project_doc_no_template[0]['view'];?></td>-->
	</tr>
</table>

    
    <div class="project-description">
      <span class="project-label">Project Description</span><br/>
      <?php print $node->field_project_description[0]['view'];?>
    </div>
      
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
 
   
   		
   <span style="font-family:Arial; font-weight:bold; color:#404040; font-size:16px; margin:0 0 0 -120px;">Document Numbers</span>



   <div class="usual">
   
   
   <ul class="idTabs"> 
  <li><a href="#all-issued-docs" name="all-issued-docs">Issued Docs</a></li> 
  <li><a href="#all-received-docs"name="all-received-docs">Received Docs</a></li> 
   <li><a href="#all-marked-nos" name="marked-for-issue" id="marked-for-issue-link" class="ui-tabs-active"># Marked for Issue</a></li>
    <li style="float:right;"><a href="/export">Export to CSV</a></li>
    <li style="float:right;"><a href="/generate-transmittal-report?nid=<?php echo $node->nid;?>">Generate Transmittal Report</a></li>
</ul> 
<div id="all-issued-docs"> 

   <table class='views-table cols-7'>
    <thead>
    <tr>
      <th class='views-field'>
        Document No
      </th>
      <th class='views-field'>
        Document Title
      </th>
      <th class='views-field'>
        Revision    
      </th>
      <th class='views-field'>
        Revision Date
      </th>
       <th class='views-field'>
        Current Status
      </th>
     </tr>
  </thead>
  <tbody>

  <?php // This is test of pulling all the revisions from the database

  $sql = "SELECT * FROM content_type_issued WHERE field_issued_project_id_nid=%d";
  $result = db_query($sql, $pid);
  while ($row = db_fetch_array($result)) { ?>

  <tr class='odd views-row-first'>  
    <td class='views-field' style="text-transform:uppercase;">
     <?php 
     // Show the document number
     echo "<a href='/node/$row[nid]'>$row[field_issued_doc_no_value]</a>";
     ?>
    </td>
    <td class='views-field'>
      <?php 
      // show the document title
      echo "<a href='/node/$row[nid]'> $row[field_issued_doc_description_value] </a>";?>
    </td>
    <td class='views-field'>
      <?php // show the revision
      // Look it up.
      $revNid = $row['nid'];
      $revSql = "SELECT field_issued_revision_value FROM content_field_issued_revision WHERE nid=%d ORDER BY timestamp DESC";
      $rev = db_result(db_query($revSql, $revNid));
      echo $rev;
      ?>
    </td>
    <td class='views-field'>
      <?php
      // Get the revision date
      $revDateSql = "SELECT date FROM content_field_issued_revision WHERE nid=%d ORDER BY timestamp DESC";
      $revDate = db_result(db_query($revDateSql, $revNid));
      echo $revDate;
      ?>
    </td>
    <td class='views-field'>
      <?php echo $row['field_issued_status_value'];?>
    </td>
</tr>
  <?php } ?>

</tbody>
</table>




  <?php
  // Call the view to display all issued docs by project
  //$view = views_get_view('all_issued_docs_by_project');
  // Print it out
  //print $view->execute_display('default');
  ?>
</div> 
<div id="all-received-docs">
	<?php
	//$returnDEST = curPageURL();;
	?>
	<a href="/node/add/received?destination=node/<?php print $nid;?>" class="customBTN" style="float:right;">Add Received Document</a>
<?php
// Call the view to displat all received docs by project
$view = views_get_view('all_received_docs_by_project');
// Print it out
print $view->execute_display('default');
?>
</div>
<div id="all-marked-nos">
  
  
  <?php 
  /*
  // Look up the project ID up in the database  
  $sql_pid = "SELECT nid FROM {node} WHERE title='%s'";
  // Assign the results to the variable
  $pid = db_result(db_query($sql_pid, $title));
  // Select all numbers from the database which correspond to the project ID that are availiable to be issued
  
  // Assign the results to a variable
  */?>
  
 
 <!-- Start the HTML for the numbers marked for issue table -->
 <!-- We're using a PHP file outside of Drupal's module system to process the issued numbers - it doesn't appear to work with a table derived from a function() --> 
 
 <!-- <form id="issue-table" method="post" action="/doc-issue-instruction"> -->
 <form id="issue-table" method="post" action="/includes/custom/assign_manual_number.php?nid=<?php print $nid;?>">
  <table class='views-table cols-7' id="issue-table">
    <thead>
    <tr>
      <th class='views-field'>
        Issue<br/>
         <?php  
  // Explode the URL to make all arguments availiable to theme
  $pageurl =  url($_GET['q']);
  $project = explode('/', $pageurl);
                 
  ?>
     
        	<input type="hidden" name="return_url" id="return_url" value="<?php print $project[2];?>"/>
        	<input type="hidden" name="manual_number_assign" id="manual_number_assign" value=""/>
          <input type="hidden" name="manual_number_title_assign" id="manual_number_title_assign" value=""/>
        	<input type="submit" class="customBTN" value="Add Number" style="position:absolute; margin:20px 0 0 0" name="add_number"/>
        </form>
      </th>
      <th class='views-field'>
        Number
      </th>
      <th class='views-field'>
        Number Title      
      </th>
     </tr>
  </thead>
  <tbody>
  	
<?php


$sql_no = "SELECT * FROM {doc_numbers} WHERE pid=%d ORDER BY nid";

  $numbers = db_query($sql_no, $pid);

  // Place the results into an associative array
 //such a plank matt - you dont need to call the array twice. Once will do, otherwise you truncate your results by 1 . 
  // $numbers_data = db_fetch_array($numbers);
 // Loop through the results set and assign key to value pairs
  $i=0;
  while ($numbers_data = db_fetch_array($numbers)) {   
   ?>
 
 
 
  <tr class='odd views-row-first'>  
  	
    <td class='views-field'>
      <!-- Assign the number as the value of the checkbox -->
      
      <?php if ($numbers_data['status'] == 1) {?>
        <input type="checkbox" name="issue[<?php echo $i;?>]" disabled="disabled" value="<?php echo $numbers_data['number'];?>" />
      <?php } else {?>
      <input type="checkbox" name="issue[<?php echo $i;?>]" value="<?php echo $numbers_data['number'];?>" />
      <?php } ?>


      
    </td>
    <td class='views-field' style="text-transform:uppercase;">
   <?php echo $numbers_data['number'];?>
  </td>
  
 <td class='views-field'>
   <?php
   echo $numbers_data['number_title'];
 
 // we place the hidden field here so it can pick up the number title from the Whole loop =)
   echo "<input type='hidden' name='number_title' id='number_title' value='$number_title'>";
   echo  "<input type='hidden' name='db_pid' id='db_pid' value='$pid'>";
  ?>
   
   <?php // Increment Counter and Close off the while loop
   $i++;
    }
   ?>


 
   
  
    
  </td> </tr>
</tbody> </table>
<input type="hidden" name="nid" id="nid" value="<?php print $nid;?>"/>
<input type="hidden" name="project_id" id="project_id" value="<?php print $node->field_project_id[0]['view'];?>"/>
<input type="hidden" name="project_title" id="project_title" value="<?php print $title; ?>"/>
<input type="hidden" name="project_manager" id="project_manager" value="root"/> 
<input type="hidden" name="current_url" id="current_url" value="<?php print $_SERVER[REDIRECT_URL];?>"/>
<?php 
//echo "<pre>";
//print_r($node);
//echo "</pre>";
?>
<input type='submit' value='Issue' name="issue_numbers">
</form>


</div>
    
   </div>
   
   
    <?php echo $template_id ;?>
    
  </div>

  <div class="clear-block">
    <div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms"><?php print $terms ?></div>
    <?php endif;?>
    </div>

    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </div>

</div>



