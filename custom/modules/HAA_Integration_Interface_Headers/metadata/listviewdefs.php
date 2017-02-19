<?php
$module_name = 'HAA_Integration_Interface_Headers';
$listViewDefs [$module_name] = 
array (
  'INTERFACE_CODE' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_INTERFACE_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'OWN_INTERFACE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OWN_INTERFACE',
    'id' => 'HAA_INTERFACES_ID_C',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'EXT_BATCH_NUMBER' => 
  array (
    'type' => 'name',
    'link' => true,
    'label' => 'LBL_EXT_BATCH_NUMBER',
    'width' => '10%',
    'default' => true,
  ),
  'RECEIVED_DATE' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_RECEIVED_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'LINE_CNT' => 
  array (
    'type' => 'int',
    'label' => 'LBL_LINE_CNT',
    'width' => '10%',
    'default' => true,
  ),
  'PROCESS_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PROCESS_STATUS',
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
