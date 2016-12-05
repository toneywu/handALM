<?php
// created: 2016-12-05 10:22:26
$subpanel_layout['list_fields'] = array (
  'activity_op_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ACTIVITY_OP_NUMBER',
    'width' => '5%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'standard_hour' => 
  array (
    'type' => 'decimal',
    'vname' => 'LBL_STANDARD_HOUR',
    'width' => '7%',
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
  'ham_work_center_res_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_HAM_WORK_CENTER_RES_NAME',
    'id' => 'WORK_CENTER_RES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Work_Center_Res',
    'target_record_key' => 'work_center_res_id',
  ),
  'contact' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_CONTACT',
    'id' => 'CONTACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contact_id',
  ),
  'act_module' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_ACT_MODULE',
    'width' => '10%',
    'default' => true,
  ),
  'event_type' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_EVENT_TYPE',
    'id' => 'HAT_EVENTTYPE_ID',
    'link' => true,
    'width' => '13%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_EventType',
    'target_record_key' => 'hat_eventtype_id',
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