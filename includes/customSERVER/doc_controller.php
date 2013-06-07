<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
  <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="/misc/favicon.ico" type="image/x-icon" />
    <title>Water Pipe | gha.dev</title>
    <link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/admin_menu/admin_menu.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/modules/book/book.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/modules/node/node.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/modules/system/defaults.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/modules/system/system.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/modules/system/system-menus.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/modules/user/user.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/cck/theme/content-module.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/date/date.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/filefield/filefield.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/qtip/css/qtip.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/cck/modules/fieldgroup/fieldgroup.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/sites/all/modules/views/css/views.css?S" />
<link type="text/css" rel="stylesheet" media="all" href="/themes/garland/style.css?S" />
<link type="text/css" rel="stylesheet" media="print" href="/themes/garland/print.css?S" />
    <style type="text/css">
      
      ul.tabs {display:none;}
    </style>
    <script type="text/javascript" src="/misc/jquery.js?S"></script>
<script type="text/javascript" src="/misc/drupal.js?S"></script>
<script type="text/javascript" defer="defer" src="/sites/all/modules/admin_menu/admin_menu.js?S"></script>
<script type="text/javascript" src="/sites/all/libraries/qtip//jquery.qtip-1.0.0-rc3.min.js?S"></script>
<script type="text/javascript" src="/sites/all/modules/qtip/js/qtip.js?S"></script>
<script type="text/javascript" src="/themes/garland/js/tabs.jquery.js?S"></script>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
jQuery.extend(Drupal.settings, { "basePath": "/", "admin_menu": { "margin_top": 1 }, "qtip": { "target_position": "rightMiddle", "tooltip_position": "leftMiddle", "show_speech_bubble_tip": 1, "show_speech_bubble_tip_side": 0, "color": "blue", "border_radius": "4", "border_width": "3", "show_event_type": "mouseover", "hide_event_type": "mouseout", "show_solo": 1 } });
//--><!]]>
</script>
    
   
    
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
      <link type="text/css" rel="stylesheet" media="all" href="/themes/garland/fix-ie.css" />    <![endif]-->
  </head>
  <body style="overflow-x:none;">

<!-- Layout -->
 
              
 
<div id="header-top">
    <div id="header-container">
    
    
    <h1>Doc Reg - GHA Livigunn</h1>
   
    
        <br/>
    
    
    
	     
         
    
    

   <style type="text/css">
ul.main-contextual-links li a.one {
display:inline; background-color:#e5e5e5; padding:5px 7px; color:green; text-decoratione:none;
}
</style>

    
    <ul class="main-contextual-links">
      <li><a href="/project/water-pipe" class="one">Overview</a></li>
      <li><a href="/numbering_system/template_id/20" class="two">Assign Doc #s</a></li>
      <li><a href="/docs" class="three">Project Docs</a></li>
     </ul>
    
  <!--  <a href="/node/add/project" class="normalTip" title="Add a New project" style="position:absolute;margin-left: 690px; margin-top:10px;"><img src="themes/garland/images/newproject.png"/></a>&nbsp; <a href="/help" class="normalTip" title="Get Help" style="position:absolute;margin-left: 800px; margin-top:10px;"><img src="themes/garland/images/helpbtn.png"/></a>-->  
    </div> <!--END HEADER CONTAINER-->
 <div class="header-blocks"></div></div>
 
      

         

    <div id="wrapper">
    <div id="container" style="width:100%;"	>

      <div id="header">
        
    

      </div> <!-- /header -->
      
      <div id="main-container">

              <div class="main-center-container-two" style="width:100%;"> 
          
                              <div id="tabs-wrapper" class="clear-block">                <div class="title-wrapper">
          <h2 class="with-tabs">Assign documents to your issued numbers</h2>  
          
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          
          <div class="issue-numbers_role-engineer">
          
              
  
  
  <?php
  
  //place the hidden variables into easy to reach fields
  
  
   



$number_title = $_REQUEST['number_title'];
$project_id = $_REQUEST['project_id'];
$project_title = $_REQUEST['project_title'];
 
 
 



/// THIS IS WORKING

  
  
  foreach($_POST['issue'] as $number) {
   
  
  
  echo "<div class='number-for-issue-container'>";
  	echo "<span class='doc-num-for-issue'> <strong>Doc Number:</strong> $number </span>";
  	echo "<br/>";
  	echo "<span class='doc-num-for-issue'> <strong>Doc Title:</strong> $number_title </span>";
  	echo "<br/>";
  	echo "<span class='doc-num-for-issue'> <strong>Project Title:</strong> $project_id </span>";
  	echo "<br/>";
  	echo "<span class='doc-num-for-issue'> <strong>Project ID:</strong> $project_title </span>";
  	echo "<br/>";
  	echo "<a href='/node/add/issued?destination=includes/custom/doc_controller.php?edit[title]=$number_title&edit[field_issued_doc_no][0][value]=$number&edit[field_issued_project_id][0][nid][nid]=$project_title'>Assign document</a>";  
    	  echo "</div>";
  	  
 
    }
 ?>             
 
 
 </div>
  
  
  
  
</div>             </div>
          </span>
          
          



        </div>
         </div>                                        <div class="clear-block" style="margin:-70px 0 0 0 ;">
            <div id="node-2" class="node">

   <br/>
  <br/>
      
    
   
  
  <div class="content clear-block">
    

      
   
    
   </div>
   
   
        
  </div>

  <div class="clear-block">
    <div class="meta">
        </div>

      </div>

</div>            
         
            
        
            
           

            
           
          </div>
                    <div id="footer"><div id="block-system-0" class="clear-block block block-system">



</div>
</div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->

      
      </div> <!-- /container -->
  </div>
<!-- /layout -->

  <div id="admin-menu">
<ul><li class="expandable admin-menu-icon"><a href="/"><img class="admin-menu-icon" src="/misc/favicon.ico" width="16" height="16" alt="Home" /></a>
<ul><li class="expandable"><a href="/admin_menu/flush-cache?destination=node%2F2">Flush all caches</a>
<ul><li><a href="/admin_menu/flush-cache/admin_menu?destination=node%2F2">Administration menu</a></li><li><a href="/admin_menu/flush-cache/cache?destination=node%2F2">Cache tables</a></li><li><a href="/admin_menu/flush-cache/menu?destination=node%2F2">Menu</a></li><li><a href="/admin_menu/flush-cache/requisites?destination=node%2F2">Page requisites</a></li><li><a href="/admin_menu/flush-cache/theme?destination=node%2F2">Theme registry</a></li></ul></li><li><a href="/admin/reports/status/run-cron">Run cron</a></li><li><a href="/update.php">Run updates</a></li><li><a href="/admin_menu/toggle-modules?destination=node%2F2">Disable developer modules</a></li><li class="expandable"><a href="http://drupal.org">Drupal.org</a>
<ul><li><a href="http://drupal.org/project/issues/drupal">Drupal issue queue</a></li><li><a href="http://drupal.org/project/issues/ahah_response">AHAH Response issue queue</a></li><li><a href="http://drupal.org/project/issues/ahah_helper">AHAH helper issue queue</a></li><li><a href="http://drupal.org/project/issues/admin_menu">Administration menu issue queue</a></li><li><a href="http://drupal.org/project/issues/advanced_help">Advanced help issue queue</a></li><li><a href="http://drupal.org/project/issues/ldap_integration">Authentication issue queue</a></li><li><a href="http://drupal.org/project/issues/backup_migrate">Backup and Migrate issue queue</a></li><li><a href="http://drupal.org/project/issues/better_exposed_filters">Better Exposed Filters issue queue</a></li><li><a href="http://drupal.org/project/issues/cck_fullname">CCK Full Name Field issue queue</a></li><li><a href="http://drupal.org/project/issues/casetracker">Case Tracker issue queue</a></li><li><a href="http://drupal.org/project/issues/cck">Content issue queue</a></li><li><a href="http://drupal.org/project/issues/dhtml_menu">DHTML Menu issue queue</a></li><li><a href="http://drupal.org/project/issues/date">Date issue queue</a></li><li><a href="http://drupal.org/project/issues/devel">Devel issue queue</a></li><li><a href="http://drupal.org/project/issues/document">Document issue queue</a></li><li><a href="http://drupal.org/project/issues/draggableviews">DraggableViews issue queue</a></li><li><a href="http://drupal.org/project/issues/favorite_nodes">Favorite Nodes issue queue</a></li><li><a href="http://drupal.org/project/issues/filefield">FileField issue queue</a></li><li><a href="http://drupal.org/project/issues/flexifield">Flexi Field issue queue</a></li><li><a href="http://drupal.org/project/issues/hovertip">Hovertip issue queue</a></li><li><a href="http://drupal.org/project/issues/imagefield">ImageField issue queue</a></li><li><a href="http://drupal.org/project/issues/menu_breadcrumb">Menu breadcrumb issue queue</a></li><li><a href="http://drupal.org/project/issues/nice_menus">Nice Menus issue queue</a></li><li><a href="http://drupal.org/project/issues/pathauto">Pathauto issue queue</a></li><li><a href="http://drupal.org/project/issues/prepopulate">Prepopulate issue queue</a></li><li><a href="http://drupal.org/project/issues/print">Printer-friendly pages issue queue</a></li><li><a href="http://drupal.org/project/issues/quicktabs">Quick Tabs issue queue</a></li><li><a href="http://drupal.org/project/issues/schema">Schema issue queue</a></li><li><a href="http://drupal.org/project/issues/devel_themer">Theme developer issue queue</a></li><li><a href="http://drupal.org/project/issues/token">Token issue queue</a></li><li><a href="http://drupal.org/project/issues/views_groupby">Views GroupBy issue queue</a></li><li><a href="http://drupal.org/project/issues/views_hacks">Views PHP Access Plugin issue queue</a></li><li><a href="http://drupal.org/project/issues/views">Views issue queue</a></li><li><a href="http://drupal.org/project/issues/webform">Webform issue queue</a></li><li><a href="http://drupal.org/project/issues/workflow">Workflow issue queue</a></li><li><a href="http://drupal.org/project/issues/jquery_ui">jQuery UI issue queue</a></li><li><a href="http://drupal.org/project/issues/qtip">qTip issue queue</a></li></ul></li></ul></li><li class=" admin-menu-action admin-menu-logout"><a href="/logout">Log out root</a></li><li class=" admin-menu-action admin-menu-icon admin-menu-users"><a href="/admin/user/user">0 / 0 <img src="/sites/all/modules/admin_menu/images/icon_users.png" width="16" height="15" alt="Current anonymous / authenticated users" title="Current anonymous / authenticated users" /></a></li><li class="expandable"><a href="/admin/content">Content management</a>
<ul><li class="expandable"><a href="/admin/content/book">Books</a>
<ul><li><a href="/admin/content/book/list">List</a></li><li><a href="/admin/content/book/settings">Settings</a></li></ul></li><li class="expandable"><a href="/admin/content/node">Content</a>
<ul><li><a href="/admin/content/node/overview">List</a></li></ul></li><li class="expandable"><a href="/admin/content/types">Content types</a>
<ul><li><a href="/admin/content/types/list">List</a></li><li><a href="/admin/content/types/add">Add content type</a></li><li class="expandable"><a href="/admin/content/node-type/client">Edit Client</a>
<ul><li class="expandable"><a href="/admin/content/node-type/client/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/client/fields/field_client_description">Client Description</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/client/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/client/display/basic">Basic</a></li><li><a href="/admin/content/node-type/client/display/print">Print</a></li><li><a href="/admin/content/node-type/client/display/rss">RSS</a></li><li><a href="/admin/content/node-type/client/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/document-instrustion">Edit Document Instruction</a>
<ul><li class="expandable"><a href="/admin/content/node-type/document-instrustion/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_actions_required">Actions Required</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_number">Document No</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_doc_issuer">Issuer</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_projet_leader">Project Lead</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_reason">Reason for issue</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_recipients">Recipients</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_revision">Revision</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_special">Special issue instructions</a></li><li><a href="/admin/content/node-type/document-instrustion/fields/field_di_changes_summary">Summary of changes</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/document-instrustion/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/document-instrustion/display/basic">Basic</a></li><li><a href="/admin/content/node-type/document-instrustion/display/print">Print</a></li><li><a href="/admin/content/node-type/document-instrustion/display/rss">RSS</a></li><li><a href="/admin/content/node-type/document-instrustion/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/issued">Edit Issued Document</a>
<ul><li class="expandable"><a href="/admin/content/node-type/issued/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/issued/fields/field_issued_document">Document</a></li><li><a href="/admin/content/node-type/issued/fields/field_issued_doc_description">Document Description</a></li><li><a href="/admin/content/node-type/issued/fields/field_issued_doc_no">Document No</a></li><li><a href="/admin/content/node-type/issued/fields/field_issued_doc_to">Issued to</a></li><li><a href="/admin/content/node-type/issued/fields/field_issued_project_id">Project ID</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/issued/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/issued/display/basic">Basic</a></li><li><a href="/admin/content/node-type/issued/display/print">Print</a></li><li><a href="/admin/content/node-type/issued/display/rss">RSS</a></li><li><a href="/admin/content/node-type/issued/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/issued-number-item">Edit Issued Number Item</a>
<ul><li class="expandable"><a href="/admin/content/node-type/issued-number-item/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/issued-number-item/fields/field_issued_no_item_project">Project ID</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/issued-number-item/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/issued-number-item/display/basic">Basic</a></li><li><a href="/admin/content/node-type/issued-number-item/display/print">Print</a></li><li><a href="/admin/content/node-type/issued-number-item/display/rss">RSS</a></li><li><a href="/admin/content/node-type/issued-number-item/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/numbering">Edit Numbering Template</a>
<ul><li class="expandable"><a href="/admin/content/node-type/numbering/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/numbering/fields/field_no_client">Client No</a></li><li><a href="/admin/content/node-type/numbering/fields/field_no_discipline">Discipline</a></li><li><a href="/admin/content/node-type/numbering/fields/field_no_project_id">Project ID</a></li><li><a href="/admin/content/node-type/numbering/fields/field_no_seperator">Seperator</a></li><li><a href="/admin/content/node-type/numbering/fields/field_no_sub_project">Sub Project</a></li><li><a href="/admin/content/node-type/numbering/fields/field_no_type">Type</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/numbering/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/numbering/display/basic">Basic</a></li><li><a href="/admin/content/node-type/numbering/display/print">Print</a></li><li><a href="/admin/content/node-type/numbering/display/rss">RSS</a></li><li><a href="/admin/content/node-type/numbering/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/page">Edit Page</a>
<ul><li><a href="/admin/content/node-type/page/fields">Manage fields</a></li><li class="expandable"><a href="/admin/content/node-type/page/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/page/display/basic">Basic</a></li><li><a href="/admin/content/node-type/page/display/print">Print</a></li><li><a href="/admin/content/node-type/page/display/rss">RSS</a></li><li><a href="/admin/content/node-type/page/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/project">Edit Project</a>
<ul><li class="expandable"><a href="/admin/content/node-type/project/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/project/fields/field_project_client">Client</a></li><li><a href="/admin/content/node-type/project/fields/field_project_doc_no_template">Document Numbering Template</a></li><li><a href="/admin/content/node-type/project/fields/field_project_description">Project Description</a></li><li><a href="/admin/content/node-type/project/fields/field_project_id">Project ID</a></li><li><a href="/admin/content/node-type/project/fields/field_project_manager">Project Manager</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/project/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/project/display/basic">Basic</a></li><li><a href="/admin/content/node-type/project/display/print">Print</a></li><li><a href="/admin/content/node-type/project/display/rss">RSS</a></li><li><a href="/admin/content/node-type/project/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/received">Edit Received Document</a>
<ul><li class="expandable"><a href="/admin/content/node-type/received/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/received/fields/field_received_client_no">Client No</a></li><li><a href="/admin/content/node-type/received/fields/field_received_doc_number">Doc Number</a></li><li><a href="/admin/content/node-type/received/fields/field_received_document">Document</a></li><li><a href="/admin/content/node-type/received/fields/field_received_doc_description">Document Description</a></li><li><a href="/admin/content/node-type/received/fields/field_received_originator">Originator</a></li><li><a href="/admin/content/node-type/received/fields/field_received_project_id">Project Id</a></li><li><a href="/admin/content/node-type/received/fields/field_received_doc_revision">Revision</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/received/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/received/display/basic">Basic</a></li><li><a href="/admin/content/node-type/received/display/print">Print</a></li><li><a href="/admin/content/node-type/received/display/rss">RSS</a></li><li><a href="/admin/content/node-type/received/display/token">Token</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/content/node-type/test">Edit test</a>
<ul><li class="expandable"><a href="/admin/content/node-type/test/fields">Manage fields</a>
<ul><li><a href="/admin/content/node-type/test/fields/field_test_4">testtt</a></li></ul></li><li class="expandable"><a href="/admin/content/node-type/test/display">Display fields</a>
<ul><li><a href="/admin/content/node-type/test/display/basic">Basic</a></li><li><a href="/admin/content/node-type/test/display/print">Print</a></li><li><a href="/admin/content/node-type/test/display/rss">RSS</a></li><li><a href="/admin/content/node-type/test/display/token">Token</a></li></ul></li></ul></li><li><a href="/admin/content/types/fields">Fields</a></li></ul></li><li class="expandable"><a href="/node/add">Create content</a>
<ul><li><a href="/node/add/client">Client</a></li><li><a href="/node/add/document-instrustion">Document Instruction</a></li><li><a href="/node/add/issued">Issued Document</a></li><li><a href="/node/add/issued-number-item">Issued Number Item</a></li><li><a href="/node/add/numbering">Numbering Template</a></li><li><a href="/node/add/page">Page</a></li><li><a href="/node/add/project">Project</a></li><li><a href="/node/add/received">Received Document</a></li><li><a href="/node/add/test">Test</a></li></ul></li><li><a href="/admin/content/node-settings">Post settings</a></li><li><a href="/admin/content/rss-publishing">RSS publishing</a></li><li class="expandable"><a href="/admin/content/taxonomy">Taxonomy</a>
<ul><li><a href="/admin/content/taxonomy/list">List</a></li><li><a href="/admin/content/taxonomy/add/vocabulary">Add vocabulary</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/build">Site building</a>
<ul><li class="expandable"><a href="/admin/build/block">Blocks</a>
<ul><li class="expandable"><a href="/admin/build/block/list">List</a>
<ul><li><a href="/admin/build/block/list/garland">Garland</a></li><li><a href="/admin/build/block/list/gha">GHA Livigunn</a></li></ul></li><li><a href="/admin/build/block/add">Add block</a></li></ul></li><li class="expandable"><a href="/admin/build/menu">Menus</a>
<ul><li><a href="/admin/build/menu/list">List menus</a></li><li><a href="/admin/build/menu/add">Add menu</a></li><li><a href="/admin/build/menu/settings">Settings</a></li></ul></li><li class="expandable"><a href="/admin/build/modules">Modules</a>
<ul><li><a href="/admin/build/modules/list">List</a></li><li><a href="/admin/build/modules/uninstall">Uninstall</a></li></ul></li><li class="expandable"><a href="/admin/build/quicktabs">Quicktabs</a>
<ul><li><a href="/admin/build/quicktabs/list">List</a></li><li><a href="/admin/build/quicktabs/add">New QT block</a></li></ul></li><li class="expandable"><a href="/admin/build/themes">Themes</a>
<ul><li><a href="/admin/build/themes/select">List</a></li><li class="expandable"><a href="/admin/build/themes/settings">Configure</a>
<ul><li><a href="/admin/build/themes/settings/global">Global settings</a></li><li><a href="/admin/build/themes/settings/gha">GHA Livigunn</a></li><li><a href="/admin/build/themes/settings/garland">Garland</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/build/path">URL aliases</a>
<ul><li><a href="/admin/build/path/list">List</a></li><li><a href="/admin/build/path/add">Add alias</a></li><li><a href="/admin/build/path/delete_bulk">Delete aliases</a></li><li><a href="/admin/build/path/pathauto">Automated alias settings</a></li></ul></li><li class="expandable"><a href="/admin/build/views">Views</a>
<ul><li><a href="/admin/build/views/list">List</a></li><li><a href="/admin/build/views/add">Add</a></li><li><a href="/admin/build/views/import">Import</a></li><li class="expandable"><a href="/admin/build/views/tools">Tools</a>
<ul><li><a href="/admin/build/views/tools/basic">Basic</a></li><li><a href="/admin/build/views/tools/export">Bulk export</a></li><li><a href="/admin/build/views/tools/convert">Convert</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/build/workflow">Workflow</a>
<ul><li><a href="/admin/build/workflow/list">List</a></li><li><a href="/admin/build/workflow/add">Add workflow</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/settings">Site configuration</a>
<ul><li><a href="/admin/by-module">By module</a></li><li class="expandable"><a href="/admin/settings/actions">Actions</a>
<ul><li><a href="/admin/settings/actions/manage">Manage actions</a></li></ul></li><li><a href="/admin/settings/admin_menu">Administration menu</a></li><li><a href="/admin/settings/admin">Administration theme</a></li><li><a href="/admin/settings/clean-urls">Clean URLs</a></li><li class="expandable"><a href="/admin/settings/date-time">Date and time</a>
<ul><li><a href="/admin/settings/date-time/configure">Date and time</a></li><li class="expandable"><a href="/admin/settings/date-time/formats">Formats</a>
<ul><li><a href="/admin/settings/date-time/formats/configure">Configure</a></li><li><a href="/admin/settings/date-time/formats/custom">Custom formats</a></li><li><a href="/admin/settings/date-time/formats/add">Add format</a></li></ul></li></ul></li><li><a href="/admin/settings/draggableviews">DraggableViews</a></li><li><a href="/admin/settings/error-reporting">Error reporting</a></li><li><a href="/admin/settings/file-system">File system</a></li><li><a href="/admin/settings/image-toolkit">Image toolkit</a></li><li class="expandable"><a href="/admin/settings/filters">Input formats</a>
<ul><li><a href="/admin/settings/filters/list">List</a></li><li><a href="/admin/settings/filters/add">Add input format</a></li></ul></li><li class="expandable"><a href="/admin/settings/ldap">LDAP</a>
<ul><li class="expandable"><a href="/admin/settings/ldap/ldapauth">Authentication</a>
<ul><li><a href="/admin/settings/ldap/ldapauth/configure">Settings</a></li><li><a href="/admin/settings/ldap/ldapauth/list">List</a></li><li><a href="/admin/settings/ldap/ldapauth/add">Add Server</a></li></ul></li><li><a href="/admin/settings/ldap/ldapdata">Data</a></li></ul></li><li><a href="/admin/settings/logging">Logging and alerts</a></li><li><a href="/admin/settings/performance">Performance</a></li><li><a href="/admin/settings/quicktabs">Quicktabs</a></li><li><a href="/admin/settings/site-information">Site information</a></li><li><a href="/admin/settings/site-maintenance">Site maintenance</a></li><li><a href="/admin/settings/views_filters_autosubmit">Views Filters Auto-submit</a></li><li><a href="/admin/settings/qtip">qTip settings</a></li></ul></li><li class="expandable"><a href="/admin/user">User management</a>
<ul><li class="expandable"><a href="/admin/user/rules">Access rules</a>
<ul><li><a href="/admin/user/rules/list">List</a></li><li><a href="/admin/user/rules/add">Add rule</a></li><li><a href="/admin/user/rules/check">Check rules</a></li></ul></li><li><a href="/admin/user/permissions">Permissions</a></li><li><a href="/admin/user/roles">Roles</a></li><li><a href="/admin/user/settings">User settings</a></li><li class="expandable"><a href="/admin/user/user">Users</a>
<ul><li><a href="/admin/user/user/list">List</a></li><li><a href="/admin/user/user/create">Add user</a></li></ul></li></ul></li><li class="expandable"><a href="/admin/reports">Reports</a>
<ul><li><a href="/admin/reports/status">Status report</a></li></ul></li></ul></div>  </body>
</html>