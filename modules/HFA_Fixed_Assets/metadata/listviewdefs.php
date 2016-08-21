<?php
$module_name = 'HFA_Fixed_Assets';
$listViewDefs [$module_name] = 
array (
  'ASSET_NUM' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_ASSET_NUM',
    'width' => '25%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'FIXED_ASSET_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FIXED_ASSET_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_IN_SERVICE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_DATE_IN_SERVICE',
    'width' => '10%',
    'default' => true,
  ),
  'CURRENT_VALUE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_CURRENT_VALUE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ACCUMULATED_DEPRE' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_ACCUMULATED_DEPRE',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'SERVICE_YEAR' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_SERVICE_YEAR',
    'width' => '10%',
    'default' => true,
  ),
  'BOOK_NAME' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_BOOK_NAME',
    'width' => '10%',
    'default' => false,
  ),
  'OWNING_DEPT' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_OWNING_DEPT',
    'width' => '10%',
    'default' => false,
  ),
);
?>
