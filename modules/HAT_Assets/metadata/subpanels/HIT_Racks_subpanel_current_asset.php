<?php
// created: 2016-04-27 09:35:43
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '15%',
    'default' => true,
  ),
  'asset_desc' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ASSET_DESC',
    'width' => '15%',
    'default' => true,
  ),
  'asset_status' => 
  array (
    'type' => 'enum',
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
  'hat_assets_accounts_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'vname' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'HAT_ASSETS_ACCOUNTSACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'hat_assets_accountsaccounts_ida',
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