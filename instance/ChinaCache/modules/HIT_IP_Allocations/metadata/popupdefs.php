<?php
$popupMeta = array (
    'moduleMain' => 'HIT_IP_Allocations',
    'varName' => 'HIT_IP_Allocations',
    'orderBy' => 'hit_ip_allocations.name',
    'whereClauses' => array (
  'hit_ip_subnets' => 'hit_ip_allocations.hit_ip_subnets',
  'bandwidth_type' => 'hit_ip_allocations.bandwidth_type',
  'cabinet' => 'hit_ip_allocations.cabinet',
  //'hat_asset_name' => 'hit_ip_allocations.hat_asset_name',
 // 'access_assets_name' => 'hit_ip_allocations.access_assets_name',
  'target_owning_org_id' => 'hit_ip_allocations.target_owning_org_id',
),
//'whereStatement'=>' IFNULL(hit_ip_allocations.enable_action,"1")="1" and  (jt1.name="'.$_REQUEST["access_assets_name_advanced"].'" or jt2.name="'.$_REQUEST["access_assets_name_advanced"].'" or "'.$_REQUEST["access_assets_name_advanced"].'"="" ) OR  (ifnull(jt2.name,"$") LIKE "'.$_REQUEST["access_assets_name_advanced"].'%" AND IFNULL(hit_ip_allocations.enable_action,"1") = "1") ',
'whereStatement'=>' IFNULL(hit_ip_allocations.enable_action,"1")="1" ',
    'searchInputs' => array (
  4 => 'hit_ip_subnets',
  5 => 'bandwidth_type',
  6 => 'cabinet',
  7 => 'hat_asset_name',
  8 => 'access_assets_name',
  9 => 'target_owning_org',
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
    'displayParams' => 
            array (
              'initial_filter' => '&alloc_history=1',
              /*'field_to_name_array' => 
              array (
                'name' => 'event_type',
                'id' => 'hat_event_type_id',
                'haa_ff_id' => 'haa_ff_id',
              ),
              'call_back_function' => 'setEventTypeReturn',*/
            ),
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
  'target_owning_org' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_OWNING_ORG',
    'id' => 'target_owning_org_id',
    'link' => true,
    'width' => '10%',
    'name' => 'target_owning_org',
  ),
  /* 'target_owning_org_id' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => '',
    'width' => '10%',
    'name' => 'target_owning_org_id',
  ),*/
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
  ),
  'MASK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MASK',
    'width' => '10%',
    'default' => true,
  ),
  'BANDWIDTH_TYPE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_BANDWIDTH_TYPE',
    'width' => '10%',
    'default' => true,
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
  ),
  'MONITORING' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MONITORING',
    'width' => '10%',
    'default' => true,
  ),
  'MRTG_LINK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_MRTG_LINK',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'TARGET_OWNING_ORG' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TARGET_OWNING_ORG',
    'id' => 'TARGET_OWNING_ORG_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'COMMENT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMMENT',
    'width' => '10%',
    'default' => true,
  ),
),
);
