<?php
$popupMeta = array (
    'moduleMain' => 'HFA_Fixed_Assets',
    'varName' => 'HFA_Fixed_Assets',
    'orderBy' => 'hfa_fixed_assets.name',
    'whereClauses' => array (
  'name' => 'hfa_fixed_assets.name',
  'book_name' => 'hfa_fixed_assets.book_name',
  'haa_framework' => 'hfa_fixed_assets.haa_framework',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'book_name',
  5 => 'haa_framework',
),
    'searchdefs' => array (
  'haa_framework' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_HAA_FRAMEWORK',
    'id' => 'HAA_FRAMEWORK',
    'link' => true,
    'width' => '10%',
    'name' => 'haa_framework',
  ),
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'book_name' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_BOOK_NAME',
    'width' => '10%',
    'name' => 'book_name',
  ),
),
);
