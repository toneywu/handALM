<?php
// created: 2016-07-16 20:10:59
$subpanel_layout['list_fields'] = array (
  'activity_op_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ACTIVITY_OP_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'description' => 
  array (
    'type' => 'text',
    'vname' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'activity_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_ACTIVITY_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'sr_work_center_rule' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'SR_SR_WORK_CENTER_RULE',
    'id' => 'SR_WORK_CENTER_RULE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Work_Centers',
    'target_record_key' => 'sr_work_center_rule_id',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAM_ACT_OP',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_ACT_OP',
    'width' => '5%',
    'default' => true,
  ),
);