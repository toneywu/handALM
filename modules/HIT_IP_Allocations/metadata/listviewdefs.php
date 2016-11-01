<?php
$module_name = 'HIT_IP_Allocations';
$listViewDefs [$module_name] = 
array (
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
);
?>
