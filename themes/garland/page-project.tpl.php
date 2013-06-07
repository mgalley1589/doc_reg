<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
   <script type="text/javascript"
src="http://code.jquery.com/jquery-latest.min.js" charset="utf-8">
</script>

  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <style type="text/css">
  ul.tabs {display:none;}
	div.error {display:none;}
  #issue-table_filter_0 {display:none;}
   #issue-table_filter_1 {font-family:arial; font-weight:normal;}
    #issue-table_filter_2 {font-family:Arial; font-weight:normal;}
    </style>
  
    
   
    <script type="text/javascript" src="/themes/garland/js/picnet.table.filter.min.js"></script>
     <script>
  $(function() {
    $( ".usual" ).tabs();
  });
  </script>
    <script type="text/javascript">
      $(document).ready(function() {
            $('#issue-table').tableFilter();
            $('#all-issued-docs .views-table').tableFilter();
            $('#all-received-docs .views-table').tableFilter();
      });
   
 </script>
    
    
 <script type="text/javascript">
// copy marked for issued search button over.
	$(document).ready(function(){
$("#issue-table_filter_1").blur(function(){
			var number=$("#issue-table_filter_1").val();
			$("#manual_number_assign").attr('value',number);
});


$("#issue-table_filter_2").blur(function(){
			var number=$("#issue-table_filter_2").val();
			$("#manual_number_title_assign").attr('value',number);
});

	});
</script>
    
    
    
<script type="text/javascript">
// copy marked for issued search button over.
  $(document).ready(function(){

$("#issue-table_filter_2").blur(function(){
      var title=$("#issue-table_filter_2").val();
      $("#manual_number_title_assign").attr('value',title);
});
});
  </script>

<script type="text/javascript">
$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
</script>
<script>
  
  jQuery(document).ready(function(){
    $('#issue-table_filter_1').addClass("validate[required]");
    $('#issue-table_filter_2').addClass("validate[required]");
  })
  </script>
    
<script src="/themes/garland/js/jquery.validate.js" type="text/javascript"></script>

<script src="/themes/garland/js/jquery.validation.functions.js" type="text/javascript"></script>

<!--<link rel="stylesheet" type="text/css" href="/themes/garland/css/jquery.validate.css"/>-->
<script type="text/javascript">
            jQuery(function(){
               jQuery().validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Required Field"
                });
                 jQuery("#template_seperator").validate({
                    expression: "if (VAL.match(// \ -) && VAL) return true; else return false;",
                    message: "Sperator must be '-', '/' or '\'"
                });
            });
           
</script>

<script src="/themes/garland/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script src="/themes/garland/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
<script>
    jQuery(document).ready(function(){
      // binds form submission and fields to the validation engine
      jQuery("#issue-table").validationEngine();
    });
</script>






    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->


    
  </head>
  <body>


 
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
  
  
  if ($pageurl == '/projects')
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
      <li><a href="" style="background-color: #E5E5E5;
padding: 5px 7px;
color: green;"><?php print $title;?></a></li>
      <!--<li><a href="/projects" class="two">Projects</a></li>
      <li><a href="/docs" class="three">Docs</a></li>-->
      <?php if ($user->uid = 1) { // Print the Admin only Options
      ?>
      <li><a href="/reports" class="five">Reports</a></li>
      <li><a href="/admin" class="six">Admin</a></li>
      <?php } else {} ?>
    <br/><br/>
    </div> <!--END HEADER CONTAINER-->
 <div class="header-blocks"><?php print $header; ?></div></div>
 
      

         

    <div id="wrapper" style="margin-top:6px;">
    <div id="container">

      <div id="header">
        
    

      </div> <!-- /header -->
      
      <div id="main-container">

              <div class="main-center-container"> 
              <?php
if (arg(0) == 'node' && is_numeric(arg(1))) $nodeid = arg(1);
?>
          
          <?php //print $breadcrumb; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <div class="title-wrapper" id="project-title-wrapper">
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title . '</h2>'; endif; ?>  
          	
          	
        
          	
          	
          	  <?php
// if we find an argument called 'node' , and it's is numeric then do some TRUE stuff
// something like that ?

if (arg(0) == 'node' && is_numeric(arg(1))) $nodeid = arg(1);



// get the template id
$sql = "SELECT field_project_doc_no_template_value FROM {content_type_project} WHERE nid=%d";
$qr = db_result(db_query($sql, $nodeid));
?>

    
      <a href="/node/<?php echo $nodeid;?>/edit" class="customBTN" style="float:right; margin-right:10px;"/>Edit</a>
      <!--<a href="/numbering-system/?tid=<?php //echo $qr;?>&nid=<?php //echo $nodeid;?>" class="two customBTN" style="margin-right:10px;float:right;">Assign Doc #s</a>-->
         <a href="/project/<?php echo $project[2];?>" class="one customBTN" style="float:right; margin-right:5px;">Overview</a>
     



        </div>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php //if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php //if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block" style="margin:-30px 0 0 0 ;">
          	   <?php if($_GET[dis] == 'y') { ?>
<div style='width:1020px; height:auto; padding:10px; background-color:#ccff99; border:1px solid green; font-weight:bold;'>
  <h3>Message</h3>
           Your Issue Form was submitted to the Doc Controller. You can view the form by clicking <a href="/issue-form/?id=<?php echo $_GET['ifid'];?>&disabled=y" target="_blank">here</a><br/>
           </div>    
            <?php } ?>
                  	
                  
          	<?php 
          
          $success = $_GET['s'];
          
           if ($success == 'y') {
           print "<div style='width:1020px; height:auto; padding:10px; background-color:#ccff99; border:1px solid green; font-weight:bold;'>
           The number was successfully added to the project.
           </div>";   
 } elseif($success == 'n') {
 	print "<div style='width:1020px; height:auto; padding:10px; background-color:#ff9999; border:1px solid red; font-weight:bold;'>
           That number already exists in the project, please try another.
           </div>";   
		    }
 ?>
 
            
          
 

          	<?php
          	/* Disable this for now 
          	$success = $_GET['s'];
		   if ($success == 'y') { */?>
          <!--
          <div class="alert-message warning" style="padding:7px; height:50px; margin-top:40px;">
<h3>Message</h3>
The numbers were successfully added to the project<br/>
</div>-->

          
          
          <?php/* }*/ ?>

            <?php print $messages ?>
          
            <?php print $content ?>
            
              <?php
     // DB Abstraction layer is not working. We'll have to use MYSQL 
     
    // Get the template id to assign to the assing numbers button URL 
    // Place the template name into a variable.
    $template_name = $node->field_project_doc_no_template[0]['view'];
	
	// Build the SQL Query
   /* $q = "SELECT ntid FROM number_templates WHERE title='$template_name'";
	$qr = mysql_query($q);
	$qrr = mysql_result($qr);
	echo $qrr;
	exit();
	
	echo "<h3>" . $qr . "</h3>";
    * */
    	
	?>
    
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
