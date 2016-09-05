<?php
// created: 2016-08-24 11:24:49
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
    'width' => '15%',
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
    'width' => '7%',
    'default' => true,
  ),
  'date_schedualed_finish' => 
  array (
    'type' => 'datetimecombo',
    'vname' => 'LBL_SCHEDUALED_FINISH_DATE',
    'width' => '7%',
    'default' => true,
  ),
  'work_center' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_WORK_CENTER',
    'id' => 'HAM_WORK_CENTER_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Work_Centers',
    'target_record_key' => 'ham_work_center_id',
  ),
  'work_center_res' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_WORK_CENTER_RES',
    'id' => 'WORK_CENTER_RES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Work_Center_Res',
    'target_record_key' => 'work_center_res_id',
  ),
  'work_center_people' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_HAM_WORK_CENTER_PEOPLE',
    'id' => 'WORK_CENTER_PEOPLE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_Work_Center_People',
    'target_record_key' => 'work_center_people_id',
  ),

  'act_module' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_ACT_MODULE',
    'width' => '15%',
    'default' => false,
    'sortable' => false,
  ),
/*
  'woop_action' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_WOOP_ACTION',
    'width' => '20%',
    'default' => true,
	'sortable' => false,
  ),*/
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