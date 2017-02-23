<?php
$module_name = 'HAOS_Contract_Templates';
$listViewDefs [$module_name] = 
array (
  'TEMPLATE_CODE' => 
  array (
    'type' => 'varchar',
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
  'EFFECTIVE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EFFECTIVE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'INACTIVE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INACTIVE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'CONTRACT_TYPE' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_CONTRACT_TYPE',
    'id' => 'HAA_CODES_ID_C',
    'link' => true,
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
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
);
?>
