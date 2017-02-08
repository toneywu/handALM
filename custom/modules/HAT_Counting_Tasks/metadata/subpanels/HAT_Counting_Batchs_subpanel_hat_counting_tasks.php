<?php
// created: 2017-02-08 09:38:48
$subpanel_layout['list_fields'] = array (
  'task_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_TASK_NUMBER',
    'width' => '7%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '9%',
    'default' => true,
  ),
  'counting_task_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_TASK_STATUS',
    'width' => '7%',
    'default' => true,
  ),
  'total_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_TOTAL_COUNTING',
    'width' => '7%',
    'default' => true,
  ),
  'actual_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_ACTUAL_COUNTING',
    'width' => '7%',
    'default' => true,
  ),
  'un_actual_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_UN_ACTUAL_COUNTING',
    'width' => '7%',
    'default' => true,
  ),
  'amt_actual_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_AMT_ACTUAL_COUNTING',
    'width' => '7%',
    'default' => true,
  ),
  'diff_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_DIFF_COUNTING',
    'width' => '7%',
    'default' => true,
  ),
  'profit_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_PROFIT_COUNTING',
    'width' => '7%',
    'default' => true,
  ),
  'loss_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_LOSS_COUNTING',
    'width' => '7%',
    'default' => true,
  ),
  'actual_adjust_count' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_ACTUAL_ADJUST_COUNT',
    'width' => '7%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Counting_Tasks',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Tasks',
    'width' => '5%',
    'default' => true,
  ),
);