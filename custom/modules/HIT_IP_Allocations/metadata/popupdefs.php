<?php
$popupMeta = array (
    'moduleMain' => 'HIT_IP_Allocations',
    'varName' => 'HIT_IP_Allocations',
    'orderBy' => 'hit_ip_allocations.name',
    'whereClauses' => array (
  'hit_ip_subnets' => 'hit_ip_allocations.hit_ip_subnets',
  'bandwidth_type' => 'hit_ip_allocations.bandwidth_type',
  'cabinet' => 'hit_ip_allocations.cabinet',
  'target_owning_org_id' => 'hit_ip_allocations.target_owning_org_id',
),
    'searchInputs' => array (
  4 => 'hit_ip_subnets',
  5 => 'bandwidth_type',
  6 => 'cabinet',
  9 => 'target_owning_org_id',
),
    'searchdefs' => array (
  'hit_ip_subnets' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HIT_IP',
    'id' => 'HIT_IP_SUBNETS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'hit_ip_subnets',
  ),
  'bandwidth_type' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BANDWIDTH_TYPE',
    'width' => '10%',
    'name' => 'bandwidth_type',
  ),
  'cabinet' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CABINET',
    'id' => 'HAT_ASSETS_CABINET_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'cabinet',
  ),
  'hat_asset_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HAT_ASSET_NAME',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'hat_asset_name',
  ),
  'access_assets_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ACCESS_ASSETS_NAME',
    'id' => 'ACCESS_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'name' => 'access_assets_name',
  ),
  'target_owning_org_id' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => '',
    'width' => '10%',
    'name' => 'target_owning_org_id',
  ),
),
    'listviewdefs' => array (
  'HIT_IP_SUBNETS' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HIT_IP',
    'id' => 'HIT_IP_SUBNETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'hit_ip_subnets',
  ),
  'BANDWIDTH_TYPE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BANDWIDTH_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'bandwidth_type',
  ),
  'ACCESS_ASSETS_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ACCESS_ASSETS_NAME',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'access_assets_name',
  ),
  'HAT_ASSET_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HAT_ASSET_NAME',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'hat_asset_name',
  ),
  'PORT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_PORT',
    'width' => '10%',
    'default' => true,
    'name' => 'port',
  ),
  'SPEED_LIMIT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SPEED_LIMIT',
    'width' => '10%',
    'default' => true,
    'name' => 'speed_limit',
  ),
  'BROADBAND_TYPE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BROADBAND_TYPE',
    'width' => '10%',
    'default' => true,
    'name' => 'broadband_type',
  ),
),
);
