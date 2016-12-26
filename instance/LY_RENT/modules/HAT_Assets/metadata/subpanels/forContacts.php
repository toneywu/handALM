<?php
// created: 2016-10-19 10:22:12
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
/*  'asset_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ASSET_NUMBER',
    'width' => '15%',
    'default' => true,
  ),
*/  'asset_name' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ASSET_DESC',
    'width' => '10%',
    'default' => true,
  ),
  'brand' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_BRAND',
    'width' => '15%',
    'default' => true,
  ),
/*  'serial_number' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SERIAL_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
*/  'asset_status_taged' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_STATUS',
    'width' => '10%',
  ),
  
  'hat_asset_locations_hat_assets_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Asset_Locations',
    'target_record_key' => 'hat_asset_locations_hat_assetshat_asset_locations_ida',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HAT_Assets',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HAT_Assets',
    'width' => '5%',
    'default' => true,
  ),
);