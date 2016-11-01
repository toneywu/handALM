<?php
$module_name = 'HAM_WO_Lines';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'CONTRACT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CONTRACT',
    'id' => 'CONTRACT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PRODUCT' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_PRODUCT',
    'id' => 'PRODUCT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ASSET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ASSET',
    'id' => 'ASSET_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'UOM_CODE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_UOM_CODE',
    'id' => 'UOM_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'QUANTITY' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_QUANTITY',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'WO_NUMBER' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_WO_NUMBER',
    'id' => 'HAM_WO_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
);
?>
