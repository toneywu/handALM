<?php
$module_name = 'HAA_Integration_System_Def_Lines';
$listViewDefs [$module_name] = 
array (
  'COLUMN_TITLE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COLUMN_TITLE',
    'width' => '10%',
    'default' => true,
  ),
  'COLUMN_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_COLUMN_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'COLUMN_DATA_TYPE' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_COLUMN_DATA_TYPE',
    'width' => '10%',
    'default' => true,
  ),
  'COLUMN_NAME' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_COLUMN_NAME',
    'width' => '10%',
    'default' => true,
  ),
  'COLUMN_LENGTH' => 
  array (
    'type' => 'int',
    'label' => 'LBL_COLUMN_LENGTH',
    'width' => '10%',
    'default' => true,
  ),
  'COLUMN_MASK' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COLUMN_MASK',
    'width' => '10%',
    'default' => true,
  ),
  'VALIDATE_VALUESET' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_VALIDATE_VALUESET',
    'id' => 'HAA_VALUESETS_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'ENABLED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_ENABLED_FLAG',
    'width' => '10%',
  ),
  'REQUIRED_FLAG' => 
  array (
    'type' => 'bool',
    'default' => true,
    'label' => 'LBL_REQUIRED_FLAG',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => false,
    'link' => true,
  ),
);
?>
