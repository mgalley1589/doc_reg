<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?> / Test</title>
    <?php print $styles ?>
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
            
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.js" type="text/javascript"></script>
<script src="/themes/garland/js/jquery.validate.js" type="text/javascript"></script>
<script src="/themes/garland/js/jquery.validation.functions.js" type="text/javascript"></script>
<!--<link rel="stylesheet" type="text/css" href="/themes/garland/css/jquery.validate.css"/>-->
<script type="text/javascript">
            jQuery(function(){
               jQuery("#section-title, #extra, #section-value").validate({
                    expression: "if (VAL) return true; else return false;",
                    message: "Required Field"
                });
                
            });
           
</script>

 
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

              <div class="main-center-container" style="width:100%; height:2000px;"> 
          
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
        
        <style type="text/css">
        .makePrimaryA { display:none;}
         .makePrimaryB { display:none;}
          .makePrimaryC { display:none;}
           .makePrimaryD { display:none;}
            .makePrimaryE { display:none;}
             .makePrimaryF { display:none;}
              .makePrimaryG { display:none;}
        </style>
           

<script type="text/javascript">
$(document).ready(function() {
 var newNum = 1;
    cloneMe = function(el) {
        var newElem = el.clone().attr('id', 'container' + newNum);
        newElem.children('input, select').each(function(index, elem) {
           
        this.name = this.name.replace(/\[(\d+)\]/, function(str,p1){
                return '[' + (parseInt(p1,10)+ newNum) + ']';
                                          });
            /*$(elem).attr('id', $(elem).attr('id') + newNum).attr('name', $(elem).attr('name') + [newNum);*/
        });
        $('#cloneb').before(newElem);
        newNum++;
    };




	var newNumA = 1;
    cloneMeA = function(el) {
         var newElemA = el.clone().attr('id', 'container' + newNumA);
        newElemA.children('input, select').each(function(index, elem) {
           
        this.name = this.name.replace(/\[(\d+)\]/, function(str,p1){
                return '[' + (parseInt(p1,10)+ newNumA) + ']';
                                          });
                  });
        $('#clonec').before(newElemA);
        newNumA++;
    };
    
    
    
    var newNumB = 1;
    cloneMeB = function(el) {
         var newElemB = el.clone().attr('id', 'container' + newNumB);
        newElemB.children('input, select').each(function(index, elem) {
           
        this.name = this.name.replace(/\[(\d+)\]/, function(str,p1){
                return '[' + (parseInt(p1,10)+ newNumB) + ']';
                                          });
                  });
        $('#cloned').before(newElemB);
        newNumB++;
    };


var newNumC = 1;
    cloneMeC = function(el) {
         var newElemC = el.clone().attr('id', 'container' + newNumA);
        newElemC.children('input, select').each(function(index, elem) {
           
        this.name = this.name.replace(/\[(\d+)\]/, function(str,p1){
                return '[' + (parseInt(p1,10)+ newNumC) + ']';
                                          });
                  });
        $('#clonee').before(newElemC);
        newNumC++;
    };
    
    
    var newNumD = 1;
    cloneMeD = function(el) {
         var newElemD = el.clone().attr('id', 'container' + newNumD);
        newElemD.children('input, select').each(function(index, elem) {
           
        this.name = this.name.replace(/\[(\d+)\]/, function(str,p1){
                return '[' + (parseInt(p1,10)+ newNumD) + ']';
                                          });
                  });
        $('#clonef').before(newElemD);
        newNumD++;
    };


var newNumE = 1;
    cloneMeE = function(el) {
         var newElemE = el.clone().attr('id', 'container' + newNumE);
        newElemE.children('input, select').each(function(index, elem) {
           
        this.name = this.name.replace(/\[(\d+)\]/, function(str,p1){
                return '[' + (parseInt(p1,10)+ newNumE) + ']';
                                          });
                  });
        $('#cloneg').before(newElemE);
        newNumE++;
    };
    
    
    
    var newNumF = 1;
    cloneMeF = function(el) {
         var newElemF = el.clone().attr('id', 'container' + newNumF);
        newElemF.children('input, select').each(function(index, elem) {
           
        this.name = this.name.replace(/\[(\d+)\]/, function(str,p1){
                return '[' + (parseInt(p1,10)+ newNumF) + ']';
                                          });
                  });
        $('#cloneh').before(newElemF);
        newNumF++;
    };




});

</script>

 <?php
 

 
 // Get some variables from the $_POST array
 $templateTitle = $_POST['template_title'];
 $templateClient = $_POST['template_client'];
 $templateSeperatorSafe = $_POST['template_seperator'];
 $templateSeperator = mysql_escape_string($templateSeperatorSafe);
 
 
 
 // Create the template
 $sqlTemplateDetails = "INSERT into {number_templates} VALUES (0,'$templateTitle', '$templateSeperator', '$templateClient')";
 $sqlTemplateDetailsInsert = db_query($sqlTemplateDetails);
 
 // Insert the first set of ranges
 
 $rangeStart_0 = $_POST['range_start'];
 $rangeEnd_0 = $_POST['range_end'];
 $rangeTitle_0 = $_POST['range_title'];
 
 $sqlRanges = "INSERT into {number_templates_ranges} VALUES (last_insert_id(), 0, '$rangeTitle_0', $rangeStart_0, $rangeEnd_0)";
 $sqlRangesInsert = db_query($sqlRanges);
 
 
 
 
 // Remove the values now we have them in the database so we can loop through the reaming values
 unset($_PPOST['template_seperator']);
 unset($_POST['template_title']);
 unset($_POST['template_client']);
 unset($_POST['range_title']);
 unset($_POST['range_start']);
 unset($_POST['range_end']);
 
//echo "<pre>" . print_r($_POST) . "</pre>";
// exit(); 
 			      
 
 
 
 // Add the remaining ranges to the template
 
 // count the items in the array and divide by 3 so we know how many loops we need to make
 
 $ntidSql = "SELECT ntid FROM number_templates WHERE title='%s' ";
 $ntid = db_result(db_query($ntidSql, $templateTitle));
// echo "<h3>" . $ntid . "</h3>";
// exit();
 
 $arrayCount = count($_POST);
 $result = $arrayCount/3;
 $looplimit = $result+1;
 $i = 2;
 
 // loop through the array
 while ($i <= $looplimit) {
 
 
 $rangeStart = $_POST["range_start$i"];
 $rangeEnd = $_POST["range_end$i"];
 $rangeTitle = $_POST["range_title$i"];
 
 
 $sqlRangesLoop = "INSERT into {number_templates_ranges} VALUES ($ntid, 0, '$rangeTitle', $rangeStart, $rangeEnd)";
 $sqlRangesLoopInsert = db_query($sqlRangesLoop);
 
 $i++;
 
 }
  
 ?>
 
 	 			              
 			              
 <form id="myForm" method="post" action="/includes/custom/saveNumberSections.php">                

<div id="section-container">
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Section A - <label style="font-size:small;">Make Primary&nbsp;</label><input type="checkbox" class="unique" name="sectionA[0][primary]" value="Make Primary" id="checkMeA"></input></legend>
<br/><br/>
<input type="hidden" name="templateSeperator" value="<?php print $templateSeperator;?>"/>
<input type="hidden" value="<?php echo $ntid;?>" name="ntid"/>  
<input type="hidden" value="A" name="sectionA[0][section]"/>
    <div id="container1" style="margin-bottom:4px;" class="clonedInput">
               <strong>Title:</strong>  &nbsp;  <input type="text" name="sectionA[0][title]" id="section-title" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Value:</strong> &nbsp;  <input type="text" name="sectionA[0][value]" id="extra" style="width:200px;"/> &nbsp;   &nbsp; 
	    <span class="makePrimaryA"><strong>Number Range: </strong></span>  &nbsp; 
        <select name="sectionA[0][range]" id="section-range-0" style="width:200px;" class="makePrimaryA"><?php include("includes/numberRangesSelect.tpl.php");?></select><br/><br/>
    </div>
    
        <input type="button" id="cloneb" value="Add Section" onclick="cloneMe($('#container1'));" style="float:right;" />
    
</fieldset>

</div>



<input type="button" id="section-container-2-show" value="Add Section B" style="float:right;"/>
<script>
    $("#section-container-2-show").click(function () {
    $("#section-container-2").show("fast");
    $("#section-container-2-show").hide("fast");
    $("#section-container-3-show").show("fast");
    });
   
    $("#checkMeA").click(function(){

		if ($("#checkMeA").is(":checked"))
		{
		
			$(".makePrimaryA").show("fast");
			$(".valueA-primary").hide
		}
		else
		{
					$(".makePrimaryA").hide("fast");
		}
	  });

</script>

<div style="height:30px; width:900px;"></div>


<div id="section-container-2" style="display:none;">
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Section B - <label style="font-size:small;">Make Primary&nbsp;</label><input type="checkbox" class="unique" value="Make Primary" id="checkMeB"></input></legend> 
    
     <input type="hidden" value="B" name="sectionB[0][section]"/>
    <div id="container1A" style="margin-bottom:4px;" class="clonedInput">

        <strong>Title:</strong>  &nbsp;  <input type="text" name="sectionB[0][title]" id="section-title" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Value:</strong> &nbsp;  <input type="text" name="sectionB[0][value]" id="section-value" style="width:200px;"/> &nbsp;   &nbsp; 
         <span class="makePrimaryB"><strong>Number Range: </strong></span>  &nbsp; 
        <select name="sectionB[0][range]" id="section-range-b" style="width:200px;" class="makePrimaryB" ><?php include("includes/numberRangesSelect.tpl.php");?></select><br/><br/>   </div>

        <input type="button" id="clonec" value="Add Section" onclick="cloneMeA($('#container1A'));" style="float:right;" />    
</fieldset>
</div>



<input type="button" id="section-container-3-show" value="Add Section C" style="float:right;display:none;"/>
<script>
    $("#section-container-3-show").click(function () {
    $("#section-container-3").show("fast");
    $("#section-container-3-show").hide("fast");
    $("#section-container-4-show").show("fast");
    });
     $("#checkMeB").click(function(){

		if ($("#checkMeB").is(":checked"))
		{
		
			$(".makePrimaryB").show("fast");
		}
		else
		{
					$(".makePrimaryB").hide("fast");
		}
	  });
    </script>
<div style="height:30px; width:900px;"></div>

<div id="section-container-3" style="display:none;">
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Section C - <label style="font-size:small;">Make Primary&nbsp;</label><input type="checkbox" class="unique" value="Make Primary" id="checkMeC"></input></legend>
     <input type="hidden" value="C" name="sectionC[0][section]"/>
    <div id="container1B" style="margin-bottom:4px;" class="clonedInput">

        <strong>Title:</strong>  &nbsp;  <input type="text" name="sectionC[0][title]" id="section-title" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Value:</strong> &nbsp;  <input type="text" name="sectionC[0][value]" id="section-value" style="width:200px;"/> &nbsp;   &nbsp; 
         <span class="makePrimaryC"><strong>Number Range: </strong> </span> &nbsp; 
        <select name="sectionC[0][range]" id="section-range-c" style="width:200px;" class="makePrimaryC"><?php include("includes/numberRangesSelect.tpl.php");?></select><br/><br/>
    </div>
        <input type="button" id="cloned" value="Add Section" onclick="cloneMeB($('#container1B'));" style="float:right;" />
</fieldset>
</div>

<input type="button" id="section-container-4-show" value="Add Section D" style="float:right;display:none;"/>
<script>
    $("#section-container-4-show").click(function () {
    $("#section-container-4").show("fast");
    $("#section-container-4-show").hide("fast");
    $("#section-container-5-show").show("fast");
    });
    $("#checkMeC").click(function(){

		if ($("#checkMeC").is(":checked"))
		{
		
			$(".makePrimaryC").show("fast");
		}
		else
		{
					$(".makePrimaryC").hide("fast");
		}
	  });
</script>
    
<div style="height:30px; width:900px;"></div>

 <div id="section-container-4" style="display:none;">
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Section D - <label style="font-size:small;">Make Primary&nbsp;</label><input type="checkbox" class="unique" value="Make Primary" id="checkMeD"></input></legend>
     <input type="hidden" value="D" name="sectionD[0][section]"/>
    <div id="container1C" style="margin-bottom:4px;" class="clonedInput">

        <strong>Title:</strong>  &nbsp;  <input type="text" name="sectionD[0][title]" id="section-title" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Value:</strong> &nbsp;  <input type="text" name="sectionD[0][value]" id="section-value" style="width:200px;"/> &nbsp;   &nbsp; 
	<span class="makePrimaryD"><strong>Number Range:</strong></span>  &nbsp; 
        <select name="sectionD[0][range]" id="section-range-d" style="width:200px;" class="makePrimaryD"><?php include("includes/numberRangesSelect.tpl.php");?></select><br/><br/>
    </div>
        <input type="button" id="clonee" value="Add Section" onclick="cloneMeC($('#container1C'));" style="float:right;" />
    
</fieldset>

</div>


<input type="button" id="section-container-5-show" value="Add Section E" style="float:right;display:none;"/>
<script>
    $("#section-container-5-show").click(function () {
    $("#section-container-5").show("fast");
    $("#section-container-5-show").hide("fast");
    $("#section-container-6-show").show("fast");
    });
    $("#checkMeD").click(function(){

		if ($("#checkMeD").is(":checked"))
		{
		
			$(".makePrimaryD").show("fast");
		}
		else
		{
					$(".makePrimaryD").hide("fast");
		}
	  });
    </script>
    
    <div style="height:30px; width:900px;"></div>

 <div id="section-container-5" style="display:none;">
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Section E - <label style="font-size:small;">Make Primary&nbsp;</label><input type="checkbox" class="unique" value="Make Primary" id="checkMeE"></input></legend>
       <input type="hidden" value="E" name="sectionE[0][section]"/>
    <div id="container1D" style="margin-bottom:4px;" class="clonedInput">

        <strong>Title:</strong>  &nbsp;  <input type="text" name="sectionE[0][title]" id="section-title" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Value:</strong> &nbsp;  <input type="text" name="sectionE[0][value]" id="section-value" style="width:200px;"/> &nbsp;   &nbsp; 
<span class="makePrimaryE"><strong>Number Range: </strong> </span> &nbsp; 
        <select name="sectionE[0][range]" id="section-range-e" style="width:200px;" class="makePrimaryE"><?php include("includes/numberRangesSelect.tpl.php");?></select><br/><br/>
    </div>
        <input type="button" id="clonef" value="Add Section" onclick="cloneMeD($('#container1D'));" style="float:right;" />
    
</fieldset>

</div>




<input type="button" id="section-container-6-show" value="Add Section F" style="float:right;display:none;"/>
<script>
    $("#section-container-6-show").click(function () {
    $("#section-container-6").show("fast");
    $("#section-container-6-show").hide("fast");
    $("#section-container-7-show").show("fast");
    });
    $("#checkMeE").click(function(){

		if ($("#checkMeE").is(":checked"))
		{
		
			$(".makePrimaryE").show("fast");
		}
		else
		{
					$(".makePrimaryE").hide("fast");
		}
	  });
    </script>
    
    <div style="height:30px; width:900px;"></div>

 <div id="section-container-6" style="display:none;">
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Section F - <label style="font-size:small;">Make Primary&nbsp;</label><input type="checkbox" class="unique" value="Make Primary" id="checkMeF"></input></legend>
      <input type="hidden" value="F" name="sectionF[0][section]"/>
    <div id="container1E" style="margin-bottom:4px;" class="clonedInput">

        <strong>Title:</strong>  &nbsp;  <input type="text" name="sectionF[0][title]" id="section-title" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Value:</strong> &nbsp;  <input type="text" name="sectionF[0][value]" id="section-value" style="width:200px;"/> &nbsp;   &nbsp; 
      <span class="makePrimayF"><strong>Number Range:</strong></span>  &nbsp; 
        <select name="sectionF[0][range]" id="section-range-f" style="width:200px;" class="makePrimaryF"><?php include("includes/numberRangesSelect.tpl.php");?></select><br/><br/>
    </div>
        <input type="button" id="cloneg" value="Add Section" onclick="cloneMeE($('#container1E'));" style="float:right;" />
    
</fieldset>

</div>




<input type="button" id="section-container-7-show" value="Add Section G" style="float:right;display:none;"/>
<script>
    $("#section-container-7-show").click(function () {
    $("#section-container-7").show("fast");
    $("#section-container-7-show").hide("fast");
    $("#section-container-8-show").show("fast");
    });
    $("#checkMeF").click(function(){

		if ($("#checkMeF").is(":checked"))
		{
		
			$(".makePrimaryF").show("fast");
		}
		else
		{
					$(".makePrimaryF").hide("fast");
		}
	  });
    </script>
    
    
    <div style="height:30px; width:900px;"></div>

 <div id="section-container-7" style="display:none;">
<fieldset style="padding:15px; background:none; border:1px solid #c3c3c3;">
<legend style="font-weight:bold; font-size:16px;">Number Section G - <label style="font-size:small;">Make Primary&nbsp;</label><input type="checkbox" class="unique" value="Make Primary" id="checkMeG"></input></legend>
    <input type="hidden" value="G" name="sectionG[0][section]"/>
    <div id="container1F" style="margin-bottom:4px;" class="clonedInput">

        <strong>Title:</strong>  &nbsp;  <input type="text" name="sectionG[0][title]" id="section-title" style="width:200px;"/> &nbsp;  &nbsp; 
        <strong>Value:</strong> &nbsp;  <input type="text" name="sectionG[0][value]" id="section-value" style="width:200px;"/> &nbsp;   &nbsp; 
<span class="makePrimaryG"><strong>Number Range:</strong></span>  &nbsp; 
        <select name="sectionG[0][range]" id="section-range-6" style="width:200px;" class="makePrimaryG"><?php include("includes/numberRangesSelect.tpl.php");?></select><br/><br/>
    </div>
        <input type="button" id="cloneh" value="Add Section" onclick="cloneMeF($('#container1F'));" style="float:right;" />
</fieldset>
</div>
<input type="submit" value="Save Number Template" style="float:right;"/>
<script>
 
    $("#checkMeG").click(function(){

		if ($("#checkMeG").is(":checked"))
		{
		
			$(".makePrimaryG").show("fast");
		}
		else
		{
					$(".makePrimaryG").hide("fast");
		}
	  });
    
    // Only allow one checkbox to be ticked.
    var $unique = $('input.unique');
    $unique.click(function() {
    $unique.filter(':checked').not(this).removeAttr('checked');
    });


    </script>
        
<?php
//We don't need this 
//print $content
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
