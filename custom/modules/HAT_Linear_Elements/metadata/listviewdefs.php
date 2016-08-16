<?php
$module_name = 'HAT_Linear_Elements';
$listViewDefs [$module_name] = 
array (
  'PARENT_ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PARENT_ASSET',
    'id' => 'PARENT_ASSET_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'LINEAR_START_MEASURE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_LINEAR_START',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'LINEAR_DISTANCE' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_LINEAR_DISTANCE',
    'width' => '10%',
    'default' => true,
  ),
  'LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LOCATION',
    'id' => 'HAT_ASSET_LOCATIONS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ELEMENT_ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ELEMENT_ASSET',
    'id' => 'PARENT_ASSETS_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'LINEAR_ELEMENT_DETAILS' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LINEAR_ELEMENT_DETAILS',
    'width' => '10%',
    'default' => true,
  ),
  'LINEAR_END_MEASURE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_LINEAR_END',
    'currency_format' => true,
    'width' => '10%',
    'default' => false,
  ),
);
?>
