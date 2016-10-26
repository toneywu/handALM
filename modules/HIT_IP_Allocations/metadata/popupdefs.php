<?php
$popupMeta = array (
    'moduleMain' => 'HIT_IP_Allocations',
    'varName' => 'HIT_IP_Allocations',
    'orderBy' => 'hit_ip_allocations.name',
    'whereClauses' => array (
  'hit_ip_subnets' => 'hit_ip_allocations.hit_ip_subnets',
  'bandwidth_type' => 'hit_ip_allocations.bandwidth_type',
  'cabinet' => 'hit_ip_allocations.cabinet',
  'hat_asset_name' => 'hit_ip_allocations.hat_asset_name',
  'access_assets_name' => 'hit_ip_allocations.access_assets_name',
  'target_owning_org_id' => 'hit_ip_allocations.target_owning_org_id',
),
    'searchInputs' => array (
  4 => 'hit_ip_subnets',
  5 => 'bandwidth_type',
  6 => 'cabinet',
  7 => 'hat_asset_name',
  8 => 'access_assets_name',
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
);
