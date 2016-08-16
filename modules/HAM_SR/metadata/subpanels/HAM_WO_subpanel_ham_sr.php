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
/*  'sr_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_SR_STATUS',
    'width' => '10%',
    'default' => true,
  ),
*/  'reporter' => 
  array (
    'vname' => 'LBL_REPORTER',
    'width' => '15%',
    'default' => true,
  ),
  'reporter_org' => 
  array (
    'vname' => 'LBL_REPORTER_ORG',
    'width' => '20%',
    'default' => true,
  ),
    'reported_date' => 
  array (
    'vname' => 'LBL_REPORTED_DATE',
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