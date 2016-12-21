<?php
$module_name = 'HAT_Counting_Lines';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'PRODUCT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRODUCT',
    'id' => 'AOS_PRODUCTS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PART_NUMBER' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PART_NUMBER',
    'width' => '10%',
  ),
  'ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ASSET_DESC' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_DESC',
    'width' => '10%',
  ),
  'COUNTING_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_COUNTING_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'SNAPSHOT_QUANTITY' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SNAPSHOT_QUANTITY',
    'width' => '10%',
    'default' => true,
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
