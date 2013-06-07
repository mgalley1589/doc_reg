 <?php 
	 
	 //Dynamically highlights current page
  $pageurl =  url($_GET['q']);
  
  if ($pageurl == '/dashboard')
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

   <style type="text/css">
ul.main-contextual-links li a.<?php echo $current; ?> {
display:inline; background-color:#e5e5e5; padding:5px 7px; color:green; text-decoratione:none;
}
</style>

   
	<script type="text/javascript" src="/themes/garland/js/jquery.tablesorter.js">
	<script type="text/javascript">
	$(document).ready(function() 
    { 
        $(".views-table").tablesorter(); 
		 $(".reports").tablesorter(); 
    } 
); 
	</script>
    <ul class="main-contextual-links">
      
      <li><a href="/dashboard" class="one">Dashboard</a></li>
	  <?php 
	  // last viewed project.
	  $sql = "SELECT project_id FROM {last_viewd_project} WHERE user_id=%d";
	  $result = db_result(db_query($sql, $user->uid));
	  if (db_affected_rows() > 0) { 
	  // get the url and print the link
	  $src = "node/".$result;
	  $sql = "SELECT dst FROM {url_alias} WHERE src='%s'";
	  $dst = db_result(db_query($sql, $src));
	  print "<li class='active'><a href='/$dst'>Active Project</a></li>";
	  } else {
	  // do nothing 
	  }
	 ?> 
     <li><a href="/reporting" class="five">Reports</a></li>
      <?php if ($user->uid == 1) { ?>
      <li><a href="/doc_controller" class="seven">Doc Controller</a></li>
      <li><a href="/admin" class="six">Admin</a></li>
      <?php }  ?>
    </ul>