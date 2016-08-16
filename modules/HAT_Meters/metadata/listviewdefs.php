<?php
$module_name = 'HAT_Meters';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '20%',
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
  'LATEST_READING' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LATEST_READING',
    'width' => '10%',
    'default' => true,
  ),
  'METER_UOM' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_METER_UOM',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '20%',
    'default' => true,
  ),
);
?>
