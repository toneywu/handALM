<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Asset_Sources',
    'varName' => 'HAT_Asset_Sources',
    'orderBy' => 'hat_asset_sources.name',
    'whereClauses' => array (
  'name' => 'hat_asset_sources.name',
  'source_type' => 'hat_asset_sources.source_type',
  'description' => 'hat_asset_sources.description',
  'item_num' => 'hat_asset_sources.item_num',
  'supplier_desc' => 'hat_asset_sources.supplier_desc',
  'line_qty' => 'hat_asset_sources.line_qty',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'source_type',
  5 => 'description',
  6 => 'item_num',
  7 => 'supplier_desc',
  8 => 'line_qty',
),
    'searchdefs' => array (
  'source_type' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SOURCE_TYPE',
    'width' => '10%',
    'name' => 'source_type',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'item_num' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_NUM',
    'width' => '10%',
    'name' => 'item_num',
  ),
  'supplier_desc' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_SUPPLIER_ORG',
    'width' => '10%',
    'name' => 'supplier_desc',
  ),
  'line_qty' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_LINE_QTY',
    'width' => '10%',
    'name' => 'line_qty',
  ),
  'description' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'name' => 'description',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
    'name' => 'name',
  ),
  'ITEM_NUM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ITEM_NUM',
    'width' => '10%',
    'default' => true,
    'name' => 'item_num',
  ),
  'LINE_PRICE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_LINE_PRICE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'line_price',
  ),
  'LINE_QTY' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_LINE_QTY',
    'width' => '10%',
    'default' => true,
    'name' => 'line_qty',
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '40%',
    'default' => true,
    'name' => 'description',
  ),
  'TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
),
);
