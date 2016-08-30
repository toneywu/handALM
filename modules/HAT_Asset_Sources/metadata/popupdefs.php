<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Asset_Sources',
    'varName' => 'HAT_Asset_Sources',
    'orderBy' => 'hat_asset_sources.name',
    'whereClauses' => array (
  'name' => 'hat_asset_sources.name',
),
    'searchInputs' => array (
  0 => 'hat_asset_sources_number',
  1 => 'name',
  2 => 'priority',
  3 => 'status',
),
    'listviewdefs' => array (
  'TYPE' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'name' => 'type',
  ),
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
),
);
