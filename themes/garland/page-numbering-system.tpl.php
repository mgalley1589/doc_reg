<?php
// $Id: page.tpl.php,v 1.18.2.1 2009/04/30 00:13:31 goba Exp $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
  <head>
    <?php print $head ?>
    <title>Numbering System | GHA Doc Reg | User: <?php echo $user->name;?></title>
    <?php print $styles ?>
    <style type="text/css">
      ul.tabs {display:none;}
    </style>
    <?php print $scripts ?>
    <script type="text/javascript" src="/themes/garland/js/example.number.js"></script>
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
    
    ?>
    
    
    

   <style type="text/css">
ul.main-contextual-links li a.<?php echo $current; ?> {
display:inline; background-color:#e5e5e5; padding:5px 7px; color:green; text-decoratione:none;
}
</style>
    
   
           


	<ul class="main-contextual-links">
      
      <ul class="main-contextual-links">
      <li><a href="/dashboard" class="one">Dashboard</a></li>
      <!--<li><a href="/projects" class="two">Projects</a></li>
      <li><a href="/docs" class="three">Docs</a></li>-->
      <?php if ($user->uid = 1) { // Print the Admin only Options
      ?>
      <li><a href="/node/<?php echo $_GET['nid'];?>">Current Project</a></li>
      <li><a href="/number_templates_list" class="four">Number Templates</a></li>
      <li><a href="/reports" class="five">Reports</a></li>
      <li><a href="/admin" class="six">Admin</a></li>
      <?php } else {} ?>
    <br/><br/>
      
      <?php $nid = $_GET['nid'];
      		$sqlFURL = "SELECT dst FROM url_alias WHERE src ='node/$nid'";
      		$url = db_result(db_query($sqlFURL));
      	?>
      	
      	
      <li><a href="/<?php echo $url;?>" class="one">Overview</a></li>
      <li><a href="#" class="two">Assign Doc #s</a></li>
      </ul>
  <!--  <a href="/node/add/project" class="normalTip" title="Add a New project" style="position:absolute;margin-left: 690px; margin-top:10px;"><img src="themes/garland/images/newproject.png"/></a>&nbsp; <a href="/help" class="normalTip" title="Get Help" style="position:absolute;margin-left: 800px; margin-top:10px;"><img src="themes/garland/images/helpbtn.png"/></a>-->  
    </div> <!--END HEADER CONTAINER-->
 <div class="header-blocks"><?php print $header; ?></div></div>
    <div id="wrapper" style="margin-top:6px;"	>
    <div id="container">
      <div id="header">
      </div> <!-- /header -->
      <div id="main-container">
    	<div class="main-center-container"> 
          
          <?php //print $breadcrumb; ?>
          <?php if ($mission): print '<div id="mission">'. $mission .'</div>'; endif; ?>
          <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
        <?php print $messages ?>
        <div class="title-wrapper" style="margin:0 0 40px -20px; padding:0 0 0 10px;">
          <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>  
        

        </div>
          <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
          <?php //if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
          <?php //if ($show_messages && $messages): print $messages; endif; ?>
          <?php print $help; ?>
          <div class="clear-block" style="margin:-10px 0 0 0 ;">
          
          <?php
          // GET the Template ID
          $tid = $_GET['tid'];
          $nid = $_GET['nid'];
          $url = $_GET['q']; 
          $success = $_GET['s'];
         ?>
          
          
          <?php if ($tid == NULL) {?>
          
          <div class="alert-message warning" style="padding:7px; height:80px;">
<h3>Message</h3>
There is no numbering template assigned to this project.<br/>
<a href="/node/<?php echo $nid;?>/edit?destination=node/<?php echo $nid;?>" class="btn success" style="float:right;">Add a number template</a>
</div>          
<?php } else { ?>
<?php if ($success == 'y') {?>          
<div class="alert-message warning" style="padding:7px; height:80px;">
<h3>Message</h3>
The number was successfully added to the project<br/>
</div>
<?php }  elseif ($success == 'n') {?>
<div class="alert-message error" style="padding:7px; height:80px;">
<h3>Message</h3>
The number is already assigned, please try another<br/>
</div>
<?php } elseif ($success == ' ') {} ?>
          
          
          
<form id="AssignDocs" method="post" action="/numbering-system/confirm">
<!-- our hidden fields give useful information -->
<?php
// Get the seperator from the DB
$sepSqlQuery = "SELECT seperator FROM {number_templates} where ntid=%d";
$sepResult = db_result(db_query($sepSqlQuery, $tid));
?>
   <input type="hidden" name="seperator" value="<?php echo $sepResult;?>" id="seperator"/> &nbsp; &nbsp; 
   <input type="hidden" name="templateID" value="<?php echo $tid;?>"/>
   <input type="hidden" name="nodeID" value="<?php echo $nid;?>"/>    
              
<?php
$sql_title = "SELECT title FROM {number_templates} WHERE ntid=%d";
$title = db_result(db_query($sql_title, $tid));
echo "<h4>Template :&nbsp;&nbsp;" . $title . "</h4>";                  
echo "<h5>Select Number Values</h5><br/>";
// How many elements does this number template have
?>              

   <!-- SECTION A -->
<div style="width:95%; margin:0 auto; height:190px; border: 1px solid silver; background-color:#f4f4f4; padding:20px;">



<?php

//include('/includes/custom/numberingSystem.php');
//Starting over on number template system

// Section A
$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='A'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections' style='margin-left:0;'>";
    echo "<lable><strong>Section A</strong></label><br/><br/>";
    echo "<select name='sectionA'>";
   
    while ($rows = db_fetch_array($result)) {
        
        /*
        echo "<pre>";
        print_r($rows);
        echo "</pre>";
        exit();
      */
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $outcome = db_result(db_query($sql,$eid));
        echo "<option>" . $outcome . "</option>";
    
}
echo "<select>";
echo "</div>";
}




// Section B
$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='B'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections'>";
    echo "<lable><strong>Section B</strong></label><br/><br/>";
    echo "<select name='sectionB'>";
   
    while ($rows = db_fetch_array($result)) {
      
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $outcome = db_result(db_query($sql,$eid));
        echo "<option>" . $outcome . "</option>";
    
}
echo "<select>";
echo "</div>";
}

// Section C

$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='C'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections'>";
    echo "<lable><strong>Section C</strong></label><br/><br/>";
    echo "<select name='sectionC'>";
   
    while ($rows = db_fetch_array($result)) {
      
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $outcome = db_result(db_query($sql,$eid));
        echo "<option>" . $outcome . "</option>";
    
}
echo "<select>";
echo "</div>";
}




//Section D
$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='D'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections'>";
    echo "<lable><strong>Section D</strong></label><br/><br/>";
    echo "<select name='sectionD'>";
   
    while ($rows = db_fetch_array($result)) {
      
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $outcome = db_result(db_query($sql,$eid));
        echo "<option>" . $outcome . "</option>";
    
}
echo "<select>";
echo "</div>";
}


//Section E
$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='E'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections'>";
    echo "<lable><strong>Section E</strong></label><br/><br/>";
    echo "<select name='sectionE'>";
   
    while ($rows = db_fetch_array($result)) {
      
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $outcome = db_result(db_query($sql,$eid));
        echo "<option>" . $outcome . "</option>";
    
}
echo "<select>";
echo "</div>";
}

//Section F

$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='F'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections'>";
    echo "<lable><strong>Section F</strong></label><br/><br/>";
    echo "<select name='sectionF'>";
   
    while ($rows = db_fetch_array($result)) {
      
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $outcome = db_result(db_query($sql,$eid));
        echo "<option>" . $outcome . "</option>";
    
}
echo "<select>";
echo "</div>";
}

//Section G

$sql = "SELECT * FROM {number_templates_elements} WHERE ntid=%d AND title='G'";
$result = db_query($sql, $tid);

if (db_affected_rows($result) > 0) {
    
    echo "<div class='number-templates-sections'>";
    echo "<lable><strong>Section G</strong></label><br/><br/>";
    echo "<select name='sectionG'>";
   
    while ($rows = db_fetch_array($result)) {
      
        $eid = $rows['eid'];
        $sql = "SELECT title FROM {number_templates_elements_values} WHERE eid=%d";
        $outcome = db_result(db_query($sql,$eid));
        echo "<option>" . $outcome . "</option>";
    
}
echo "<select>";
echo "</div>";
}

?>

    
    <div style="clear:both; height:40px;"></div>
  
     
             <label><strong>Example Number:<input type="textfield" id="exampleNumber" style="-webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none;border:none; background:transparent;"/></strong></label>
             <p></p>
            
                  
          <script type="text/javascript">
          
       
          
          
          </script>
          
             <br/><br/>
              
          <label><strong>Doc Numbers Required</strong></label>&nbsp;<input type="text" name="docsRequired"/> &nbsp; &nbsp;
          <label><strong>Number Title (Will default to 'Spare' if left blank)</strong></label>&nbsp;<input type="text" name="docTitle" values="Spare"/> &nbsp; &nbsp;
          
          <input type="submit" value="Assign Doc Numbers" style="float:right;"/>
          </div>
          
            <br/><br/><br/>
          
          <?php
          /*
          
          
          $sql_elements = "SELECT * FROM {number_templates_elements} WHERE ntid=%d";
          $result = db_query($sql_elements, $tid);
          while ($row = db_fetch_array($result)) {
          
          // Get the element values
          $selectName_sql = "SELECT title FROM number_templates_elements_values WHERE eid=%d";
          $selectName_result = db_result(db_query($selectName_sql, $row['eid']));
          ?>
          
          
        
          &nbsp;&nbsp; &nbsp;&nbsp;<label><strong><?php echo $selectName_result;?></strong></label>&nbsp;
          <select name="<?php echo $row['title'];?>">
          <?php 
          // We need some ranges
          $sql_ranges = "SELECT * FROM {number_templates_elements_values} WHERE eid=%d";
          $ranges_result = db_query($sql_ranges, $row['eid']);
          while ($data = db_fetch_array($ranges_result)) {
            $value = $data['value'];
            echo "<option value='$value'>" .$value. "</option>";
          } */
          ?>
          <!--</select>-->
          
              
              
            
            
            
          <?php
          
         // }
          
          
          
          
          
                    ?>
         
          </form>
          <h5>Assign a number manaully</h5>
          
          <br /> 
	
           <div style="width:90%; margin:0 auto; height:100px; border: 1px solid silver; background-color:#f4f4f4; padding:20px;">
          <div style="margin:30px 0 0 0;">
          
          <form id="manul-number-assign" method="post" action="/includes/custom/manualAssign.php">
          <label><strong>Enter Number</strong></label>&nbsp;<input type="text" name="manualNumber" id="manualNumber"/>&nbsp; &nbsp; <label><strong>Number Title (Will default to 'Spare' if left blank)</strong></label>&nbsp;<input type="text" name="manualTitle" id="manualTitle"/>
          <input type="hidden" name="returnUrl" id="returnURl" value="<?php echo $_SERVER['REQUEST_URI'];?>"/>
          <input type="hidden" name="manualPID" id="manualPID" value="<?php echo $nid;?>" />
          
          <input type="submit" value="Assign"/>
          
          </form>
           <?php } ?>

          </div>
          </div>
          <?php //} else {
            
            //echo "<h3>" . There is no numbering template assigned to this project. Assign one <a href="#">here</a> . "<h3>";
            
          //}
          ?>
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
