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
    
   
    
    <script type="text/javascript">
      
      $(document).ready(function() {
 // hides the slickbox as soon as the DOM is ready
  $('#project-switcher-container').hide('');
 // shows the slickbox on clicking the noted link  
  $('#project-switcher').click(function() {
    $('#project-switcher-container').slideDown('Slow');
    return false;
  });
 // hides the slickbox on clicking the noted link  
  $('#project-switcher-close').click(function() {
    $('#project-switcher-container').slideUp('fast');
    return false;
  });
 
 // toggles the slickbox on clicking the noted link  
  //$('##project-switcher').click(function() {
    //$('#project-switcher-container').toggle(400);
    //return false;
  //});

});

 
   
 </script>
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
    
     <?php 
    // Get the template id to assign to the assing numbers button URL 
    // Place the template name into a variable.
    $template_name = $node->field_project_doc_no_template[0]['view'];
    // Build the SQL Query
    $sql = "SELECT template_id from number_templates WHERE template_name='%s'";
    // Get one result from the query and hold in the $result variable
    $result = db_result(db_query($sql, $template_name));
    ?>
    
    
    

   <style type="text/css">
ul.main-contextual-links li a.<?php echo $current; ?> {
display:inline; background-color:#e5e5e5; padding:5px 7px; color:green; text-decoratione:none;
}
</style>

    
    <ul class="main-contextual-links">
      <li><a href="/project/<?php echo $project[2];?>" class="one">Overview</a></li>
      <li><a href="/numbering_system/template_id/<?php echo $result; ?>" class="two">Assign Doc #s</a></li>
      <li><a href="/docs" class="three">Project Docs</a></li>
     </ul>
    
  <!--  <a href="/node/add/project" class="normalTip" title="Add a New project" style="position:absolute;margin-left: 690px; margin-top:10px;"><img src="themes/garland/images/newproject.png"/></a>&nbsp; <a href="/help" class="normalTip" title="Get Help" style="position:absolute;margin-left: 800px; margin-top:10px;"><img src="themes/garland/images/helpbtn.png"/></a>-->  
    </div> <!--END HEADER CONTAINER-->
 <div class="header-blocks"><?php print $header; ?></div></div>
 
      

         

    <div id="wrapper">
    <div id="container">

      <div id="header">
        
    

      </div> <!-- /header -->
      
      <div id="main-container">

              <div class="main-center-container"> 
          
          <?php //print $breadcrumb; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        
        <div class="title-wrapper">
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>  
          <span class="nav-controllers"><a  href="/dashboard">Back to Dashboard</a> | <a href="#" id="project-switcher">Switch Projects</a>
            <div id="project-switcher-container">
                <h1 class="right-sidebar">Switch Projects</h1>  <span id="project-switcher-close"><a href="#">Close</a></span>
                <br/><br/>
              
              <?php
$view = views_get_view('all_projects_switcher');
print $view->execute_display('default');
?>
            </div>
          </span>
          
          



        </div>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php //if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php //if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block" style="margin:-70px 0 0 0 ;">
            
            <div style="height:50px; width:50px;"></div>
            
            <?php print $messages ?>
            
            <?php 
            // Retrieve all numbers from the temporary database
            $sql = "SELECT number, number_title, project_title, project_id FROM {doc_numbers_temp}";
            $numbers = db_query($sql);
            // Pull them as an array
            $numbers_data = db_fetch_array($numbers);
            // loop through the array
	            while ($numbers_data = db_fetch_array($numbers)) { ?>
	            
	            
	            
	            <!-- Start the HTML for the numbers marked for issue table -->
<div class="number-for-issue-container">
<span class="doc-num-for-issue"> <strong>Doc Number:</strong> <?php echo $numbers_data['number'];?> </span>
<br/>
<span class="doc-num-for-issue"> <strong>Doc Title:</strong> <?php echo $numbers_data['number_title'];?></span>
 <br/>
 <span class='doc-num-for-issue'> <strong>Project Title:</strong> <?php echo $numbers_data['project_title'];?></span>
<br/>
<span class='doc-num-for-issue'> <strong>Project ID:</strong> <?php echo $numbers_data['project_id'];?> </span>
<br/>
<a class="button-link" style="float:right; margin:-10px 10px 10px 10px;" href="/node/add/issued?destination=assign-docs?&edit[title]=<?php echo $numbers_data['number_title'];?>&edit[field_issued_doc_no][0][value]=<?php echo $numbers_data['number'];?>&edit[field_issued_project_id][0][nid][nid]=<?php echo $numbers_data['project_title'];?>">Assign document</a>   </div>

	            
	            
	            
	            
	            
	            
	            
<?php 
} 
?>         
	             
 

            
         
            <a href="/doc_controller.php" class="button-link">Send to Doc Controller</a>
        
            
           

            
           
          </div>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      
  <div id="right-sidebar"s>
          
          <?php print $right ?>
          
          
          <?php //if (!$left && $search_box): ?><div class="block block-theme"><?php //print $search_box ?></div><?php //endif; ?>
          <?php //print $right ?>
        </div>
      <?php //sendif; ?>

      </div>
    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>
