<?php
// $Id$

/**
 * @file
 * Module Image Caption Taxonomy Field - Widget settings include file
 * Copyright 2009 Jennifer Hodgdon, Poplar ProductivityWare LLC
 * 
 * Licensed under the GNU Public License
 */

/**
 * Process callback for widget
 *
 * Returns a Forms API array that defines the widget's editing form.
 * Note that FileField and ImageField have already done their parts at this
 * point.
 */
function img_cap_tax_fld_widget_process($element, $edit, &$form_state, $form) {
  // add processing for caption and taxonomy field

  $defaults = $element['#value']['data'];
  // for some reason, sometimes this is not unserialized, not sure why
  if( !is_array( $defaults )) {
    $defaults = unserialize( $defaults );
  }

  $field = content_fields($element['#field_name'], $element['#type_name']);

  $element['data']['caption'] = array( 
    '#title' => t( 'Caption' ),
    '#type' => 'textarea',
    '#rows' => $field['widget']['rows'],
    '#cols' => $field['widget']['cols'],
    '#default_value' => $defaults['caption'],
    '#weight' => 4,
  );

  // Input Filter choice for caption
  if (!empty($field['text_processing'])) {
    $filt = isset( $defaults['format'] ) ? $defaults['format'] : FILTER_FORMAT_DEFAULT;
    $par = $element['#parents'];
    $par[] = 'data';
    $par[] = 'format';
    $element['data']['format'] = filter_form( $filt, 1, $par );
    $element['data']['format']['#weight'] = 5;
  }

  $mult = $field['allow_multiple'];
  $req = $field['required_term'];
  $opts = content_taxonomy_allowed_values( $field );
  if( !$req && !$mult ) {
    $none = theme( 'content_taxonomy_options_widgets_none', $field );
    $opts = array( '' => $none ) + $opts;
  }
  $element['data']['value'] = array( 
    '#title' => t( 'Taxonomy Terms' ),
    '#type' => 'select',
    '#default_value' => $defaults['value'],
    '#options' => $opts,
    '#weight' => 6,
  );
  if( $mult ) {
    $element['data']['value']['#multiple'] = TRUE;
  }

  return $element;
}

/**
 * The #element_validate callback for the widget. 
 *
 * The validation just checks to see that the file in the 'fid' submission
 * exists.
 */
function img_cap_tax_fld_widget_validate(&$element, &$form_state) {
  
  if (empty($element['fid']['#value'])) {
    // nothing submitted, so no problems here!
    return;
  }

  $field = content_fields($element['#field_name'], $element['#type_name']);
  $ftitle = $field['widget']['label'];

  // attempt to load the file information
  if ( !( $file = field_file_load($element['fid']['#value']))) {
    form_error($element, t('The file referenced by the %field field does not exist.', array('%field' => $ftitle )));
  }
}

/**
 * Settings callback for widget_settings with the 'form' operation.
 *
 * Returns the widget settings form for the widget.
 */
function img_cap_tax_fld_widget_settings_form( $widget ) {
  // Get the ImageField settings
  $form = imagefield_widget_settings_form( $widget );
  // make alt/title always custom, with no defaults
  $form['custom_alt'] = $form['alt_settings']['custom_alt'];
  $form['custom_alt']['#type'] = 'hidden';
  $form['custom_alt']['#value'] = 1;
  $form['alt'] = $form['alt_settings']['alt'];
  $form['alt']['#type'] = 'hidden';
  $form['alt']['#value'] = '';
  unset( $form['alt']['#suffix'] );
  unset( $form['alt_settings'] );

  $form['custom_title'] = $form['title_settings']['custom_title'];
  $form['custom_title']['#type'] = 'hidden';
  $form['custom_title']['#value'] = 1;
  $form['title'] = $form['title_settings']['title'];
  $form['title']['#type'] = 'hidden';
  $form['title']['#value'] = '';
  unset( $form['title']['#suffix'] );
  unset( $form['title_settings'] );

  // add setting for height/width of caption field 

  $rows = (isset($widget['rows']) && is_numeric($widget['rows'])) ? $widget['rows'] : 5;

  $form['rows'] = array(
    '#type' => 'textfield',
    '#title' => t('Number of rows in caption field'),
    '#default_value' => $rows,
    '#element_validate' => array('_text_widget_settings_row_validate'),
    '#required' => TRUE,
    '#weight' => 8,
  );

  $cols = (isset($widget['cols']) && is_numeric($widget['cols'])) ? $widget['cols'] : 40;

  $form['cols'] = array(
    '#type' => 'textfield',
    '#title' => t('Number of columns in caption field'),
    '#default_value' => $cols,
    '#element_validate' => array('_text_widget_settings_row_validate'),
    '#required' => TRUE,
    '#weight' => 9,
  );

  // Add settings for taxonomy field

  $form2 = content_taxonomy_options_widget_settings( 'form', $widget );
  // change the title of fieldset so it makes sense for our compound field
  $form2['settings']['#title'] = t( 'Settings for Taxonomy' );

  $form = $form + $form2;
  return $form;
}

// We don't need widget_settings_validate -- FileField will handle this

/**
 * Settings callback for filefield_widget_settings with the 'save' operation.
 *
 * Returns the list of fields to save from the widget settings form, 
 * aside from what FileField takes care of.
 */
function img_cap_tax_fld_widget_settings_save( $widget ) {
  $arr = imagefield_widget_settings_save( $widget );
  $arr[] = 'rows';
  $arr[] = 'cols';
  $arr2 = content_taxonomy_options_widget_settings( 'save', $widget );
  $arr2[] = 'allow_multiple';
  $arr2[] = 'required_term';
  return array_merge( $arr, $arr2 );
}
