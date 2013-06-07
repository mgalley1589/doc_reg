<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
session_start();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <script type="text/javascript">
    $(document).ready(function() {
      $('#newRowButton').click(function() {
        $('table#receipient tr:last')
          .clone()
          .appendTo('table#receipient')
          .find(':input')
          .attr('name', function(index, name) {
            return name.replace(/(\d+)$/, function(fullMatch, n) {
              return Number(n) + 1;
            });
          })
      });
    });
  </script>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
    <script type="text/javascript">
$(document).ready(function() {
        $("#select_all_word").click(function() {
            var checkedStatus = this.checked;
            $(".word").each(function() {
                this.checked = checkedStatus;
            });
        });

        $("#select_all_excel").click(function() {
            var checkedStatus = this.checked;
            $(".excel").each(function() {
                this.checked = checkedStatus;
            });
        });

        $("#select_all_pdf").click(function() {
            var checkedStatus = this.checked;
            $(".pdf").each(function() {
                this.checked = checkedStatus;
            });
        });

        $("#select_all_dwf").click(function() {
            var checkedStatus = this.checked;
            $(".dwf").each(function() {
                this.checked = checkedStatus;
            });
        });

        $("#select_all_dwg").click(function() {
            var checkedStatus = this.checked;
            $(".dwg").each(function() {
                this.checked = checkedStatus;
            });
        });

        $("#select_all_hard").click(function() {
            var checkedStatus = this.checked;
            $(".hard").each(function() {
                this.checked = checkedStatus;
            });
        });
        $("#select_all_zip").click(function() {
            var checkedStatus = this.checked;
            $(".zip").each(function() {
                this.checked = checkedStatus;
            });
        });
        $("#select_all_cd").click(function() {
            var checkedStatus = this.checked;
            $(".cd").each(function() {
                this.checked = checkedStatus;
            });
        });
        $("#select_all_issued").click(function() {
            var checkedStatus = this.checked;
            $(".issue").each(function() {
                this.checked = checkedStatus;
            });
        });
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
    
    
    <h1>Doc Controller Dashboard - GHA Livigunn</h1>
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
    
   
<style type="text/css">
input[type="text"] {
  font-family: Arial;
  font-size:13px;
  font-weight:normal;
}
</style>

    
    <?php include('menu.tpl.php');?>
  <!--  <a href="/node/add/project" class="normalTip" title="Add a New project" style="position:absolute;margin-left: 690px; margin-top:10px;"><img src="themes/garland/images/newproject.png"/></a>&nbsp; <a href="/help" class="normalTip" title="Get Help" style="position:absolute;margin-left: 800px; margin-top:10px;"><img src="themes/garland/images/helpbtn.png"/></a>-->  
    </div> <!--END HEADER CONTAINER-->
 <div class="header-blocks"><?php print $header; ?></div></div>
 <?php global $user ?>
    <div id="wrapper">
    <div id="container">
    <div id="header"> 

      </div> <!-- /header -->
   
      <div id="main-container">

              <div class="main-center-container"> 
          
          <?php //print $breadcrumb; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php //if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <div class="title-wrapper" style="margin-left:-20px;"> 
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. "Doc Issue Instruction Form" .'</h2>'; endif; ?>
          <div id="pdf-export" style="margin: -4px 20px 0 0;">
<a href=/pdf-export.php" class="customBTN">Export as PDF</a>
</div>

        </div>
          <?php //if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php // if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block" style="margin-top:-20px;">
                    
         <style>
table td {border: 1px solid silver;; padding: 3px; font-size: 13px;}
form input[type=text] {border: 0px; font: bold 13px ;}
.mytextarea  { width: 100%; border: 0px; font: bold 13px; height: 120px;}
</style>

<?php
// Variables we need for the form
$today = date("d/m/y");
?>



<?php if($_GET['s']) {?>
      
      
       <div class="content"><div class="alert-message warning" style="padding:7px;">
<h3>Message</h3>
<p> Form sent to Doc Controller.</p>
</p></div>
  <?php 
    } ?>
<style type="text/css">
  div.error {display:none;}
</style>

<!--
<div class="alert-message warning" style="padding:7px; height:auto; margin-top:15px; color: #555;">
<h3>Message</h3>-->
<?php 
// We check if we are able to issue this form
//$numbers_check = $_POST['issue'];
//$shown = 0;
//foreach($numbers_check as $value) {
//$sql = "SELECT * FROM 'doc_numbers' WHERE number='%s' AND status=%d";
//$result = db_query($sql, $value, 1);
//if (db_affected_rows($result)) {

//if($shown == 0) {?>
<?php //} else {}
//echo "<strong>" . $value . "</strong><br/>";?>
<script type="text/javascript">
/*  $(document).ready(function(){
    $('input[type="submit"]').attr('disabled', 'disabled');
});*/
</script>

<?php
//$shown++;
//}
//}
?>

<!--<p style="font-size:14px; margin-top:5px;">Please remove the above numbers from your issue list as you can not issue a number that is already awaiting issue.</p>
</div>-->


 
<?php
/*
$project_id = & $doc_instruction['project_id'];
$project_title = & $doc_instruction['project_title'];
$project_manager = & $doc_instruction['project_manager'];
$nid = & $doc_instruction['nid'];
$issue = & $doc_instruction['issue'];
 * 
 */
?>

<?php

// Get the values from the DB

$sql = "SELECT value FROM di_variables WHERE title='project_id'";
$result = mysql_query($sql);
$project_id = mysql_result($result,0,0);

$sql = "SELECT value FROM di_variables WHERE title='project_title'";
$result = mysql_query($sql);
$project_title = mysql_result($result,0,0);

$sql = "SELECT value FROM di_variables WHERE title='project_manager'";
$result = mysql_query($sql);
$project_manager = mysql_result($result,0,0);

$sql = "SELECT value FROM di_variables WHERE title='nid'";
$result = mysql_query($sql);
$pid = mysql_result($result,0,0);

?>






 

<form method="post" action="/submit_issue_form.php">
<table width="75%">
<tr>
	<td>Generated by<br /><input type="text" name="generated_by" readonly="readonly" onfocus="this.blur();" value="<?php print $user->name;?>" /></td>
	<td>Date<br /><input type="text" name="date" value="<?php echo $today;?>" /></td>
</tr>
<tr>
	<td>Project ID<br /><input type="text" name="project_id"readonly="readonly" onfocus="this.blur();" value="<?php echo $project_id;?>" /></td>
	<td>Project Title<br /><input type="text" name="project_title" readonly="readonly" onfocus="this.blur();" value="<?php echo $project_title;?>" /></td>
</tr>
<tr>
	
	<td>Project Lead<br /><input type="text" name="project_manager" value="<?php echo $project_manager;?>" /></td>
  <td>Document Status<br /><select name="document_status">
      <option> --- Please Select --- </option>
      <option value="1">Coding/Comment</option>
      <option value="2">Preliminary</option>
      <option value="3">Approval</option>
      <option value="4">Information</option>
      <option value="5">Tender</option>
      <option value="6">Construction</option>
      <option value="7">Asbuilt</option>
      <option value="8">Withdrawn</option>
      </selct>
      </td>
      
               
               </td>
</tr>
</table><br /><br />

<table width="75%">
<tr>
	<td>Issue Description<br /><textarea name="issue_description" class="mytextarea"></textarea></td>
</tr>
<tr>
	<td>Special Issue Instructions<br /><textarea name="special_issue_instructions" class="mytextarea"></textarea></td>
</tr>
</table><br /><br />

<table width="75%" id="receipient" class="remove-hover">
<tr>
	<td>Recipeint(s) Name</td>
	<td><center>Word<br/> <input type="checkbox" id="select_all_word"/></center></td>
	<td><center>Excel<br/> <input type="checkbox" id="select_all_excel"/></center></td>
	<td><center>PDF<br/><input type="checkbox" id="select_all_pdf"/></center></td>
	<td><center>DWF<br/><input type="checkbox" id="select_all_dwf"/></center></td>
	<td><center>DWG<br/><input type="checkbox" id="select_all_dwg"/></center></td>
	<td><center>Hard<br/></center></td>
	<td><center>Zip<br/><input type="checkbox" id="select_all_zip"/></center></td>
	<td><center>CD<br/><input type="checkbox" id="select_all_cd"/></center></td>
	
	
</tr>

<?php 
$sql = "SELECT * FROM {content_field_project_default_recipients} WHERE nid=%d";
$result = db_query($sql,$pid);
$r = 0;
while($rows = db_fetch_array($result)) {?>


	<tr>
	<td><input type="text" value="<?php echo $rows['field_project_default_recipients_value'];?>" name="recipients<?php echo $r;?>"/></td>
	<td><center><input type="checkbox" value="1" name="word<?php echo $r;?>" class="word"/></center></td>
	<td><center><input type="checkbox" value="1" name="excel<?php echo $r;?>" class="excel"/></center></td>
	<td><center><input type="checkbox" value="1" name="pdf<?php echo $r;?>" class="pdf"/></center></td>
	<td><center><input type="checkbox" value="1" name="dwf<?php echo $r;?>" class="dwf"/></center></td>
	<td><center><input type="checkbox" value="1" name="dwg<?php echo $r;?>" class="dwg"/></center></td>
	<td><center><input type="text" value="" name="hard<?php echo $r;?>" class="hard" style="width:30px"/></center></td>
	<td><center><input type="checkbox" value="1" name="zip<?php echo $r;?>" class="zip"/></center></td>
	<td><center><input type="checkbox" value="1" name="cd<?php echo $r;?>" class="cd"/></center></td>

</tr>
	
	
<?php 
$r++;
} ?>

</table>
<input type="button" id="newRowButton" value="Add Receipient" />


<table width="75%" style="margin-top:15px;">
<tr>
	<td rowspan="2">Doc Title</td>
	<td rowspan="2">Doc Number</td>
	<td rowspan="2">Revision </td>
	<td rowspan="2">Summary of Changes</td>

</tr>
<tr>
	
	
	
	
</tr>


<?php
$result = mysql_query($sql);
$project_id = mysql_result($result,0,0);

$sql = "SELECT value FROM di_variables WHERE title='numbers_for_issue'";
$result = mysql_query($sql);
$numbers_array = mysql_result($result,0,0);
$numbers = explode('~', $numbers_array);
reset($numbers);
$i = key($numbers);
$it = 0;
$count = count($numbers);
$looplimit= $i + $count;
foreach($numbers as $key=>$value) { 
//for($i = 0; $i < sizeof($numbers); $i++){
  
  $sql = "SELECT number_title FROM {doc_numbers} WHERE number='%s'";
  $doc_number_title = db_result(db_query($sql, $numbers[$key]));
  ?>
<tr>
	<td><input type="text" name="doc_title[<?php echo $i;?>]" value="<?php echo $doc_number_title;?>"/></td>
	<td><input style="text-transform:uppercase;" type="text" value="<?php echo $numbers[$key];?>" name="doc_number_<?php echo $i;?>"/></td>
	
	<!-- This is a little complicated.-->
	<?php
	// We query the database to see if the number has previously been assigned.
	$sql = "SELECT nid FROM {content_type_issued} WHERE field_issued_doc_no_value='%s' AND field_issued_project_id_nid=$_GET[pid]";
  $result = db_query($sql);


	$nid = db_result(db_query($sql, $numbers[$i]));
  $num = db_affected_rows($result);      

        
	// if this returns a result
	if(db_affected_rows($result) > 0) {
		// We need to find the current revision and then increment it.
                $sql = "SELECT field_issued_revision_value FROM content_field_issued_revision WHERE nid=%d ORDER BY timestamp DESC";
                $rev = db_result(db_query($sql, $nid));
                $newRev = ++$rev;
                ?>
	<td><input type="text" value="<?php echo $newRev;?>" name="revision_<?php echo $i;?>" id="revision_<?php echo $i;?>"/></td>	
                <?php } else {?>
	<td><input type="text" value="A" name="revision_<?php echo $i;?>" id="revision_<?php echo $i;?>"/></td>
	
		
	<?php } ?>
	<td><input type="text" value="" name="summary_of_changes_<?php echo $it++;?>"/></td>
		<td></td>
</tr>


<?php
$i++;
 } ?>
<?php

$maxno = $count;
echo "<input type='hidden' value='$maxno' name='maxno'/>";
echo "<input type='hidden' value='$r' name='rec_count'/>";

//So you pass to save page the max number of rows and you can then loop through form elements from 1 to $maxno


?>

</table>

<input type="hidden" name="redirect_url" id="redirect_url" value="<?php echo $_GET['r'];?>"/>
<input type="submit" value="Send to Doc Controller" />
</form>
         
         
<?php
// cleanup the table afterswards

$sql = "DELETE FROM di_variables";
mysql_query($sql);

 
?>

                            
            <?php// print $content ?>
          </div>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->
      </div>

     
      </div>
    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>
