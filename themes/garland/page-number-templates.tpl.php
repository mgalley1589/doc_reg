<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title>Create a new number template / Test</title>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
  </head>
<body<?php print phptemplate_body_class($left, $right); ?>>
               
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/javascript"></script>
<script src="/themes/garland/js/jquery.validate.js" type="text/javascript"></script>
<script src="/themes/garland/js/jquery.validation.functions.js" type="text/javascript"></script>
<!--<link rel="stylesheet" type="text/css" href="/themes/garland/css/jquery.validate.css"/>-->
<script type="text/javascript">
            jQuery(function(){
               jQuery("#template_title, #template_client, #template_seperator, #range_start, #range_end, #range_title, #range_start1, #range_end1, #range_title1, #range_start2, #range_end2, #range_title2, #range_start3, #range_end3, #range_title3, #range_start4, #range_end4, #range_title4, #range_start5, #range_end5, #range_title5").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Required Field"
                });
                 jQuery("#template_seperator").validate({
                    expression: "if (VAL.match(// \ -) && VAL) return true; else return false;",
                    message: "Sperator must be '-', '/' or '\'"
                });
            });
           
</script>


 
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
  elseif ($pageurl == '/docs')
  	{$current = 'three';}
  elseif ($pageurl == '/number-templates')
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
      
      <div id="main-container" style="height:auto;">

              <div class="main-center-container" style="width:100%;"> 
          
          <?php //print $breadcrumb; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <?php print $messages ?>
        <div class="title-wrapper" style="width:1150px;">
          <h2 style="padding:0 0 0 10px; width:100%;">Create a Number Template</h2>
          
        </div>
          <?php //if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php //if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php //if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block">
        
           

<script type="text/javascript">
$(document).ready(function() {
    var newNum = 2;
    cloneMe = function(el) {
        var newElem = el.clone().attr('id', 'container' + newNum);
        newElem.children('input').each(function(index, elem) {
            $(elem).attr('id', $(elem).attr('id') + newNum).attr('name', $(elem).attr('name') + newNum);
        });
        $('#cloneb').before(newElem);
        newNum++;
    };
});
  
  </script> 
<script src="/themes/garland/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

              <script src="/themes/garland/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8"></script>
   
  	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#myForm").validationEngine();
		});

	</script>


 			              
 <form id="myForm" method="post" action="/number-templates/sections">                
      <fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Template Details</legend>
<br/><br/>
 

    <div id="template_Details" style="margin-bottom:4px;">
        <strong>Title:</strong>  &nbsp;  <input type="text" type="text" name="template_title" id="template_title" class="validate[required]" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Client:</strong> &nbsp;  <input type="text" name="template_client" id="template_client" style="width:200px;"/> &nbsp;   &nbsp;
        <strong>Seperator:</strong> &nbsp; <input type="text" name="template_seperator" id="template_seperator" style="width:200px"/>&nbsp;   &nbsp; <br/><br/>
            </div>
 <br/><br/>


</fieldset>

<br/>
<br/>
<br/>



 
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Ranges</legend>
<br/><br/>
 

    <div id="container1" style="margin-bottom:4px;" class="clonedInput">
        <strong>Range Start:</strong>  &nbsp;  <input type="text" name="range_start" id="range_start" class="template_input" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Range End:</strong> &nbsp;  <input type="text" name="range_end" id="range_end" class="template_input" style="width:200px;"/> &nbsp;   &nbsp; 
        <strong>Title: </strong>  &nbsp;  <input type="text" name="range_title" id="range_title" class="template_input" style="width:200px;"/><br/><br/>
    </div>

            <input type="button" id="cloneb" value="Add Range" onclick="cloneMe($('#container1'));" />
      
    

</fieldset>

 <div style="float:right; width:100px; margin:30px 0 0 0;">
        <input type="submit" id="btnAdd_1" value="Add Sections" />
 </div>


    </form>

</fieldset>

<br/><br/>
<div style="clear:both;"></div>



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
