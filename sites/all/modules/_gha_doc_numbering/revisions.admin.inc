<?php
// $Id$

/**
 * @file
 * Administration page callbacks for the GHA Revision module
 */

/**
 * Describes and builds the form to Drupal.
 *
 * @ingroup forms
 * @see system_settings_form().
 */

function revisions_admin_settings() {
    // Get an array of node types with internal names as keys an
    // "Friendly names" as values. E.G.,
    // array('page' => 'Page', 'story' => 'Story')
    $options = node_get_types('names');

    $form['revisions_node_types'] = array(
      '#type' => 'checkboxes',
      '#title' => t('Revisions may be added to these content types'),
      '#options' => $options,
      '#default_value' => variable_get('revisions_node_types', array('page')),
      '#description' => t('Revisions will be available on these content types'),
    );

    return system_settings_form($form);
}


/**
 * Implementation of Drupals hook_nodeapi().
 */
function revisions_nodeapi(&$node, $op, $teaser, $page) {
  global $user;
  switch($op) {
    //Node is about to be displayed
    case 'view':
    // Aborts operation if the user is anon or
    // if the node is not being displayed on a page by itself
     if($user->uid == 0 || !$page) {
       break;
     }
    // Find out which nodes the module can add revisions to.
     $types_to_revise = variable_get('revisions_nodetypes', array('page'));

    // Abort if this node is not one of the types we can add revisions to
     if (!in_array($node->type, $types_to_revise)) {
         break;
     }

     // Add form as a content item
     $node->content['revisions_form'] = array(
        '#value' => drupal_get_form('revisions_entry_form', $node),
        '#weight' => 1
       );
     break;
  }
}