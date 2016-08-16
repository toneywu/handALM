<?php
$popupMeta = array (
    'moduleMain' => 'HAT_Systems',
    'varName' => 'HAT_Systems',
    'orderBy' => 'hat_systems.name',
    'whereClauses' => array (
  'name' => 'hat_systems.name',
  'title' => 'hat_systems.title',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'title',
),
    'searchdefs' => array (
  'name' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'name' => 'name',
  ),
  'title' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'name' => 'title',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'IS_PRIMARY' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_PRIMARY',
    'width' => '10%',
  ),
  'IS_NETWORK' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_IS_NETWORK',
    'width' => '10%',
  ),
),
);
