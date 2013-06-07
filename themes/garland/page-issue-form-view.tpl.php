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
	div.error{display:none;}
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
  
  if ($pageurl == '/dashboard')
  	{$current = 'one';}
  elseif ($pageurl == '/projects')
  	{$current = 'two';}
  elseif ($pageurl == '/doc_controller')
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
      <li><a href="/dashboard" class="one">Dashboard</a></li>
      <li><a href="/doc_controller" class="two">Doc Controller</a></li>
      <!--<li><a href="/projects" class="two">Projects</a></li>
      <li><a href="/docs" class="three">Docs</a></li>-->
      <?php if ($user->uid = 1) { // Print the Admin only Options
      ?>
      <li><a href="/number_templates_list" class="four">Number Templates</a></li>
      <li><a href="/reports" class="five">Reports</a></li>
      <li><a href="/admin" class="six">Admin</a></li>
      <?php } else {} ?>
    </ul>    
  <!--  <a href="/node/add/project" class="normalTip" title="Add a New project" style="position:absolute;margin-left: 690px; margin-top:10px;"><img src="themes/garland/images/newproject.png"/></a>&nbsp; <a href="/help" class="normalTip" title="Get Help" style="position:absolute;margin-left: 800px; margin-top:10px;"><img src="themes/garland/images/helpbtn.png"/></a>-->  
    </div> <!--END HEADER CONTAINER-->
 <div class="header-blocks"><?php print $header; ?></div></div>
 
      

         

    <div id="wrapper">
    <div id="container">

      <div id="header">
        
    

      </div> <!-- /header -->
      
      <div id="main-container">
<?php
$ifid = $_GET['id'];?>

              <div class="main-center-container"> 
          
          <?php //print $breadcrumb; ?>
        
        <?php print $messages ?>
        <div class="title-wrapper">
        <h2 class="with-tabs" style="padding-left:20px;">Issue Form ID : <?php echo $ifid;?></h2>  <div id="pdf-export">
<a href=/pdf-export.php" class="btn primary">Export as PDF</a>
</div>

          
        </div>
          <?php //if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php //if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php //if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block">
          
          <?php
          //echo "<pre>";
          //print_r($_GET);
          //echo "</pre>";
          ?>
          
          
                    
            <?php //print $content ?>
                         
         <style>
table td {border: 1px solid silver; padding: 3px; font-size: 13px;}
form input[type=text] {border: 0px; font: bold 13px ;}
.mytextarea  { width: 100%; border: 0px; font: bold 13px; height: 120px;}
</style>

		<?php if($_GET['s']) {?>
			
			
			 <div class="content"><div class="alert-message warning" style="padding:7px;">
<h3>Message</h3>
<p>Issue form progress saved.
</p></div>
	<?php 
		} elseif ($_GET['m']){?>
			
			 <div class="content"><div class="alert-message warning" style="padding:7px;">
<h3>Message</h3>
<p>Documents Issued</p></div>
			<?php } else {}?>



<form method="post" action="/includes/custom/saveProgress.php">
<table width="75%">
	
	<?php
	// Query the database
	$sql = "SELECT * FROM {doc_issue_form} WHERE ifid=%d";
	$result = db_query($sql, $ifid);
	while ($rows = db_fetch_array($result)) { ?> 
		
		
		
	
<tr>
	<td>Generated by<br /><input type="text" name="generated_by" value="<?php print $rows['generated_by'];?>" disabled="disabled" /></td>
	<td>Date<br /><input type="text" name="date" value="<?php echo $rows['date'];?>" disabled="disabled" /></td>
</tr>
<tr>
	<td>Project ID<br /><input type="text" name="project_id" value="<?php echo $rows['project_id'];?>" disabled="disabled" /></td>
	<td>Project Title<br /><input type="text" name="project_title" value="<?php echo $rows['project_id'];?>" disabled="disabled" /></td>
</tr>
<tr>
	
	<td>Project Lead<br /><input type="text" name="project_manager" value="<?php echo $rows['project_lead'];?>" disabled="disabled"/></td>
</tr>
</table><br /><br />

<table width="75%">
	
<tr>
	<td>Issue Description<br /><textarea name="issue_description" class="mytextarea" disabled="disabled"><?php echo $rows['issue_description'];?></textarea></td>
</tr>
<tr>
	<td>Special Issue Instructions<br /><textarea name="special_issue_instructions" class="mytextarea" disabled="disabled"><?php echo $rows['special_issue_instruction'];?></textarea></td>
</tr>
</table><br /><br />


<?php } ?>
	

<table>

<table width="75%">
<tr>
	<td>Reciepient(s) Name</td>
	<td>Word</td>
	<td>Excel</td>
	<td>PDF</td>
	<td>DWF</td>
	<td>DWG</td>
	<td>Hard</td>
	<td>Zip</td>
	<td>CD</td>
	
</tr>

<?php 

$sql = "SELECT * FROM {doc_issue_form_recipient} WHERE ifid=%d";
$result = db_query($sql,$ifid);
while ($rows = db_fetch_array($result)) {
$r = 0;
//$looplimit = count($result);
//while($r <= $looplimit) {
	//$rows = db_fetch_array($result);
	$word = $rows['word'];
	$excel = $rows['excel'];
	$pdf = $rows['pdf'];
	$dwf = $rows['dwf'];
	$dwg = $rows['dwg'];
	$hard = $rows['hard'];
	$zip = $rows['zip'];
	$cd	= $rows['cd'] ;
	
	?>
	
	
	
	<tr>
	<td><input type="text" value="<?php echo $rows['recipient_name'];?>" name="<?php echo $rows['recipient_row'];?>" disabled="disabled"/></td>
	<?php if($word) {?> 
	<td><center><input type="checkbox" value="1" name="word[<?php echo $r;?>]" disabled="disabled" checked /></center></td>
	<?php } else {?>
		<td><center><input type="checkbox" value="1" name="word[<?php echo $r;?>]" disabled="disabled"/></center></td>
		<?php } ?>
		
	<?php if($excel) {?>
	<td><center><input type="checkbox" value="1" name="excel[<?php echo $r;?>]" disabled="disabled" checked ></center></td>
	<?php } else {?>
	<td><center><input type="checkbox" value="1" name="excel[<?php echo $r;?>]" disabled="disabled"/></center></td>
	<?php } ?>
	
	<?php if($pdf){?>	
	<td><center><input type="checkbox" value="1" name="pdf[<?php echo $r;?>]" disabled="disabled" checked/></center></td>
	<?php } else {?>
	<td><center><input type="checkbox" value="1" name="pdf[<?php echo $r;?>]" disabled="disabled"/></center></td>
	<?php } ?>
	
	<?php if($dwf) {?>
	<td><center><input type="checkbox" value="1" name="dwf[<?php echo $r;?>]" disabled="disabled" checked/></center></td>
	<?php } else { ?>
	<td><center><input type="checkbox" value="1" name="dwf[<?php echo $r;?>]" disabled="disabled"/></center></td>
	<?php } ?>
	
	<?php if($dwg) {?>
	<td><center><input type="checkbox" value="1" name="dwg[<?php echo $r;?>]" disabled="disabled" checked/></center></td>
	<?php } else {?>
	<td><center><input type="checkbox" value="1" name="dwg[<?php echo $r;?>]" disabled="disabled"/></center></td>
	<?php } ?>
	
	<?php if($hard) {?>
	<td><center><input type="checkbox" value="1" name="hard[<?php echo $r;?>]" disabled="disabled" checked/></center></td>
	<?php } else {?>
	<td><center><input type="checkbox" value="1" name="hard[<?php echo $r;?>]" disabled="disabled"/></center></td>
	<?php } ?>
	
	<?php if($zip) {?>
	<td><center><input type="checkbox" value="1" name="zip[<?php echo $r;?>]" disabled="disabled" checked/></center></td>
	<?php } else { ?>
		<td><center><input type="checkbox" value="1" name="zip[<?php echo $r;?>]" disabled="disabled"/></center></td>
		<?php } ?>
		
		<?php if($cd) { ?>	
	<td><center><input type="checkbox" value="1" name="cd[<?php echo $r;?>]" disabled="disabled" checked/></center></td>
	<?php } else {?>
		<td><center><input type="checkbox" value="1" name="cd[<?php echo $r;?>]" disabled="disabled"/></center></td>
		<?php }?>

</tr>
	


<?php 
$r++;
}
 ?>


	


</table>



<table>
<tr>
	<td>Issue</td>
	<td>Doc Title</td>
	<td>Doc Number</td>
	<td>Revision </td>
	<td>Summary of Changes</td>

</tr>


<?php
$sql = "SELECT * FROM {doc_issue_form_numbers} WHERE ifid=%d";
$result = db_query($sql,$ifid);
$i = 0;
while($rows = db_fetch_array($result)) { 

	$nid = db_result(db_query("SELECT nid FROM content_type_issued WHERE field_issued_doc_no_value='$rows[doc_number]'"));
	$id = $rows['id'];
	$doc_title = $rows['doc_title'];
	$doc_number = $rows['doc_number'];
	$revision = db_result(db_query("SELECT field_issued_revision_value FROM content_field_issued_revision WHERE nid=$nid AND ifid=$ifid")); 
	$changes = $rows['summary_of_changes'];
	$issued = $rows['issued'];
	?>

<tr>
	<?php if($issued == 1){?>
	<td><input type="checkbox" value="<?php echo $id;?>" name="issue[<?php echo $i;?>]" disabled="disabled" checked/></td>
	<?php } else {?>
    <td><input type="checkbox" value="<?php echo $id;?>" name="issue[<?php echo $i;?>]" disabled="disabled"/></td>
	<?php } ?>
	<td><input type="text" value="<?php echo $doc_title;?>" name="doc_title[<?php echo $i;?>]" disabled="disabled" /></td>
	<td><input type="text" value="<?php echo $doc_number;?>" name="doc_number[<?php echo $i;?>]" disabled="disabled" /></td>
	<td><input type="text" value="<?php echo $revision;?>" name="revision[<?php echo $i;?>]" disabled="disabled"/></td>
	<td><input type="text" value="<?php echo $changes;?>" name="changes[<?php echo $i;?>]" disabled="disabled"/></td>
</tr>

<?php 
$i++;
}
?>

</table>
          <?php
$numbers = $_REQUEST['issue'];
//$_REQUEST['numbers_for_issue'] = $numbers;

$it = 0;
for($i = 0; $i < sizeof($numbers); $i++){ ?>
<tr>
	<td><input type="text" name="doc_title[<?php echo $i;?>]" value="Spare"/></td>
	<td><input type="text" value="<?php echo $numbers[$i];?>" name="doc_number_<?php echo $i;?>"/></td>
	
	<!-- This is a little complicated.-->
	<?php
	// We query the database to see if the number has previously been assigned.
	$sql = "SELECT nid FROM {node} WHERE title='%s'";
	$result = db_result(db_query($sql, $numbers[$i]));
	// if this returns 0
	if(db_affected_rows($result) < 1) {
		// we assign a new rev of A
		?>	
	<td><input type="text" value="A" name="revision_<?php echo $i;?>" id="revision_<?php echo $i;?>"/></td>
	<?php } else {
		// We need to find the current revision and then increment it.
		$sql = "SELECT field_issued_doc_revision_value FROM {content_field_issued_doc_revision} WHERE nid=%d";
		$result2 = db_result(db_query($sql, $result));
		$rev = $result2++;?>
		<td><input type="text" value="<?php echo $rev;?>" name="revision_<?php echo $i;?>" id="revision_<?php echo $i;?>"/></td>
		
	<?php } ?>
	<td><input type="text" value="" name="summary_of_changes_<?php echo $it++;?>"/></td>
		<td></td>
</tr>

<?php } ?>
<?php

$maxno = $i;
echo "<input type='hidden' value='$maxno' name='maxno'/>";
echo "<input type='hidden' value='$_SERVER[REQUEST_URI]' name='returnUrl'/>";
//So you pass to save page the max number of rows and you can then loop through form elements from 1 to $maxno


?>

</table>

</form>
<br/>
<?php
$sql_2 = "SELECT completed FROM doc_issue_form WHERE ifid=%d";
$completed = db_result(db_query($sql_2, $ifid));


if ($completed == 0) { ?>
<form method="post" action="/mark.php">
<input type='hidden' value='<?php echo $_SERVER[REQUEST_URI];?>' name='returnUrl'/>";
<input type="hidden" name="ifid" value="<?php echo $ifid;?>"/>

</form>
<?php } else { echo "<p style='background-color:green; color:white;padding:3px 5px; font-weight:bold'>This form has been completed.</p>";} 

?>
         
  
         
            
        
            
           

            
           
          </div>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      
      
      </div>
    </div> <!-- /container -->
  </div>
<!-- /layout -->
<script type="text/javascript">


$(document).ready(function() {
	//if (!$('input.issued[type=checkbox]:checked').length)
    //do(
    	//$("#issueBTN").show("fast");
    //$("#progressBTN").hide("fast");
    //);
	
});
</script> <?php print $closure ?>
  </body>
</html>
