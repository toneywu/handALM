<?php
$module_name = 'HAA_ValueSets';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'VALUESET_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_VALUESET_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
    'label' => 'LBL_DESCRIPTION',
    'sortable' => false,
    'width' => '10%',
    'default' => true,
  ),
  'FORMAT_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_FORMAT_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'NUMBER_PRECISION' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NUMBER_PRECISION',
    'width' => '10%',
    'default' => true,
  ),
  'MAXIMUM_SIZE' => 
  array (
    'type' => 'int',
    'label' => 'LBL_MAXIMUM_SIZE',
    'width' => '10%',
    'default' => true,
  ),
);
?>
