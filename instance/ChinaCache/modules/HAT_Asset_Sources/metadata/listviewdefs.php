<?php
$module_name = 'HAT_Asset_Sources';
$listViewDefs [$module_name] = 
array (
  'TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '40%',
    'default' => true,
  ),
  'LINE_QTY' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_LINE_QTY',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'LINE_PRICE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_LINE_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'SUPPLIER_ORG' => 
  array (
    'type' => 'relate',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_SUPPLIER_ORG',
    'id' => 'SUPPLIER_ORG_ID',
    'link' => true,
    'width' => '10%',
  ),
  'ITEM_NUM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_NUM',
    'width' => '10%',
    'default' => false,
  ),
  'SUPPLIER_DESC' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SUPPLIER_DESC',
    'width' => '10%',
    'default' => true,
  ),
  'HEADER_NUM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_HEADER_NUM',
    'width' => '10%',
    'default' => false,
  ),
  'LINE_NUM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LINE_NUM',
    'width' => '10%',
    'default' => false,
  ),
  'SOURCE_TYPE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOURCE_TYPE',
    'width' => '10%',
    'default' => false,
  ),
  'SOURCE_ID' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOURCE_ID',
    'width' => '10%',
    'default' => false,
  ),
  'FRAMEWORK' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_FRAMEWORK',
    'id' => 'HAA_FRAMEWORKS_ID',
    'link' => true,
    'width' => '10%',
    'default' => false,
  ),
);
?>
