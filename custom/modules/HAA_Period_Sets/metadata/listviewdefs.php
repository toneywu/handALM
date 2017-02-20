<?php
$module_name = 'HAA_Period_Sets';
$listViewDefs [$module_name] = 
array (
  'CALENDAR_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CALENDAR_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'CALENDAR_NAME' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_CALENDAR_NAME',
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
  'DESCRIPTION' => 
  array (
    'type' => 'text',
    'studio' => 'visible',
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
