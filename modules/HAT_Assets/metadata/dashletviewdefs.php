<?php
$dashletData['HAT_AssetsDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'type' => 'assigned_user_name',
    'default' => 'Administrator',
  ),
);
$dashletData['HAT_AssetsDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'asset_desc' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_DESC',
    'width' => '10%',
    'default' => true,
  ),
  'asset_status' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_STATUS',
    'width' => '10%',
  ),
  'hat_asset_locations_hat_assets_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_HAT_ASSET_LOCATIONS_HAT_ASSETS_FROM_HAT_ASSET_LOCATIONS_TITLE',
    'id' => 'HAT_ASSET_LOCATIONS_HAT_ASSETSHAT_ASSET_LOCATIONS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
    'name' => 'date_entered',
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'asset_criticality' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_CRITICALITY',
    'width' => '10%',
    'default' => false,
  ),
);
