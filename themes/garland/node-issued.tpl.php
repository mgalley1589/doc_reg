<?php
// $Id: node.tpl.php,v 1.5 2007/10/11 09:51:29 goba Exp $

?>

<?php
if (arg(0) == 'node' && is_numeric(arg(1))) $pid = arg(1);
?>

<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?>">
<a href="/node/<?php echo $nid;?>/edit" class="customBTN" style="float:right; margin-top:-70px;">Edit Document</a>

  <div class="content clear-block">
    
        <table border="0" bordercolor="" style="background-color:#ffffff; margin:10px 0 0 -5px;" width="750" cellpadding="0" cellspacing="0">
  <tr>
    <td><span class="project-label">Document Number</span><br/></td>
    <td><span class="project-label">Document Title</span><br/></td>
    <td><span class="project-label">Status</span><br/></td>
    <td><span class="project-label">Project</span><br/></td>
    
  </tr>
  <tr>
    <td><?php print $node->field_issued_doc_no[0]['view'];?></td>
    <td><?php print $node->title?></td>
    <td><?php print $node->field_issued_status[0]['view'];?></td>
    <td><?php print $node->field_issued_project_id[0]['view'];?></td>
    
  </tr>
</table>

    
  <p>&nbsp;</p>
  <p>&nbsp;</p>
   
   <h2>Document Revisions</h2><br/>
   <div class="usual">
   
   
   <ul class="idTabs"> 
  <li><a href="#all-issued-docs" style="display:none"></a></li> 
  <li style="float:right;"><a href="/export">Export to CSV</a></li>
</ul> 
<div id="all-issued-docs"> 

   <table class='views-table cols-7'>
    <thead>
    <tr>
      <th class='views-field'>
        Document No
      </th>
      <th class='views-field'>
        Document Title
      </th>
      <th class='views-field'>
        Revision    
      </th>
      <th class='views-field'>
        Revision Date
      </th>
       <th class='views-field'>
        Issue Form
      </th>
     </tr>
  </thead>
  <tbody>

  <?php 

  // This is test of pulling all the revisions from the database

if (arg(0) == 'node' && is_numeric(arg(1))) $nid = arg(1);

  $sql = "SELECT * FROM content_field_issued_revision WHERE nid=%d ORDER BY timestamp ASC";
  $result = db_query($sql, $nid);
  while ($row = db_fetch_array($result)) {?>

  <tr class='odd views-row-first'>  
    <td class='views-field'>
    <?php print $node->field_issued_doc_no[0]['view'];?>
    </td>
    <td class='views-field'>
      <?php print $node->title;?>
    </td>
    <td class='views-field'>
      <?php // show the revision
       echo $row['field_issued_revision_value'];
       ?>

    </td>
    <td class='views-field'>
     <?php echo $row['Date'];?>
    </td>
    <td class='views-field'>
      <?php echo "<a href='/issue-form-view/?id=$row[ifid]' target='_blank'>View Form</a>";?>
    </td>
</tr>
  <?php } ?>

</tbody>
</table>




 
</div> 

   </div>
   
   
    <?php echo $template_id ;?>
    
  </div>

  <div class="clear-block">
    <div class="meta">
    <?php if ($taxonomy): ?>
      <div class="terms"><?php print $terms ?></div>
    <?php endif;?>
    </div>

    <?php if ($links): ?>
      <div class="links"><?php print $links; ?></div>
    <?php endif; ?>
  </div>

</div>