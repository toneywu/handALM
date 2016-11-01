<?php
$module_name = 'HIT_Link_PO';
$listViewDefs [$module_name] = 
array (
  'PRODUCT_NUMBER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRODUCT_NUMBER',
    'id' => 'PRODUCT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ASSET_GROUP' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_GROUP',
    'width' => '10%',
  ),
  'LINE_NUMBER' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_LINE_NUMBER',
    'width' => '10%',
  ),
  'ASSET_LOCATION' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_LOCATION',
    'width' => '10%',
  ),
  'ASSET_SOURCE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_SOURCE',
    'id' => 'ASSET_SOURCE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'VENDOR' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_VENDOR',
    'width' => '10%',
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
