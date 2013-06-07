<?php
// $Id$

/**
 * @file
 * Module Image Caption Taxonomy Field - Field settings include file
 * Copyright 2009 Jennifer Hodgdon, Poplar ProductivityWare LLC
 * 
 * Licensed under the GNU Public License
 */

/** 
 * Implements the "form" operation for CCK's hook_field_settings,
 * minus what FileField does for us.
 *
 * Combines filefield field settings form with a Content Taxonomy
 * field settings form (or most of it).
 *
 * See also function img_cap_tax_fld_img_cap_tax_field_settings_save() below.
 */
function img_cap_tax_fld_field_settings_form( $field ) {
  // Grab normal settings form from FileField
  $form1 = filefield_field_settings( 'form', $field );

  // Grab Content Taxonomy settings form and modify it...
  $form2 = content_taxonomy_field_settings( 'form', $field );
  // Turn off the ability to save the taxonomy terms to the node as a whole --
  // doesn't make sense here, because they apply to the image --
  // but we need the field to be defined
  $form2['save_term_node']['#type'] = 'hidden';
  // Add setting for single/multiple-valued taxonomy selection
  // and required/optional
  // and put this into a fieldset with the Vocabulary field
  $form2['taxonomy_group'] = array(
    '#type' => 'fieldset',
    '#title' => 'Taxonomy',
    '#collapsible' => 0,
  );
  $form2['taxonomy_group']['vid'] = $form2['vid'];
  unset( $form2['vid'] );
  $form2['taxonomy_group']['allow_multiple'] = array( 
    '#type' => 'checkbox', 
    '#title' => t('Allow multiple taxonomy terms'),
    '#default_value' => is_numeric($field['allow_multiple']) ? $field['allow_multiple'] : 0,
    '#description' => t('If this option is checked, the user can select multiple taxonomy terms for each image; otherwise, at most one.'),
  );
  $form2['taxonomy_group']['required_term'] = array( 
    '#type' => 'checkbox', 
    '#title' => t('Taxonomy required'),
    '#default_value' => is_numeric($field['required_term']) ? $field['required_term'] : 0,
    '#description' => t('If this option is checked, the user must select at least one taxonomy term for each image; otherwise, it is optional.'),
  );
  $form2['hierarchical_vocabulary']['#weight'] = 100;

  // Create setting for plain text vs. filtered
  $form3 = array( 'text_processing' => array( 
    '#type' => 'radios',
    '#title' => t('Text processing for Caption'),
    '#default_value' => is_numeric($field['text_processing']) ? $field['text_processing'] : 0,
    '#options' => array( 0 => t('Plain text'), 1 => t('Filtered text (user selects input format)')),
  ));

  return $form1 + $form3 + $form2;
}

// Validate function omitted - we don't need it, as FileField will
// take care of the file portion

/** 
 * Implements the "save" operation for CCK's hook_field_settings,
 * minus what FileField does for us.
 *
 * See function img_cap_tax_fld_img_cap_tax_field_settings_form() above for
 * notes.
 */
function img_cap_tax_fld_field_settings_save( $field ) {
  $flds1 = filefield_field_settings( 'save', $field );
  $flds2 = content_taxonomy_field_settings( 'save', $field );
  $flds2[] = 'allow_multiple';
  $flds2[] = 'required_term';
  $flds3 = array( 'text_processing' );

  return array_merge( $flds1, $flds2, $flds3 );
}

// Database columns operation omitted -- just use the 'data' field from
// the FileField module

/**
 * Implements the "sanitize" operation for CCK hook_field().
 *
 * Sanitizes the caption, according to the input format.
 * FileField takes care of all field operations for the file portion of
 * the field.
 */
function img_cap_tax_fld_field_sanitize($node, $field, &$items, $teaser, $page) {
  $isplain = empty( $field['text_processing'] );
  $check_access = is_null( $node ) || 
    ( isset($node->build_mode) && $node->build_mode == NODE_BUILD_PREVIEW );

  foreach( $items as $delta => $item ) {
    $dat = $item['data'];
    // for some reason, this is not always unserialized
    if( !is_array( $dat )) {
      $dat = unserialize( $dat );
    }
    $text = isset( $dat['caption'] ) ? $dat['caption'] : '';
    if( $isplain ) {
      $text = check_plain( $text );
    } else {
      $text = check_markup( $text, $item['format'], $check_access );
    }
    // save result for theming
    $items[$delta]['safe_caption'] = $text;
  }
}

