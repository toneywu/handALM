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
  'COUNTING_TASK' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_COUNTING_TASK',
    'id' => 'HAT_COUNTING_TASKS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'COUNTING_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_COUNTING_STATUS',
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
  'PRODUCT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRODUCT',
    'id' => 'AOS_PRODUCTS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'ASSET_DESC' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_ASSET_DESC',
    'width' => '10%',
  ),
  'PART_NUMBER' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_PART_NUMBER',
    'width' => '10%',
  ),
  'ASSET_STATUS' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_STATUS',
    'width' => '10%',
    'default' => false,
  ),
  'ASSET_MAJOR' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_MAJOR',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'ASSET_LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'ORANIZATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ORANIZATION',
    'id' => 'ACCOUNT_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'SNAPSHOT_QUANTITY' => 
  array (
    'type' => 'int',
    'label' => 'LBL_SNAPSHOT_QUANTITY',
    'width' => '10%',
    'default' => false,
  ),
  'COUNTING_PERSON' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_COUNTING_PERSON',
    'width' => '10%',
  ),
);
?>
