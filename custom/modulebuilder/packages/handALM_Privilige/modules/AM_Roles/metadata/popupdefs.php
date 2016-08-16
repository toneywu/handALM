<?php
$popupMeta = array (
    'moduleMain' => 'HPR_AM_Roles',
    'varName' => 'HPR_AM_Roles',
    'orderBy' => 'hpr_am_roles.name',
    'whereClauses' => array (
  'name' => 'hpr_am_roles.name',
  'flag_global' => 'hpr_am_roles.flag_global',
  'flag_catalog' => 'hpr_am_roles.flag_catalog',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'flag_global',
  5 => 'flag_catalog',
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
  'flag_global' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_FLAG_GLOBAL',
    'width' => '10%',
    'name' => 'flag_global',
  ),
  'flag_catalog' => 
  array (
    'type' => 'bool',
    'label' => 'LBL_FLAG_CATALOG',
    'width' => '10%',
    'name' => 'flag_catalog',
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
    'name' => 'name',
  ),
  'FLAG_GLOBAL' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_FLAG_GLOBAL',
    'width' => '10%',
    'name' => 'flag_global',
  ),
  'FLAG_CATALOG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_FLAG_CATALOG',
    'width' => '10%',
    'name' => 'flag_catalog',
  ),
),
);
