<?php
// created: 2016-04-01 21:38:20
$subpanel_layout['HAT_Counting_Tasks'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'counting_task_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_TASK_STATUS',
    'width' => '10%',
    'default' => true,
  ),
    'counting_batch_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_BATCH_NAME',
    'id' => 'hat_asset_counting_batch_id',
    'link' => true,
    'width' => '20%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Counting_Batchs',
    'target_record_key' => 'hat_asset_counting_batch_id',
  ),
  'counting_person' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_PERSON',
    'id' => 'counting_person_id',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'counting_person_id',
  ),
    'organization' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ORGANIZATION',
    'id' => 'account_id_c',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c',
  ),
      'manager_org' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_MANAGER_ORG',
    'id' => 'account_id_m',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_m',
  ),
  'date_modified' => 
  array (
    'type' => 'datetime',
    'vname' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAM_WO',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_WO',
    'width' => '5%',
    'default' => true,
  ),
);