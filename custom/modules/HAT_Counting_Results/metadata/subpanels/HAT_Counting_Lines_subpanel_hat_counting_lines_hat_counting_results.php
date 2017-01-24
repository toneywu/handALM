<?php
// created: 2017-01-20 14:44:53
$subpanel_layout['list_fields'] = array (
  'cycle_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CYCLE_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'counting_result' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_RESULT',
    'width' => '10%',
  ),
  'adjust_needed' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ADJUST_NEEDED',
    'width' => '10%',
  ),
  'count_diff_type' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_COUNT_DIFF_TYPE',
    'width' => '10%',
  ),
  'adjust_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ADJUST_STATUS',
    'width' => '10%',
  ),
  'adjust_method' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ADJUST_METHOD',
    'width' => '10%',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Counting_Results',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Results',
    'width' => '5%',
    'default' => true,
  ),
);