<?php
// created: 2016-04-27 12:12:50
$subpanel_layout['list_fields'] = array (
  'rack_pos_top' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_RACK_POS_TOP',
    'width' => '8%',
    'default' => true,
  ),
  'rack_pos_depth' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'vname' => 'LBL_RACK_POS_DEPTH',
    'width' => '8%',
    'default' => true,
  ),
  
    'height' => 
  array (
    'type' => 'int',
    'vname' => 'LBL_HEIGHT',
    'width' => '8%',
    'default' => true,
  ),
  
  'asset' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'hat_assets_id',
  ),
  'asset_desc' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_DESC',
    'id' => 'HAT_ASSETS_ID',
    'link' => false,
    'width' => '15%',
  ),
  'asset_status' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_STATUS',
    'id' => 'HAT_ASSETS_ID',
    'link' => false,
    'width' => '10%',
    'default' => true,
  ),
  'hat_assets_accounts' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ASSET_ACCOUNT',
    'id' => 'HAT_ASSETS_ID',
    'link' => false,
    'width' => '13%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'Accounts',
    'target_record_key' => 'hat_assets_accounts_id',
  ),


  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HIT_Rack_Allocations',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HIT_Rack_Allocations',
    'width' => '5%',
    'default' => true,
  ),
);