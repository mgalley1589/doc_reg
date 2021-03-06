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
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
 <style type="text/css">
      
      ul.tabs {display:none;}
  div.error {display:none;}
  #_filter_0 {font-family:arial; font-weight:normal;}
   #_filter_1 {font-family:arial; font-weight:normal;}
    #_filter_2 {font-family:Arial; font-weight:normal;}
     #_filter_3 {font-family:Arial; font-weight:normal;}
    #right-sidebar {display:none;}
    </style>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="http://gha.dev.centralstep.com/themes/garland/js/picnet.table.filter.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
            $('.pending-issue-forms').tableFilter();
            $('table').tableFilter();
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
    
    
    <h1>GHA Livigunn Doc Reg</h1>
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
 <div class="header-blocks"><?php print $header; ?></div></div>
 

 


         

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
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
        </div>
          <?php //if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php // if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block" style="margin-top:-20px;">
                    
        <?php if($_GET[m] == 'y') { ?>



<div style='width:1020px; height:auto; padding:10px; background-color:#ccff99; border:1px solid green; font-weight:bold;'>
  <?php 
  $sql = "SELECT project_id FROM doc_issue_form WHERE ifid=$_GET[ifid]";
  $project_id = db_result(db_query($sql));

  $sql2 = "SELECT nid FROM content_type_project WHERE field_project_id_value='$project_id'";
  $pid_new = db_result(db_query($sql2));
  
  ?>


           The form was successfully issued. You can view a transmittal report by <a href="/generate-transmittal-report?nid=<?php print $pid_new;?>">clicking here</a>
           </div>
        <?php } ?>
        
        
        <div class="usual">
   
   
   <ul class="idTabs"> 
  <li><a href="#all-issued-docs">Pending Issue Forms</a></li> 
    
  
  <li><a href="#all-received-docs">Completed Issue Forms</a></li> 

   <li><a href="#all-rejected-docs">Rejected Issue Forms</a></li> 
   
</ul> 
<div id="all-issued-docs"> 
<p>&nbsp;</p>
        <table class='views-table cols-7 pending-issue-forms'>
    <thead>
    <tr>
    <th class='views-field'>
        Issue Form ID
      </th>
      <th class='views-field'>
        Project ID
      </th>
             <th class='views-field'>
        Generated by
      </th>
      <th class='views-field'>
        Date Submitted
      </th>
     </tr>
  </thead>
  <tbody>
    <?php 
          
          $sql = "SELECT * from doc_issue_form WHERE completed=0 AND rejected=0 ORDER BY date DESC";
          
      $forms = db_query($sql);
            // Pull them as an array
      //      $numbers_data = db_fetch_array($numbers);
            // loop through the array
	            while ($forms_data = db_fetch_array($forms)) {?>
          
          
     <?php
     //echo "<pre>";
     //print_r($numbers_data)
      //echo "</pre>";
      ?>
      
  
     <tr class='odd views-row-first'> 
     <td class='views-field'>
 <?php 
 $issueFormID = $forms_data['ifid'];
 $view_link = "<a href='/issue-form?id=";
  		$view_return = "'>$issueFormID</a>";
  ?>
<?php echo $view_link . $forms_data['ifid'] . $view_return;?>
  </td>
  
 <td class='views-field'>
 <?php 
 $projectID = $forms_data['project_id'];
 $view_link = "<a href='/issue-form?id=";
  		$view_return = "'>$projectID</a>";
  ?>
<?php echo $view_link . $forms_data['ifid'] . $view_return;?>
	 
  </td>
    <td class='views-field'>
  <?php echo $forms_data['generated_by'];?>
  </td>
  <td class='views-field'>
  <?php echo date("d/m/y", strtotime($forms_data['date']));?>
  </td>
   
  <?php } ?>
 </tr>
</tbody> </table>

</div> 
<div id="all-received-docs">
<p>&nbsp;</p>
<table class='views-table cols-7'>
    <thead>
    <tr>
    <th class='views-field'>
        Issue Form ID
      </th>
      <th class='views-field'>
        Project ID
      </th>
     
       <th class='views-field'>
        Generated by
      </th>
      <th class='views-field'>
        Date Submitted
      </th>
      
      
     </tr>
  </thead>
  <tbody>

  <?php 
          
          $sql = "SELECT * from doc_issue_form WHERE completed=1 AND rejected=0;";
          
      $forms = db_query($sql);
            // Pull them as an array
      //      $numbers_data = db_fetch_array($numbers);
            // loop through the array
	            while ($forms_data = db_fetch_array($forms)) {?>
          
          
     <?php
     //echo "<pre>";
     //print_r($numbers_data)
      //echo "</pre>";
      ?>
      
                <tr class='odd views-row-first'>   
                <td class='views-field'>
 <?php 
 $issueFormID = $forms_data['ifid'];
 $view_link = "<a href='/issue-form-view?id=";
  		$view_return = "'>$issueFormID</a>";
  ?>
<?php echo $view_link . $forms_data['ifid'] . $view_return;?>
  </td>
 <td class='views-field'>
 <?php 
 $projectID = $forms_data['project_id'];
 $view_link = "<a href='/issue-form/?id=";
  		$view_return = "'>$projectID</a>";
  ?>
<?php echo $view_link . $forms_data['ifid'] . $view_return;?>
  </td>
 	
  <td class='views-field'>
  <?php echo $forms_data['generated_by'];?>
  </td>
  <td class='views-field'>
  <?php echo date("d/m/y", strtotime($forms_data['date']));?>
  </td>
  
 
  <?php } ?>
 </tr>
</tbody> </table>

</div>


<div id="all-rejected-docs">
<p>&nbsp;</p>
<table class='views-table cols-7'>
    <thead>
    <tr>
    <th class='views-field'>
        Issue Form ID
      </th>
      <th class='views-field'>
        Project ID
      </th>
     
       <th class='views-field'>
        Generated by
      </th>
      <th class='views-field'>
        Date Submitted
      </th>
      
      
     </tr>
  </thead>
  <tbody>

  <?php 
          
          $sql = "SELECT * from doc_issue_form WHERE completed=0 AND rejected=1;";
          
      $forms = db_query($sql);
            // Pull them as an array
      //      $numbers_data = db_fetch_array($numbers);
            // loop through the array
              while ($forms_data = db_fetch_array($forms)) {?>
          
          
     <?php
     //echo "<pre>";
     //print_r($numbers_data)
      //echo "</pre>";
      ?>
      
                <tr class='odd views-row-first'>   
                <td class='views-field'>
 <?php 
 $issueFormID = $forms_data['ifid'];
 $view_link = "<a href='/issue-form-view/?id=";
      $view_return = "'>$issueFormID</a>";
  ?>
<?php echo $view_link . $forms_data['ifid'] . $view_return;?>
  </td>
 <td class='views-field'>
 <?php 
 $projectID = $forms_data['project_id'];
 $view_link = "<a href='/issue-form/?id=";
      $view_return = "'>$projectID</a>";
  ?>
<?php echo $view_link . $forms_data['ifid'] . $view_return;?>
  </td>
  
  <td class='views-field'>
  <?php echo $forms_data['generated_by'];?>
  </td>
  <td class='views-field'>
  <?php echo date("d/m/y", strtotime($forms_data['date']));?>
  </td>
  
 
  <?php } ?>
 </tr>
</tbody> </table>

</div>

    
   </div>
   

        
        
        
        
        
          
                   
            <?php// print $content ?>
          </div>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->
      </div>

      <?php //if ($right): ?>
      
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
