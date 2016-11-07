<?php
// created: 2016-11-07 17:15:00
$subpanel_layout['list_fields'] = array (
  'ham_act_id_rule' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'HAM_ACT_ID_RULE',
    'id' => 'ACTIVITY',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAM_ACT',
    'target_record_key' => 'activity',
  ),
  'wo_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_WO_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '20%',
    'default' => true,
  ),
  'contract' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_CONTRACT',
    'id' => 'CONTRACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'AOS_Contracts',
    'target_record_key' => 'contract_id',
  ),
  'location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '20%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_id',
  ),
  'wo_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_WO_STATUS',
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