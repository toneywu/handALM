<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Asset_Sources',
    'varName' => 'HAT_Asset_Sources',
    'orderBy' => 'hat_asset_sources.name',
    'whereClauses' => array (
  'name' => 'hat_asset_sources.name',
  'source_type' => 'hat_asset_sources.source_type',
  'description' => 'hat_asset_sources.description',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'source_type',
  5 => 'description',
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
