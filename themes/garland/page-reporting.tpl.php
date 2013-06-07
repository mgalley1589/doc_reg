<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title><?php print $head_title ?></title>
    <?php print $styles ?>
    <?php //print $scripts ?>
    <style type="text/css">
    div.error {display:none;}
    </style>
    <!--[if lt IE 7]>
      <?php print phptemplate_get_ie_styles(); ?>
    <![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/themes/garland/js/picnet.table.filter.min.js"></script>  
    <script type="text/javascript">
      $(document).ready(function() {
            $('.reports').tableFilter();
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
    
    
    <h1>Doc Reg - GHA Livigunn</h1>
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
</div>
 

 


         

    <div id="wrapper">
    <div id="container">

      <div id="header">
        
    

      </div> <!-- /header -->
      
      <div id="main-container">

              <div class="main-center-container"> 
          
      
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php //if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <div class="title-wrapper" style="margin-left:-20px;">
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title ."<a href='/node/add/project' style='float:right; margin:-3px 0 0 855px;' class='customBTN'>+ Create Project</a></h2>"; endif; ?>
        </div>
         <div class="header-blocks"><?php print $header; ?></div>	
          <?php //if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php // if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block" style="margin-top:-20px;">
            
            <div id="reports">
<table border=1 class="reports">
  <thead>
    <tr>
      <th>Project ID</th>
      <th>Project Title</th>
      <th>Date Started</th>
      <th>Report</th>
    </tr>
  </thead>
  <tbody>
    
       <?php 
          $sql = "SELECT * FROM {node} WHERE type='project'";
          $result = db_query($sql);
          while ($row = db_fetch_array($result)) {
          echo "<tr>";
         $sql = "SELECT field_project_id_value FROM content_type_project WHERE nid=%d";
         $r = db_result(db_query($sql, $row['nid']));
         echo "<td>" . $r . "</td>";
          echo "<td>" . $row['title'] . "</td>";
          echo "<td>" . date('d/m/Y', $row['created']) . "</td>";
         echo "<td><a href='/generate-transmittal-report?nid=$row[nid]'>Generate Report</a></td>";
         echo "</tr>"; 
          
          }

          ?></tbody>
</table>
      

  </tbody>
</table>
         </div>  
         </div>
          <?php print $feed_icons ?>
          <div id="footer"><?php print $footer_message . $footer ?></div>
      </div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->
      </div>

      <?php //if ($right): ?>
            </div>
    </div> <!-- /container -->
  </div>
<!-- /layout -->

  <?php print $closure ?>
  </body>
</html>
<?php //} ?>
