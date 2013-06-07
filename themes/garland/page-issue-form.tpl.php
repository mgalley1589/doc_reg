<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title>Issue From | GHA Doc Reg</title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <style type="text/css">
           div.error {display:none;}
  </style>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->


<script type="text/javascript">

$(function() {
	$('#issueBTN').attr('disabled', 'disabled');
	$('input.required').click(function() {
		var unchecked = $('input.required:not(:checked)').length;
		if (unchecked == 0) {
			$('#issueBTN').removeAttr('disabled');
		}
		else {
			$('#issueBTN').attr('disabled', 'disabled');
		}
	});

	$('#select_all_issued').click(function() {
		$('#issueBTN').removeAttr('disabled');
	});
});

</script>
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
  <body>

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
	// include menu
   include('menu.tpl.php');
	 ?>
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
      	// disable the edit options if this is a print view
      	if ($_GET['disabled'] == 'y') {
      		$disabled = "disabled='disabled'";
      	} else {
      		$disabled = "";
      	}
      	?>
<?php
$ifid = $_GET['id'];
?>

<?php
$rejected_check = "SELECT * FROM {doc_issue_form} WHERE ifid=%d";
$result = db_query($rejected_check, $ifid);
$row = db_fetch_array($result);
if ($row['rejected'] == 1) {
	$rejected = "(Rejected)";
} else {
	$rejected = "";
}
?>

              <div class="main-center-container"> 
          
          <?php //print $breadcrumb; ?>
        
        <?php print $messages ?>
        <div class="title-wrapper">
        <h2 class="with-tabs" style="padding-left:20px;">Issue Form ID : <?php echo $ifid;?> &nbsp; <span style="color:red"><?php echo $rejected; ?></span></h2>  <div id="pdf-export">
<a href=/pdf-export.php" class="customBTN">Export as PDF</a> <a href="javascript:window.print()" class="customBTN">Print Form</a>
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
			<?php } elseif ($_GET['r'])
			{?>
			 <div class="content"><div class="alert-message warning" style="padding:7px;">
<h3>Message</h3>
<p>The form has been rejected</p></div>
<?php } ?>



<form method="post" action="/includes/custom/saveProgress.php">
<table width="75%" id="issue-form-table">
	
	<?php
	// Query the database
	$sql = "SELECT * FROM {doc_issue_form} WHERE ifid=%d";
	$result = db_query($sql, $ifid);
	while ($rows = db_fetch_array($result)) { 
		$sql = "SELECT nid FROM content_type_project WHERE field_project_id_value='$rows[project_id]'";
		$pid = db_result(db_query($sql));
		$project_title = db_result(db_query("SELECT title FROM node WHERE nid=$pid"));
    
    // set the document status to a readable phrase.
    if($rows['document_status'] == 1) {
      $document_status = 'Coding/Comment';
    }
     if($rows['document_status'] == 2) {
      $document_status = 'Preliminary';
    }
     if($rows['document_status'] == 3) {
      $document_status = 'Information';
    }
     if($rows['document_status'] == 4) {
      $document_status = 'Tender';
    }
     if($rows['document_status'] == 5) {
      $document_status = 'Construction';
    }
     if($rows['document_status'] == 6) {
      $document_status = 'Asbuilt';
    }
     if($rows['document_status'] == 7) {
      $document_status = 'Withdrawn';
    }
     if(!$rows['document_status']) {
      $document_status = 'No Document Status Set';
    }
    
    
		?> 
<tr>
	<td>Generated by<br /><input type="text" name="generated_by" disabled="disabled" value="<?php print $rows['generated_by'];?>" /></td>
	<td>Date<br /><input type="text" name="date" <?php print $disabled;?> value=" <?php echo date("d/m/y", strtotime($rows['date']));?>" /></td>
</tr>
<tr>
	<td>Project ID<br /><input type="text" disabled="disabled" name="project_id" value="<?php echo $rows['project_id'];?>" /></td>
	<td>Project Title<br /><input type="text" disabled="disabled "name="project_title" value="<?php echo $project_title;?>" /></td>
</tr>
<tr>
	
	<td>Project Lead<br /><input type="text" name="project_manager" <?php print $disabled;?> value="<?php echo $rows['project_lead'];?>" /></td>
  <td>Document Status<br /><input type="text" name="document_status" <?php print $disabled;?> value="<?php echo $document_status;?>"
</tr>
</table><br /><br />

<table width="75%">
	
<tr>
	<td>Issue Description<br /><textarea name="issue_description" <?php print $disabled;?> class="mytextarea"><?php echo $rows['issue_description'];?></textarea></td>
</tr>
<tr>
	<td>Special Issue Instructions<br /><textarea name="special_issue_instructions" <?php print $disabled;?> class="mytextarea"><?php echo $rows['special_issue_instruction'];?></textarea></td>
</tr>
</table><br /><br />


<?php } ?>
	

<table>

<table width="75%" id="issue-form-formats-table">
<tr style="font-weight:bold;">
	<td>Recipeint(s) Name</td>
	<td><center>Word<br/></center></td>
	<td><center>Excel<br/></center></td>
	<td><center>PDF<br/></center></td>
	<td><center>DWF<br/></center></td>
	<td><center>DWG<br/></center></td>
	<td><center>Hard<br/></center></td>
	<td><center>Zip<br/></center></td>
	<td><center>CD<br/></center></td>
	
</tr>

<?php 

$sql = "SELECT * FROM {doc_issue_form_recipient} WHERE ifid=$ifid";
$result = db_query($sql);



$result_count = count($result);
echo "<h3>" . $test . "</h3>";

while($rows = db_fetch_array($result)) {


//$r=0;
//while($r <= $result_count) {
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
	<td><input type="text" <?php print $disabled;?> value="<?php echo $rows['recipient_name'];?>" name="<?php echo $rows['recipient_row'];?>"/></td>
	<?php if($word) {?> 
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="word[<?php echo $r;?>]" class="word" checked/></center></td>
	<?php } else {?>
		<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="word[<?php echo $r;?>]" class="word"/></center></td>
		<?php } ?>
		
	<?php if($excel) {?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="excel[<?php echo $r;?>]" class="excel" checked/></center></td>
	<?php } else {?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="excel[<?php echo $r;?>]" class="excel"/></center></td>
	<?php } ?>
	
	<?php if($pdf){?>	
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="pdf[<?php echo $r;?>]" class="pdf" checked/></center></td>
	<?php } else {?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="pdf[<?php echo $r;?>]" class="pdf"/></center></td>
	<?php } ?>
	
	<?php if($dwf) {?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="dwf[<?php echo $r;?>]" class="dwf" checked/></center></td>
	<?php } else { ?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="dwf[<?php echo $r;?>]" class="dwf" /></center></td>
	<?php } ?>
	
	<?php if($dwg) {?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="dwg[<?php echo $r;?>]" class="dwg" checked/></center></td>
	<?php } else {?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="dwg[<?php echo $r;?>]" class="dwg"/></center></td>
	<?php } ?>
	
	<?php if($hard) {?>
	<td><center><input readonly type="text" value="<?php echo $hard;?>" name="hard[<?php echo $r;?>]" style="width:20px;" "class="hard" checked/></center></td>
	<?php } else {?>
	<td><center><input readonly type="text" value="0" name="hard[<?php echo $r;?>]" style="width:20px;" class="hard" /></center></td>
	<?php } ?>
	
	<?php if($zip) {?>
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="zip[<?php echo $r;?>]" class="zip" checked/></center></td>
	<?php } else { ?>
		<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="zip[<?php echo $r;?>]" class="zip" /></center></td>
		<?php } ?>
		
		<?php if($cd) { ?>	
	<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="cd[<?php echo $r;?>]" class="cd" checked/></center></td>
	<?php } else {?>
		<td><center><input <?php print $disabled;?> type="checkbox" value="1" name="cd[<?php echo $r;?>]" class="cd"/></center></td>
		<?php }?>

</tr>
	


<?php 
//$r++;
}
 ?>


	


</table>



<table>
<tr>
	<td><center>Issue<br/>
		<input type="checkbox" <?php print $disabled;?> id="select_all_issued"/></center></td>
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
	
	$id = $rows['id'];
	$doc_title = $rows['doc_title'];
	$doc_number = $rows['doc_number'];
	$revision = $rows['revision'];
	$changes = $rows['summary_of_changes'];
	$issued = $rows['issued'];
	?>

<tr>
	<?php if($issued == 1){?>
	<td><center><input type="checkbox" <?php print $disabled;?> value="<?php echo $id;?>" name="issue[<?php echo $i;?>]" class="required issue" checked/></center></td>
	<?php } else {?>
    <td><center><input type="checkbox" <?php print $disabled;?> value="<?php echo $id;?>" name="issue[<?php echo $i;?>]"class="required issue" /></center></td>
	<?php } ?>
	<td><input type="text" <?php print $disabled;?> value="<?php echo $doc_title;?>" name="doc_title[<?php echo $i;?>]" disabled="disabled"/></td>
	<td><input type="text" <?php print $disabled;?>  value="<?php echo $doc_number;?>" name="doc_number[<?php echo $i;?>]" disabled="disabled" style="text-transform:uppercase;"/></td>
	<td><input type="text" value="<?php echo $revision;?>" name="revision[<?php echo $i;?>]" <?php print $disabled;?>/></td>
	<td><input type="text" value="<?php echo $changes;?>" name="changes[<?php echo $i;?>]" <?php print $disabled;?> /></td>
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
	<td><input type="text" name="doc_title[<?php echo $i;?>]" value="Spare" <?php print $disabled;?>/></td>
	<td><input type="text" value="<?php echo $numbers[$i];?>" name="doc_number_<?php echo $i;?>" <?php print $disabled;?>/></td>
	
	<!-- This is a little complicated.-->
	<?php
	// We query the database to see if the number has previously been assigned.
	$sql = "SELECT nid FROM {node} WHERE title='%s'";
	$result = db_result(db_query($sql, $numbers[$i]));
	// if this returns 0
	if(db_affected_rows($result) < 1) {
		// we assign a new rev of A
		?>	
	<td><input <?php print $disabled;?> type="text" value="A" name="revision_<?php echo $i;?>" id="revision_<?php echo $i;?>"/></td>
	<?php } else {
		// We need to find the current revision and then increment it.
		$sql = "SELECT field_issued_doc_revision_value FROM {content_field_issued_doc_revision} WHERE nid=%d";
		$result2 = db_result(db_query($sql, $result));
		$rev = $result2++;?>
		<td><input type="text" value="<?php echo $rev;?>" name="revision_<?php echo $i;?>" <?php print $disabled;?> id="revision_<?php echo $i;?>"/></td>
		
	<?php } ?>
	<td><input <?php print $disabled;?> type="text" value="" name="summary_of_changes_<?php echo $it++;?>"/></td>
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
<?php 
if ($_GET['disabled']) {
	echo "<p style='background-color:red; color:white;padding:3px 5px; font-weight:bold'>This issue form is pending review by the Doc Controller</p>";
} else { ?> 
<input type="hidden" name="ifid" value="<?php echo $ifid;?>"/>

<input type="submit" value="Save Progress" name="save_progress" id="progressBTN"/> <input type="submit" name="mark" value="Issue Form" id="issueBTN"/>
</form>
<br/>
<?php
$sql_2 = "SELECT completed FROM doc_issue_form WHERE ifid=%d";
$completed = db_result(db_query($sql_2, $ifid));


if ($completed == 0) { ?>
<!--
<form method="post" action="/mark.php" style="width:70px; float:left; margin-right:20px;">
<input type="hidden" value="<?php echo $_SERVER[REQUEST_URI];?>" name="returnUrl"/>
<input type="hidden" name="ifid" value="<?php echo $ifid;?>"/>
<input type="submit" value="Issue" class="btn danger" id="issueBTN"/>
</form> -->
<?php } else { echo "<p style='background-color:green; color:white;padding:3px 5px; font-weight:bold'>This form has been marked as completed</p>";} ?>

<?php
$sql_2 = "SELECT rejected FROM doc_issue_form WHERE ifid=%d";
$rejected = db_result(db_query($sql_2, $ifid));


if ($rejected == 0) { ?>

<form method="post" action="/reject.php" style="width:70px; float:left;">
<input type="hidden" value="<?php echo $_SERVER[REQUEST_URI];?>" name="returnUrl"/>
<input type="hidden" name="ifid" value="<?php echo $ifid;?>"/>
<input type="submit" value="Reject" class="btn danger" id="rejectBTN"/>
</form>

<?php } else { echo "<p style='background-color:red; color:white;padding:3px 5px; font-weight:bold'>This form has been rejected.</p>";} ?>
         
  
    <?php } ?>
            
           

            
           
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
