<?php
$module_name = 'HAT_Counting_Task_Templates';
$listViewDefs [$module_name] = 
array (
  'TEMPLATE_CODE' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_TEMPLATE_CODE',
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
  'TEMPLATECODE' => 
  array (
    'type' => 'varchar',
    'studio' => 'visible',
    'label' => 'LBL_TEMPLATECODE',
    'width' => '10%',
    'default' => false,
  ),
);
?>
