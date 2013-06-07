<?php

 
 
 /** 
 * Move forms into fieldsets
 */
 
 // Main Forms
 
 $form['title'] = array(
 	'#type' => 'textstring',
 	'#title' => t('Document Title'),
 	'#prefix' => '<div id="issued-fieldset" class="issued-form">',
    '#suffix' => '</div>',
    '#collapsible' => false,
    '#collapsed' => false);
    
    
 $form['field_issued_project_id'] = array(
 	'#theme' => 'content_multiple_values',
 	'#title' => t('Project Stuff'));

 
 $form['field_issued_date'] = array(
 	'#theme' => 'content_multiple_values',
 	'#title' => t('Original Issue Date'));
 	
 	
 
 $form['field_issued_doc_revision'] = array(
 	'#theme' => 'content_multiple_values',
 	'#title' => t('Document Title'),
 	'#prefix' => '<div id="issued-revision" class="issued-form">',
    '#suffix' => '</div>',
    '#collapsible' => false,
    '#collapsed' => false);


 
 $form['field_issued_doc_revision_date'] = array(
 	'#theme' => 'content_multiple_values',
 	'#title' => t('Document Title'),
 	'#prefix' => '<div id="issued-revision" class="issued-form">',
    '#suffix' => '</div>',
    '#collapsible' => false,
    '#collapsed' => false);
    
    
    
             
    
    
    // Unset lots of stuff we don't want to display
unset($form['revision_information']);
unset($form['comment_settings']);
unset($form['menu']);
unset($form['created']);
//unset($form['author']);
//unset($form['options']);
unset($form['attachments']);
unset($form['path']);
unset($form['buttons']['preview']); // preview button


// Render all form arrays     
     print drupal_render($form);
     print drupal_render($form['field_issued_project_id']);
     print drupal_render($form['field_issued_date']);
     print drupal_render($form['field_issued_doc_revision']);
     print drupal_render($form['field_issued_doc_revision_date']);
    
        
// Render Form
	
    
    