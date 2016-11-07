<?php
$module_name = 'HMM_Trans_History';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'INVENTORY_ITEM' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ITEM',
    'id' => 'ITEM_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'HAM_WOOP' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_WOOP',
    'id' => 'HAM_WOOP_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LOCATION',
    'id' => 'LOCATION_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'LOCATOR' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_LOCATOR',
    'id' => 'LOCATOR_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PRIMARY_QTY' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_PRIMARY_QTY',
    'width' => '10%',
    'default' => true,
  ),
  'PRIMARY_UOM' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRIMARY_UOM',
    'id' => 'PRIMARY_UOM_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'SITE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
);
?>
