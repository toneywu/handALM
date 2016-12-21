<?php
// created: 2016-12-19 20:25:24
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'vname' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => NULL,
    'target_record_key' => NULL,
  ),
  'task_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_TASK_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
'task_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_TASK_STATUS',
    'width' => '10%',
  ),
  'total_counting' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_TOTAL_COUNTING',
    'width' => '10%',
    'default' => true,
  ),
  'actual_counting' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_ACTUAL_COUNTING',
    'width' => '10%',
    'default' => true,
  ),
  'diff_counting' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_DIFF_COUNTING',
    'width' => '10%',
    'default' => true,
  ),
  'actual_adjust' => 
  array (
    'type' => 'bool',
    'vname' => 'LBL_ACTUAL_ADJUST',
    'width' => '10%',
    'default' => true,
  ),
    'adjust_posted' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ADJUST_POSTED',
    'width' => '10%',
  ),
  'hand_add_flag' => 
  array (
    'type' => 'bool',
    'vname' => 'LBL_HAND_ADD_FLAG',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button'=>array(
     'widget_class' => 'SubPanelEditButton',
     'module' => $module_name,
     'width' => '4%',
   ),
);