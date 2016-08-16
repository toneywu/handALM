<?php
$module_name = 'HAT_Opn_Locations';
$listViewDefs [$module_name] = 
array (
  'TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'AREA' => 
  array (
    'type' => 'decimal',
    'label' => 'LBL_AREA',
    'width' => '10%',
    'default' => true,
  ),
  'UNIT' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_UNIT',
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);
?>
