<?php
// created: 2016-07-18 19:11:43
$subpanel_layout['list_fields'] = array (
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
  'people' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_PEROPLE',
    'id' => 'CONTACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Contacts',
    'target_record_key' => 'contact_id',
  ),
  'user_name' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_USER_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'organization_name' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'vname' => 'LBL_ORGANIZATION_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAM_Work_Center_People',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAM_Work_Center_People',
    'width' => '5%',
    'default' => true,
  ),
);