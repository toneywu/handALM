<?php
$module_name = 'HIT_Racks';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'HEIGHT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_HEIGHT',
    'width' => '8%',
    'default' => true,
  ),
  'DEPTH' => 
  array (
    'type' => 'int',
    'label' => 'LBL_DEPTH',
    'width' => '8%',
    'default' => true,
  ),
  'OCCUPATION' => 
  array (
    'type' => 'vchar',
    'studio' => 'visible',
    'label' => 'LBL_OCCUPATION',
    'width' => '10%',
    'default' => true,
  ),
  'ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET',
    'id' => 'HAT_ASSETS_ID',
    'link' => true,
    'width' => '12%',
    'default' => true,
  ),
  'HAT_ASSET_LOCATIONS' => 
  array (
    'type' => 'relate',
    'label' => 'LBL_HAT_ASSET_LOCATIONS',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '15%',
    'default' => true,
  ),
  'HAT_ASSETS_ACCOUNTS_NAME' => 
  array (
    'type' => 'relate',
    'label' => 'LBL_HAT_ASSETS_ACCOUNTS_FROM_ACCOUNTS_TITLE',
    'id' => 'HAT_ASSETS_ACCOUNTS_ID',
    'link' => true,
    'width' => '15%',
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
