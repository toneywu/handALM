<?php
// created: 2016-09-10 21:22:42
$subpanel_layout['list_fields'] = array (
  'hit_ip_subnets' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_HIT_IP',
    'id' => 'HIT_IP_SUBNETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HIT_IP_Subnets',
    'target_record_key' => 'hit_ip_subnets_id',
  ),
  'mask' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_MASK',
    'width' => '10%',
    'default' => true,
  ),
  'gateway' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_GATEWAY',
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
  'port' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_PORT',
    'width' => '10%',
    'default' => true,
  ),
  'speed_limit' => 
  array (
    'type' => 'varchar',
    'vname' => 'LBL_SPEED_LIMIT',
    'width' => '10%',
    'default' => true,
  ),
  'hat_asset_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'vname' => 'LBL_HAT_ASSET_NAME',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'widget_class' => 'SubPanelDetailViewLink',
    'target_module' => 'HAT_Assets',
    'target_record_key' => 'hat_assets_id',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'HIT_IP_TRANS',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'HIT_IP_TRANS',
    'width' => '5%',
    'default' => true,
  ),
);