<?php
// created: 2016-04-02 08:07:27
$subpanel_layout['list_fields'] = array (
  'sr_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SR_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'priority' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PRIORITY',
    'id' => 'HAM_PRIORITY_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Priority',
    'target_record_key' => 'ham_priority_id',
  ),
  'sr_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_SR_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'ham_wo_number' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'link' => true,
    'vname' => 'LBL_WO_NUM',
    'id' => 'HAM_WO_ID',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_WO',
    'target_record_key' => 'ham_wo_id',
  ),
  'ham_wo_status' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'link' => true,
    'vname' => 'LBL_WO_STATUS',
    'id' => 'HAM_WO_ID',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_WO',
    'target_record_key' => 'ham_wo_id',
  ),  
  'date_modified' => 
  array (
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '20%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAM_SR',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_SR',
    'width' => '5%',
    'default' => true,
  ),
);