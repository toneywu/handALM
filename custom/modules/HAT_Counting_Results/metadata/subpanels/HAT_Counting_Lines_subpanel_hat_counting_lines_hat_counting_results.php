<?php
// created: 2016-12-24 20:50:40
$subpanel_layout['list_fields'] = array (
  'cycle_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_CYCLE_NUMBER',
    'width' => '8%',
    'default' => true,
  ),
  'actual_oranization' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ACTUAL_ORANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c',
  ),
  'actual_location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ACTUAL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_id_c',
  ),
  'actual_asset_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ACTUAL_ASSET_STATUS',
    'width' => '8%',
  ),
  'org_diff_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ORG_DIFF_FLAG',
    'width' => '8%',
  ),
  'loct_diff_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_LOCT_DIFF_FLAG',
    'width' => '8%',
  ),
  'status_diff_flag' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_STATUS_DIFF_FLAG',
    'width' => '8%',
  ),
  'counting_result' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_RESULT',
    'width' => '8%',
  ),
  'adjust_needed' => 
  array (
    'type' => 'bool',
    'default' => true,
    'vname' => 'LBL_ADJUST_NEEDED',
    'width' => '8%',
  ),
  'adjust_method' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ADJUST_METHOD',
    'width' => '8%',
  ),
  'adjust_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ADJUST_STATUS',
    'width' => '8%',
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Counting_Results',
    'width' => '5%',
    'default' => true,
  ),
);