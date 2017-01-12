<?php
// created: 2017-01-09 11:02:57
$subpanel_layout['list_fields'] = array (
  'hit_ip_subnets' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_HIT_IP',
    'id' => 'HIT_IP_SUBNETS_ID',
    'link' => true,
    'width' => '15%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HIT_IP_Subnets',
    'target_record_key' => 'hit_ip_subnets_id',
  ),
  'associated_ip' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_ASSOCIATED_IP',
    'width' => '15%',
    'default' => true,
  ),
  'hat_asset_name' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_HAT_ASSET_NAME',
    'width' => '15%',
    'default' => true,
  ),
  'access_assets_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_ACCESS_ASSETS_NAME',
    'id' => 'ACCESS_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'access_assets_id',
  ),
  'port' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_PORT',
    'width' => '15%',
    'default' => true,
  ),
  'speed_limit' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SPEED_LIMIT',
    'width' => '10%',
    'default' => true,
  ),
  'broadband_type' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_BROADBAND_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'bandwidth_type' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_BANDWIDTH_TYPE',
    'width' => '10%',
    'default' => true,
  ),
);