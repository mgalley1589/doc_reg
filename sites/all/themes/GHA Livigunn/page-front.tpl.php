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
    


</head>

<body>



<div id="admin-container">

    <div id="header">
    
    <div id="logo">
          <h1>GHA DOC REG</h1>   </div>
  <!-- END LOGO -->
        <div id="panel">
          <p>For the demo, just hit the login button.<a href="modal_page.html" rel="facebox"></a></p>
      </div> <!-- END PANEL -->
   
    </div><!-- END HEADER -->
    
    <div id="navigation">
    
    <ul class="tabNavigation">
        
        <li>
       		<a href="index.html" title="Users" class="active"><img src="images/icons/user_32.png" alt="Home" width="32" height="32" /><span class="tabNavigation_navitem">Login</span></a>            </li>
        
<li>
       	  <a href="demo.html" title="Users" class="tabNavigation_navitem"><img src="images/icons/info_button_32.png" alt="Manage Content" width="32" height="32" /> Help </a></li>
       
               
    </ul>
    
    </div> <!-- END NAVIGATION -->
    
    <div id="admin-content">
    	<form action="index1.html" method="get">
		<p><label>Username</label>
	      <input name="username" type="text" class="input large" value="username" />
	  </p>
		
	  <p><label>Password</label>
		<input name="password" type="password" class="input large" value="password" />
	  </p>
	  
	  <p><input type="submit" name="Submit" id="button" value="Login"  class="button"/>
		<input type="reset" name="reset" id="reset" value="Reset" class="button" />
	  </p>

	</form>

  </div><!-- END CONTEMT -->

</div><!-- END CONTAINER -->
</body>
</html>
