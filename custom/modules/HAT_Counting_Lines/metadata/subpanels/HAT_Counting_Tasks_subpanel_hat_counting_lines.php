<?php
// created: 2016-12-24 19:46:51
$subpanel_layout['list_fields'] = array (
  'asset' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'hat_assets_id_c',
  ),
  /*'asset_desc' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_DESC',
    'width' => '10%',
  ),
  'oranization' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ORANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'account_id_c',
  ),
  'asset_location' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_id_c',
  ),
  'asset_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'asset_major' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_MAJOR',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAA_Codes',
    'target_record_key' => 'haa_codes_id_c',
  ),
  'counting_status' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_COUNTING_STATUS',
    'width' => '10%',
    'default' => true,
  ),*/
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Counting_Lines',
    'width' => '4%',
    'default' => true,
  ),
);