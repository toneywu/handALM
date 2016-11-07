<?php
$module_name = 'HMM_Trans_Lines';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '10%',
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
  'TRANS_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_TRANS_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'FROM_LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FROM_LOCATION',
    'id' => 'FROM_LOCATION_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'FROM_LOCATOR' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FROM_LOCATOR',
    'id' => 'FROM_LOCATOR_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'TO_LOCATION' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TO_LOCATION',
    'id' => 'TO_LOCATION_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'TO_LOCATOR' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_TO_LOCATOR',
    'id' => 'TO_LOCATOR_ID',
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
  'SITE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SITE',
    'id' => 'HAM_MAINT_SITES_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'SECONDARY_UOM' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_SECONDARY_UOM',
    'id' => 'SECONDARY_UOM_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
  'SECONDARY_QTY' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_SECONDARY_QTY',
    'currency_format' => true,
    'width' => '10%',
    'default' => false,
  ),
);
?>
