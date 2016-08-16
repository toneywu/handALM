<?php
// created: 2016-04-07 21:41:33
$subpanel_layout['list_fields'] = array (
  'woop_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_WOOP_NUMBER',
    'width' => '7%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '25%',
    'default' => true,
  ),
  'woop_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_WOOP_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'date_schedualed_start' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_SCHEDUALED_START_DATE',
    'width' => '13%',
    'default' => true,
  ),
  'date_schedualed_finish' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_SCHEDUALED_FINISH_DATE',
    'width' => '13%',
    'default' => true,
  ),
  'work_center' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_WORK_CENTER',
    'id' => 'HAM_WORK_CENTER_ID',
    'link' => true,
    'width' => '15%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Work_Centers',
    'target_record_key' => 'ham_work_center_id',
  ),
  'owner' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_OWNER',
    'id' => 'CONTACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contact_id',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAM_WOOP',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_WOOP',
    'width' => '5%',
    'default' => true,
  ),
);