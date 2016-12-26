<?php
// created: 2016-12-24 16:14:57
$subpanel_layout['list_fields'] = array (
  'task_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_TASK_NUMBER',
    'width' => '8%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '12%',
    'default' => true,
  ),
  'counting_person' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_PERSON',
    'id' => 'CONTACTS_ID_C',
    'link' => true,
    'width' => '8%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contacts_id_c',
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
    'width' => '8%',
    'default' => true,
  ),
  'actual_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_ACTUAL_COUNTING',
    'width' => '8%',
    'default' => true,
  ),
  'amt_actual_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_AMT_ACTUAL_COUNTING',
    'width' => '8%',
    'default' => true,
  ),
  'diff_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_DIFF_COUNTING',
    'width' => '8%',
    'default' => true,
  ),
  'profit_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_PROFIT_COUNTING',
    'width' => '8%',
    'default' => true,
  ),
  'loss_counting' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_LOSS_COUNTING',
    'width' => '8%',
    'default' => true,
  ),
  'actual_adjust_count' => 
  array (
    'type' => 'int',
    'studio' => 'visible',
    'vname' => 'LBL_ACTUAL_ADJUST_COUNT',
    'width' => '10%',
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
);