<?php
// created: 2016-08-18 22:49:50
$subpanel_layout['list_fields'] = array (
  'period' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_PERIOD',
    'width' => '10%',
    'default' => true,
  ),
  'type' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'value_changed' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_VALUE_CHANGED',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HFA_FA_Value',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HFA_FA_Value',
    'width' => '5%',
    'default' => true,
  ),
);